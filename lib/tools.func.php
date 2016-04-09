<?php 

// 使用一个字段，对一个二维数组进行升序或降序排列，并返回一个新数组
function sort_array($arr,$field,$direction='SORT_ASC'){

	$sort = array(  
        'direction' => $direction, //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序  
        'field'     => $field,       //排序字段  
	);  
	$arrSort = array();  
	foreach($arr AS $uniqid => $row){  
	    foreach($row AS $key=>$value){  
	        $arrSort[$key][$uniqid] = $value;  
	    }  
	}  
	if($sort['direction']){  
	    array_multisort($arrSort[$sort['field']], constant($sort['direction']), $arr);  
	}  
	return $arr;
}