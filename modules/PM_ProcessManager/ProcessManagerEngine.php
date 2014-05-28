<?php
if(!defined('sugarEntry'))define('sugarEntry', true);
/*********************************************************************************
 * Copyright: SierraCRM, Inc. 2007
 * Portions created by SierraCRM are Copyright (C) SierraCRM, Inc.
 * The contents of this file are subject to the SierraCRM, Inc. End User License Agreement
 * You may not use this file except in compliance with the License. 
 * You may not rent, lease, lend, or in any way distribute or transfer any rights or this file or Process Manager
 * registrations (purchased licenses) to third parties without SierraCRM, Inc. written approval, and subject to
 * agreement by the recipient of the terms of this EULA.
 * Process Manager for SugarCRM is owned by SierraCRM, Inc. and is protected by international and local copyright laws and
 * treaties. You must not remove or alter any copyright notices on any copies of Process Manager for SugarCRM. 
 * You may not use, copy, or distribute Process Manager for SugarCRM, except as granted by SierraCRM, Inc.
 * without written authorization from SierraCRM, Inc. or its designated agents. Furthermore, this Copyright notice
 * does not grant you any rights in connection with any trademarks or service marks of SierraCRM, Inc. 
 * SierraCRM, Inc. reserves all intellectual property rights, including copyrights, and trademark rights of this software.
 ********************************************************************************/
/*********************************************************************************
 *SierraCRM, Inc
 *14563 Ward Court
 *Grass Valley, CA. 95945
 *www.sierracrm.com
 ********************************************************************************/

include_once('config.php');
require_once ('log4php/LoggerManager.php');
require_once('include/entryPoint.php');
require_once('include/database/PearDatabase.php');
require_once('data/SugarBean.php');
require_once('include/utils.php');
require_once('modules/Emails/Email.php');
require_once('modules/EmailTemplates/EmailTemplate.php');
require_once('include/TimeDate.php');
require_once('modules/Users/User.php');
require_once ('sugar_version.php'); // provides $sugar_version, $sugar_db_version, $sugar_flavor
require_once ('include/database/DBManager.php');
require_once ('include/database/DBManagerFactory.php');
require_once ('include/javascript/jsAlerts.php');
require_once ('include/modules.php'); // provides $moduleList, $beanList, $beanFiles, $modInvisList, $adminOnlyList, $modInvisListActivities
require_once ('modules/ACL/ACLController.php');
require_once ('modules/Administration/Administration.php');
include_once ('modules/Administration/updater_utils.php');
require_once('modules/Tasks/Task.php');

global $previousTaskId;
global $runningProcessManager;

class ProcessManagerEngine extends SugarBean {

	var $object_name = "ProcessManageEngine";
	var $module_dir = 'ProcessManager';
    
	function ProcessManagerEngine() {
		$GLOBALS['log'] = LoggerManager :: getLogger('SugarCRM');
		global $sugar_config;
		parent::SugarBean();

	}

	var $new_schema = true;
function processManagerMain(){
		
	$GLOBALS['log']->info("ProcessManager - Beginning Main Control Block");
	//Need to instatiate the Sugar Bean
	global $current_user;
    $query = "Select id, object_id, object_type, object_event from pm_processmanager_entry_table";
	$result = $this->db->query($query,true);
	$queryDeleteEntryTable = "Delete from pm_processmanager_entry_table";
	$this->db->query($queryDeleteEntryTable);
    	while($row_process_entry_stage_table = $this->db->fetchByAssoc($result))
		{						
			$entryTableId = $row_process_entry_stage_table['id'];
			$focusObjectId = $row_process_entry_stage_table['object_id'];
			$focusObjectType = $row_process_entry_stage_table['object_type'];
			$focusObjectEvent = $row_process_entry_stage_table['object_event'];
			$GLOBALS['log']->info("ProcessManager - Processing Record Type " .$focusObjectType);
			$GLOBALS['log']->info("ProcessManager - Processing Record ID " .$focusObjectId);
			$this->startProcessManagerMainControlBlock($focusObjectId,$focusObjectType,$focusObjectEvent);

		}
		return true;					
}	
function insertIntoProcessMgrEntryTable($tableName,$objectId,$update_or_insert){
		
	$entryTableId = create_guid();
	$query = "Insert into pm_processmanager_entry_table set id = '" .$entryTableId ."'";
	$query .= ", object_id = '" .$objectId."', object_type = '" .$tableName ."'";
	$query .=", object_event = '" .$update_or_insert ."'";	
	$result = $this->db->query($query);	
	}


//*******************************************************************************
//Main Process for Process Manager - Called from Sugar Bean and external service
//The only passed value is $this - which means that we have been called
//from Save event from Sugar Bean - else if $this being passed in is null
//then we are coming from the service
//*******************************************************************************	


//*****************************************************************************
//This is the start of the process manager called from Sugar Bean
//Passing $this - which will be an object that has either been
//just created or just saved.
//*****************************************************************************
function startProcessManagerMainControlBlock($focusObjectId,$focusObjectType,$focusObjectEvent){
	//We work our way back from the completed process. We query the pm_process_completed
	//table to see if the current object is listed in this table. If so then we check the 
	//process that we are currently in and see if there is any more tasks or stages to do
	//otherwise we work our way over to the table pm_process_current and see if we are 
	//currently in a process - if so then see whats next. If not then see if there is a 
	//default process for the object.
	global $current_user;  
	//Check if the object has an active process
			//Since we are here then we have an object of type leads or opportunities or calls or meetings
			//Then event will be create for all 4 and update for leads or opportunities - so we need to see
			//if there is any process's setup for the object type combo - ie: Lead/Create. First we check
			//to see if there are any default process's. These are process that run for every object type combo		
			$this->checkObjectProcess($focusObjectId,$focusObjectType,$focusObjectEvent,true);
		//}
		return;
	
}

//**************************************************************************
//This function is a helper function that gets the row from the task table
//passed info is task id
//*************************************************************************

function getTask($taskID){
	$query = "Select * from pm_processmanagerstagetask where id = '" .$taskID ."'";
	$result = $this->db->query($query);
	$rowTask = $this->db->fetchByAssoc($result);
	return $rowTask;
}



//*****************************************************************************	
//This function is called from SugarBean and checks to see if there is a default process 
//for the given object for an initial Create of the object
//*****************************************************************************

