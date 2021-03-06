<?php
class Content extends AppModel {

	var $name = 'Content';
   var $hasAndBelongsToMany = array('Category' =>
                               array('className'    => 'Category',
                                     'joinTable'    => 'contents_categories',
                                     'foreignKey'   => 'content_id',
                                     'associationForeignKey'=> 'category_id',
                                     'conditions'   => '',
                                     'order'        => '',
                                     'limit'        => '',
                                     'unique'       => true,
                                     'finderQuery'  => '',
                                     'deleteQuery'  => '',
                               )
                               ); 	
	
	var $actsAs = array( 'SoftDeletable' , 
			'MeioUpload.MeioUpload' => array(
				'image' => array(
					'dir' => 'img{DS}{ModelName}{DS}{fieldName}',
					'createDirectory' => true,
					'allowedMime' => array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'),
					'allowedExt' => array('.jpg', '.jpeg', '.png', '.gif'),
					'thumbsizes' => array(
											'small'  => array('width'=>64, 'height'=>64),
											'medium' => array('width'=>180, 'height'=>180),
											'large'  => array('width'=>600, 'height'=>450)
                                          ),
					'default' => 'default',
					'fields' => array(
                                'filesize' => '{field}_size',
                                'mimetype' => '{field}_mimetype',
								'dir' => 'image_dir')
					),
				'file' => array(
					'dir' => 'img{DS}{ModelName}{DS}{fieldName}',
					'createDirectory' => true,
					'allowedMime' => array('image/jpeg', 'image/jpeg', 'image/png', 'application/x-tar','application/x-rar-compressed','application/x-zip-compressed', 'application/x-shockwave-flash',	'application/msword', 'application/vnd.ms-powerpoint', 'application/vnd.ms-excel', 'application/pdf'),
					'allowedExt' => array('.jpg', '.jpeg', '.png', '.tar', '.rar','.zip', '.swf', '.doc', '.ppt', '.xls', '.pdf' ,'.DOCX','.DOC' , '.docx', '.PDF'),
					'fields' => array(
                                'filesize' => '{field}_filesize',
                                'mimetype' => '{field}_mimetype',
								'dir' => 'file_dir')
                     )
				)
		);
	
	var $validate = array(
	'title' => array(
		'titleRule-1' => array(
			'rule' => 'notEmpty',
			'message' => 'Ù�ÛŒÙ„Ø¯ Ø¹Ù†ÙˆØ§Ù† Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
		 )
 	),
	
// 	'alias' => array(
// 		'aliasRule-1' => array(
// 			'rule' => 'notEmpty',
// 			'message' => 'Ù†Ø§Ù… Ù…Ø³ØªØ¹Ø§Ø± Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
// 		 )
// 	),
	/*
	'intro' => array(
		'introRule-1' => array(
			'rule' => 'notEmpty',
			'message' => 'Ù�ÛŒÙ„Ø¯ Ù…Ù‚Ø¯Ù…Ù‡ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
	    )
	),
	
// 	'content' => array(
// 	   'contentRule-1' => array(
// 			'rule' => 'notEmpty',
// 			'message' => 'Ù�ÛŒÙ„Ø¯ Ù…Ø­ØªÙˆØ§ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
// 	    )
// 	 ),
	
	'author' => array(
		'authorRule-1' => array(
			'rule' => 'notEmpty',
			'message' => 'Ù�ÛŒÙ„Ø¯ Ù…Ù‚Ø¯Ù…Ù‡ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
	    )
	),
	
	'copyright' => array(
		'copyrightRule-1' => array(
			'rule' => 'notEmpty',
			'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
	    )
	),
	
	'source' => array(
		'sourceRule-1' => array(
			'rule' => 'notEmpty',
			'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
	    )
	),
	
	'publish_date' => array(
		'publish_dateRule-1' => array(
			'rule' => 'notEmpty',
			'message' => 'Ù�ÛŒÙ„Ø¯ Ù…Ù‚Ø¯Ù…Ù‡ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
	    )
	),
	
	'pages' => array(
		'pagesRule-1' => array(
			'rule' => 'numeric',
			 'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ø¨Ø§ÛŒØ¯ Ø§Ø² Ù†ÙˆØ¹ Ø¹Ø¯Ø¯ Ø¨Ø§Ø´Ø¯',
	     ),
	    'pagesRule-2' => array(
			'rule' => 'notEmpty',
			'message' => 'Ù�ÛŒÙ„Ø¯ ØªØ¹Ø¯Ø§Ø¯ ØµÙ�Ø­Ø§Øª Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
	     )
	),
	
	'hits' => array(
		'hitsRule-1' => array(
			'rule' => 'numeric',
			'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ø¨Ø§ÛŒØ¯ Ø§Ø² Ù†ÙˆØ¹ Ø¹Ø¯Ø¯ Ø¨Ø§Ø´Ø¯',
	      ),
	  'hitsRule-2' => array(
		  'rule' => 'notEmpty',
		  'message' => 'Ù�ÛŒÙ„Ø¯ Ù…Ù‚Ø¯Ù…Ù‡ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
	   )
	 )
		*/
    );

}
?>
