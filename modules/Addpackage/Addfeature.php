<?php

if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');

global $moduleList;
$this->ss->assign('MODULE_LIST', $moduleList);
if (isset($_POST['add_feature'])) {
  echo 'hi';
  $name = $_POST['name'];
  $code = $_POST['code'];
 
  $PcCode = '';
  if (!empty($_POST['select'])) {
    for ($i = 0; $i < count($_POST['select']); $i++) {
      $PcCode .= $_POST['select'][$i] . ", ";
    }
  }
  
  $q = "INSERT productfeature SET ProductFeatureName='$name', ProductFeatureCode='$code', PackageCode='$PcCode', IsActive=1";
  $res = $GLOBALS['db']->query($q);
    if ($res) {
      echo "Package feature saved successfully";
    }
}

$packages = "SELECT * FROM packagemaster";
$res = $GLOBALS['db']->query($packages);
while ($row = $GLOBALS['db']->fetchByAssoc($res)) {
  $packages_list[] = $row;
}

$this->ss->assign('PACKAGE_LIST', $packages_list);
$this->ss->display($this->getCustomFilePathIfExists('modules/Addpackage/Addfeature.html'));
?>
