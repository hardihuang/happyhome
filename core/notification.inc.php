<?php
function notify_fee($type){
	$rows_member=getAllActiveMid();
	//循环出一个含有所有激活用户的mid和最新dueDate的$arrs_durDate[]
	foreach($rows_member as $row_member){
		$mid= $row_member['mid'];
		$sql="select mid,dueDate from hh_fee where mid=$mid order by dueDate desc limit 1";
		$row_dueDate=fetchOne($sql);
		if($row_dueDate){
			$arrs_dueDate[] = $row_dueDate;
		}
	}
	// return $arrs_dueDate;
	$i=0;
	//格式化时间,运算后输出 交费期 与 今日 的差值(天)
	foreach($arrs_dueDate as $arr_dueDate){
		$due=strtotime($arr_dueDate['dueDate']);
		$now=time();
		$day[$i]['mid']=$arr_dueDate['mid'];
		$day[$i]['name']=getMemberInfo($arr_dueDate['mid'])['name'];
		$day[$i]['day']=ceil(($due-$now)/86400);;
		$i++;
	}
	$n=0;
	$output=array();
	foreach ($day as $day1){
		if($type==1){ //5天之内该交费的
			if($day1['day'] <= 5 && $day1['day']>0){
				$output[$n]['mid']=$day1['mid'];
				$output[$n]['name']=$day1['name'];
				$output[$n]['day']=$day1['day'];
			}
		}elseif($type==2){ //今天该交费的
			if($day1['day']==0){
				$output[$n]['mid']=$day1['mid'];
				$output[$n]['name']=$day1['name'];
				$output[$n]['day']=$day1['day'];
			}
		}elseif($type==3){ //超过交费期的
			if($day1['day'] < 0){
				$output[$n]['mid']=$day1['mid'];
				$output[$n]['name']=$day1['name'];
				$output[$n]['day']=$day1['day'];
			}
		}
		$n++;
	}

	return $output;
	// return $day;
}
