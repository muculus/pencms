<?php
class Link extends AppModel {

	var $name = 'Link';
   var $hasAndBelongsToMany = array('Category' =>
                               array('className'    => 'Category',
                                     'joinTable'    => 'links_categories',
                                     'foreignKey'   => 'link_id',
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
                                
								'dir' => 'dir'
                        )
				)
			)
		);
	var $validate = array(
		'title' => array(
	       'titleRule-1' => array(
				'rule' => 'notEmpty',
				'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†ÛŒØ§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
			 )
		),
		
// 				'description' => array(
// 					'descriptionRule-1' => array(
// 						'rule' => 'notEmpty',
// 						'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
// 				    )
// 				),
				
			'hits' => array(
				'hitsRule-1' => array(
					'rule' => 'numeric',
					 'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ø¨Ø§ÛŒØ¯ Ø¹Ø¯Ø¯ÛŒ Ø¨Ø§Ø´Ø¯',
			      ),
				'hitsRule-2' => array(
					'rule' => 'notEmpty',
					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
			     )
			),
			
			'link_url' => array(
				'link_urlRule-1' => array(
					'rule' => 'url',
					 'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ø¨Ø§ÛŒØ¯ Ø¨Ù‡ Ù�Ø±Ù…Øª Ø¢Ø¯Ø±Ø³ Ø§ÛŒÙ†ØªØ±Ù†ØªÛŒ Ø¨Ø§Ø´Ø¯',
			       ),
				'link_urlRule-2' => array(
					'rule' => 'notEmpty',
					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
			     )
			),
			'hits' => array(
				'hitsRule-1' => array(
					'rule' => 'numeric',
					 'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ø¨Ø§ÛŒØ¯ Ø§Ø² Ù†ÙˆØ¹ Ù�Ù‚Ø· Ø±Ù‚Ù… Ø¨Ø§Ø´Ø¯',
					),
				'hitsRule-2' => array(
					'rule' => 'notEmpty',
				   'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
	           )
			)
			
			);

}
?>