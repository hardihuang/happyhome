<?php require_once("includes/head.php");
$mid=$_REQUEST['mid'];
$rows=getMemberInfo($mid);
?>


<!-- member page -->
<div id="member" data-role='page' data-title='member'>
	
	<div data-role='header' data-position='fixed' class="header" data-tap-toggle="false">
		<h2><?php echo $rows['name'] ?></h2>
		<a href="do_member_edit.php?mid=<?php echo $mid ?>"
			rel="external"
			id="member_action_btn"
			data-icon='edit'
			data-iconpos='notext'
			data-direction='reverse'
			class='ui-btn-right'
			data-transition="none" >
		修改成员基本信息</a>
	</div>
	
	<div data-role="tabs" id="member_tabs" class="no_padding" >
		<div data-role="navbar" data-position='fixed'>
			<ul>
				<li class="member_info"><a href="#member_info" data-ajax="false">基本信息</a></li>
				<li class="member_fee"><a href="#member_fee" data-ajax="false">交费信息</a></li>
				<li class="member_fen"><a href="#member_fen" data-ajax="false">加减分</a></li>
				<li class="member_score"><a href="#member_score" data-ajax="false">成绩统计</a></li>
				
			</ul>
		</div>
		<div id="member_info">
			<?php require_once('member_info.php') ?>
		</div>
		<div id="member_fee">
			<?php require_once('member_fee.php') ?>
		</div>
		<div id="member_fen">
			<?php require_once('member_fen.php') ?>
		</div>
		<div id="member_score">
			<?php require_once('member_score.php') ?>
		</div>
	</div>


<?php require_once("includes/footer.php") ?>

</div>
<div class="hide mid"><?php echo $mid; ?></div> <!-- 临时存放用户mid给js代码用 -->
<?php require_once("includes/foot.php") ?>

<script>
// 根据用户点击的不同标签页,更改header右侧按钮为相应的icon和href
var mid=$('.mid').html(); //获取用户mid
$(".member_info").on('click',function(){
	$("#member_action_btn").removeClass("ui-icon-plus").addClass("ui-icon-edit").attr("href","do_member_edit.php?mid="+mid);
})
$(".member_fee").on('click',function(){
	$("#member_action_btn").removeClass("ui-icon-edit").addClass("ui-icon-plus").attr("href","do_member_fee.php?mid="+mid);
})
$(".member_fen").on('click',function(){
	$("#member_action_btn").removeClass("ui-icon-edit").addClass("ui-icon-plus").attr("href","do_member_fen.php?mid="+mid);
})
$(".member_score").on('click',function(){
	$("#member_action_btn").removeClass("ui-icon-edit").addClass("ui-icon-plus").attr("href","do_member_score.php?mid="+mid);
})
</script>