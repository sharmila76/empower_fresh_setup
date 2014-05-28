<?php

require_once('iportal/include/IportalEditView/IportalEditView2.php');
require_once('iportal/include/IportalEditView/IportalVCR.php');

class IportalEditView extends IportalEditView2 {

    var $th;
    var $tpl;
    var $notes;
    var $id;
    var $metadataFile;
    var $headerTpl;
    var $footerTpl;
    var $returnAction;
    var $returnModule;
    var $returnId;
    var $isDuplicate;
    var $focus;
    var $module;
    var $fieldDefs;
    var $sectionPanels;
    var $view = 'IportalEditView';
    var $formatFields = true;
    var $showDetailData = true;
    var $showVCRControl = true;
    var $quickSearchCode;
    var $ss;
    var $offset = 0;
    var $populateBean = true;
    var $moduleTitleKey;
    
    function setup($module, $focus = null, $metadataFile = null, $tpl = 'iportal/include/IportalEditView/EditView.tpl') {


        $this->th = new TemplateHandler();
        $this->th->ss =& $this->ss;
        $this->tpl = $tpl;
        $this->module = $module;
        $this->focus = $focus;
        $this->createFocus();
        if(empty($GLOBALS['sugar_config']['showDetailData'])) {
        	$this->showDetailData = false;
        }
        $this->metadataFile = $metadataFile;

        if(!empty($sugar_config['disable_vcr'])) {
           $this->showVCRControl = $sugar_config['disable_vcr'];
        }
        if(!empty($this->metadataFile) && file_exists($this->metadataFile)){
        	require_once($this->metadataFile);
        }else {
        	//If file doesn't exist we create a best guess
        	if(!file_exists("modules/$this->module/metadata/editviewdefs.php") &&
        	    file_exists("modules/$this->module/EditView.html")) {
        	    require_once('include/SugarFields/Parsers/EditViewMetaParser.php');
                global $dictionary;
        	    $htmlFile = "modules/" . $this->module . "/EditView.html";
        	    $parser = new EditViewMetaParser();
        	    if(!file_exists('modules/'.$this->module.'/metadata')) {
        	       sugar_mkdir('modules/'.$this->module.'/metadata');
        	    }
        	   	$fp = sugar_fopen('modules/'.$this->module.'/metadata/editviewdefs.php', 'w');
        	    fwrite($fp, $parser->parse($htmlFile, $dictionary[$focus->object_name]['fields'], $this->module));
        	    fclose($fp);
        	}

        	//Flag an error... we couldn't create the best guess meta-data file
        	if(!file_exists("modules/$this->module/metadata/editviewdefs.php")) {
        	   global $app_strings;
        	   $error = str_replace("[file]", "modules/$this->module/metadata/editviewdefs.php", $app_strings['ERR_CANNOT_CREATE_METADATA_FILE']);
        	   $GLOBALS['log']->fatal($error);
        	   echo $error;
        	   die();
        	}
            require_once("modules/$this->module/metadata/editviewdefs.php");
        }

        //$this->defs = $viewdefs[$this->module][$this->view];
        $this->defs = $viewdefs[$this->module]['EditView'];
        $this->isDuplicate = isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true' && $this->focus->aclAccess('edit');
    }
    
    
	function process($checkFormName = false, $formName = '') {
		parent::process($checkFormName, $formName);
        if($this->showVCRControl) {
        	$this->th->ss->assign('PAGINATION', IportalVCR::menu($this->module, $this->offset, $this->focus->is_AuditEnabled(), ($this->view == 'EditView')));
        } //if
    }
    
