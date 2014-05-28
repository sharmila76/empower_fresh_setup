<?php
  $searchdefs['Cases'] = array(
					'templateMeta' => array(
							'maxColumns' => '2', 
                            'widths' => array('label' => '10', 'field' => '30'),
                           ),
                    'layout' => array(
						'basic_search' => array(
						 	'case_number',
							'name',
							),
						'advanced_search' => array(
							'case_number',
							'name',
							'status',
							/*array('name' => 'assigned_user_id', 'type' => 'enum', 'label' => 'LBL_ASSIGNED_TO', 'function' => array('name' => 'get_user_array', 'params' => array(false))),*/ //taras removed "Assigned To" field
							'priority' 
						),
					),
 			   );
?>
