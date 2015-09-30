<div role="main" class="ui-content">
<?php 
$rows=getMemberFen($mid);
$fenTotal=getFenTotal($mid);
// print_r($rows);
 ?>
<h2 class="member_fen_top">当前积分: <i><?php echo $fenTotal ?></i></h2>
<table data-role="table"  data-mode="table" class="ui-body-d ui-shadow table-stripe">
	<thead>
		<tr class="ui-bar-d">
			<th>状态</th>
			<th>金额</th>
			<th>原因</th>
			<th>日期</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		if(!empty($rows)){
			foreach ($rows as $row) {
				$state=($row['state']==0) ? ('减'):('加');
				echo '<tr>';
				echo '<td>'.$state.'</td>';
				echo '<td>'.$row['fen'].'</td>';
				echo '<td>'.$row['notes'].'</td>';
				echo '<td>'.$row['date'].'</td>';
			}
		}
		 ?>
	</tbody>
</table>
</div>