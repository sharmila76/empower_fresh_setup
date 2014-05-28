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
	<tr class='pagination'>
		<td colspan='{if $prerow}{$colCount+1}{else}{$colCount}{/if}'>
			<table border='0' cellpadding='0' cellspacing='0' width='100%' class='paginationTable'>
				<tr>
					<td nowrap="nowrap" width='2%' class='paginationActionButtons'>
						{$selectLink}
						{$deleteLink}
						{$exportLink}
						{$targetLink}
						{$mergeLink}
						{$mergedupLink}
						{$favoritesLink}
						{$composeEmailLink}





						&nbsp;{$selectedObjectsSpan}		
					</td>
					<td  nowrap='nowrap' width='1%' align="right" class='paginationChangeButtons'>
						{if $pageData.urls.startPage}
							<button type='button' name='listViewStartButton' title='{$navStrings.start}' class='button' {if $prerow}onclick='return sListView.save_checks(0, "{$moduleString}");'{else} onClick='location.href="{$pageData.urls.startPage}"' {/if}>
								<img src='{sugar_getimagepath file='start.gif'}' alt='{$navStrings.start}' align='absmiddle' border='0' width='13' height='11'>
							</button>
						{else}
							<button type='button' name='listViewStartButton' title='{$navStrings.start}' class='button' disabled>
								<img src='{sugar_getimagepath file='start_off.gif'}' alt='{$navStrings.start}' align='absmiddle' border='0' width='13' height='11'>
							</button>
						{/if}
						{if $pageData.urls.prevPage}
							<button type='button' name='listViewPrevButton' title='{$navStrings.previous}' class='button' {if $prerow}onclick='return sListView.save_checks({$pageData.offsets.prev}, "{$moduleString}")' {else} onClick='location.href="{$pageData.urls.prevPage}"'{/if}>
								<img src='{sugar_getimagepath file='previous.gif'}' alt='{$navStrings.previous}' align='absmiddle' border='0' width='8' height='11'>							
							</button>
						{else}
							<button type='button' name='listViewPrevButton' class='button' disabled title='{$navStrings.previous}'>
								<img src='{sugar_getimagepath file='previous_off.gif'}' alt='{$navStrings.previous}' align='absmiddle' border='0' width='8' height='11'>
							</button>
						{/if}
							<span class='pageNumbers'>({if $pageData.offsets.lastOffsetOnPage == 0}0{else}{$pageData.offsets.current+1}{/if} - {$pageData.offsets.lastOffsetOnPage} {$navStrings.of} {if $pageData.offsets.totalCounted}{$pageData.offsets.total}{else}{$pageData.offsets.total}{if $pageData.offsets.lastOffsetOnPage != $pageData.offsets.total}+{/if}{/if})</span>
						{if $pageData.urls.nextPage}
							<button type='button' name='listViewNextButton' title='{$navStrings.next}' class='button' {if $prerow}onclick='return sListView.save_checks({$pageData.offsets.next}, "{$moduleString}")' {else} onClick='location.href="{$pageData.urls.nextPage}"'{/if}>
								<img src='{sugar_getimagepath file='next.gif'}' alt='{$navStrings.next}' align='absmiddle' border='0' width='8' height='11'>
							</button>
						{else}
							<button type='button' name='listViewNextButton' class='button' title='{$navStrings.next}' disabled>
								<img src='{sugar_getimagepath file='next_off.gif'}' alt='{$navStrings.next}' align='absmiddle' border='0' width='8' height='11'>
							</button>
						{/if}
						{if $pageData.urls.endPage  && $pageData.offsets.total != $pageData.offsets.lastOffsetOnPage}
							<button type='button' name='listViewEndButton' title='{$navStrings.end}' class='button' {if $prerow}onclick='return sListView.save_checks("end", "{$moduleString}")' {else} onClick='location.href="{$pageData.urls.endPage}"'{/if}>
								<img src='{sugar_getimagepath file='end.gif'}' alt='{$navStrings.end}' align='absmiddle' border='0' width='13' height='11'>							
							</button>
						{elseif !$pageData.offsets.totalCounted || $pageData.offsets.total == $pageData.offsets.lastOffsetOnPage}
							<button type='button' class='button' name='listViewEndButton' disabled title='{$navStrings.end}'>
							 	<img src='{sugar_getimagepath file='end_off.gif'}' alt='{$navStrings.end}' align='absmiddle' border='0' width='13' height='11'>
							</button>
						{/if}
					</td>
				</tr>
			</table>
		</td>
	</tr>
