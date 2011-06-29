<?php
class ManagerMassage extends AppModel {

	var $name = 'ManagerMassage';
	var $actsAs = array( 'SoftDeletable'); 
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Manager' => array('className' => 'Manager',
								'foreignKey' => 'manager_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);
	var $validate = array(
			'question' => array(
				'questionRule-1' => array(
					'rule' => 'notEmpty',
					'message' => 'این فیلد نباید خالی باشد'
			 	 )
			),	
			
				
			'answer' => array(
				'answerRule-2' => array(
					'rule' => 'notEmpty',
					'message' => 'این فیلد نباید خالی باشد'
		        )
			)
	);
}
?>