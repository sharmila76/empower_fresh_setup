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
require_once('modules/OBJ_Conditions/OBJ_Conditions_sugar.php');
class OBJ_Conditions extends OBJ_Conditions_sugar {
	
	function OBJ_Conditions(){	
		parent::OBJ_Conditions_sugar();
	}

	function save() {
		
		if($_REQUEST['is_audit'] == '1'){
			$this->is_audited = 1;
		}else{
			$this->is_audited = 0;
		}
		
		$this->validateRelatedConditions();
		$this->validateDateOptions();
		parent::save();
	}

	function validateAttribute($targetBean) {
		global $db;
		if (isset($this->attribute) and !empty($this->attribute)) {

			if ($this->attribute == "obj_joined_table") return true;
			if ($this->attribute == "obj_account_name") return true;

			// check if ATTRIBUTE exists in db fields
			$db_fields = $this->db_fields($targetBean);
			if (isset($db_fields[$this->attribute])) return true;

			return false;
		} else {
			return false;
		}
	}

	function validateRelatedAttribute($relatedTargetBean) {
		global $db;
		if (isset($this->related_attribute) and !empty($this->related_attribute)) {

			// check if ATTRIBUTE exists in db fields
			$db_fields = $this->db_fields($relatedTargetBean);
			if (isset($db_fields[$this->related_attribute])) return true;

			return false;
		} else {
			return false;
		}
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

	function validateRelatedConditions() {
		global $beanList, $beanFiles;

		if (isset($this->attribute) and $this->attribute == 'obj_account_name') {
			if (isset($this->obj_account_id) and !empty($this->obj_account_id)) {
				require_once($beanFiles[$beanList['Accounts']]);
				$account = new $beanList['Accounts']();
				$account = $account->retrieve($this->obj_account_id);
				$this->condition_value = $account->name;
			} else {
				$this->condition_value = '';
			}
		}

		if (isset($this->attribute) and $this->attribute != 'obj_joined_table' and $this->attribute != 'obj_account_name') {
			$this->related_attribute = '';
			$this->related_condition_value = '';
		}
	}

	function validateDateOptions() {
		global $db, $app_list_strings, $beanList, $beanFiles;

		if (isset($this->attribute) && !empty($this->attribute)) {
			$indicator = new OBJ_Indicators();
			$indicator = $indicator->retrieve($this->indicator_id);
			if (isset($indicator) and isset($beanFiles[$beanList[$indicator->object]]) and !empty($beanFiles[$beanList[$indicator->object]])) {
				require_once($beanFiles[$beanList[$indicator->object]]);
				$bean = new $beanList[$indicator->object]();
				foreach ($bean->field_name_map as $col => $prop) {
					if ($this->attribute == $col and strpos($prop['type'], 'date') !== false) {
						if ($this->date_options != 'onSpecificDate') {
							$this->condition_value = "";
						}
					}
				}
			}
		}
	}
}
?>