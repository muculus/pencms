<?php
class Message extends AppModel {

	var $name = 'Message';
	var $actsAs = array('SoftDeletable');
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Widget' => array('className' => 'Widget',
								'foreignKey' => 'widget_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)

		
			);
			var $validate = array(
				'title' => array(
					'titleRule-2' => array(
						'rule' => 'notEmpty',
						'message' => 'این فیلد نباید خالی باشد'
					 )
				)
				
				/*alias' => array(
					aliasRule-2' => array(
						rule' => 'notEmpty',
						message' => 'فیلد نام مستعار نباید خالی باشد'
			        )
				)*/
		
	);


}
?>