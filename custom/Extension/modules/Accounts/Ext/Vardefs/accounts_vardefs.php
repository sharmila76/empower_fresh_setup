<?php

//NEW WITH MODULE INSTALLATION
$dictionary['Account']['fields']['inventory_items'] = array (
	'name'			=> 'inventory_items',
	'type'			=> 'link',
	'relationship'		=> 'accounts_inventory_items',
	'module'		=> 'Inventory_items',
	'bean_name'		=> 'Inventory_item',
	'source'		=> 'non-db',
	'vname'			=> 'LBL_INVENTORY_ITEMS'
	);

?>
