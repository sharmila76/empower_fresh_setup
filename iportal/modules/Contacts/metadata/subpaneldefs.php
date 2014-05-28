<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$layout_defs['Contacts'] = array(
	// list of what Subpanels to show in the DetailView
	'subpanel_setup' => array(
        	'cases' => array(
			'order' => 10,
			'module' => 'Cases',
			'sort_order' => 'desc',
			'sort_by' => 'case_number',
			'subpanel_name' => 'default',
			'get_subpanel_data' => 'cases',
			'add_subpanel_data' => 'case_id',
			'title_key' => 'LBL_CASES_SUBPANEL_TITLE',
            'top_buttons' => array(
			   	array('widget_class' => 'SubPanelTopCreateButton'),
			),
            'fill_in_additional_fields'=>true,
		),
                'bugs' => array(
                                'order' => 40,
                                'module' => 'Bugs',
                                'sort_order' => 'desc',
                                'sort_by' => 'bug_number',
                                'subpanel_name' => 'default',
                                'get_subpanel_data' => 'bugs',
                                'add_subpanel_data' => 'bug_id',
                                'title_key' => 'LBL_BUGS_SUBPANEL_TITLE',
		),
	),
);
?>
