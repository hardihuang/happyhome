<div role="main" class="ui-content">
<?php
$rows=getMemberFee($mid);
// print_r($rows);
?>
<table data-role="table"  data-mode="table" class="ui-body-d ui-shadow table-stripe">
	<thead>
		<tr class="ui-bar-d">
			<th>日期</th>
			<th>金额</th>
			<th>到期</th>
			<th>备注</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		if(!empty($rows)){
			$i=0;
			foreach ($rows as $row) {

				echo '<tr>';
				echo '<td>'.$row['date'].'</td>';
				echo '<td>'.$row['fee'].'</td>';
				echo '<td>'.$row['dueDate'].'</td>';
				if(!empty($row['notes'])){
					echo '<td><a href="#fen-info-pop-'.$i.'" data-rel="popup" data-transition="pop" class="fen-info-pop my-tooltip-btn ui-btn ui-alt-icon ui-nodisc-icon ui-btn-inline ui-icon-info ui-btn-icon-notext" title="Learn more">备注</a>';
					echo '<div data-role="popup" id="fen-info-pop-'.$i.'" class="ui-content" data-theme="a" style="max-width:350px;"><p>'.$row['notes'].'</p></div></td>';
				}else{
					echo '<td>空</td>';
				}
				echo '</tr>';
				$i++;
			}
		}
		?>
	</tbody>
</table>
</div>