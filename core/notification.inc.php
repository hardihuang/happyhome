<?php
function notify_fee($type){
	$rows_member=getAllActiveMid();
	//循环出一个含有所有激活用户的mid和最新dueDate的$arrs_durDate[]
	foreach($rows_member as $row_member){
		$mid= $row_member['mid'];
		$sql="select mid,dueDate,fee from hh_fee where mid=$mid order by dueDate desc limit 1";
		$row_dueDate=fetchOne($sql);
		if($row_dueDate){
			$arrs_dueDate[] = $row_dueDate;
		}
	}
	// return $arrs_dueDate;
	$i=0;
	//格式化时间,运算后输出 费交期 与 今日 的差值(天)
	foreach($arrs_dueDate as $arr_dueDate){
		$due=strtotime($arr_dueDate['dueDate']);
		$now=time();
		$day[$i]['mid']=$arr_dueDate['mid'];
		$day[$i]['name']=getMemberInfo($arr_dueDate['mid'])['name'];
		$day[$i]['day']=ceil(($due-$now)/86400);
		$day[$i]['fee']=$arr_dueDate['fee'];
		$i++;
	}
	$n=0;
	$output=array();
	// return $day;
	foreach ($day as $day1){
		if($type==1){ //5天之内该交费的
			if($day1['day'] <= 5 && $day1['day']>0){
				$output[$n]['mid']=$day1['mid'];
				$output[$n]['name']=$day1['name'];
				$output[$n]['day']=$day1['day'];
				$output[$n]['fee']=$day1['fee'];
			}
		}elseif($type==2){ //今天该交费的
			if($day1['day']==0){
				$output[$n]['mid']=$day1['mid'];
				$output[$n]['name']=$day1['name'];
				$output[$n]['day']=$day1['day'];
				$output[$n]['fee']=$day1['fee'];
			}
		}elseif($type==3){ //超过交费期的
			if($day1['day'] < 0){
				$output[$n]['mid']=$day1['mid'];
				$output[$n]['name']=$day1['name'];
				$output[$n]['day']=$day1['day'];
				$output[$n]['fee']=$day1['fee'];
			}
		}
		$n++;
	}

	$output=sort_array($output,'day');

	return $output;

}

function notify_birthday(){
	$rows_member=getAllActiveMid();
	$output=array();
	//循环出一个含有有效生日的激活用户array
	$n=0;
	foreach($rows_member as $row_member){
		$time = time();
		$mid= $row_member['mid'];
		$name= getMemberInfo($mid)['name'];
		$birthday_raw=getMemberInfo($mid)['birthday'];
		if($birthday_raw!='0000-00-00'){
			$Ymd = explode('-', $birthday_raw);
			$birthday = $Ymd[1].'-'.$Ymd[2];
			
			for ($i = 0; $i <= 3; $i++){
				if (date('m-d', $time) == $birthday){
						$output[$n]['mid']=$mid;
						$output[$n]['name']=$name;
						$output[$n]['birthday_raw']=$birthday_raw;
						$output[$n]['age']=date('Y', $time)-$Ymd[0];
						$output[$n]['days_left']=$i;
				}
				$time = $time + 24 * 3600;	
			}
			$n++;
		}
		
	}
	$output=sort_array($output,'days_left');

	return $output;
	
}