<?php require_once("includes/head.php") ?>
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

	<canvas id="chart" height="50%" width="100%"></canvas>
	
	<div data-role='content'>
		
	</div>
<?php require_once("includes/footer.php") ?>

	<!-- side off canvas panel -->
	<div data-role="panel" id="about" data-position="right" data-display="overlay">
		<h3>关于</h3>
		<hr>
		<img src="images/logo.png" alt="">
		<i>Version: 1.0.0</i>
		<p class="text_center"><strong>快乐学习营成员管理系统</strong><br>旨在帮助管理者更方便的管理学习营的成员, 让工作变得更有效率和轻松.</p>
		<p class="text_right">---2015-9-30</p>
	</div>

</div>

<!-- chart js -->
<script src="script/chart.js"></script>
<script>
	var lineChartData = {
		labels : ["1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月"],
		datasets: [
			{
				label: "My Second dataset",
				fillColor: "rgba(151,187,205,0.2)",
				strokeColor: "rgba(151,187,205,1)",
				pointColor: "rgba(151,187,205,1)",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "rgba(151,187,205,1)",
				data: [3.7, 4.5, 2.7, 1.6, 1.9, 5.9, 5.1, 4.6, 4.2, 3.2, 2.1,3.3]
			}
		]

	}

	window.onload = function(){
		var ctx = document.getElementById("chart").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true,
			bezierCurve : true
		});
	}


</script>

<?php require_once("includes/foot.php") ?>