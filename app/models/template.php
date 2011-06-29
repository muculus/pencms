<?php
class Template extends AppModel {

	var $name = 'Template';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'SiteLayout' => array('className' => 'SiteLayout',
								'foreignKey' => 'template_id',
								'dependent' => true,
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
			)
	);
	var $validate = array(
			'name' => array(
				'nameRule-1' => array(
					'rule' => 'notEmpty',
					'message' => 'این فیلد نیاید خالی باشد'
				)
			 )
			);
}
?>