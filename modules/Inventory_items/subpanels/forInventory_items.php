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
		'user_name' => array(
			'vname' => 'LBL_USER_NAME',
			'width' => '10%',
			'sortable' => false
			),
		'changed_field' => array(
		 	'vname' => 'LBL_CHANGED_FIELD',
			'width' => '15%',
			'sortable'=>false,
      		),
		'value' => array(
		 	'vname' => 'LBL_VALUE',
			'width' => '15%',
			'sortable'=>false,
      		),
    		'date' => array(
			'vname' => 'LBL_DATE',
			'width' => '10%',
			'sortable'=>false,
      			)
		)
  	);
?>
