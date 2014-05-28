<?php
$module_name = 'PM_ProcessManagerStageTask';
$viewdefs = array (
$module_name =>
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
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
            'name' => 'task_type',
            'label' => 'LBL_TASK_TYPE',
            'displayParams'=>array('required'=>true), 
          ),
        ),
        1 => 
        array (
          0 =>array (
            'name' => '',
            'label' => '',
          ),
          1 => 
          array (
            'name' => 'start_delay_type',
            'label' => 'LBL_START_DELAY_TYPE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),
     'CUSTOM SCRIPT FIRST' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'custom_script',
            'label' => 'LBL_CUSTOM_SCRIPT',
          ),
        ),
      ),
     'TASK EMAIL DETAILS' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'email_templates',
            'label' => 'LBL_CHOOSE_EMAIL_TEMPLATE',
          ),
          1 => 
      		array(
      		'name' => 'send_email_to_caseopp_account',
            'customCode' => '{if $fields.send_email_to_caseopp_account.value == "1"}' .
            	 	        '{assign var="SEND_EMAIL_TO_CASE_OPP_ACCOUNT" value="checked"}' .
            	 	        '{else}' .
            	 	        '{assign var="SEND_EMAIL_TO_CASE_OPP_ACCOUNT" value=""}' .
            	 	        '{/if}' .
            	 	        '<input name="send_email_to_caseopp_account" id="send_email_to_caseopp_account"  type="checkbox" class="checkbox" value="1" {$SEND_EMAIL_TO_CASE_OPP_ACCOUNT}>',
                    'label' => 'LBL_SEND_EMAIL_TO_CASEOPP_ACCOUNT',
          ),           
        ),      
      ), 
      'TASK DETAILS' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'task_subject',
            'label' => 'LBL_TASK_SUBJECT',
          ),
          1 => 
          array (
            'name' => 'task_priority',
            'label' => 'LBL_TASK_PRIORITY',
          ), 
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'task_due_date_delay_minutes',
            'label' => 'LBL_DUE_DATE_DELAY_MINUTES',
          ),
          1 => 
          array (
            'name' => 'task_due_date_delay_hours',
            'label' => 'LBL_DUE_DATE_DELAY_HOURS',
          ), 
        ), 
        2 => 
        array (
          0 => 
          array (
            'name' => 'task_due_date_delay_days',
            'label' => 'LBL_DUE_DATE_DELAY_DAYS',
          ),
          1 => 
          array (
            'name' => 'task_due_date_delay_months',
            'label' => 'LBL_DUE_DATE_DELAY_MONTHS',
          ), 
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'task_due_date_delay_years',
            'label' => 'LBL_DUE_DATE_DELAY_YEARS',
          ),
          1 => 
          array (
            'name' => '',
            'label' => '',
          ), 
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'task_description',
            'label' => 'LBL_TASK_DESCRIPTION',
          ),   

        ),                                
      ),
      'CALL DETAILS' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'call_subject',
            'label' => 'LBL_CALL_SUBJECT',
          ),
          1 => 
      		array(
      		'name' => 'reminder_time',
            'customCode' => '{if $fields.reminder_checked.value == "1"}' .
            	 	        '{assign var="REMINDER_TIME_DISPLAY" value="inline"}' .
            	 	        '{assign var="REMINDER_CHECKED" value="checked"}' .
            	 	        '{else}' .
            	 	        '{assign var="REMINDER_TIME_DISPLAY" value="none"}' .
            	 	        '{assign var="REMINDER_CHECKED" value=""}' .
            	 	        '{/if}' .
            	 	        '<input name="reminder_checked" type="hidden" value="0"><input name="reminder_checked" onclick=\'toggleDisplay("should_remind_list");\' type="checkbox" class="checkbox" value="1" {$REMINDER_CHECKED}><div id="should_remind_list" style="display:{$REMINDER_TIME_DISPLAY}">{$fields.reminder_time.value}</div>',
                    'label' => 'LBL_REMINDER',
          ),
       ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'call_due_date_delay_minutes',
            'label' => 'LBL_START_DATE_DELAY_MINUTES',
          ),
          1 => 
          array (
            'name' => 'call_due_date_delay_hours',
            'label' => 'LBL_START_DATE_DELAY_HOURS',
          ), 
        ), 
        2 => 
        array (
          0 => 
          array (
            'name' => 'call_due_date_delay_days',
            'label' => 'LBL_START_DATE_DELAY_DAYS',
          ),
          1 => 
          array (
            'name' => 'call_due_date_delay_months',
            'label' => 'LBL_START_DATE_DELAY_MONTHS',
          ), 
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'call_due_date_delay_years',
            'label' => 'LBL_START_DATE_DELAY_YEARS',
          ),
          1 => 
          array (
            'name' => '',
            'label' => '',
          ), 
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'call_description',
            'label' => 'LBL_CALL_DESCRIPTION',
          ),   

        ),                                
      ),                       
    ),
  ),
)
);
?>
