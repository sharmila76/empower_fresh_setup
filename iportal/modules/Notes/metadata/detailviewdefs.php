<?php

$viewdefs['Notes']['DetailView'] = array(
	'templateMeta' => array('form' => array('hidden' => array(
				'<input type="hidden" value="{$fields.contact_id.value}" id="contact_id" name="contact_id">',
				'<input id="parent_type" name="parent_type" type="hidden" value="{$fields.parent_type.value}"><input id="parent_id" name="parent_id" type="hidden" value="{$fields.parent_id.value}">',
			),
		),
		'maxColumns' => '2',
		'widths' => array(
			array('label' => '10', 'field' => '30'),
			array('label' => '10', 'field' => '30')
		),
	),
	'panels' => array(
		array(
			array('name' => 'name', 'label' => 'LBL_SUBJECT'),
			array(
				'name' => 'parent_name',
				'customCode' => '<a href="iportal.php?module={$fields.parent_type.value}&action=DetailView&record={$fields.parent_id.value}">{$fields.parent_name.value}</a>'
			),
		),
		array(
			array('name' => 'contact_phone', 'type' => 'phone', 'label' => 'LBL_PHONE'),
			array('name' => 'date_modified', 'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}'),
		),
		array(
			array('name' => 'contact_email', 'label' => 'LBL_EMAIL_ADDRESS'),
			array('name' => 'date_entered', 'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}'),
		),
		array(
		),
		array(
			array(
				'name' => 'filename',
				'displayParams' => array('id' => 'id', 'link' => 'filename'),
				'customCode' => '<a class="tabDetailViewDFLink" href="iportal.php?entryPoint=download&type=Notes&id={$fields.id.value}">{$fields.filename.value}</a>',
			),
			array('name' => 'portal_flag',
				'displayParams' => array('required' => false),
				'customLabel' => '{if ($PORTAL_ENABLED)}{sugar_translate label="LBL_PORTAL_FLAG" module="Notes"}{/if}',
				'customCode' => ' {if ($PORTAL_ENABLED)}
												  {if $fields.portal_flag.value == "1"}
												  {assign var="checked" value="CHECKED"}
												  {else}
												  {assign var="checked" value=""}
												  {/if}
												  <input type="hidden" name="{$fields.portal_flag.name}" value="0"> 
												  <input type="checkbox" name="{$fields.portal_flag.name}" value="1" tabindex="1" disabled="true" {$checked}>
						        		          {/if}',
			),
		),
		array(
			array('name' => 'description', 'label' => 'LBL_NOTE_STATUS'),
		),
	)
);
?>
