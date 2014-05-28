<?php

if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');

echo '<h1>Questions</h1></br>';

if (isset($_REQUEST['candidate_name'])) {
  $candidate_name = $_REQUEST['candidate_name'];
  $this->ss->assign('candidate_name', $candidate_name);
}

$subject_name = $_REQUEST['subject_name'];
$this->ss->assign('subject_name', $subject_name);

$subject = "SELECT subject_code, time_allocation FROM subject_table WHERE subject_description='$subject_name'";
$res = $GLOBALS['db']->query($subject)->fetch_row();
$subject_code = $res[0];
$this->ss->assign('subject_code', $subject_code);
$time = $res[1];
$this->ss->assign('time', $time);

if (isset($_REQUEST['number_of_questions'])) {
  $number_of_questions_to_select = $_REQUEST['number_of_questions'];
  $this->ss->assign('questions', $number_of_questions_to_select);
}

//Select random questions.
$select = "SELECT `question_code`, `question_name`, `answer1`, `answer2`, `answer3`, `answer4`, `correct_answer` FROM `question_and_answer` WHERE `subject_code` = $subject_code ORDER BY RAND( ) LIMIT $number_of_questions_to_select";
$result = $GLOBALS['db']->query($select);
while ($row_list = $GLOBALS['db']->fetchByAssoc($result)) {
  $question_list[] = $row_list;
}
$this->ss->assign('questions_list', $question_list);

//print_r($question_list);
//Test section.
if (isset($_REQUEST['submit_test'])) {
  $_SESSION['question_count'] = count($_REQUEST['question']);
  $_SESSION['candidate_name'] = $_REQUEST['candidate_name'];
  $candidate_name = $_SESSION['candidate_name'];
  $subject_code = $_REQUEST['subject_code'];
  foreach ($_REQUEST['question'] as $question_code) {
    if ($_REQUEST[$question_code]) {
      $answered_choices = implode(',', $_REQUEST[$question_code]);
    } else {
      $answered_choices = implode(array('No'));
    }
    $insert = "INSERT test_result SET subject_code='$subject_code', question_code='$question_code', answered_choices='$answered_choices', student_name='$candidate_name'";
    $insert_result = $GLOBALS['db']->query($insert);
  }
  $url = "index.php?module=Eval_Evaluations&action=Result";
  SugarApplication::redirect($url);
}

$this->ss->display($this->getCustomFilePathIfExists('modules/Eval_Evaluations/Questions.html'));



