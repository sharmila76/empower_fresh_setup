<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

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
echo get_module_title($mod_strings['LBL_MODULE_NAME'], $mod_strings['LBL_MODULE_NAME'].": ".$mod_strings['LBL_FILL_MATRIX'], true);
echo "\n</p>\n";
global $theme;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";


$GLOBALS['log']->info("Timesheet Edit view");

$xtpl=new XTemplate('modules/Timesheet/EditMatrix.html');
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

/** new
 * 1. Entry point is current date
 * 2. Determine day of week for current date
 * 3. Determine year for current date
 * 4. Determine end date of previous week and start date of next week
 * 5. Set flag isCurrentWeek to determine whether it is current week
 */

// determine the date
$curDate = $nowObj->format('Y-n-j'); //date('Y-n-j', $now);
if (!isset($_REQUEST['date'])) {
  $defaultDate = $nowObj;//$curDate; // YYYYmd
}
else {
  $defaultDate = SugarDateTime::createFromFormat('Y-n-j', $_REQUEST['date']);
}
// determine date info
$dateInfo = explode('-', $defaultDate->format('Y-n-j'));

$defaultDay = (int)$dateInfo[2];
$defaultMonth = (int)$dateInfo[1];
$defaultYear = (int)$dateInfo[0];
//$defaultTimestamp = strtotime($defaultDate);
$defaultWeekDay = $defaultDate->format('w'); //date('w', $defaultTimestamp);

// determine days number to next monday
$daysToNextMo = ($defaultWeekDay == 0) ? 1 : (8 - $defaultWeekDay);

// determine days number to prev sunday
$daysToPrevSu = ($defaultWeekDay == 0) ? 7 : $defaultWeekDay;

// determine start date of next week
// next monday day is out of days in defaultMonth
if (($defaultDay + $daysToNextMo) > $defaultDate->format('t')/*date('t', $defaultTimestamp)*/) {
  $nextDay = $daysToNextMo - ($defaultDate->format('t')/*date('t', $defaultTimestamp)*/ - $defaultDay);
  if ($defaultMonth == 12) {
    $nextMonth = 1;
    $nextYear = $defaultYear + 1;
  }
  else {
    $nextMonth = $defaultMonth + 1;
    $nextYear = $defaultYear;
  }
}
else {
  $nextDay = $defaultDay + $daysToNextMo;
  $nextMonth = $defaultMonth;
  $nextYear = $defaultYear;
}
$nextDate = $nextYear.'-'.$nextMonth.'-'.$nextDay;

$nextDateObj = clone $defaultDate;
$nextDateObj->modify('+' . $daysToNextMo . ' day');

// determine end date of prev week
// prev monday day is negative
if (($defaultDay - $daysToPrevSu) < 0) {
  if ($defaultMonth == 1) {
    $prevMonth = 12;
    $prevYear = $defaultYear - 1;
  }
  else {
    $prevMonth = $defaultMonth - 1;
    $prevYear = $defaultYear;
  }
  $prevDay = date('t', strtotime($prevYear.'-'.$prevMonth.'-1')) + ($defaultDay - $daysToPrevSu);
}
else {
  $prevYear = $defaultYear;
  $prevMonth = $defaultMonth;
  $prevDay = $defaultDay - $daysToPrevSu;
}
$prevDate = $prevYear.'-'.$prevMonth.'-'.$prevDay;

$prevDateObj = clone $defaultDate;
$prevDateObj->modify('-' . $daysToPrevSu . ' day');


// determine week number
$weekNumber = intval($defaultDate->format('W')/*date('W', $defaultTimestamp)*/);
if ($weekNumber == 0) {
  $weekNumber = 1;
}
$xtpl->assign("WEEK", $weekNumber);

// timestamp for the end of chosen week in chosen year
//$weektime = strtotime($nextDate) - 24 * 3600;

$xtpl->assign("NEXTDATE", $nextDateObj->format('Y-n-j'));
$xtpl->assign("PREVDATE", $prevDateObj->format('Y-n-j'));
$xtpl->assign("DATE_RANGE", $prevDateObj->modify('+1 day')->format('j F')/*date("j F", strtotime($prevDate) + 24 * 3600)*/." &mdash; ".$nextDateObj->modify('-1 day')->format('j F Y')/*date("j F Y", $weektime)*/);

// Set numeric representation of the day of the end of the chosen week
$idxDay = $nextDateObj->format('w');//date("w", $weektime);
$idxCurDay = $defaultDate->format('w');//date("w", $now);

