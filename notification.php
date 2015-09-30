<?php require_once("includes/head.php");
$rows1=notify_fee(1);
$rows2=notify_fee(2);
$rows3=notify_fee(3);
 ?>
<div id="notification" data-role='page' data-title='notification'>

	<div data-role='header' data-position='fixed' data-tap-toggle="false">
		<h2>消息</h2>
	</div>

	<div data-role='content'>
		
		<ul data-role="listview">
			<?php 
			if($rows3){
				foreach ($rows3 as $row3) {
					echo '<li><a  class="bgc_red" href="member.php?mid='.$row3['mid'].'#member_fee" rel="external"><strong>'.$row3['name'].'</strong> 已超过交费期 <i>'.ltrim($row3['day'],'-').'</i> 天</a></li>';
				}
			}
			
			if($rows2){
				foreach ($rows2 as $row2) {
					echo '<li><a  class="bgc_yellow" href="member.php?mid='.$row2['mid'].'#member_fee" rel="external"><strong>'.$row2['name'].'</strong> 今天 费用到期</a></li>';
				}
			}

			if($rows1){
				foreach ($rows1 as $row1) {
					echo '<li><a  class="bgc_green" href="member.php?mid='.$row1['mid'].'#member_fee" rel="external"><strong>'.$row1['name'].'</strong> <i>'.$row1['day'].'</i> 天后费用到期</a></li>';
				}
			}
			
			 ?>
		</ul>
	</div>
<?php require_once("includes/footer.php") ?>
</div>
<?php require_once("includes/foot.php") ?>