<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr>
{{foreach name=colIteration from=$formData key=col item=colData}}

	{{if !empty($colData.field.name)}}
	
		{if $fields.{{$colData.field.name}}.acl > 0}
	{{/if}}

	{counter assign=index}
	{math equation="left % right"
   		  left=$index
          right=$templateMeta.maxColumns
          assign=modVal
    }
	{if ($index % $templateMeta.maxColumns == 1 && $index != 1)}
		</tr><tr>
	{/if}
	
	<td scope="row" nowrap="nowrap" width='{{$templateMeta.widths.label}}%' >
	{{if isset($colData.field.label)}}	
		{sugar_translate label='{{$colData.field.label}}' module='{{$module}}'}
    {{elseif isset($fields[$colData.field.name])}}
		{sugar_translate label='{{$fields[$colData.field.name].vname}}' module='{{$module}}'}
	{{/if}}
	</td>
	<td  nowrap="nowrap" width='{{$templateMeta.widths.field}}%'>
	{{if $fields[$colData.field.name]}}
		{{sugar_field parentFieldArray='fields' vardef=$fields[$colData.field.name] displayType='searchView' displayParams=$colData.field.displayParams typeOverride=$colData.field.type formName=$form_name}}
   	{{/if}}

		{{if !empty($colData.field.name)}}
			{/if}
		{{/if}}

   	</td>
{{/foreach}}
	</tr>
<tr>
	<td colspan='5'>
    <input tabindex='2' title='{$APP.LBL_SEARCH_BUTTON_TITLE}' accessKey='{$APP.LBL_SEARCH_BUTTON_KEY}' onclick='SUGAR.savedViews.setChooser()' class='button' type='submit' name='button' value='{$APP.LBL_SEARCH_BUTTON_LABEL}' id='search_form_submit'/>&nbsp;
	    <input tabindex='2' title='{$APP.LBL_CLEAR_BUTTON_TITLE}' accessKey='{$APP.LBL_CLEAR_BUTTON_KEY}' onclick='SUGAR.searchForm.clear_form(this.form); return false;' class='button' type='button' name='clear' id='search_form_clear' value='{$APP.LBL_CLEAR_BUTTON_LABEL}'/>
    {if $HAS_ADVANCED_SEARCH}
	    &nbsp;&nbsp;<a onclick="SUGAR.searchForm.searchFormSelect('{$module}|advanced_search','{$module}|basic_search')" href="#">{$APP.LNK_ADVANCED_SEARCH}</a>
	    {/if}</td>
	</tr>
</table>
