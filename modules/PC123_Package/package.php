<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

global $app_strings;
$smarty = new Sugar_Smarty();
if(empty($GLOBALS['tabStructure'])){
    require 'include/tabConfig.php';
}

$availableSuits = array();
foreach ($GLOBALS['tabStructure'] as $suite_name => $modules) {
  $availableSuits[] = $app_strings[$suite_name];  
}
$smarty->assign('availableSuiteList',$availableSuits);
$smarty->display("modules/PC123_Package/Package/package.tpl");

  