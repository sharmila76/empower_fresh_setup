<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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
/*********************************************************************************

 * Description:
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc. All Rights
 * Reserved. Contributor(s): ______________________________________..
 *********************************************************************************/
require_once("include/SugarCharts/SugarChart.php");

class ObjectiveFlashChart extends SugarChart {

	public $link_enabled = true;

	public function __construct() {
		parent::__construct();
	}

	/**
     * returns the properties tag for the constructed xml file for sugarcharts
	 * 
     * @param 	nothing
     * @return	string $properties XML properties tag
     */	
	function xmlProperties() {
		// open the properties tag
		$properties = $this->tab("<properties>",1);

		// grab the property and value from the chart_properties variable
		foreach ($this->chart_properties as $key => $value){
			$properties .= $this->tab("<$key>$value</$key>",2);
		}
		
		if (!empty($this->colors_list)) {
			// open the colors tag
			$properties .= $this->tab("<colors>",2);
			foreach ($this->colors_list as $color){
				$properties .= $this->tab("<color>$color</color>",3);
			}
			
			// close the colors tag
			$properties .= $this->tab("</colors>",2);
		}
		
		// close the properties tag
		$properties .= $this->tab("</properties>",1);

		return $properties;
	}

	function xmlDataForGroupByChart() {
		global $current_user;

		$data = '';
		$objective_labels = return_module_language($GLOBALS['current_language'], 'OBJ_Objectives');
		foreach ($this->data_set as $key => $value) {
			$link = "index.php?module=OBJ_Objectives&action=DetailView&query=true&record=".$value['obj_id'];

			$key = $key + 1;
			$data .= $this->tab('<group>',2);
			$data .= $this->tab('<title>' . $value['user_name'] . '</title>',3);
			$data .= $this->tab('<value>' . '</value>',3);
			$data .= $this->tab('<label></label>',3);
			if ($this->link_enabled) $data .= $this->tab('<link>'  . $link . '</link>',3);
			$data .= $this->tab('<subgroups>',3);

			$objective_value = 0;

			foreach ($value as $k => $v) {

				if (!isset($v) or empty($v)) $v = 0;

				if ($k == 'objective') {
					$k .= ' value';
					$objective_value = $v;
					$v = strlen($v) < 15 ? str_pad($v, 12, " ", STR_PAD_BOTH) : $v;
					$data .= $this->tab('<group>',4);
					$data .= $this->tab('<title>'.$objective_labels['LBL_OBJECTIVE_VALUE'].'</title>',5);
					$data .= $this->tab('<value>100</value>',5);
					$data .= $this->tab('<label>' . $v . '</label>',5);
					if ($this->link_enabled) $data .= $this->tab('<link>'  . $link . '</link>',5);
					$data .= $this->tab('</group>',4);
					$this->checkYAxis(100);
				} else if ($k == 'current') {
					if (empty($objective_value) || intval($objective_value) == 0) $percentage_val = 100;
					else $percentage_val = $v / intval($objective_value) * 100;
					$data .= $this->tab('<group>',4);
					$data .= $this->tab('<title>'.$objective_labels['LBL_CURRENT_VALUE'].'</title>',5);
					$data .= $this->tab('<value>' . $percentage_val . '</value>',5);
					$data .= $this->tab('<label>' . $v . '</label>',5);
					if ($this->link_enabled) $data .= $this->tab('<link>'  . $link . '</link>',5);
					$data .= $this->tab('</group>',4);
					$this->checkYAxis($percentage_val);
				}

			}
			
			$data .= $this->tab('</subgroups>',3);
			$data .= $this->tab('</group>',2);
		}

		return $data;
	}

	/**
     * returns the y-axis values for the chart,
     * the values displays as percentage, 10% each step.
	 * 
     * @param 	nothing
     * @return	string $yAxis XML yAxis tag
     */
	function xmlYAxis() {
		$this->chart_yAxis['yMin'] = '0';
		$this->chart_yAxis['yLog'] = '1';

		$max = $this->chart_yAxis['yMax'];
		$exp = ($max == 0) ? 1 : floor(log10($max));
		$baseval = $max / pow(10, $exp);
		
		// steps will be 10^n, 2*10^n, 5*10^n (where n >= 0)
		if ($baseval > 0 && $baseval <= 1){
			$step = 2 * pow(10, $exp-1);
		}
		else if ($baseval > 1 && $baseval <= 3){
			$step = 5 * pow(10, $exp-1);
		}		
		else if ($baseval > 3 && $baseval <= 6){
			$step = 10 * pow(10, $exp-1);
		}	
		else if ($baseval > 6 && $baseval <= 10){
			$step = 20 * pow(10, $exp-1);
		}	

		// edge cases for values less than 10
		if ($max == 0 || $step < 1){
			$step = 1;
		}
	
		$this->chart_yAxis['yStep'] = $step;

		$this->chart_yAxis['yMax'] += $this->chart_yAxis['yStep'];

		$yAxis = $this->tab("<yAxis>" ,1);
		foreach ($this->chart_yAxis as $key => $value) {
			$yAxis .= $this->tab("<$key>$value</$key>", 2);
		}
		$yAxis .= $this->tab("</yAxis>" ,1);
		return $yAxis;
	}

	function enableLink() {
		$this->link_enabled = true;
	}

	function disableLink() {
		$this->link_enabled = false;
	}
}
?>