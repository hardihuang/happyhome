<!doctype html>
<html>  
<head lang="zh-CN">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>成员管理系统-快乐学习营</title> 

<!-- jquery -->
	<link rel="stylesheet" href="style/jquery.mobile.min.css" />
	<script src="script/jquery.min.js"></script>
	<script src="script/jquery.mobile.min.js"></script>
<!-- own code -->
	<link rel="stylesheet" href="style/style.css" />
	<script src="script/script.js"></script>

</head> 
<body>  

<!-- member page -->
<div id="login" data-role='page' data-title='login'>
	
	<div data-role='header' data-position='fixed' class="header" data-tap-toggle="false" >
		<h2>用户登陆</h2>
		<a href="#"
			rel="external"
			id="login_btn"
			data-icon='check'
			data-iconpos='notext'
			data-direction='reverse'
			class='ui-btn-right'
			data-transition="none" >
		登陆</a>
	</div>

	<div data-role='content'>
		<div class="login_top">
			<img src="images/logo_large.png" class="logo">
			<h3>快乐学习营-成员管理系统</h3>
			<br>
		</div>
		<form action="doAction.php?act=login" method="post" id="login_form" data-ajax="false">
			<label for="username">用户名:</label>
			<input type="text" name="username" id="username" value="">
			<label for="password">密码:</label>
			<input type="password" name="password" id="password" value="" autocomplete="off">
		</form>
	</div>
</div>
	
<script>
	// 点击顶部右侧按钮,提交表格
	$("#login_btn").on('click',function(){
		$('#login_form').submit();
	})
	//密码输入4个字符后自动提交
	$('#password').keyup(function(){
		if($('#password').val().length == 4){
			$('#login_form').submit();
		}
	})
	
</script>
<?php require_once("includes/foot.php") ?>