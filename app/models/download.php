<?php
class Download extends AppModel {

	var $name = 'Download';
   var $hasAndBelongsToMany = array('Category' =>
                               array('className'    => 'Category',
                                     'joinTable'    => 'categories_downloads',
                                     'foreignKey'   => 'download_id',
                                     'associationForeignKey'=> 'category_id',
                                     'conditions'   => '',
                                     'order'        => '',
                                     'limit'        => '',
                                     'unique'       => true,
                                     'finderQuery'  => '',
                                     'deleteQuery'  => '',
                               )
                               ,'Downloadtag' =>
                               array('className'    => 'Downloadtag',
                                     'joinTable'    => 'downloads_downloadtags',
                                     'foreignKey'   => 'download_id',
                                     'associationForeignKey'=> 'downloadtag_id',
                                     'conditions'   => '',
                                     'order'        => '',
                                     'limit'        => '',
                                     'unique'       => true,
                                     'finderQuery'  => '',
                                     'deleteQuery'  => '',
                               )
                               ); 		
	var $actsAs = array( 'SoftDeletable', 'Containable', 'Downloadtag'=>array('table_label'=>'downloadtags', 'tag_label'=>'downloadtag', 'separator'=>','),
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
				'file' => array(
					'dir' => 'file{DS}{ModelName}{DS}{fieldName}',
					'create_directory' => true,
					'allowed_mime' => array('image/jpeg', 'image/jpeg', 'image/png', 'application/x-tar','application/x-rar-compressed','application/x-zip-compressed', 'application/x-shockwave-flash',	'application/msword', 'application/vnd.ms-powerpoint', 'application/vnd.ms-excel', 'application/pdf'
											),
					'allowed_ext' => array('.jpg', '.jpeg', '.png', '.tar', '.rar','.zip', '.swf', '.doc', '.ppt', '.xls', '.pdf', '.pptx', '.xlsx', '.ppsx', '.docx'),
					'fields' => array(
                                'filesize' => '{field}_filesize',
                                'mimetype' => '{field}_mimetype',
								'dir' => 'file_dir'
                       ),
					)
				)
			);
				
		var $validate = array(
			'title' => array(
				'titleRule-2' => array(
					'rule' => 'notEmpty',
					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
		         )
		       ),
// 			'description' => array(
// 				'descriptionRule-2' => array(
// 					'rule' => 'notEmpty',
// 					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
// 		         )
// 		       ),
			
//			'price' => array(
//				'priceRule-1' => array(
//					'rule' => 'numeric',
//					 'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ø¨Ø§ÛŒØ¯ Ø§Ø² Ù†ÙˆØ¹ Ø¹Ø¯Ø¯ Ø¨Ø§Ø´Ø¯',
//		         
//		        ),
//				'priceRule-2' => array(
//					'rule' => array('minLength', '0'),     
//		        )
//			),
		
/*		'hits' => array(
			'hitsRule-1' => array(
				'rule' => 'Numeric',
				 'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ø¨Ø§ÛŒØ¯ Ø§Ø² Ù†ÙˆØ¹ Ø±Ù‚Ù… Ø¨Ø§Ø´Ø¯',
			),
			'hitsRule-2' => array(
				'rule' => 'notEmpty',
				'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
			)
		)*/
	);		

}
?>
