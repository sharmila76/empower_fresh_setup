<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('modules/Timesheet/Timesheet.php');
require_once('include/formbase.php');

global $current_user;

$focus = new Timesheet;

if(!$focus->ACLAccess('Save')){
  ACLController::displayNoAccess(true);
  sugar_cleanup(true);
}

$data = array();
if (isset($_POST['data'])) {
  $data = $_POST['data'];
}
$description = array();
if (isset($_POST['description'])) {
  $description = $_POST['description'];
}

$records = array();
if (isset($_POST['records'])) {
  $records = $_POST['records'];
}

foreach ($data as $parentData => $actual) {
    if (isset($actual)) {
        $focus = new Timesheet;

        $idxDesc = $parentData;
        $parentData = explode(".", $parentData);
        $recid = $parentData[0].".".$parentData[2];
        if (isset($records[$recid])) {
            $focus->retrieve($records[$recid]);
        }
        if ($actual == '' || $actual == '0') {
            if (!empty($focus->id)) {
                $focus->mark_deleted($focus->id);
            }
        }
        else {
            $focus->actual = $actual;
            $focus->date_booked = $parentData[2];
            $focus->parent_id = $parentData[0];
            $focus->parent_type = $parentData[1];
            $focus->assigned_user_id = $current_user->id;
            if (isset($description[$idxDesc])) {
                $focus->description = trim($description[$idxDesc]);
            }
            $focus->save(@$GLOBALS['check_notify']);
        }
    }
}
handleRedirect();