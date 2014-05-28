<?php
$module_name = 'PM_ProcessManager';
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
          array('customCode'=>'<input title="{$MOD.LBL_DELETE_PROCESS_FILTER_ENTRIES}" accessKey="{$APP.LBL_MAILMERGE_KEY}" class="button" onclick="this.form.return_module.value=\'PM_ProcessManager\'; this.form.return_action.value=\'DetailView\';this.form.action.value=\'DeleteProcessFilterEntries\'" type="submit" name="button" value="{$MOD.LBL_DELETE_PROCESS_FILTER_ENTRIES}">'),
        ),
      ),
      'maxColumns' => '3',
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
      '' => 
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
         2 => 
          array (
            '' => '',
            '' => '',
          ),  
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'process_object',
            'label' => 'LBL_PROCESS_OBJECT',
          ),
          1 => 
          array (
            'name' => 'start_event',
            'label' => 'LBL_START_EVENT',
          ),
         2 => 
          array (
            '' => '',
            '' => '',
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
         2 => 
          array (
            '' => '',
            '' => '',
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

      'Object Filter Field Values' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'detail_view_field1',
            'label' => 'LBL_PROCESS_OBJECT_FILTER_FIELD1',
          ),
          1 => 
          array (
            'name' => 'detail_view_operator1',
            'label' => 'LBL_CHOOSE_FILTER1',
          ),
          2 => 
          array (
            'name' => 'detail_view_value1',
            'label' => 'LBL_PROCESS_OBJECT_FIELD1_VALUE',
          ),
        ),                                
      ),
           
      
    ),
  ),
)
);
?>
