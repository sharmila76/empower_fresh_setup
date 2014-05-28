<?php /* Smarty version 2.6.11, created on 2014-04-15 07:17:00
         compiled from modules/Addpackage/Pricing.html */ ?>
<form method="POST" action="index.php">
    <input type="hidden" name="module" value="AddPackage">
    <input type="hidden" name="action" value="Pricing">
    <h3>PriceList For Package</h3>
    <table style="border:1px solid silver; width:100%" id="tblFeatures" style="height:auto">
        <tr style="text-align:center; color:#FFFFFF; background-color:#236fbd">
            <td>Packages</td>
            <td>Users</td>
            <td>Subscription</td>
            <td>Price</td>
            <td>Discount (%)</td>
            <td>Max Disc (%)</td>
        </tr>
        <tr>
            <?php if ($this->_tpl_vars['PACKAGE_LIST']): ?>
            <td><select title="Package" name='package'>
                    <?php $_from = $this->_tpl_vars['PACKAGE_LIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
                    <option><?php echo $this->_tpl_vars['value']['PackageName']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
            </td>
            <?php endif; ?>
            <td><select title='Package' name='users'>
                    <option>10 Users</option>
                    <option>25 Users</option>
                    <option>50 Users</option>
                    <option>Unlimited</option>
                </select></td>
            <td><select title='Package' name='period'>
                    <option>1 Month</option>
                    <option>3 Months</option>
                    <option>6 Months</option>
                    <option>1 Year</option>
                </select></td>
            <td style='text-align:center'>
                <input type='text' id='price' maxlength='8' name='price'>
            </td>
            <td style='text-align:center'>
                <input type='text' id='Discount' maxlength='5'  name='discount'>
            </td>
            <td style='text-align:center'>
                <input type='text' id='maxdiscount' maxlength='5' name='maxdiscount' >
            </td>

            <td colspan="6" style="text-align:right">
                <input type="submit" class="button" name="add_pricing" value="Save">
            </td>
        </tr>
    </table>
</form>

<h3>Saved Packages</h3>
<table style="border:1px solid silver; margin-top:15px; width:100%" id="tblFeatures" style="height:auto">
    <tr style="text-align:center; color:#FFFFFF; background-color:#236fbd">
        <td>Packages</td>
        <td>Users</td>
        <td>Subscription</td>
        <td>Price</td>
        <td>Discount (%)</td>
        <td>Max Disc (%)</td>
    </tr>
    <?php $_from = $this->_tpl_vars['PRICE_MASTER_LIST']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
    <tr>
        <td><?php echo $this->_tpl_vars['value']['PackageName']; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']['TotUsers']; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']['Subscription']; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']['Price']; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']['Discount']; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']['MaxDiscount']; ?>
</td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
</table>