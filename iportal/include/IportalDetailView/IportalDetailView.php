<?php

require_once('iportal/include/IportalEditView/IportalEditView.php');

class IportalDetailView extends IportalEditView {
    var $view = 'IportalDetailView';   
    
    function setup($module, $focus, $metadataFile = null, $tpl = 'iportal/include/IportalDetailView/DetailView.tpl') {    
      
        $this->th = new TemplateHandler();
        $this->th->ss =& $this->ss;
        $this->focus = $focus;
        $this->tpl = $tpl;  
        $this->module = $module;
        $this->metadataFile = $metadataFile;
        if(!empty($sugar_config['disable_vcr'])) {
           $this->showVCRControl = $sugar_config['disable_vcr'];	
        }
        if(!empty($this->metadataFile) && file_exists($this->metadataFile)){
        	require_once($this->metadataFile);
        }else {
        	//If file doesn't exist we create a best guess
        	if(!file_exists("modules/$this->module/metadata/detailviewdefs.php") &&
        	    file_exists("modules/$this->module/DetailView.html")) {   
                global $dictionary;
        	    $htmlFile = "modules/" . $this->module . "/DetailView.html";
        	    $parser = new DetailViewMetaParser();
        	    if(!file_exists('modules/'.$this->module.'/metadata')) {
        	       sugar_mkdir('modules/'.$this->module.'/metadata');	
        	    }
        	   	$fp = sugar_fopen('modules/'.$this->module.'/metadata/detailviewdefs.php', 'w');
        	    fwrite($fp, $parser->parse($htmlFile, $dictionary[$focus->object_name]['fields'], $this->module));
        	    fclose($fp);
        	}
        	
        	//Flag an error... we couldn't create the best guess meta-data file
        	if(!file_exists("modules/$this->module/metadata/detailviewdefs.php")) {
        	   global $app_strings;
        	   $error = str_replace("[file]", "modules/$this->module/metadata/detailviewdefs.php", $app_strings['ERR_CANNOT_CREATE_METADATA_FILE']);
        	   $GLOBALS['log']->fatal($error);
        	   echo $error;
        	   die();	
        	}
            require_once("modules/$this->module/metadata/detailviewdefs.php");
        }
   
        //$this->defs = $viewdefs[$this->module][$this->view];
        $this->defs = $viewdefs[$this->module]['DetailView'];
    }
    
}
?>
