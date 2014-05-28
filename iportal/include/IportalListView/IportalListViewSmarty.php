<?php

require_once("include/ListView/ListViewSmarty.php");
require_once("iportal/include/IportalListView/IportalListViewData.php");

class IportalListViewSmarty extends ListViewSmarty {
	
	var $export = false;
    var $delete = false;
    var $select = false;
    var $mailMerge = false;
	var $multiSelect = false; 
	var $mergeduplicates = false;
	var $showMassupdateFields = false;
	var $base_url = "iportal.php?";
	
	function IportalListViewSmarty() {
		parent::ListViewSmarty();
		$this->lvd = new IportalListViewData();
	}

    function process($file, $data, $htmlVar) {
		if(!$this->should_process)return;
		global $odd_bg, $even_bg, $hilite_bg, $click_bg, $app_strings;
		parent::process($file, $data, $htmlVar);

		$this->tpl = $file;
		$this->data = $data;

        $totalWidth = 0;
        foreach($this->displayColumns as $name => $params) {
            $totalWidth += $params['width'];
        }
        $adjustment = $totalWidth / 100;

        $contextMenuObjectsTypes = array();
        foreach($this->displayColumns as $name => $params) {
            $this->displayColumns[$name]['width'] = floor($this->displayColumns[$name]['width'] / $adjustment);
            // figure out which contextMenu objectsTypes are required
            if(!empty($params['contextMenu']['objectType']))
                $contextMenuObjectsTypes[$params['contextMenu']['objectType']] = true;
        }
		$this->ss->assign('displayColumns', $this->displayColumns);
		$this->ss->assign('APP',$app_strings);

		$this->ss->assign('bgHilite', $hilite_bg);
		$this->ss->assign('colCount', count($this->displayColumns) + 2);
		$this->ss->assign('htmlVar', strtoupper($htmlVar));
		$this->ss->assign('moduleString', $this->moduleString);
        $this->ss->assign('editLinkString', $app_strings['LBL_EDIT_BUTTON']);
        $this->ss->assign('viewLinkString', $app_strings['LBL_VIEW_BUTTON']);
        $this->ss->assign('allLinkString',$app_strings['LBL_LINK_ALL']);
        $this->ss->assign('noneLinkString',$app_strings['LBL_LINK_NONE']);
        $this->ss->assign('recordsLinkString',$app_strings['LBL_LINK_RECORDS']);
        $this->ss->assign('selectLinkString',$app_strings['LBL_LINK_SELECT']);
        $this->ss->assign('favorites',$this->seed->isFavoritesEnabled());
        if($this->overlib) $this->ss->assign('overlib', true);
		if($this->select)$this->ss->assign('selectLink', $this->buildSelectLink('select_link', $this->data['pageData']['offsets']['total'], $this->data['pageData']['offsets']['next']-$this->data['pageData']['offsets']['current']));

		if($this->show_action_dropdown)
		{
			$this->ss->assign('actionsLink', $this->buildActionsLink());
		}

		$this->ss->assign('quickViewLinks', $this->quickViewLinks);

		// handle save checks and stuff
		if($this->multiSelect) {

		//if($this->data['pageData']['bean']['moduleDir']== 'KBDocuments')
		//{
		//	$this->ss->assign('selectedObjectsSpan', $this->buildSelectedObjectsSpan(true, $this->data['pageData']['offsets']['current']));
		//} else {
			$this->ss->assign('selectedObjectsSpan', $this->buildSelectedObjectsSpan(true, $this->data['pageData']['offsets']['total']));
		//}
		$this->ss->assign('multiSelectData', $this->getMultiSelectData());
		}
		//taras Remove button for Adding to Target List if in one of four applicable modules
        $this->ss->assign( 'targetLink', '' ) ;
        //end taras
		$this->processArrows($data['pageData']['ordering']);
		$this->ss->assign('prerow', $this->multiSelect);
		$this->ss->assign('clearAll', $app_strings['LBL_CLEARALL']);
		$this->ss->assign('rowColor', array('oddListRow', 'evenListRow'));
		$this->ss->assign('bgColor', array($odd_bg, $even_bg));
        $this->ss->assign('contextMenus', $this->contextMenus);
        $this->ss->assign('is_admin_for_user', is_admin_for_module($GLOBALS['current_user'],'Users'));
        $this->ss->assign('is_admin', is_admin($GLOBALS['current_user']));


        if($this->contextMenus && !empty($contextMenuObjectsTypes)) {
            $script = '';
            $cm = new contextMenu();
            foreach($contextMenuObjectsTypes as $type => $value) {
                $cm->loadFromFile($type);
                $script .= $cm->getScript();
                $cm->menuItems = array(); // clear menuItems out
            }
            $this->ss->assign('contextMenuScript', $script);
        }

	}
	
}



?>