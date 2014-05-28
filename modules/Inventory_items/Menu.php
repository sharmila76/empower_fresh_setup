<?php 

if( ! defined('sugarEntry') || ! sugarEntry ) die('Not A Valid Entry Point');

global $mod_strings, $app_strings;


### DEFINE MENU OPTIONS ###

$module_menu = Array(


	### OPTION: Create Inventory Item ###

	Array("index.php?module=Inventory_items&action=EditView&return_module=Inventory_items&return_action=DetailView&clear_query=true", 				
		$mod_strings['LNK_NEW_INVENTORY_ITEM'],
		"CreateInventory_Item"
		),


	### OPTION: List View of Inventory Items ###

	Array("index.php?module=Inventory_items&action=ListView&clear_query=true&query=true&searchFormTab=basic_search",
		$mod_strings['LNK_INVENTORY_ITEMS_LIST'],
		"Inventory_items"
		)
	);
?>

