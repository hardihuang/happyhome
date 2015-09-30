<?php 
function checkLogin(){
	if(!( isset($_SESSION['login'])) ){
		alertMsg('请先登录','login.php');
		return false;
	}else{
		return true;
	}
}

function login(){
	$username=$_POST['username'];
	$password=$_POST['password'];

	if($password==PW){
		$_SESSION['login']=1;
		return "<meta http-equiv='refresh' content='0;url=index.php'/>";
	}else{
		return "对不起,无法验证您的身份!<meta http-equiv='refresh' content='1;url=login.php'/>";
	}
}

function logout(){
	$_SESSION=array();
	session_unset();
	session_destroy();
	header("location:login.php");
}

function add_member(){
	$arr=$_POST;
	// return print_r($arr);
	if(empty($arr['name'])){
		$msg="成员姓名是必填项哦!<meta http-equiv='refresh' content='1;url=".$_SERVER['HTTP_REFERER']."'/>";
		return $msg;
		exit;
	}
	//头像不是必填项,检测是否上传成员头像,若没有(error=4)则不处理头像
	if($_FILES['avatar']['error']!=4){
		// 上传头像,并生成80*80和150*150的两张缩略图
		$uploadFile=uploadFile('images/uploads/avatar/');
		if($uploadFile&&is_array($uploadFile)){
			$arr['avatar']=$uploadFile[0]['name'];
		}else{
			return "添加成员失败<meta http-equiv='refresh' content='1;url=".$_SERVER['HTTP_REFERER']."'/>";
		}

		thumb("images/uploads/avatar/".$uploadFile[0]['name'],"images/uploads/avatar_150/".$uploadFile[0]['name'],150,150);
		thumb("images/uploads/avatar/".$uploadFile[0]['name'],"images/uploads/avatar_80/".$uploadFile[0]['name'],80,80);

	}
	
	//电话号不是必填项,检测是否输入,若没有则不创建$arr_phone数组
	if(!empty($arr['phone'])){
		$arr_phone['phone']=$arr['phone'];
		$arr_phone['owner']=$arr['owner'];	
	}

	unset($arr['phone']);
	unset($arr['owner']);
	// print_r($arr);
	// print_r($arr_phone);
	
	// 向数据库插入数据
	insert('hh_member',$arr);
	$mid=getInsertId();

	//若$arr_phone数组不存在(用户没有输入电话号),则不进行写入hh_phone数据库的操作
	if(isset($arr_phone)){
		$arr_phone['mid']=$mid;
		insert('hh_phone',$arr_phone);
	}
	
	$msg="成功添加 ".$arr['name']." 为快乐学习营成员!<br/>2秒钟后跳转到成员信息页面!<meta http-equiv='refresh' content='2;url=member.php?mid=".$mid."'/>";
	return $msg;
}

function edit_member(){
	$arr=$_POST;

	$mid=$arr['mid'];
	if(empty($arr['name'])){
		$msg="成员姓名是必填项哦!<meta http-equiv='refresh' content='1;url=".$_SERVER['HTTP_REFERER']."'/>";
		return $msg;
		exit;
	}

	//头像不是必填项,检测是否上传成员头像,若没有(error=4)则不处理头像
	if($_FILES['avatar']['error']!=4){

		// 上传头像,并生成80*80和150*150的两张缩略图
		$uploadFile=uploadFile('images/uploads/avatar/');
		if($uploadFile&&is_array($uploadFile)){
			$arr['avatar']=$uploadFile[0]['name'];
		}else{
			return "添加成员失败<meta http-equiv='refresh' content='1;url=".$_SERVER['HTTP_REFERER']."'/>";
		}

		thumb("images/uploads/avatar/".$uploadFile[0]['name'],"images/uploads/avatar_150/".$uploadFile[0]['name'],150,150);
		thumb("images/uploads/avatar/".$uploadFile[0]['name'],"images/uploads/avatar_80/".$uploadFile[0]['name'],80,80);

		// 删除旧头像
		$filename="images/uploads/avatar/".$arr['avatar_old'];
		if(file_exists($filename)){
			unlink($filename);
		}
		$filename="images/uploads/avatar_80/".$arr['avatar_old'];
		if(file_exists($filename)){
			unlink($filename);
		}
		$filename="images/uploads/avatar_150/".$arr['avatar_old'];
		if(file_exists($filename)){
			unlink($filename);
		}
	}

	//电话号不是必填项,检测是否输入,若没有则不创建$arr_phone数组
	if(!empty($arr['phone'])){
		$arr_phone['phone']=$arr['phone'];
		$arr_phone['owner']=$arr['owner'];	
	}
	unset($arr['phone']);
	unset($arr['owner']);

	unset($arr['avatar_old']);
	unset($arr['mid']);
	// return print_r($arr);
	// return print_r($arr_phone);

	update('hh_member',$arr,"mid=$mid");

	//若$arr_phone数组不存在(用户没有输入电话号),则不进行写入hh_phone数据库的操作
	if(isset($arr_phone)){
		$arr_phone['mid']=$mid;
		update('hh_phone',$arr_phone,"mid=$mid");
	}
	
	$msg="成功修改了 ".$arr['name']." 成员的信息!<br/>2秒钟后跳转到成员信息页面!<meta http-equiv='refresh' content='2;url=member.php?mid=".$mid."'/>";
	return $msg;
}

