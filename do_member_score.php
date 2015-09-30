<?php require_once("includes/head.php") ?>

<div id="do_member_score" data-role='page' data-title='添加加减分信息'>
	<div data-role='header' data-position='fixed' class="header" data-tap-toggle="false">
		<h2>添加成绩信息</h2>
		<a href="member.php?mid=<?php echo $_GET['mid'] ?>#member_score"
			rel="external"
			data-icon='delete'
			data-iconpos='notext'
			data-direction='reverse'
			class='ui-btn-left'
			data-transition="none" >
		取消</a>
		<a href="#"
			rel="external"
			data-icon='check'
			data-iconpos='notext'
			data-direction='reverse'
			class='ui-btn-right'
			data-transition="none" 
			id="do_member_score_btn">
		确定</a>
	</div>

	<div data-role='content'>
		<form action="doAction.php?act=add_member_score" method="post" data-ajax="false" id="do_member_score_form">
		<label for="date">日期:</label>
		<input type="date" name="date" id="date">

		<label for="">年级排名:</label>
		<input type="number" name="rank" id="rank" placeholder="">
		<label for="">数学:</label>
		<input type="number" name="math" id="math" placeholder="">
		<label for="">物理:</label>
		<input type="number" name="physics" id="physics" placeholder="">
		<label for="">化学:</label>
		<input type="number" name="chemistry" id="chemistry" placeholder="">
		<label for="">英语:</label>
		<input type="number" name="english" id="english" placeholder="">
		<label for="">生物:</label>
		<input type="number" name="biology" id="biology" placeholder="">
		<label for="">地理:</label>
		<input type="number" name="geography" id="geography" placeholder="">

		<!-- <label for="">备注:</label> -->
		<!-- <textarea cols="40" rows="8" name="notes" id="notes" ></textarea> -->

		<?php 
		if(isset($_REQUEST['mid'])){
			echo '<input type="hidden" name="mid" value="'.$_REQUEST['mid'].'">';
		}else{
			echo '<input type="hidden" name="mid" value="0">';
		}
		?>

		<!-- <input type="submit" value="提交" > -->
		</form>
	</div>
</div>
<script>
	// 点击顶部右侧按钮,提交表格
	$("#do_member_score_btn").on('click',function(){
		$('#do_member_score_form').submit();
	})
</script>
<?php require_once("includes/foot.php") ?>
