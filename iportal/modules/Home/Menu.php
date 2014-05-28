<?php
global $mod_strings, $app_strings;
global $current_user;
$module_menu = array();

if(ACLController::checkAccess('Accounts', 'edit', true))$module_menu[]=Array("index.php?module=Accounts&action=EditView&return_module=Accounts&return_action=index", $mod_strings['LNK_NEW_ACCOUNT'],"CreateAccounts", 'Accounts');

if(ACLController::checkAccess('Contacts', 'view', true))
$module_menu [] = Array("index.php?module=Contacts&action=EditView&return_module=Contacts&return_action=DetailView", $mod_strings['LNK_NEW_CONTACT'],"CreateContacts");

if(ACLController::checkAccess('Cases', 'view', true))
$module_menu [] = Array("index.php?module=Cases&action=EditView&return_module=Cases&return_action=DetailView", $mod_strings['LNK_NEW_CASE'],"CreateCases");

?>
