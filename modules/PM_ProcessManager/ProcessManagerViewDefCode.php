<?PHP

function getFilterList($focus, $field, $value, $view) { //This is the function that the field will run when it is displayed
	$fields = '<name="filterList"  size="10" multiple="multiple">
					<option value==>equal to</option>
					<option value=!=>not equal to</option>
					<option value="<">less than</option>
					<option value=">">greater than</option>
				    <option value="contains">contains</option>
				    <option value="does not contain">does not contain</option>					
		 		';
		return $fields;

}

function getObjectFields($focus, $field, $value, $view) { //This is the function that the field will run when it is displayed
if ($field == 'contacts_fields') {
	$table = 'contacts';
}
if ($field == 'accounts_fields') {
	$table = 'accounts';
}
if ($field == 'cases_fields') {
	$table = 'cases';
}
if ($field == 'opportunities_fields') {
	$table = 'opportunities';
}
if ($field == 'leads_fields') {
	$table = 'leads';
}
if ($field == 'project_fields') {
	$table = 'project';
}
if ($field == 'tasks_fields') {
	$table = 'tasks';
}
if ($field == 'process_filter_field1') {
	$table = 'contacts';
}
$fields = '	<style=\"display:none;\" visiblitity="hidden"  name="sel1" size="10" multiple="multiple">';
$fields .= '<option value=Please Specify>Please Specify</option>';	
$queryFieldList = 'show fields from ' .$table;
$resultFieldList = $focus->db->query($queryFieldList, true);
while($rowFieldList = $focus->db->fetchByAssoc($resultFieldList)){
		$fieldName = $rowFieldList['Field'];
		$fields .= '<option value="'.$fieldName .'">'.$fieldName .'</option>';
}
//Now go and see if there are any custom fields for the given module
$customTable = $table .'_cstm';
//get the database name 
global $sugar_config;
$dbname=$sugar_config['dbconfig']['db_name'];
//If we are on windows then we need to set the dbname to lowercase for mysql on windows
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    $dbname = strtolower($dbname);
} 

$columnName = 'Tables_in_' .$dbname;
$queryShowTables = 'show tables';
$resultShowTables = $focus->db->query($queryShowTables, true);
while($rowShowTables = $focus->db->fetchByAssoc($resultShowTables)){
		$tableName = $rowShowTables[$columnName];
		if ($customTable == $tableName) {
			//we have a custom table so go and get the custom fields and add to the field array
			$queryCustomTable = "show fields from $tableName";
			$resultCustomTable = $focus->db->query($queryCustomTable, true);
				while($rowCustomTable = $focus->db->fetchByAssoc($resultCustomTable)){
					$fieldName = $rowCustomTable['Field'];
					$fields .= '<option value="'.$fieldName .'">'.$fieldName .'</option>';
				}
		}
		
}

return $fields;
}


//Function to get the email template names for the Process Stage task

function getEmailTemplates($focus, $field, $value, $view) { //This is the function that the field will run when it is displayed

$fields = '	<style=\"display:none;\" visiblitity="hidden"  name="sel1" size="10" multiple="multiple">';
$queryFieldList = 'Select name from email_templates';
$resultFieldList = $focus->db->query($queryFieldList, true);
//First see if there is already an email template defs record
	if ($view != 'DetailView') {	
		require_once('modules/PM_ProcessManager/ProcessManagerUtils.php');
		$processManagerUtil = new ProcessManagerUtils();
		if ($focus->id != "") {
			//Get the object that the Process is filtering against
			$emailTemplateDefsRow = $processManagerUtil->getTaskEmailTemplateDefs($focus);
			//Now see if we have an existing entry for this sequence		
			$processTaskEmailTemplateName = $emailTemplateDefsRow['email_template_name'];
			if ($processTaskEmailTemplateName != '') {
	 				$fields .= '<option value="'.$processTaskEmailTemplateName .'">'.$processTaskEmailTemplateName .'</option>';
			 	}
			else{ 	 
				$fields .= '<option value=Please Specify>Please Specify</option>';	
			}		
		}
		else{
			$fields .= '<option value=Please Specify>Please Specify</option>';	
		}
	while($rowFieldList = $focus->db->fetchByAssoc($resultFieldList)){
		$fieldName = $rowFieldList['name'];
		$fields .= '<option value="'.$fieldName .'">'.$fieldName .'</option>';
	}
  }
return $fields;
}

