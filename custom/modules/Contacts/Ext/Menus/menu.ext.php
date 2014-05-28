<?php 
 //WARNING: The contents of this file are auto-generated


if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

global $mod_strings, $sugar_config, $app_strings;

if(ACLController::checkAccess('Contacts', 'edit', true)){
	if( isset($_REQUEST['action'])
	 AND isset($_REQUEST['record'])
	 AND !empty($_REQUEST['record'])
	 AND ($_REQUEST['action'] == 'DetailView' OR $_REQUEST['action'] == 'DetailView')) {
	 	$module_menu[] = Array("index.php?module=lg_PortalUser&action=EditView&contact_record=".$_REQUEST['record'], $mod_strings['LNK_CONTACTS_CREATE_IPORTAL_USER_THIS'], "Createlg_PortalUser", 'lg_PortalUser');
	 }
	 else {
	 	$module_menu[] = Array("index.php?module=lg_PortalUser&action=EditView", $mod_strings['LNK_CONTACTS_CREATE_IPORTAL_USER'], "Createlg_PortalUser", 'lg_PortalUser');
	 }
}


?>