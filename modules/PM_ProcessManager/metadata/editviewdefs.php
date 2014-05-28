<?php
$module_name = 'PM_ProcessManager';
$viewdefs = array (
$module_name =>
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '3',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '20',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '20',
          'field' => '30',
        ),
        2 => 
        array (
          'label' => '20',
          'field' => '30',
        ),
      ),
'javascript' => '<script type="text/javascript" src="include/javascript/popup_parent_helper.js?s={$SUGAR_VERSION}&c={$JS_CUSTOM_VERSION}"></script>
<script type="text/javascript">
document.getElementById("LBL_PANEL_OBJECT_FIELDS").style.display="none";
function type_change() {ldelim}
var objectType = document.forms[\'EditView\'].process_object.options[document.forms[\'EditView\'].process_object.selectedIndex].text;
var finalobjectType = objectType + "_fields";
var elementid;
elementid = finalobjectType;
var lstToCopyFromArray = document.getElementsByName(elementid); 
var lstToCopyFrom = lstToCopyFromArray[0];
var lstToCopyToArray = document.getElementsByName("process_filter_field1"); 
var lstToCopyTo = lstToCopyToArray[0];
var myTextField = document.getElementById(finalobjectType);
//Get the current values if this is an edit
var currentFilterFilter1 = document.forms[\'EditView\'].process_filter_field1.options[document.forms[\'EditView\'].process_filter_field1.selectedIndex].text;

//First clear out the select list for all the lists
	 	for (x = lstToCopyTo.length; x >= 0; x--)
			{ldelim}
				lstToCopyTo[x] = null;
	 		{rdelim}	
//Now fill list 1 - First item is to add Please Specify
lstToCopyTo.options.add(new Option(\'Please Specify\',\'Please Specify\')); 	
for (i=0;i<lstToCopyFrom.options.length;i++)
		{ldelim}
		var listValue = lstToCopyFrom.options[i].text; 
		 lstToCopyTo.options.add(new Option(listValue,listValue));
 	{rdelim}
{rdelim} 
</script>',
    ),
    'panels' => 
    array (
      'DEFAULT' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
          ),
          1 => 
          array (
            'name' => 'status',
            'label' => 'LBL_STATUS',
          ),
          2 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'process_object',
            'label' => 'LBL_PROCESS_OBJECT',       
           'displayParams' => 
            array (
              'required' => true,
              'javascript' => 'onchange="type_change();"',
            ),
          ),
          1 => 
          array (
            'name' => 'start_event',
            'label' => 'LBL_START_EVENT',
          ),
          2 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => NULL,
          2 => NULL,
        ),
      ),
      'PROCESS FILTER FIELDS' => 
      array (
       0 => 
        array (
          0 => 
          array (
            'name' => 'process_filter_field1',
            'label' => 'LBL_PROCESS_OBJECT_FILTER_FIELD1',
          ),
          1 => 
          array (
            'name' => 'filter_list1',
            'label' => 'LBL_CHOOSE_FILTER1',
          ),
          2 => 
          array (
            'name' => 'process_object_field1_value',
            'label' => 'LBL_PROCESS_OBJECT_FIELD1_VALUE',
          ),
        ), 
       ),                                           
     'LBL_PANEL_OBJECT_FIELDS' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'contacts_fields',
            'label' => 'LBL_CONTACT_FIELDS',
            'displayParams' => 
            array (
              'visibility' => 'hidden',
             ),
       		),
          1 => 
          array (
            'name' => 'accounts_fields',
            'label' => 'LBL_ACCOUNT_FIELDS',
          ),
          2 => 
          array (
            'name' => 'leads_fields',
            'label' => 'LBL_LEAD_FIELDS',
          ),
        ),
       
        1 => 
        array (
          0 => 
          array (
            'name' => 'cases_fields',
            'label' => 'LBL_CASE_FIELDS',
          ),
          1 => 
          array (
            'name' => 'opportunities_fields',
            'label' => 'LBL_OPPORTUNITY_FIELDS',
          ),
          2 => 
          array (
            'name' => 'project_fields',
            'label' => 'LBL_PROJECT_FIELDS',
          ),
        ),
       2 => 
        array (
          0 => 
          array (
            'name' => 'tasks_fields',
            'label' => 'LBL_TASKS_FIELDS',
          ),
          1 => 
          array (
            'name' => '',
            'label' => '',
          ),
          2 => 
          array (
            'name' => '',
            'label' => '',
          ),
        ),
      ),

     
    ),
  ),
)
);
?>