function getAssignedUserId($focus, $field, $value, $view) { //This is the function that the field will run when it is displayed
	$fields = '	<style=\"display:none;\" visiblitity="hidden"  name="sel1" size="10" multiple="multiple">';
	//First see if there is already an assigned user for this task or call
	$focusid = $focus->id;
	if ($field == 'assigned_user_id_task') {
		$query = "Select assigned_user_id_task from pm_process_task_task_defs where task_id = '$focusid'";
	}
	else{
		$query = "Select assigned_user_id_call from pm_process_task_call_defs where task_id = '$focusid'";
	}
	$resultQueryField = $focus->db->query($query, true);
	$rowFieldList = $focus->db->fetchByAssoc($resultQueryField);
	$field = $rowFieldList[$field];
		if ($field != '') {
			$fields .= '<option value="'.$field .'">'.$field .'</option>';
		}
		else{
			$fields .= "<option value='Please Specify'>Please Specify</option>";
		}	
$queryFieldList = 'Select user_name from users';
$resultFieldList = $focus->db->query($queryFieldList, true);
while($rowFieldList = $focus->db->fetchByAssoc($resultFieldList)){
		$fieldName = $rowFieldList['user_name'];
		$fields .= '<option value="'.$fieldName .'">'.$fieldName .'</option>';
}
return $fields;
}

function getProcessFilterField($focus, $field, $value, $view){
	//This function will check to see if this is an edit call or new
	//If Edit then $focus is set - so what we do is get the fields from the object table
	//Fill the array - then set the one that is current.	
	//Ignore if DetailView
	
	$filterListName = "process_filter_field1";
	$fields = '<name="filterList"  size="10" multiple="multiple">';
	if ($view != 'DetailView') {	
		require_once('modules/PM_ProcessManager/ProcessManagerUtils.php');
		$processManagerUtil = new ProcessManagerUtils();
		if ($focus->id != "") {
			//Get the object that the Process is filtering against
			$processObject = $processManagerUtil->getProcessObjectField($focus,"process_object");
			//Now see if we have an existing entry for this sequence		
			$processFilterField = $processManagerUtil->getFieldBySequenceID($focus,'field_name');
			if ($processFilterField != '') {
			 	$fields = $processManagerUtil->getFieldsFromTable($focus,$processObject,$processFilterField);
			 	return $fields;			 	
			 	} 
		}
	}
	$fields .= '<option value=Please Specify>Please Specify</option>';
	return $fields;
}



//This next function will get the field from the process filter table
//Focus is the Process Manager - so focus id is the id
//field is the field defined in vardefs - detail view
function getDetailViewField($focus, $field, $value, $view){
	$focusid = $focus->id;
	$queryField = "Select field_name from pm_process_filter_table where process_id = '$focusid'";
	$resultQueryField = $focus->db->query($queryField, true);
	$rowFieldList = $focus->db->fetchByAssoc($resultQueryField);
	$field = $rowFieldList['field_name'];
	if ($field != '') {
		$fields = $field; 

	}
	else{
		$fields = 'N/A';
	}
	return $fields;
}

function getDetailViewValue($focus, $field, $value, $view){
	$focusid = $focus->id;
	$focusid = $focus->id;
	
	$queryField = "Select field_value from pm_process_filter_table where process_id = '$focusid'";
	$resultQueryField = $focus->db->query($queryField, true);
	$rowFieldList = $focus->db->fetchByAssoc($resultQueryField);
	$field = $rowFieldList['field_value'];
	if ($field != '') {
		$fields = $field; 

	}
	else{
		$fields = '';
	}
	return $fields;
}

