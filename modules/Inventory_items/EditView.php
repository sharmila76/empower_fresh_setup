<?php

### ENTRY POINT CHECK ###

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$GLOBALS['log']->info("Inventory Item edit view");



### INCLUDE FILES ###

require_once ('data/Tracker.php');
require_once ('include/time.php');



### GLOBAL VARIABLES ###

global $app_strings;
global $mod_strings;
global $theme;
global $current_user;
global $timedate;

global $current_language;
global $sugar_version, $sugar_config;


### GET THEME ###

$theme_path = "themes/".$theme."/";
$image_path = $theme_path."images/";
require_once ($theme_path.'layout_utils.php');



### INITIALIZE INVENTORY ITEM AND MEMBERS ###

require_once ('modules/Inventory_items/Inventory_item.php');

$focus = & new Inventory_item();

if (!empty($_REQUEST['record'])) 
{
	$focus->retrieve($_REQUEST['record']);
}



### INITIALIZE JSON OBJECT ###

require_once ('include/json_config.php');

$json_config = new json_config();

$json = getJSONobj();



### SETUP QUICKSEARCH ###

require_once('include/QuickSearchDefaults.php');

$qsd = new QuickSearchDefaults();

$sqs_objects = array(
	'assigned_user_name' => $qsd->getQSUser(),
	);

$quicksearch_js = $qsd->getQSScripts();

$quicksearch_js .= '<script type="text/javascript" language="javascript">sqs_objects = ' . $json->encode($sqs_objects) . '</script>';



### DISPLAY TITLE ###

$subtitle = (isset($focus->inventory_number))?($focus->inventory_number):('Create New');

echo "\n<p>\n";
echo get_module_title($mod_strings['LBL_MODULE_NAME'], $mod_strings['LBL_MODULE_NAME'].": " . $subtitle, true);
echo "\n</p>\n";



### CREATE X TEMPLATE ###

require_once ('XTemplate/xtpl.php');

$xtpl = new XTemplate('modules/Inventory_items/EditView.html');



### ASSIGN GLOBAL ARRAYS TO XTEMPLATE ###

$xtpl->assign("MOD", 			$mod_strings);
$xtpl->assign("APP", 			$app_strings);



### ASSIGN VALUES FOR CANCEL ACTION ###

if(isset($_REQUEST['return_module'])) 
{
	$xtpl->assign("RETURN_MODULE", $_REQUEST['return_module']);
}

if(isset($_REQUEST['return_action']))
{
	$xtpl->assign("RETURN_ACTION", $_REQUEST['return_action']);
}

if(isset($_REQUEST['return_id']))
{
	$xtpl->assign("RETURN_ID", $_REQUEST['return_id']);
}

if (empty($_REQUEST['return_id']))
{
	$xtpl->assign("RETURN_ACTION", 'index');
}



### ASSIGN SOME VALUES TO THE X TEMPLATE ###

$xtpl->assign("THEME", 			$theme);
$xtpl->assign("IMAGE_PATH", 		$image_path);
$xtpl->assign("PRINT_URL", 		"index.php?".$GLOBALS['request_string']);
$xtpl->assign("JAVASCRIPT", 		get_set_focus_js() . get_validate_record_js() . $quicksearch_js);

$xtpl->assign("CALENDAR_LANG", 		"en");
$xtpl->assign("USER_DATEFORMAT", 	'('.$timedate->get_user_date_format().')');
$xtpl->assign("CALENDAR_DATEFORMAT", 	$timedate->get_cal_date_format());



### ASSIGN OBJECT VALUES TO X TEMPLATE ###

$xtpl->assign("ID",			$focus->id);
$xtpl->assign("INVENTORY_NUMBER",	$focus->inventory_number);
$xtpl->assign("ACCOUNT_NAME",		$focus->account_name);
$xtpl->assign("ACCOUNT_ID",		$focus->account_id);
$xtpl->assign("COMPANY_NAME_OPTIONS", 	get_select_options_with_id( $app_list_strings['company_name_dom'], $focus->company_name ) );
$xtpl->assign("STORAGE_TYPE_OPTIONS", 	get_select_options_with_id( $app_list_strings['storage_type_dom'], $focus->storage_type ) );
$xtpl->assign("ARTIST",			$focus->artist);
$xtpl->assign("TITLE",			$focus->title);
$xtpl->assign("CIRCA",			$focus->circa);
$xtpl->assign("DATE_RECEIVED",		$focus->date_received);

if( $focus->date_left != '2000-01-01 00:00' )
{
	$xtpl->assign("DATE_LEFT",	$focus->date_left);
}

$xtpl->assign("MEDIUM_OPTIONS", 	get_select_options_with_id( $app_list_strings['medium_dom'], $focus->medium ) );
$xtpl->assign("DESCRIPTION",		$focus->description);
$xtpl->assign("HEIGHT",			$focus->height);
$xtpl->assign("WIDTH",			$focus->width);
$xtpl->assign("DEPTH",			$focus->depth);
$xtpl->assign("PACKING_OPTIONS", 	get_select_options_with_id( $app_list_strings['packing_dom'], $focus->packing ) );
$xtpl->assign("SQUARE_FOOTAGE",		$focus->square_footage);
$xtpl->assign("IN_STORAGE_OPTIONS", 	get_select_options_with_id( $app_list_strings['in_storage_dom'], $focus->in_storage ) );
$xtpl->assign("VALUE",			$focus->value);
$xtpl->assign("INSURED_OPTIONS", 	get_select_options_with_id( $app_list_strings['insured_dom'], $focus->insured ) );
$xtpl->assign("FACILITY_OPTIONS", 	get_select_options_with_id( $app_list_strings['facility_dom'], $focus->facility ) );
$xtpl->assign("LOCATION",		$focus->location);
$xtpl->assign("PHOTO",			$focus->photo);
$xtpl->assign("CONDITION_OPTIONS", 	get_select_options_with_id( $app_list_strings['condition_dom'], $focus->condition ) );
$xtpl->assign("CONDITION_DESCRIPTION",	$focus->condition_description);


### SETUP ACCOUNT POPUP ###

$popup_request_data = array(
	'call_back_function' => 'set_return',
	'form_name' => 'EditView',
	'field_to_name_array' => array(
		'id' => 'account_id',
		'name' => 'account_name',
		)
	);

$json = getJSONobj();

$encoded_popup_request_data = $json->encode($popup_request_data);

$xtpl->assign('encoded_popup_request_data', $encoded_popup_request_data);


### ADD CUSTOM FIELDS ###

require_once ('modules/DynamicFields/templates/Files/EditView.php');



### X TEMPLATE PARSING AND OUTPUT ###

$xtpl->parse("main");

$xtpl->out("main");



### ADD JAVASCRIPT ###


require_once ('include/javascript/javascript.php');

$javascript = new javascript();

$javascript->setFormName('EditView');

$javascript->setSugarBean($focus);

$javascript->addAllFields('');

echo $javascript->getScript();



### RENDER SAVED SEARCHES ###

require_once('modules/SavedSearch/SavedSearch.php');

$savedSearch = new SavedSearch();

$json = getJSONobj();

$savedSearchSelects = $json->encode(array($GLOBALS['app_strings']['LBL_SAVED_SEARCH_SHORTCUT'] . '<br>' . 

$savedSearch->getSelect('Widgets')));

echo "<script>YAHOO.util.Event.addListener(window, 'load', SUGAR.util.fillShortcuts, $savedSearchSelects);</script>";

?>
