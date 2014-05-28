<?php
$module_name = 'LCHAT_ChatTranscript';
$searchdefs [$module_name] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'livechat_chat_id' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_LIVECHAT_CHAT_ID',
        'width' => '10%',
        'default' => true,
        'name' => 'livechat_chat_id',
      ),
      'transcript' => 
      array (
        'type' => 'text',
        'studio' => 'visible',
        'label' => 'LBL_TRANSCRIPT',
        'width' => '10%',
        'default' => true,
        'name' => 'transcript',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
    ),
    'advanced_search' => 
    array (
      0 => 'name',
      1 => 
      array (
        'name' => 'assigned_user_id',
        'label' => 'LBL_ASSIGNED_TO',
        'type' => 'enum',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
      ),
    ),
  ),
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
);
?>
