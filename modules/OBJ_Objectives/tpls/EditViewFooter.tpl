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
{php}
global $objectiveValueInstances; 
if (empty($objectiveValueInstances))
	$objectiveValueInstances = array(); 
if (!isset($objectiveValueInstances[$this->_tpl_vars['module']]))
	$objectiveValueInstances[$this->_tpl_vars['module']] = 0;
$this->_tpl_vars['index'] = $objectiveValueInstances[$this->_tpl_vars['module']];
$objectiveValueInstances['module']++;
{/php}
<script type="text/javascript" language="javascript">
var objectiveValueWidgetLoaded = false;
</script>
<script type="text/javascript">
	var module = '{$module}';
</script>
<table id="{$module}objectiveValuesTable{$index}" class="{$def.templateMeta.panelClass|default:'edit view'}">
	<tbody id="targetBody"></tbody>
	<tr>
		<td scope="row" NOWRAP width="25%">
		    <input type=hidden id="{$module}_objective_value_widget_id" name="{$module}_objective_value_widget_id" value="">
			<input type=hidden id='objectiveValueWidget' name='objectiveValueWidget' value='1'>
			<input type=hidden id='objectiveValueListSize' name='objectiveValueListSize' value=''>
			<input type=hidden id='objectiveValueDeletedIndex' name='objectiveValueDeletedIndex' value=''>
			<span class="id-ff multiple ownline">
			<button class='button' type='button' onClick="javascript:SUGAR.ObjectiveValuesWidget.instances.{$module}{$index}.addObjectiveValue('{$module}objectiveValuesTable{$index}','','');" value='{$app_strings.LBL_ADD_BUTTON}'><img src="{sugar_getimagepath file="id-ff-add.png"}"></button>
			</span>
		</td>
		<td scope="row" NOWRAP width="25%">
			{sugar_translate label='LBL_ASSIGNED_TO_NAME' module='OBJ_Objectives'}
			{capture name="popupText" assign="popupText"}{sugar_translate label="HELP_OBJECTIVE_USER_ASSIGNED" module='OBJ_Objective_Values'}{/capture}
			{sugar_help text=$popupText WIDTH=-1}
		</td>
		<td scope="row" NOWRAP width="25%">
			{sugar_translate label='LBL_OBJECTIVE_VALUE' module='OBJ_Objectives'}
			{capture name="popupText" assign="popupText"}{sugar_translate label="HELP_OBJECTIVE_VALUE" module='OBJ_Objective_Values'}{/capture}
			{sugar_help text=$popupText WIDTH=-1}
		</td>
		<td width="25%">
			<select name="user_list" id="user_list" style="display:none">
			{foreach from=$users item=u}
				<option id="{$u.id}" value="{$u.id}" >{$u.user_name}</option>
			{foreachelse}
				<option value=""></option>
			{/foreach}
			</select>
		</td>
	</tr>
</table>
<script type="text/javascript" language="javascript">
SUGAR_callsInProgress++;
function init{$module}ObjectiveValue{$index}(){ldelim}
	if(objectiveValueWidgetLoaded || SUGAR.ObjectiveValuesWidget){ldelim}
		var table = YAHOO.util.Dom.get("{$module}objectiveValuesTable{$index}");
	    var ovw = SUGAR.ObjectiveValuesWidget.instances.{$module}{$index} = new SUGAR.ObjectiveValuesWidget("{$module}");
		ovw.objectiveValueView = '{$objectiveValueView}';
	    ovw.objectiveValueIsRequired = "{$required}";
	    ovw.tabIndex = '{$tabindex}';
	    var addDefaultValue = '{$addDefaultValue}';
	    var prefillObjectiveValue = '{$prefillObjectiveValues}';
	    var prefillData = {$prefillData};
	    if(prefillObjectiveValue == 'true') {ldelim}
	        ovw.prefillObjectiveValues('{$module}objectiveValuesTable{$index}', prefillData);
		{rdelim} else if(addDefaultValue == 'true') {ldelim}
	        ovw.addObjectiveValue('{$module}objectiveValuesTable{$index}');
		{rdelim}
		if('{$module}_objective_value_widget_id') {ldelim}
		   document.getElementById('{$module}_objective_value_widget_id').value = ovw.count;
		{rdelim}
		SUGAR_callsInProgress--;
	{rdelim}else{ldelim}
		setTimeout("init{$module}ObjectiveValue{$index}();", 500);
	{rdelim}
{rdelim}

YAHOO.util.Event.onDOMReady(init{$module}ObjectiveValue{$index});
</script>

</form>