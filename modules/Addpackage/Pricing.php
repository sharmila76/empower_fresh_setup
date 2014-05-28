<?php

if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');

$packages = "SELECT * FROM packagemaster";
$res = $GLOBALS['db']->query($packages);
while ($row = $GLOBALS['db']->fetchByAssoc($res)) {
  $packages_list[] = $row;
}
$this->ss->assign('PACKAGE_LIST', $packages_list);

$pricemaster = "SELECT * FROM package_pricemaster order by PackageName asc";
$result = $GLOBALS['db']->query($pricemaster);
while ($row = $GLOBALS['db']->fetchByAssoc($result)) {
  $price_master_list[] = $row;
}
$this->ss->assign('PRICE_MASTER_LIST', $price_master_list);

if (isset($_POST['add_pricing'])) {
  $package = mysql_real_escape_string(htmlspecialchars($_POST['package']));
  $q = "SELECT PackageCode FROM packagemaster WHERE PackageName='$package'";
  $result = $GLOBALS['db']->query($q);
  while ($row = $GLOBALS['db']->fetchByAssoc($result)) {
    $Pcode = $row['PackageCode'];    
  }
  $users = mysql_real_escape_string(htmlspecialchars($_POST['users']));
  $period = mysql_real_escape_string(htmlspecialchars($_POST['period']));
  $price = mysql_real_escape_string(htmlspecialchars($_POST['price']));
  $discount = mysql_real_escape_string(htmlspecialchars($_POST['discount']));
  $maxdiscount = mysql_real_escape_string(htmlspecialchars($_POST['maxdiscount']));

  $pricing = "INSERT package_pricemaster SET PackageCode='$Pcode',PackageName='$package', TotUsers='$users', Subscription='$period', price='$price', discount='$discount', maxdiscount='$maxdiscount', IsAvailable=1";
  $res = $GLOBALS['db']->query($pricing);
  if ($res) {
    echo "Pricing saved successfully";
  }
}
$this->ss->display($this->getCustomFilePathIfExists('modules/Addpackage/Pricing.html'));

