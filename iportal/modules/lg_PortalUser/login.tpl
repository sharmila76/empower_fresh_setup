<!--
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
/*********************************************************************************

 ********************************************************************************/
-->
<link rel='stylesheet' type="text/css" href='modules/Users/login.css'>
<script type='text/javascript'>
var LBL_LOGIN_SUBMIT = '{$MOD.LBL_LOGIN_SUBMIT}';
var LBL_REQUEST_SUBMIT = '{$MOD.LBL_REQUEST_SUBMIT}';
</script>
<!--[if IE 6]>
{literal}
<script type='text/javascript'>
if ( !SUGAR.themes.theme_ie6compat && ( !{/literal}{$theme_changed}{literal} || !Get_Cookie('ie6compatcheck') ) ) {
    alert('{/literal}{$MOD.LBL_IE6COMPAT_CHECK}{literal}');
    Set_Cookie('ie6compatcheck','true',365,'/','','');
    location.href = location.href+'&ck_login_theme_20=SugarIE6&usertheme=SugarIE6';
}
YAHOO.util.Event.onDOMReady(function()
{
    document.getElementById('login_theme').onchange = function()
    {
        if ( !(YAHOO.env.ua.ie > 5 && YAHOO.env.ua.ie < 7) || SUGAR.themes.hasIE6compat(this.value) )
		    document.getElementById('login_theme').value = this.value;    
        else {
            alert('{/literal}{$MOD.LBL_THEME_PICKER_IE6COMPAT_CHECK}{literal}');
            document.getElementById('login_theme').value = 'SugarIE6';
        }
    }
});
</script>
{/literal}
<![endif]-->										
<table cellpadding="0" align="center" width="100%" cellspacing="0" border="0">
	<tr>
		<td>
			<table cellpadding="0"  cellspacing="0" border="0" align="center" width='350px'>
				<tr>
					<td style="padding-bottom: 10px;" ><b>{$MOD.LBL_LOGIN_WELCOME_TO}</b><br>
						{$LOGO}
					</td>
				</tr>
				<tr>
					<td align="center">
						<div class="edit view login">
							<form action="iportal.php" method="post" name="DetailView" id="form" onsubmit="return document.getElementById('cant_login').value == ''">
								<table cellpadding="0" cellspacing="2" border="0" align="center" width="100%">
									{if $LOGIN_ERROR !=''}
									<tr>
										<td scope="row" colspan="2"><span class="error">{$LOGIN_ERROR}</span></td>
						    	{if $WAITING_ERROR !=''}
							        <tr>
							            <td scope="row" colspan="2"><span class="error">{$WAITING_ERROR}</span></td>
									</tr>
								{/if}
									</tr>
								{else}
									<tr>
										<td scope="row" width='1%'></td>
										<td scope="row"><span id='post_error' class="error"></span></td>
									</tr>
								{/if}
									<tr>
										<td scope="row" colspan="2" width="100%" style="font-size: 12px; padding-bottom: 5px; font-weight: normal;">{$APP.NTC_LOGIN_MESSAGE}
										<input type="hidden" name="module" value="lg_PortalUser">
										<input type="hidden" name="action" value="Authenticate">
										<input type="hidden" name="return_module" value="lg_PortalUser">
										<input type="hidden" name="return_action" value="Login">
										<input type="hidden" id="cant_login" name="cant_login" value="">
										<input type="hidden" name="login_module" value="{$LOGIN_MODULE}">
										<input type="hidden" name="login_action" value="{$LOGIN_ACTION}">
										<input type="hidden" name="login_record" value="{$LOGIN_RECORD}">
										</td>
									</tr>
									<tr>
										<td scope="row" width="30%">{$MOD.LBL_NAME}:</td>
										<td width="70%"><input type="text" size='35' tabindex="1" id="user_name" name="username"  value='{$LOGIN_USERNAME}' /></td>
									</tr>
									<tr>
										<td scope="row">{$MOD.LBL_PASSWORD}:</td>
										<td width="30%"><input type="password" size='26' tabindex="2" id="user_password" name="password" value='' />

										{if $PASSWORD_CHANGED == 'sucess'}
										<span class="error">{$MOD.MSG_PASSWORD_CHANGED_SUCESS}</span>
										{elseif $PASSWORD_CHANGED == 'fail'}
										<span class="error">{$MOD.MSG_PASSWORD_CHANGED_ERROR}</span>
										{else}
										<a id="forgot_password_link" href="{$SITE_URL}/iportal.php?module=lg_PortalUser&action=ForgotPassword" onclick="return checkUsername();">{$MOD.LBL_FORGOT_PASSWORD}</a>
										{/if}
										</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td><input title="{$MOD.LBL_LOGIN_BUTTON_TITLE}" accessKey="{$MOD.LBL_LOGIN_BUTTON_TITLE}" class="button" type="submit" tabindex="3" id="login_button" name="Login" value="{$MOD.LBL_LOGIN_BUTTON_LABEL}"><br>&nbsp;</td>
									</tr>
								</table>
							</form>
						</div>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br>
<br>
{literal}
<script type='text/javascript'>
function checkUsername() {
	var username = document.getElementById('user_name');
	var forgot_password_link =  document.getElementById('forgot_password_link');
	if(username.value == '' || username.value == null) {
		alert('{/literal}{$MOD.ERR_EMPTY_USERNAME}{literal}');
		return false;
	} else {
		forgot_password_link.href = forgot_password_link.href + '&username=' + username.value;
		return true;	
	}
}
</script>
{/literal}
