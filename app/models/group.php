<?php
class Group extends AppModel {

	var $name = 'Group';
	var $actsAs = array('Acl' => array('type' => 'requester'));
	var $validate = array(
		'name' => array(array('rule' => array('minlength', 1))),
		/*'parent_id' => array(array('rule' => array('numeric'))),*/
		'lft' => array(array('rule' => array('numeric'))),
		'rght' => array(array('rule' => array('numeric')))
	);

//	var $actsAs = array('Tree','Acl' => array('type' => 'requester'));
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'User' => array('className' => 'User',
								'foreignKey' => 'group_id',
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
	
	function parentNode() {
		return null;
	}

}
?>