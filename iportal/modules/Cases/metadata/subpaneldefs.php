<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$layout_defs['Cases'] = array(
	// list of what Subpanels to show in the DetailView 
	'subpanel_setup' => array(
		'notes' => array(
			'order' => 10,
			'module' => 'Notes',
			'sort_order' => 'asc',
			'sort_by' => 'notes.name',
			'subpanel_name' => 'default',
			'get_subpanel_data' => 'notes',
			'set_subpanel_data' => 'notes',
			'title_key' => 'LBL_NOTES_SUBPANEL_TITLE',
			'fill_in_additional_fields' => true,
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
                   
                   /* 'top_buttons' => array(
                        array('widget_class' => 'SubPanelTopButtonQuickCreate'),
                                        array(
                                                'widget_class' => 'SubPanelTopSelectButton',
                                                'popup_module' => 'Bugs',
                                                'mode' => 'MultiSelect',
                                        ),
                    ),*/
		), 
	),
);
?>
