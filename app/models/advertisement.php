<?php
class Advertisement extends AppModel {

	var $name = 'Advertisement';
	var $actsAs = array( 'SoftDeletable' ,
			'MeioUpload' => array('file' => array(
					'dir' => 'img{DS}{ModelName}{DS}{fieldName}',
					'create_directory' => true,
					'allowed_mime' => array('image/jpeg', 'image/jpeg', 'image/png', 'application/x-tar','application/x-rar-compressed','application/x-zip-compressed', 'application/x-shockwave-flash',	'application/msword', 'application/vnd.ms-powerpoint', 'application/vnd.ms-excel', 'application/pdf'
											),
					'allowed_ext' => array('.jpg', '.jpeg', '.png', '.tar', '.gif', '.GIF', '.rar','.zip', '.swf', '.doc', '.ppt', '.xls', '.pdf'),
					'fields' => array(
                                'filesize' => '{field}_filesize',
                                'mimetype' => '{field}_mimetype',
								'dir' => 'file_dir'
                   
                     ))
				)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'AdvertisementPlace' => array('className' => 'AdvertisementPlace',
								'foreignKey' => 'advertisement_id',
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

}
?>