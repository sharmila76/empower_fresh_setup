{$PRUEBA}
<form action="iportal.php?module=lg_PortalUser&action=ChangePassword" method="post">
	<table  cellpadding="0" cellspacing="2" border="0" >
		{if $CHANGE_PASSWORD_ERROR !=''}
			<tr>
				<td scope="row" colspan="2"><span class="error">{$CHANGE_PASSWORD_ERROR}</span></td>
			</tr>
		{/if}
		<tr>
			<td>{$MOD.LBL_OLD_PASSWORD}</td>
			<td><input id="old_password" name="old_password" value="" type="password" /></td>
		</tr>
		<tr>
			<td>{$MOD.LBL_NEW_PASSWORD}</td>
			<td><input id="new_password" name="new_password" value="" type="password" /></td>
		</tr>
		<tr>
			<td>{$MOD.LBL_CONFIRM_PASSWORD}</td>
			<td><input id="confirm_password" name="confirm_password" value="" type="password" /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input title="{$MOD.LBL_BUTTON_CHANGE_PASSWORD}" accessKey="{$MOD.LBL_BUTTON_CHANGE_PASSWORD}" class="button" type="submit" tabindex="3" id="login_button" name="Login" value="{$MOD.LBL_BUTTON_CHANGE_PASSWORD}"><br>&nbsp;</td>		
		</tr>
	</table>
</form>