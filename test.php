<?php 
require_once 'include.php';

$temp['mid']=who_is_the_father(34);
$father=getMemberInfo($temp['mid']);
$father['mid']=$temp['mid'];
print_r($father);