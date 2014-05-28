{{if !$nolink}} 
{if !empty({{sugarvar memberName='vardef.id_name' key='value' string='true'}})}<a href="iportal.php?module={{$vardef.module}}&action=DetailView&record={{sugarvar  memberName='vardef.id_name' key='value'}}">{/if}
{{/if}}
{{sugarvar key='value'}}
{{if !$nolink}}
{if !empty({{sugarvar memberName='vardef.id_name' key='value' string='true'}})}</a>{/if}
{{/if}}
{{if !empty($displayParams.enableConnectors)}}
{if !empty({{sugarvar memberName='vardef.id_name' key='value' string='true'}})}
{{sugarvar_connector view='DetailView'}} 
{/if}
{{/if}}
