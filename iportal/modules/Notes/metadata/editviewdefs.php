<?php

$viewdefs['Notes']['EditView'] = array(
	'templateMeta' => array('form' => array('enctype' => 'multipart/form-data',
			'headerTpl' => 'iportal/modules/Notes/tpls/EditViewHeader.tpl',
			'hidden' => array(
				'<input type="hidden" value="{$fields.contact_id.value}" id="contact_id" name="contact_id">',
				'<input id="parent_type" name="parent_type" type="hidden" value="{$smarty.request.parent_type}"><input id="parent_id" name="parent_id" type="hidden" value="{$smarty.request.parent_id}">',
			),
		),
		'buttons' =>
		array(
			0 => array(
				'customCode' =>
				'<input title="Save [Alt+S]" accessKey="S" onclick="this.form.action.value=\'Save\'; return check_custom_data();" type="submit" name="button" value="' . $GLOBALS['app_strings']['LBL_SAVE_BUTTON_LABEL'] . '">',
			),
			1 => array(
				'customCode' =>
				'<input title="Cancel [Alt+X]" accessKey="X" onclick="this.form.action.value=\'DetailView\'; this.form.module.value=\'' . $module_name . '\'; this.form.record.value=\'{$id}\';" type="submit" name="button" value="' . $GLOBALS['app_strings']['LBL_CANCEL_BUTTON_LABEL'] . '">'
			),
		),
		'maxColumns' => '2',
		'widths' => array(
			array('label' => '10', 'field' => '30'),
			array('label' => '10', 'field' => '30')
		),
		'javascript' => '<script type="text/javascript" src="include/javascript/dashlets.js?s={$SUGAR_VERSION}&c={$JS_CUSTOM_VERSION}"></script>
<script>
function deleteAttachmentCallBack(text) 
	{literal} { {/literal} 
	if(text == \'true\') {literal} { {/literal} 
		document.getElementById(\'new_attachment\').style.display = \'\';
		ajaxStatus.hideStatus();
		document.getElementById(\'old_attachment\').innerHTML = \'\'; 
	{literal} } {/literal} else {literal} { {/literal} 
		document.getElementById(\'new_attachment\').style.display = \'none\';
		ajaxStatus.flashStatus(SUGAR.language.get(\'Notes\', \'ERR_REMOVING_ATTACHMENT\'), 2000); 
	{literal} } {/literal}  
{literal} } {/literal} 
</script>
<script>toggle_portal_flag(); function toggle_portal_flag()  {literal} { {/literal} {$TOGGLE_JS} {literal} } {/literal} </script>',
	),
	'panels' => array(
		'default' => array(
			array(
				array('name' => 'name', 'label' => 'LBL_SUBJECT', 'displayParams' => array('size' => 100, 'required' => true)),
			),
			array(
				array(
					'name' => 'filename',
					'customCode' => '<span id=\'new_attachment\' style=\'display:{if !empty($fields.filename.value)}none{/if}\'>
        									 <input name="uploadfile" tabindex="3" type="file" size="60"/>
        									 </span>
											 <span id=\'old_attachment\' style=\'display:{if empty($fields.filename.value)}none{/if}\'>
		 									 <input type=\'hidden\' name=\'deleteAttachment\' value=\'0\'>
		 									 {$fields.filename.value}<input type=\'hidden\' name=\'old_filename\' value=\'{$fields.filename.value}\'/><input type=\'hidden\' name=\'old_id\' value=\'{$fields.id.value}\'/>
											 <input type=\'button\' class=\'button\' value=\'{$APP.LBL_REMOVE}\' onclick=\'ajaxStatus.showStatus(SUGAR.language.get("Notes", "LBL_REMOVING_ATTACHMENT"));this.form.deleteAttachment.value=1;this.form.action.value="EditView";SUGAR.dashlets.postForm(this.form, deleteAttachmentCallBack);this.form.deleteAttachment.value=0;this.form.action.value="";\' >       
											 </span>',
				),
			),
			array(
				array('name' => 'description', 'label' => 'LBL_NOTE_STATUS', 'displayParams' => array('rows' => 30, 'cols' => 90)),
			),
		),
	)
);
?>
