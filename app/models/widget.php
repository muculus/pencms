<?php
class Widget extends AppModel {

	var $name = 'Widget';

		var $actsAs = array('MeioUpload' => array(
				'picture' => array(
					'dir' => 'img{DS}{ModelName}{DS}{fieldName}',
					'create_directory' => true,
					'allowed_mime' => array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'),
					'allowed_ext' => array('.jpg', '.jpeg', '.png', '.gif'),
					'fields' => array(
                                'dir' => 'picture_dir'
                     )
					)));
	var $hasMany = array(
			'Category' => array('className' => 'Category',
								'foreignKey' => 'widget_id',
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
            ),
		);

}
?>