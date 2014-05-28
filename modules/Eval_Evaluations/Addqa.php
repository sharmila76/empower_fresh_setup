<?php

if (!defined('sugarEntry') || !sugarEntry)
  die('Not A Valid Entry Point');

echo '<h1>Setting up question and answers</h1></br>';

$subject = "SELECT * FROM subject_table";
$res = $GLOBALS['db']->query($subject);
while ($row = $GLOBALS['db']->fetchByAssoc($res)) {
  $subject_list[] = $row;
}

$this->ss->assign('SUBJECT_LIST', $subject_list);

$subject_name = $_REQUEST['subject_name'];
$subject = "SELECT subject_code FROM subject_table WHERE subject_description='$subject_name'";
$res = $GLOBALS['db']->query($subject)->fetch_row();
$subject_code = $res[0];

$question_type = $_REQUEST['question_type'];
if (isset($_REQUEST['number_of_answers'])) {
  $number_of_answers = $_REQUEST['number_of_answers'];
}
if (isset($_REQUEST['question_name'])) {
  $question_name = $_REQUEST['question_name'];
}

$choice1 = $_REQUEST['answer1'];
if (isset($_REQUEST['correct1'])) {
  $correct[] = $choice1;
}

$choice2 = $_REQUEST['answer2'];
if (isset($_REQUEST['correct2'])) {
  $correct[] = $choice2;
} 

$choice3 = $_REQUEST['answer3'];
if (isset($_REQUEST['correct3'])) {
  $correct[] = $choice3;
} 

$choice4 = $_REQUEST['answer4'];
if (isset($_REQUEST['correct4'])) {
  $correct[] = $choice4;
}

if($question_name) {
  $correct_answers = implode(',', $correct);
  $q = "INSERT question_and_answer SET subject_code='$subject_code', question_name='$question_name', answer1='$choice1', answer2='$choice2', answer3='$choice3', answer4='$choice4', correct_answer='$correct_answers'";
  $res = $GLOBALS['db']->query($q);
    if ($res) {
      echo "Question added successfully";
    }
}



//choices





$this->ss->display($this->getCustomFilePathIfExists('modules/Eval_Evaluations/Addqa.html'));
