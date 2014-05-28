
{if $overlib}
	<script type='text/javascript' src='include/javascript/overlibmws.js'></script>
	<script type='text/javascript' src='include/javascript/overlibmws_iframe.js'></script>
	<div id='overDiv' style='position:absolute; visibility:hidden; z-index:1000;'></div>
{/if}

<table cellpadding='0' cellspacing='0' width='100%' border='0' class='list View'>
	{include file='iportal/include/ListView/ListViewPagination.tpl'}

	<tr height='20'>
		{counter start=0 name="colCounter" print=false assign="colCounter"}
		{foreach from=$displayColumns key=colHeader item=params}
			<th scope='col' width='{$params.width}%' nowrap="nowrap">
				<span sugar="sugar{$colCounter}"><div style='white-space: nowrap;'width='100%' align='{$params.align|default:'left'}'>
                {if $params.sortable|default:true}
	                <a href='{$pageData.urls.orderBy}{$params.orderBy|default:$colHeader|lower}' class='listViewThLinkS1'>{sugar_translate label=$params.label module=$pageData.bean.moduleDir}</a>&nbsp;&nbsp;
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
				</div></span sugar='sugar{$colCounter}'>
			</th>
			{counter name="colCounter"}
		{/foreach}
		{if !empty($quickViewLinks)}
		<th scope='col' nowrap="nowrap" width='1%'>&nbsp;</th>
		{/if}
	</tr>
		
	{foreach name=rowIteration from=$data key=id item=rowData}
		{if $smarty.foreach.rowIteration.iteration is odd}
			{assign var='_rowColor' value=$rowColor[0]}
		{else}
			{assign var='_rowColor' value=$rowColor[1]}
		{/if}
		<tr height='20' class='{$_rowColor}S1'>
			{counter start=0 name="colCounter" print=false assign="colCounter"}
			{foreach from=$displayColumns key=col item=params}
				<td scope='row' align='{$params.align|default:'left'}' valign='top'><span sugar="sugar{$colCounter}b">
					{if $params.link && !$params.customCode}
						{if $params.contextMenu}
						<span id='obj_{$rowData[$params.id]|default:$rowData.ID}'>
						{/if}
						<{$pageData.tag.$id[$params.ACLTag]|default:$pageData.tag.$id.MAIN} href='iportal.php?action={$params.action|default:'DetailView'}&module={if $params.dynamic_module}{$rowData[$params.dynamic_module]}{else}{$params.module|default:$pageData.bean.moduleDir}{/if}&record={$rowData[$params.id]|default:$rowData.ID}&offset={$pageData.offsets.current+$smarty.foreach.rowIteration.iteration}&stamp={$pageData.stamp}'>{$rowData.$col}</{$pageData.tag.$id[$params.ACLTag]|default:$pageData.tag.$id.MAIN}>
						{if $params.contextMenu}
						</span>
						<script>
						SUGAR.contextMenu.registerObject('{$params.contextMenu.objectType}', 'adspan_{$rowData[$params.id]|default:$rowData.ID}'{if $params.contextMenu.metaData},	{sugar_evalcolumn var=$params.contextMenu.metaData rowData=$rowData toJSON=true}{/if}, false);
						</script>
						{/if}
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
					
					{else}	
						{$rowData.$col}
					{/if}
					{if empty($rowData.$col)}&nbsp;{/if}
				</span sugar='sugar{$colCounter}b'></td>
				{counter name="colCounter"}
			{/foreach}
			{if !empty($quickViewLinks)}
			<td width='1%' nowrap>
				{if $pageData.access.edit && $pageData.bean.moduleDir != "Employees"}
					<a title='{$editLinkString}' href='iportal.php?action=EditView&module={$params.module|default:$pageData.bean.moduleDir}&record={$rowData[$params.id]|default:$rowData.ID}&offset={$pageData.offsets.current+$smarty.foreach.rowIteration.iteration}&stamp={$pageData.stamp}&return_module={$params.module|default:$pageData.bean.moduleDir}'><img border="0" src="{sugar_getimagepath file="edit_inline.gif"}"></a>
				{/if}
			</td>
	    	</tr>
			{/if}
	 	
	{/foreach}
	{include file='iportal/include/ListView/ListViewPagination.tpl'}
</table>
{if $contextMenus}
<script>
	{$contextMenuScript}
</script>
{/if}
