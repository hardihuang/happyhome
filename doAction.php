<?php 
require_once 'include.php';
$act=$_REQUEST['act'];
if($act==='login'){
	$msg=login();
}elseif($act==='logout'){
	$msg=logout();
}elseif($act==='add_member'){
	$msg=add_member();
}elseif($act==='edit_member'){
	$msg=edit_member();
}elseif($act==='add_member_fee'){
	$msg=add_member_fee();
}elseif($act==='add_member_fen'){
	$msg=add_member_fen();
}elseif($act==='add_member_score'){
	$msg=add_member_score();
}elseif($act==='delete_member'){
	$msg=delete_member();
}

 ?>
 <!DOCTYPE HTML>
 <html>
 <head>
 <meta charset="utf-8">
 <meta name="description" content="">
 <meta name="keywords" content="">
 <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
 <meta http-equiv="x-ua-compatible" content="ie=7" />
 <title>do Action - <?php echo $act; ?></title>
 </head>
 <body>
 <?php 
if(@$msg){
	echo $msg;
}
?>
 </body>
 </html>
 