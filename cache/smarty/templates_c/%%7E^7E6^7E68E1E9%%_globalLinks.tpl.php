<?php /* Smarty version 2.6.11, created on 2014-05-26 12:06:38
         compiled from themes/iSales/tpls/./_globalLinks.tpl */ ?>
<?php if ($this->_tpl_vars['AUTHENTICATED']): ?>
<div id="globalLinks">
    <ul>
        <li>
                <?php echo $this->_tpl_vars['APP']['NTC_WELCOME']; ?>
, <strong><a id="welcome_link" href='index.php?module=Users&action=EditView&record=<?php echo $this->_tpl_vars['CURRENT_USER_ID']; ?>
'><?php echo $this->_tpl_vars['CURRENT_USER']; ?>
</a></strong><?php if (! empty ( $this->_tpl_vars['LOGOUT_LINK'] ) && ! empty ( $this->_tpl_vars['LOGOUT_LABEL'] )): ?> [ <a id="logout_link" href='<?php echo $this->_tpl_vars['LOGOUT_LINK']; ?>
' class='utilsLink'><?php echo $this->_tpl_vars['LOGOUT_LABEL']; ?>
</a> ]<?php endif; ?>
        </li>
        <li> | </li>
        <li>
            <a href="index.php?module=UsersActivity&action=activity">Activity</a>
        </li>
        <?php $_from = $this->_tpl_vars['GCLS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['gcl'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['gcl']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['gcl_key'] => $this->_tpl_vars['GCL']):
        $this->_foreach['gcl']['iteration']++;
?>
            <?php if ($this->_tpl_vars['gcl_key'] == 'admin'): ?>
                <li>
                                    | <a id="<?php echo $this->_tpl_vars['gcl_key']; ?>
_link" href="<?php echo $this->_tpl_vars['GCL']['URL']; ?>
"<?php if (! empty ( $this->_tpl_vars['GCL']['ONCLICK'] )): ?> onclick="<?php echo $this->_tpl_vars['GCL']['ONCLICK']; ?>
"<?php endif; ?>><?php echo $this->_tpl_vars['GCL']['LABEL']; ?>
</a>
                                </li>
            <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
        <li>
            <div id="sitemapLink">
                | <span id="sitemapLinkSpan"><?php echo $this->_tpl_vars['APP']['LBL_SITEMAP']; ?>
</span>
            </div>
        </li>
    </ul>
            <br/>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "themes/iSales/tpls/./_headerSearch.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<?php endif; ?>