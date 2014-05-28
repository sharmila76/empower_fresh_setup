<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$subpanel_layout = array(
	'top_buttons' => array(
                 array('widget_class' => 'SubPanelTopCreateButton'),
	),

	'where' => '',
	
	'list_fields' => array(
		'object_image'=>array(
			'vname' => 'LBL_OBJECT_IMAGE',
			'widget_class' => 'SubPanelIcon',
 		 	'width' => '2%',
 		 	'image2'=>'attachment',
 		 	'image2_url_field'=>'file_url'
		),
        'name'=>array(
 			'vname' => 'LBL_LIST_SUBJECT',
			'widget_class' => 'SubPanelDetailViewLink',
			'width' => '9999%',
		),
		'date_modified'=>array(
		 	'vname' => 'LBL_LIST_DATE_MODIFIED',
			'width' => '9999%',
		),
		'file_url'=>array(
			'usage'=>'query_only'
			),
		'filename'=>array(
			'usage'=>'query_only'
			),
	),
);

?>