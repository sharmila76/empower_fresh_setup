{*
/*********************************************************************************
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
 ********************************************************************************/
*}
<script type="text/javascript" src="{sugar_getjspath file='iportal/include/javascript/iportal_3.js'}"></script>
<script type="text/javascript" src="{sugar_getjspath file='include/JSON.js'}"></script>
<script type="text/javascript" src="{sugar_getjspath file='iportal/include/javascript/popup_helper.js'}"></script>
<script type='text/javascript' src="{sugar_getjspath file='include/javascript/sugar_grp_overlib.js'}"></script>
<script type="text/javascript">
	{$ASSOCIATED_JAVASCRIPT_DATA}
</script>
{{if isset($formData)}}
{$SEARCH_FORM_HEADER}
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="edit view">
<tr>
<td>
<form action="iportal.php" method="post" name="popup_query_form" id="popup_query_form">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr><td>
{$searchForm}
</td></tr>
<tr>
<td>
<input type="hidden" name="module" value="{$module}" />
<input type="hidden" name="action" value="Popup" />
<input type="hidden" name="query" value="true" />
<input type="hidden" name="func_name" value="" />
<input type="hidden" name="request_data" value="{$request_data}" />
<input type="hidden" name="populate_parent" value="false" />
<input type="hidden" name="hide_clear_button" value="true" />
<input type="hidden" name="record_id" value="" />
{$MODE}
<input type="submit" name="button" class="button"
	title="{$APP.LBL_SEARCH_BUTTON_TITLE}"
	accessKey="{$APP.LBL_SEARCH_BUTTON_KEY}"
	value="{$APP.LBL_SEARCH_BUTTON_LABEL}" />
</td>
<td align='right'></td>
</tr>
</table>
</form>
</td>
</tr>
</table>
{{/if}}
{{if isset($ADDFORM)}}
<p>
{{if isset($popupMeta)}}
<div id='addformlink'>
<input type="button" name="showAdd" class="button" value="{$popupMeta.create.createButton}" onclick="toggleDisplay('addform');" />
</div>
{{/if}}
<div id='addform' style='display:none;position:relative;z-index:2;left:0px;top:0px;'>
<form name="{$object_name}Save" onsubmit="return check_form('{$object_name}Save');" method="post" action="iportal.php">
{$ADDFORMHEADER}
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="edit view">
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td>
<input type="hidden" name="module" value="{$module}" />
<input type="hidden" name="action" value="Popup" />
<input type="hidden" name="doAction" value="save" />
<input type="hidden" name="query" value="true" />
{$ADDFORM}
</td></tr>
</table></td></tr></table>
</form>
</div>
</p>
{{/if}}
{{if $prerow}}
	<form action="iportal.php" method="post" name="MassUpdate" id="MassUpdate">
	{$MODE}
<input type="hidden" name="mu" value="false" />
<input type='hidden' name='massupdate' value='true' />
{$massUpdateData}
<input type='hidden' name='Leads_LEAD_offset' value=''><input type='hidden' name='saved_associated_data' value=''><input type='hidden' name='module' value='{$module}'><input type='hidden' name='action' value='Popup'><input type='hidden' name='return_module' value='{$module}'><input type='hidden' name='return_action' value='Popup'><input type='hidden' name='hide_clear_button' value='true'><input type='hidden' name='current_query_by_page' value='{$current_query}'>
	
	{$multiSelectData}
	<input class="button" type="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' onclick="send_back_selected('{$module}',document.MassUpdate,'mass[]','{$APP.ERR_NOTHING_SELECTED}');">

{{/if}}

