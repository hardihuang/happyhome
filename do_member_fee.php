<?php require_once("includes/head.php") ?>

<div id="do_member_fee" data-role='page' data-title='添加交费信息'>
	<div data-role='header' data-position='fixed' class="header" data-tap-toggle="false">
		<h2>添加交费信息</h2>
		<a href="member.php?mid=<?php echo $_GET['mid'] ?>#member_fee"
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
			id="do_member_fee_btn" >
		确定</a>
	</div>

	<div data-role='content'>
		<form action="doAction.php?act=add_member_fee" method="post" data-ajax="false" id="do_member_fee_form">
		<label for="date">交费日期:</label>
		<input type="date" name="date" id="date">
		<label for="fee">金额:</label>
		<input type="number" name="fee" id="fee" placeholder="元">
		<label for="dueDate">到期时间:</label>
		<input type="date" name="dueDate" id="dueDate" >
		<label for="notes">备注:</label>
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
	$("#do_member_fee_btn").on('click',function(){
		$('#do_member_fee_form').submit();
	})
</script>
<?php require_once("includes/foot.php") ?>
