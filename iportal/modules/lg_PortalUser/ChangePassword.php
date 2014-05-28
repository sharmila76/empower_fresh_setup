<?php
global $mod_strings, $app_strings;
$mod_strings = return_module_language ( $current_language, 'lg_PortalUser' );

$sugar_smarty = new Sugar_Smarty();
$sugar_smarty->assign('MOD', $mod_strings);
$sugar_smarty->assign('APP', $app_strings);
if(isset($_SESSION['CHANGE_PASSWORD_ERROR'])) {
	$sugar_smarty->assign('CHANGE_PASSWORD_ERROR', $_SESSION['CHANGE_PASSWORD_ERROR']);
}
$sugar_smarty->display('iportal/modules/lg_PortalUser/tpls/changepassword.tpl');