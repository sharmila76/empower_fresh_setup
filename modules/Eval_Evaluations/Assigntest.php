<?php

if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');

echo '<h1>Testing</h1>';
$subject = "SELECT * FROM subject_table";
$res = $GLOBALS['db']->query($subject);
while ($row = $GLOBALS['db']->fetchByAssoc($res)) {
  $subject_list[] = $row;
}

$subject_and_time = array();
foreach ($subject_list as $value) {
  $subject_and_time[$value['subject_description']] = $value['time_allocation'];
}
$json_object = json_encode($subject_and_time);

$this->ss->assign('json_array', $json_object);

$this->ss->assign('SUBJECT_LIST', $subject_list);


$this->ss->display($this->getCustomFilePathIfExists('modules/Eval_Evaluations/Assigntest.html'));

