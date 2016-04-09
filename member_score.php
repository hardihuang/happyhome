<div role="main" class="ui-content">
<?php 
$rows=getMemberScore($mid);
// print_r($rows);
?>
<table data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive" data-column-btn-text="选择要显示的项目">
<thead>
	<tr class="ui-bar-d">
	<th data-priority="4">#</th>
	<th>年级</th>
	<th>数</th>
	<th>物</th>
	<th data-priority="1">化</th>
	<th>英</th>
	<th data-priority="1">生</th>
	<th data-priority="1">地</th>
	<th data-priority="2">日期</th>
	</tr>
</thead>
<tbody>
	<?php 
	if(!empty($rows)){
		$i=1;
		foreach ($rows as $row) {
			echo '<tr>';
			echo '<td>'.$i.'</td>';
			echo '<td>'.$row['rank'].'</td>';
			echo '<td>'.$row['math'].'</td>';
			echo '<td>'.$row['physics'].'</td>';
			echo '<td>'.$row['chemistry'].'</td>';
			echo '<td>'.$row['english'].'</td>';
			echo '<td>'.$row['biology'].'</td>';
			echo '<td>'.$row['geography'].'</td>';
			echo '<td>'.$row['date'].'</td>';
			echo '</tr>';
			$i++;
		}
	}
	?>
</tbody>
</table>
</div>