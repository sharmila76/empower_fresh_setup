<?php

if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');

$packagemaster = "SELECT * FROM packagemaster";
$res = $GLOBALS['db']->query($packagemaster);
while ($row = $GLOBALS['db']->fetchByAssoc($res)) {
  $packagemaster_list[] = $row;
}

$this->ss->assign('packagemaster_list', $packagemaster_list);
echo '<table class="table1"><tr><th>Features</th>';
foreach ($packagemaster_list as $value) {
  echo '<th>' . $value['PackageName'] . '</th>';
}
echo '</tr>';

$product_feature = "SELECT ProductFeatureName,PackageCode FROM productfeature";
$res = $GLOBALS['db']->query($product_feature);
while ($feature = $GLOBALS['db']->fetchByAssoc($res)) {
  $list_row[] = $feature;
  echo '<tr>';
  echo '<td class="table_row">' . $feature['ProductFeatureName'] . '</td>';
  foreach ($packagemaster_list as $value) {
    if (strpos($feature['PackageCode'], $value['PackageName']) !== false) {
      echo '<td><span class="check"></span></td>';
    }
    else {
      echo '<td><span class="uncheck"></span></td>';
    }
  }
  echo '</tr>';
}
echo '<tfoot><tr><td>Detail pricing</td>';
foreach ($packagemaster_list as $value) {
  echo '<td><a href=index.php?module=Addpackage&action=Cart&id='.$value['PackageCode'].'>View Price</a></td>';
}
echo '</tr></tfoot>';
echo '</table>';


$this->ss->assign('list_row', $list_row);
$this->ss->display($this->getCustomFilePathIfExists('modules/Addpackage/Booking.html'));
?>
