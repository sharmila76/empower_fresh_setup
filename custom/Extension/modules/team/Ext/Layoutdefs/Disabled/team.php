<?php
$layout_defs["team"]["subpanel_setup"]["team_memberships"] = array (
  'order' => 100,
  'module' => 'Users',
  'subpanel_name' => 'CETeams',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TEAM_MEMBERSHIPS_FROM_USERS_TITLE',
  'get_subpanel_data' => 'team_memberships',
  'top_buttons' => array(
	array(
		'widget_class'  => 'SubPanelTopCreateButton'
	),
	array(
		'widget_class'  => 'SubPanelTopSelectButton',
		'popup_module'  => 'Users',
		'mode'          => 'MultiSelect'
	),
  ),
);
?>
