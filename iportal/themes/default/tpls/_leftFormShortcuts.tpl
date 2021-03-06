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
{if $LEFT_FORM_SHORTCUTS}
<div id="shortcuts" class="leftList">
    <img id="shortcuts_img" alt="{$APP.LBL_HIDE}" align="right" src="{sugar_getimagepath file='hide_submenu_shortcuts.gif'}" />
    <img id="shortcuts_img_1" alt="{$APP.LBL_SHOW}" align="right" src="{sugar_getimagepath file='show_submenu_shortcuts.gif'}" />
    <h3><span>{$APP.LBL_SHORTCUTS}</span></h3>
    <ul id="ul_shortcuts">
	{foreach from=$SHORTCUT_MENU item=item}
    <li>
        <a href="{$item.URL}">{$item.IMAGE}&nbsp;<span>{$item.LABEL}</span></a>
    </li>
    {/foreach}
    </ul>
</div>
{/if}
