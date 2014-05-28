<form method="GET" action="index.php">
    <input type="hidden" name="module" value="UsersActivity">
    <input type="hidden" name="action" value="packageFeature">
    {if $name}
        <p>{$name}</p>
    {/if}
    <table style="border:1px solid silver; padding:5px; margin-bottom:10px;">
        <tr>
            <td width="124"><b><font color='#663300'>Feature Code<em>*</em></font></b></td>
            <td width="203"><label>
                    <input type="text" name="feature_code" style="width:100%"/>
                </label></td>
        </tr>
        <tr>
            <td width="124"><b><font color='#663300'>Feature Name<em>*</em></font></b></td>
            <td><label>
                    <input type="text" style="width:100%" name="feature_name"/>
                </label></td>
        </tr>
        <tr>
            <td>Assign Package</td>
            <td>            
                <select title="Package" name='package[]' multiple="multiple" size="5" style="height:auto">
                    <option>Package1</option>
                    <option>Package2</option>
                    <option>Package3</option>
                    <option>Package4</option>
                </select>
            </td>
        </tr>
        <tr align="Right">
            <td colspan="2" style="padding-right:15px"><label>
                    <input type="submit" class="button" name="package_submit" value="Save Package">
                </label></td>
        </tr>
    </table>
</form>
