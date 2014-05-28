<?php
require_once('include/formbase.php');
require_once('modules/PM_ProcessManagerStageTask/PM_ProcessManagerStageTask.php');
require_once('data/SugarBean.php');
global $current_user;
$user_id = $current_user->id;
$thisSugarBean = new SugarBean();
$focus = new PM_ProcessManagerStageTask();
$focus->retrieve($_POST['record']);
$return_val = array();
$name =($_POST['name']);
$taskType =($_POST['task_type']);
$description =($_POST['description']);
$startDelayType = ($_POST['start_delay_type']);
$customScript = ($_POST['custom_script']);
$focus->name = $name;
$focus->task_type = $taskType;
$focus->description = $description;
$focus->start_delay_type = $start_delay_type;
$focus->custom_script = $customScript;
$focus->save();
 
//Now update the record with the name

//Now see if there any filter table entries and if so then add
$return_id = $focus->id;
$queryUpdate = "Update pm_processmanagerstagetask set start_delay_type = '$startDelayType', description = '$description' , name = '$name', task_type = '$taskType', assigned_user_id = '$user_id' where id = '$return_id'";

$thisSugarBean->db->query($queryUpdate, true);
//Now check to see what associated defs file needs to be updated
//The field is task type which will be Send Email, Schedule Call, Schedule Meeting, Create Task, Create Note

if ($taskType == "Send Email") {
    $result = array();
	//First see if there already is an associated email template
	$query = "Select * from pm_process_task_email_defs where task_id = '" .$focus->id ."'";
	$result = $focus->db->query($query, true);
	$row_email_defs = $focus->db->fetchByAssoc($result);
	$id = $row_email_defs["id"];
    $email_template = $_POST['email_templates'];
	$contact_role = $_POST['contact_role'];  
	$send_email_to_caseopp_account = $_POST['send_email_to_caseopp_account'];
	if ($send_email_to_caseopp_account == '') {
		$send_email_to_caseopp_account = 0;
	}
	if($id != ''){
			updateTaskEmailTemplates($focus,$id,$email_template,$contact_role,$send_email_to_caseopp_account);
		}
	else{			
			insertTaskEmailTemplateDefs($focus,$focus->id,$email_template,$contact_role,$send_email_to_caseopp_account);
		}
}

//This is for the create task
if ($taskType == "Create Task") {
	//First see if there already is an associated email template
	$focusId = $focus->id;
	$query = "Select * from pm_process_task_task_defs where task_id = '" .$focusId ."'";
	$result = $thisSugarBean->db->query($query, true);
	$row_task_task_defs = $focus->db->fetchByAssoc($result);
	$id = $row_task_task_defs["id"];
	if($id != ''){
			updateTaskTaskDefs($focus,$id);
	}
	else{			
			insertTaskTaskDefs($focus,$focus->id);
	}
}

//This is for the Schedule Call
if ($taskType == "Schedule Call") {
    $result = array();
	//First see if there already is an associated call defs
	$query = "Select * from pm_process_task_call_defs where task_id = '" .$focus->id ."'";
	$result = $focus->db->query($query, true);
	$rowCallDefs = $focus->db->fetchByAssoc($result);
	$id = $rowCallDefs["id"];
	if($id != ''){	
			updateTaskCallDefs($focus,$id);
		}
	else{			
			insertTaskCallDefs($focus,$focus->id);
		}
}

//Now redirect to Edit View Page
handleRedirect($return_id, "PM_ProcessManagerStageTask");
//Check to see if the entry in the process filter table already exists

