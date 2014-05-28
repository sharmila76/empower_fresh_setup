<?php

	### List of fields to display for list view ###

	$listViewDefs['Inventory_items'] = array(
		
		'INVENTORY_NUMBER' => array(
			'width' => '10',
			'label' => 'LBL_INVENTORY_NUMBER',
			'default' => true,
			'link' => true
			),

		'TITLE' => array(
			'width' => '10',
			'label' => 'LBL_TITLE',
			'default' => true
			),
			 
		'MEDIUM' => array(
			'width' => '5',
			'label' => 'LBL_MEDIUM',
			'default' => true
			),

		'HEIGHT' => array(
			'width' => '2',
			'label' => 'LBL_VIEW_HEIGHT',
			'default' => true
			),
		
		'WIDTH' => array(
			'width' => '2',
			'label' => 'LBL_VIEW_WIDTH',
			'default' => true
			),

		'DEPTH' => array(
			'width' => '2',
			'label' => 'LBL_VIEW_DEPTH',
			'default' => true
			),
		
		'FACILITY' => array( 
			'width' => '5',
			'label' => 'LBL_FACILITY',
			'default' => true
			),

		'IN_STORAGE' => array(
			'width' => '5',
			'label' => 'LBL_VIEW_IN_STORAGE',
			'default' => true
			),

		'SQUARE_FOOTAGE' => array(
			'width' => '5',
			'label' => 'LBL_VIEW_SQUARE_FOOTAGE',
			'default' => true
			),

		'ACCOUNT_NAME' => array(
			'width' => '5',
			'label' => 'LBL_ACCOUNT_NAME',
			'default' => true
			)
		);
?>
<?php
/*
   This limits the ListView based on teams - part of the CE Teams module
   It is a template which is added to the end of modules/<module>/metadata/listviewdefs.php
   by the custom logic whenever it is needed
   This is needed because there is no logic hook that can modify the listview query
*/
require_once "modules/team/teams_logic.php";
$tmp = new teams_logic();
$tmp->limit_list_access($this, 'before_listview');
?>
