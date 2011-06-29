<?php
class Manager extends AppModel {

	var $name = 'Manager';
	var $actsAs = array( 'SoftDeletable' ,
			'MeioUpload' => array(
				'picture' => array(
					'dir' => 'img{DS}{model}{DS}{field}',
					'create_directory' => true,
					'allowed_mime' => array('image/jpeg', 'image/pjpeg', 'image/png'),
					'allowed_ext' => array('.jpg', '.jpeg', '.png'),
					//'thumbsizes' => array(
					//	'normal' => array('width'=>200, 'height'=>200),
					//),
					'default' => 'default.jpg',
				)
			)
		);
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'ManagerMassage' => array('className' => 'ManagerMassage',
								'foreignKey' => 'manager_id',
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
			'firstname' => array(
				'firstnameRule-1' => array(
					'rule' => 'notEmpty',
					'message' => 'فیلد عنوان نباید خالی باشد'
				)
		     ),
			
			'lastname' => array(
		   		'lastnameRule-1' => array(
					'rule' => 'notEmpty',
					'message' => 'این فیلد نباید خالی باشد'
				)
			),
			
		'grade' => array(
			'gradeRule-1' => array(
				'rule' => 'numeric',
				 'message' => 'این فیلد باید از نوع عدد باشد',
			),
			'gradeRule-2' => array(
				'rule' => 'notEmpty',
				'message' => 'این فیلد نباید خالی باشد'
		     )
			),
		
		'position' => array(
			'positionRule-2' => array(
				'rule' => 'notEmpty',
				'message' => 'این فیلد نباید خالی باشد'
		     )
		),
		
		'description' => array(
			'descriptionRule-2' => array(
				'rule' => 'notEmpty',
				'message' => 'این فیلد نباید خالی باشد'
		     )
		),
		
		'career' => array(
			'careerRule-2' => array(
				'rule' => 'notEmpty',
				'message' => 'این فیلد نباید خالی باشد'
		     )
		),
		
		'tel' => array(
			'telRule-1' => array(
				'rule' => 'numeric',
				 'message' => 'این فیلد باید از نوع عدد باشد',
			),
			'telRule-2' => array(
				'rule' => 'notEmpty',
				'message' => 'این فیلد نباید خالی باشد'
		    )
		),
		
		'email' => array(
			'emailRule-1' => array(
				'rule' => 'email',
				 'message' => 'این فیلد باید از نوع میل باشد',
		     ),
		'emailRule-2' => array(
			'rule' => 'notEmpty',
			'message' =>'این فیلد نباید خالی باشد'
			 )
		)
		
	);

}
?>