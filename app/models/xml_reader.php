<?php
class XmlReader extends AppModel {

	var $name = 'XmlReader';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Widget' => array('className' => 'Widget',
								'foreignKey' => 'widget_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

}
?>