<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
 
require_once('include/utils.php');


### INFO FOR ADDITIONAL DETAILS DIV ###

function additionalDetailsInventory_item($fields)
{
	static $mod_strings;
	global $app_strings;

	//if mod_strings can be accessed for the module, load the current language
	if(empty($mod_strings))
	{
		global $current_language;
		$mod_strings = return_module_language($current_language, 'Inventory_items');
	}

	$overlib_string = '';

	if(!empty($fields['ARTIST']))
	{
		$overlib_string .= '<b>'. $mod_strings['LBL_ARTIST'] . '</b> ' . $fields['ARTIST'] . '<br>';
	}

	if(!empty($fields['TITLE']))
	{ 
		$overlib_string .= '<b>'. $mod_strings['LBL_TITLE'] . '</b> ' . substr($fields['TITLE'], 0, 100);
		if(strlen($fields['TITLE']) > 100) $overlib_string .= '...';
		$overlib_string .= '<br>';
	}

	return array(
		//the fieldTOAddTo value denotes the listview column to add the mouseover addt'l details to
		'fieldToAddTo' => 'ARTIST', 
		'string' => $overlib_string, 
		'editLink' => "index.php?action=EditView&module=Inventory_items&return_module=Inventory_items&record={$fields['ID']}", 
		'viewLink' => "index.php?action=DetailView&module=Inventory_items&return_module=Inventory_items&record={$fields['ID']}"
	);
}

?>