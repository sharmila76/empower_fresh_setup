<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class TimesheetTimer extends SugarBean {
  var $id;
  var $assigned_user_id;
  var $parent_type;
  var $parent_id;
  var $parent_name;
  var $started;

  var $table_name = 'timesheet_timer';
	var $module_dir = 'Timesheet';
	var $object_name ='TimesheetTimer';
	var $disable_custom_fields = true;
  var $disable_row_level_security = true;

  function loadTimer($fields_array = array()) {
    $where_clause = "WHERE ";
    $first = 1;
    foreach ($fields_array as $name=>$value) {
      if ($first) {
        $first = 0;
      } else {
        $where_clause .= " AND ";
      }
      if ($name == 'date_entered') {
        $where_clause .= "CAST(date_entered AS DATE) = CAST('".$this->db->quote($value,false)."' AS DATE)";
      }
      else {
        $this->$name = $value;
        $where_clause .= "$name = '".$this->db->quote($value,false)."'";
      }
    }
    $where_clause .= " AND deleted=0";
    //$id = $this->db->getOne("SELECT id FROM {$this->table_name} $where_clause");

    $queryresult = $this->db->query("SELECT id FROM {$this->table_name} $where_clause");
    if ($queryresult) {
      $row = $this->db->fetchByAssoc($queryresult);
      if ( !empty($row['id'])) {
        //$id = array_shift($row);
        $id = $row['id'];
      }
    }

    if (!empty($id)) {
      $this->retrieve($id);
    }
  }

  // get Timer object by assigned user
  function loadTimerByUser() {
    global $current_user;
    //$id = $this->db->getOne("SELECT id FROM {$this->table_name} WHERE assigned_user_id = '{$current_user->id}' AND deleted = 0");
    $queryresult = $this->db->query("SELECT id FROM {$this->table_name} WHERE assigned_user_id = '{$current_user->id}' AND deleted = 0");
    if ($queryresult) {
      $row = $this->db->fetchByAssoc($queryresult);
      if ( $row ) {
        $id = array_shift($row);
      }
    }
    if (!empty($id)) {
      $this->retrieve($id);
    }
  }

  // remove record from db
  function removeMe() {
    $q = "DELETE FROM {$this->table_name} WHERE id = '{$this->id}'";
    $this->db->query($q);
  }

  function getCurrentTimerLink($do) {
    $link = "index.php?module=Timesheet&action=Timer&do=$do";
    if (isset($this->parent_type)) {
      $link .= "&return_module=".$this->parent_type;
    }
    if (isset($_REQUEST['return_action'])) {
      $link .= "&return_action=".$_REQUEST['return_action'];
    }
    else {
      $link .= "&return_action=DetailView";
    }
    if (isset($this->parent_id)) {
      $link .= "&return_id=".$this->parent_id;
    }
    return $link;
  }

  function resolveInterval($interval) {
    preg_match("/([0-9,\.]+)([a-zA-Z]{0,})$/is", $interval, $m);
    if (!isset($m[2]))
      $m[2] = 'sec';

    switch (@$m[2]) {
      case 'min':
        $interval = $m[1] * 60;
      break;

      case 'hr':
        $interval = $m[1] * 3600;
      break;

      /*case 'day':
        $interval = $m[1] * 24 * 3600;
      break;

      case 'wk':
        $interval = $m[1] * 7 * 24 * 3600;
      break;

      case 'mo':
        $interval = $m[1] * 28 * 24 * 3600;
      break;*/
    }
    return array('value' => floatval($interval), 'number' => $m[1], 'literal' => $m[2]);
  }

  function closeOpenTimers() {
    global $db, $timedate;
    $localDB = DBManagerFactory::getInstance();

    // find all timers where date_entered != today grouped by user by date entered
    $q = "SELECT *, DATE_FORMAT(date_entered, '%Y-%m-%d') date_formatted FROM timesheet_timer WHERE deleted = 0 AND CAST(date_entered AS DATE) != CURDATE()";
    $result = $localDB->query($q);

    require_once 'modules/Timesheet/Timesheet.php';
    $timesheet = new Timesheet;

    $timers = array();
    $effort = array();
    $removeClosedTimers = false;
    while($row = $localDB->fetchByAssoc($result)) {
      $removeClosedTimers = true;
      $timers[$row['assigned_user_id'].$row['date_formatted']] = $row;
      // find timesheets where timer_date_entered = timesheet_date_booked
      $q = "SELECT id, actual, date_booked, parent_type, parent_id FROM timesheet WHERE deleted = 0 AND assigned_user_id = '".$row['assigned_user_id']."' AND date_booked = CAST('".$row['date_formatted']."' AS DATE)";

      // go through all timesheet records
      $res = $db->query($q);
      if ($db->getRowCount($res)) {
        while ($r = $db->fetchByAssoc($res)) {
          if (!isset($effort[$row['assigned_user_id'].$row['date_formatted']])) {
            $effort[$row['assigned_user_id'].$row['date_formatted']] = $r['actual'];
          }
          else {
            $effort[$row['assigned_user_id'].$row['date_formatted']] += $r['actual'];
          }
          // this will be used to know which timesheet record should be updated
          $timesheets[$row['assigned_user_id'].$r['parent_type'].$r['parent_id'].$row['date_formatted']] = $r['id'];
        }
      }
    }
    foreach ($timers as $key => $timerRow) {
      if (isset($effort[$key])) {
        if ($effort[$key] < 8) {
          // for this date the total effort is less than 8 hr, while timer was not stopped
          // therefore last fired task should be adjusted in timesheet

          $timesheet_id = $timesheets[$timerRow['assigned_user_id'].$timerRow['parent_type'].$timerRow['parent_id'].$timerRow['date_formatted']];
          $timesheet->retrieve($timesheet_id);
          $timesheet->actual = $timesheet->actual + (8 - $effort[$key]);
          $timesheet->save();
        }
      }
      else {
        // timer exists but not timesheet record for that user in that date
        // create timesheet record
        $timesheet = new Timesheet;
        $timesheet->parent_type = $timerRow['parent_type'];
        $timesheet->parent_id = $timerRow['parent_id'];
        $timesheet->date_booked = $timedate->to_display_date($timerRow['date_formatted'], false);
        $timesheet->assigned_user_id = $timerRow['assigned_user_id'];
        $timesheet->actual = 8;
        $timesheet->save();
      }
    }

    // now remove timers where date_entered != today
    if ($removeClosedTimers) {
      $q = "DELETE FROM timesheet_timer WHERE CAST(date_entered AS DATE) != CURDATE()";
      $localDB->query($q);
    }
  }
}
?>