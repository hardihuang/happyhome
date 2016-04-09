
<div role="main" class="ui-content member_info">
	<div class="member_info_top">
		<?php 
		if(!empty($rows['avatar'])){
			echo '<img src="images/uploads/avatar_150/'.$rows['avatar'].'" class="member_avatar">';
		}else{
			echo '<img src="images/uploads/avatar/no_avatar.png" class="member_avatar">';
		}
		?>
		
	</div>
	<div class="clear"></div>


	<ul data-role="listview" data-inset="true">
		<li data-role="list-divider">个人</li>
		<li>姓名: <?php echo $rows['name'] ?></li>
		<li>生日: <?php echo $rows['birthday'] ?></li>
		<li>身高: <?php echo $rows['height'] ?>CM</li>
		<li>体重: <?php echo $rows['weight'] ?>KG</li>
		<li>入营时间: <?php echo $rows['regTime'] ?></li>
		
		<?php 
		if($father){
			echo "<li>入营介绍人: <span><a href='member.php?mid=".who_is_the_father($mid)."' class='ui-link' rel='external'>". $father['name'] ."</a></span></li>";
		}
		?>
		
		<li data-role="list-divider">学校</li>
		<li>学校: <?php echo $rows['school'] ?></li>
		<li>年级: 初<?php echo $rows['grade'] ?></li>
		<li>班级: <?php echo $rows['class'] ?>班</li>
		<li data-role="list-divider">联系方式:</li>
		<li>电话: <?php echo $rows['phone'] ?> (<?php echo $rows['owner'] ?>)
			<!-- <ul>
				<li>123 456 7890 (本人)</li>
				<li>456 774 3249 (爸爸)</li>
				<li>724 554 7463 (爷爷)</li>
			</ul> -->
		</li>
		<li>QQ: <?php echo $rows['qq'] ?></li>
		<li>地址: <?php echo $rows['address'] ?></li>
		<li data-role="list-divider">备注:</li>
		<!-- white-space:pre-wrap 可以让 jquery mobile 不对多行文字进行裁剪,从而全部显示出来  -->
		<li style="white-space:pre-wrap;"><?php echo $rows['notes'] ?></li>
	</ul>
</div>