<?PHP
/*********************************************************************************
 * SugarCRM is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2010 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/
/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once('modules/OBJ_Indicators/OBJ_Indicators_sugar.php');
class OBJ_Indicators extends OBJ_Indicators_sugar {

	function OBJ_Indicators() {
		parent::OBJ_Indicators_sugar();
	}

	function save() {
		$this->validateOperation();
		parent::save();
		$this->updateObjectiveHistory();
	}

	/**
	 * delete associative records in objectives and conditions before deleteing the indicator.
	 * @see SugarBean::mark_deleted()
	 */
	function mark_deleted(){
		$id=$this->id;
		$db=DBManagerFactory::getInstance();
		
		$sql_1 = "UPDATE obj_objectives SET deleted =1 WHERE obj_indicator_id='$id';";
		$db->query($sql_1);
		$sql_2 = "UPDATE obj_conditions SET deleted =1 WHERE indicator_id='$id';";
		$db->query($sql_2);
		
		parent::mark_deleted($id);
	}
	
	
	
	/**
	 * Period and Period Reference are saved in objective history.
	 * When indicator is saved, update history of objective related anyway.
	 */
	function updateObjectiveHistory() {
		$objective_bean = new OBJ_Objectives();
		$objective_list = $objective_bean->get_full_list("", " obj_indicator_id = '".$this->id."' ");
		if (!empty($objective_list)) {
			foreach ($objective_list as $objective) {
				$objective->save();
			}
		}
	}

	function validateOperation() {
		if (!isset($this->attribute) or empty($this->attribute)) {
			$this->operation = 'count';
		}
	}

	function validateTargetBean() {
		global $beanList;
		if (!isset($beanList[$this->object])) return false;
		return true;
	}

	function validateAttribute($targetBean) {
		global $db;
		if (isset($this->attribute) and !empty($this->attribute)) {

			// check if ATTRIBUTE exists in db fields
			$db_fields = $this->db_fields($targetBean);
			if (isset($db_fields[$this->attribute])) return true;

			return false;
		} else {
			// The ATTRIBUTE of the main object in the indicator is optional, if empty, no need to check, return true to skip
			return true;
		}
	}

	function validateConditions(&$attr) {
		
		global $sugar_config;    	
    	$sugarVesion = floatval(substr($sugar_config['sugar_version'],0,3)); 
		//SugarCRM BUG 49505 'get_related_list' can`t be use in 6.3.0 and after version
		if($sugarVesion >= 6.3){
			if ($this->load_relationship('conditions')){
				$list_conditions = $this->conditions->getBeans();
				}
			if (!empty($list_conditions)) {
				foreach ($list_conditions as $k => $condition) {
					global $beanList;
					$targetBean = new $beanList[$this->object]();
					if (!$condition->validateAttribute($targetBean)) {
						$attr = $condition->attribute;
						return false;
					}
					if (!empty($condition->related_attribute)) {
						if ($condition->attribute == 'obj_joined_table') {
							$relatedBean = new $beanList[$condition->condition_value]();
						} else if ($condition->attribute == 'obj_account_name') {
							$relatedBean = new Account();
						}
						if (!$condition->validateRelatedAttribute($relatedBean)) {
							$attr = $condition->related_attribute;
							return false;
						}
					}
				}
			}
		}else{
			$list_conditions = $this->get_related_list(new OBJ_Conditions(), "conditions");
			if (!empty($list_conditions)) {
				foreach ($list_conditions['list'] as $condition) {
					global $beanList;
					$targetBean = new $beanList[$this->object]();
					if (!$condition->validateAttribute($targetBean)) {
						$attr = $condition->attribute;
						return false;
					}
					if (!empty($condition->related_attribute)) {
						if ($condition->attribute == 'obj_joined_table') {
							$relatedBean = new $beanList[$condition->condition_value]();
						} else if ($condition->attribute == 'obj_account_name') {
							$relatedBean = new Account();
						}
						if (!$condition->validateRelatedAttribute($relatedBean)) {
							$attr = $condition->related_attribute;
							return false;
						}
					}
				}
			}
		}
		
		return true;
	}

	function validateAuditFields(&$attr) {
		
		global $sugar_config;    	
    	$sugarVesion = floatval(substr($sugar_config['sugar_version'],0,3)); 
    	
		//SugarCRM BUG 49505 'get_related_list' can`t be use in 6.3.0 and after version
		if($sugarVesion >= 6.3){
			if ($this->load_relationship('conditions')){
				$list_conditions = $this->conditions->getBeans();
			}
			if (!empty($list_conditions)) {
				foreach ($list_conditions as $k => $condition) {
					global $beanList;
					$targetBean = new $beanList[$this->object]();
					$audit_defs = $targetBean->getAuditEnabledFieldDefinitions();
	
					if ($condition->is_audited and !isset($audit_defs[$condition->attribute])) {
						$attr = $condition->attribute;
						return false;
					}
				}
			}
		}else{
			$list_conditions = $this->get_related_list(new OBJ_Conditions(), "conditions");
			if (!empty($list_conditions)) {
				foreach ($list_conditions['list'] as $condition) {
					global $beanList;
					$targetBean = new $beanList[$this->object]();
					$audit_defs = $targetBean->getAuditEnabledFieldDefinitions();
	
					if ($condition->is_audited and !isset($audit_defs[$condition->attribute])) {
						$attr = $condition->attribute;
						return false;
					}
				}
			}
		}
		
		return true;
	}

	function db_fields($bean) {
		$db_fields = $bean->field_defs;
		foreach ($db_fields as $k => $v) {
			if ($v['source'] == 'non-db') {
				unset($db_fields[$k]);
			}
		}
		return $db_fields;
	}
}
?>