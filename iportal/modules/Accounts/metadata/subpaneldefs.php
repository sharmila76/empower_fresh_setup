<?php

if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');


$layout_defs['Accounts'] = array(
	// list of what Subpanels to show in the DetailView
	'subpanel_setup' => array(
		'contacts' => array(
			'order' => 10,
			'module' => 'Contacts',
			'sort_order' => 'asc',
			'sort_by' => 'last_name, first_name',
			'subpanel_name' => 'ForAccounts',
			'get_subpanel_data' => 'contacts',
			'add_subpanel_data' => 'contact_id',
			'title_key' => 'LBL_CONTACTS_SUBPANEL_TITLE',
			'top_buttons' => array(
				array('widget_class' => 'SubPanelTopCreateButton'),
			),
			'fill_in_additional_fields' => true,
		),
		'cases' => array(
			'order' => 20,
			'sort_order' => 'desc',
			'sort_by' => 'case_number',
			'module' => 'Cases',
			'subpanel_name' => 'ForAccounts',
			'get_subpanel_data' => 'cases',
			'add_subpanel_data' => 'case_id',
			'title_key' => 'LBL_CASES_SUBPANEL_TITLE',
			'top_buttons' => array(
				array('widget_class' => 'SubPanelTopCreateButton'),
			),
			'fill_in_additional_fields' => true,
		),
		'bugs' => array(
			'order' => 30,
			'sort_order' => 'desc',
			'sort_by' => 'bug_number',
			'module' => 'Bugs',
			'subpanel_name' => 'default',
			'get_subpanel_data' => 'bugs',
			'add_subpanel_data' => 'bug_id',
			'title_key' => 'LBL_BUGS_SUBPANEL_TITLE',
		),
	),
);
?>