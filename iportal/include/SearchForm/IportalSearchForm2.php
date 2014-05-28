<?php

require_once("include/SearchForm/SearchForm2.php");

class IportalSearchForm extends SearchForm {
	
	var $displaySavedSearch = false;
    var $showSavedSearchesOptions = false;
    var $view = 'IportalSearchForm';
		
	function IportalSearchForm($seed, $module, $action) {
		parent::SearchForm($seed, $module, $action);
	}
 	
 	function display($header = true){
    	global $theme, $timedate;
 		$header_txt = '';
 		$footer_txt = '';
 		$return_txt = '';
		$this->th->ss->assign('module', $this->module);
		$this->th->ss->assign('action', $this->action);

		ACLField::listFilter($this->fieldDefs, $this->module, $GLOBALS['current_user']->id, false, false, 1,false, true, '_'.$this->parsedView);

		$this->th->ss->assign('displayView', $this->displayView);
		$this->th->ss->assign('APP', $GLOBALS['app_strings']);
		//Show the tabs only if there is more than one
		if($this->nbTabs>1){
		    $this->th->ss->assign('TABS', $this->_displayTabs($this->module . '|' . $this->displayView));
		}

		$this->th->ss->assign('fields', $this->fieldDefs);
		$this->th->ss->assign('customFields', $this->customFieldDefs);
		$this->th->ss->assign('formData', $this->formData);
        $time_format = $timedate->get_user_time_format();
        $this->th->ss->assign('TIME_FORMAT', $time_format);
        $this->th->ss->assign('USER_DATEFORMAT', $timedate->get_user_date_format());

        $date_format = $timedate->get_cal_date_format();
        $time_separator = ":";
        if(preg_match('/\d+([^\d])\d+([^\d]*)/s', $time_format, $match)) {
           $time_separator = $match[1];
        }
        // Create Smarty variables for the Calendar picker widget
        $t23 = strpos($time_format, '23') !== false ? '%H' : '%I';
        if(!isset($match[2]) || $match[2] == '') {
          $this->th->ss->assign('CALENDAR_FORMAT', $date_format . ' ' . $t23 . $time_separator . "%M");
        } else {
          $pm = $match[2] == "pm" ? "%P" : "%p";
          $this->th->ss->assign('CALENDAR_FORMAT', $date_format . ' ' . $t23 . $time_separator . "%M" . $pm);
        }
        $this->th->ss->assign('TIME_SEPARATOR', $time_separator);

        //Show and hide the good tab form
        foreach($this->tabs as $tabkey=>$viewtab){
            $viewName=str_replace(array($this->module . '|','_search'),'',$viewtab['key']);
            if(strpos($this->view,$viewName)!==false){
                $this->tabs[$tabkey]['displayDiv']='';
                //if this is advanced tab, use form with saved search sub form built in
                if($viewName=='advanced'){
                    $this->tpl = 'include/SearchForm/tpls/SearchFormGenericAdvanced.tpl';
                    if ($this->action =='ListView') {
                        $this->th->ss->assign('DISPLAY_SEARCH_HELP', false);
                    }
                    $this->th->ss->assign('DISPLAY_SAVED_SEARCH', $this->displaySavedSearch);
                    $this->th->ss->assign('SAVED_SEARCH', $this->displaySavedSearch());
                    //this determines whether the saved search subform should be rendered open or not
                    if(isset($_REQUEST['showSSDIV']) && $_REQUEST['showSSDIV']=='yes'){
                        $this->th->ss->assign('SHOWSSDIV', 'yes');
                        $this->th->ss->assign('DISPLAYSS', '');
                    }else{
                        $this->th->ss->assign('SHOWSSDIV', 'no');
                        $this->th->ss->assign('DISPLAYSS', 'display:none');
                    }
                }
            }else{
                $this->tabs[$tabkey]['displayDiv']='display:none';
            }

        }

        $this->th->ss->assign('TAB_ARRAY', $this->tabs);

        $totalWidth = 0;
        if ( isset($this->searchdefs['templateMeta']['widths'])
                && isset($this->searchdefs['templateMeta']['maxColumns'])) {
            $totalWidth = ( $this->searchdefs['templateMeta']['widths']['label'] +
                                $this->searchdefs['templateMeta']['widths']['field'] ) *
                                $this->searchdefs['templateMeta']['maxColumns'];
            // redo the widths in case they are too big
            if ( $totalWidth > 100 ) {
                $resize = 100 / $totalWidth;
                $this->searchdefs['templateMeta']['widths']['label'] =
                    $this->searchdefs['templateMeta']['widths']['label'] * $resize;
                $this->searchdefs['templateMeta']['widths']['field'] =
                    $this->searchdefs['templateMeta']['widths']['field'] * $resize;
            }
        }
        $this->th->ss->assign('templateMeta', $this->searchdefs['templateMeta']);
        $this->th->ss->assign('HAS_ADVANCED_SEARCH', !empty($this->searchdefs['layout']['advanced_search'])); //taras check if isset ADVANCED_SEARCH

        $this->th->ss->assign('displayType', $this->displayType);
        // return the form of the shown tab only
        //$return_txt = $this->th->displayTemplate($this->seed->module_dir, 'SearchForm_'.$this->parsedView, $this->tpl);
         $return_txt = $this->th->displayTemplate($this->seed->module_dir, 'IportalSearchForm_'.$this->parsedView, $this->tpl);
        if($header){
			$this->th->ss->assign('return_txt', $return_txt);
			//$header_txt = $this->th->displayTemplate($this->seed->module_dir, 'SearchFormHeader', 'iportal/include/SearchForm/tpls/header.tpl');
			$header_txt = $this->th->displayTemplate($this->seed->module_dir, 'IportalSearchFormHeader', 'iportal/include/SearchForm/tpls/header.tpl');
            //pass in info to render the select dropdown below the form
            if($this->showSavedSearchesOptions){
                $this->th->ss->assign('SAVED_SEARCHES_OPTIONS', $this->displaySavedSearchSelect());
            }
            if ($this->module == 'Documents'){
            	$this->th->ss->assign('DOCUMENTS_MODULE', true);
            }
            //$footer_txt = $this->th->displayTemplate($this->seed->module_dir, 'SearchFormFooter', 'iportal/include/SearchForm/tpls/footer.tpl');
           	$footer_txt = $this->th->displayTemplate($this->seed->module_dir, 'IportalSearchFormFooter', 'iportal/include/SearchForm/tpls/footer.tpl');
			$return_txt = $header_txt.$footer_txt;
		}
		return $return_txt;
 	}
}
?>