<?php
require_once('iportal/include/IportalDetailView/IportalDetailView.php');

class ViewDetail extends IportalView{
	var $type ='detail';
	var $dv;
	
 	function ViewDetail(){
 		$this->options['show_subpanels'] = true;
 		parent::SugarView();
 	}

 	function preDisplay(){
 		$metadataFile = null;
 		$foundViewDefs = false;
		if(file_exists('iportal/modules/' . $this->module . '/metadata/detailviewdefs.php')){
 			$metadataFile = 'iportal/modules/' . $this->module . '/metadata/detailviewdefs.php';
 			$foundViewDefs = true;
 		}elseif(file_exists('custom/modules/' . $this->module . '/metadata/detailviewdefs.php')){
 			$metadataFile = 'custom/modules/' . $this->module . '/metadata/detailviewdefs.php';
 			$foundViewDefs = true;
 		}else{
	 		if(file_exists('custom/modules/'.$this->module.'/metadata/metafiles.php')){
				require_once('custom/modules/'.$this->module.'/metadata/metafiles.php');
				if(!empty($metafiles[$this->module]['detailviewdefs'])){
					$metadataFile = $metafiles[$this->module]['detailviewdefs'];
					$foundViewDefs = true;
				}
			}elseif(file_exists('modules/'.$this->module.'/metadata/metafiles.php')){
				require_once('modules/'.$this->module.'/metadata/metafiles.php');
				if(!empty($metafiles[$this->module]['detailviewdefs'])){
					$metadataFile = $metafiles[$this->module]['detailviewdefs'];
					$foundViewDefs = true;
				}
			}
 		}
 		$GLOBALS['log']->debug("metadatafile=". $metadataFile);
		if(!$foundViewDefs && file_exists('modules/'.$this->module.'/metadata/detailviewdefs.php')){
				$metadataFile = 'modules/'.$this->module.'/metadata/detailviewdefs.php';
 		}

		$this->dv = new IportalDetailView();
		$this->dv->ss =&  $this->ss;
		$this->dv->setup($this->module, $this->bean, $metadataFile, 'iportal/include/IportalDetailView/DetailView.tpl'); 		
 	} 	
 	
 	function display(){
		if(empty($this->bean->id)){
			global $app_strings;
			sugar_die($app_strings['ERROR_NO_RECORD']);
		}				
		$this->dv->process();
		echo $this->dv->display();
 	}

}
