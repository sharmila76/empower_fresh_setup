<?php
$module_name = 'PM_ProcessManagerStageTask';
$viewdefs = array (
$module_name =>
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
        ),
      ),
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
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            '' => '',
            '' => '',
          ),
          1 => 
          array (
            'name' => 'start_delay_type',
            'label' => 'LBL_START_DELAY_TYPE',
          ),
        ),

        2=> 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
      ),

      'CUSTOM SCRIPT DETAILS1' => 
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
      'EMAIL DETAILS' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'email_template_name',
            'label' => 'LBL_CHOOSE_EMAIL_TEMPLATE',
          ),
          1 => 
          array (
            'name' => 'detail_view_send_email_to_caseopp_account',
                        'customCode' => '{if $fields.detail_view_send_email_to_caseopp_account.value == "1"}' .
            	 	        '{assign var="DETAIL_VIEW_SEND_EMAIL_TO_CASEOPP_ACCOUNT_CHECK" value="checked"}' .
            	 	        '{else}' .
            	 	        '{assign var="DETAIL_VIEW_SEND_EMAIL_TO_CASEOPP_ACCOUNT_CHECK" value=""}' .
            	 	        '{/if}' .
            	 	        '<input name="detail_view_send_email_to_caseopp_account"  type="checkbox" DISABLED class="checkbox" value="1" {$DETAIL_VIEW_SEND_EMAIL_TO_CASEOPP_ACCOUNT_CHECK}>',
                    'label' => 'LBL_SEND_EMAIL_TO_CASEOPP_ACCOUNT',
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
            'name' => 'detail_view_task_subject',
            'label' => 'LBL_TASK_SUBJECT',
          ),
         1 => 
          array (
            'name' => 'detail_view_task_priority',
            'label' => 'LBL_TASK_PRIORITY',
          ),  
        ), 
         1 => 
        array (
          0 => 
          array (
            'name' => 'detail_view_due_date_delay_minutes',
            'label' => 'LBL_DUE_DATE_DELAY_MINUTES',
          ),
         1 => 
          array (
            'name' => 'detail_view_due_date_delay_hours',
            'label' => 'LBL_DUE_DATE_DELAY_HOURS',
          ),  
        ), 
        2 => 
        array (
          0 => 
          array (
            'name' => 'detail_view_due_date_delay_days',
            'label' => 'LBL_DUE_DATE_DELAY_DAYS',
          ),
         1 => 
          array (
            'name' => 'detail_view_due_date_delay_months',
            'label' => 'LBL_DUE_DATE_DELAY_MONTHS',
          ),  
        ), 
        3 => 
        array (
          0 => 
          array (
            'name' => 'detail_view_due_date_delay_years',
            'label' => 'LBL_DUE_DATE_DELAY_YEARS',
          ),
         1 => 
          array (
            '' => '',
            '' => '',
          ),  
        ), 
       4 => 
        array (
          0 => 
          array (
            'name' => 'detai_view_task_description',
            'label' => 'LBL_TASK_DESCRIPTION',
          ),
         1 => 
          array (
            '' => '',
            '' => '',
          ),  
        ),                                   
      ),
       'CALL DETAILS' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'detail_view_call_call_subject',
            'label' => 'LBL_CALL_SUBJECT',
          ),
         1 => 
          array (
            'name' => 'detail_view_call_reminder_time',
            'label' => 'LBL_REMINDER_TIME',
          ),  
        ), 
         1 => 
        array (
          0 => 
          array (
            'name' => 'detail_view_call_start_delay_minutes',
            'label' => 'LBL_START_DATE_DELAY_MINUTES',
          ),
         1 => 
          array (
            'name' => 'detail_view_call_start_delay_hours',
            'label' => 'LBL_START_DATE_DELAY_HOURS',
          ),  
        ), 
        2 => 
        array (
          0 => 
          array (
            'name' => 'detail_view_call_start_delay_days',
            'label' => 'LBL_START_DATE_DELAY_DAYS',
          ),
         1 => 
          array (
            'name' => 'detail_view_call_start_delay_months',
            'label' => 'LBL_START_DATE_DELAY_MONTHS',
          ),  
        ), 
        3 => 
        array (
          0 => 
          array (
            'name' => 'detail_view_call_start_delay_years',
            'label' => 'LBL_START_DATE_DELAY_YEARS',
          ),
         1 => 
          array (
            '' => '',
            '' => '',
          ),  
        ),
       4 => 
        array (
          0 => 
          array (
            'name' => 'detail_view_call_description',
            'label' => 'LBL_CALL_DESCRIPTION',
          ),
         1 => 
          array (
            '' => '',
            '' => '',
          ),  
        ),                                  
      ),                  
    ),
  ),
)
);
?>
