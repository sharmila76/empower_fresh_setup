<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

//this metadata file defines the popup for widgets when called by other modules
$popupMeta = array(
	'moduleMain' => 'Inventory_item',
	'varName' => 'INVENTORY_ITEM',
	'orderBy' => 'inventory_items.artist',
	'whereClauses' => 
		array(
			'title' => 'inventory_items.title', 
			'artist' => 'inventory_items.artist'
		),
	'searchInputs' =>
		array(
			'title',
			'artist'
		)
	);
?>
 
 
