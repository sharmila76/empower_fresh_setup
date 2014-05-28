<script type='text/javascript' src='{sugar_getjspath file='iportal/include/javascript/popup_helper.js'}'></script>

{if $overlib}
	<script type='text/javascript' src='{sugar_getjspath file='include/javascript/sugar_grp_overlib.js'}'></script>
	<div id='overDiv' style='position:absolute; visibility:hidden; z-index:1000;'></div>
{/if}
{if $prerow}
	{$multiSelectData}
{/if}
<table cellpadding='0' cellspacing='0' width='100%' border='0' class='list view'>
{include file='iportal/include/IportalListView/ListViewPagination.tpl'}
<tr height='20'>
		{if $prerow}
			<th scope='col' nowrap="nowrap" width='5%'>
				<input type='checkbox' class='checkbox' name='massall' value='' onclick='sListView.check_all(document.MassUpdate, "mass[]", this.checked);' />
			</th>
		{/if}
		{counter start=0 name="colCounter" print=false assign="colCounter"}
		{foreach from=$displayColumns key=colHeader item=params}
			<th scope='col' width='{$params.width}%' nowrap="nowrap">
				<div style='white-space: nowrap;'width='100%' align='{$params.align|default:'left'}'>
                {if $params.sortable|default:true}
                    {if $params.url_sort}
                        <a href='{$pageData.urls.orderBy}{$params.orderBy|default:$colHeader|lower}' class='listViewThLinkS1'>
                    {else}
                        {if $params.orderBy|default:$colHeader|lower == $pageData.ordering.orderBy}
                            <a href='javascript:sListView.order_checks("{$pageData.ordering.sortOrder|default:ASCerror}", "{$params.orderBy|default:$colHeader|lower}" , "{$pageData.bean.moduleDir}{"2_"}{$pageData.bean.objectName|upper}{"_ORDER_BY"}")' class='listViewThLinkS1'>
                        {else}
                            <a href='javascript:sListView.order_checks("ASC", "{$params.orderBy|default:$colHeader|lower}" , "{$pageData.bean.moduleDir}{"2_"}{$pageData.bean.objectName|upper}{"_ORDER_BY"}")' class='listViewThLinkS1'>
                        {/if}
                    {/if}
                    {sugar_translate label=$params.label module=$pageData.bean.moduleDir}
					</a>&nbsp;&nbsp;
					{if $params.orderBy|default:$colHeader|lower == $pageData.ordering.orderBy}
						{if $pageData.ordering.sortOrder == 'ASC'}
							{capture assign="imageName"}arrow_down.{$arrowExt}{/capture}
							<img border='0' src='{sugar_getimagepath file=$imageName}' width='{$arrowWidth}' height='{$arrowHeight}' align='absmiddle' alt='{$arrowAlt}'>
						{else}
							{capture assign="imageName"}arrow_up.{$arrowExt}{/capture}
							<img border='0' src='{sugar_getimagepath file=$imageName}' width='{$arrowWidth}' height='{$arrowHeight}' align='absmiddle' alt='{$arrowAlt}'>
						{/if}
					{else}
						{capture assign="imageName"}arrow.{$arrowExt}{/capture}
						<img border='0' src='{sugar_getimagepath file=$imageName}' width='{$arrowWidth}' height='{$arrowHeight}' align='absmiddle' alt='{$arrowAlt}'>
					{/if}
				{else}
					{sugar_translate label=$params.label module=$pageData.bean.moduleDir}
				{/if}
				</div>
			</th>
			{counter name="colCounter"}
		{/foreach}
		{if !empty($quickViewLinks)}
		<th scope='col' nowrap="nowrap" width='1%'>&nbsp;</th>
		{/if}
	</tr>
		
	{counter start=$pageData.offsets.current print=false assign="offset" name="offset"}	
	{foreach name=rowIteration from=$data key=id item=rowData}
	    {counter name="offset" print=false}

		{if $smarty.foreach.rowIteration.iteration is odd}
			{assign var='_rowColor' value=$rowColor[0]}
		{else}
			{assign var='_rowColor' value=$rowColor[1]}
		{/if}
		<tr height='20' class='{$_rowColor}S1'>
			{if $prerow}
			<td width='1%' class='nowrap'>
			 {if !$is_admin && is_admin_for_user && $rowData.IS_ADMIN==1}
					<input type='checkbox' disabled="disabled" class='checkbox' value='{$rowData.ID}'>
					{$pageData.additionalDetails.$id}
			 {else}
                    <input onclick='sListView.check_item(this, document.MassUpdate)' type='checkbox' class='checkbox' name='mass[]' value='{$rowData.ID}'>
                    {$pageData.additionalDetails.$id}			 
			 {/if}
			</td>
			{/if}
			{counter start=0 name="colCounter" print=false assign="colCounter"}

			{foreach from=$displayColumns key=col item=params}
				<td scope='row' align='{$params.align|default:'left'}' valign="top" {if ($params.type == 'teamset')}class="nowrap"{/if}>
					{if $params.link && !$params.customCode}
						
						<{$pageData.tag.$id[$params.ACLTag]|default:$pageData.tag.$id.MAIN} href="#" onMouseOver="javascript:lvg_nav('{if $params.dynamic_module}{$rowData[$params.dynamic_module]}{else}{$params.module|default:$pageData.bean.moduleDir}{/if}', '{$rowData[$params.id]|default:$rowData.ID}', 'd', {$offset}, this)"  onFocus="javascript:lvg_nav('{if $params.dynamic_module}{$rowData[$params.dynamic_module]}{else}{$params.module|default:$pageData.bean.moduleDir}{/if}', '{$rowData[$params.id]|default:$rowData.ID}', 'd', {$offset}, this)">{$rowData.$col}</{$pageData.tag.$id[$params.ACLTag]|default:$pageData.tag.$id.MAIN}>
						
					{elseif $params.customCode} 
						{sugar_evalcolumn_old var=$params.customCode rowData=$rowData}
					{elseif $params.currency_format} 
						{sugar_currency_format 
                            var=$rowData.$col 
                            round=$params.currency_format.round 
                            decimals=$params.currency_format.decimals 
                            symbol=$params.currency_format.symbol
                            convert=$params.currency_format.convert
                            currency_symbol=$params.currency_format.currency_symbol
						}
					{elseif $params.type == 'bool'}
							<input type='checkbox' disabled=disabled class='checkbox'
							{if !empty($rowData[$col])}
								checked=checked
							{/if}
							/>

					{elseif $params.type == 'teamset'}
                    	{if $rowData.TEAM_COUNT > 1}
							<span id='div_{$rowData.ID}_teams'>
							{$rowData.$col}<a href="javascript:toggleMore('div_{$rowData.ID}_teams','img_{$rowData.ID}_teams', 'Teams', 'DisplayInlineTeams', 'team_set_id={$rowData.TEAM_SET_ID}&team_id={$rowData.TEAM_ID}');" style='text-decoration:none;' onMouseOver="javascript:toggleMore('div_{$rowData.ID}_teams','img_{$rowData.ID}_teams', 'Teams', 'DisplayInlineTeams', 'team_set_id={$rowData.TEAM_SET_ID}&team_id={$rowData.TEAM_ID}');"  onFocus="javascript:toggleMore('div_{$rowData.ID}_teams','img_{$rowData.ID}_teams', 'Teams', 'DisplayInlineTeams', 'team_set_id={$rowData.TEAM_SET_ID}');" id='more_feather'>+</a>
							</span>
						{else}
							{$rowData.$col}
						{/if}

					{elseif $params.type == 'multienum'}
						{if !empty($rowData.$col)} 
							{counter name="oCount" assign="oCount" start=0}
							{multienum_to_array string=$rowData.$col assign="vals"}
							{foreach from=$vals item=item}
								{counter name="oCount"}
								{sugar_translate label=$params.options select=$item}{if $oCount !=  count($vals)},{/if} 
							{/foreach}	
						{/if}
					{else}	
						{$rowData.$col}
					{/if}
					{if empty($rowData.$col)}&nbsp;{/if}
				</td>
				{counter name="colCounter"}
			{/foreach}
			{if !empty($quickViewLinks)}
			<td width='2%' nowrap>
				{if $pageData.access.edit}
					<a title='{$editLinkString}' href="#" onMouseOver="javascript:lvg_nav('{if $params.dynamic_module}{$rowData[$params.dynamic_module]}{else}{$pageData.bean.moduleDir}{/if}', '{$rowData.ID}', {if $act}'{$act}'{else}'e'{/if}, {$offset}, this)" onFocus="javascript:lvg_nav('{if $params.dynamic_module}{$rowData[$params.dynamic_module]}{else}{$pageData.bean.moduleDir}{/if}', '{$rowData.ID}', {if $act}'{$act}'{else}'e'{/if}, {$offset}, this)">
					<img border=0 src='{sugar_getimagepath file='edit_inline.gif'}'>
					</a>
				{/if}
			</td>
	    	</tr>
			{/if}
	 	
	    
	{/foreach}
{include file='iportal/include/IportalListView/ListViewPagination.tpl'}
</table>
{if $contextMenus}
<script>
	{$contextMenuScript}
{literal}function lvg_nav(m,id,act,offset,t){if(t.href.search(/#/) < 0){return;}else{if(act=='pte'){act='ProjectTemplatesEditView';}else if(act=='d'){ act='DetailView';}else{ act='EditView';}{/literal}url = 'iportal.php?module='+m+'&offset=' + offset + '&stamp={$pageData.stamp}&return_module='+m+'&action='+act+'&record='+id;t.href=url;{literal}}}{/literal}
{literal}function lvg_dtails(id){{/literal}return SUGAR.util.getAdditionalDetails( '{$params.module|default:$pageData.bean.moduleDir}',id, 'adspan_'+id);{literal}}{/literal}
</script>
{/if}
