<?php
class News extends AppModel {

	var $name = 'News';
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
	var $actsAs = array( 'SoftDeletable' ,
			'MeioUpload' => array(
				'image' => array(
					'dir' => 'img{DS}{ModelName}{DS}{fieldName}',
					'create_directory' => true,
					'allowed_mime' => array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'),
					'allowed_ext' => array('.jpg', '.jpeg', '.png', '.gif'),
					'thumbsizes' => array(
											'small'  => array('width'=>64, 'height'=>64),
											'medium' => array('width'=>180, 'height'=>180),
											'large'  => array('width'=>600, 'height'=>450)
                                          ),
					'default' => 'default.jpg',
					'fields' => array(
                                'filesize' => '{field}_size',
                                'mimetype' => '{field}_mimetype',
								'dir' => 'image_dir')
					))
				
		);
   var $hasAndBelongsToMany = array('Category' =>
                               array('className'    => 'Category',
                                     'joinTable'    => 'news_categories',
                                     'foreignKey'   => 'news_id',
                                     'associationForeignKey'=> 'category_id',
                                     'conditions'   => '',
                                     'order'        => '',
                                     'limit'        => '',
                                     'unique'       => true,
                                     'finderQuery'  => '',
                                     'deleteQuery'  => '',
                               )
                               ); 	
	
		var $validate = array(
		'title' => array(
			'titleRule-1' => array(
				'rule' => 'notEmpty',
				'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†ÛŒØ§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
		 	)
		 ),
		
		'alias' => array(
			'aliasRule-1' => array(
				'rule' => 'notEmpty',
				'message' => 'Ø§ÛŒÙ† Ù…Ø³ØªØ¹Ø§Ø± Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
		     )
		),
		
		'intro' => array(
			'introRule-1' => array(
				'rule' => 'notEmpty',
				'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
		     )
		),
		
		'text' => array(
			'textRule-1' => array(
				'rule' => 'notEmpty',
				'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
		     )
		),
		
		'source' => array(
			'sourceRule-1' => array(
				'rule' => 'notEmpty',
				'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
		     )
		)
	);
}
?>