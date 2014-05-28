<?php
require_once('iportal/include/MVC/View/IportalView.php');
require_once('iportal/include/IportalListView/IportalListViewSmarty.php');
require_once('modules/MySettings/StoreQuery.php');
class ViewList extends IportalView{
	var $type ='list';
	var $lv;
	var $searchForm;
	var $use_old_search;
	var $headers;
	var $seed;
	var $params;
	var $listViewDefs;
	var $storeQuery;
	var $where = '';
	
	
 	function ViewList(){
 		parent::SugarView();
 	}

 	
 	function oldSearch(){
 		
 	}
 	function newSearch(){
 		
 	}

 	function listViewPrepare(){
 		$module = $GLOBALS['module'];
        $metadataFile = null;
        $foundViewDefs = false;
 		if(file_exists('iportal/modules/' . $module. '/metadata/listviewdefs.php')){
            $metadataFile = 'iportal/modules/' . $module . '/metadata/listviewdefs.php';
            $foundViewDefs = true;
        }
        elseif(file_exists('custom/modules/' . $module. '/metadata/listviewdefs.php')){
            $metadataFile = 'custom/modules/' . $module . '/metadata/listviewdefs.php';
            $foundViewDefs = true;
        }
        else{
            if(file_exists('custom/modules/'.$module.'/metadata/metafiles.php')){
                require_once('custom/modules/'.$module.'/metadata/metafiles.php');
                if(!empty($metafiles[$module]['listviewdefs'])){
                    $metadataFile = $metafiles[$module]['listviewdefs'];
                    $foundViewDefs = true;
                }
            }
            elseif(file_exists('modules/'.$module.'/metadata/metafiles.php')){
                require_once('modules/'.$module.'/metadata/metafiles.php');
                if(!empty($metafiles[$module]['listviewdefs'])){
                    $metadataFile = $metafiles[$module]['listviewdefs'];
                    $foundViewDefs = true;
                }
            }
        }
        if(!$foundViewDefs && file_exists('modules/'.$module.'/metadata/listviewdefs.php')){
                $metadataFile = 'modules/'.$module.'/metadata/listviewdefs.php';
        }
        require_once($metadataFile);
        $this->listViewDefs = $listViewDefs;

        if($this->bean->bean_implements('ACL')) 
        ACLField::listFilter($this->listViewDefs[$module],$module, $GLOBALS['current_user']->id ,true);


        if(!empty($this->bean->object_name) && isset($_REQUEST[$module.'2_'.strtoupper($this->bean->object_name).'_offset'])) {//if you click the pagination button, it will poplate the search criteria here
            if(!empty($_REQUEST['current_query_by_page'])) {//The code support multi browser tabs pagination
                $blockVariables = array('mass', 'uid', 'massupdate', 'delete', 'merge', 'selectCount', 'request_data', 'current_query_by_page',$module.'2_'.strtoupper($this->bean->object_name).'_ORDER_BY' );
                if(isset($_REQUEST['lvso'])){
                	$blockVariables[] = 'lvso';
                }
                $current_query_by_page = unserialize(base64_decode($_REQUEST['current_query_by_page']));
                foreach($current_query_by_page as $search_key=>$search_value) {
                    if($search_key != $module.'2_'.strtoupper($this->bean->object_name).'_offset' && !in_array($search_key, $blockVariables)) {
						if (!is_array($search_value)) {
                        	$_REQUEST[$search_key] = $GLOBALS['db']->quoteForEmail($search_value);
						}
                        else {
                    		foreach ($search_value as $key=>&$val) {
                    			$val = $GLOBALS['db']->quoteForEmail($val);
                    		}
                    		$_REQUEST[$search_key] = $search_value;
                        }                        
                    }
                }
            }
        }
        
        if(!empty($_REQUEST['saved_search_select']) && $_REQUEST['saved_search_select']!='_none') {
            if(empty($_REQUEST['button']) && (empty($_REQUEST['clear_query']) || $_REQUEST['clear_query']!='true')) {
                $this->saved_search = loadBean('SavedSearch');
                $this->saved_search->retrieveSavedSearch($_REQUEST['saved_search_select']);
                $this->saved_search->populateRequest();
            }
            elseif(!empty($_REQUEST['button'])) { // click the search button, after retrieving from saved_search
                $_SESSION['LastSavedView'][$_REQUEST['module']] = '';
                unset($_REQUEST['saved_search_select']);
                unset($_REQUEST['saved_search_select_name']);
            }
        }
        $this->storeQuery = new StoreQuery();
        if(!isset($_REQUEST['query'])){
            $this->storeQuery->loadQuery($this->module);
            $this->storeQuery->populateRequest();
        }else{
            $this->storeQuery->saveFromRequest($this->module);
        }
        
        $this->seed = $this->bean;
        
        $displayColumns = array();
        if(!empty($_REQUEST['displayColumns'])) {
            foreach(explode('|', $_REQUEST['displayColumns']) as $num => $col) {
                if(!empty($this->listViewDefs[$module][$col])) 
                    $displayColumns[$col] = $this->listViewDefs[$module][$col];
            }    
        }
        else {
            foreach($this->listViewDefs[$module] as $col => $this->params) {
                if(!empty($this->params['default']) && $this->params['default'])
                    $displayColumns[$col] = $this->params;
            }
        } 
        //LAMPADA TK - We don't want mass update on portal
        $this->params = array('massupdate' => true);
        //$this->params = array('massupdate' => false, 'export' => false);
        if(!empty($_REQUEST['orderBy'])) {
            $this->params['orderBy'] = $_REQUEST['orderBy'];
            $this->params['overrideOrder'] = true;
            if(!empty($_REQUEST['sortOrder'])) $this->params['sortOrder'] = $_REQUEST['sortOrder'];
        }
        $this->lv->displayColumns = $displayColumns;

        $this->seed = $this->seed;
        $this->module = $module;
        
        $this->prepareSearchForm();
        
 	}
 	
