<?php
class Position extends AppModel {

	var $name = 'Position';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'SiteLayout' => array('className' => 'SiteLayout',
								'foreignKey' => 'site_layout_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

}
?>