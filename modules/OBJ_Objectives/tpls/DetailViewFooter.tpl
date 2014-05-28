{*
/*********************************************************************************
 * SugarCRM is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2010 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/
*}
{if $type==0}
<div class="detail view">
	<table id="OBJ_ObjectivesobjectiveValuesTable0" cellspacing="0">
		<tbody>
		<tr>
			<td width='{{$def.templateMeta.widths[$smarty.foreach.colIteration.index].label}}%' scope="row">{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='OBJ_Objectives'}:</td>
			<td width='{{$def.templateMeta.widths[$smarty.foreach.colIteration.index].field}}%' {{if $colData.colspan}}colspan='{{$colData.colspan}}'{{/if}}></td>
			<td width='{{$def.templateMeta.widths[$smarty.foreach.colIteration.index].label}}%' scope="row">{sugar_translate label='LBL_OBJECTIVE_VALUE' module='OBJ_Objectives'}:</td>
			<td width='{{$def.templateMeta.widths[$smarty.foreach.colIteration.index].field}}%' {{if $colData.colspan}}colspan='{{$colData.colspan}}'{{/if}}></td>
		</tr>
		{foreach from=$objectiveValues item=objValue}
		<tr>
			<td width='{{$def.templateMeta.widths[$smarty.foreach.colIteration.index].label}}%' scope="row"></td>
			<td width='{{$def.templateMeta.widths[$smarty.foreach.colIteration.index].field}}%' {{if $colData.colspan}}colspan='{{$colData.colspan}}'{{/if}}>
				{$objValue.assigned_user_id}
			</td>
			<td width='{{$def.templateMeta.widths[$smarty.foreach.colIteration.index].label}}%' scope="row"></td>
			<td width='{{$def.templateMeta.widths[$smarty.foreach.colIteration.index].field}}%' {{if $colData.colspan}}colspan='{{$colData.colspan}}'{{/if}}>
				{$objValue.objective_value}
			</td>
		</tr>
		{foreachelse}
		<tr>
			<td>
				<i>{$app_strings.LBL_NONE}</i>
			</td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		{/foreach}
		</tbody>
	</table>
</div>
{/if}