<?php

	### NEW WITH MODULE INSTALLATION ###
	//this metadata will be added to the accounts layout_def extensions during the installation

	$layout_defs['Accounts']['subpanel_setup']['inventory_items'] = array(
		'order'			=> 9,
		'module'		=> 'Inventory_items',
		'subpanel_name'		=> 'default',
		'get_subpanel_data'	=> 'inventory_items',
		'add_subpanel_data'	=> 'inventory_id',
		'title_key'		=> 'LBL_INVENTORY_ITEMS_SUBPANEL_TITLE',
		'top_buttons'		=> array(),
	);

?>
