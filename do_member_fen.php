<?php require_once("includes/head.php") ?>

<div id="do_member_fen" data-role='page' data-title='添加加减分信息'>
	<div data-role='header' data-position='fixed' class="header" data-tap-toggle="false">
		<h2>添加加减分信息</h2>
		<a href="member.php?mid=<?php echo $_GET['mid'] ?>#member_fen"
			rel="external"
			data-icon='delete'
			data-iconpos='notext'
			data-direction='reverse'
			class='ui-btn-left'
			data-transition="none" >
		<a href="#"
			rel="external"
			data-icon='check'
			data-iconpos='notext'
			data-direction='reverse'
			class='ui-btn-right'
			data-transition="none" 
			id="do_member_fen_btn">
		确定</a>
	</div>

	<div data-role='content'>
		<form action="doAction.php?act=add_member_fen" method="post" data-ajax="false" id="do_member_fen_form">
		<fieldset data-role="controlgroup" data-type="horizontal" data-mini="true">
			<input type="radio" name="state" id="state_plus" value="1" checked="checked">
			<label for="state_plus">加分</label>
			<input type="radio" name="state" id="state_min" value="0">
			<label for="state_min">减分</label>
		</fieldset>
		<label for="fen">金额:</label>
		<input type="number" name="fen" id="fen" placeholder="元">
		<label for="date">日期:</label>
		<input type="date" name="date" id="date">
		<label for="notes">原因:</label>
		<textarea cols="40" rows="8" name="notes" id="notes" ></textarea>
		
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
	$("#do_member_fen_btn").on('click',function(){
		$('#do_member_fen_form').submit();
	})
</script>
<?php require_once("includes/foot.php") ?>
