<?php
require_once 'include.php';
header('Content-type:text/json');

$output=array();

// 月收入数据
$year=explode('-',unix2date(time()))[0];
$sql="select * from hh_totalFee where year=$year";
$output[0]=fetchAll($sql);

//年级比例数据
$output[1][0]=count_info('grade',1);
$output[1][1]=count_info('grade',2);
$output[1][2]=count_info('grade',3);

//性别比例数据
$output[2][0]=count_info('gender','boy');
$output[2][1]=count_info('gender','girl');

echo json_encode($output);