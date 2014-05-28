<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Professional Subscription
 * Agreement ("License") which can be viewed at
 * http://www.sugarcrm.com/crm/products/sugar-professional-eula.html
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * among other things: 1) sublicense, resell, rent, lease, redistribute, assign
 * or otherwise transfer Your rights to the Software, and 2) use the Software
 * for timesharing or service bureau purposes such as hosting the Software for
 * commercial gain and/or for the benefit of a third party.  Use of the Software
 * may be subject to applicable fees and any use of the Software without first
 * paying applicable fees is strictly prohibited.  You do not have the right to
 * remove SugarCRM copyrights from the source code or user interface.
 *
 * All copies of the Covered Code must include on each user interface screen:
 *  (i) the "Powered by SugarCRM" logo and
 *  (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2009 SugarCRM, Inc.; All Rights Reserved.
 ********************************************************************************/
require_once('include/ListView/ListViewSmarty.php');

require_once('include/TemplateHandler/TemplateHandler.php');
require_once('include/SearchForm/SearchForm2.php');
require_once('iportal/include/IportalListView/IportalListViewSmarty.php');
define("NUM_COLS", 2);
class PopupSmarty extends IportalListViewSmarty{
	
	var $contextMenus = false;
	var $export = false;
	var $mailmerge = false;
	var $mergeduplicates = false;
	var $quickViewLinks = false;
	var $multiSelect = false;
	var $headerTpl;
    var $footerTpl;
    var $th;
    var $tpl;
    var $view;
    var $field_defs;
    var $formData;
    var $_popupMeta;
    var $_create = false;
    var $searchdefs = array();
    var $listviewdefs = array();
    var $searchFields = array();
    var $customFieldDefs;
    var $filter_fields = array();
    //rrs
    var $searchForm;
    var $module;
    var $massUpdateData = '';
	
	function PopupSmarty($seed, $module){
		parent::IportalListViewSmarty();
		$this->th = new TemplateHandler();
		$this->th->loadSmarty();
		$this->seed = $seed;
		$this->view = 'Popup';
		$this->module = $module;
		$this->searchForm = new SearchForm($this->seed, $this->module);
		$this->th->deleteTemplate($module, $this->view);

        //taras USE FOR POPUP THE THEME FROM iportal_config.php
        global $theme, $iportal_config;
        require_once('iportal_config.php');
		if(file_exists('iportal_config_override.php')){ require_once('iportal_config_override.php'); }
        SugarThemeRegistry::set($iportal_config['default_theme']);
        $themeObject = SugarThemeRegistry::current();
        $theme = $themeObject->__toString();
        $this->th->ss->assign("THEME", $theme);
        //end taras
   	}
	
	/**
     * Processes the request. Calls ListViewData process. Also assigns all lang strings, export links,
     * This is called from ListViewDisplay
     *    
     * @param file file Template file to use
     * @param data array from ListViewData
     * @param html_var string the corresponding html var in xtpl per row
     *
     */ 
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
            $this->displayColumns[$name]['width'] = round($this->displayColumns[$name]['width'] / $adjustment, 2);
            // figure out which contextMenu objectsTypes are required
            if(!empty($params['contextMenu']['objectType']))
                $contextMenuObjectsTypes[$params['contextMenu']['objectType']] = true;
        }
		$this->th->ss->assign('displayColumns', $this->displayColumns);
		$this->th->ss->assign('bgHilite', $hilite_bg);
		$this->th->ss->assign('colCount', count($this->displayColumns) + 1);
		$this->th->ss->assign('htmlVar', strtoupper($htmlVar));
		$this->th->ss->assign('moduleString', $this->moduleString);
        $this->th->ss->assign('editLinkString', $GLOBALS['app_strings']['LBL_EDIT_BUTTON']);
        $this->th->ss->assign('viewLinkString', $GLOBALS['app_strings']['LBL_VIEW_BUTTON']);
        
        //rrs
        $this->searchForm->parsedView = 'popup_query_form';
        $this->searchForm->displayType = 'popupView';
		$this->th->ss->assign('searchForm', $this->searchForm->display(false));
        //rrs

		if($this->overlib) $this->th->ss->assign('overlib', true);
		if($this->export) $this->th->ss->assign('exportLink', $this->buildExportLink());
		$this->th->ss->assign('quickViewLinks', $this->quickViewLinks);
		if($this->mailMerge) $this->th->ss->assign('mergeLink', $this->buildMergeLink()); // still check for mailmerge access
        if($this->mergeduplicates) $this->th->ss->assign('mergedupLink', $this->buildMergeDuplicatesLink());
        

		if (!empty($_REQUEST['mode']) && strtoupper($_REQUEST['mode']) == 'MULTISELECT') {
			$this->multiSelect = true;
		}
		// handle save checks and stuff
		if($this->multiSelect) {
			$this->th->ss->assign('selectedObjectsSpan', $this->buildSelectedObjectsSpan());
			$this->th->ss->assign('multiSelectData', $this->getMultiSelectData());
			$this->th->ss->assign('MODE', "<input type='hidden' name='mode' value='MultiSelect'>");
		}
		
		$this->processArrows($data['pageData']['ordering']);
		$this->th->ss->assign('prerow', $this->multiSelect);
		$this->th->ss->assign('clearAll', $GLOBALS['app_strings']['LBL_CLEARALL']);
		$this->th->ss->assign('rowColor', array('oddListRow', 'evenListRow'));
		$this->th->ss->assign('bgColor', array($odd_bg, $even_bg));
        $this->th->ss->assign('contextMenus', $this->contextMenus);
        

        if($this->contextMenus && !empty($contextMenuObjectsTypes)) {
            $script = '';
            $cm = new contextMenu();
            foreach($contextMenuObjectsTypes as $type => $value) {
                $cm->loadFromFile($type);
                $script .= $cm->getScript();
                $cm->menuItems = array(); // clear menuItems out
            }
            $this->th->ss->assign('contextMenuScript', $script);
        }
        
        //rrs
        $this->_build_field_defs();
	}
	
	/*
	 * Display the Smarty template.  Here we are using the TemplateHandler for caching per the module.
	 */
	function display($end = true) {
		if(!$this->should_process) return $GLOBALS['app_strings']['LBL_SEARCH_POPULATE_ONLY'];
        global $app_strings;
              
        if(!is_file($GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $GLOBALS['current_language'] . '.js')) {
            require_once('include/language/jsLanguage.php');
            jsLanguage::createAppStringsCache($GLOBALS['current_language']);
        }
        $jsLang = '<script type="text/javascript" src="' . $GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $GLOBALS['current_language'] . '.js?s=' . $GLOBALS['sugar_version'] . '&c=' . $GLOBALS['sugar_config']['js_custom_version'] . '&j=' . $GLOBALS['sugar_config']['js_lang_version'] . '"></script>';

        $this->th->ss->assign('data', $this->data['data']);
		$this->data['pageData']['offsets']['lastOffsetOnPage'] = $this->data['pageData']['offsets']['current'] + count($this->data['data']);
		$this->th->ss->assign('pageData', $this->data['pageData']);

        $navStrings = array('next' => $GLOBALS['app_strings']['LNK_LIST_NEXT'],
                            'previous' => $GLOBALS['app_strings']['LNK_LIST_PREVIOUS'],
                            'end' => $GLOBALS['app_strings']['LNK_LIST_END'],
                            'start' => $GLOBALS['app_strings']['LNK_LIST_START'],
                            'of' => $GLOBALS['app_strings']['LBL_LIST_OF']);
        $this->th->ss->assign('navStrings', $navStrings);
		
		
		$associated_row_data = array();
		foreach($this->data['data'] as $val){
			$associated_row_data[$val['ID']] = $val;
		}
		$json = getJSONobj();
		$this->th->ss->assign('jsLang', $jsLang);
		$this->th->ss->assign('headerTpl', 'iportal/include/Popups/tpls/header.tpl');
        $this->th->ss->assign('footerTpl', 'iportal/include/Popups/tpls/footer.tpl');
        $this->th->ss->assign('ASSOCIATED_JAVASCRIPT_DATA', 'var associated_javascript_data = '.$json->encode($associated_row_data)). ";\n";
		$this->th->ss->assign('module', $this->seed->module_dir);
		$request_data = empty($_REQUEST['request_data']) ? '' : $_REQUEST['request_data'];
		$this->th->ss->assign('request_data', $request_data);
		$this->th->ss->assign('fields', $this->fieldDefs);
		$this->th->ss->assign('formData', $this->formData);
		$this->th->ss->assign('APP', $GLOBALS['app_strings']);
		$this->th->ss->assign('MOD', $GLOBALS['mod_strings']);
		$this->th->ss->assign('popupMeta', $this->_popupMeta);
        $this->th->ss->assign('current_query', base64_encode(serialize($_REQUEST)));
		$this->th->ss->assign('customFields', $this->customFieldDefs);
		$this->th->ss->assign('numCols', NUM_COLS);
		$this->th->ss->assign('massUpdateData', $this->massUpdateData);
		$this->th->ss->assign('jsCustomVersion', $GLOBALS['sugar_config']['js_custom_version']);
		$this->th->ss->assign('sugarVersion', $GLOBALS['sugar_version']);

		if(isset($this->_popupMeta)){
			require_once('modules/' . $this->seed->module_dir . '/' . $this->_popupMeta['moduleMain'] . '.php');
			if(isset($this->_popupMeta['create']['formBase'])) {
			  //taras include the iportal formbase.php
			    $tFile= 'iportal/modules/' . $this->seed->module_dir . '/' . $this->_popupMeta['create']['formBase'];
			    if (file_exists($tFile)) {
			      require_once($tFile);
			    }
              //end taras
                else require_once('modules/' . $this->seed->module_dir . '/' . $this->_popupMeta['create']['formBase']);
				$this->_create = true;
			}
		}

        //echo $this->_getAddForm();

		if($this->_create){

			$this->th->ss->assign('ADDFORM', $this->_getAddForm());
			$this->th->ss->assign('ADDFORMHEADER', $this->_getAddFormHeader());
			$this->th->ss->assign('object_name', $this->seed->object_name);
		}
		$this->th->ss->assign('LIST_HEADER', get_form_header($GLOBALS['mod_strings']['LBL_LIST_FORM_TITLE'], '', false));
		$this->th->ss->assign('SEARCH_FORM_HEADER', get_form_header($GLOBALS['mod_strings']['LBL_SEARCH_FORM_TITLE'], '', false));
		$str = $this->th->displayTemplate($this->seed->module_dir, $this->view, $this->tpl);
		return $str;
	}
	
	/*
	 * Setup up the smarty template. we added an extra step here to add the order by from the popupdefs.
	 */
	function setup($file) {

		$params = array();
		if(!empty($this->_popupMeta['orderBy'])){
			$params['orderBy'] = $this->_popupMeta['orderBy'];
		}
		
		if(file_exists('iportal/modules/'.$this->module.'/metadata/metafiles.php')) {
			require_once('iportal/modules/'.$this->module.'/metadata/metafiles.php');
		}
		else if(file_exists('custom/modules/'.$this->module.'/metadata/metafiles.php')){
			require('custom/modules/'.$this->module.'/metadata/metafiles.php');	
		}elseif(file_exists('modules/'.$this->module.'/metadata/metafiles.php')){
			require('modules/'.$this->module.'/metadata/metafiles.php');
		}

		if(!empty($metafiles[$this->module]['searchfields'])) {
			require($metafiles[$this->module]['searchfields']);
		} elseif(file_exists('modules/'.$this->module.'/metadata/SearchFields.php')) {
			require('modules/'.$this->module.'/metadata/SearchFields.php');
	    }
        $this->searchdefs[$this->module]['templateMeta']['maxColumns'] = 2;
        $this->searchdefs[$this->module]['templateMeta']['widths']['label'] = 10;
        $this->searchdefs[$this->module]['templateMeta']['widths']['field'] = 30;

        $this->searchForm->view = 'PopupSearchForm';
		$this->searchForm->setup($this->searchdefs, $searchFields, 'include/SearchForm/tpls/SearchFormGenericAdvanced.tpl', 'advanced_search', $this->listviewdefs);
		
		$lv = new ListViewSmarty();
		$displayColumns = array();
		if(!empty($_REQUEST['displayColumns'])) {
		    foreach(explode('|', $_REQUEST['displayColumns']) as $num => $col) {
		        if(!empty($listViewDefs[$this->module][$col])) 
		            $displayColumns[$col] = $this->listviewdefs[$this->module][$col];
		    }    
		}
		else {
		    foreach($this->listviewdefs[$this->module] as $col => $para) {
		        if(!empty($para['default']) && $para['default'])
		            $displayColumns[$col] = $para;
		    }
		} 
		$params['massupdate'] = true;
		if(!empty($_REQUEST['orderBy'])) {
		    $params['orderBy'] = $_REQUEST['orderBy'];
		    $params['overrideOrder'] = true;
		    if(!empty($_REQUEST['sortOrder'])) $params['sortOrder'] = $_REQUEST['sortOrder'];
		}
		
		$lv->displayColumns = $displayColumns;
        $this->searchForm->lv = $lv;
        $this->searchForm->displaySavedSearch = false;

        $this->searchForm->populateFromRequest('advanced_search');
        $searchWhere = $this->_get_where_clause();
        $this->searchColumns = $this->searchForm->searchColumns;
		parent::setup($this->seed, $file, $searchWhere, $params, 0, -1, $this->filter_fields);
	}
	
	/*
	 * Return the where clause as per the REQUEST. 
	 */
	function _get_where_clause()
	{
		$where = '';
		$where_clauses = $this->searchForm->generateSearchWhere(true, $this->seed->module_dir);
		if (count($where_clauses) > 0 )$where= implode(' and ', $where_clauses);
		return $where;
	}
	
	/*
	 * Generate the data for the search form on the header of the Popup.
	 */
		function _build_field_defs(){
		$this->formData = array();
		$this->customFieldDefs = array();
		foreach($this->searchdefs[$this->module]['layout']['advanced_search'] as $data){
			if(is_array($data)){
				
				$this->formData[] = array('field' => $data);
				$value = '';
				$this->customFieldDefs[$data['name']]= $data;
				if(!empty($_REQUEST[$data['name']]))
	            	$value = $_REQUEST[$data['name']];
	            $this->customFieldDefs[$data['name']]['value'] = $value;
			}else
				$this->formData[] = array('field' => array('name'=>$data));
		}
		$this->fieldDefs = array();
		if($this->seed){
			$this->seed->fill_in_additional_detail_fields();
			
	        foreach($this->seed->toArray() as $name => $value) {
	            $this->fieldDefs[$name] = $this->seed->field_defs[$name];
	            //if we have a relate type then reset to name so that we end up with a textbox
	            //rather than a select button
	            $this->fieldDefs[$name]['name'] = $this->fieldDefs[$name]['name'];
	            if($this->fieldDefs[$name]['type'] == 'relate')
	            	$this->fieldDefs[$name]['type'] = 'name';
	            if(isset($this->fieldDefs[$name]['options']) && isset($GLOBALS['app_list_strings'][$this->fieldDefs[$name]['options']])) {
	                $this->fieldDefs[$name]['options'] = $GLOBALS['app_list_strings'][$this->fieldDefs[$name]['options']]; // fill in enums
	            }
	            if(!empty($_REQUEST[$name]))
	            	$value = $_REQUEST[$name];
	            $this->fieldDefs[$name]['value'] = $value;
	        }
		}
	}
	
	function _getAddForm(){
		$addform = '';
        if(!$this->seed->ACLAccess('save')){
            return;
        }
		if(!empty($this->_popupMeta['create'])){
			$formBase = new $this->_popupMeta['create']['formBaseClass']();
			if(isset($_REQUEST['doAction']) && $_REQUEST['doAction'] == 'save')
			{
				$formBase->handleSave('', false, true);
			}


		
				// TODO: cleanup the construction of $addform
				$prefix = empty($this->_popupMeta['create']['getFormBodyParams'][0]) ? '' : $this->_popupMeta['create']['getFormBodyParams'][0];
				$mod = empty($this->_popupMeta['create']['getFormBodyParams'][1]) ? '' : $this->_popupMeta['create']['getFormBodyParams'][1];
				$formBody = empty($this->_popupMeta['create']['getFormBodyParams'][2]) ? '' : $this->_popupMeta['create']['getFormBodyParams'][2];
				
				$getFormMethod = (empty($this->_popupMeta['create']['getFormMethod']) ? 'getFormBody' : $this->_popupMeta['create']['getFormMethod']);  
				$formbody = $formBase->$getFormMethod($prefix, $mod, $formBody);

     			$addform = '<table><tr><td nowrap="nowrap" valign="top">'
					. str_replace('<br>', '</td><td nowrap="nowrap" valign="top">&nbsp;', $formbody)
					. '</td></tr></table>'
					. '<input type="hidden" name="action" value="Popup" />';

			return $addform;
		}
	}
	
	function _getAddFormHeader(){
		$lbl_save_button_title = $GLOBALS['app_strings']['LBL_SAVE_BUTTON_TITLE'];
		$lbl_save_button_key = $GLOBALS['app_strings']['LBL_SAVE_BUTTON_KEY'];
		$lbl_save_button_label = $GLOBALS['app_strings']['LBL_SAVE_BUTTON_LABEL'];
		$module_dir = $this->seed->module_dir;
$formSave = <<<EOQ
			<input type="hidden" name="create" value="true">
			<input type="hidden" name="popup" value="true">
			<input type="hidden" name="to_pdf" value="true">
			<input type="hidden" name="return_module" value="$module_dir">
			<input type="hidden" name="return_action" value="Popup">
			<input type="submit" name="button" class="button" title="$lbl_save_button_title" accesskey="$lbl_save_button_key" value="  $lbl_save_button_label  " />
			<input type="button" name="button" class="button" title="{$GLOBALS['app_strings']['LBL_CANCEL_BUTTON_TITLE']}" accesskey="{$GLOBALS['app_strings']['LBL_CANCEL_BUTTON_KEY']}" value="{$GLOBALS['app_strings']['LBL_CANCEL_BUTTON_LABEL']}" onclick="toggleDisplay('addform');" />
EOQ;
			// if metadata contains custom inputs for the quickcreate 
			if(!empty($this->_popupMeta['customInput']) && is_array($this->_popupMeta['customInput'])) {
				foreach($this->_popupMeta['customInput'] as $key => $value)
					$formSave .= '<input type="hidden" name="' . $key . '" value="'. $value .'">\n';				
			}


			$addformheader = get_form_header($this->_popupMeta['create']['createButton'], $formSave, false);
			return $addformheader;
	}
}
?>
