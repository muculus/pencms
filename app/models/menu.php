<?php
class Menu extends AppModel {

	var $name = 'Menu';
	var $actsAs = array('SoftDeletable','Tree');
	var $order = 'Menu.lft ASC';	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Category' => array('className' => 'Category',
								'foreignKey' => 'category_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);
	
	var $validate = array(
		'title' => array(
			'titleRule-1' => array(
				'rule' => 'notEmpty',
				'message' => 'این فیلد نباید خالی باشد'
		     )
		),
		
// 		'alias' => array(
// 			'aliasRule-1' => array(
// 				'rule' => 'notEmpty',
// 				'message' => 'این فیلد نباید خالی باشد'
//    			)
// 		),
// 		
// 		'description' => array(
// 			'descriptionRule-1' => array(
// 				'rule' => 'notEmpty',
// 				'message' => 'این فیلد نباید خالی باشد'
//    			)
// 		)
// 		
	);

}
?>