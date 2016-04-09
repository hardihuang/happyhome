<?php require_once("includes/head.php");
$sql="select hh_fee.fee, hh_fee.date, hh_member.name from hh_fee left join hh_member on hh_fee.mid=hh_member.mid order by date desc limit 5";
$rows=fetchAll($sql);
?>
<div id="analyze" data-role='page' data-title='analyze'>

	<div data-role='header' data-position='fixed' data-tap-toggle="false">
		<h2>统计</h2>
		<a href="doAction.php?act=logout"
			rel='external'
			data-icon='power'
			data-iconpos='notext'
			data-direction='reverse'
			class='ui-btn-left'
			data-transition="none" >
		退出</a>
		<a href="#about"
			data-icon='info'
			data-iconpos='notext'
			data-direction='reverse'
			class='ui-btn-right'
			data-transition="none" >
		关于此程序</a>
	</div>

	
	<table border="0" cellspacing="8" class="chart_table">
		<tr>
			<td colspan="2"><canvas id="chart_total_fee"></canvas></td>
		</tr>
		<!-- <tr>
			<td colspan="2">月收入统计</td>
		</tr> -->
		<!-- <tr>
			<td><canvas id="chart_grade" class="pie_chart"></canvas></td>
			<td><canvas id="chart_gender" class="pie_chart"></canvas></td>
		</tr>
		<tr>
			<td>年级比例</td>
			<td>男女比例</td>
		</tr> -->
	</table>
	
	
	
	<div data-role='content'>
		<h4 class="analyze_table_title">最近交易:</h4>
		<table data-role="table"  data-mode="table" class="ui-body-d ui-shadow table-stripe">
		<thead>
			<tr class="ui-bar-d">
				<th>姓名</th>
				<th>日期</th>
				<th>金额</th>
			</tr>
		</thead>

		<tbody>
			<?php 
			if(!empty($rows)){
				foreach ($rows as $row) {
					echo '<tr>';
						echo '<td>'.$row['name'].'</td>';
						echo '<td>'.$row['date'].'</td>';
						echo '<td>'.$row['fee'].'</td>';
					echo '</tr>';
				}
			}
			?>
		</tbody>
	</table>
	</div>
<?php require_once("includes/footer.php") ?>

	<!-- side off canvas panel -->
	<div data-role="panel" id="about" data-position="right" data-display="overlay">
		<h3>关于</h3>
		<hr>
		<img src="images/logo.png" alt="">
		<i>Version: 1.1.1</i>
		<p class="text_center"><strong>快乐学习营成员管理系统</strong><br>旨在帮助管理者更方便的管理学习营的成员, 让工作变得更有效率和轻松.</p>
		<p class="text_right">---2015-9-30</p>
	</div>

</div>

<!-- chart js -->
<script src="script/chart.js"></script>
<script>
	
	$.ajax({
		url: "analyze_json.php",
	})
	.done(function( data ) {
		// console.log(data);
		chart_total_fee(data[0]);
		recent_fee(data[3]);
		// setTimeout(function(){return chart_total_fee(data[0]);},"300");
		// setTimeout(function(){return chart_grade(data[1]);},"350");
		// setTimeout(function(){return chart_gender(data[2]);},"450");
		
	});

	// 月收入统计图
	function chart_total_fee(data){

		//数据处理
		total_fee=[];
		total_fee_arr=[];
		var last_month=new Date().getMonth();
		// 遍历出一个含有所有本年缴费信息的array
		if(data){
			for (var i=0; i<data.length; i++) {
				total_fee[data[i].month]=data[i].total;
				// data[i].year+'-'+data[i].month+':'+data[i].total;
			}

			// 优化total_fee数组，将12个月填满，若没有数据则用0填充
			for(var n=1 ; n<=last_month ; n++){
				if(total_fee[n]){
					total_fee_arr[n-1]=parseInt(total_fee[n])/1000;
				}else{
					total_fee_arr[n-1]=0;
				}
			}
		}
		
		// 创建统计图信息arr
		lineChartData = {
			labels : ["1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月"],
			datasets: [
				{
					label: "My first dataset",
					fillColor: "rgba(151,187,205,0.2)",
					strokeColor: "rgba(151,187,205,1)",
					pointColor: "rgba(151,187,205,1)",
					pointStrokeColor: "#fff",
					pointHighlightFill: "#fff",
					pointHighlightStroke: "rgba(151,187,205,1)",
					// data: [0, 0, 2.7, 1.6, 1.9, 5.9, 5.1, 4.6, 4.2, 3.2, 2.1,3.3]
					data: total_fee_arr
				}
			]

		}

		// 创建统计图canvas
		var chart_total_fee = document.getElementById("chart_total_fee").getContext("2d");
		window.myLine = new Chart(chart_total_fee).Line(lineChartData, {
			responsive: true,
			bezierCurve : true,

		});
	}

	// 年级比例统计图
	function chart_grade(data){

		//数据处理
		var grade1=data[0];
		var grade2=data[1];
		var grade3=data[2];

		//创建统计图信息
		var pieChartData = [
			{
			    value: grade1,
			    color:"#F3CED5",
			    highlight: "#F3CED5",
			    label: "初一"
			},
			{
			    value: grade2,
			    color: "#AAD1E2",
			    highlight: "#AAD1E2",
			    label: "初二"
			},
			{
			    value: grade3,
			    color: "#E5E5F1",
			    highlight: "#E5E5F1",
			    label: "初三"
			}
		]

		// 创建统计图canvas
		var chart_grade = document.getElementById("chart_grade").getContext("2d");
		window.myPie = new Chart(chart_grade).Doughnut(pieChartData, {
	    	animateScale: true,
	    	responsive: true,
	    	animationSteps : 100
		});
	}
	
	// 性别比例统计图
	function chart_gender(data){

		//数据处理
		var boy=data[0];
		var girl=data[1];

		//创建统计图信息
		var pie2ChartData = [
			{
			    value: boy,
			    color:"#85D3FF",
			    highlight: "#85D3FF",
			    label: "男"
			},
			{
			    value: girl,
			    color: "#D2EFFF",
			    highlight: "#D2EFFF",
			    label: "女"
			}
		]

		// 创建统计图canvas
		var chart_gender = document.getElementById("chart_gender").getContext("2d");
		window.myPie2 = new Chart(chart_gender).Doughnut(pie2ChartData, {
	    	animateScale: true,
	    	responsive: true,
	    	animationSteps : 100
		});
	}
	

</script>

<?php require_once("includes/foot.php") ?>