 	function listViewProcess(){
		$this->processSearchForm();
		$this->lv->searchColumns = $this->searchForm->searchColumns;

		if(!$this->headers)
			return;
		if(empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false){
			//LAMPADA TK - set to iportal custom template
			//$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where, $this->params);
			$this->lv->setup($this->seed, 'iportal/include/IportalListView/ListViewGeneric.tpl', $this->where, $this->params);
			$savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);

			//echo get_form_header($GLOBALS['mod_strings']['LBL_LIST_FORM_TITLE'] . $savedSearchName, '', false);
            echo get_form_header(translate('LBL_LIST_FORM_TITLE', $this->module) . $savedSearchName, '', false); //taras FIXED LIST TITLE
			echo $this->lv->display();
		}
 	}
function prepareSearchForm(){
 	$this->searchForm = null;
    
        //search
        $view = 'basic_search';
        if(!empty($_REQUEST['search_form_view']) && $_REQUEST['search_form_view'] == 'advanced_search')
            $view = $_REQUEST['search_form_view'];
        $this->headers = true;
        if(!empty($_REQUEST['search_form_only']) && $_REQUEST['search_form_only'])
            $this->headers = false;
        elseif(!isset($_REQUEST['search_form']) || $_REQUEST['search_form'] != 'false') {
            if(isset($_REQUEST['searchFormTab']) && $_REQUEST['searchFormTab'] == 'advanced_search') {
                $view = 'advanced_search';
            }else {
                $view = 'basic_search';
            }
        }
        
        $this->use_old_search = true;
        if(file_exists('modules/'.$this->module.'/SearchForm.html')){
            require_once('iportal/include/SearchForm/IportalSearchForm.php');
            $this->searchForm = new IportalSearchForm($this->module, $this->seed);
        }else{
            $this->use_old_search = false;
            require_once('iportal/include/SearchForm/IportalSearchForm2.php');
            
         	if (file_exists('iportal/modules/'.$this->module.'/metadata/searchdefs.php'))
            {
                require_once('iportal/modules/'.$this->module.'/metadata/searchdefs.php');
            }
            elseif (file_exists('custom/modules/'.$this->module.'/metadata/searchdefs.php'))
            {
                require_once('custom/modules/'.$this->module.'/metadata/searchdefs.php');
            }
            elseif (!empty($metafiles[$this->module]['searchdefs']))
            {
                require_once($metafiles[$this->module]['searchdefs']);
            }
            elseif (file_exists('modules/'.$this->module.'/metadata/searchdefs.php'))
            {
                require_once('modules/'.$this->module.'/metadata/searchdefs.php');
            }
                
                
            if(!empty($metafiles[$this->module]['searchfields']))
                require_once($metafiles[$this->module]['searchfields']);
            elseif(file_exists('modules/'.$this->module.'/metadata/SearchFields.php'))
                require_once('modules/'.$this->module.'/metadata/SearchFields.php');
                
        
            $this->searchForm = new IportalSearchForm($this->seed, $this->module, $this->action);
            $this->searchForm->setup($searchdefs, $searchFields, 'iportal/include/SearchForm/tpls/SearchFormGeneric.tpl', $view, $this->listViewDefs);
            $this->searchForm->lv = $this->lv;
        }
 	}
 	function processSearchForm(){
 	    if(isset($_REQUEST['query']))
        {
            // we have a query
            if(!empty($_SERVER['HTTP_REFERER']) && preg_match('/action=EditView/', $_SERVER['HTTP_REFERER'])) { // from EditView cancel
                //$this->searchForm->populateFromArray($this->storeQuery->query);
            }
            else {
                $this->searchForm->populateFromRequest();
            }   

            $where_clauses = $this->searchForm->generateSearchWhere(true, $this->seed->module_dir);

            if (count($where_clauses) > 0 )$this->where = '('. implode(' ) AND ( ', $where_clauses) . ')';
            $GLOBALS['log']->info("List View Where Clause: $this->where");
        }
        if($this->use_old_search){
            switch($view) {
                case 'basic_search':
                    $this->searchForm->setup();
                    $this->searchForm->displayBasic($this->headers);
                    break;
                 case 'advanced_search':
                    $this->searchForm->setup();
                    $this->searchForm->displayAdvanced($this->headers);
                    break;
                 case 'saved_views':
                    echo $this->searchForm->displaySavedViews($this->listViewDefs, $this->lv, $this->headers);
                   break;
            }
        }else{
            echo $this->searchForm->display($this->headers);
        }
 	}
 	function preDisplay(){
 	    $this->lv = new IportalListViewSmarty();
 	}
 	function display(){
 	 	if(!$this->bean || !$this->bean->ACLAccess('list')){
            ACLController::displayNoAccess();
        } else {	
 	        $this->listViewPrepare();
 	        $this->listViewProcess();
        }
 	}
}
?>
