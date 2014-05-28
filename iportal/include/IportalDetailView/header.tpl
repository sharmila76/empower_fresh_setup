{{* Add the preForm code if it is defined (used for vcards) *}}
{{if $preForm}}
	{{$preForm}}
{{/if}}
<table cellpadding="1" cellspacing="0" border="0" width="100%">
<tr>
<td class="buttons" align="left" NOWRAP>
<form action="iportal.php" method="post" name="DetailView" id="form">
<input type="hidden" name="module" value="{$module}">
<input type="hidden" name="record" value="{$fields.id.value}">
<input type="hidden" name="return_action">
<input type="hidden" name="return_module">
<input type="hidden" name="return_id">
<input type="hidden" name="module_tab"> 
<input type="hidden" name="isDuplicate" value="false">
<input type="hidden" name="offset" value="{$offset}">
<input type="hidden" name="action" value="EditView">
{{if isset($form.hidden)}}
{{foreach from=$form.hidden item=field}}
{{$field}}   
{{/foreach}}
{{/if}}

{{if !isset($form.buttons)}}
<input title="{$APP.LBL_EDIT_BUTTON_TITLE}" accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" class="button" onclick="this.form.return_module.value='{$module}'; this.form.return_action.value='DetailView'; this.form.return_id.value='{$id}'; this.form.action.value='EditView'" type="submit" name="Edit" id='edit_button' value="  {$APP.LBL_EDIT_BUTTON_LABEL}  "> 
{*<input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" class="button" onclick="this.form.return_module.value='{$module}'; this.form.return_action.value='index'; this.form.isDuplicate.value=true; this.form.action.value='EditView'" type="submit" name="Duplicate" value=" {$APP.LBL_DUPLICATE_BUTTON_LABEL} " id='duplicate_button'> *}
<input title="{$APP.LBL_DELETE_BUTTON_TITLE}" accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" class="button" onclick="this.form.return_module.value='{$module}'; this.form.return_action.value='ListView'; this.form.action.value='Delete'; return confirm('{$APP.NTC_DELETE_CONFIRMATION}')" type="submit" name="Delete" value=" {$APP.LBL_DELETE_BUTTON_LABEL} " >
{{else}}
	{{counter assign="num_buttons" start=0 print=false}}
	{{foreach from=$form.buttons key=val item=button}}
	  {{if !is_array($button) && in_array($button, $built_in_buttons)}}
	     {{counter print=false}}
	     {{sugar_button module="$module" id="$button" view="EditView"}}
	  {{/if}}
	{{/foreach}}
	{{if isset($closeFormBeforeCustomButtons)}}
	</form>
	</td>
	{{/if}}
	{{if count($form.buttons) > $num_buttons}}
			{{foreach from=$form.buttons key=val item=button}}
			  {{if is_array($button) && $button.customCode}}
              <td class="buttons" align="left" NOWRAP>
			  {{sugar_button module="$module" id="$button" view="EditView"}}
              </td>
			  {{/if}}
			{{/foreach}}
	{{/if}}
{{/if}}
{{if !isset($closeFormBeforeCustomButtons)}}
</form>
</td>
{{/if}}
{{if empty($form.hideAudit) || !$form.hideAudit}}
<td class="buttons" align="left" NOWRAP>
{*{{sugar_button module="$module" id="Audit" view="EditView"}}*}
</td>
{{/if}}
<td align="right" width="100%">{$ADMIN_EDIT}</td>
{{* Add $form.links if they are defined *}}
{{if !empty($form) && isset($form.links)}}
	<td align="right" width="10%">&nbsp;</td>
	<td align="right" width="100%" NOWRAP>
	{{foreach from=$form.links item=link}}
	    {{$link}}&nbsp;
	{{/foreach}}
	</td>
{{/if}}
</tr>
</table>
