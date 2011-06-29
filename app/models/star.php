<?php
class Star extends AppModel {

	var $name = 'Star';
	var $actsAs = array( 'SoftDeletable' ,
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
                        ))
			)
		);
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'User' => array('className' => 'User',
								'foreignKey' => 'user_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Category' => array('className' => 'Category',
								'foreignKey' => 'category_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)) ;
			
			var $validate = array(
   
				'category' => array(
					'categoryRule-1' => array(
						'rule' => 'notEmpty',
						'message' => 'این فیلد نباید خالی باشد'
				     )
				),
				
				'title' => array(
					'titleRule-1' => array(
						'rule' => 'notEmpty',
						'message' => 'این فیلد نباید خالی باشد'
				     )
				),
				/*
				'alias' => array(
					'aliasRule-1' => array(
						'rule' => 'notEmpty',
						'message' => 'این فیلد نباید خالی باشد'
                     )
				)*/
	      );

}
?>
