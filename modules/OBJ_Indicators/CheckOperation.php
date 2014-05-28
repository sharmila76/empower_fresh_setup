<?php

class CheckOperation {

	function operationChecked(&$bean) {

		if (!isset($bean->attribute) or empty($bean->attribute)) {
			$bean->operation = 'count';
			$bean->save();
		}

	}

}

?>