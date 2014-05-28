<form method="GET" action="index.php">
    <input type="hidden" name="module" value="UsersActivity">
    <input type="hidden" name="action" value="activity">

    <table>
        <tr>
            <td>                
                {if $USER_FILTER}
                    <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span><b>{$MOD.LBL_EMPLOYEE}</b>
                    <select name="user_id">{$USER_FILTER}</select
                {/if}
                {if $CURRENT_USER_ID}
                    <b>{$CURRENT_USER_NAME} Activities:</b><input type="hidden" name="user_id" value={$CURRENT_USER_ID} />
                {/if}
            </td>
            <td><span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span><slot>{$MOD.LBL_DATE_START}</slot></td>
        <td><slot><input name='start_date' onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');" id='jscal_field_start' type="text" tabindex='2' size='11' maxlength='10' value="{$START_DATE}"> {sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE other_attributes='align="absmiddle" id="jscal_trigger_start" '}</slot></td>
        <td><span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span><slot>{$MOD.LBL_DATE_END}</slot></td>
        <td><slot><input name='end_date' onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');" id='jscal_field_end' type="text" tabindex='2' size='11' maxlength='10' value="{$END_DATE}"> {sugar_getimage name="jscalendar" ext=".gif" alt=$APP.LBL_ENTER_DATE other_attributes='align="absmiddle" id="jscal_trigger_end" '}</slot></td>
        <td><input type="submit" value="View Activity" /></td>
        <td><input name="export_result" type="submit" value="Export Activity"/></td>
        </tr>
    </table>
    <table>
        {if $USERS_ACTIVITY}
            {foreach from=$USERS_ACTIVITY item=value}
                <tr><td><b>{$value.user_name}</b> has viewed <a href="index.php?module={$value.module_name}&action={$value.action}&record={$value.item_id}">{$value.item_summary}</a> on {$value.date_modified}</br></td></tr>
            {/foreach}           
        {/if}
    </table>

    <p>{$USER_ID}</p>
</form>

<script>
    Calendar.setup({literal}{{/literal}
        inputField: "jscal_field_start", ifFormat: "{$CALENDAR_DATEFORMAT}", showsTime: false, button: "jscal_trigger_start", singleClick: true, step: 1, weekNumbers: false
    {literal}}{/literal});
        Calendar.setup({literal}{{/literal}
            inputField: "jscal_field_end", ifFormat: "{$CALENDAR_DATEFORMAT}", showsTime: false, button: "jscal_trigger_end", singleClick: true, step: 1, weekNumbers: false
    {literal}}{/literal});
</script>
