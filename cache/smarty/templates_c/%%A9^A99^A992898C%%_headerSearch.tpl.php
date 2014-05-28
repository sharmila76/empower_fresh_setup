<?php /* Smarty version 2.6.11, created on 2014-05-27 11:29:23
         compiled from themes/iSales/tpls/./_headerSearch.tpl */ ?>
<?php if ($this->_tpl_vars['AUTHENTICATED']): ?>
<div id="search">
    <form name='UnifiedSearch' action='index.php' onsubmit='return SUGAR.unifiedSearchAdvanced.checkUsaAdvanced()'>
        <input type="hidden" name="action" value="UnifiedSearch">
        <input type="hidden" name="module" value="Home">
        <input type="hidden" name="search_form" value="false">
        <input type="hidden" name="advanced" value="false">
        <div class="headerSearchContainer" id="phSearchContainer">
            <div class="headerSearchLeftRoundedCorner">
                <div class="searchBoxClearContainer">
                    <input id="phSearchInput" type="text" name="query_string" id="query_string" size="30" maxlength="100" value="<?php echo $this->_tpl_vars['SEARCH']; ?>
">
                </div>
                <div class="headerSearchRightRoundedCorner" id="searchButtonContainer">
                    <input type="submit" id="phSearchButton" class="button" value="<?php echo $this->_tpl_vars['APP']['LBL_SEARCH']; ?>
">
                </div>
            </div>
        </div>
            </form><br />
    <div id="unified_search_advanced_div"> </div>
</div>
<span id='sm_holder'></span>
<?php endif; ?>