function add_member_fee(){
	$arr=$_POST;
	// print_r($arr);
	
	if(empty($arr['date']) || empty($arr['fee']) || empty($arr['dueDate']) || $arr['mid']==0) {
		$msg="请将信息填写完整哦!<meta http-equiv='refresh' content='1;url=".$_SERVER['HTTP_REFERER']."'/>";
		return $msg;
		exit;
	}
	insert('hh_fee',$arr);
	$msg="成功添加一项交费记录! <br/>2秒钟后跳转到交费信息页面!<meta http-equiv='refresh' content='2;url=member.php?mid=".$arr['mid']."#member_fee'/>";
	return $msg;
}

function add_member_fen(){
	$arr=$_POST;
	// return print_r($arr);
	if(empty($arr['date']) || empty($arr['fen']) || $arr['mid']==0) {
		$msg="请将信息填写完整哦!<meta http-equiv='refresh' content='1;url=".$_SERVER['HTTP_REFERER']."'/>";
		return $msg;
		exit;
	}
	insert('hh_fen',$arr);
	$msg="成功添加一项加减分记录! <br/>2秒钟后跳转到加减分信息页面!<meta http-equiv='refresh' content='2;url=member.php?mid=".$arr['mid']."#member_fen'/>";
	return $msg;
}

function add_member_score(){
	$arr=$_POST;
	// return print_r($arr);
	if(empty($arr['date']) || empty($arr['rank']) || $arr['mid']==0) {
		$msg="请将信息填写完整哦!<meta http-equiv='refresh' content='1;url=".$_SERVER['HTTP_REFERER']."'/>";
		return $msg;
		exit;
	}
	insert('hh_score',$arr);
	$msg="成功添加一条成绩记录! <br/>2秒钟后跳转到成绩信息页面!<meta http-equiv='refresh' content='2;url=member.php?mid=".$arr['mid']."#member_score'/>";
	return $msg;
}

function getAllMembers($grade,$activeFlag=1){
	if($activeFlag==0){
		$sql="select hh_member.mid,name,avatar,hh_phone.phone from hh_member left join hh_phone on hh_member.mid=hh_phone.mid where activeFlag=0";
		$rows=fetchAll($sql);
		return $rows;
	}
	$sql="select hh_member.mid,name,avatar,hh_phone.phone from hh_member left join hh_phone on hh_member.mid=hh_phone.mid where grade=$grade and activeFlag=1";
	$rows=fetchAll($sql);
	return $rows;
}
function getAllActiveMid(){
	$sql="select mid from hh_member where activeFlag=1";
	$rows=fetchAll($sql);
	return $rows;
}

function getMemberInfo($mid){
	$sql=" select name,activeFlag,gender,birthday,height,weight,regTime,hh_member.sid,school,class,qq,address,notes,avatar,grade,phone,owner from hh_member left join hh_phone on hh_member.mid=hh_phone.mid left join hh_school on hh_member.sid=hh_school.sid where hh_member.mid=$mid";
	$row=fetchOne($sql);
	return $row;
}

function getAllSchool(){
	$sql="select * from hh_school";
	$rows=fetchAll($sql);
	return $rows;
}

function getMemberFee($mid){
	$sql="select * from hh_fee where mid=$mid order by dueDate desc";
	$rows=fetchAll($sql);
	return $rows;
}

function getMemberFen($mid){
	$sql="select * from hh_fen where mid=$mid order by date desc";
	$rows=fetchAll($sql);
	return $rows;
}

function getFenTotal($mid){
	$sql_plus="select fen from hh_fen where mid=$mid and state=1"; //所有加分
	$sql_minus="select fen from hh_fen where mid=$mid and state=0"; //所有jian分
	$rows_plus=fetchAll($sql_plus);
	$rows_minus=fetchAll($sql_minus);

	$p=0;
	if(!empty($rows_plus)){
		foreach ($rows_plus as $row) {
			$p=$p+$row['fen'];
		}
	}
	

	$m=0;
	if(!empty($rows_minus)){
		foreach ($rows_minus as $row) {
			$m=$m+$row['fen'];
		}
	}
	return ($p-$m);
}

function getMemberScore($mid){
	$sql="select * from hh_score where mid=$mid order by date desc";
	$rows=fetchAll($sql);
	return $rows;
}