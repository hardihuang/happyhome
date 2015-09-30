<?php require_once("includes/head.php"); 
$school_arr=getAllSchool();
?>
<div id="do_member_info" data-role='page' data-title='添加成员'>
	<div data-role='header' data-position='fixed' class="header" data-tap-toggle="false">
		<h2>添加成员</h2>
		<a href="index.php"
			rel="external"
			data-icon='delete'
			data-iconpos='notext'
			data-direction='reverse'
			class='ui-btn-left'
			data-transition="none" >
		取消</a>
		<a href="#"
			rel="external"
			data-icon='check'
			data-iconpos='notext'
			data-direction='reverse'
			class='ui-btn-right'
			data-transition="none" 
			id="do_member_info_btn">
		确定</a>
	</div>

	<div data-role='content'>
		<form action="doAction.php?act=add_member" method="post" data-ajax="false" enctype="multipart/form-data" id="do_member_info_form">
		<label for="member_name">姓名:</label>
		<input type="text" name="name" id="member_name">
		<fieldset data-role="controlgroup" data-type="horizontal" data-mini="true">
			<input type="radio" name="gender" id="member_gender_boy" value="boy" checked="checked">
			<label for="member_gender_boy">男生</label>
			<input type="radio" name="gender" id="member_gender_girl" value="girl">
			<label for="member_gender_girl">女生</label>
		</fieldset>
		
		<label for="member_avatar">照片:</label>
		<input type="file" name="avatar" id="avatar" >
		<label for="member_birthday">生日:</label>
		<input type="date" name="birthday" id="member_birthday">
		<label for="member_height">身高:</label>
		<input type="number" name="height" id="member_height" placeholder="厘米">
		<label for="member_weight">体重:</label>
		<input type="number" name="weight" id="member_weight" placeholder="千克">
		<label for="member_regtime">入营时间:</label>
		<input type="date" name="regTime" id="member_regtime" >

		
		
		<?php 
		if($school_arr){
			echo '<label for="sid" class="select">学校:</label>';
			echo '<select name="sid" id="member_school">';
			foreach ($school_arr as $school) {
				echo '<option value="'.$school['sid'].'">'.$school['school'].'</option>';
			}
			echo '</select>';
		}
		 ?>
		
		<fieldset data-role="controlgroup" data-type="horizontal" data-mini="true">
			<input type="radio" name="grade" id="grade1" value="1" checked="checked">
			<label for="grade1">初一</label>
			<input type="radio" name="grade" id="grade2" value="2">
			<label for="grade2">初二</label>
			<input type="radio" name="grade" id="grade3" value="3">
			<label for="grade3">初三</label>
		</fieldset>
		<label for="member_class">班级:</label>
		<input type="number" name="class" id="member_class" >
		<label for="member_phone">电话:</label>
		<input class="member_phone" type="number" name="phone" id="member_phone" placeholder="电话号码">
		<input class="member_phone_owner" type="text" name="owner" id="member_phone_owner" placeholder="拥有者">
		<div class="clear"></div>
		<!-- <a class="ui-btn ui-icon-plus ui-btn-icon-left" id="add_phone_btn">添加电话</a> -->
		<label for="member_qq">QQ:</label>
		<input type="number" name="qq" id="member_qq" >
		<label for="member_address">住址:</label>
		<input type="text" name="address" id="member_address">
		<label for="member_notes">备注:</label>
		<textarea cols="40" rows="8" name="notes" id="member_notes" ></textarea>
		<label for="">成员状态:</label>
		<select name="activeFlag" id="member_state" data-role="slider">
			<option value="0" >未激活</option>
			<option value="1" selected="">激活</option>
		</select>
		<!-- <input type="submit" value="提交" > -->
		</form>
	</div>
</div>
<script>
	// 点击顶部右侧按钮,提交表格
	$("#do_member_info_btn").on('click',function(){
		$('#do_member_info_form').submit();
	});

	//点击添加电话按钮添加一行新的电话input
	var phone_count=1;
	$("#add_phone_btn").on('click',function(){

		var html_phone='<div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset phone_num"><input class="member_phone" type="number" name="phone'+phone_count+'" id="member_phone'+phone_count+'" placeholder="电话号码'+phone_count+'"></div>';
		var html_owner='<div class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset phone_owner"><input class="member_phone_owner" type="text" name="owner'+phone_count+'" id="member_phone_owner'+phone_count+'" placeholder="拥有者'+phone_count+'"></div>';
		$("#add_phone_btn").before(html_phone+html_owner)
		phone_count++;
	});

	//为 电话号码 和 拥有者 输入框的父元素添加class,使其并排显示
	$(document).ready(function(){ 
		$(".member_phone").parent().addClass('phone_num'); 
		$(".member_phone_owner").parent().addClass('phone_owner'); 
	}); 
</script>
<?php require_once("includes/foot.php") ?>