    function display($showTitle = true, $ajaxSave = false) {
        global $mod_strings, $sugar_config, $app_strings, $app_list_strings, $theme, $current_user;


        if(isset($this->defs['templateMeta']['javascript'])) {
           if(is_array($this->defs['templateMeta']['javascript'])) {
           	 $this->th->ss->assign('externalJSFile', 'modules/' . $this->module . '/metadata/editvewdefs.js');
           } else {
             $this->th->ss->assign('scriptBlocks', $this->defs['templateMeta']['javascript']);
           }
        }

        $this->th->ss->assign('id', $this->fieldDefs['id']['value']);
        $this->th->ss->assign('offset', $this->offset + 1);
        $this->th->ss->assign('APP', $app_strings);
        $this->th->ss->assign('MOD', $mod_strings);
        $this->th->ss->assign('fields', $this->fieldDefs);
        //_pp($this->fieldDefs);
        $this->th->ss->assign('sectionPanels', $this->sectionPanels);
        $this->th->ss->assign('returnModule', $this->returnModule);
        $this->th->ss->assign('returnAction', $this->returnAction);
        $this->th->ss->assign('returnId', $this->returnId);
        $this->th->ss->assign('isDuplicate', $this->isDuplicate);
        $this->th->ss->assign('def', $this->defs);
        $this->th->ss->assign('maxColumns', isset($this->defs['templateMeta']['maxColumns']) ? $this->defs['templateMeta']['maxColumns'] : 2);
        $this->th->ss->assign('module', $this->module);

        $this->th->ss->assign('headerTpl', isset($this->defs['templateMeta']['form']['headerTpl']) ? $this->defs['templateMeta']['form']['headerTpl'] : 'iportal/include/' . $this->view . '/header.tpl');
        $this->th->ss->assign('footerTpl', isset($this->defs['templateMeta']['form']['footerTpl']) ? $this->defs['templateMeta']['form']['footerTpl'] : 'iportal/include/' . $this->view . '/footer.tpl');
        $this->th->ss->assign('current_user', $current_user);
        $this->th->ss->assign('bean', $this->focus);
        $this->th->ss->assign('isAuditEnabled', $this->focus->is_AuditEnabled());
        $this->th->ss->assign('gridline',$current_user->getPreference('gridline') == 'on' ? '1' : '0');

        global $js_custom_version;
        global $sugar_version;
        $this->th->ss->assign('SUGAR_VERSION', $sugar_version);
        $this->th->ss->assign('JS_CUSTOM_VERSION', $js_custom_version);

        //this is used for multiple forms on one page
        $form_id = $this->view;
        $form_name = $this->view;
        if($ajaxSave){
        	$form_id = 'form_'.$this->view .'_'.$this->module;
        	$form_name = $form_id;
        	$this->view = $form_name;
        	//$this->defs['templateMeta']['form']['buttons'] = array();
        	//$this->defs['templateMeta']['form']['buttons']['ajax_save'] = array('id' => 'AjaxSave', 'customCode'=>'<input type="button" class="button" value="Save" onclick="this.form.action.value=\'AjaxFormSave\';return saveForm(\''.$form_name.'\', \'multiedit_form_{$module}\', \'Saving {$module}...\');"/>');
        }
        
		$form_name = $form_name == "QuickCreate" ? "QuickCreate_{$this->module}" : $form_name;
        $form_id = $form_id == "QuickCreate" ? "QuickCreate_{$this->module}" : $form_id;
		
        if(isset($this->defs['templateMeta']['preForm'])) {
          $this->th->ss->assign('preForm', $this->defs['templateMeta']['preForm']);
        } //if
        if(isset($this->defs['templateMeta']['form']['closeFormBeforeCustomButtons'])) {
          $this->th->ss->assign('closeFormBeforeCustomButtons', $this->defs['templateMeta']['form']['closeFormBeforeCustomButtons']);
        }
        if(isset($this->defs['templateMeta']['form']['enctype'])) {
          $this->th->ss->assign('enctype', 'enctype="'.$this->defs['templateMeta']['form']['enctype'].'"');
        }
        $this->th->ss->assign('showDetailData', $this->showDetailData);
        $this->th->ss->assign('form_id', $form_id);
        $this->th->ss->assign('form_name', $form_name);
  		$this->th->ss->assign('set_focus_block', get_set_focus_js());
        $this->th->ss->assign('form', isset($this->defs['templateMeta']['form']) ? $this->defs['templateMeta']['form'] : null);
        $this->th->ss->assign('includes', isset($this->defs['templateMeta']['includes']) ? $this->defs['templateMeta']['includes'] : null);
		$this->th->ss->assign('view', $this->view);

        $admin = new Administration();
        $admin->retrieveSettings();
        if(isset($admin->settings['portal_on']) && $admin->settings['portal_on']) {
           $this->th->ss->assign("PORTAL_ENABLED", true);
        } else {
           $this->th->ss->assign("PORTABL_ENABLED", false);
        }


        //Calculate time & date formatting (may need to calculate this depending on a setting)
        global $timedate;
        $this->th->ss->assign('CALENDAR_DATEFORMAT', $timedate->get_cal_date_format());
        $this->th->ss->assign('USER_DATEFORMAT', $timedate->get_user_date_format());
        $time_format = $timedate->get_user_time_format();
        $this->th->ss->assign('TIME_FORMAT', $time_format);

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

		$seps = get_number_seperators();
		$this->th->ss->assign('NUM_GRP_SEP', $seps[0]);
		$this->th->ss->assign('DEC_SEP', $seps[1]);
        $this->th->ss->assign('SHOW_VCR_CONTROL', $this->showVCRControl);

        //$str='';

        $str = $this->showTitle($showTitle);

        //Use the output filter to trim the whitespace
        $this->th->ss->load_filter('output', 'trimwhitespace');
        $str .= $this->th->displayTemplate($this->module, $this->view, $this->tpl, $ajaxSave, $this->defs);
		return $str;
    }

