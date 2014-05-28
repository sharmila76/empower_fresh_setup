<?php
// created: 2010-03-12 13:55:38
$viewdefs['Cases']['DetailView'] = array (
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
	'default'=>array(
		array (
			array(
				'name' => 'case_number', 
				'label' => 'LBL_CASE_NUMBER'
			),
		),
		array (
			'status',
            //taras remove contact field from detailview
			/*array (
          		'name' => 'contact_c',
          		'label' => 'LBL_CONTACT_C',
				'type' => 'irelate',
			),*/
            //end taras
		),
		array (
			'priority',
            array(
				'name'=>'account_name',
				'type'=>'relateportal',
                               // 'customCode'=>'{$account_name}',
			),
		),
		array (
			'type',
			array (
				'name' => 'created_by_name',
				'group'=>'created_by_name',
				//'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}&nbsp;',
                'customCode' => '{$fields.date_entered.value}',
				'label' => 'LBL_DATE_ENTERED',
			),
		),
		array (
			array (
				'name' => 'name',
				'label' => 'LBL_SUBJECT',
			),
		),
		array (
			'description',
		),
	),
  ),
);
?>
