<?php
class Submit extends AppModel {
	var $name = 'Submit';
	var $actsAs = array('SoftDeletable',
			'MeioUpload' => array(
				'file' => array(
					'dir' => 'img{DS}{ModelName}{DS}{fieldName}',
					'create_directory' => true,
					'allowed_mime' => array('image/jpeg', 'image/jpeg', 'image/png', 'application/x-tar','application/x-rar-compressed','application/x-zip-compressed', 'application/x-shockwave-flash',	'application/msword', 'application/vnd.ms-powerpoint', 'application/vnd.ms-excel', 'application/pdf'
											),
					'allowed_ext' => array('.jpg', '.jpeg', '.pps', '.ppsx', '.png', '.tar', '.rar','.zip', '.swf', '.doc', '.ppt', '.xls', '.pdf', '.gif', '.pptx', '.docx', '.xlsx'),
					'fields' => array(
                                'filesize' => '{field}_filesize',
                                'mimetype' => '{field}_mimetype',
								'dir' => 'file_dir'
                       ),
					)
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
			'Widget' => array('className' => 'Widget',
								'foreignKey' => 'widget_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

}
?>