//***************************************************************************
//Insert the Email Task Def record
//***************************************************************************
function insertTaskEmailTemplateDefs($focus,$id,$email_template_name,$contact_role,$send_email_to_caseopp_account){
	//Get the id of the template
	$query = "Select id from email_templates where name = '" .$email_template_name ."'";
	$result_email_template_name = $focus->db->query($query,true);
	$row_email_template_name = $focus->db->fetchByAssoc($result_email_template_name);
	if($row_email_template_name){
		$email_template_id = $row_email_template_name['id'];
		$email_template_defs_id = create_guid();
		$query = "Insert into pm_process_task_email_defs set id = '" .$email_template_defs_id ."', email_template_name = '" .$email_template_name ."', ";
		$query .= " email_template_id ='" .$email_template_id ."', task_id = '" .$id ."'";
		$query .= ", contact_role = '" .$contact_role ."' , send_email_to_caseopp_account = $send_email_to_caseopp_account ";
		$focus->db->query($query,true);
		
		//Now update the related id in the task table
		$query = "Update pm_processmanagerstagetask set email_template_defs_id = '" .$email_template_defs_id ."' where id = '" .$id ."'";
		$focus->db->query($query,true);
	}
	
}

function updateTaskEmailTemplates($focus,$email_template_defs_id,$email_template_name,$contact_role,$send_email_to_caseopp_account){
	
	//Go and get the id for the email template first
	$query = "Select id from email_templates where name = '" .$email_template_name ."'";
	$result =& $focus->db->query($query, true);
	$row_email_template = $focus->db->fetchByAssoc($result);
	$emailTemplateId = $row_email_template['id'];
	
	$queryUpdate = "Update pm_process_task_email_defs set email_template_name = '" .$email_template_name ."', email_template_id = '" .$emailTemplateId ."'";
	$queryUpdate .= " , contact_role = '" .$contact_role ."', send_email_to_caseopp_account = $send_email_to_caseopp_account ";
	$queryUpdate .= " where id = '" .$email_template_defs_id ."'";
	$result =& $focus->db->query($queryUpdate, true);
}
//********************************************************************************
//Insert or Update the Task Task Defs file
//********************************************************************************
function updateTaskTaskDefs($focus,$id){
	//Get the fields from the post/request
	$taskSubject = $_POST['task_subject'];
	$taskPriority = $_POST['task_priority'];
	$taskDueDateDelayMinutes = $_POST['task_due_date_delay_minutes'];
	$taskDueDateDelayHours = $_POST['task_due_date_delay_hours'];
	$taskDueDateDelayDays = $_POST['task_due_date_delay_days'];
	$taskDueDateDelayMonths = $_POST['task_due_date_delay_months'];
	$taskDueDateDelayYears = $_POST['task_due_date_delay_years'];
	$taskDescription = $_POST['task_description'];
	if ($taskDueDateDelayMinutes == '') {
		$taskDueDateDelayMinutes = 0;
	}
	if ($taskDueDateDelayHours == '') {
		$taskDueDateDelayHours = 0;
	}
	if ($taskDueDateDelayDays == '') {
		$taskDueDateDelayDays = 0;
	}
	if ($taskDueDateDelayMonths == '') {
		$taskDueDateDelayMonths = 0;
	}
	if ($taskDueDateDelayYears == '') {
		$taskDueDateDelayYears = 0;
	}		
	$startDelayType = $_POST['start_delay_type'];
	//Get the id of the template
	$query = "Update pm_process_task_task_defs set task_subject = '" .$taskSubject ."'";
	$query .= ", task_priority = '" .$taskPriority ."' , due_date_delay_minutes = " .$taskDueDateDelayMinutes;
	$query .= ", due_date_delay_hours = " .$taskDueDateDelayHours .", due_date_delay_days = " .$taskDueDateDelayDays;
	$query .= ", due_date_delay_months = " .$taskDueDateDelayMonths .", due_date_delay_years = " .$taskDueDateDelayYears;
	$query .= ", due_date_delay_type = '" .$startDelayType ."' , task_description = '$taskDescription' ";
	$query .= " where id = '" .$id ."'";
	$focus->db->query($query,true);
	
}