	function checkObjectProcess($focusObjectId,$focusObjectType,$focusObjectEvent,$isDefault){		
		global $current_user;	
	        require_once('modules/PM_ProcessManager/ProcessManagerEngine1.php');
		$processManagerEngine1 = new ProcessManagerEngine1();
		$checkDefaultProcess = false;
		$resultStageTaskIds = array();
		//If the focus object event is an insert then we look for a create event
		if ($focusObjectEvent == 'insert') {
			$query = "Select id from pm_processmanager where process_object = '" .$focusObjectType ."'";
			$query .="  and start_event = 'Create' and status = 'Active' and deleted = 0";
			$result = $this->db->query($query);
			//If we have a default process then first make sure we have not already done the process
			//If not done then kick it off
			$counter = 1;
			while($row = $this->db->fetchByAssoc($result)){										
				$process_id = $row['id'];
				$isDefaultProcessAlreadyDone = $this->checkIfDefaultProcessAlreadyDone($focusObjectId,$process_id,$this);		
				if (!$isDefaultProcessAlreadyDone) {		
					//Are we a new contact? If so then check to see if this contact has a role
					//that has a process					
					$resultProcessFilterTable = $this->getProcessFilterTableEntry($process_id);			
					$passFilterTest = true;
					while($rowProcessFilterTable =  $this->db->fetchByAssoc($resultProcessFilterTable)){						
						$rowProcessFilterTableID = $rowProcessFilterTable['id'];
						//If we have a process filter table entry then see if the field value pair is equal
						//to the focus object field value pair and if so then run the process - else exit
						//We use the function getFocusObjectFields
						if($rowProcessFilterTableID != ''){										
							$focusFieldsArray = array();
							$field = $rowProcessFilterTable['field_name'];
							$value = $rowProcessFilterTable['field_value'];
							//Get the Filter Operator: equal, not equal, less than, greater than
							$fieldOperator = $rowProcessFilterTable['field_operator'];							
							$focusFieldsArray[$field] = $field;
							//If we are checking for a custom field then call the function to get the 
							//custom fields for the object - else call the original getFocusObjectFields						
							//Dont do anything is both the field name and value are blank
							if ($field != '' ) {
								$GLOBALS['log']->info("ProcessManager - Checking Filter Field for field " .$field);
								$GLOBALS['log']->info("ProcessManager - Checking Filter Field for value " .$value);
								$passFilterTest = $this->getFilterTestResult($passFilterTest,$field,$fieldOperator,$value,$focusObjectId,$focusObjectType,$focusFieldsArray);
							}
						}
					}							
					//So we have a default process - now we are going to check to see if 
					//we are finally ready to enter the steps to check for stages and tasks
					//If there were any filters and all filter conditions passed then we are true
					//otherwise we would be false
					if ($passFilterTest) {
						$GLOBALS['log']->info("ProcessManager - Record Passes Filter Test Result ");
						$processStagesResult = $this->getProcessStages($process_id);
						$processStagesResultCount = $this->getCount("Select pm_processmanagerstage_idb from pm_processmmanagerstage where pm_processmanager_ida = '" .$process_id ."' and deleted = 0");
						//Now call the function to get the first Stage for the process
						//If there is no delay and there is a row then we get the row					
						$resultOrderedStages = $this->getOrderedStages($processStagesResult,$processStagesResultCount);
						if ($resultOrderedStages != '') {
							//Here we have a result set of ordered stages for the process
							//We get each row and see if there is a start delay if so then we place the stage info
							//in the pm_process_stage_waiting_todo
							while($row_stage = $this->db->fetchByAssoc($resultOrderedStages)){
								
									$stage_id = $row_stage['id'];
									$GLOBALS['log']->info("ProcessManager - Getting Stage Tasks for Stage with id " .$stage_id);
									$resultStageTaskIds = $this->getStageTasks($row_stage);
									$resultStageTaskIdsCounter = $this->getStageTasks($row_stage);
										if ($resultStageTaskIds != "") {
											$checkDefaultProcess = true;
											$GLOBALS['log']->info("ProcessManager - Doing Stage Tasks for Stage with id " .$stage_id);
											$this->doStageTasks($process_id,$stage_id,$resultStageTaskIds,$resultStageTaskIdsCounter,$focusObjectId,$focusObjectType);
									}
								
							}
							//So now we have completed this process so make an entry into the pm_process_completed_process table
							$this->insertIntoProcessCompleted($focusObjectId,$process_id);
						}
				//End of if block for pass filter test
				}
			}
			$counter = $counter + 1;
		}
	}
	//Event is an update so see if there is a process for Modify for the given object
	else{		
		$processManagerEngine1->processManagerMain1($focusObjectId,$focusObjectType,$focusObjectEvent,$isDefault,$this);
	}
}

//*********************************************************************
//This process checks to see if the default process for the object/event
//has already been done and if not then we kick it off
//*********************************************************************

function checkIfDefaultProcessAlreadyDone($focusObjectId,$process_id,$thisPM){
	$GLOBALS['log']->info("ProcessManager - Checking if Default Process Already Done for process id  " .$process_id);
	$queryProcessAlreadyDone = "Select id from pm_process_completed_process where object_id = '" .$focusObjectId ."' and process_id = '";
	$queryProcessAlreadyDone .= $process_id ."' and process_complete = 1";
	$resultProcessComplete = $thisPM->db->query($queryProcessAlreadyDone);
	$rowProcessComplete = $thisPM->db->fetchByAssoc($resultProcessComplete);
	if ($rowProcessComplete) {
		return true;
	}
	else{
		return false;
	}
}

//*********************************************************************
//This function inserts an entry into the pm_process_completed_process
//table such that we know that we have completed this process and we dont
//need to do it again
//*********************************************************************

function insertIntoProcessCompleted($focusObjectId,$process_id){
	$GLOBALS['log']->info("ProcessManager - Inserting into Process Completed Process");
	$id = create_guid();
	$query = "Insert into pm_process_completed_process set id = '" .$id ."' , object_id = '" .$focusObjectId ."', process_id = '" .$process_id ."', process_complete = 1";
	$this->db->query($query);
	
}


//******************************************************************
//This little function will return the process create/modify type
//for the LoadDelaytedStage
//***************************************************************
function getProcessCreateModifyType($process_id){
		$query = "Select start_event from pm_processmanager where id = '" .$process_id ."'";
		$result = $this->db->query($query);
		$rowProcess = $this->db->fetchByAssoc($result);
		$processStartType = $rowProcess['start_event']; 
		return $processStartType;

}

//**********************************************************************
//This function is called to retrieve the stages for the given process's
//**********************************************************************
	function getProcessStages($processID){
		$query = "Select pm_processmanagerstage_idb from pm_processmmanagerstage where pm_processmanager_ida = '" .$processID ."' and deleted = 0";
		$result = $this->db->query($query);
		$num_rows_result = count($result);	
		if ($num_rows_result == 0) {
			//There are no stages so do nothing
			return null;
			}
		else{
			return $result;			
		}
		
	}
//*************************************************************************************
//This function will take in the result list of all the stage id for the process and we
//are going to get all the stages ordered by stage_orders
//*************************************************************************************
function getOrderedStages($result,$resultCount){
	$queryStageOrder1 = "Select * from pm_processmanagerstage where id = ";
	//Now loop thru the result adding all the results
	$num_rows_result = count($result);
	$counter = 1;
	while($row_stage_list = $this->db->fetchByAssoc($result))
		{
			$queryStageOrder1 .= "'";
			$stage_id = $row_stage_list["pm_processmanagerstage_idb"];
			if($counter < $resultCount ){
				$queryStageOrder1 .= $stage_id ."'  or id = ";
			}
			else{
				$queryStageOrder1 .= $stage_id ."' and deleted = 0 order by stage_order ASC";
			}
			$counter = $counter + 1;
		}
		
	$resultOrderedStages = $this->db->query($queryStageOrder1);
	
	$num_rows_result_stage_1 = count($resultOrderedStages);
	if ($num_rows_result_stage_1 == 0) {
			//There is no stage 1 - so exit
			return '';
		}
	else{
		return $resultOrderedStages;
	}
	
}

//*************************************************************************
//This function will be passed a row from pm_process_mgr_stage and will
//get the stage one tasks.
//*************************************************************************
function getStageTasks($row_stage_1){
		$GLOBALS['log']->info("ProcessManager - Getting Stage Tasks");
		$stageId = $row_stage_1['id'];
		$query = "Select pm_processmanagerstagetask_idb from pm_processmgerstagetask where pm_processmanagerstage_ida = '" .$stageId ."' and deleted = 0";
		$result = $this->db->query($query);
		$num_rows_result = count($result);
		
		if ($num_rows_result == 0) {
			//There are no stages so do nothing
			$result = "";
			return $result;
			}
		else{
			return $result;			
		}
	
}

//**************************************************************************
//This function is passed in a result set of task ids and is the call
//to do these tasks
//**************************************************************************

function doStageTasks($processID, $stageID, $resultStageTaskIds,$resultStageTaskIdsCounter,$focusObjectId,$focusObjectType){
	$GLOBALS['log']->info("ProcessManager - Doing Stage Tasks");
    $num_rows_result = 0;
    while($row = $this->db->fetchByAssoc($resultStageTaskIdsCounter)){
    	$num_rows_result = $num_rows_result + 1;
    }
	global $current_user;
	//If there are more than one task then we need to order the tasks
	$taskTableQuery = "Select * from pm_processmanagerstagetask where id = '";
	$counter = 1;
	if ($num_rows_result == 1) {
		$row_task_id = $this->db->fetchByAssoc($resultStageTaskIds);
		$taskTableQuery .= $row_task_id['pm_processmanagerstagetask_idb'];
		$taskTableQuery .= "'";
	}
	else{	
		while($row_task_id = $this->db->fetchByAssoc($resultStageTaskIds))
		{
			//$row_task_id = $this->db->fetchByAssoc($resultStageTaskIds);		
			if($counter < $num_rows_result ){
				$taskTableQuery .= $row_task_id['pm_processmanagerstagetask_idb'] ."' or id ='";
			}
			else{
				$taskTableQuery .= $row_task_id['pm_processmanagerstagetask_idb'] ."' ORDER by task_order ASC";
			}
			$counter = $counter + 1;
		}
		
	}
	$result = $this->db->query($taskTableQuery);
	//Now we have all the tasks in order - so get the first row and do the task - whatever it is
	//First check to see if the first task has a delay start
	while($rowTask = $this->db->fetchByAssoc($result))
		{
				$GLOBALS['log']->info("ProcessManager - Running Stage Tasks for Stage with id " .$stageID);
				$this->runTask($processID,$stageID,$rowTask,$focusObjectId,$focusObjectType);
				unset($rowTask);		

		}
	
}



//*****************************************************************************
//This function is called with a single row from the task table
//and is the function that will actually do the task
//*****************************************************************************

function runTask($processID,$stageID,$rowTask,$focusObjectId,$focusObjectType){
	$GLOBALS['log']->info("ProcessManager - Running the Task for focus object id  " .$focusObjectId);
	$GLOBALS['log']->info("ProcessManager - Running the Task for focus object type  " .$focusObjectType);
	//What kind of task are we?
	//Since we are here then we need to set the user information so that pm
	//knows who the owner of the focus object is

	require_once('modules/Users/User.php');
	global $current_user;
	$current_user = new User();
	$rowUser = $this->getFocusOwner($focusObjectType,$focusObjectId);	
	//For version 4.5.1 we get the user preferences from the user_preference table
	$userId = $rowUser['id'];
	$rowUserPreferenceContents = $this->getUserPreferenceRow($userId);
	$current_user->id = $rowUser['id'];
	$current_user->user_name = $rowUser['user_name'];
	//$user_preferences = $rowUser['user_preferences'];
	$user_name = $rowUser['user_name'];
	$_SESSION[$current_user->user_name . '_PREFERENCES']['global'] = unserialize(base64_decode($rowUserPreferenceContents));				
	$current_user->user_preferences['global'] = unserialize(base64_decode($rowUserPreferenceContents));	
	//**********************************************************************
	//Set the session to run the email programs 
	//Time zone needed for email templates
	//**********************************************************************
       //$_SESSION[$current_user->user_name.'_PREFERENCES']['global']['timezone'] = 'America/Los_Angeles';
	
	//$current_user->setPreference($rowUser['user_name'],);
	//This piece of code here mimics the login process where the User objects array
	//setPreference fields are set - we care mostly about emails here
	if ($rowTask['task_type'] == 'Send Email') {
		$taskId = $rowTask['id'];
		$GLOBALS['log']->info("ProcessManager - Running Stage Tasks for Send Email for task with id " .$taskId);
		$this->runEmailTask($taskId,$focusObjectId,$focusObjectType);
	}
		if ($rowTask['task_type'] == 'Create Task') {
		$taskId = $rowTask['id'];
		$GLOBALS['log']->info("ProcessManager - Running Stage Tasks for Create Sugar Task for task with id " .$taskId);
		$this->runCreateTask($processID,$stageID,$rowTask,$focusObjectId,$focusObjectType);
	}
			if ($rowTask['task_type'] == 'Schedule Call') {
				$taskId = $rowTask['id'];
				$GLOBALS['log']->info("ProcessManager - Running Stage Tasks for Schedule Call for task with id " .$taskId);
				$this->runScheduleCallTask($processID,$stageID,$rowTask,$focusObjectId,$focusObjectType);
	}
					if ($rowTask['task_type'] == 'Custom Script') {
					$taskId = $rowTask['id'];
					$GLOBALS['log']->info("ProcessManager - Running Stage Tasks for Calling Custom Script for task with id " .$taskId);
					$this->runCustomScript($processID,$stageID,$rowTask,$focusObjectId,$focusObjectType);
	}
	
	
}
//****************************************************************************
//This function returns the row from the user table for the focus owner
//****************************************************************************

function getFocusOwner($focusObjectType,$focusObjectId){
	$query = "Select assigned_user_id from " .$focusObjectType ." where id = '" .$focusObjectId ."'";
	$result = $this->db->query($query, true);
	$rowLeads = $this->db->fetchByAssoc($result);
	
	$assigned_user_id = $rowLeads['assigned_user_id'];
	
	$queryUsers = "Select id, user_name, user_preferences from users where id = '" .$assigned_user_id ."'";
	$result = $this->db->query($queryUsers, true);
	$rowUser = $this->db->fetchByAssoc($result);
	
	return $rowUser;
	
}

//****************************************************************************
//This function returns the row from the user table for the focus owner
//****************************************************************************

function getUserPreferenceRow($userId){
	$query = "Select contents from user_preferences where assigned_user_id = '" . $userId ."' and category = 'global'";
	$result = $this->db->query($query, true);
	$rowUserPreference = $this->db->fetchByAssoc($result);
	$contents = $rowUserPreference['contents'];
	return $contents;
	
}

//******************************************************************************
//This function will retrieve the email address and id from the contact table
//for the given opp. 
//*****************************************************************************

function getAccountOppEmails($focusObjectId,$focusObjectType,$contact_role){
	$GLOBALS['log']->info("ProcessManager - Getting Account Opp Emails for focus object id  " .$focusObjectId);
	$query_opps_accounts = "Select account_id from accounts_opportunities where opportunity_id  = ";
	$query_opps_accounts .= "'";
	$query_opps_accounts .= $focusObjectId;
	$query_opps_accounts .= "' and deleted = 0";

	$result_opps_accounts =& $this->db->query($query_opps_accounts, true);
	$row = $this->db->fetchByAssoc($result_opps_accounts);
	if ($row) {
		$queryAccount = "Select id from accounts where id = '" .$row['account_id'] ."'";
		$resultAccount = $this->db->query($queryAccount, true);
		$rowAccount = $this->db->fetchByAssoc($resultAccount);
		if ($rowAccount) {
			return $rowAccount;
		}
	}
	
}

//******************************************************************************
//This function will retrieve the email address and id from the contact table
//for the given opp. 
//*****************************************************************************

function getContactOppEmails($focusObjectId,$focusObjectType,$contact_role){
	$GLOBALS['log']->info("ProcessManager - Getting Contact Opp Emails for focus object id  " .$focusObjectId);
	$query_opps_contacts = "Select contact_id from opportunities_contacts where opportunity_id  = ";
	$query_opps_contacts .= "'";
	$query_opps_contacts .= $focusObjectId;
	$query_opps_contacts .= "' and deleted = 0";
	if ($contact_role == '') {
		$query_opps_contacts .= " and contact_role IS NULL ";
	}
	$result_opps_contacts =& $this->db->query($query_opps_contacts, true);
	$row = $this->db->fetchByAssoc($result_opps_contacts);
	if ($row) {
		$queryContact = "Select id from contacts where id = '" .$row['contact_id'] ."'";
		$resultContacts = $this->db->query($queryContact, true);
		$rowContact = $this->db->fetchByAssoc($resultContacts);
		if ($rowContact) {
			return $rowContact;
		}
	}
	
}

//******************************************************************************
//This function will retrieve the email address and id from the account table
//for the given case
//*****************************************************************************

function getAccountEmailForCases($focusObjectId,$focusObjectType){
		
	$GLOBALS['log']->info("ProcessManager - Getting the Email Account for Cases for focus object id  " .$focusObjectId);
	$query_accounts_cases = "Select account_id from cases where id  = ";
	$query_accounts_cases .= "'";
	$query_accounts_cases .= $focusObjectId;
	$query_accounts_cases .= "'";
	
	$result_accounts_cases = $this->db->query($query_accounts_cases, true);
	$row = $this->db->fetchByAssoc($result_accounts_cases);
	return $row;
	
}

//*************************************************************************
//This function runs a custom script created by the end user
//This script lives in the ProcessManager folder called customScripts
//*************************************************************************

function runCustomScript($processID,$stageID,$rowTask,$focusObjectId,$focusObjectType){
	$GLOBALS['log']->info("ProcessManager - Running the Custom Script for focus object type  " .$focusObjectType);
	$GLOBALS['log']->info("ProcessManager - Running the Custom Script for focus object id  " .$focusObjectId);
	//First get the name of the script
	$scriptName = $rowTask['custom_script'];
	require_once("modules/PM_ProcessManager/customScripts/$scriptName");
	//Script name - strip the .php from the custom script name and 
	//call the constructor
	$scriptName = str_replace(".php","",$scriptName);
	$customScript = new $scriptName($focusObjectId,$focusObjectType);

	
	
}

	
//***************************************************************************
//This is the create a new task.
//**************************************************************************
function runCreateTask($processID,$stageID,$rowTask,$focusObjectId,$focusObjectType){
		//Go and get the defs record from pm_process_task_task_defs
		global $current_user;
		$taskId = $rowTask['id'];
		$taskOrder = $rowTask['task_order'];
		$queryTaskTaskDefs = "Select * from pm_process_task_task_defs where task_id = '" .$taskId ."'";
		$resultTaskTaskDefs = $this->db->query($queryTaskTaskDefs);
		$rowTaskTaskDefs = $this->db->fetchByAssoc($resultTaskTaskDefs);
		if ($rowTaskTaskDefs) {
			//Calculate the due datetime which is entered into the table as date_start and time_start
			//If there is no delay then there is no due date so just create the task
			//If this task is to be done when the previous task is complete then queue it up
			//Here means that it is a create or modify delay so go and get either date
			$delay_type = $rowTaskTaskDefs['due_date_delay_type'];
			$focusFieldsArray = array();
			if ($delay_type == "Create") {
				$focusFieldsArray['date_entered'] = 'date_entered';
				$arrayFieldsFromFocusObject = $this->getFocusObjectFields($focusObjectId,$focusObjectType,$focusFieldsArray);
				$focusObjectCreateDate = $arrayFieldsFromFocusObject['date_entered'];
			}
			else{
				$focusFieldsArray['date_modified'] = 'date_modified';
				$arrayFieldsFromFocusObject = $this->getFocusObjectFields($focusObjectId,$focusObjectType,$focusFieldsArray);
				$focusObjectCreateDate = $arrayFieldsFromFocusObject['date_modified'];
			}			
				//If the task start_delay_days =  0 then we use the focus object create date for the call 
				//date_start.
				$newCallTimeStart = $this->getNewCallTimeStart($focusObjectCreateDate,$rowTaskTaskDefs['due_date_delay_years'],$rowTaskTaskDefs['due_date_delay_months'],$rowTaskTaskDefs['due_date_delay_days'],$rowTaskTaskDefs['due_date_delay_hours'],$rowTaskTaskDefs['due_date_delay_minutes']);
				$this->createNewTaskTask($focusObjectId,$focusObjectType,$rowTaskTaskDefs,$newCallTimeStart);			
		}
		
	}
	
//***************************************************************************
//This is the schedule call task
//**************************************************************************
function runScheduleCallTask($processID,$stageID,$rowTask,$focusObjectId,$focusObjectType){
		//Go and get the defs record from pm_process_task_call_defs
		global $current_user;
		$taskId = $rowTask['id'];
		$taskOrder = $rowTask['task_order'];
		$queryTaskCallDefs = "Select * from pm_process_task_call_defs where task_id = '" .$taskId ."'";
		$resultTaskCallDefs = $this->db->query($queryTaskCallDefs);
		$rowTaskCallDefs = $this->db->fetchByAssoc($resultTaskCallDefs);
		if ($rowTaskCallDefs) {
			//Calculate the start time which is entered into the table as date_start and time_start
			//The edit view only allows times to show at 00,15,39,45 minutes after the hours
			//The field start_delay_type will hold the type of delay - from object creation or previous
			//task complete.
			
			//Get the delay type
			$focusFieldsArray = array();
			$delay_type = $rowTaskCallDefs['start_delay_type'];
			if ($rowTaskCallDefs['start_delay_type'] == 'Create') {
				$focusFieldsArray['date_entered'] = 'date_entered';
				$arrayFieldsFromFocusObject = $this->getFocusObjectFields($focusObjectId,$focusObjectType,$focusFieldsArray);
				$focusObjectCreateDate = $arrayFieldsFromFocusObject['date_entered'];
			}
			else{
				$focusFieldsArray['date_modified'] = 'date_modified';
				$arrayFieldsFromFocusObject = $this->getFocusObjectFields($focusObjectId,$focusObjectType,$focusFieldsArray);
				$focusObjectCreateDate = $arrayFieldsFromFocusObject['date_modified'];
			}			
				$newCallTimeStart = $this->getNewCallTimeStart($focusObjectCreateDate,$rowTaskCallDefs['start_delay_years'],$rowTaskCallDefs['start_delay_months'],$rowTaskCallDefs['start_delay_days'],$rowTaskCallDefs['start_delay_hours'],$rowTaskCallDefs['start_delay_minutes']);
				$this->createNewCallTask($focusObjectId,$focusObjectType,$rowTaskCallDefs,$newCallTimeStart,$focusObjectCreateDate);			
		}		
	}


//***************************************************************************
//This function loads a new task into the task table
//***************************************************************************

function createNewTaskTask($focusObjectId,$focusObjectType,$rowTaskTaskDefs,$dueDate){
	$GLOBALS['log']->info("ProcessManager - Creating a New Sugar Call for focus object type  " .$focusObjectType);
	$GLOBALS['log']->info("ProcessManager - Creating a New Sugar Call for focus object id  " .$focusObjectId);	
	global $previousTaskId;
	global $current_user;
	$newTask = new Task();
	$timedate=new TimeDate();
	$timezone = date('Z') / 3600;
	$timezone = substr($timezone,1);
	$today = date('Y-m-d H:i:s', time() + $timezone * 60 * 60);
	$newTaskid = create_guid();
	$previousTaskId = $newTaskid;
	$newCallUserid = create_guid();
	if ($dueDate != '') {
		$spaceLocation = strpos($dueDate," ");
		$taskDueDate = substr($dueDate,0,$spaceLocation);
		$taskDueTime = substr($dueDate,$spaceLocation);
	}
	else{
		$taskDueDate = "000-00-00";
		$taskDueTime = "00:00:00";
	}
	if ($focusObjectType == 'leads') {
		$focusObjectType = 'Leads';
	}
	
	if ($focusObjectType == 'opportunities') {
		$focusObjectType = 'Opportunities';
	}
	if ($focusObjectType == 'cases') {
		$focusObjectType = 'Cases';
	}
	if ($focusObjectType == 'project') {
		$focusObjectType = 'Project';
	}
	$date_start = "000-00-00";
	$time_start = "000:00:00";
	$dateDue = $timedate->to_display_date_time($dueDate);
	$dateStart = $timedate->to_display_date_time($today);
	$newTask->name = $rowTaskTaskDefs['task_subject'];
	$newTask->status = 'Not Started';
	$newTask->date_due_flag = 0;
	$newTask->date_due = $dateDue;
	$newTask->date_start_flag = 0;
	$newTask->date_start = $dateStart;
	$newTask->priority = $rowTaskTaskDefs['task_priority'];
	//Are we a contact focus object?
	if ($focusObjectType == 'contacts') {
		$newTask->parent_type = 'Accounts';
		$newTask->contact_id = $focusObjectId;
	}
	elseif ($focusObjectType == 'accounts'){
		$newTask->parent_type = 'Accounts';
		$newTask->parent_id = $focusObjectId;
	}
	elseif ($focusObjectType == 'tasks'){
		$fieldsArray = array();
		$fieldsArray['parent_type'] = 'parent_type';
		$fieldsArray['parent_id'] = 'parent_id';
		$fieldsArray['contact_id'] = 'contact_id';
		$fieldsArray['is_pm_created_task'] = 'is_pm_created_task';
		$resultFields = $this->getFocusObjectFields($focusObjectId,$focusObjectType,$fieldsArray);
		$newTask->parent_type = $resultFields['parent_type'];
		$newTask->parent_id = $resultFields['parent_id'];
		$newTask->contact_id = $resultFields['contact_id'];
		$isPMCreatedTask = $resultFields['is_pm_created_task'];
		if ($isPMCreatedTask == 1) {
			return;
		}
	}	
	else{
		$newTask->parent_type = $focusObjectType;
		$newTask->parent_id = $focusObjectId;
	}	
	$newTask->assigned_user_id = $current_user->id;
	$newTask->modified_user_id = $current_user->id;	
	$newTask->description = $rowTaskTaskDefs['task_description'];
	$newTask->save(TRUE);
	$newTaskid = $newTask->id;
	$newTaskQuery = "Update tasks set is_pm_created_task = 1 where id = '$newTaskid'";
	$this->db->query($newTaskQuery);	
	return $newTaskid;

}

//***************************************************************************
//This function is called by runScheduleCallTask to insert the new call data
//We pass the focus object and focus type, the row of call defs and also
//call time start.
//Iff the call is for a lead then we set parent type and parent id
//If the call is for a contact then we relate with calls_contacts table
//Also we parse the call start time to get the date and time 
//***************************************************************************

function createNewCallTask($focusObjectId,$focusObjectType,$rowTaskCallDefs,$newCallTimeStart,$focusObjectCreateDate){
	$GLOBALS['log']->info("ProcessManager - Creating a New Sugar Task for focus object type  " .$focusObjectType);
	$GLOBALS['log']->info("ProcessManager - Creating a New Sugar Task for focus object id  " .$focusObjectId);
	global $previousTaskId;
	global $current_user;
	$timedate=new TimeDate();
	require_once('modules/Calls/Call.php');
	$newCall = new Call();
	$timezone = date('Z') / 3600;
	$timezone = substr($timezone,1);
	$today = date('Y-m-d H:i:s', time() + $timezone * 60 * 60);
	$newCallUserid = create_guid();
	if ($focusObjectType == 'leads') {
		$focusObjectType = 'Leads';
	}
	if ($focusObjectType == 'opportunities') {
		$focusObjectType = 'Opportunities';
	}
	if ($focusObjectType == 'cases') {
		$focusObjectType = 'Cases';
	}
	if ($focusObjectType == 'accounts') {
		$focusObjectType = 'Accounts';
	}
	if ($focusObjectType == 'project') {
		$focusObjectType = 'Project';
	}			
	//If the focus object is a call then we need to insert an entry in calls_contacts
	//We also need to go and get the account related to the contact
	//This used in the call insert: parent_type = Accounts and parent_id is account id
	$assignedUserCallId	= $current_user->id;
	$dateStart = $timedate->to_display_date_time($newCallTimeStart);
	$newCall->name = $rowTaskCallDefs['call_subject'];
	//Set the correct parent type
	if ($focusObjectType == 'contacts') {
		$newCall->parent_type = 'Accounts';
	}
	elseif ($focusObjectType == 'tasks'){
		$fieldsArray = array();
		$fieldsArray['parent_type'] = 'parent_type';
		$fieldsArray['parent_id'] = 'parent_id';
		$resultFields = $this->getFocusObjectFields($focusObjectId,$focusObjectType,$fieldsArray);
		$newCall->parent_type = $resultFields['parent_type'];
		$newCall->parent_id = $resultFields['parent_id'];;
	}
	else{
		$newCall->parent_type = $focusObjectType;
	}
	$newCall->parent_id = $focusObjectId;
	$newCall->reminder_time = $rowTaskCallDefs['reminder_time'];
	$newCall->description = $rowTaskCallDefs['call_description'];
	$newCall->duration_hours = 0;
	$newCall->duration_minutes = 15;
	$newCall->direction = "Inbound";
	$newCall->assigned_user_id = $assignedUserCallId;
	$newCall->notify_inworkflow = true;
	$newCall->date_start = $dateStart;
	$newCall->save(TRUE);
	$newCallId = $newCall->id;
	if ($focusObjectType == 'contacts') {
		$focusObjectType = 'Accounts';
		$this->loadCallsContacts($focusObjectId,$newCallId,$today);
		//Now go and get the account for the contact
		$accountContactId = $this->getAccountContactId($focusObjectId);
		$focusObjectId = $accountContactId;	
	}
	//Now insert into calls_user
	$newCallUserQuery = "Insert into calls_users set id = '" .$newCallUserid ."'";
	$newCallUserQuery .= ", call_id = '" .$newCallId ."'";
    $newCallUserQuery .= ", user_id = '" .$current_user->id ."'";		
	$newCallUserQuery .= ", required = 1";
	$newCallUserQuery .= ", accept_status = 'none'";
	$newCallUserQuery .= ", date_modified = '" .$today ."'";
	$newCallUserQuery .= ", deleted = 0";
	$this->db->query($newCallUserQuery);
	if ($focusObjectType == 'Leads') {
		$newCallLeadQuery = "Insert into calls_leads set id = '" .$newCallUserid ."'";
		$newCallLeadQuery .= ", call_id = '" .$newCallId ."', lead_id = '$focusObjectId'";
		$newCallLeadQuery .= ", required = 1";
		$newCallLeadQuery .= ", accept_status = 'accept'";
		$newCallLeadQuery .= ", date_modified = '" .$today ."'";
		$newCallLeadQuery .= ", deleted = 0";
		$this->db->query($newCallLeadQuery);
	}		
	return $newCallId;

}

//***************************************************************************
//This function gets a custom field from the objects cstm field table
//**************************************************************************
function getFocusObjectCustomFields($focusObjectId,$focusObjectType,$focusFieldsArray){
	$GLOBALS['log']->info("ProcessManager - Getting Custom Object Fields for object id " .$focusObjectId);
	//The focusObjectType holds the object like lead, contacts, etc.
	$table = $focusObjectType;
	$table .= '_cstm';	
	$counter = 1;
	$query = "Select ";
		//Get the count of array fields so we know when to not add the ,
		$countOfArrayElements = count($focusFieldsArray);		
		foreach($focusFieldsArray as $field)
			{				
				// Copy the relevant fields
				$fieldName = $field;				
				$query .= $fieldName;
				if ($counter < $countOfArrayElements) {
					$query .= " ,";	
				}	
				$counter ++;
			}
		$query .= " from " .$table ." where id_c = '" .$focusObjectId ."'";
		$resultFieldValues = $this->db->query($query);
		$rowFieldValues = $this->db->fetchByAssoc($resultFieldValues);
		//Now build the array with the values and send back
		foreach($focusFieldsArray as $field)
			{
				// Copy the relevant fields
				$fieldName = $field;
				$fieldValue = $rowFieldValues[$fieldName];
				$focusFieldsArray[$fieldName] = $fieldValue;
			}
		return $focusFieldsArray;	 	
}
//****************************************************************************
//This is a generic function that is passed an array of fields and returns
//the values of the fields.
//***************************************************************************

function getFocusObjectFields($focusObjectId,$focusObjectType,$focusFieldsArray){
	$GLOBALS['log']->info("ProcessManager - Getting Focus Object Fields for object type " .$focusObjectType);
	$GLOBALS['log']->info("ProcessManager - Getting Focus Object Fields for object id " .$focusObjectId);
	//Here we check to first see if the 
	
	$counter = 1;
	$query = "Select ";
		//Get the count of array fields so we know when to not add the ,
		$countOfArrayElements = count($focusFieldsArray);
		
		foreach($focusFieldsArray as $field)
			{
				
				// Copy the relevant fields
				$fieldName = $field;
				
				$query .= $fieldName;
				if ($counter < $countOfArrayElements) {
					$query .= " ,";	
				}	
				$counter ++;

			}
		$query .= " from " .$focusObjectType ." where id = '" .$focusObjectId ."'";
		$resultFieldValues = $this->db->query($query);
		$rowFieldValues = $this->db->fetchByAssoc($resultFieldValues);
		//Now build the array with the values and send back

		foreach($focusFieldsArray as $field)
			{
				// Copy the relevant fields
				$fieldName = $field;
				$fieldValue = $rowFieldValues[$fieldName];
				$focusFieldsArray[$fieldName] = $fieldValue;

			}
		return $focusFieldsArray;
	 
	
}
	
//****************************************************************************
//											
//***********************--- TIME FUNCTIONS --********************************
//
//****************************************************************************	
	
function getNewCallTimeStart($focusObjectCreateDate,$startDelayYears,$startDelayMonths,$startDelayDays,$startDelayHours,$startDelayMinutes){
	$GLOBALS['log']->info("ProcessManager - Getting New Call Time Start ");
	//First thing to do is to see if the delay is in days - if so add that many days to 
	//Create Date
	if ($startDelayDays != 0) {
		$hour = $hour + $startDelayHours;
	}
	
	
	//Date Entered for Focus Object in this format - 2005-11-23 18:34:00
	$timedate = new TimeDate();
	$user = new User();
	$timezone = date('Z') / 3600;
	
	//So we know the users timezone - and this value is a value like -8
	//So remove the - and get the offset.
	$timezone = substr($timezone,1);
	
	$focusObjectCreateDateNew = date($focusObjectCreateDate, time() - 8 * 60 * 60);

	 
	list ($year, $month, $day, $hour, $min, $sec) = split ('[- :]', $focusObjectCreateDate);
	if ($startDelayYears != 0) {
		$year = $year + $startDelayYears;
	}
	if ($startDelayMonths != 0) {
		$month = $month + $startDelayMonths;
	}	
	if ($startDelayDays != 0) {
		$day = $day + $startDelayDays;
	}
	if ($startDelayHours != 0) {
		$hour = $hour + $startDelayHours;
	}
	
	if ($startDelayMinutes != 0) {
		$min = $min + $startDelayMinutes;
	}
	//Make seconds = 00
	$sec = '00';
	$callStartDateWhole = date("Y-m-d H:i:s",mktime ($hour, $min, $sec, $month, $day, $year));
	$GLOBALS['log']->info("ProcessManager - New Call Time Start Calculated to be " .$callStartDateWhole);
	return $callStartDateWhole;	
}


//*************************************************************************
//This function will get the contacts related account id and return 
//For when the task is a call

function getAccountContactId($focusObjectId){
	
	$queryAccountContacts = "Select account_id from accounts_contacts where contact_id = '" .$focusObjectId ."'";
	$result = $this->db->query($queryAccountContacts);
	$row = $this->db->fetchByAssoc($result);
	if ($row) {
		$accountId = $row['account_id'];
	}
	return $accountId;
	
}

//****************************************************************************
//This function is called to run an email task and is passed the task id
//object id and object type
//***************************************************************************

function runEmailTask($taskId,$focusObjectId,$focusObjectType){
	require_once('modules/Users/User.php');
	global $current_user;
	$current_user = new User();
	$rowUser = $this->getFocusOwner($focusObjectType,$focusObjectId);	
	//For version 4.5.1 we get the user preferences from the user_preference table
	$userId = $rowUser['id'];
	$rowUserPreferenceContents = $this->getUserPreferenceRow($userId);
	$current_user->id = $rowUser['id'];
	$current_user->user_name = $rowUser['user_name'];
	//$user_preferences = $rowUser['user_preferences'];
	$user_name = $rowUser['user_name'];
	$_SESSION[$current_user->user_name . '_PREFERENCES']['global'] = unserialize(base64_decode($rowUserPreferenceContents));				
	$current_user->user_preferences['global'] = unserialize(base64_decode($rowUserPreferenceContents));	
	//**********************************************************************
	//Set the session to run the email programs 
	//Time zone needed for email templates
	//**********************************************************************
       //$_SESSION[$current_user->user_name.'_PREFERENCES']['global']['timezone'] = 'America/Los_Angeles';
	require_once('modules/Emails/Email.php');
	require_once('modules/EmailTemplates/EmailTemplate.php');
	if (isset($GLOBALS['beanList']) && isset($GLOBALS['beanFiles'])) {
				global $beanFiles;
				global $beanList;
			} else {
				require_once('include/modules.php');
			}
	$new_email = new Email();
	$emailTemplate = new EmailTemplate();
	//Get contact or lead data depending on what the focus object type is:
	$queryEmailDefsTable = "Select * from pm_process_task_email_defs where task_id = '" .$taskId ."'";

	$result = $this->db->query($queryEmailDefsTable);
	$row = $this->db->fetchByAssoc($result);
	if ($row) {

		//First see if we are only on contact create or modify and if so
		 //then get the email address of the contact
			if ($focusObjectType == "contacts") {

				$rowEmailAddressOptOut = $this->getEmailAddress($focusObjectId,$focusObjectType);
				$to_address = $rowEmailAddressOptOut['email_address'];
				$emailOptOut = $rowEmailAddressOptOut['opt_out'];

				$focusObjectIdContactBorrower = $focusObjectId;
				if ($to_address == "") {
						return;
				}
				if ($emailOptOut != "0") {
						return;
				}
			}
			//For Opportunities go and see if there is a related contact to the opportunity
			//Must have a releated contact and an email to send an email
			if ($focusObjectType == "opportunities") {			
				//New feature to check to see if we are using opp - accounts emails
				//New Functio getAccountOppEmails
				$sendEmailToOppAccount = $row['send_email_to_caseopp_account'];
				if ($sendEmailToOppAccount == 1) {
						$rowAccountOpp = $this->getAccountOppEmails($focusObjectId,$focusObjectType,$contact_role);
						$focusObjectIdAccount = $rowAccountOpp['id'];
						$rowEmailAddressOptOut = $this->getEmailAddress($focusObjectIdAccount,"accounts");  			
					}
				else{			
						$rowContactOpp = $this->getContactOppEmails($focusObjectId,$focusObjectType,$contact_role);
						$focusObjectType = 'contacts';
						$focusObjectIdContact = $rowContactOpp['id'];
						$focusObjectId	 = $focusObjectIdContact;
						$rowEmailAddressOptOut = $this->getEmailAddress($focusObjectIdContact,"contacts"); 
					}
						 
						$to_address = $rowEmailAddressOptOut['email_address'];
						$emailOptOut = $rowEmailAddressOptOut['opt_out'];
							if ($to_address == "") {
								return;
							}
							if ($emailOptOut != "0") {
								return;
							}		
			}
			
			//Get the Leads email address
			if ($focusObjectType == "leads") {
				$rowEmailAddressOptOut = $this->getEmailAddress($focusObjectId,$focusObjectType);
				$to_address = $rowEmailAddressOptOut['email_address'];
				$emailOptOut = $rowEmailAddressOptOut['opt_out'];
				if ($to_address == "") {
						return;
				}
				if ($emailOptOut != "0") {
						return;
				}
			}
			//Get the accounts email address
			if ($focusObjectType == "accounts") {

				$rowEmailAddressOptOut = $this->getEmailAddress($focusObjectId,$focusObjectType);
				$to_address = $rowEmailAddressOptOut['email_address'];
					$focusObjectIdContactBorrower = $focusObjectId;
				if ($to_address == "") {
						return;
				}
			}
			//For cases - get the email address for the related account			
			if ($focusObjectType == "cases") {			
						$case_id = 	$focusObjectId;				
						$rowAccountCases = $this->getAccountEmailForCases($focusObjectId,$focusObjectType);
						$focusObjectType = 'accounts';
						$focusObjectId = $rowAccountCases['account_id'];
						$rowEmailAddress = $this->getEmailAddress($focusObjectId,$focusObjectType);
						$to_address = $rowEmailAddress['email_address'];
						
							if ($to_address == "") {
								return;
							}
							
			$focusObjectType = 'accounts';
			}

	//Now final clean up for new fwature for for opp accounts
	if ($sendEmailToOppAccount == 1) {
		$focusObjectType = 'accounts';
		$focusObjectId	 = $focusObjectIdAccount;
	}
			
	$email_template_id = $row['email_template_id'];
	$query_template = "SELECT * from email_templates where id = ";
	$query_template .= "'";
	$query_template .=  $email_template_id;
	$query_template .= "'";
	$result_email_template = $this->db->query($query_template);
	$row_email_template = $this->db->fetchByAssoc($result_email_template);
		//Get the row from the email template table
		//$row_email_template = getEmailTemplate($email_template_id,$this);
		//$row_email_template = $this->db->fetchByAssoc($email_template);
		//Are we html or text email?
		if ($row_email_template["body_html"] != "") {
			$email_template_body = $row_email_template["body_html"];
			$email_type = 'HTML';
		}
		else{
			$email_template_body = $row_email_template["body"];
		}
		$email_template_subject = $row_email_template["subject"];
		if ($focusObjectType == 'leads') {
			$object_arr_leads = array();
			$object_arr_leads['Leads'] = $focusObjectId;	 
			$email_template_body = $emailTemplate->parse_template($email_template_body,$object_arr_leads);
			$email_template_subject = $emailTemplate->parse_template($email_template_subject,$object_arr_leads);
			//Now clear the array
			$object_arr_leads['Leads'] = null;
			$lead_id = $focusObjectId;
		}
		if ($focusObjectType == 'accounts') {
			$object_arr_leads = array();
			$object_arr_leads['Accounts'] = $focusObjectId;	 
			$email_template_body = $emailTemplate->parse_template($email_template_body,$object_arr_leads);
			$email_template_subject = $emailTemplate->parse_template($email_template_subject,$object_arr_leads);
			//Now clear the array
			$object_arr_leads['Accounts'] = null;
			$account_id = $focusObjectId;
		}
		if ($focusObjectType == 'contacts') {
			$object_arr_leads = array();
			$object_arr_leads['Contacts'] = $focusObjectId;
			$email_template_body = $emailTemplate->parse_template($email_template_body,$object_arr_leads);
			$email_template_subject = $emailTemplate->parse_template($email_template_subject,$object_arr_leads);
			//Now clear the array
			$object_arr_leads['Contacts'] = null;
			$contact_id = $focusObjectId;
							
		}
		
		//Last item to parse is the user so go and get the user object
			$object_arr_leads = array();			
			$object_arr_leads['Users'] = $current_user->id;
			
			$email_template_body = $emailTemplate->parse_template($email_template_body,$object_arr_leads);
			$email_template_subject = $emailTemplate->parse_template($email_template_subject,$object_arr_leads);
			//Now clear the array
			
			//Now we have the parsed email body:
			//Get the email address of the contact or lead
			
			$new_email->cc_addrs_arr = array();
			$new_email->bcc_addrs_arr = array();
			$new_email->to_addrs = $to_address;
			//$new_email->to_addrs_arr = $new_email->parse_addrs($to_address, $_REQUEST['to_addrs_ids'], $_REQUEST['to_addrs_names'], $_REQUEST['to_addrs_emails']);
			$new_email->name = $email_template_subject;
			$new_email->type = 'out';
			if ($focusObjectType == 'leads') {
				$new_email->parent_type = "Leads";
				$new_email->parent_id = $focusObjectId;
			}
			else{
				$new_email->parent_type = "Accounts";
				$new_email->parent_id = $focusObjectId;
			}
			//Are we html?
			if ($email_type == "HTML")
			{
				$new_email->description_html = $email_template_body;
				$new_email->isHtml = true;	
			}
			else{
				$new_email->description = $email_template_body;
				$new_email->isHtml = false;	
			}


			//The from account is the id from the table inbound email - so query this table with the current_user id
			//Map the focus object type so that we can properly create the email_bean record
			if ($focusObjectType == 'leads') {
				$focusObjectType = "Leads";
			}
			if ($focusObjectType == 'contacts') {
				$focusObjectType = "Contacts";
			}			
			$fromAccountID = $this->getEmailAccountForSending($userId);
			$request = array();
			$request['sendSubject'] = $email_template_subject;
			$request['sendDescription'] = $email_template_body;
			$request['sendTo'] = $to_address;
			//Account information is from inbound_email table
			$request['fromAccount'] = $fromAccountID;
			$request['addressFrom1'] = $fromAccountID;
			//Set parent id to be focus id
			$request['parent_id'] = $focusObjectId;
			$request['parent_type'] = $focusObjectType;
			$request['saveToSugar'] = "1";
			$request['addressTo1'] = $to_address;
			$request['sendCc'] = '';
			$request['sendBcc'] = '';
			$request['sendCharset'] = '';
			//******************************************************
			$_REQUEST['sendSubject'] = $email_template_subject;
			//This is the body of the email
			$_REQUEST['sendDescription'] = $email_template_body;
			$_REQUEST['sendTo'] = $to_address;
			$_REQUEST['setEditor'] = "1";
			$_REQUEST['sendCharset'] = "ISO-8859-1";
			$_REQUEST['addressTo2'] = $to_address;
			$_REQUEST['emailUIAction'] = "sendEmail";
			$_REQUEST['addressFrom1'] = $fromAccountID;
			$_REQUEST['fromAccount'] = $fromAccountID;
			$_REQUEST['saveToSugar'] = "1";
			$_REQUEST['addressTo1']  = $to_address;
			$_REQUEST['parent_id'] = $focusObjectId;
			$_REQUEST['parent_type'] = $focusObjectType;
			$_REQUEST['sendCc'] = '';
			$_REQUEST['sendBcc'] = '';
			$_REQUEST['sendCharset'] = '';
			//Now check to see if there are any attachments
			//From the email_templates id we check table notes on parent_id and if there is a notes then we
			//add the notes id to the request - we already have the email template id and it is $email_template_id
			$attachmentId = $this->getTemplateAttachments($email_template_id);
			if ($attachmentId != '') {
				$_REQUEST['templateAttachments'] = $attachmentId;
				$request['templateAttachments'] = $attachmentId;
			}
			$new_email->email2init();
			$GLOBALS['log']->info("ProcessManager - Sending Email to " .$to_address);
			$new_email->email2Send($request);		
			$GLOBALS['log']->info("ProcessManager - Email Sent To " .$to_address);
			//$this->loadEmail($lead_id,$contact_id,$opportunity_id,$account_id,$case_id,$email_template_body,$email_template_subject,$to_address);
			
	}
	unset($new_email);
}

//This function will return the id from the inbound_email table for the current user
function getEmailAccountForSending($currentUserId){	
	$GLOBALS['log']->info("ProcessManager - Getting Email Account for Sending ");
	$query = "Select id from inbound_email where created_by = '$currentUserId' and is_personal = 1";
	$resultEmailAccount = $this->db->query($query, true);
    $rowEmailAccount= $this->db->fetchByAssoc($resultEmailAccount);
    $accountId = $rowEmailAccount['id'];
    return $accountId;	
}

//This function will check to see if there is an attachment on the template
function getTemplateAttachments($email_template_id){
	$query = "Select id from notes where parent_id = '$email_template_id' and deleted = 0";
	$resultAttachment = $this->db->query($query, true);
    $rowAttachment = $this->db->fetchByAssoc($resultAttachment);
    $attachmentId = $rowAttachment['id'];
    return $attachmentId;
}

//****************************************************************************
//This function is passed the object type and id and we get the email address
//for sending an email - old function. New function 
//****************************************************************************

function getEmailAddress($focusObjectId,$focusObjectType){
$GLOBALS['log']->info("ProcessManager - Getting Email Address for contact/lead/account for Sending ");
//Return the row of data with email address and opt out if leads or contacts
if ($focusObjectType == 'leads') {
		$focusObjectType = 'Leads';
	}
if ($focusObjectType == 'contacts') {
		$focusObjectType = 'Contacts';
	}
if ($focusObjectType == 'accounts') {
		$focusObjectType = 'Accounts';
	}		
//email_addr_bean_rel - table that holds the pointer to the new email address table
$queryAddrBeanRel = "Select email_address_id from email_addr_bean_rel where bean_id = '$focusObjectId' and primary_address = 1 and bean_module = '$focusObjectType' and deleted = 0";
$resultAddrBeanRel =& $this->db->query($queryAddrBeanRel, true);
$rowAddrBeanRel= $this->db->fetchByAssoc($resultAddrBeanRel);

$emailAddressId = $rowAddrBeanRel['email_address_id'];
//Now query the email_addresses table
$queryemail_addresses = "Select * from email_addresses where id = '$emailAddressId'";
$result_email =& $this->db->query($queryemail_addresses, true);
$row_email= $this->db->fetchByAssoc($result_email);
  //$toAddress = $row_email['email1'];
  return $row_email;
}



//******************************************************************
//This function checks to see if there is an active process for 
//the focus object.
//******************************************************************

function checkFocusProcess($focusObjectType){
	require_once ('config.php'); // provides $sugar_config
	global $sugar_config;
	$configOptions = $sugar_config['dbconfig'];
	$dbName = $configOptions['db_name'];
	$queryProcess = "Select value from config where name = 'pm_version'";
	$result = $this->db->query($queryProcess);
	$row = $this->db->fetchByAssoc($result);
	$name = $row['value'];
	if ($name == $dbName) {		
		return true;
	}
	else{	
		return false;
	}
	
	
}

//************************************************************
//This function will insert a record into the call_contacts
//table for a new call
//************************************************************

function loadCallsContacts($focusObjectId,$newCallid,$today){
$newCallsContactsId = create_guid();
$newCallsContactsQuery = "Insert into calls_contacts set id = '" .$newCallsContactsId ."'";
$newCallsContactsQuery .= ", call_id = '" .$newCallid ."'";
$newCallsContactsQuery .= ", contact_id = '" .$focusObjectId ."'";
$newCallsContactsQuery .= ", required = 1, accept_status = 'none'";
$newCallsContactsQuery .= ",date_modified ='" . $today ."'";
$newCallsContactsQuery .= ", deleted = 0";
$this->db->query($newCallsContactsQuery);
}
//***********************************************************************************
//This function saves an email object against the contact or lead
//*************************************************************************************

//***************************************************************************************************
//This function will get the entry in the filter table for the given process
//***************************************************************************************************

function getProcessFilterTableEntry($process_id){
	$query = "Select * from pm_process_filter_table where process_id = '" .$process_id ."'";
	$result = $this->db->query($query);
	return $result;
}

//**********************************************************************************
//Generic Count Function

function getCount($sql){
	$counter = 0;
	$result = $this->db->query($sql);
	while($row = $this->db->fetchByAssoc($result))
		{
			$counter = $counter + 1;
		}
	return $counter;
}

//***********************************************************************************************
//This function is used to determine if we pass the filter test
//***********************************************************************************************

function getFilterTestResult($passFilterTest,$field,$fieldOperator,$value,$focusObjectId,$focusObjectType,$focusFieldsArray){	
	$GLOBALS['log']->info("ProcessManager - Getting the Filter Test Results for field " .$field);
	$GLOBALS['log']->info("ProcessManager - Getting the Filter Test Results for field operator " .$fieldOperator);
	$GLOBALS['log']->info("ProcessManager - Getting the Filter Test Results for field value " .$value);
	$subStringCount = 0;
	$subStringCount = substr_count ($field,"_c");
	//Determine if this is a custom field - first get the length
	$lengthOfField = strlen($field);
	$start = 	$lengthOfField - 2;
	$checkCustomField = substr($field,$start);
	$table = $focusObjectType;
	if ($checkCustomField == '_c') {
		//So now we have a custom field								    
			$arrayFieldsFromFocusObject = $this->getFocusObjectCustomFields($focusObjectId,$focusObjectType,$focusFieldsArray);
			$fieldValueFromFocusObect = $arrayFieldsFromFocusObject[$field];
			$table .= '_cstm';
			
	}
	else{
			$arrayFieldsFromFocusObject = $this->getFocusObjectFields($focusObjectId,$focusObjectType,$focusFieldsArray);
			$fieldValueFromFocusObect = $arrayFieldsFromFocusObject[$field];
	}	
	
    //Now compare the values based on the field operator - mods on 3/24/2009
	//Now determine if the $fieldValueFromFocusObect is a date field
	//Patch 12/4/2009
	//Get the Data Type
	$dataType = $this->getDataType($table,$field);
	if ($dataType == 'datetime') {
		//Return just the y-m-d
		$fieldValueFromFocusObect = strtotime($fieldValueFromFocusObect);
		$value = strtotime($value);
	}
    if ($fieldOperator == '=') {
		if($value != $fieldValueFromFocusObect){
			$passFilterTest = false;		
		}
    }
    if ($fieldOperator == '!=') {
    			if($value == $fieldValueFromFocusObect){	
				$passFilterTest = false;		
			}
    }
    //Patch 12/4/2009
    if ($fieldOperator == '&lt;') {
    			if($value < $fieldValueFromFocusObect){	
				$passFilterTest = false;		
			}
    }
    //Patch 12/4/2009
    if ($fieldOperator == '&gt;') {
    			if($value > $fieldValueFromFocusObect){	
				$passFilterTest = false;		
			}
    }
    //Patch 03/26/2010
    if ($fieldOperator == 'contains') {
    		if (strstr($fieldValueFromFocusObect, $value) === false) {
    			$passFilterTest = false;
    		}
    }
	//Patch 03/26/2010
    if ($fieldOperator == 'does not contain') {
    		if (strstr($fieldValueFromFocusObect, $value) !== false) {
    			$passFilterTest = false;
    		}
    }
    $GLOBALS['log']->info("ProcessManager - Getting the Filter Test Results and it is: " .$passFilterTest);
	return $passFilterTest;
}

//Return the data type
function getDataType($table,$field){
	$query = "show fields from  $table";
	$result = $this->db->query($query,true);
	while($row = $this->db->fetchByAssoc($result))
		{
			$fieldName = $row['Field'];
			if ($fieldName == $field) {
				$dataType = $row['Type'];
			}
		}
	return $dataType;
}

}

function insertIntoProcessMgrEntryTable($tableName,$objectId,$update_or_insert){
	require_once('data/SugarBean.php');
	$thisSugarBean = new SugarBean();
	$entryTableId = create_guid();
	$query = "Insert into pm_processmanager_entry_table set id = '" .$entryTableId ."'";
	$query .= ", object_id = '" .$objectId."', object_type = '" .$tableName ."'";
	$query .=", object_event = '" .$update_or_insert ."'";	
	$result = $thisSugarBean->db->query($query);	
	}
	
	
?>