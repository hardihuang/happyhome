<?php require_once("includes/head.php") ;
$rows1=getAllMembers(1);
$rows2=getAllMembers(2);
$rows3=getAllMembers(3);
$rows4=getAllMembers(1,0);
?>

<!-- member list page -->
<div id="member_list" data-role='page' data-title='member_list'>
	
	<div data-role='header' data-position='fixed' data-tap-toggle="false">
			<h2>成员列表</h2>
		<a href="doAction.php?act=logout"
			rel='external'
			data-icon='power'
			data-iconpos='notext'
			data-direction='reverse'
			class='ui-btn-left'
			data-transition="none" >
		退出</a>
		<a href="do_member_info.php"
			rel='external'
			data-icon='plus'
			data-iconpos='notext'
			data-direction='reverse'
			class='ui-btn-right'
			data-transition="none" >
		添加新成员</a>
	</div>
	
	<div data-role='content'>
		
		<form>
			<input id="filter-for-memberlist" data-type="search" placeholder="请输入想查找的成员">
		</form>

		<!-- 初一 -->
			<?php
			if($rows1){
				echo '<ul data-role="listview" data-inset="true" data-filter="true" data-input="#filter-for-memberlist">';
				echo '<li data-role="list-divider">初一<span class="ui-li-count">'.count($rows1).'</span></li>';
				foreach($rows1 as $row1){
					echo '<li><a href="member.php?mid='.$row1['mid'].'" rel="external">';
					if(!empty($row1['avatar'])){
						echo '<img src="images/uploads/avatar_80/'.$row1['avatar'].'">';
					}else{
						echo '<img src="images/uploads/avatar/default.jpg">';
					}
					echo '<h2>'.$row1['name'].'</h2><p>'.$row1['phone'].'</p>';
					echo '</a></li>';
				}
				echo '</ul>';
			}
			?>
			

		<!-- 初二 -->
			<?php 
			if($rows2){
				echo '<ul data-role="listview" data-inset="true" data-filter="true" data-input="#filter-for-memberlist">';
				echo '<li data-role="list-divider">初二<span class="ui-li-count">'.count($rows2).'</span></li>';
				foreach($rows2 as $row2){
					echo '<li><a href="member.php?mid='.$row2['mid'].'" rel="external">';
					if(!empty($row2['avatar'])){
						echo '<img src="images/uploads/avatar_80/'.$row2['avatar'].'">';
					}else{
						echo '<img src="images/uploads/avatar/default.jpg">';
					}
					echo '<h2>'.$row2['name'].'</h2><p>'.$row2['phone'].'</p>';
					echo '</a></li>';
				}
				echo '</ul>';
			}
			 ?>


		<!-- 初三 -->
			<?php 
			if($rows3){
				echo '<ul data-role="listview" data-inset="true" data-filter="true" data-input="#filter-for-memberlist">';
				echo '<li data-role="list-divider">初三<span class="ui-li-count">'.count($rows3).'</span></li>';
				foreach($rows3 as $row3){
					echo '<li><a href="member.php?mid='.$row3['mid'].'" rel="external">';
					if(!empty($row3['avatar'])){
						echo '<img src="images/uploads/avatar_80/'.$row3['avatar'].'">';
					}else{
						echo '<img src="images/uploads/avatar/default.jpg">';
					}
					echo '<h2>'.$row3['name'].'</h2><p>'.$row3['phone'].'</p>';
					echo '</a></li>';
				}
				echo '</ul>';
			}
			 ?>

			 
		<!-- 未激活 -->
			<?php 
			if($rows4){
				echo '<div data-role="collapsible"><h2>未激活</h2><ul data-role="listview" data-inset="true" data-filter="true" data-input="#filter-for-listview">';
				foreach($rows4 as $row4){
						echo '<li><a href="member.php?mid='.$row4['mid'].'" rel="external">';
						if(!empty($row4['avatar'])){
							echo '<img src="images/uploads/avatar_80/'.$row4['avatar'].'">';
						}else{
							echo '<img src="images/uploads/avatar/default.jpg">';
						}
						echo '<h2>'.$row4['name'].'</h2><p>'.$row4['phone'].'</p>';
						echo '</a></li>';
					}
				echo '</ul></div>';
			}
			 ?>
		

	</div>

<?php require_once("includes/footer.php") ?>
</div>

<?php require_once("includes/foot.php") ?>