    public function getModuleTitle(
        $module, 
        $module_title, 
        $show_help
        )
    {
        global $sugar_version, $sugar_flavor, $server_unique_key, $current_language, $action;
        global $app_strings;
        
        $the_title = "<div class='moduleTitle'>\n<h2>";
        $module = preg_replace("/ /","",$module);
        if (is_file(SugarThemeRegistry::current()->getImageURL($module.'.gif'))) {
            $the_title .= "<img src='".SugarThemeRegistry::current()->getImageURL($module.'.gif')."' alt='".$module."'>&nbsp;";
        }
        $the_title .= $module_title."</h2>\n";
        
        if ($show_help) {
           $the_title .= "<span>";
            if (isset($_REQUEST['action']) && $_REQUEST['action'] != "EditView") {
                $printImageURL = SugarThemeRegistry::current()->getImageURL('print.gif');
                $the_title .= <<<EOHTML
<a href="javascript:void window.open('iportal.php?{$GLOBALS['request_string']}','printwin','menubar=1,status=0,resizable=1,scrollbars=1,toolbar=0,location=1')" class='utilsLink'>
<img src="{$printImageURL}" alt="{$app_strings['LNK_PRINT']}"></a>
<a href="javascript:void window.open('iportal.php?{$GLOBALS['request_string']}','printwin','menubar=1,status=0,resizable=1,scrollbars=1,toolbar=0,location=1')" class='utilsLink'>
{$app_strings['LNK_PRINT']}
</a>
EOHTML;
            }
            $helpImageURL = SugarThemeRegistry::current()->getImageURL('help.gif');
            $the_title .= <<<EOHTML
&nbsp;
<a href="iportal.php?module=Administration&action=SupportPortal&view=documentation&version={$sugar_version}&edition={$sugar_flavor}&lang={$current_language}&help_module={$module}&help_action={$action}&key={$server_unique_key}" class="utilsLink" target="_blank">
<img src='{$helpImageURL}' alt='{$app_strings['LNK_HELP']}'></a>
<a href="iportal.php?module=Administration&action=SupportPortal&view=documentation&version={$sugar_version}&edition={$sugar_flavor}&lang={$current_language}&help_module={$module}&help_action={$action}&key={$server_unique_key}" class="utilsLink" target="_blank">
{$app_strings['LNK_HELP']}
</a>
EOHTML;
        }
        
        $the_title .= "</span></div>\n";
        
        return $the_title;
    
    }
}
?>