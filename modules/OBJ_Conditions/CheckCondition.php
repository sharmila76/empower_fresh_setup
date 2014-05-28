<?php

class CheckCondition {

	function conditionChecked(&$bean) {
		global $beanList, $beanFiles;

		if (isset($bean->attribute) and $bean->attribute == 'obj_account_name') {
			if (isset($bean->obj_account_id) and !empty($bean->obj_account_id)) {
				require_once($beanFiles[$beanList['Accounts']]);
				$account = new $beanList['Accounts']();
				$account = $account->retrieve($bean->obj_account_id);
				$bean->condition_value = $account->name;
			} else {
				$bean->condition_value = '';
			}
		}

		if (isset($bean->attribute) and $bean->attribute != 'obj_joined_table' and $bean->attribute != 'obj_account_name') {
			$bean->related_attribute = '';
			$bean->related_condition_value = '';
		}
	}

}

?>