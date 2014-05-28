<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('XTemplate/xtpl.php');
require_once("data/Tracker.php");
require_once('modules/Inventory_items/Inventory_item.php');
require_once('themes/' . $theme . '/layout_utils.php');
require_once('include/ListView/ListViewSmarty.php');


if( file_exists('custom/modules/Inventory_items/metadata/listviewdefs.php') )
{
	require_once('custom/modules/Inventory_items/metadata/listviewdefs.php');	
}
else
{
	require_once('modules/Inventory_items/metadata/listviewdefs.php');
}

require_once('modules/SavedSearch/SavedSearch.php');
require_once('include/SearchForm/SearchForm.php');


global $current_language;
global $currentModule;
global $theme;
global $current_user;
global $focus_list;

global $app_strings;
global $app_list_strings;
global $urlPrefix;

$current_module_strings = return_module_language($current_language, 'Inventory_items');

require_once('include/QuickSearchDefaults.php');

$qsd = new QuickSearchDefaults();


// clear the display columns back to default when clear query is called

if( ! empty($_REQUEST['clear_query']) && $_REQUEST['clear_query'] == 'true')
{
	$current_user->setPreference('ListViewDisplayColumns', array(), 0, $currentModule);
}

$savedDisplayColumns = $current_user->getPreference('ListViewDisplayColumns', $currentModule);

$json = getJSONobj();

$seedInventory_item = new Inventory_item();

$searchForm = new SearchForm('Inventory_items', $seedInventory_item);


// setup listview smarty

$lv = new ListViewSmarty();

$displayColumns = array();

if(!empty($_REQUEST['displayColumns'])) 
{
	foreach( explode('|', $_REQUEST['displayColumns']) as $num => $col )
	{
        	if(!empty($listViewDefs['Inventory_items'][$col]))
		{
            		$displayColumns[$col] = $listViewDefs['Inventory_items'][$col];
		}
	} 
}
elseif( ! empty($savedDisplayColumns) )
{
 	$displayColumns = $savedDisplayColumns;
}
else 
{
	foreach( $listViewDefs['Inventory_items'] as $col => $params )
	{
        	if( ! empty($params['default']) && $params['default'] )
		{
			$displayColumns[$col] = $params;
		}
	}
}

$params = array('massupdate' => true);

if( ! empty($_REQUEST['orderBy']) )
{
	$params['orderBy'] = $_REQUEST['orderBy'];
	$params['overrideOrder'] = true;

	if( ! empty($_REQUEST['sortOrder']) )
	{
		$params['sortOrder'] = $_REQUEST['sortOrder'];
	}
}

$lv->displayColumns = $displayColumns;

if( ! empty($_REQUEST['search_form_only']) && $_REQUEST['search_form_only'] ) 
{
    	switch( $_REQUEST['search_form_view'] )
	{
        	case 'basic_search':
            		$searchForm->setup();
            		$searchForm->displayBasic(false);
            		break;
        	case 'advanced_search':
        	case 'saved_views':
            		$searchForm->setup();
            		$searchForm->displayAdvanced(false);
            		break;
        /*    		echo $searchForm->displaySavedViews($listViewDefs, $lv, false);
            		break;*/
    	}
    	
	return;
}


if (!isset($where)) $where = "";

require_once('modules/MySettings/StoreQuery.php');

$storeQuery = new StoreQuery();

if( !isset($_REQUEST['query']) )
{
    	$storeQuery->loadQuery($currentModule);
    	$storeQuery->populateRequest();
}
else
{
    	$storeQuery->saveFromGet($currentModule);   
}

if( isset($_REQUEST['query']) )
{
    	$current_user->setPreference('ListViewDisplayColumns', $displayColumns, 0, $currentModule); 

    	if( ! empty($_SERVER['HTTP_REFERER']) && preg_match('/action=EditView/', $_SERVER['HTTP_REFERER']) ) 
	{
        	$searchForm->populateFromArray($storeQuery->query);
    	}
    	else 
	{
        	$searchForm->populateFromRequest();
    	} 

    	$where_clauses = $searchForm->generateSearchWhere(true, "Inventory_items");

    	$where = "";

    	if( count($where_clauses) > 0 )
	{
		$where= implode(' and ', $where_clauses);
	}

    	$GLOBALS['log']->info("Here is the where clause for the list view: $where");
}

if( ! isset($_REQUEST['search_form']) || $_REQUEST['search_form'] != 'false')
{
    	$searchForm->setup();

    	if(isset($_REQUEST['searchFormTab']) && $_REQUEST['searchFormTab'] == 'advanced_search')
	{
        	$searchForm->displayAdvanced();
    	}
    	elseif( isset($_REQUEST['searchFormTab']) && $_REQUEST['searchFormTab'] == 'saved_views' )
	{
        	//$searchForm->displaySavedViews($listViewDefs, $lv);
        	$searchForm->displayBasic();
    	}
    	else
	{
        	$searchForm->displayBasic();
    	}
}


echo $qsd->GetQSScripts();

$lv->setup($seedInventory_item, 'include/ListView/ListViewGeneric.tpl', $where, $params);


// display 

$savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);

echo get_form_header($current_module_strings['LBL_LIST_FORM_TITLE'] . $savedSearchName, '', false);

echo $lv->display();

$savedSearch = new SavedSearch();

$json = getJSONobj();


$savedSearchSelects = $json->encode(array($GLOBALS['app_strings']['LBL_SAVED_SEARCH_SHORTCUT'] . '<br>' . $savedSearch->getSelect('Inventory_items')));

$str = "<script>
	YAHOO.util.Event.addListener( window, 'load', SUGAR.util.fillShortcuts, $savedSearchSelects );
	</script>";

echo $str;

?>
