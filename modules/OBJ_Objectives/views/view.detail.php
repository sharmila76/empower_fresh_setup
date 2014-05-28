<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class OBJ_ObjectivesViewDetail extends ViewDetail {

 	/**
 	 * @see SugarView::display()
 	 */
 	public function display() {
 		
			$this->getObjectiveValueWidgetDetailView($this->bean);
			$this->ss->assign('type', 0);
			$this->dv->defs['panels']['default']['1']['1'] = array (
	            'name' => 'objective_value',
	            'studio' => 'visible',
	            'label' => 'LBL_OBJECTIVE_VALUE',
	        );
		$this->rebuild();
 		parent::display();
 	}

    function getObjectiveValueWidgetDetailView($focus, $tpl='') {
        if ( !($this->ss instanceOf Sugar_Smarty ) )
            $this->ss = new Sugar_Smarty();

        global $app_strings;
        global $current_user;
        $assign = array();
        if(empty($focus->id))return '';
        $obj = new OBJ_Objectives();
        $prefillData = $obj->getValuesByObjectiveId($focus->id);

        foreach($prefillData as $valueItem) {
            $assign[] = array(
				'assigned_user_id' => $valueItem['user_name'], 
				'objective_value' => $valueItem['objective_value']
				);
        }
        $this->ss->assign('app_strings', $app_strings);
        $this->ss->assign('objectiveValues', $assign);
    }

	private function rebuild() {
		include_once ('modules/Administration/QuickRepairAndRebuild.php');
    	$repair = new RepairAndClear();
    	$repair->module_list = array('OBJ_Objectives');
		$repair->clearTpls();
	}
}

?>