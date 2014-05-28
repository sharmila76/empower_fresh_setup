<?php

require_once('iportal/include/MVC/View/views/view.list.php');

class BugsViewList extends ViewList {

	function CasesViewList() {
		parent::ViewList();
	}

	function processSearchForm() {
		if (isset($_REQUEST['query'])) {
			// we have a query
			if (!empty($_SERVER['HTTP_REFERER']) && preg_match('/action=EditView/', $_SERVER['HTTP_REFERER'])) { // from EditView cancel
				//$this->searchForm->populateFromArray($this->storeQuery->query);
			} else {
				$this->searchForm->populateFromRequest();
			}

			$where_clauses = $this->searchForm->generateSearchWhere(true, $this->seed->module_dir);

			if (count($where_clauses) > 0
				)$this->where = '(' . implode(' ) AND ( ', $where_clauses) . ') and ';
			$GLOBALS['log']->info("List View Where Clause: $this->where");
		}
		if ($this->use_old_search) {
			switch ($view) {
				case 'basic_search':
					$this->searchForm->setup();
					$this->searchForm->displayBasic($this->headers);
					break;
				case 'advanced_search':
					$this->searchForm->setup();
					$this->searchForm->displayAdvanced($this->headers);
					break;
				case 'saved_views':
					echo $this->searchForm->displaySavedViews($this->listViewDefs, $this->lv, $this->headers);
					break;
			}
		} else {
			echo $this->searchForm->display($this->headers);
		}
		$this->where.="   bugs_cstm.show_in_portal_c=1 ";
	}

}

?>
