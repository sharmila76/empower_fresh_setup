{{include file=$headerTpl}}
{sugar_include include=$includes}

<table width="100%" cellspacing="0" cellpadding="0" class='detail view' id='tabFormPagination'>
{{if $panelCount == 0}}
    {{* Render tag for VCR control if SHOW_VCR_CONTROL is true *}}
	{{if $SHOW_VCR_CONTROL}}
		{$PAGINATION}
	{{/if}}
{{/if}}
</table>


{{* Loop through all top level panels first *}}
{{counter name="panelCount" start=-1 print=false assign="panelCount"}}

{{foreach name=section from=$sectionPanels key=label item=panel}}
{{counter name="panelCount" print=false}}

{{* Print out the table data *}}
<div id="{{$label}}">
{counter name="panelFieldCount" start=0 print=false assign="panelFieldCount"}
{{* Check to see if the panel variable is an array, if not, we'll attempt an include with type param php *}}
{{* See function.sugar_include.php *}}
{{if !is_array($panel)}}
    {sugar_include type='php' file='{{$panel}}'}
{{else}}

<table width="100%" border="0" cellspacing="1" cellpadding="0"  class="{$def.templateMeta.panelClass|default:'edit view'}">
{{* Only show header if it is not default or an int value *}}
{{if !empty($label) && !is_int($label) && $label != 'DEFAULT'}}
<th align="left" colspan="8">
<h4>{sugar_translate label='{{$label}}' module='{{$module}}'}</h4>
</th>
{{/if}}

{{assign var='rowCount' value=0}}
{{foreach name=rowIteration from=$panel key=row item=rowData}}
<tr>

	{{assign var='columnsInRow' value=$rowData|@count}}
	{{assign var='columnsUsed' value=0}}

    {{* Loop through each column and display *}}
    {{counter name="colCount" start=0 print=false assign="colCount"}}

	{{foreach name=colIteration from=$rowData key=col item=colData}}

	{{counter name="colCount" print=false}}
	{{math assign="tabIndex" equation="$panelCount * $maxColumns + $colCount"}}
	{{if count($rowData) == $colCount}}
		{{assign var="colCount" value=0}}
	{{/if}}


	{{if !empty($colData.field.name)}}
		{if $fields.{{$colData.field.name}}.acl > 1 || ($showDetailData && $fields.{{$colData.field.name}}.acl > 0)}
	{{/if}}


		{{if empty($def.templateMeta.labelsOnTop) && empty($colData.field.hideLabel)}}
		<td valign="top" id='{{$colData.field.name}}_label' width='{{$def.templateMeta.widths[$smarty.foreach.colIteration.index].label}}%' scope="row">
			{{if isset($colData.field.customLabel)}}
			   {{$colData.field.customLabel}}
			{{elseif isset($colData.field.label)}}
			   {capture name="label" assign="label}
			   {sugar_translate label='{{$colData.field.label}}' module='{{$module}}'}
			   {/capture}
			   {$label|strip_semicolon}:
			{{elseif isset($fields[$colData.field.name])}}
			   {capture name="label" assign="label}
			   {sugar_translate label='{{$fields[$colData.field.name].vname}}' module='{{$module}}'}
			   {/capture}
			   {$label|strip_semicolon}:
			{{/if}}
			{{* Show the required symbol if field is required, but override not set.  Or show if override is set *}}
			{{if ($fields[$colData.field.name].required && (!isset($colData.field.displayParams.required) || $colData.field.displayParams.required)) || 
			     (isset($colData.field.displayParams.required) && $colData.field.displayParams.required)}}
			    <span class="required">{{$APP.LBL_REQUIRED_SYMBOL}}</span>
			{{/if}}
		</td>
		{{/if}}

		<td valign="top" width='{{$def.templateMeta.widths[$smarty.foreach.colIteration.index].field}}%' {{if $colData.colspan}}colspan='{{$colData.colspan}}'{{/if}}>
			{{if !empty($def.templateMeta.labelsOnTop)}}
				{{if isset($colData.field.label)}}
				    {{if !empty($colData.field.label)}}
			   		    {sugar_translate label='{{$colData.field.label}}' module='{{$module}}'}:
				    {{/if}}
				{{elseif isset($fields[$colData.field.name])}}
			  		{sugar_translate label='{{$fields[$colData.field.name].vname}}' module='{{$module}}'}:
				{{/if}}
				
				{{* Show the required symbol if field is required, but override not set.  Or show if override is set *}}
				{{if ($fields[$colData.field.name].required && (!isset($colData.field.displayParams.required) || $colData.field.displayParams.required)) || 
				     (isset($colData.field.displayParams.required) && $colData.field.displayParams.required)}}
				    <span class="required">{{$APP.LBL_REQUIRED_SYMBOL}}</span>
				{{/if}}
				{{if !isset($colData.field.label) || !empty($colData.field.label)}}
				<br>
				{{/if}}
			{{/if}}


		{{if !empty($colData.field.name)}}
			{if $fields.{{$colData.field.name}}.acl > 1}
		{{/if}}

			
			{{if $fields[$colData.field.name] && !empty($colData.field.fields) }}
			    {{foreach from=$colData.field.fields item=subField}}
			        {{if $fields[$subField.name]}}
			        	{counter name="panelFieldCount"}
			            {{sugar_field parentFieldArray='fields' tabindex=$colData.field.tabindex vardef=$fields[$subField.name] displayType='editView' displayParams=$subField.displayParams formName=$form_name}}&nbsp;
			        {{/if}}
			    {{/foreach}}
			{{elseif !empty($colData.field.customCode)}}
				{counter name="panelFieldCount"}
				{{sugar_evalcolumn var=$colData.field.customCode colData=$colData tabindex=$colData.field.tabindex}}
			{{elseif $fields[$colData.field.name]}}
				{counter name="panelFieldCount"}
			    {{$colData.displayParams}}
				{{sugar_field parentFieldArray='fields' tabindex=$colData.field.tabindex vardef=$fields[$colData.field.name] displayType='editView' displayParams=$colData.field.displayParams typeOverride=$colData.field.type formName=$form_name}}
			{{/if}}

		{{if !empty($colData.field.name)}}
		{{if $showDetailData }}
		{else}
			{{if $fields[$colData.field.name] && !empty($colData.field.fields) }}
			    {{foreach from=$colData.field.fields item=subField}}
			        {{if $fields[$subField.name]}}
			        	
			            {{sugar_field parentFieldArray='fields' tabindex=$colData.field.tabindex vardef=$fields[$subField.name] displayType='detailView' displayParams=$subField.displayParams formName=$form_name}}&nbsp;
			        {{/if}}
			    {{/foreach}}
			{{elseif !empty($colData.field.customCode)}}
				<td></td><td></td>
			{{elseif $fields[$colData.field.name]}}
			    {{$colData.displayParams}}
			    {counter name="panelFieldCount"}
				{{sugar_field parentFieldArray='fields' tabindex=$colData.field.tabindex vardef=$fields[$colData.field.name] displayType='detailView' displayParams=$colData.field.displayParams typeOverride=$colData.field.type formName=$form_name}}
			{{/if}}
		</td>
		{{/if}}

		{/if}

		{else}

		  <td></td><td></td>

	{/if}

	{{else}}

		</td>
	{{/if}}


	{{/foreach}}
</tr>
{{/foreach}}
</table>

{{/if}}

</div>
{if $panelFieldCount == 0}

<script>document.getElementById("{{$label}}").style.display='none';</script>
{/if}
{{/foreach}}
{{include file=$footerTpl}}
