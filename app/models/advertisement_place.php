<?php
class AdvertisementPlace extends AppModel {

	var $name = 'AdvertisementPlace';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Position' => array('className' => 'Position',
								'foreignKey' => 'position_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Advertisement' => array('className' => 'Advertisement',
								'foreignKey' => 'advertisement_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			));

//	var $validate = array('priorities' => array('prioritiesRule-1' => array('rule' => 'notEmpty',				'message' => 'این فیلد نباید خالی باشد')));

}
?>
