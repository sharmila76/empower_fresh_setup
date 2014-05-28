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
require_once("include/SugarCharts/Jit/Jit.php");

class ObjectiveChart extends Jit {

	public $bar_width = 40; // The width of each bar.
	public $bar_space = 30; // The width of space between bars.
	public $default_print_width = 660;
	public $margin_left = 50;
	public $margin_right = 15;
	public $link_enabled = true;

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Overwrite Jit function
	 */
	function getDashletScript($id,$xmlFile="") {
		// just overwrite parent function to aviod executing
	}

	/**
	 * Overwrite JsChart function
	 */
	function getChartConfigParams($xmlStr) {

		$xml = new SimpleXMLElement($xmlStr);

		$chartType = $xml->properties->type;
		if ($chartType == "group by chart") {
			return array("orientation" => "vertical", "barType" => "grouped", "tip" => "title", "chartType" => "objectiveChart");
		} else {
			return array("orientation" => "vertical", "barType" => "stacked", "tip" => "name", "chartType" => "barChart");
		}
	}

	/**
	 * Overwrite JsChart function
	 */
	function getChartDimensions($xmlStr) {
		$number_bars = $this->getNumNodes($xmlStr);
		$width_used = $number_bars * $this->bar_width * 2 + ($number_bars + 1) * $this->bar_space + $this->margin_left + $this->margin_right;
		$print_width = $width_used."px";
		if ($width_used >= $this->default_print_width) {
			return array("width"=>$print_width, "height"=>$this->height);			
		} else {
			return array("width"=>"100%", "height"=>$this->height);
		}
	}

	/**
	 * Overwrite Jit function
	 */
	function display($name, $xmlFile, $width='320', $height='480', $resize=false) {
		parent::display($name, $xmlFile, $width, $height, $resize);
		return $this->ss->fetch('custom/modules/Charts/Dashlets/PipelineByObjectivesDashlet/objectiveChart.tpl');	
	}

	/**
	 * Overwrite JsChart function
	 */
	function buildJson($xmlstr){
		if ($this->checkData($xmlstr)) {
			$content = "{\n";
			if ($this->chartType == "group by chart") {
				$content .= $this->buildProperties($xmlstr);
				$content .= $this->buildLabelsBarChartStacked($xmlstr);
				$content .= $this->buildChartColors();
				$content .= $this->buildYAxis($xmlstr);
				$content .= $this->buildDataBarChartGrouped($xmlstr);
			} else {
				$content .= $this->buildProperties($xmlstr);
				$content .= $this->buildLabelsBarChartStacked($xmlstr);
				$content .= $this->buildChartColors();
				$content .= $this->buildYAxis($xmlstr);
				$content .= $this->buildDataBarChartStacked($xmlstr);
			}
			$content .= "\n}";
			return $content;
		} else {
			return "No Data";
		}
	}

	/**
	 * Overwrite JsChart function
	 */
	function buildChartColors() {
		$content = $this->tab("'color': [\n",1);
		$colorArr = array();
		// adjust color to Sugar blue and red.
		$colors = array("0x5F8CCF", "0xC60C30");
		foreach($colors as $color) {
			$colorArr[] = $this->tab("'".str_replace("0x","#",$color)."'",2);
		}
		$content .= join(",\n",$colorArr)."\n";
		$content .= $this->tab("],\n",1);
		return $content;
	}

	function buildYAxis($xmlstr) {
		$content = $this->tab("'yAxis': [\n",1);
		$properties = array();
		$xml = new SimpleXMLElement($xmlstr);
		foreach($xml->yAxis->children() as $property) {
			$properties[] = $this->tab("'".$property->getName()."':"."'".$this->processSpecialChars($property)."'",2);
		}
		$content .= $this->tab("{\n",1);
		$content .= join(",\n",$properties)."\n";
		$content .= $this->tab("}\n",1);
		$content .= $this->tab("],\n",1);
		return $content;
	}

	/**
	 * Overwrite SugarChart function
	 */
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

	function enableLink() {
		$this->link_enabled = true;
	}

	function disableLink() {
		$this->link_enabled = false;
	}

}
?>