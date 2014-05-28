<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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

require_once('include/database/PearDatabase.php');
require_once('data/SugarBean.php');
require_once('include/TimeDate.php');
global $previousTaskId;
global $runningProcessManager;
class ProcessManagerEngine1 extends ProcessManagerEngine {


	var $object_name = "ProcessManageEngine1";
	var $module_dir = 'ProcessManager';

	function ProcessManagerEngine1() {
		global $sugar_config;
		parent::SugarBean();
	}

	var $new_schema = true;


	//**************************************************************************************************
	//This is the main control block for the process manager engine for all process that are of type
	//modify and not create.
	//**************************************************************************************************
	function processManagerMain1($focusObjectId,$focusObjectType,$focusObjectEvent,$isDefault,$thisprocessManagerMain1){
		//First thing we are going to do is see if the focus object has a process setup for
		//a non create event and is a default process
		$doesObjectHaveNonCreateProcess = $this->checkObjectProcessNonCreate($focusObjectId,$focusObjectType,$focusObjectEvent,true);
		return;
	}
//**************************************************************************************************
//Here we are querying the pm_process_mgr_table to see if the object has a non create process
//**************************************************************************************************
function checkObjectProcessNonCreate($focusObjectId,$focusObjectType,$focusObjectEvent,$isDefault){
	$query = "Select * from pm_processmanager where process_object = '" .$focusObjectType ."'";
	$query .=" and status = 'Active' and start_event = 'Modify' and deleted = 0";
	$result = $this->db->query($query);
	//If we end up with a non create process then we must also have a filter table entry
		$counter = 1;
		while($row = $this->db->fetchByAssoc($result)){
			$process_id = $row['id'];
			$process_event = $row['start_event'];
			$cancel_on_event = $row['cancel_on_event'];
			
			//***********************************************
			//Is this a cancel on event and if so then
			//call the function to go and remove all pending
			//tasks or stages
			//***********************************************
			

			
			//Done with the checks for Cancel On Event
			
				$isDefaultProcessAlreadyDone = $this->checkIfDefaultProcessAlreadyDone($focusObjectId,$process_id,$this);		
				if (!$isDefaultProcessAlreadyDone) {				
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
							if ($field != '') {
								$passFilterTest = $this->getFilterTestResult($passFilterTest,$field,$fieldOperator,$value,$focusObjectId,$focusObjectType,$focusFieldsArray);
							}
						}
					}							
					//So we have a default process - now we are going to check to see if 
					//we are finally ready to enter the steps to check for stages and tasks
					//If there were any filters and all filter conditions passed then we are true
					//otherwise we would be false
					if ($passFilterTest) {
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
								if ($row_stage['start_delay_minutes'] != 0 || $row_stage['start_delay_hours'] != 0 || $row_stage['start_delay_days'] != 0 || $row_stage['start_delay_months'] != 0 || $row_stage['start_delay_years'] != 0) {
									$checkDefaultProcess = true;
									$this->loadDelayedStage($focusObjectId,$focusObjectType,$process_id,$row_stage);
								}
								else{
									$stage_id = $row_stage['id'];
									$resultStageTaskIds = $this->getStageTasks($row_stage);
									$resultStageTaskIdsCounter = $this->getStageTasks($row_stage);
										if ($resultStageTaskIds != "") {
											$checkDefaultProcess = true;
											$this->doStageTasks($process_id,$stage_id,$resultStageTaskIds,$resultStageTaskIdsCounter,$focusObjectId,$focusObjectType);
									}
								}
							}
							//So now we have completed this process so make an entry into the pm_process_completed_process table
							$this->insertIntoProcessCompleted($focusObjectId,$process_id);
						}
				//End of if block for pass filter test
				}
			}
		}
	
}	
	
//***********************************************************************************************
//This function will return the deleted flag for the given focus object
//***********************************************************************************************

function getFocusObjectDeletedFlag($focusObjectId,$focusObjectType){
	$query = "Select deleted from $focusObjectType where id = '" .$focusObjectId ."'";
	$result = $this->db->query($query);
	$row = $this->db->fetchByAssoc($result);
	$isDeleted = $row['deleted'];
	if ($isDeleted == 1) {
		return true;
	}
	else{
		return false;
	}
}



function convertMonth($month){
	switch ($month) {
		case "January":
		return "1";
		break;
		case "February":
		return "2";
		break;
		case "March":
		return "3";
		break;
		case "April":
		return "4";
		break;
		case "May":
		return "5";
		break;
		case "June":
		return "6";
		break;
		case "Jule":
		return "7";
		break;
		case "August":
		return "8";
		break;
		case "September":
		return "9";
		break;
		case "October":
		return "10";
		break;
		case "November":
		return "11";
		break;
		case "December":
		return "12";
		break;
	}


}

function convertday($n){

	switch ($n){
		case "Mon": return "Monday";break;
		case "Tue": return "Tuesday";break;
		case "Wed": return "Wednesday";break;
		case "Thu": return "Thursday";break;
		case "Fri": return "Friday";break;
		case "Sat": return "Saturday";break;
		case "Sun": return "Sunday";break;
	};

}

function curdate(){

	$ret = $this->convertday(date("D"));

	return $ret;
}

}
?>