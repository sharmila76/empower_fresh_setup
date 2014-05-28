<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

echo '<h1>Setting up Subject</h1>';
if(isset($_REQUEST['subject'])) {
  if(isset($_REQUEST['question_name'])) {
    $qst_name = $_REQUEST['question_name'];
  }
  $number_of_qustions = 0;
  if(isset($_REQUEST['number_of_questions'])) {
    $number_of_qustions = $_REQUEST['number_of_questions'];
  }
  $time_allocation = 0;
  if(isset($_REQUEST['time_allocation'])) {
    $time_allocation = $_REQUEST['time_allocation'];
  }
}

global $current_user;
$created_by = $current_user->id;
$dt = new DateTime();
$creation_date = $dt->format('Y-m-d H:i:s');
$modified_by = $current_user->id;
$modified_date = $dt->format('Y-m-d H:i:s');
if($qst_name) {
  $q = "INSERT INTO `subject_table` (`subject_code`, `subject_description`, `number_of_questions`, `time_allocation`, `created_by`, `creation_date`, `modified_by`, `modified_date`) VALUES (NULL, '$qst_name', '$number_of_qustions', '$time_allocation', '$created_by', '$creation_date', '$modified_by', '$modified_date');";
    $res = $GLOBALS['db']->query($q);
    if ($res) {
      echo "Record saved successfully";
    }
}
$this->ss->display($this->getCustomFilePathIfExists('modules/Eval_Evaluations/Addsubject.html'));