function getEditViewValue($focus, $field, $value, $view){
	$focusid = $focus->id;
	$focusid = $focus->id;	
	$queryField = "Select field_value from pm_process_filter_table where process_id = '$focusid'";
	$resultQueryField = $focus->db->query($queryField, true);
	$rowFieldList = $focus->db->fetchByAssoc($resultQueryField);
	$fieldValue = $rowFieldList['field_value'];
	if ($fieldValue != '') {
		$fields = "<input type='text' name='$field' id='$field' size='30' maxlength='255' value='$fieldValue' title='' tabindex='6' > ";
	}
	else{
		$fields = "<input type='text' name='$field' id='$field' size='30' maxlength='255' value='' title='' tabindex='6' > ";
	}
	return $fields;
}
function getDetailViewOperator($focus, $field, $value, $view){
	$focusid = $focus->id;
	$queryField = "Select field_operator from pm_process_filter_table where process_id = '$focusid'";
	$resultQueryField = $focus->db->query($queryField, true);
	$rowFieldList = $focus->db->fetchByAssoc($resultQueryField);
	$field = $rowFieldList['field_operator'];
	if ($field != '') {
		$fields = $field; 

	}
	else{
		$fields = 'N/A';
	}
	return $fields;
}

//***********************************************************
//Generic function to get a specific field for the detail view

function getDetailViewObjectField($focus, $field, $value, $view){
	$focusid = $focus->id;
	$queryField = "Select $field from pm_processmanager where id = '$focusid' ";
	$resultQueryField = $focus->db->query($queryField, true);
	$rowFieldList = $focus->db->fetchByAssoc($resultQueryField);
	$field = $rowFieldList[$field];
	if ($field != '') {
		$fields = $field; 

	}
	else{
		$fields = 'N/A';
	}
	return $fields;
}


//***************************************************
//This next function will get Email Defs Values
//for PM Stage Task Detail View
function getDetailViewEmailDefField($focus, $field, $value, $view){
	$focusid = $focus->id;
	$queryField = "Select $field from pm_process_task_email_defs where task_id = '$focusid'";
	$resultQueryField = $focus->db->query($queryField, true);
	$rowFieldList = $focus->db->fetchByAssoc($resultQueryField);
	$field = $rowFieldList[$field];
	if ($field != '') {
		$fields = $field; 

	}
	else{
		$fields = '';
	}
	return $fields;
}

//********************************************************************************
//This function will get the information for the detail view for the task defs
//getDetailViewTaskDefField
function getDetailViewTaskDefField($focus, $field, $value, $view){
	$focusid = $focus->id;
	$field = substr($field,12);
	//Each $field will have 1,2,3,4,5 as the last element
	//So get the value and ask for that sequence id
	$focusid = $focus->id;	
	$queryField = "Select $field from pm_process_task_task_defs where task_id = '$focusid'";
	$resultQueryField = $focus->db->query($queryField, true);
	$rowFieldList = $focus->db->fetchByAssoc($resultQueryField);
	$field = $rowFieldList[$field];
	if ($field != '') {
		$fields = $field; 

	}
	else{
		$fields = '';
	}
	return $fields;
}
//********************************************************************************

//**********************************************************************************
//Function to get the Call Defs Fields - 
function getDetailViewCallDefField($focus, $field, $value, $view){
	$focusid = $focus->id;
	$field = substr($field,17);
	//Each $field will have 1,2,3,4,5 as the last element
	//So get the value and ask for that sequence id
	$focusid = $focus->id;	
	$queryField = "Select $field from pm_process_task_call_defs where task_id = '$focusid'";
	$resultQueryField = $focus->db->query($queryField, true);
	$rowFieldList = $focus->db->fetchByAssoc($resultQueryField);
	$field = $rowFieldList[$field];
	if ($field != '') {
		$fields = $field; 

	}
	else{
		$fields = '';
	}
	return $fields;
}
//**********************************************************************************

