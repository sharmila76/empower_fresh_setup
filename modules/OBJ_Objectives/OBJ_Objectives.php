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
require_once('modules/OBJ_Objectives/OBJ_Objectives_sugar.php');
class OBJ_Objectives extends OBJ_Objectives_sugar {

	var $objective_start_end_dates = array(
		"objective_start_date" => "",
		"objective_end_date" => "",
		"chart_title" => "",
	);
	var $objective_period;
	var $objective_period_reference;

	function OBJ_Objectives() {
		parent::OBJ_Objectives_sugar();
	}

	/**
	 * - Objective history is created or updated along with the objective.
	 * - History is updated and followed if any modification occurs during the current period, when new period comes, new history is created.
	 * - History effect depends on the period of the objective.
	 * - If objective is monthly, then history effect starts from the 1st to the end of the month.
	 * - If checking the current period, objective processing takes the current definition, not history.
	 * - If checking on the period before, objective processing takes the last history available which depends on the period chosen.
	 * - History data is only available when checking back on the chart result, not by UI.
	 *   e.g. |--------------|--------------|--------------|
	 *   		  January		  February       March
	 * 	      If the objective is created on January, so the first history is on January.
	 * 		  If checking the current month March, then objective processing takes the current definition.
	 * 		  If checking back on February, then objective processing looks for the last history available (January example above).
	 * 		  If checking back before objective create date (before January example above), then objective processing takes the first history. 
	 */
	function save() {
		
		if($this->id != null and date('Y-m-d',strtotime($this->date_modified)) != date('Y-m-d')){
			$obj = new OBJ_Objectives();
			$obj->retrieve($this->id);
			$copy = clone $obj;
			$copy->id = null;
			$copy->effective_end_date = date('Y-m-d');
			$copy->deleted = 1;
			$copy->history_obj_id = $this->id;
			$copy->save();
		}
		
		if($this->deleted == 0){
		$this->effective_start_date = date('Y-m-d');
		$this->effective_end_date = date('Y-m-d');
		}
		
		parent::save();
		

		$this->saveObjectiveValues();
		


		// Get Objective Period
		$indicator = new OBJ_Indicators();
		$indicator->retrieve($this->obj_indicator_id);
		$this->objective_period = $indicator->period;
		$this->objective_period_reference = $indicator->period_reference;

		// Get Start Date & End Date by now
		$this->initObjectiveStartDateAndEndDate(null, $indicator);

	}


	function saveObjectiveValues() {
		global $db;
		if ($this->deleted == 0 and isset($_REQUEST['objectiveValueListSize'])) {
			// create or update values
			for ($i = 0; $i < intval($_REQUEST['objectiveValueListSize']) + 1; $i++) {
				if (isset($_REQUEST['OBJ_Objectives0assigned_user_id'.$i])) {
					//save user objectvie with the effective date
					$obj_id = $this->id;
//					var_dump($this->id);
//					$thiss->save();
					$user_id = $_REQUEST['OBJ_Objectives0assigned_user_id'.$i];
					$obj_v = $_REQUEST['OBJ_Objectives0objectiveValue'.$i];
					
					$query = "select id,effective_end_date from obj_objectives_users where user_id = '$user_id' and objective_id = '$obj_id' and deleted = 0 order by date_modified desc limit 1; ";
					$row = $db->fetchByAssoc($db->query($query));
					
					$last_date = date("Y-m-d", strtotime($row[effective_end_date]));
					
					if(!empty($row[id]) and $last_date != date('Y-m-d')){
						$db->query("update obj_objectives_users set effective_end_date = now(),deleted = 1 where id ='".$row[id]."'");
						$db->query("INSERT INTO obj_objectives_users (id,objective_id,user_id,date_modified,deleted,objective_value,effective_start_date,effective_end_date,list_index) VALUES (UUID(),'$obj_id','$user_id',now(),0,'$obj_v',DATE_FORMAT(now(),'%Y%m%d'),DATE_FORMAT(now(),'%Y%m%d'),'$i');");
					} else if(!empty($row[id]) and $last_date == date('Y-m-d')){
						$db->query("update obj_objectives_users set objective_value = '$obj_v' where id ='".$row[id]."'");
					} else{
						$db->query("INSERT INTO obj_objectives_users (id,objective_id,user_id,date_modified,deleted,objective_value,effective_start_date,effective_end_date,list_index) VALUES (UUID(),'$obj_id','$user_id',now(),0,'$obj_v',DATE_FORMAT(now(),'%Y%m%d'),DATE_FORMAT(now(),'%Y%m%d'),'$i');");
					
					}
				}
			}
			// delete values
			if (isset($_REQUEST['objectiveValueDeletedIndex'])) {
				for ($i = 0; $i < intval($_REQUEST['objectiveValueDeletedIndex']) + 1; $i++) {
					if (isset($_REQUEST['db_id_deleted'.$i])) {
						$db->query("update obj_objectives_users set effective_end_date = DATE_FORMAT(now(),'%Y%m%d'),deleted = 1 where id ='".$_REQUEST['db_id_deleted'.$i]."'");
					}
				}
			}
		}
	}

