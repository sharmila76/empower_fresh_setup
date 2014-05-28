{*
/**
 * The contents of this file are subject to the SugarCRM Professional Subscription
 * Agreement ("License") which can be viewed at
 * http://www.sugarcrm.com/crm/products/sugar-professional-eula.html
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * among other things: 1) sublicense, resell, rent, lease, redistribute, assign
 * or otherwise transfer Your rights to the Software, and 2) use the Software
 * for timesharing or service bureau purposes such as hosting the Software for
 * commercial gain and/or for the benefit of a third party.  Use of the Software
 * may be subject to applicable fees and any use of the Software without first
 * paying applicable fees is strictly prohibited.  You do not have the right to
 * remove SugarCRM copyrights from the source code or user interface.
 *
 * All copies of the Covered Code must include on each user interface screen:
 *  (i) the "Powered by SugarCRM" logo and
 *  (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2009 SugarCRM, Inc.; All Rights Reserved.
 */



*}
{{include file=$headerTpl}}
{$jsLang}
{$LIST_HEADER}
<table cellpadding='0' cellspacing='0' width='100%' border='0' class='list view'>
	<tr class='pagination'>
		<td colspan='{$colCount+1}' align='right'>
			<table border='0' cellpadding='0' cellspacing='0' width='100%'>
				<tr>
					<td align='left' >
						&nbsp;</td>
					<td  align='right' nowrap='nowrap'>						
						{if $pageData.urls.startPage}
							<button type='button' title='{$navStrings.start}' class='button' {if $prerow}onclick='return sListView.save_checks(0, "{$moduleString}");'{else} onClick='location.href="{$pageData.urls.startPage}"' {/if}>
								<img src='{sugar_getimagepath file="start.gif"}' alt='{$navStrings.start}' align='absmiddle' border='0' width='13' height='11'>
							</button>						
							<!--<a href='{$pageData.urls.startPage}' {if $prerow}onclick="return sListView.save_checks(0, '{$moduleString}')"{/if} ><img src='{sugar_getimagepath file="start.gif"}' alt='{$navStrings.start}' align='absmiddle' border='0' width='13' height='11'>&nbsp;{$navStrings.start}</a>&nbsp;-->
						{else}
							<button type='button' title='{$navStrings.start}' class='button' disabled>
								<img src='{sugar_getimagepath file="start_off.gif"}' alt='{$navStrings.start}' align='absmiddle' border='0' width='13' height='11'>
							</button>
							<!--<img src='{sugar_getimagepath file="start_off.gif"}' alt='{$navStrings.start}' align='absmiddle' border='0' width='13' height='11'>&nbsp;{$navStrings.start}&nbsp;&nbsp;-->
						{/if}
						{if $pageData.urls.prevPage}
							<button type='button' title='{$navStrings.previous}' class='button' {if $prerow}onclick='return sListView.save_checks({$pageData.offsets.prev}, "{$moduleString}")' {else} onClick='location.href="{$pageData.urls.prevPage}"'{/if}>
								<img src='{sugar_getimagepath file="previous.gif"}' alt='{$navStrings.previous}' align='absmiddle' border='0' width='8' height='11'>							
							</button>
							<!--<a href='{$pageData.urls.prevPage}' {if $prerow}onclick="return sListView.save_checks({$pageData.offsets.prev}, '{$moduleString}')"{/if} ><img src='{sugar_getimagepath file="previous.gif"}' alt='{$navStrings.previous}' align='absmiddle' border='0' width='8' height='11'>&nbsp;{$navStrings.previous}</a>&nbsp;-->
						{else}
							<button type='button' class='button' disabled title='{$navStrings.previous}'>
								<img src='{sugar_getimagepath file="previous_off.gif"}' alt='{$navStrings.previous}' align='absmiddle' border='0' width='8' height='11'>
							</button>
							<!--<img src='{sugar_getimagepath file="previous_off.gif"}' alt='{$navStrings.previous}' align='absmiddle' border='0' width='8' height='11'>&nbsp;{$navStrings.previous}&nbsp;-->
						{/if}
							<span class='pageNumbers'>({if $pageData.offsets.lastOffsetOnPage == 0}0{else}{$pageData.offsets.current+1}{/if} - {$pageData.offsets.lastOffsetOnPage} {$navStrings.of} {if $pageData.offsets.totalCounted}{$pageData.offsets.total}{else}{$pageData.offsets.total}{if $pageData.offsets.lastOffsetOnPage != $pageData.offsets.total}+{/if}{/if})</span>
						{if $pageData.urls.nextPage}
							<button type='button' title='{$navStrings.next}' class='button' {if $prerow}onclick='return sListView.save_checks({$pageData.offsets.next}, "{$moduleString}")' {else} onClick='location.href="{$pageData.urls.nextPage}"'{/if}>
								<img src='{sugar_getimagepath file="next.gif"}' alt='{$navStrings.next}' align='absmiddle' border='0' width='8' height='11'>
							</button>
							<!--&nbsp;<a href='{$pageData.urls.nextPage}' {if $prerow}onclick="return sListView.save_checks({$pageData.offsets.next}, '{$moduleString}')"{/if} >{$navStrings.next}&nbsp;<img src='{sugar_getimagepath file="next.gif"}' alt='{$navStrings.next}' align='absmiddle' border='0' width='8' height='11'></a>&nbsp;-->
						{else}
							<button type='button' class='button' title='{$navStrings.next}' disabled>
								<img src='{sugar_getimagepath file="next_off.gif"}' alt='{$navStrings.next}' align='absmiddle' border='0' width='8' height='11'>
							</button>
							<!--&nbsp;{$navStrings.next}&nbsp;<img src='{sugar_getimagepath file="next_off.gif"}' alt='{$navStrings.next}' align='absmiddle' border='0' width='8' height='11'>-->
						{/if}
						{if $pageData.urls.endPage  && $pageData.offsets.total != $pageData.offsets.lastOffsetOnPage}
							<button type='button' title='{$navStrings.end}' class='button' {if $prerow}onclick='return sListView.save_checks({$pageData.offsets.end}, "{$moduleString}")' {else} onClick='location.href="{$pageData.urls.endPage}"'{/if}>
								<img src='{sugar_getimagepath file="end.gif"}' alt='{$navStrings.end}' align='absmiddle' border='0' width='13' height='11'>							
							</button>
							<!--<a href='{$pageData.urls.endPage}' {if $prerow}onclick="return sListView.save_checks({$pageData.offsets.end}, '{$moduleString}')"{/if} >{$navStrings.end}&nbsp;<img src='{sugar_getimagepath file="end.gif"}' alt='{$navStrings.end}' align='absmiddle' border='0' width='13' height='11'></a></td>-->
						{elseif !$pageData.offsets.totalCounted || $pageData.offsets.total == $pageData.offsets.lastOffsetOnPage}
							<button type='button' class='button' disabled title='{$navStrings.end}'>
							 	<img src='{sugar_getimagepath file="end_off.gif"}' alt='{$navStrings.end}' align='absmiddle' border='0' width='13' height='11'>
							</button>
							<!--&nbsp;{$navStrings.end}&nbsp;<img src='{sugar_getimagepath file="end_off.gif"}' alt='{$navStrings.end}' align='absmiddle' border='0' width='13' height='11'>-->
						{/if}
					</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr height='20'>
		{if $prerow}
			<th scope='col' nowrap="nowrap" width='1%'>
				<input type='checkbox' class='checkbox' name='massall' value='' onclick='sListView.check_all(document.MassUpdate, "mass[]", this.checked);' />
			</th>
		{/if}
		{counter start=0 name="colCounter" print=false assign="colCounter"}
		{foreach from=$displayColumns key=colHeader item=params}
			<th scope='col' width='{$params.width}%' nowrap="nowrap">
				<div style='white-space: nowrap;'width='100%' align='{$params.align|default:'left'}'>
                {if $params.sortable|default:true}              
	                <a href='#' onclick='location.href="{$pageData.urls.orderBy}{$params.orderBy|default:$colHeader|lower}"; return sListView.save_checks(0, "{$moduleString}");' class='listViewThLinkS1'>{sugar_translate label=$params.label module=$pageData.bean.moduleDir}&nbsp;&nbsp;
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
					</a>
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
		
	{foreach name=rowIteration from=$data key=id item=rowData}
		{if $smarty.foreach.rowIteration.iteration is odd}
			{assign var='_rowColor' value=$rowColor[0]}
		{else}
			{assign var='_rowColor' value=$rowColor[1]}
		{/if}
		<tr height='20' class='{$_rowColor}S1'>
			{if $prerow}
			<td width='1%' nowrap='nowrap'>
					<input onclick='sListView.check_item(this, document.MassUpdate)' type='checkbox' class='checkbox' name='mass[]' value='{$rowData[$params.id]|default:$rowData.ID}'>
					{$pageData.additionalDetails.$id}
			</td>
			{/if}
			{counter start=0 name="colCounter" print=false assign="colCounter"}
			{foreach from=$displayColumns key=col item=params}
				<td scope='row' align='{$params.align|default:'left'}' valign=top class='{$_rowColor}S1' bgcolor='{$_bgColor}'>
					{if $params.link && !$params.customCode}
						
						<{$pageData.tag.$id[$params.ACLTag]|default:$pageData.tag.$id.MAIN} href='#' onclick="send_back('{if $params.dynamic_module}{$rowData[$params.dynamic_module]}{else}{$params.module|default:$pageData.bean.moduleDir}{/if}','{$rowData[$params.id]|default:$rowData.ID}');">{$rowData.$col}</{$pageData.tag.$id[$params.ACLTag]|default:$pageData.tag.$id.MAIN}>

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
				</td>
				{counter name="colCounter"}
			{/foreach}
	 	
	{/foreach}
	<tr class='pagination'>
		<td colspan='{$colCount+1}' align='right'>
			<table border='0' cellpadding='0' cellspacing='0' width='100%'>
				<tr>
					<td align='left' >
						&nbsp;</td>
					<td  align='right' nowrap='nowrap'>						
						{if $pageData.urls.startPage}
							<button type='button' title='{$navStrings.start}' class='button' {if $prerow}onclick='return sListView.save_checks(0, "{$moduleString}");'{else} onClick='location.href="{$pageData.urls.startPage}"' {/if}>
								<img src='{sugar_getimagepath file="start.gif"}' alt='{$navStrings.start}' align='absmiddle' border='0' width='13' height='11'>
							</button>						
							<!--<a href='{$pageData.urls.startPage}' {if $prerow}onclick="return sListView.save_checks(0, '{$moduleString}')"{/if} ><img src='{sugar_getimagepath file="start.gif"}' alt='{$navStrings.start}' align='absmiddle' border='0' width='13' height='11'>&nbsp;{$navStrings.start}</a>&nbsp;-->
						{else}
							<button type='button' title='{$navStrings.start}' class='button' disabled>
								<img src='{sugar_getimagepath file="start_off.gif"}' alt='{$navStrings.start}' align='absmiddle' border='0' width='13' height='11'>
							</button>
							<!--<img src='{sugar_getimagepath file="start_off.gif"}' alt='{$navStrings.start}' align='absmiddle' border='0' width='13' height='11'>&nbsp;{$navStrings.start}&nbsp;&nbsp;-->
						{/if}
						{if $pageData.urls.prevPage}
							<button type='button' title='{$navStrings.previous}' class='button' {if $prerow}onclick='return sListView.save_checks({$pageData.offsets.prev}, "{$moduleString}")' {else} onClick='location.href="{$pageData.urls.prevPage}"'{/if}>
								<img src='{sugar_getimagepath file="previous.gif"}' alt='{$navStrings.previous}' align='absmiddle' border='0' width='8' height='11'>							
							</button>
							<!--<a href='{$pageData.urls.prevPage}' {if $prerow}onclick="return sListView.save_checks({$pageData.offsets.prev}, '{$moduleString}')"{/if} ><img src='{sugar_getimagepath file="previous.gif"}' alt='{$navStrings.previous}' align='absmiddle' border='0' width='8' height='11'>&nbsp;{$navStrings.previous}</a>&nbsp;-->
						{else}
							<button type='button' class='button' disabled title='{$navStrings.previous}'>
								<img src='{sugar_getimagepath file="previous_off.gif"}' alt='{$navStrings.previous}' align='absmiddle' border='0' width='8' height='11'>
							</button>
							<!--<img src='{sugar_getimagepath file="previous_off.gif"}' alt='{$navStrings.previous}' align='absmiddle' border='0' width='8' height='11'>&nbsp;{$navStrings.previous}&nbsp;-->
						{/if}
							<span class='pageNumbers'>({if $pageData.offsets.lastOffsetOnPage == 0}0{else}{$pageData.offsets.current+1}{/if} - {$pageData.offsets.lastOffsetOnPage} {$navStrings.of} {if $pageData.offsets.totalCounted}{$pageData.offsets.total}{else}{$pageData.offsets.total}{if $pageData.offsets.lastOffsetOnPage != $pageData.offsets.total}+{/if}{/if})</span>
						{if $pageData.urls.nextPage}
							<button type='button' title='{$navStrings.next}' class='button' {if $prerow}onclick='return sListView.save_checks({$pageData.offsets.next}, "{$moduleString}")' {else} onClick='location.href="{$pageData.urls.nextPage}"'{/if}>
								<img src='{sugar_getimagepath file="next.gif"}' alt='{$navStrings.next}' align='absmiddle' border='0' width='8' height='11'>
							</button>
							<!--&nbsp;<a href='{$pageData.urls.nextPage}' {if $prerow}onclick="return sListView.save_checks({$pageData.offsets.next}, '{$moduleString}')"{/if} >{$navStrings.next}&nbsp;<img src='{sugar_getimagepath file="next.gif"}' alt='{$navStrings.next}' align='absmiddle' border='0' width='8' height='11'></a>&nbsp;-->
						{else}
							<button type='button' class='button' title='{$navStrings.next}' disabled>
								<img src='{sugar_getimagepath file="next_off.gif"}' alt='{$navStrings.next}' align='absmiddle' border='0' width='8' height='11'>
							</button>
							<!--&nbsp;{$navStrings.next}&nbsp;<img src='{sugar_getimagepath file="next_off.gif"}' alt='{$navStrings.next}' align='absmiddle' border='0' width='8' height='11'>-->
						{/if}
						{if $pageData.urls.endPage  && $pageData.offsets.total != $pageData.offsets.lastOffsetOnPage}
							<button type='button' title='{$navStrings.end}' class='button' {if $prerow}onclick='return sListView.save_checks({$pageData.offsets.end}, "{$moduleString}")' {else} onClick='location.href="{$pageData.urls.endPage}"'{/if}>
								<img src='{sugar_getimagepath file="end.gif"}' alt='{$navStrings.end}' align='absmiddle' border='0' width='13' height='11'>							
							</button>
							<!--<a href='{$pageData.urls.endPage}' {if $prerow}onclick="return sListView.save_checks({$pageData.offsets.end}, '{$moduleString}')"{/if} >{$navStrings.end}&nbsp;<img src='{sugar_getimagepath file="end.gif"}' alt='{$navStrings.end}' align='absmiddle' border='0' width='13' height='11'></a></td>-->
						{elseif !$pageData.offsets.totalCounted || $pageData.offsets.total == $pageData.offsets.lastOffsetOnPage}
							<button type='button' class='button' disabled title='{$navStrings.end}'>
							 	<img src='{sugar_getimagepath file="end_off.gif"}' alt='{$navStrings.end}' align='absmiddle' border='0' width='13' height='11'>
							</button>
							<!--&nbsp;{$navStrings.end}&nbsp;<img src='{sugar_getimagepath file="end_off.gif"}' alt='{$navStrings.end}' align='absmiddle' border='0' width='13' height='11'>-->
						{/if}
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
{if $prerow}
<a href='javascript:sListView.check_all(document.MassUpdate, "mass[]", false);'>{$clearAll}</a>
<script>
{literal}function lvg_dtails(id){return SUGAR.util.getAdditionalDetails( '{/literal}{$module}{literal}',id, 'adspan_'+id);}{/literal}
</script>
{/if}
{{include file=$footerTpl}}
