<?php require_once("includes/head.php");

?>
<div id="settings" data-role='page' data-title='settings'>

	<div data-role='header' data-position='fixed' data-tap-toggle="false">
		<h2>设置</h2>
		<a href="notification.php"
			rel="external"
			data-icon='carat-l'
			data-iconpos='notext'
			data-direction='reverse'
			class='ui-btn-left'
			data-transition="none" >
		取消</a>
		<!-- <a href="#"
			rel="external"
			data-icon='check'
			data-iconpos='notext'
			data-direction='reverse'
			class='ui-btn-right'
			data-transition="none" 
			id="do_settings_save_btn">
		确定</a> -->
	</div>

	<div data-role='content'>
		
		<label for="change_grade">更改学习营成员年级：</label>
		<small>请在每年的中考结束后使用此功能，更新所有成员的年级</small><br>
		<!-- <a href="doAction.php?act=minus_grade"
			rel="external"
			data-direction='reverse'
			class='ui-btn ui-btn-inline ui-icon-arrow-l ui-btn-icon-bottom'>
		减少一年级</a> -->
		<a href="doAction.php?act=add_grade"
			rel="external"
			data-direction='reverse'
			class='ui-btn ui-btn-inline ui-icon-arrow-r ui-btn-icon-bottom'>
		增加一年级</a>
		<br><br>
		
		<label for="change_grade">更新月收入：</label>
		<small>请在月初使用此功能，以便程序计算出最新的月收入并将数据显示在统计页面的统计图中</small><br>
		<a href="doAction.php?act=update_month_fee"
			rel="external"
			data-direction='reverse'
			class='ui-btn ui-btn-inline ui-icon-arrow-r ui-btn-icon-bottom'>
		更新月收入</a>
	</div>

</div>
<?php require_once("includes/foot.php") ?>