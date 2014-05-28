<?php
$module_name = 'LCHAT_ChatTranscript';
$viewdefs [$module_name] = 
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
      'default' => 
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
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO_NAME',
          ),
        ),
        1 => 
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
        2 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'livechat_chat_id',
            'label' => 'LBL_LIVECHAT_CHAT_ID',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'operator',
            'label' => 'LBL_OPERATOR',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'start_time',
            'label' => 'LBL_START_TIME',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'end_time',
            'label' => 'LBL_END_TIME',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'duration',
            'label' => 'LBL_DURATION',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'transcript',
            'studio' => 'visible',
            'label' => 'LBL_TRANSCRIPT',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'lchat_chattranscript_accounts_name',
            'label' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'lchat_chattranscript_leads_name',
            'label' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'lchat_chattranscript_contacts_name',
          ),
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'lchat_chattranscript_opportunities_name',
          ),
        ),
      ),
    ),
  ),
);
?>
