<?php require_once("includes/head.php");

$mid=$_REQUEST['mid'];
$row=getMemberInfo($mid);
$school_arr=getAllSchool();
print_r($row);

?>
<div id="do_member_info" data-role='page' data-title='修改成员信息'>
	<div data-role='header' data-position='fixed' class="header" data-tap-toggle="false">
		<h2>修改成员信息</h2>
		<a href="<?php echo 'member.php?mid='.$mid ?>"
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
			id="do_member_edit_btn" >
		确定</a>
	</div>

	<div data-role='content'>
		<div class="member_info_top">
		<?php 
			if(!empty($row['avatar'])){
				echo '<img src="images/uploads/avatar_150/'.$row['avatar'].'" class="member_avatar">';
			}else{
				echo '<img src="images/uploads/avatar/default.jpg" class="member_avatar">';
			}
		?>
		</div>
		<form action="doAction.php?act=edit_member" method="post" data-ajax="false" enctype="multipart/form-data" id="do_member_edit_form">
		<label for="member_name">姓名:</label>
		<input type="text" name="name" id="member_name" value="<?php echo $row['name']; ?>">
		<fieldset data-role="controlgroup" data-type="horizontal" data-mini="true">
			<input type="radio" name="gender" id="member_gender_boy" value="boy" <?php if($row['gender']==='boy'){echo 'checked="checked"';} ?>>
			<label for="member_gender_boy">男生</label>
			<input type="radio" name="gender" id="member_gender_girl" value="girl" <?php if($row['gender']==='girl'){echo 'checked="checked"';} ?>>
			<label for="member_gender_girl">女生</label>
		</fieldset>
		<br>
		<label for="member_avatar">新照片:</label>
		<input type="file" name="avatar" id="avatar" >
		<label for="member_birthday">生日:</label>
		<input type="date" name="birthday" id="member_birthday" value="<?php echo $row['birthday']; ?>">
		<label for="member_height">身高:</label>
		<input type="number" name="height" id="member_height" placeholder="厘米" value="<?php echo $row['height']; ?>">
		<label for="member_weight">体重:</label>
		<input type="number" name="weight" id="member_weight" placeholder="千克" value="<?php echo $row['weight']; ?>">
		<label for="member_regtime">入营时间:</label>
		<input type="date" name="regTime" id="member_regtime" value="<?php echo $row['regTime']; ?>">

		
		<?php 
		if($school_arr){
			echo '<label for="sid" class="select">学校:</label>';
			echo '<select name="sid" id="member_school">';
			foreach ($school_arr as $school) {
				if($row['sid']==$school['sid']){
					$check= 'selected="selected" ';
				}else{
					$check='';
				}
				echo '<option value="'.$school['sid'].'" '.$check.'>'.$school['school'].'</option>';
			}
			echo '</select>';
		}
		 ?>
		<fieldset data-role="controlgroup" data-type="horizontal" data-mini="true">
			<input type="radio" name="grade" id="grade1" value="1" <?php if($row['grade']==1){echo 'checked="checked"';} ?>>
			<label for="grade1">初一</label>
			<input type="radio" name="grade" id="grade2" value="2" <?php if($row['grade']==2){echo 'checked="checked"';} ?>>
			<label for="grade2">初二</label>
			<input type="radio" name="grade" id="grade3" value="3" <?php if($row['grade']==3){echo 'checked="checked"';} ?>>
			<label for="grade3">初三</label>
		</fieldset>
		<label for="member_class">班级:</label>
		<input type="number" name="class" id="member_class" value="<?php echo $row['class']; ?>">
		<label for="">电话:</label>
		<input class="" type="number" name="phone" id="member_phone" placeholder="电话号码" value="<?php echo $row['phone']; ?>">
		<input class="" type="text" name="owner" id="member_phone_owner" placeholder="拥有者" value="<?php echo $row['owner']; ?>">
		<!-- <button class="ui-btn ui-icon-plus ui-btn-icon-left ">添加电话</button> -->
		<label for="member_qq">QQ:</label>
		<input type="number" name="qq" id="member_qq" value="<?php echo $row['qq']; ?>">
		<label for="member_address">住址:</label>
		<input type="text" name="address" id="member_address" value="<?php echo $row['address']; ?>">
		<label for="member_notes">备注:</label>
		<textarea cols="40" rows="8" name="notes" id="member_notes" ><?php echo $row['notes']; ?></textarea>
		<label for="">成员状态:</label>
		<select name="activeFlag" id="member_state" data-role="slider">
			<option value="0" <?php if($row['activeFlag']==1){echo 'selected="selected" ';} ?> >未激活</option>
			<option value="1" <?php if($row['activeFlag']==1){echo 'selected="selected" ';} ?>>激活</option>
		</select>
		<input type="hidden" name="mid" value="<?php echo $mid ?>">
		<?php 
		if(!empty($row['avatar'])){
			echo '<input type="hidden" name="avatar_old" value="'.$row['avatar'].'">';
		}
		 ?>
		<!-- <input type="submit" value="提交" > -->
		</form>
	</div>
</div>

<script>
	// 点击顶部右侧按钮,提交表格
	$("#do_member_edit_btn").on('click',function(){
		$('#do_member_edit_form').submit();
	})

	//为 电话号码 和 拥有者 输入框的父元素添加class
	$(document).ready(function(){ 
		$("#member_phone").parent().addClass('phone_num'); 
		$("#member_phone_owner").parent().addClass('phone_owner'); 
	}); 
</script>
<?php require_once("includes/foot.php") ?>