    function getValuesByObjectiveId($id) {
    	global $locale;

        $users = array();

        $q = "SELECT ou.id, u.first_name, u.last_name, u.user_name, ou.user_id, ou.objective_value, ou.list_index FROM obj_objectives_users ou LEFT JOIN users u ON u.id = ou.user_id AND u.deleted = 0 AND u.status = 'Active' WHERE ou.objective_id = '{$id}' AND ou.deleted = 0 AND ou.effective_start_date = ou.effective_end_date ";
        $r = $this->db->query($q);

        while($a = $this->db->fetchByAssoc($r)) {
            $users[] = array (
            	'id' => $a['id'],
            	'assigned_user_id' => $a['user_id'],
            	'user_name' => $locale->getLocaleFormattedName($a['first_name'], $a['last_name']),
				'objective_value' => $a['objective_value']
			);
        }

		foreach ($users as $k => $v) {
		    $id[$k]  = $v['id'];
		    $user_name[$k] = $v['user_name'];
		}

		array_multisort($user_name, SORT_ASC, $users);

        return $users;
    }

	function initObjectiveStartDateAndEndDate($reference_date, $indicator) {
		global $timedate; // GMT conversion

		$now = $this->isSugar6_2() ? $timedate->nowDb() : gmdate($timedate->get_db_date_time_format());
		$reference_date = empty($reference_date) ? $now : $reference_date;

		$year = date("Y", strtotime($reference_date));
		$month = date("m", strtotime($reference_date));
		$day = date("d", strtotime($reference_date));
		$week = date("W", strtotime($reference_date));
		$lbl_month = date("F", strtotime($reference_date));
		$format = $this->isSugar6_2() ? "m/d/Y" : "Y-m-d H:i:s";

		// Objective Period is in natural
		switch ($indicator->period) {
			case "W":
				// 52 weeks per year
				// period reference can be 1, 2, 4, 13, 26, 52
				$mod = ($week - 1) % $indicator->period_reference;
				$week = $week - $mod; // the start week number of this period
				$firstMondayOfYear = strtotime('first monday january '.$year);
				// Bug Fix if the last week is in next year
				if (strtotime($reference_date) - strtotime(date("Y-m-d", $firstMondayOfYear)) < 0) {
					$year = $year - 1;
					$firstMondayOfYear = strtotime('first monday january '.$year);
				}
				// End Bug Fix
				$startWeekNum = $week - 1;
				$endWeekNum = $startWeekNum + $indicator->period_reference;
				$startDate = $timedate->getDayStartEndGMT(date($format, strtotime("+$startWeekNum week", $firstMondayOfYear)));
				$endDate = $timedate->getDayStartEndGMT(date($format, strtotime("+$endWeekNum week -1 day", $firstMondayOfYear)));

				if ($indicator->period_reference > 1) {
					$week = ceil($week / $indicator->period_reference);
					$this->objective_start_end_dates["chart_title"] = " No.$week   ".$indicator->period_reference." weeks from ".$timedate->to_display_date_time($startDate['start'], false)." to ".$timedate->to_display_date_time($endDate['end'], false)." in $year";					
				} else {
					$this->objective_start_end_dates["chart_title"] = " No.$week week from ".$timedate->to_display_date_time($startDate['start'], false)." to ".$timedate->to_display_date_time($endDate['end'], false)." in $year";
				}
				break;
			case "M":
				// 12 months per year
				// period reference can be 1, 2, 3, 4, 6
				$mod = ($month - 1) % $indicator->period_reference;
				$month = $month - $mod; // the start month of this period
				$startDate = $timedate->getDayStartEndGMT(date($format, mktime(0, 0, 0, $month, 01, $year)));
				$endDate = $timedate->getDayStartEndGMT(date($format, mktime(0, 0, -1, $month + $indicator->period_reference, 01, $year)));
				$lbl_start_month = date('F', mktime(0, 0, 0, $month, 01, $year));
				$lbl_end_month = date('F', mktime(0, 0, -1, $month + $indicator->period_reference, 01, $year));
				if ($indicator->period_reference > 1) {
					$this->objective_start_end_dates["chart_title"] = " from $lbl_start_month to $lbl_end_month in $year";
				} else {
					$this->objective_start_end_dates["chart_title"] = " in $lbl_month in $year";
				}
				break;
			case "Y":
				// always one year
                $startDate = $timedate->getDayStartEndGMT(date($format, mktime(0, 0, 0, 01, 01, $year)));
                $endDate = $timedate->getDayStartEndGMT(date($format, mktime(0, 0, 0, 12, 31, $year)));
                $this->objective_start_end_dates["chart_title"] = " in $year";
				break;
		}
		$this->objective_start_end_dates["objective_start_date"] = $startDate['start'];
		$this->objective_start_end_dates["objective_end_date"] = $endDate['end'];
	}

	function isSugar6_2() {
    	global $sugar_config;    	
    	$sugarVesion = floatval(substr($sugar_config['sugar_version'],0,3)); 
		if ($sugarVesion >= 6.2) {
			// compatible with Sugar 6.2.* or after version
			return true;
		} else {
			// compatible with Sugar 6.2.* or before version
			return false;
		}
	}
}
?>