
<form method="POST" action="index.php">
    <input type="hidden" name="module" value="Emails">
    <input type="hidden" name="action" value="sendbulkmail">

    {if $USERS_LIST} 
        <table id="send-mail-table">
            {foreach from=$USERS_LIST item=list}
                <tr>
                    <td colspan="2"><input type="checkbox" name="users[]" value={$list.id}>{$list.user_name}</td>
                    <td>{$list.last_name}</td>
                </tr>            
            {/foreach}
        </table>
        <table>
            <tr>
                <td>
                    <span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span><b>{$MOD.LBL_BULKMAIL_SUBJECT}</b>
                </td>
                <td>
                    <input type="text" name="subject">
                </td>
            </tr>
            <tr>
                <td>
                    <b>{$MOD.LBL_BULKMAIL_TEXT}</b>
                </td>
                <td>
                    <textarea rows="4" cols="30" name="send_mail_text"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="send_mail" value="Send Email">
                </td>
            </tr> 
        </table>
    {/if}
</form>
