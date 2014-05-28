<?php /* Smarty version 2.6.11, created on 2014-05-26 12:06:39
         compiled from themes/iSales/tpls/./_headerModuleList.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_link', 'themes/iSales/tpls/./_headerModuleList.tpl', 43, false),)), $this); ?>

<div class="zen">
    <div class="zen-headerBottom">
        <ul class="zen-inlineList zen-tabMenu">
            <?php $_from = $this->_tpl_vars['moduleTopMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['moduleList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['moduleList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['module']):
        $this->_foreach['moduleList']['iteration']++;
?>
                <li<?php if ($this->_tpl_vars['name'] == $this->_tpl_vars['MODULE_TAB']): ?> class="zen-active"<?php endif; ?>>
                    <?php echo smarty_function_sugar_link(array('id' => "moduleTab_".($this->_tpl_vars['name']),'module' => $this->_tpl_vars['name'],'data' => $this->_tpl_vars['module']), $this);?>

                                    </li>
            <?php endforeach; endif; unset($_from); ?>
            <?php if (count ( $this->_tpl_vars['moduleExtraMenu'] ) > 0): ?>
                <li>
                    <a href="#" id="toggleMoreTab" onclick="toggleMoreTab();">
                        &nbsp;<i id="more_to_hide" value="Show More Tabs">Show More Tabs</i>
                        &nbsp;
                    </a>
                    <ul id="moreTab">
                        <?php $_from = $this->_tpl_vars['moduleExtraMenu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['moduleList'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['moduleList']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['module']):
        $this->_foreach['moduleList']['iteration']++;
?>
                            <li><?php echo smarty_function_sugar_link(array('id' => "moduleTab_".($this->_tpl_vars['name']),'module' => $this->_tpl_vars['name'],'data' => $this->_tpl_vars['module']), $this);?>
</li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</div>