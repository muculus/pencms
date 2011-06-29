<?php
class Library extends AppModel {

	var $name = 'Library';
	var $hasMany = array(
			'Rate' => array('className' => 'Rate',
								'foreignKey' => 'item_id',
								'dependent' => true,
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
			));
	    var $hasAndBelongsToMany = array('Librarytag' =>
                               array('className'    => 'Librarytag',
                                     'joinTable'    => 'libraries_librarytags',
                                     'foreignKey'   => 'library_id',
                                     'associationForeignKey'=> 'librarytag_id',
                                     'conditions'   => '',
                                     'order'        => '',
                                     'limit'        => '',
                                     'unique'       => true,
                                     'finderQuery'  => '',
                                     'deleteQuery'  => '',
                               ) ,'Category' =>
                               array('className'    => 'Category',
                                     'joinTable'    => 'libraries_categories',
                                     'foreignKey'   => 'library_id',
                                     'associationForeignKey'=> 'category_id',
                                     'conditions'   => '',
                                     'order'        => '',
                                     'limit'        => '',
                                     'unique'       => true,
                                     'finderQuery'  => '',
                                     'deleteQuery'  => '',
                               )
                               ); 
      var $actsAs = array( 'SoftDeletable' , 'Librarytag'=>array('table_label'=>'librarytags', 'tag_label'=>'librarytag', 'separator'=>','),
			'MeioUpload' => array(
				'picture' => array(
					'dir' => 'img{DS}{model}{DS}{field}',
					'create_directory' => true,
					'allowed_mime' => array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'),
					'allowed_ext' => array('.jpg', '.jpeg', '.png', '.gif'),
					'thumbsizes' => array(
											'small'  => array('width'=>75, 'height'=>75),
											'medium' => array('width'=>150, 'height'=>150),
											'large'  => array('width'=>600, 'height'=>450)
                                          ),
					'default' => 'default.jpg',
					'fields' => array(
                                'filesize' => 'filesize',
                                'mimetype' => 'mimetype',
								'dir' => 'dir')
    			),
				'file' => array(
					'dir' => 'img{DS}{model}{DS}{field}',
					'create_directory' => true,
					'allowed_mime' => array('image/jpeg', 'image/jpeg', 'image/png', 'application/x-tar','application/x-rar-compressed','application/x-zip-compressed', 'application/x-shockwave-flash',	'application/msword', 'application/vnd.ms-powerpoint', 'application/vnd.ms-excel', 'application/pdf'
											),
					'allowed_ext' => array('.jpg', '.jpeg', '.png', '.tar', '.rar','.zip', '.swf', '.doc', '.ppt', '.xls', '.pdf'),
					'fields' => array(
                                'filesize' => '{field}_filesize',
                                'mimetype' => '{field}_mimetype',
								'dir' => 'file_dir'),)));
	/*var $validate = array(
	 'title' => array(
		'titleRule-1' => array(
			'rule' => 'notEmpty',
			'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†ÛŒØ§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
	 	)
	 ),
	 
// 	'alias' => array(	
// 		'aliasRule-1' => array(
// 			'rule' => 'notEmpty',
// 			'message' => 'Ù†Ø§Ù… Ù…Ø³ØªØ¹Ø§Ø± Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
// 		 )
// 	),
	
	'publisher' => array(
		'publisherRule-1' => array(
			'rule' => 'notEmpty',
			'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
		)
	),
	
	'language' => array(
		'languageRule-1' => array(
			'rule' => 'notEmpty',
			'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
		 )
	),
	
	'ISBN' => array(
		'ISBNRule-1' => array(
			'rule' => 'notEmpty',
			'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
		 )
	  ),
	
	'paperback' => array(
		'paperbackRule-1' => array(
			'rule' => 'notEmpty',
			'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
		 )
	 ),
	
	
	'price' => array(
		'priceRule-1' => array(
				'rule' => 'numeric',
				'message' => 'Ù�Ù‚Ø· Ø§Ø¹Ø¯Ø§Ø¯ ØµØ­ÛŒØ­ Ùˆ Ø§Ø¹Ø´Ø§Ø±ÛŒ Ø¨Ø§ÛŒØ¯ Ø¨Ø§Ø´Ø¯ , Ùˆ Ø§Ø¹Ø¯Ø§Ø¯ Ø§Ø² Ø¬Ù†Ø³ Ø§Ù†Ú¯Ù„ÛŒØ³ÛŒ Ø¨Ø§ÛŒØ¯ Ø¨Ø§Ø´Ø¯',
		),
		'priceRule-2' => array(
				'rule' => 'notEmpty',
				'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
	 	)
	)
);*/

}
?>
