<?php
$startTime = microtime(true);
ob_start();

//Load portal config
global $iportal_config;
require_once('iportal_config.php');

if(!defined('sugarEntry'))define('sugarEntry', true);
require_once('include/iportalEntryPoint.php');
require_once('modules/Contacts/Contact.php');
require_once('modules/Users/User.php');
require_once('sugar_version.php');
require_once('include/database/PearDatabase.php');
require_once('include/Sugar_Smarty.php');
require_once('include/utils/layout_utils.php');

require_once('iportal/include/iportal_utils.php');
require_once('iportal/include/MVC/Controller/IportalControllerFactory.php');
require_once('iportal/include/MVC/View/IportalViewFactory.php');
require_once('iportal/include/MVC/SugarModule.php');
require_once('include/MVC/SugarApplication.php');

// Jose Sambrano
if(file_exists('iportal_config_override.php')){
require_once('iportal_config_override.php');

}

//


session_start();

global $sugar_config, $database, $current_user, $current_portal_user, $timedate, $mod_strings, $app_strings, $app_list_strings, $theme, $ss, $current_language, $currentModule;

$GLOBALS['sugar_config']['default_theme'] = $iportal_config['default_theme']; // RR - Use iPortal default theme

$auth_controller = new AuthenticationController('IportalAuthenticate');
if(!$auth_controller->sessionAuthenticate()) {
	if(!isset($_REQUEST['login_module']))
		$_REQUEST['login_module'] = isset($_REQUEST['module']) ? $_REQUEST['module'] : 'Home';
	if(!isset($_REQUEST['login_action']))
		$_REQUEST['login_action'] = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';
	if(!isset($_REQUEST['login_record']))
		$_REQUEST['login_record'] = isset($_REQUEST['record']) ? $_REQUEST['record'] : '';
	
	// Forgot Password
	if( isset($_REQUEST['module']) && $_REQUEST['module'] == 'lg_PortalUser' && isset($_REQUEST['action']) && $_REQUEST['action'] == 'ForgotPassword' ) {

		if( isset($_REQUEST['username']) && !empty($_REQUEST['username']) ) {
			require_once('modules/lg_PortalUser/lg_PortalUser.php');
			$portal_user = new lg_PortalUser();
			$password_changed_msg = $portal_user->changePassword($_REQUEST['username'], true);
			$_REQUEST['password_changed_msg'] = $password_changed_msg;			
			$_REQUEST['login_module'] = ($_REQUEST['login_module'] != 'lg_PortalUser') ? $_REQUEST['login_module'] : 'Home';
			$_REQUEST['login_action'] = ($_REQUEST['login_action'] != 'ForgotPassword') ? $_REQUEST['login_action'] : 'index';
		}
	} else {
		$_REQUEST['password_changed_msg'] = null;
	}
	
	$_REQUEST['module'] = 'lg_PortalUser';
	$_REQUEST['action'] = 'Login';
	
}

//Set the initial global variables
$database = & PearDatabase::getInstance();
$current_user = new User();
$current_user = $current_user->retrieve($iportal_config['default_user_id']);
$_SESSION['real_sugar_user_id'] = $current_user->id;

///Jose Sambrano
// Verify the user set up on the config file
if(empty($iportal_config['default_user_id'])){
    sugar_die("You didn't have the portal_user properly set, contact your administrator");
}else{

    if(empty($current_user->id))
        sugar_die("You didn't have the portal_user properly set, contact your administrator");

}
//////////
//taras SET Email client to "mailto"
$current_user->setPreference('email_link_type', 'mailto');
//end taras


//TK - Quick fix for permissions not being set during the login in the PRO version
if (isset($_SESSION['authenticated_portal_user_id']) AND !empty($_SESSION['authenticated_portal_user_id'])) {
	SugarApplication :: ACLFilter();
}

$timedate = new TimeDate();
//$mod_strings = return_module_language($sugar_config['default_language'], 'Home');
$current_language = $iportal_config['default_language'];
$app_strings = return_application_language($sugar_config['default_language']);
$app_list_strings = return_app_list_strings_language($sugar_config['default_language']);
$theme = $iportal_config['default_theme'];
$ss = new Sugar_Smarty();


if(!empty($_SESSION['authenticated_user_language'])) {
	$GLOBALS['current_language'] = $_SESSION['authenticated_user_language'];
}
else {
	$GLOBALS['current_language'] = $GLOBALS['sugar_config']['default_language'];
}
$GLOBALS['log']->debug('current_language is: '.$GLOBALS['current_language']);
//set module and application string arrays based upon selected language
$GLOBALS['app_strings'] = return_application_language($GLOBALS['current_language']);
if(empty($GLOBALS['current_user']->id))$GLOBALS['app_strings']['NTC_WELCOME'] = '';
if(!empty($GLOBALS['system_config']->settings['system_name']))$GLOBALS['app_strings']['LBL_BROWSER_TITLE'] = $GLOBALS['system_config']->settings['system_name'];
$GLOBALS['app_list_strings'] = return_app_list_strings_language($GLOBALS['current_language']);
$GLOBALS['mod_strings'] = return_module_language($GLOBALS['current_language'], $_REQUEST['module']);

//Check if the user is logged in, if not set after login redirect too
if (!isset($_REQUEST['module']) || (empty($_REQUEST['module']))) {
	$redirect['module'] = 'Home';
	$redirect['action'] = 'index';
	
	$redirect = array_merge($redirect, $_GET);
	
	set_iportal_redirect($redirect);
}
else {
	$module = $_REQUEST['module'];
	$currentModule = $module;
	$controller = IportalControllerFactory::getController($module);
	$controller->execute();
}

?>
