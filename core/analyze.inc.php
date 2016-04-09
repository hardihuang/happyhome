<?php

// 更新数据库月收入
function update_month_fee(){
	$month=explode('-',unix2date(time()-60*60*24*30));
	for($i=1;$i<=$month[1];$i++){
		$date=$month[0].'-'.$i;
		month_total_fee($date);
	}
	return "更新成功!<meta http-equiv='refresh' content='1;url=analyze.php'/>";
}

//从db里的数据计算某月份的总收入并写入数据库
//$month string eg:'2015-10'
function month_total_fee($month){
	$year=explode('-', $month)[0];
	$mon=explode('-', $month)[1];
	//获取需要的月份相应交费记录并计算总费用
	$sql="select fee,date,dueDate from hh_fee";
	$rows=fetchAll($sql);
	$total=0;
	foreach ($rows as $row) {
		$day1=$row['date'];
		$day2=$row['dueDate'];
		$fee=$row['fee'];
		$T=ceil($fee/days_dis($day1,$day2));//$T为 该笔学费每天的收入
		$days=month_days($day1,$day2,$month);
		if($days){
			$total=($days*$T)+$total;
		}
	}
	$arr=array('year'=>$year,'month'=>$mon,'total'=>$total);

	//如果已存在相应日期记录，则进行更新操作，否则进行插入
	$sql="select count(total) from hh_totalFee where year=$year and month=$mon";
	$result=fetchOne($sql)['count(total)'];

	if($result>=1){
		update('hh_totalFee',$arr,"year=$year and month=$mon");
	}else{
		insert('hh_totalFee',$arr);
	}
	
}

// 计算两个日期相差的天数
// $start string eg:2015-10-05
// $end string eg:2015-11-05
// return string '15'
function days_dis($start,$end){
	//将传入的两个日期转化成unix时间戳
	$start=explode('-', $start);
	$end=explode('-', $end);
	$start=mktime(0,0,0,$start[1],$start[2],$start[0]);
	$end=mktime(0,0,0,$end[1],$end[2],$end[0]);
	//如果起始日期大于结束日期则反转，如果相等则返回0天
	if($start>$end){
		list($start,$end)=array($end,$start);
	}elseif($start==$end){
		return 0;
	}
	//计算出相差天数并返回
	$days=($end-$start)/(3600*24);
	return $days;
}

// 返回一个时间段和一个月份的交集天数
// $start string eg:'2015-10-17'
// $end string eg:'2015-12-26'
// $month string eg:'2015-10-01'
// return string '29'
function month_days($start,$end,$month){
	// 将传入的起止日期和传入月份的1号到31号四个日期转换成unix时间戳，进行数字比较
	$start=explode('-', $start);
	$end=explode('-', $end);
	$month=explode('-', $month);
	$day1=mktime(0,0,0,$start[1],$start[2],$start[0]);
	$day2=mktime(0,0,0,$end[1],$end[2],$end[0]);
	if($day1>$day2){
		list($day1,$day2)=array($day2,$day1);
	}
	$month1=mktime(0,0,0,$month[1],1,$month[0]);
	$month2=mktime(0,0,0,$month[1]+1,1,$month[0]);
	// echo 'start: '.unix2date($day1).'<br>';
	// echo 'end: '.unix2date($day2).'<br>';
	// echo 'month start: '.unix2date($month1).'<br>';
	// echo 'month end: '.unix2date($month2).'<br>';
	
	//两组日期之间没有交集
	if($day2<=$month1 || $day1>=$month2){
		return false;
	}
	//两组日期一方完全包含另一方(内切与内含)或相等
	if($day1>=$month1 && $day2<=$month2){
		return ($day2-$day1)/(3600*24);
	}
	if($day1<=$month1 && $day2>=$month2){
		return '31';
	}
	//两组日期部分相交
	if($day1>$month1 && $day1<$month2 && $day2>$month2){
		return ($month2-$day1)/(3600*24);
	}
	if($month1>$day1 && $month1<$day2 && $month2>$day2){
		return ($day2-$month1)/(3600*24);
	}
	return false;
}

//将unix时间转换为年-月-日格式
//$unix string '995434545'
//return '2001-7-18'
function unix2date($unix){
	$day=getdate($unix);
	return $day['year'].'-'.$day['mon'].'-'.$day['mday'];
}

