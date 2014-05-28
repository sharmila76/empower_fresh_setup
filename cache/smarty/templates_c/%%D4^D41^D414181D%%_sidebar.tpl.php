<?php /* Smarty version 2.6.11, created on 2014-05-27 11:33:54
         compiled from themes/iSales/tpls/./_sidebar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_link', 'themes/iSales/tpls/./_sidebar.tpl', 29, false),)), $this); ?>
<div class="fixed sidebar" id="sidebarDiv">
    <?php if ($this->_tpl_vars['shortcutTopMenu'][$_REQUEST['module']]): ?>
    <div class="actionModule sidebarModule">
        <div class="sidebarModuleHeader brandPrimaryBgr">
            <h2 class="brandPrimaryFgr"><?php echo $this->_tpl_vars['APP']['LBL_LINK_ACTIONS']; ?>
</h2>
        </div>
        <div class="sidebarModuleBody">
            <?php $_from = $this->_tpl_vars['shortcutTopMenu'][$_REQUEST['module']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
                <div class="mruItem">
                    <?php if ($this->_tpl_vars['item']['URL'] == "-"): ?>
                        <a></a><span>&nbsp;</span>
                    <?php else: ?>
                        <a href="<?php echo $this->_tpl_vars['item']['URL']; ?>
" <?php if ($this->_tpl_vars['item']['TARGET']): ?> target="<?php echo $this->_tpl_vars['item']['TARGET']; ?>
"<?php endif; ?>><?php echo $this->_tpl_vars['item']['IMAGE']; ?>
&nbsp;&nbsp;<span><?php echo $this->_tpl_vars['item']['LABEL']; ?>
</span></a>
                    <?php endif; ?>
                </div>
            <?php endforeach; endif; unset($_from); ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="recentItemModule sidebarModule">
        <div class="sidebarModuleHeader brandPrimaryBgr">
            <h2 class="brandPrimaryFgr"><?php echo $this->_tpl_vars['APP']['LBL_LAST_VIEWED']; ?>
</h2>
        </div>
        <div class="sidebarModuleBody">
            <?php $_from = $this->_tpl_vars['recentRecords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['lastViewed'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['lastViewed']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['lastViewed']['iteration']++;
?>
                <div class="mruItem">
                <a title="<?php echo $this->_tpl_vars['item']['item_summary']; ?>
"
                   accessKey="<?php echo $this->_foreach['lastViewed']['iteration']; ?>
"
                   href="<?php echo smarty_function_sugar_link(array('module' => $this->_tpl_vars['item']['module_name'],'action' => 'DetailView','record' => $this->_tpl_vars['item']['item_id'],'link_only' => 1), $this);?>
">
                    <?php echo $this->_tpl_vars['item']['image']; ?>
&nbsp;&nbsp;<span><?php echo $this->_tpl_vars['item']['item_summary_short']; ?>
</span>
                </a>
                </div>
                <?php endforeach; else: ?>
                <?php echo $this->_tpl_vars['APP']['NTC_NO_ITEMS_DISPLAY']; ?>

            <?php endif; unset($_from); ?>
        </div>
    </div>
</div>