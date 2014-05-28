<?php

require_once 'include/Dashlets/Dashlet.php';

class BarcodeDashlet extends Dashlet
{
	function PPIDashlet($id, $def)
	{
		global $current_user, $app_strings;
		parent::Dashlet($id);
		$this->title = 'Inventory Barcode';
	}

	function display( $text = '' )
	{
		$this->title = 'Barcode';
		$num = isset($_REQUEST) && is_array($_REQUEST) && isset($_REQUEST['num']) ? 
			$_REQUEST['num'] : 
			'2007.08.17_BORER.K_3';

		$img = '<img
 			src="http://www.atelierstorage.com/barcode/barcode_img.php?num=' . $num . '&type=code128&imgtype=png"
 			alt="PNG: ' . $num . '" 
			title="PNG: ' . $num . '">';
	
		return parent::display( $num ) . $img;
	}
}

?>

