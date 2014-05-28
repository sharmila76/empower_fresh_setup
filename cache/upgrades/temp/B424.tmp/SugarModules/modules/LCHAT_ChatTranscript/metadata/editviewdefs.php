<?php
$module_name = 'LCHAT_ChatTranscript';
$viewdefs [$module_name] = 
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
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'livechat_chat_id',
            'label' => 'LBL_LIVECHAT_CHAT_ID',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'operator',
            'label' => 'LBL_OPERATOR',
          ),
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'start_time',
            'label' => 'LBL_START_TIME',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'end_time',
            'label' => 'LBL_END_TIME',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'duration',
            'label' => 'LBL_DURATION',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'transcript',
            'studio' => 'visible',
            'label' => 'LBL_TRANSCRIPT',
          ),
          1 => '',
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'lchat_chattranscript_accounts_name',
            'label' => 'LBL_LCHAT_CHATTRANSCRIPT_ACCOUNTS_FROM_ACCOUNTS_TITLE',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'lchat_chattranscript_leads_name',
            'label' => 'LBL_LCHAT_CHATTRANSCRIPT_LEADS_FROM_LEADS_TITLE',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'lchat_chattranscript_contacts_name',
          ),
        ),
        11 => 
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
