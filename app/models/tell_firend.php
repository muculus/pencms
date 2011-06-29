<?php
class TellFirend extends AppModel {

	var $name = 'TellFirend';
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
                        )
					),));

}
?>