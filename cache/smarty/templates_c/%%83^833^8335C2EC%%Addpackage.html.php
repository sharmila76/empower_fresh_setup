<?php /* Smarty version 2.6.11, created on 2014-04-16 06:26:46
         compiled from modules/Addpackage/Addpackage.html */ ?>
<form method="POST" action="index.php">
    <input type="hidden" name="module" value="AddPackage">
    <input type="hidden" name="action" value="Addpackage">
    <input type="hidden" name="return_module" value="Addpackage">
    <input type="hidden" name="return_action" value="ListView">
    
    <div style="width:30%; margin:0px auto;">
        <h2>Add New Package</h2>
        <table style="border:1px solid silver; padding:5px; margin-bottom:10px;">
            <tr>
                <td width="124"><b><font color='#663300'>Package Code<em>*</em></font></b></td>
                <td width="203"><label>
                        <input type="text" name="package_code"  style="width:100%"/>
                    </label></td>
            </tr>
            <tr>
                <td width="124"><b><font color='#663300'>Package Name<em>*</em></font></b></td>
                <td><label>
                        <input type="text" style="width:100%" name="package_name"/>
                    </label></td>
            </tr>
            <tr align="Right">
                <td colspan="2" style="padding-right:15px"><label>
                        <input type="submit" class="button" name="add_package" value="Save Package">
                    </label></td>
            </tr>
            <tr>
                <td colspan="2">

                </td>
            </tr>
        </table>
    </div>
</form>