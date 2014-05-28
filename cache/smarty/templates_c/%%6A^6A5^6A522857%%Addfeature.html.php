<?php /* Smarty version 2.6.11, created on 2014-05-14 09:44:08
         compiled from modules/Addpackage/Addfeature.html */ ?>
<link rel="stylesheet" type="text/css" href="themes/iSales/css/jquery.multiselect.css" />

<link rel="stylesheet" type="text/css" href="themes/iSales/css/jquery-ui-1.10.4.custom.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script type="text/javascript" src="themes/iSales/js/prettify.js"></script>
<script type="text/javascript" src="themes/iSales/js/jquery.multiselect.js"></script>
<script type="text/javascript">
    <?php echo '
    $(function() {
        $("#package_name").multiselect();
    });
    '; ?>

</script>

<form method="POST" action="index.php">
    <input type="hidden" name="module" value="AddPackage">
    <input type="hidden" name="action" value="Addfeature">
    <div style="width:98%; margin:0px auto;">
        <h2>Package Features</h2>
        <table style="border:1px solid silver; padding:5px; margin-bottom:10px;">
            <tr>
                <td><b><font color='#663300'>Feature Code<em>*</em></font></b></td>
                <td><label><input id="name" type="text" name="code"  style="width:90%" placeholder="[AUTO]"/>
                    </label></td>
                <td><b><font color='#663300'>Feature Name<em>*</em></font></b></td>
                <td>                       
                    <select name='name'>
                        <?php $_from = $this->_tpl_vars['MODULE_LIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['module']):
?>
                        <option value="<?php echo $this->_tpl_vars['module']; ?>
"><?php echo $this->_tpl_vars['module']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
                <td>Assign Package</td>
                <?php if ($this->_tpl_vars['PACKAGE_LIST']): ?>
                <td><select id="package_name" title="Package" name='select[]' multiple="multiple"  size="5" style="height:auto">
                        <?php $_from = $this->_tpl_vars['PACKAGE_LIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
                        <option value="<?php echo $this->_tpl_vars['value']['PackageName']; ?>
"><?php echo $this->_tpl_vars['value']['PackageName']; ?>
</option>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
                <?php endif; ?>
                <td>
                    <input type="submit" title="Add Feature" value="Save" name="add_feature" width="17">
                </td>
            </tr>
        </table>
    </div>
</form>
