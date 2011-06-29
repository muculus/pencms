<?php
class SiteLayout extends AppModel {

	var $name = 'SiteLayout';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Template' => array('className' => 'Template',
								'foreignKey' => 'template_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)

	);

	var $hasMany = array(
			'Category' => array('className' => 'Category',
								'foreignKey' => 'site_layout_id',
								'dependent' => true,
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
			),
			'Position' => array('className' => 'Position',
								'foreignKey' => 'site_layout_id',
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
						'message' => 'این فیلد نباید خالی باشد'
	                 )
              )
	    );

}
?>