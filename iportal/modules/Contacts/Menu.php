<?php
global $mod_strings,$app_strings;
$module_menu = Array();
if(ACLController::checkAccess('Contacts', 'view', true))
$module_menu [] = Array("index.php?module=Contacts&action=EditView&return_module=Contacts&return_action=DetailView", $mod_strings['LNK_NEW_CONTACT'],"CreateContacts");
if(ACLController::checkAccess('Contacts', 'list', true))
$module_menu [] = Array("index.php?module=Contacts&action=index&return_module=Contacts&return_action=DetailView", $mod_strings['LNK_CONTACT_LIST'],"Contacts");

?>