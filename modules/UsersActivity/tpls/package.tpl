<form method="GET" action="index.php">
    <input type="hidden" name="module" value="UsersActivity">
    <input type="hidden" name="action" value="package">
    <table>
        <tr>
            <th>Module Name</th><th>Module amount</th>
        </tr>
        {foreach from=$modules item=module_name}
            <tr><td>{$module_name.module_name}</td>
                <td><input type="text" value={$module_name.amount} /></td>
            </tr>
        {/foreach}
        <tr><td><input name="submit_amount" type="submit" value="Submit Amount" /></td></tr>
    </table>
</form>
