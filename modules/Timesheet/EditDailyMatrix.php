<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Professional End User
 * License Agreement ("License") which can be viewed at
 * http://www.sugarcrm.com/crm/products/sugar-professional-eula.html
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * among other things: 1) sublicense, resell, rent, lease, redistribute, assign
 * or otherwise transfer Your rights to the Software, and 2) use the Software
 * for timesharing or service bureau purposes such as hosting the Software for
 * commercial gain and/or for the benefit of a third party.  Use of the Software
 * may be subject to applicable fees and any use of the Software without first
 * paying applicable fees is strictly prohibited.  You do not have the right to
 * remove SugarCRM copyrights from the source code or user interface.
 *
 * All copies of the Covered Code must include on each user interface screen:
 *  (i) the "Powered by SugarCRM" logo and
 *  (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2006 SugarCRM, Inc.; All Rights Reserved.
 ********************************************************************************/
/*********************************************************************************

 * Description: TODO:  To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

require_once('XTemplate/xtpl.php');
//require_once('data/Tracker.php');
require_once('modules/Timesheet/Timesheet.php');
require_once('modules/Timesheet/Forms.php');


global $timedate;
global $current_user;
global $app_strings;
global $app_list_strings;
global $mod_strings;
global $sugar_version, $sugar_config;

$focus = new Timesheet();


echo "\n<p>\n";
echo get_module_title($mod_strings['LBL_MODULE_NAME'], $mod_strings['LBL_MODULE_NAME'].": ".$mod_strings['LBL_FILL_DAILY_MATRIX'], true);
echo "\n</p>\n";
global $theme;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";

$GLOBALS['log']->info("Timesheet Edit view");

$xtpl=new XTemplate('modules/Timesheet/EditDailyMatrix.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);

// Set the number grouping and decimal separators
$seps = get_number_seperators();
$dec_sep = $seps[1];
$num_grp_sep = $seps[0];
$xtpl->assign('NUM_GRP_SEP', $num_grp_sep);
$xtpl->assign('DEC_SEP', $dec_sep);


$xtpl->assign("CALENDAR_LANG", "en");


if (isset($_REQUEST['return_module'])) $xtpl->assign("RETURN_MODULE", $_REQUEST['return_module']);
if (isset($_REQUEST['return_action'])) $xtpl->assign("RETURN_ACTION", $_REQUEST['return_action']);
if (isset($_REQUEST['return_id'])) $xtpl->assign("RETURN_ID", $_REQUEST['return_id']);
// handle Create $module then Cancel
if (empty($_REQUEST['return_id'])) {
	$xtpl->assign("RETURN_ACTION", 'index');
}
$xtpl->assign("THEME", $theme);
$xtpl->assign("IMAGE_PATH", $image_path);$xtpl->assign("PRINT_URL", "index.php?".$GLOBALS['request_string']);
$xtpl->assign("ID", $focus->id);

$aDays = array(
$mod_strings['LBL_SUNDAY'],
$mod_strings['LBL_MONDAY'],
$mod_strings['LBL_TUESDAY'],
$mod_strings['LBL_WEDNESDAY'],
$mod_strings['LBL_THURSDAY'],
$mod_strings['LBL_FRIDAY'],
$mod_strings['LBL_SATURDAY']
);

// consider user offset and server time zone
//$now = time() - ($timedate->adjustmentForUserTimeZone($timedate->getUserTimeZone()) * 60);
$nowObj = $timedate->getNow(true);

$curDate = $nowObj;
if (!empty($_REQUEST['day'])) {
    $curDate = SugarDateTime::createFromFormat('Y-m-d', $_REQUEST['day']);
}

//$dayUnixTime = !empty($_REQUEST['day']) ? strtotime($_REQUEST['day']) : $now;

// Numeric representation of the chosen day
$idxDay = $curDate->format('w');//date("w", $dayUnixTime);

$userDateFormat = $timedate->get_date_format();
$shortDateFormat = 'd.m';
$len = strlen($userDateFormat);
$pos = stripos($userDateFormat, 'Y');
if ($pos !== false) {
  if ($pos == ($len - 1)) {
    // last letter is Y
    $shortDateFormat = substr($userDateFormat, 0, $len - 2);
  }
  else {
    $shortDateFormat = substr($userDateFormat, 0, $pos) . substr($userDateFormat, - ($len - $pos - 2));
  }
}

$style = $nowObj->format('dmY')/*date("dmY", $now)*/ == $curDate->format('dmY')/*date("dmY",$dayUnixTime)*/ ? "font-weight:bold" : "";


$xtpl->assign("DAY_OF_WEEK", "<span style='$style'>".$aDays[$idxDay]."</span>");
$xtpl->assign("PREV_DAY", $curDate->modify('-1 day')->format('Y-m-d')/*date("Y-m-d", $dayUnixTime - 3600 * 24)*/);
$xtpl->assign("NEXT_DAY", $curDate->modify('+2 day')->format('Y-m-d')/*date("Y-m-d", $dayUnixTime + 3600 * 24)*/);
$xtpl->assign("DAY", "<span style='$style'>".$curDate->modify('-1 day')->format($shortDateFormat)/*date($shortDateFormat, $dayUnixTime)*/."</span>");
//$xtpl->assign("DAYUNIXTIME", $dayUnixTime);

$date = array($curDate->format('Y-m-d')/*$dayUnixTime*/, $curDate->format('Y-m-d')/*$dayUnixTime*/);

$timesheet = $focus->getUserTimesheets($current_user->id, $date);
$jobs = $focus->getAssignedParents($current_user->id);

function sortJobs($jobs) {
  $aJobs = array();

  foreach ($jobs as $i => $job) {
    if ($job['type'] == 'ProjectTask') {
      if(isset($aJobs[$job['parent_id']])) {
        $aJobs[$job['parent_id']][] = $job;
      }
      else {
        $aJobs[$job['parent_id']][] = array(
          'id' => $job['parent_id'],
          'name' => $job['parent_name'],
          'type' => 'Project'
        );
        $aJobs[$job['parent_id']][] = $job;
      }
    }
    else {
      $aJobs[$job['id']][] = $job;
    }
  }
  return $aJobs;
}

$aJobs = sortJobs($jobs);

$horizSum = $vertSum = array();
$k = 0; // row

$total = 0;

foreach ($aJobs as $id => $jobs) {
  foreach ($jobs as $i => $job) {
    $assignee = array();
    $assignee['rowid'] = $k;
    $assignee['id'] = $job['id'];
    $assignee['type'] = $job['type'];
    $assignee['date'] = $curDate->format('Y-m-d')/*date("Y-m-d", $dayUnixTime)*/;
    $assignee['actual'] = "";
    $assignee['disabled'] = "disabled";
    $assignee['timesheet_id'] = "";
    $assignee['description'] = "";
    if (!empty($timesheet[ $assignee['id'] ][ $assignee['date'] ]['actual'])) {
      $assignee['actual'] = $timesheet[ $assignee['id'] ][ $assignee['date'] ]['actual'];
      $assignee['disabled'] = "";
      $assignee['timesheet_id'] = $timesheet[ $assignee['id'] ][ $assignee['date'] ]['id'];
      $assignee['description'] = @$timesheet[ $assignee['id'] ][ $assignee['date'] ]['description'];

      $total += $assignee['actual'];
      // format number
      $assignee['actual'] = format_number($assignee['actual']);
    }
    $xtpl->assign("MATRIX", $assignee);
    $xtpl->parse("main.matrix_row.matrix_subrow");

    $assignee = $job;
    $assignee['type_lbl'] = $mod_strings['LBL_TYPE_'.strtoupper($assignee['type'])];
    $xtpl->assign("MATRIX", $assignee);
    if (!empty($assignee['parent_id'])) {
      $xtpl->parse("main.matrix_row.matrix_parent");
    }
    if (!empty($assignee['account_id'])) {
      $xtpl->parse("main.matrix_row.matrix_account");
    }
    $xtpl->parse("main.matrix_row");
  }
}

$xtpl->assign("TOTAL", $total);
$xtpl->assign("FTOTAL", format_number($total));

$xtpl->parse("main");
$xtpl->out("main");
?>