function insertTaskTaskDefs($focus,$focusID){
	$process_task_task_defs_id = create_guid();
//Get the fields from the post/request
	$taskSubject = $_POST['task_subject'];
	$taskPriority = $_POST['task_priority'];
	$taskDueDateDelayMinutes = $_POST['task_due_date_delay_minutes'];
	$taskDueDateDelayHours = $_POST['task_due_date_delay_hours'];
	$taskDueDateDelayDays = $_POST['task_due_date_delay_days'];
	$taskDueDateDelayMonths = $_POST['task_due_date_delay_months'];
	$taskDueDateDelayYears = $_POST['task_due_date_delay_years'];
	$startDelayType = $_POST['start_delay_type'];
	$taskDescription = $_POST['task_description'];
	//Get the id of the template
	$query = "INSERT into pm_process_task_task_defs set task_subject = '" .$taskSubject ."'";
	$query .= ", task_priority = '" .$taskPriority ."'";
	if ($taskDueDateDelayMinutes != '') {
		$query .= ", due_date_delay_minutes = " .$taskDueDateDelayMinutes;
	}
	if ($taskDueDateDelayHours != '') {
		$query .= ", due_date_delay_hours = " .$taskDueDateDelayHours;
	}
	if ($taskDueDateDelayDays != '') {
		$query .= ", due_date_delay_days = " .$taskDueDateDelayDays;
	}
	if ($taskDueDateDelayMonths != '') {
		$query .= ", due_date_delay_months = " .$taskDueDateDelayMonths;
	}
	if ($taskDueDateDelayYears != '') {
		$query .= ", due_date_delay_years = " .$taskDueDateDelayYears;
	}		
	$query .= ", due_date_delay_type = '" .$startDelayType ."', task_description = '$taskDescription' ";
	$query .= ", id =  '" .$process_task_task_defs_id ."' , task_id = '" .$focusID ."'";
	$focus->db->query($query,true);
	
	//Now update the related id in the task table
		$query = "Update pm_processmanagerstagetask set task_defs_id = '" .$process_task_task_defs_id ."' where id = '" .$focusID ."'";
		$focus->db->query($query,true);
}
//********************************************************************************
//Insert or Update the Call Task Defs file
//********************************************************************************
function updateTaskCallDefs($focus,$id){
	
	//Get the fields from the post/request
	$callSubject = $_POST['call_subject'];
	$callDescription = $_POST['call_description'];
	$callStartDateMinutesDelay = $_POST['call_due_date_delay_minutes'];
	if ($callStartDateMinutesDelay == "") {
		$callStartDateMinutesDelay = 0;
	}
	$callStartDateHoursDelay = $_POST['call_due_date_delay_hours'];
	if ($callStartDateHoursDelay == "") {
		$callStartDateHoursDelay = 0;
	}
	$callStartDateDaysDelay = $_POST['call_due_date_delay_days'];
	if ($callStartDateDaysDelay == "") {
		$callStartDateDaysDelay = 0;
	}
	//Months
	$callStartDateMonthsDelay = $_POST['call_due_date_delay_months'];
	if ($callStartDateMonthsDelay == "") {
		$callStartDateMonthsDelay = 0;
	}
	//Years
	$callStartDateYearsDelay = $_POST['call_due_date_delay_years'];
	if ($callStartDateYearsDelay == "") {
		$callStartDateYearsDelay = 0;
	}

	
	
	if(isset($_POST['should_remind']) && $_POST['should_remind'] == '0'){
			$_POST['reminder_time'] = -1;
			$callReminderTime = $_POST['reminder_time'];
	}
	else{
		$callReminderTime = $_POST['reminder_time'];
	}
	if(!isset($_POST['reminder_time'])){
		$_POST['reminder_time'] = $current_user->getPreference('reminder_time');
		if(empty($_POST['reminder_time'])){
			$_POST['reminder_time'] = -1;
			$callReminderTime = $_POST['reminder_time'];
		}
			
	}

	$callDescription = $_POST['call_description'];
	$startDelayType = $_POST['start_delay_type'];
	if ($assignedUserIdCall == 'Please Specify') {
		$assignedUserIdCall = '';
	}
	//Get the id of the template
	$query = "Update pm_process_task_call_defs set call_subject = '" .$callSubject ."'";
	$query .= ", reminder_time = " .$callReminderTime ." , start_delay_minutes = " .$callStartDateMinutesDelay;
	$query .= ", start_delay_hours = " .$callStartDateHoursDelay .", start_delay_days = " .$callStartDateDaysDelay;
	$query .= ", start_delay_months = " .$callStartDateMonthsDelay .", start_delay_years = " .$callStartDateYearsDelay;
	$query .= ", call_description = '" .$callDescription ."'";
	$query .= ", start_delay_type = '" .$startDelayType ."'";
	$query .= " where id = '" .$id ."'";
	$focus->db->query($query,true);
	
}

