<?php
global $mod_strings,$app_strings;
$module_menu = Array();
if(ACLController::checkAccess('Cases', 'view', true))
$module_menu [] = Array("index.php?module=Cases&action=EditView&return_module=Cases&return_action=DetailView", $mod_strings['LNK_NEW_CASE'],"CreateCases");
if(ACLController::checkAccess('Cases', 'list', true))
$module_menu [] = Array("index.php?module=Cases&action=index&return_module=Cases&return_action=DetailView", $mod_strings['LNK_CASE_LIST'],"Cases");


?>