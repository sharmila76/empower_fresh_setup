<?php

	### CHECK ENTRY POINT ###

	if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

	$GLOBALS['log']->info("Inventory_item detail view");



	### INCLUDED FILES ###
	
	require_once('XTemplate/xtpl.php');
	require_once('data/Tracker.php');
	require_once('modules/Inventory_items/Inventory_item.php');
	require_once('include/DetailView/DetailView.php');


	### GLOBAL VARIABLES ###
	
	global $timedate;
	global $mod_strings;
	global $app_strings;
	global $app_list_strings;
	global $gridline;



	### INITIALIZE INVENTORY ITEM ###
	
	$focus = new Inventory_item();
	$detailView = new DetailView();
	
	$offset=0;
	
	if( isset($_REQUEST['offset']) or isset($_REQUEST['record']) )
	{
		$result = $detailView->processSugarBean("INVENTORY_ITEM", $focus, $offset);
	
		if($result == null) 
		{
		    sugar_die($app_strings['ERROR_NO_RECORD']);
		}
	
		$focus=$result;
	} 
	else 
	{
		header("Location: index.php?module=Inventory_items&action=index");
	}


	### CHECK FOR DUPLICATES ###
	
	if(isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true')
	{
		$focus->id = "";
	}



	### LOAD THEME ###
	
	global $theme;
	$theme_path = "themes/".$theme."/";
	$image_path = $theme_path."images/";
	
	require_once($theme_path.'layout_utils.php');



	### DISPLAY TITLE ###
	
	echo "\n<p>\n";
		echo get_module_title($mod_strings['LBL_MODULE_NAME'], $mod_strings['LBL_MODULE_NAME'].": " . $focus->inventory_number, true);
	echo "\n</p>\n";
	
	
	
	### XTemplate ###
	
	$xtpl = new XTemplate('modules/Inventory_items/DetailView.html');
	
	$xtpl->assign("MOD", 			$mod_strings);
	$xtpl->assign("APP", 			$app_strings);
	
	$xtpl->assign("THEME", 			$theme);
	$xtpl->assign("GRIDLINE", 		$gridline);
	$xtpl->assign("IMAGE_PATH", 		$image_path);
	$xtpl->assign("PRINT_URL", 		"index.php?" . $GLOBALS['request_string']);
	
	
	// Prepend a currency symbol to this monetary value
	
	if($focus->value != '')
	{
		$xtpl->assign("VALUE", '$' . $focus->value);
	}
	
	$xtpl->assign("ID",			$focus->id );
	$xtpl->assign("DATE_ENTERED",		substr($focus->date_entered ,0,10) );
	$xtpl->assign("DATE_MODIFIED",		substr($focus->date_modified,0,10) );
	$xtpl->assign("DATE_RECEIVED",		substr($focus->date_received,0,10) );

	if( $focus->date_left != '2000-01-01 00:00' )
	{
		$xtpl->assign("DATE_LEFT",	substr($focus->date_left,0,10) );
	}

	$xtpl->assign("INVENTORY_NUMBER",	$focus->inventory_number );
	$xtpl->assign("ACCOUNT_NAME",		$focus->account_name );
	$xtpl->assign("ACCOUNT_ID",		$focus->account_id );
	$xtpl->assign("COMPANY_NAME",		$focus->company_name );
	$xtpl->assign("STORAGE_TYPE",		$focus->storage_type );
	$xtpl->assign("ARTIST",			$focus->artist );
	$xtpl->assign("TITLE",			$focus->title );
	$xtpl->assign("CIRCA",			$focus->circa );
	$xtpl->assign("MEDIUM",			$focus->medium );
	$xtpl->assign("DESCRIPTION",		$focus->description );
	$xtpl->assign("HEIGHT",			$focus->height );
	$xtpl->assign("WIDTH",			$focus->width );
	$xtpl->assign("DEPTH",			$focus->depth);
	$xtpl->assign("PACKING",		$focus->packing);
	$xtpl->assign("SQUARE_FOOTAGE",		$focus->square_footage);
	$xtpl->assign("IN_STORAGE",		$focus->in_storage);
	$xtpl->assign("VALUE",			$focus->value);
	$xtpl->assign("INSURED",		$focus->insured);
	$xtpl->assign("FACILITY",		$focus->facility);
	$xtpl->assign("LOCATION",		$focus->location);
	$xtpl->assign("PHOTO",			$focus->photo);
	$xtpl->assign("CONDITION",		$focus->condition);
	$xtpl->assign("CONDITION_DESCRIPTION",	$focus->condition_description);



	### IMAGE AND BARCODE ###
	
	$path = htmlentities( strip_tags( $_SERVER['PHP_SELF'] ) ) . dirname(__FILE__);

	$path = explode( 'index.php', $path );

	$base = $path[0];

	$base_array = explode( '/', $base );
	array_pop( $base_array );
	array_pop( $base_array );
	$base = implode( '/', $base_array );
	$base .= '/';

	$path = explode( '/modules/', $path[1] );

	//$barcode_url = $base . 'modules/' . $path[1] . '/barcode/barcode.php?num=' . $focus->inventory_number;

	$barcode_url = $base . 'barcode/barcode_img.php?num=' . $focus->inventory_number;

	$xtpl->assign("BARCODE_URL",		$barcode_url );	
	$xtpl->assign("PHOTO_URL",		$focus->photo );

	$name_array = explode( '.', $focus->photo );

	$name_array[ count( $name_array ) - 2 ] = $name_array[ count( $name_array ) - 2 ] . '_thumb';

	$thumb_name = implode( '.', $name_array );

	$xtpl->assign("THUMB_URL",		$thumb_name);	


	
	### USER RELATED ###
	
	global $current_user;
	
	if(is_admin($current_user) && $_REQUEST['module'] != 'DynamicLayout' && !empty($_SESSION['editinplace']))
	{
		$xtpl->assign("ADMIN_EDIT","<a href='index.php?action=index&module=DynamicLayout&from_action=" .
				$_REQUEST['action'] . "&from_module=" . $_REQUEST['module'] . "&record=" . $_REQUEST['record']. "'>" . 
				get_image( $image_path . "EditLayout", "border='0' alt='Edit Layout' align='bottom'") . "</a>");
	}
	

	if( isset($_REQUEST['show_logs']) )
	{
		require_once 'Inventory_change.php';

		$inventory_change = new Inventory_change();

		$xtpl->assign("INVENTORY_CHANGES",	$inventory_change->get_logs( $focus->id ) );
	}


	
	$detailView->processListNavigation($xtpl, "INVENTORY_ITEM", $offset, $focus->is_AuditEnabled());

	
	### adding custom fields ###
	

	require_once('modules/DynamicFields/templates/Files/DetailView.php');
	


	### X TEMPLATE PARSING AND OUTPUT ###
	
	$xtpl->parse("main.open_source");
	
	
	$xtpl->parse("main");
	$xtpl->out("main");

	
	### SUB PANELS PARSING AND OUTPUT ###

	$sub_xtpl = $xtpl;

	require_once('include/SubPanel/SubPanelTiles.php');
	
	$subpanel = new SubPanelTiles($focus, 'Inventory_items');
	
	//echo $subpanel->display();



	### SAVED SEARCH ###
	
	require_once('modules/SavedSearch/SavedSearch.php');
	$savedSearch = new SavedSearch();
	$json = getJSONobj();
	$savedSearchSelects = $json->encode(array($GLOBALS['app_strings']['LBL_SAVED_SEARCH_SHORTCUT'] . '<br>' . $savedSearch->getSelect('Inventory_items')));
	$str = "<script>
	YAHOO.util.Event.addListener(window, 'load', SUGAR.util.fillShortcuts, $savedSearchSelects);
	</script>";
	
	echo $str;
	
?>