function insertTaskCallDefs($focus,$focusID){
	$process_task_call_defs_id = create_guid();
//Get the fields from the post/request
	$callSubject = $_POST['call_subject'];
	$callDescription = $_POST['call_description'];
	$callStartDateMinutesDelay = $_POST['call_due_date_delay_minutes'];
	if ($callStartDateMinutesDelay == "") {
		$callStartDateMinutesDelay = 0;
	}
	$callStartDateHoursDelay = $_POST['call_due_date_delay_hours'];
	if ($callStartDateHoursDelay == "") {
		$callStartDateHoursDelay = 0;
	}
	$callStartDateDaysDelay = $_POST['call_due_date_delay_days'];
	if ($callStartDateDaysDelay == "") {
		$callStartDateDaysDelay = 0;
	}
	//Months
	$callStartDateMonthsDelay = $_POST['call_due_date_delay_months'];
	if ($callStartDateMonthsDelay == "") {
		$callStartDateMonthsDelay = 0;
	}
	//Years	
	$callStartDateYearsDelay = $_POST['call_due_date_delay_years'];
	if ($callStartDateYearsDelay == "") {
		$callStartDateYearsDelay = 0;
	}	

	if(isset($_POST['should_remind']) && $_POST['should_remind'] == '0'){
			$_POST['reminder_time'] = -1;
			$callReminderTime = $_POST['reminder_time'];
	}
	else{
		$callReminderTime = $_POST['reminder_time'];
	}
	if(!isset($_POST['reminder_time'])){
		$_POST['reminder_time'] = $current_user->getPreference('reminder_time');
		if(empty($_POST['reminder_time'])){
			$_POST['reminder_time'] = -1;
			$callReminderTime = $_POST['reminder_time'];
		}
			
	}
	$startDelayType = $_POST['start_delay_type'];
	if ($assignedUserIdCall == "Please Specify") {
		$assignedUserIdCall = '';
	}
	//Get the id of the template
	$query = "Insert into pm_process_task_call_defs set call_subject = '" .$callSubject ."'";
	$query .= ", reminder_time = " .$callReminderTime ." , start_delay_minutes = " .$callStartDateMinutesDelay;
	$query .= ", start_delay_hours = " .$callStartDateHoursDelay .", start_delay_days = " .$callStartDateDaysDelay;
	$query .= ", start_delay_months = " .$callStartDateMonthsDelay .", start_delay_years = " .$callStartDateYearsDelay;
	$query .= ", call_description = '" .$callDescription ."' , task_id = '" .$focusID ."'";
	$query .= ", start_delay_type = '" .$startDelayType ."'";
	$query .= ", id = '" .$process_task_call_defs_id ."'";
	$focus->db->query($query,true);
	
	//Now update the related id in the task table
		$query = "Update pm_processmanagerstagetask set calls_defs_id = '" .$process_task_call_defs_id ."' where id = '" .$focusID ."'";
		$focus->db->query($query,true);
}



?>