<?php
require_once('include/formbase.php');
require_once('modules/PM_ProcessManager/PM_ProcessManager.php');
require_once('log4php/LoggerManager.php');
require_once('data/SugarBean.php');
global $current_user;
$user_id = $current_user->id;
$processFilterFieldArray = array();
$processFilterListArray = array();
$processFilterFieldValueArray = array();
$thisSugarBean = new SugarBean();
$focus = new PM_ProcessManager();
$focus->retrieve($_POST['record']);
$return_val = array();
//In this custom save we need to pick up the following fields and add after the sugar save
$name =($_POST['name']);
$focus->name = $name;
$processObject =($_POST['process_object']);
$startEvent = ($_POST['start_event']);
$description = ($_POST['description']);
$focus->save();
 
//Now update the record with the name
//Now see if there any filter table entries and if so then add
$return_id = $focus->id;
$userId = 
$queryUpdate = "Update pm_processmanager set description = '$description',name = '$name', process_object = '$processObject', start_event = '$startEvent', ";  
$queryUpdate .= "  assigned_user_id = '$user_id' where id = '$return_id'";

$thisSugarBean->db->query($queryUpdate, true);
//If either of these two fields are not blank then we have a process for change lead status or change sales stage
//For each of the 5 filter field/value combos we insert into the filter table
		
	$process_object_field = $_POST['process_filter_field1'];
	$process_filter_list = $_POST['filter_list1'];
	$process_object_field_value = $_POST['process_object_field1_value'];
		
	if ($process_object_field_value != "") {
		$processFilterTableId = checkIfProcessFilterTableExists($return_id,$thisSugarBean);
		$lcrmProcessFilterTableId = create_guid();
		$query_insert = "Insert into pm_process_filter_table set id = '" .$lcrmProcessFilterTableId ."'";
		$query_insert .= ", process_id = '" .$focus->id ."', field_name = '" .$process_object_field ."', field_value = '" .$process_object_field_value ."'";
		$query_insert .= ",  field_operator = '$process_filter_list' ";
		
		$query_update = "Update pm_process_filter_table set  field_name = '" .$process_object_field ."', field_value = '" .$process_object_field_value ."'" ;
		$query_update .= ", field_operator = '$process_filter_list' ";
		$query_update .= " where id = '" .$processFilterTableId ."' ";											
		if ($processFilterTableId != '') {
			$focus->db->query($query_update, true);
		}
		else{
			$focus->db->query($query_insert, true);
		}

	}



//Now redirect to Edit View Page
handleRedirect($return_id, "PM_ProcessManager");
//Check to see if the entry in the process filter table already exists

function checkIfProcessFilterTableExists($processId,$thisSugarBean){
	$processFilterTableId = '';
	$query = "Select id from pm_process_filter_table where process_id = '$processId' ";
	$result = $thisSugarBean->db->query($query, true);
	while($rowProcessFilterTable = $thisSugarBean->db->fetchByAssoc($result))
		{	
			$processFilterTableId = $rowProcessFilterTable['id'];	
		}

	return $processFilterTableId;
}




?>