<?php

$layout_defs['OBJ_Indicators']['subpanel_setup'] = array(
	'conditions' => array(
		'order' => 100,
		'module' => 'OBJ_Conditions',
		'get_subpanel_data' => 'conditions',
		'sort_order' => 'asc',
		'sort_by' => 'name',
		'subpanel_name' => 'default',
		'title_key' => 'LBL_SUBPANEL_CONDITIONS',
		'top_buttons' => array(
			array('widget_class' => 'SubPanelTopCreateButton'),
		),
	),
);

?>