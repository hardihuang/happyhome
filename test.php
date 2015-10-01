<?php 
require_once 'include.php';
require_once("includes/head.php");
?>

<a href="#delete_member" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-check ui-btn-icon-left ui-btn-a" data-transition="pop">删除用户</a>
<div data-role="popup" id="delete_member" data-theme="a" class="ui-corner-all">
	<form action="doAction.php?act=delete_member" method="post" data-ajax="false">
		<div style="padding:10px 20px;">
			<h3>请输入管理员密码:</h3>
			<input type="hidden" name="mid" id="mid" value="9">
			<input type="password" name="password" id="pw" data-theme="a">
			<button type="submit" class="ui-btn ui-corner-all ui-shadow ui-btn-b ui-btn-icon-left ui-icon-check">确定删除</button>
		</div>
	</form>
</div>