<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

global $app_strings, $current_user, $current_portal_user;

if(!isset($global_control_links)){
	$global_control_links = array();
	$sub_menu = array();
}
//taras
if(isset( $sugar_config['disc_client']) && $sugar_config['disc_client']){
	require_once('modules/Sync/headermenu.php');
}
//end taras
//TK - Check if the user is logged in
if (count($current_portal_user)) {
	/*$global_control_links['myaccount'] = array(
		'linkinfo' => array($app_strings['LBL_MY_ACCOUNT'] => 'iportal.php?module=lg_PortalUser&action=MyAccount'),
		'submenu' => ''
	);*/
	$global_control_links['changepassword'] = array(
		'linkinfo' => array($app_strings['LBL_CHANGE_PASSWORD'] => 'iportal.php?module=lg_PortalUser&action=ChangePassword'),
		'submenu' => ''
	);
	$global_control_links['users'] = array(
		'linkinfo' => array($app_strings['LBL_LOGOUT'] => 'iportal.php?module=lg_PortalUser&action=logout'),
		'submenu' => ''
	);
}
?>