//******************************************************************************
//Function to get the task details in the edit view
function getTaskEditViewField($focus, $field, $value, $view){
	$focusid = $focus->id;
	//Each $field will have 1,2,3,4,5 as the last element
	//So get the value and ask for that sequence id
	$queryField = "Select $field from pm_process_task_task_defs where task_id = '$focusid'";
	$resultQueryField = $focus->db->query($queryField, true);
	$rowFieldList = $focus->db->fetchByAssoc($resultQueryField);
	$fieldValue = $rowFieldList[$field];
		$fields = "<input type=text name='$field' value='$fieldValue' size=50>";
	return $fields;
}

function getTaskEditViewFieldPriority($focus, $field, $value, $view) { //This is the function that the field will run when it is displayed

	$fields = '	<style=\"display:none;\" visiblitity="hidden"  name="sel1" size="10" multiple="multiple">';
	$focusid = $focus->id;	
	$queryField = "Select task_priority from pm_process_task_task_defs where task_id = '$focusid'";
	$resultQueryField = $focus->db->query($queryField, true);
	$rowFieldList = $focus->db->fetchByAssoc($resultQueryField);
	$field = $rowFieldList[$field];
		if ($field != '') {
		$fields .= '<option value="'.$field .'">'.$field .'</option>';
	}
	$fields .= '<option value="High">High</option>';
	$fields .= '<option value="Medium">Medium</option>';
	$fields .= '<option value="Low">Low</option>';
return $fields;
}
//*****************************************************************************

//******************************************************************************
//Function to get the task details in the edit view
function getCallEditViewField($focus, $field, $value, $view){
	$focusid = $focus->id;
	//Each $field will have 1,2,3,4,5 as the last element
	//So get the value and ask for that sequence id
	$focusid = $focus->id;	
	$queryField = "Select $field from pm_process_task_call_defs where task_id = '$focusid'";
	$resultQueryField = $focus->db->query($queryField, true);
	$rowFieldList = $focus->db->fetchByAssoc($resultQueryField);
	$fieldValue = $rowFieldList[$field];
    $fields = "<input type=text name=$field value='$fieldValue' size=50>";
	return $fields;
}

//******************************************************************************
//Function to get the task details in the edit view
function getCallEditViewFieldDescription($focus, $field, $value, $view){
	$focusid = $focus->id;
	//Each $field will have 1,2,3,4,5 as the last element
	//So get the value and ask for that sequence id
	$focusid = $focus->id;	
	$queryField = "Select $field from pm_process_task_call_defs where task_id = '$focusid'";
	$resultQueryField = $focus->db->query($queryField, true);
	$rowFieldList = $focus->db->fetchByAssoc($resultQueryField);
	$fieldValue = $rowFieldList[$field];
    $fields = "<textarea  name=$field value='$fieldValue' rows='6' cols='50'>$fieldValue</textarea>";
	return $fields;
}

//******************************************************************************
//Function to get the task details in the edit view
function getTaskEditViewFieldDescription($focus, $field, $value, $view){
	$focusid = $focus->id;
	//Each $field will have 1,2,3,4,5 as the last element
	//So get the value and ask for that sequence id
	$focusid = $focus->id;	
	$queryField = "Select $field from pm_process_task_task_defs where task_id = '$focusid'";
	$resultQueryField = $focus->db->query($queryField, true);
	$rowFieldList = $focus->db->fetchByAssoc($resultQueryField);
	$fieldValue = $rowFieldList[$field];
    $fields = "<textarea  name=$field value='$fieldValue' rows='6' cols='50'>$fieldValue</textarea>";
	return $fields;
}

//**********************************************************************************
//Function to get the Call Defs Fields - 
function getDetailViewTaskField($focus, $field, $value, $view){
	$focusid = $focus->id;
	if ($field == 'detai_view_task_description') {
		$field = 'task_description';
	}
	$focusid = $focus->id;	
	$queryField = "Select $field from pm_process_task_task_defs where task_id = '$focusid'";
	$resultQueryField = $focus->db->query($queryField, true);
	$rowFieldList = $focus->db->fetchByAssoc($resultQueryField);
	$field = $rowFieldList[$field];
	if ($field != '') {
		$fields = $field; 

	}
	else{
		$fields = '';
	}
	return $fields;
}

