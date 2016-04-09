<?php require_once("includes/head.php");
$rows1=notify_fee(1);
$rows2=notify_fee(2);
$rows3=notify_fee(3);
$rows4=notify_birthday();
 ?>
<div id="notification" data-role='page' data-title='notification'>

	<div data-role='header' data-position='fixed' data-tap-toggle="false">
		<h2>消息</h2>
		<a href="doAction.php?act=logout"
			rel='external'
			data-icon='power'
			data-iconpos='notext'
			data-direction='reverse'
			class='ui-btn-left'
			data-transition="none" >
		退出</a>
		<a href="settings.php"
			rel='external'
			data-icon='gear'
			data-iconpos='notext'
			data-direction='reverse'
			class='ui-btn-right'
			data-transition="none" >
		设置</a>
	</div>

	<div data-role='content'>
		
		<ul data-role="listview">
			<li style="background-color: #F9F9F9"><center style="color: #828282">今天是: <?php echo date('Y年m月d日',time()); ?></center></li>
			<?php 
			if($rows3){
				foreach ($rows3 as $row3) {
					echo '<li><a  class="bgc_red" href="member.php?mid='.$row3['mid'].'#member_fee" rel="external"><strong>'.$row3['name'].'</strong> 已超过交费期 <i>'.ltrim($row3['day'],'-').'</i> 天 ('.$row3['fee'].'￥)</a></li>';
				}
			}
			
			if($rows2){
				foreach ($rows2 as $row2) {
					echo '<li><a  class="bgc_yellow" href="member.php?mid='.$row2['mid'].'#member_fee" rel="external"><strong>'.$row2['name'].'</strong> 今天 费用到期  ('.$row2['fee'].'￥)</a></li>';
				}
			}

			if($rows1){
				foreach ($rows1 as $row1) {
					echo '<li><a  class="bgc_green" href="member.php?mid='.$row1['mid'].'#member_fee" rel="external"><strong>'.$row1['name'].'</strong> <i>'.$row1['day'].'</i> 天后费用到期  ('.$row1['fee'].'￥)</a></li>';
				}
			}
			if($rows4){
				foreach ($rows4 as $row4){
					if($row4['days_left']===0){
						echo '<li><a  class="bgc_birthday" href="member.php?mid='.$row4['mid'].'#member_info" rel="external">今天是 <strong>'.$row4['name'].'</strong> 的 '.$row4['age'].' 岁生日哦！</a></li>';
					}else{
						echo '<li><a  class="bgc_birthday" href="member.php?mid='.$row4['mid'].'#member_info" rel="external"><strong>'.$row4['name'].'</strong> <i>'.$row4['days_left'].'</i> 天后将过 '.$row4['age'].' 岁生日 </a></li>';
					}

				}
			}
			
			 ?>
		</ul>
	</div>
<?php require_once("includes/footer.php") ?>
</div>
<?php require_once("includes/foot.php") ?>