<?php

$subpanel_layout = array(

	### BUTTONS TO ADD TO TOP OF SUB PANEL ###

	'top_buttons' => array(),


	### WHERE CLAUSE FOR FILTERING RESULTS ###

	'where' => '',


	### FILL IN ADDITIONAL FIELDS? ###

	'fill_in_additional_fields' => true,


	### FIELDS TO SHOW ON SUBPANEL ###

	'list_fields' => array(
		'inventory_number' => array(
			'vname' => 'LBL_INVENTORY_NUMBER',
			'width' => '10%',
			'sortable' => true,
			'widget_class' => 'SubPanelDetailViewLink'
			),
		'artist' => array(
			'vname' => 'LBL_ARTIST',
			'width' => '10%',
			'sortable' => false
			),
		'title' => array(
		 	'vname' => 'LBL_TITLE',
			'width' => '15%',
			'sortable'=>false,
      		),
    		'medium' => array(
			'vname' => 'LBL_MEDIUM',
			'width' => '10%',
			'sortable'=>false,
      			)
		)
  	);
?>
