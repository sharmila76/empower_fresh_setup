<?php

if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');

//$this->ss->assign('CALENDAR_DATEFORMAT', $timedate->get_cal_date_format());
if (isset($_POST['add_package'])) {
  $name = mysql_real_escape_string(htmlspecialchars($_POST['package_name']));
  $code = mysql_real_escape_string(htmlspecialchars($_POST['package_code']));
  if ($name == '' || $code == '') {
    echo 'Please enter the Package Name!';
  } else {
    $q = "INSERT packagemaster SET PackageCode='$code', PackageName='$name',  IsActive=1";
    $res = $GLOBALS['db']->query($q);
    if ($res) {
      echo "Record saved successfully";
    }
  }
}
$this->ss->display($this->getCustomFilePathIfExists('modules/Timesheet/Addpackage.html'));
?>
