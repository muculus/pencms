<?php
class User extends AppModel {

	var $name = 'User';
	var $actsAs = array(
			'SoftDeletable' ,
			'MeioUpload' => array(
				'picture' => array(
					'dir' => 'img{DS}{ModelName}{DS}{fieldName}',
					'create_directory' => true,
					'allowed_mime' => array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'),
					'allowed_ext' => array('.jpg', '.jpeg', '.png', '.gif'),
					'thumbsizes' => array(
											'small'  => array('width'=>75, 'height'=>75),
											'medium' => array('width'=>220, 'height'=>220),
											'large'  => array('width'=>600, 'height'=>450)
                                          ),
					'default' => 'default.jpg',
					'fields' => array(
                                'filesize' => '{field}_filesize',
                                'mimetype' => '{field}_mimetype',
								'dir' => 'picture_dir'
                        )
					),
				),
			'Acl' => array('type' => 'requester')
		);
	var $validate = array(
           'name' => array(
             'nameRule-1' => array(
		'rule' => 'notEmpty',
		'message' => 'این فیلد نباید خالی باشد'
             )
          ),


          'email' => array(
            'emailRule-1' => array(
               'rule' => 'notEmpty',
               'message' => 'این فیلد نباید خالی باشد'
             )
         ),

	  'field' => array(
            'fieldRule-1' => array(
               'rule' => 'notEmpty',
               'message' => 'این فیلد نباید خالی باشد'
             )
         ),

	  'grade' => array(
            'gradeRule-1' => array(
               'rule' => 'notEmpty',
               'message' => 'این فیلد نباید خالی باشد'
             )
         ),

          'password' => array(
             'passwordRule-1' => array(
                'rule' => array('minlength','6'),
                'message' => 'minimum 6 characters long'
	      ),
	     'passwordRule-2' => array(
               	'rule' => 'notEmpty',
               	'message' => 'این فیلد نباید خالی باشد'     
              )
	  )
	
      );

	function beforeSave(){
		if(!empty($this->data['User']['new_password'])){
			$this->data['User']['password'] = Security::hash($this->data['User']['new_password'], null, true);
		}
		if(!empty($this->data['User']['your_password'])){
			$this->data['User']['password'] = Security::hash($this->data['User']['your_password'], null, true);
		}

		return parent::beforeSave();
	}

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Group' => array('className' => 'Group',
								'foreignKey' => 'group_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
);
	var $hasMany = array(
			'Star' => array('className' => 'Star',
								'foreignKey' => 'user_id',
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
    if (!$this->id && empty($this->data)) {
        return null;
    }
    $data = $this->data;
    if (empty($this->data)) {
        $data = $this->read();
    }
    if (!$data['User']['group_id']) {
        return null;
    } else {
        return array('Group' => array('id' => $data['User']['group_id']));
    }
}

}

	?>