if ($idxDay == 0) {
  $date[0] = $nextDateObj->modify('-6 day')->format('Y-m-d');//$weektime - 6 * 24 * 3600;
  $date[1] = $nextDateObj->modify('+6 day')->format('Y-m-d');//$weektime;
  $idxDay = 7;
}
else {
  $date[0] = $nextDateObj->modify('-' . ($idxDay - 1) . ' day')->format('Y-m-d');//$weektime - ($idxDay - 1) * 24 * 3600;
  $nextDateObj->modify('+' . ($idxDay - 1) . ' day');

  $date[1] = $nextDateObj->modify('+' . (7 - $idxDay) . ' day')->format('Y-m-d');//$weektime + (7 - $idxDay) * 24 * 3600;
  $nextDateObj->modify('-' . (7 - $idxDay) . ' day');
}

$timesheet = $focus->getUserTimesheets($current_user->id, $date);

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

$cols = array();
for ($i = 1; $i < 8; $i++) {
  if ($i < ($idxDay + 1)) {
    $difftime = $nextDateObj->modify('-' . ($idxDay - $i) . ' day')->format('Y-m-d');//$weektime - ($idxDay - $i) * 24 * 3600;
    $idxLoopDay = $nextDateObj->format('w');
    $loopDate = $nextDateObj->format('Y-n-j');
    $shortDate = $nextDateObj->format($shortDateFormat);

    $nextDateObj->modify('+' . ($idxDay - $i) . ' day');
  }
  else if ($i > $idxDay) {
    $difftime = $nextDateObj->modify('+' . ($i - $idxDay) . ' day')->format('Y-m-d');//$weektime + ($i - $idxDay) * 24 * 3600;
    $idxLoopDay = $nextDateObj->format('w');
    $loopDate = $nextDateObj->format('Y-n-j');
    $shortDate = $nextDateObj->format($shortDateFormat);

    $nextDateObj->modify('-' . ($i - $idxDay) . ' day');
  }
  $cols[] = $difftime;

  //$idxLoopDay = date("w", $difftime);
  if ($idxLoopDay == 0) {
    $idxLoopDay = 7;
  }
  $style = "";
  if ($loopDate/*date('Y-n-j', $difftime)*/ == $curDate) {
    $style = "font-weight: bold";
  }

  $assignee = array();
  $assignee['day_of_week'] = "<span style='$style'>".$aDays[($idxLoopDay == 7 ? 0 : $idxLoopDay)]."</span>";
  $assignee['day'] = "<span style='$style'>" . $shortDate . "</span>";
  $xtpl->assign("MATRIX", $assignee);
  $xtpl->parse("main.matrix_header");
}

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

foreach ($aJobs as $id => $jobs) {
  foreach ($jobs as $i => $job) {
    $assignee = array();
    $assignee['rowid'] = $k;
    foreach ($cols as $loopDay => $difftime) {
      $assignee['id'] = $job['id'];
      $assignee['type'] = $job['type'];
      $assignee['date'] = $difftime;
      $assignee['actual'] = "";
      $assignee['disabled'] = "disabled";
      $assignee['timesheet_id'] = "";
      if (!empty($timesheet[ $assignee['id'] ][ $assignee['date'] ]['actual'])) {
        $assignee['actual'] = $timesheet[ $assignee['id'] ][ $assignee['date'] ]['actual'];
        $assignee['disabled'] = "";
        $assignee['timesheet_id'] = $timesheet[ $assignee['id'] ][ $assignee['date'] ]['id'];
        $horizSum[$k] = 0 + @$horizSum[$k] + $assignee['actual'];
        $vertSum[$loopDay] = 0 + @$vertSum[$loopDay] + $assignee['actual'];
        // format number
        $assignee['actual'] = format_number($assignee['actual']);
      }
      $assignee['colid'] = $loopDay;
      $xtpl->assign("MATRIX", $assignee);
      $xtpl->parse("main.matrix_row.matrix_subrow");
    }
    $assignee = $job;
    $assignee['type_lbl'] = $mod_strings['LBL_TYPE_'.strtoupper($assignee['type'])];
    $assignee['rowid'] = $k;
    $xtpl->assign("MATRIX", $assignee);
    if (!empty($assignee['parent_id'])) {
      $xtpl->parse("main.matrix_row.matrix_parent");
    }
    if (!empty($assignee['account_id'])) {
      $xtpl->parse("main.matrix_row.matrix_account");
    }
    $xtpl->parse("main.matrix_row");
    $k++;
  }
}

$total = 0;
foreach ($horizSum as $idx => $val) {
  $xtpl->assign("ROW_IDX", $idx);
  $xtpl->assign("ROW_VAL", $val);
  $xtpl->assign("ROW_FVAL", format_number($val));
  $xtpl->parse("main.total_row");
  $total += $val;
}
$xtpl->assign("TOTAL", $total);
$xtpl->assign("FTOTAL", format_number($total));

foreach ($vertSum as $idx => $val) {
  $xtpl->assign("COL_IDX", $idx);
  $xtpl->assign("COL_VAL", $val);
  $xtpl->assign("COL_FVAL", format_number($val));
  $xtpl->parse("main.total_col");
}

$xtpl->parse("main");
$xtpl->out("main");
?>
