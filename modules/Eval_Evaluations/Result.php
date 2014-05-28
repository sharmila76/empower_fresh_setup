<?php

if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');

echo '<h1>Result</h1></br>';

$candidate_name = $_SESSION['candidate_name'];
$number_of_correct_answers = 0;
$select = "SELECT * FROM test_result WHERE student_name='$candidate_name'";
$result = $GLOBALS['db']->query($select);
  while ($select_question_code = $GLOBALS['db']->fetchByAssoc($result)) {
    $question_code = $select_question_code['question_code'];
    $answered_choices = explode(',', $select_question_code['answered_choices']);
    $question_and_answer = "SELECT correct_answer FROM question_and_answer WHERE question_code='$question_code'";
    $correct_answer = $GLOBALS['db']->query($question_and_answer)->fetch_row();
    $check_answer = explode(',', $correct_answer[0]);
    $check_correct_answer = array_intersect($answered_choices, $check_answer);
    if(count($check_correct_answer) == count($check_answer)) {
      $number_of_correct_answers = $number_of_correct_answers + 1;
    }
  }
  if($number_of_correct_answers) {
    echo 'Congrats! you have scored ' . $number_of_correct_answers . '/' . $_SESSION['question_count'];
  }
  else {
    echo 'You scored 0 marks.' . '/' . $_SESSION['question_count'];
  }





