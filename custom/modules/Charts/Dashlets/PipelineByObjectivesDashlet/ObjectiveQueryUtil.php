<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class ObjectiveQueryUtil {

	private $objective;
	private $indicator;
	private $condition;
	private $reference_date;
	private $objective_start_date;
	private $objective_end_date;
	private $objective_start_date_now;
	private $objective_end_date_now;
	private $tables;
	private $targetBean;
	private $targetAlias;
	private $targetRelateBean;
	private $query;
	private $default_table;
	private $where_clause;
	private $where_clause_created_by;
	private $user_view;
	private $groups;
	private $selected_users;
	private $objective_status;
	private $error_messages = array();
	private $chart_title;
	private $checkUserType;
	private $audit_where;
	private $candition_attribute;
	private $assigned;
	private $assigned_audit;
	private $error;
	

	function init($chart) {
		$this->cleanQueryReferences();
		$this->setReferenceDate($chart->date_reference);
		$objective = new OBJ_Objectives();
		$objective->retrieve($chart->objective->id);
		if (isset($objective) and !empty($objective)) {
			$this->setObjective($objective);
			if (isset($this->objective->obj_indicator_id) and !empty($this->objective->obj_indicator_id)) {
				$indicator = new OBJ_Indicators();
				$indicator->retrieve($this->objective->obj_indicator_id);
				if (isset($indicator) and !empty($indicator)) {
					$this->setIndicator($indicator);

					// Target Sugar Bean
					global $beanList;
					$this->setTargetBean(new $beanList[$this->indicator->object]());
					$this->setTargetAlias($this->getTableAlias($this->targetBean->getTableName()));

					// If history is loaded, set history period to the indicator
//					$this->setHistoryPeriod($indicator);

					// Objective Start Date & End Date
					$this->objective->initObjectiveStartDateAndEndDate($this->reference_date, $indicator);
					$this->objective_start_date = $this->objective->objective_start_end_dates["objective_start_date"];
					$this->objective_end_date = $this->objective->objective_start_end_dates["objective_end_date"];
					$this->chart_title = $this->objective->objective_start_end_dates["chart_title"];
					$this->objective->initObjectiveStartDateAndEndDate(null, $indicator);
					$this->objective_start_date_now = $this->objective->objective_start_end_dates["objective_start_date"];
					$this->objective_end_date_now = $this->objective->objective_start_end_dates["objective_end_date"];

					// User List View
					$this->setSelectedUsers($chart->group_users);
					$this->setGroups($chart->groups);
					$this->initUserBySecurityGroup();
					$this->initUserView();

					// Objective Status
					$this->setObjectiveStatus($chart->getObjectiveStatus());

					// If true, check assigned user before, if false, check assigned current user.
					$this->setCheckUserType($chart->check_user_field);
				}
			}
		}
	}

	function initUserView() {
		if (isset($this->selected_users)) {
			$user_list = "";
			foreach ($this->selected_users as $user_id) {
				if (!empty($user_list)) $user_list .= " union ";
				$user = new User();
				$user = $user->retrieve($user_id);
				$user_list .= "(select '" . $user->id . "' as id, '" . $user->name . "' as user_name, '" . $user->last_name . "' as last_name)";
			}
			$this->user_view = "($user_list)";
		} else {
			$this->user_view =  "(select 0 as id, 'Overall' as user_name, 'Overall' as last_name)";
		}
	}

	function initUserBySecurityGroup() {
    	global $current_user, $db, $beanList;

		$users_tmp = array();
		// $this->groups is a dropdown list on chart options which displays all the groups defined in Security Suite.
		if (isset($beanList['SecurityGroups']) and !empty($this->groups)) {
			$users_tmp = $this->getUsersByGroups($this->groups, new SecurityGroup());
		}
		if (!empty($users_tmp)) {
			if (empty($this->selected_users)) $this->selected_users = array();
			$this->setSelectedUsers(array_merge($this->selected_users, array_keys($users_tmp)));
		}
	}


	function getUsersByGroups($groups, $sg) {
		global $sugar_config;    	
    	$sugarVesion = floatval(substr($sugar_config['sugar_version'],0,3)); 
		
		$users = array();
		foreach ($groups as $id) {
			$sg->retrieve($id);

			//SugarCRM BUG 49505 'get_related_list' can`t be use in 6.3.0 and after version
			if($sugarVesion >= 6.3){
    			if ($sg->load_relationship('users')){
				$list_users = $sg->users->getBeans();
				}
				foreach($list_users as $k => $user) {
					if($user->status = 'Active'){
						$users[$user->id] = $user->full_name;
					}
				}
    		}else{
				$list_users = $sg->get_related_list(new User(), "users", "", " users.status = 'Active' ");
				foreach($list_users['list'] as $user) {
					$users[$user->id] = $user->full_name;
				}
			}
		}
		return $users;
	}

	function validate() {
		if (!isset($this->indicator))
			$this->addErrorMessage('WARN_NO_INDICATOR_ERROR', '', $this->objective->name);
		if (!$this->indicator->validateTargetBean())
			$this->addErrorMessage('WARN_NO_MODULE_ERROR', $this->indicator->object, $this->objective->name);
		if (!$this->indicator->validateAttribute($this->targetBean))
			$this->addErrorMessage('WARN_NO_ATTRIBUTE_ERROR', $this->indicator->attribute, $this->objective->name);
		if (!$this->indicator->validateConditions($attr))
			$this->addErrorMessage('WARN_NO_ATTRIBUTE_ERROR', $attr, $this->objective->name);
		if (!$this->indicator->validateAuditFields($attr))
			$this->addErrorMessage('WARN_NO_AUDIT_ERROR', $this->indicator->object.' module, '.$attr, $this->objective->name);
	}


	function setupQuery() {
		global $sugar_config,$db; 	
    	$sugarVesion = floatval(substr($sugar_config['sugar_version'],0,3)); 
    	
    	if($this->isHistory()){
    		$this->query = "SELECT IF(ov.objective_value is null,(select o.objective_value from obj_objectives o where o.effective_start_date <= '".$this->reference_date."' AND o.effective_end_date > '".$this->reference_date."' and o.history_obj_id = '" . $this->objective->id . "'),ov.objective_value) as objective,'" . $this->objective->id . "' as obj_id, u.user_name as user_name, u.last_name as last_name, u.id as user_id,  ";
			$objective_value_table = " LEFT JOIN  obj_objectives_users as ov ON ov.objective_id = '" . $this->objective->id . "'  AND ov.user_id = u.id AND ov.effective_start_date <= '".$this->reference_date."' AND ov.effective_end_date > '".$this->reference_date."' ";
    	}else{
    		$this->query = "SELECT IF(ov.objective_value is null,(select o.objective_value from obj_objectives o where o.effective_start_date = o.effective_end_date and o.deleted = 0 and o.id = '" . $this->objective->id . "'),ov.objective_value) as objective,'" . $this->objective->id . "' as obj_id, u.user_name as user_name, u.last_name as last_name, u.id as user_id,  ";
			$objective_value_table = " LEFT JOIN  obj_objectives_users as ov ON ov.objective_id = '" . $this->objective->id . "'  AND ov.user_id = u.id AND ov.effective_start_date =  ov.effective_end_date ";
    	}
    	
    	if($this->indicator->operation == "count"){
			$this->default_table = $this->query." '0' as current, '" . $this->indicator->period . "' as period, '" . $this->objective->direction . "' as direction FROM " . $this->user_view . " as u $objective_value_table ";
		}
		
		//SugarCRM BUG 49505 'get_related_list' can`t be use in 6.3.0 and after version
		if($sugarVesion >= 6.3){
			if ($this->indicator->load_relationship('conditions')){
				$list_conditions = $this->indicator->conditions->getBeans();
			}
			foreach ($list_conditions as $k => $condition) {
				$this->setupSubQuery($condition);
			}
    	}else{
			$list_conditions = $this->indicator->get_related_list(new OBJ_Conditions(), "conditions");
			foreach ($list_conditions['list'] as $condition) {
				$this->setupSubQuery($condition);
			}
		}
		
		$this->addNotDeletedClause($this->targetBean);
		switch ($this->checkUserType) {
			case "assigned_user":
				$this->assigned = " AND u.id = tmp.assigned_user_id "; 
				break;
			case "assigned_changed_by":
				if ($db->tableExists($this->targetBean->get_audit_table_name())) {
					$audit_table_alias = $this->getTableAlias($this->targetBean->get_audit_table_name());
					$this->assigned_audit .= " AND tmp.field_name = 'assigned_user_id' ";
					$this->assigned_audit .= " AND tmp.created_by_a = u.id ";
					$this->assigned_audit .= " AND tmp.date_created_a >= '".$this->objective_start_date."' ";
					$this->assigned_audit .= " AND tmp.date_created_a <= '".$this->objective_end_date."' ";
				}
				break;
			case "was_assigned_user":
				if ($db->tableExists($this->targetBean->get_audit_table_name())) {
					$audit_table_alias = $this->getTableAlias($this->targetBean->get_audit_table_name());
					$this->assigned_audit .= " AND tmp.field_name = 'assigned_user_id' ";
					$this->assigned_audit .= " AND tmp.before_value_string = u.id ";
					$this->assigned_audit .= " AND tmp.date_created_a >= '".$this->objective_start_date."' ";
					$this->assigned_audit .= " AND tmp.date_created_a <= '".$this->objective_end_date."' ";
				}
				break;
			case "created_by":
				$this->assigned .= " AND tmp.created_by = u.id ";
				$this->assigned .= " AND tmp.date_entered >= '".$this->objective_start_date."' ";
				$this->assigned .= " AND tmp.date_entered <= '".$this->objective_end_date."' ";
				break;
			case "modified_by":
				$this->assigned .= " AND tmp.modified_user_id = u.id ";
				$this->assigned .= " AND tmp.date_modified >= '".$this->objective_start_date."' ";
				$this->assigned .= " AND tmp.date_modified <= '".$this->objective_end_date."' ";
				break;
		}
		
		$table = $this->getTableAlias($this->targetBean->getTableName())." as t";
		$table_audit = $this->getTableAlias($this->targetBean->get_audit_table_name());
		$where = "";
		
		if(!empty($this->candition_attribute)){
			foreach($this->candition_attribute as $k=>$attribute_query){
				if(isset($attribute_query['audit']) and !empty($attribute_query['audit'])){
					$table .= ",".$attribute_query['def']." as t".$k.",".$attribute_query['audit']." as ta".$k;
					$where .= " and (t.id = t$k.id or t.id = ta$k.parent_id)";
				}else{
					$table .= ",".$attribute_query['def']." as t".$k;
					$where .= " and (t.id = t$k.id)";
				}
			}	
		}
		
		$table_connect = "LEFT JOIN";
		$where_connect = "ON";
		if($this->indicator->operation == "count"){
			$table_connect = ",";
			$where_connect = "WHERE";
		}
	
		if(!empty($this->assigned_audit)){
			$condition_query = "SELECT tt.*,$table_audit.date_created as date_created_a,$table_audit.created_by as created_by_a,$table_audit.field_name as field_name,$table_audit.before_value_string FROM (SELECT t.* FROM $table WHERE 1 = 1 $where and t.deleted = 0 GROUP BY t.id) as tt LEFT JOIN $table_audit ON tt.id = $table_audit.parent_id";
			$this->query .= $this->getAggregativeOperation() . " as current, '" . $this->indicator->period . "' as period, '" . $this->objective->direction . "' as direction FROM " . $this->user_view . " as u $objective_value_table ";
			$this->query .= " $table_connect (" . $condition_query.") as tmp";
			$this->query .= " $where_connect 1 = 1 ".$this->assigned_audit;
			
		}else if(!empty($this->assigned)){
			$condition_query = "SELECT t.* FROM $table WHERE 1 = 1 $where and t.deleted = 0 GROUP BY t.id";
			$this->query .= $this->getAggregativeOperation() . " as current, '" . $this->indicator->period . "' as period, '" . $this->objective->direction . "' as direction FROM " . $this->user_view . " as u $objective_value_table ";
			$this->query .= " $table_connect (" . $condition_query.") as tmp";
			$this->query .= " $where_connect 1 = 1 ".$this->assigned;
		}else{
			$this->addErrorMessage("WARN_CHECK_USER");
			$this->error = true;
		}
		
		$this->query .= " GROUP BY u.id  ";
		
		if(!empty($this->default_table)){
			$this->query = "SELECT * FROM ((".$this->query .") union (". $this->default_table.")) as obj group by obj.user_id ";
		}
		if($this->error){
			$this->query = "";
		}
	}

	function setupSubQuery($condition) {
		global $beanList;
		$defs = $this->targetBean->getFieldDefinitions();
		if ($condition->attribute == 'obj_joined_table') {
			$relatedBean = new $beanList[$condition->condition_value]();
			$this->addParentJoinClause($this->targetBean, $condition);
			$this->addWhereClause($relatedBean, $condition);
		} else if ($condition->attribute == 'obj_account_name') {
			if (isset($defs['account_name'])) {
				$link = $defs['account_name']['link'];
				if (isset($link) and isset($defs[$link])) {
					$this->targetBean->load_relationship($link);
					if (isset($this->targetBean->$link) and is_a($this->targetBean->$link, "Link")) {
						$relationship = $this->targetBean->$link->_relationship;
						if (isset($relationship) and is_a($relationship, "Relationship")) {
							$this->where_clause .= " AND " . $this->getTableAlias($relationship->lhs_table) . "." . $relationship->lhs_key . " = " . $this->getTableAlias($relationship->join_table) . "." . $relationship->join_key_lhs . " ";
							$this->where_clause .= " AND " . $this->getTableAlias($relationship->rhs_table) . "." . $relationship->rhs_key . " = " . $this->getTableAlias($relationship->join_table) . "." . $relationship->join_key_rhs . " ";
							$this->where_clause .= " AND " . $this->getTableAlias($relationship->join_table) . ".deleted = 0 ";
							$this->where_clause .= " AND " . $this->getTableAlias($relationship->lhs_table) . ".deleted = 0 ";
							$this->where_clause .= " AND " . $this->getTableAlias($relationship->rhs_table) . ".deleted = 0 ";
						}
						$relatedBean = new $beanList[$relationship->lhs_module]();
						if (!$this->is_related_bean($relatedBean)) {
							$relatedBean = new $beanList[$relationship->rhs_module]();
						}
						$this->addWhereClause($relatedBean, $condition);
					}
				}
			}
		} else {
			$this->addWhereClause($this->targetBean, $condition);
		}
	}

	function filterObjectivesByStatus() {
		switch($this->objective_status) {
			case "achieved":
				$this->setQuery("select * from (".$this->query.") as q where q.current >= q.objective and q.direction = 'min' or q.current <= q.objective and q.direction = 'max' order by q.user_name asc");
				break;
			case "not achieved":
				$this->setQuery("select * from (".$this->query.") as q where q.current < q.objective and q.direction = 'min' or q.current > q.objective and q.direction = 'max' order by q.user_name asc");
				break;
			default:
				$this->setQuery("select * from (".$this->query.") as t order by t.user_name asc");
				break;
		}
	}

	function fixUpEmptyResultOnUsers() {
		global $db;

		if (empty($this->selected_users)) return $this->query;

		$result = $db->query($this->query, true);
		while ($row = $db->fetchByAssoc($result)) {
			$this->remove_item_by_value($this->selected_users, $row['user_id']);
		}
		$this->setQuery("(".$this->query.")");
		foreach ($this->selected_users as $not_assigned_user_id) {
			$not_assigned_user = new User();
			$not_assigned_user = $not_assigned_user->retrieve($not_assigned_user_id);
			$c_q = "SELECT ov.objective_value as objective, '".$this->objective->id."' as obj_id, '".$not_assigned_user->name."' as user_name, '".$not_assigned_user->last_name."' as last_name, '".$not_assigned_user->id."' as user_id, 0 as current, '".$this->indicator->period."' as period, '".$this->direction."' as direction FROM obj_objectives as ov WHERE ov.deleted = 0 AND ov.id = '".$this->objective->id."' AND ov.assigned_user_id = '".$not_assigned_user->id."'";
			$r = $db->query($c_q, true);
			if ($d = $db->fetchByAssoc($r)) {
				$this->query .= " union ($c_q) ";
			} else {
				$this->query .= " union (select '0' as objective, '".$this->objective->id."' as obj_id, '".$not_assigned_user->name."' as user_name, '".$not_assigned_user->last_name."' as last_name, '".$not_assigned_user->id."' as user_id, 0 as current, '".$this->indicator->period."' as period, '".$this->direction."' as direction) ";
			}
		}
	}
	
	function isHistory(){
		global $db;
		$history_start= "SELECT effective_start_date FROM `obj_objectives` WHERE id = '" . $this->objective->id . "'  or history_obj_id = '" . $this->objective->id . "' order by effective_start_date asc limit 1";
		$history_end = "SELECT effective_start_date FROM `obj_objectives` WHERE id = '" . $this->objective->id . "'  and deleted = 0 order by effective_start_date desc limit 1";
		$row_history_start = $db->fetchByAssoc($db->query($history_start));
		$row_history_end = $db->fetchByAssoc($db->query($history_end));
		if($this->reference_date >= $row_history_start['effective_start_date'] and $this->reference_date < $row_history_end['effective_start_date']){
			return true;
		} else{
			return false;
		}
	}

	function isCurrentPeriod() {
		if (strtotime($this->objective_start_date_now) <= strtotime($this->reference_date) and strtotime($this->reference_date) <= strtotime($this->objective_end_date_now)) {
			return true;
		} else {
			return false;
		}
	}

	function remove_item_by_value(&$array, $val = '', $preserve_keys = true) {
		if (empty($array) || !is_array($array)) return false;
		if (!in_array($val, $array)) return $array;

		foreach($array as $key => $value) {
			if ($value == $val) unset($array[$key]);
		}

		return ($preserve_keys === true) ? $array : array_values($array);
	}

	function addWhereClause($bean, $condition) {
		$date_clause = "";
		$equal_clause = "";
		$custom_clause = "";
		$delete_clause = "";
		
			$attribute_name = $this->getConditionAttribute($bean, $condition);
			if ($this->is_date_field($bean, $attribute_name)) {
				$date_clause = $this->addDateClause($bean, $condition);
			} else {
				if($this->is_varchar_field($bean, $attribute_name)){
					$equal_clause = $this->addEqualClauseVar($bean, $condition);
				}else{
					$equal_clause = $this->addEqualClause($bean, $condition);
				}
			}
			if ($this->is_custom_field($bean, $attribute_name)) {
				$custom_clause = $this->addCustomJoinClause($bean);
			}
			$delete_clause = $this->addNotDeletedClause($bean);
			
			$table = $this->getTableAlias($bean->getTableName());
			
			if ($condition->is_audited) {	
				$this->candition_attribute[] = array(
					'def' => " (SELECT id FROM $table where 1=1 $date_clause $equal_clause $custom_clause $delete_clause and date_modified >= '".$this->objective_start_date."' and date_modified < '".$this->objective_end_date."') ",
					'audit' => $this->addAuditQuery($bean, $condition),
				);
			}else{
				$this->candition_attribute[]['def'] = " (SELECT id FROM $table where 1=1 $date_clause $equal_clause $custom_clause $delete_clause and date_modified >= '".$this->objective_start_date."' and date_modified < '".$this->objective_end_date."') ";
			
			}
			
			
	}
	function addAuditQuery($bean, $condition) {
		global $db;
		$audit = "";
		if ($condition->is_audited and $db->tableExists($bean->get_audit_table_name())) {
			$target_table_alias = $this->getTableAlias($bean->getTableName());
			$audit_table_alias = $this->getTableAlias($bean->get_audit_table_name());
			$audit_query = "(SELECT parent_id FROM $audit_table_alias where field_name = '".$this->getConditionAttribute($bean, $condition)."' and before_value_string ='".$this->getConditionValue($bean, $condition)."' and date_created >= '".$this->objective_start_date."' and date_created< '".$this->objective_end_date."' order by date_created desc)";
		}
		return $audit_query;
			
	}
	
	function addNotDeletedClause($bean) {
		$alias = $this->getTableAlias($bean->getTableName());
		$delete_clause = " AND $alias.deleted = 0 ";
		return $delete_clause;
	}

	function addEqualClause($bean, $condition) {
		$attribute_name = $this->getConditionAttribute($bean, $condition);
		$attribute_value = $this->getConditionValue($bean, $condition);
		$alias = $this->getAlias($bean, $condition);
		$equal_clause = "";
		$equal_clause = " AND $alias.$attribute_name = '$attribute_value' ";
		
		return $equal_clause;
	}
	function addEqualClauseVar($bean, $condition) {
		$attribute_name = $this->getConditionAttribute($bean, $condition);
		$attribute_value = $this->getConditionValue($bean, $condition);
		$alias = $this->getAlias($bean, $condition);
		$equal_clause = "";
		$equal_clause = " AND $alias.$attribute_name LIKE '%$attribute_value%' ";
		
		return $equal_clause;
	}

	function addDateClause($bean, $condition) {
		$attribute_name = $this->getConditionAttribute($bean, $condition);
		$attribute_value = $this->getConditionValue($bean, $condition);
		$alias = $this->getAlias($bean, $condition);
		$date_clause = '';
		switch ($condition->date_options) {
			case "onSpecificDate":
				$date_clause .= " AND $alias.$attribute_name = '$attribute_value' ";
				break;
			case "onReferenceDate":
				$date_clause .= " AND $alias.$attribute_name = '".$this->reference_date."' ";
				break;
			case "inPeriod":
				$date_clause .= " AND $alias.$attribute_name >= '".$this->objective_start_date."' ";
				$date_clause .= " AND $alias.$attribute_name <= '".$this->objective_end_date."' ";
				break;
		}
		return $date_clause;
	}

	function addCustomJoinClause($bean) {
		
		$alias = $this->getTableAlias($bean->getTableName());
		$alias_cstm = $this->getTableAlias($this->getCustomTableName($bean->getTableName()));
		
		
		$custom_clause = "";
		$custom_clause .= " AND $alias.id = $alias_cstm.id_c ";
		
		return $custom_clause;
		// There is no deleted column in cstm table.
	}

	function addParentJoinClause($bean, $condition) {
		global $beanList;
		$alias = $this->getTableAlias($bean->getTableName());
		$parentBean = new $beanList[$condition->condition_value]();
		$alias_parent = $this->getTableAlias($parentBean->getTableName());
		$this->where_clause .= " AND $alias.parent_id = $alias_parent.id ";
		$this->where_clause .= " AND $alias_parent.deleted = 0 ";
	}


	function getAggregativeOperation() {
		if ($this->indicator->operation == 'average') $this->indicator->operation = 'avg';

		if (!isset($this->indicator->attribute) or empty($this->indicator->attribute))
			return $this->indicator->operation . "(*)";
		else 
			return $this->indicator->operation . "(tmp." . $this->indicator->attribute . ")";
	}

	function getAlias($bean, $condition = null) {
		if (!isset($condition)) {
			$bean = $this->targetBean;
			$attribute_name = $this->indicator->attribute;
		} else {
			$attribute_name = $this->getConditionAttribute($bean, $condition);
		}
		if ($this->is_custom_field($bean, $attribute_name))
			return $this->getTableAlias($this->getCustomTableName($bean->getTableName()));
		else
			return $this->getTableAlias($bean->getTableName());
	}

	function getConditionAttribute($bean, $condition) {
		if ($this->is_related_bean($bean)) return $condition->related_attribute;
		else return $condition->attribute;
	}

	function getConditionValue($bean, $condition) {
		if ($this->is_related_bean($bean)) return $condition->related_condition_value;
		else return $condition->condition_value;
	}

	function getTableSequences() {
		return implode(", ", $this->tables);
	}

	function getTargetBean() {
		return $this->targetBean;
	}

	function setTargetBean($bean) {
		$this->targetBean = $bean;
	}

	function setTargetAlias($alias) {
		$this->targetAlias = $alias;
	}

	function setObjective($obj) {
		$this->objective = $obj;
	}

	function setIndicator($ind) {
		$this->indicator = $ind;
	}

	function setReferenceDate($date) {
		$this->reference_date = $date;
	}

	function setGroups($groups) {
		$this->groups = $groups;
	}

	function setSelectedUsers($users) {
		$this->selected_users = $users;
	}

	function setObjectiveStatus($status) {
		$this->objective_status = $status;
	}

	function setCheckUserType($var) {
		$this->checkUserType = $var;
	}

	function getQuery() {
		return $this->query;
	}

	function setQuery($query) {
		$this->query = $query;
	}

	function getTableAlias($table_name) {
		if (!isset($this->tables[$table_name])) $this->tables[$table_name] = $table_name;
		return $this->tables[$table_name];
	}

	function getCustomTableName($table_name) {
		return $table_name."_cstm";
	}

	function getErrorMessages() {
		return $this->error_messages;
	}

	function addErrorMessage($msg, $param) {
		$this->error_messages[] = '<p class="error">' . translate('WARN', 'OBJ_Objectives') . $param . translate($msg, 'OBJ_Objectives') . " ". $this->objective->name . '</p>';
	}

	function cleanQueryReferences() {
		$this->tables = array();
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

	function is_custom_field($bean, $field_name) {
		$fields = $bean->field_defs;
		foreach ($fields as $k => $v) {
			if ($k == $field_name) {
				if ($v['source'] == 'custom_fields')
					return true;
				else
					return false;
			}
		}
		return false;
	}

	function is_date_field($bean, $field_name) {
		$fields = $bean->field_defs;
		foreach ($fields as $k => $v) {
			if ($k == $field_name) {
				if (strpos($v['type'], 'date') !== false)
					return true;
				else
					return false;
			}
		}
		return false;
	}
	
	function is_varchar_field($bean, $field_name) {
		$fields = $bean->field_defs;
		foreach ($fields as $k => $v) {
			if ($k == $field_name) {
				if (strpos($v['type'], 'varchar') === 0 or strpos($v['type'], 'name') === 0 or strpos($v['type'], 'text') === 0)
					return true;
				else
					return false;
			}
		}
		return false;
	}

	function is_related_bean($bean) {
		if (isset($bean) and isset($this->targetBean)) {
			if ($bean->table_name != $this->targetBean->table_name) return true;
			else return false;
		} else {
			return false;
		}
	}

	function getChartTitle() {
		return $this->chart_title;
	}

}

?>