//**********************************************************************************
//Function to get the Call Defs Fields - 
function getDetailViewCallField($focus, $field, $value, $view){
	$focusid = $focus->id;
	
     $field = substr($field,12);	
	$focusid = $focus->id;	
	$queryField = "Select $field from pm_process_task_call_defs where task_id = '$focusid'";
	$resultQueryField = $focus->db->query($queryField, true);
	$rowFieldList = $focus->db->fetchByAssoc($resultQueryField);
	$field = $rowFieldList[$field];
	if ($field != '') {
		$fields = $field; 

	}
	else{
		$fields = '';
	}
	return $fields;
}

//*****************************************************************************
//Passed field is going to be task_due_date_delay_minutes, task_due_date_delay_hours - etc
//Get the string position and set the for loop accordingly
function getTaskEditViewDelayFields($focus, $field, $value, $view) { //This is the function that the field will run when it is displayed
	$fields = '	<style=\"display:none;\" visiblitity="hidden"  name="sel1" size="10" multiple="multiple">';	
	$focusid = $focus->id;
	$delay = substr($field,20);
	$fieldQuery = substr($field,5);
	//Are we a task or a call?
	if (substr_count($field,'call') > 0) {
		//Replace due_date with start
		$fieldQuery = str_replace("due_date","start",$fieldQuery);
		$queryField = "Select $fieldQuery from pm_process_task_call_defs where task_id = '$focusid'";
	}
	else{
		$queryField = "Select $fieldQuery from pm_process_task_task_defs where task_id = '$focusid'";
	}
	//Now setup the case
	switch ($delay) {
	case 'minutes':
    	$delay = 60;
    	break;
	case 'hours':
    	$delay = 24;
    	break;
	case 'days':
    	$delay = 31;
    	break;
    case 'months':
    	$delay = 12;
    	break;
	case 'years':
    	$delay = 10;
    	break;    	
	}
	$resultQueryField = $focus->db->query($queryField, true);
	$rowFieldList = $focus->db->fetchByAssoc($resultQueryField);
	$field = $rowFieldList[$fieldQuery];
		if ($field != '') {
		$fields .= '<option value="'.$field .'">'.$field .'</option>';
	}
	//Now build the rest of the option list with the remaing values
	//For loop used
	for($i = 0; $i < $delay; $i++){
		$fields .= "<option value='$i'>$i</option>";
	}
return $fields;
}

//New Feature to allow send email to opp or case account instead of contact

function getEmailDefsEditViewFieldCheckBox($focus, $field, $value, $view){
	$focusid = $focus->id;
	//Each $field will have 1,2,3,4,5 as the last element
	//So get the value and ask for that sequence id
	$queryField = "Select $field from pm_process_task_email_defs where task_id = '$focusid'";
	$resultQueryField = $focus->db->query($queryField, true);
	$rowFieldList = $focus->db->fetchByAssoc($resultQueryField);
	$field = $rowFieldList[$field];
	if ($field != '') {
		$fields = $field; 

	}
	else{
		$fields = '';
	}
	return $fields;
}

function getEmailDefsDetailViewFieldCheckBox($focus, $field, $value, $view){
	$focusid = $focus->id;
	//Each $field will have 1,2,3,4,5 as the last element
	//So get the value and ask for that sequence id
	$queryField = "Select send_email_to_caseopp_account from pm_process_task_email_defs where task_id = '$focusid'";
	$resultQueryField = $focus->db->query($queryField, true);
	$rowFieldList = $focus->db->fetchByAssoc($resultQueryField);
	$field = $rowFieldList['send_email_to_caseopp_account'];
	if ($field != '') {
		$fields = $field; 

	}
	else{
		$fields = '';
	}
	return $fields;
}

//End New Feature for send email to opp or case account instead of contact
//
?>