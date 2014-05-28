<?php

$viewdefs['Cases']['EditView'] = array(
	'templateMeta' =>
	array(
		'maxColumns' => '2',
		'widths' =>
		array(
			0 =>
			array(
				'label' => '10',
				'field' => '30',
			),
			1 =>
			array(
				'label' => '10',
				'field' => '30',
			),
		),
		'form' => array(
			'hidden' => array(
				'<input type="hidden" name="assigned_user_id" id="assigned_user_id" value="{$fields.assigned_user_id.value}" />',
				'<input type="hidden" name="team_id" id="team_id" value="{$fields.team_id.value}" />',
				'<input type="hidden" name="status" id="status" value="{$fields.status.value}" />',
				'<input type="hidden" name="contact_id_c" value="{$fields.contact_id_c.value}"/>',
				'<input type="hidden" name="account_id" value="{$fields.account_id.value}"/>',
			),
		),
		//taras ADD NAME FIELD TO VALIDATE
		'javascript' => '<script type="text/javascript">addToValidate("IportalEditView", "name", "name", true, SUGAR.language.languages.Cases["LBL_NAME"]);</script>',
	//END taras
	),
	'panels' =>
	array(
		'default' =>
		array(
			array(
				0 =>
				array(
					'name' => 'name',
					'displayParams' =>
					array(
						'size' => 75,
						'required' => true,
					),
					'label' => 'LBL_SUBJECT',
				),
			),
			array(
				0 =>
				array(
					'name' => 'priority',
					'label' => 'LBL_PRIORITY',
				),
				1 => '',
			),
			array(
				0 =>
				array(
					'name' => 'type',
					'label' => 'LBL_TYPE',
				),
			),
			array(
				array(
					'name' => 'description',
				),
			),
			array(
				1 => '',
			),
		),
	),
);
?>
