<?php
class Publication extends AppModel {

	var $name = 'Publication';
   var $hasAndBelongsToMany = array('Category' =>
                               array('className'    => 'Category',
                                     'joinTable'    => 'publications_categories',
                                     'foreignKey'   => 'publication_id',
                                     'associationForeignKey'=> 'category_id',
                                     'conditions'   => '',
                                     'order'        => '',
                                     'limit'        => '',
                                     'unique'       => true,
                                     'finderQuery'  => '',
                                     'deleteQuery'  => '',
                               ) ,'Publicationtag' =>
						   array('className'    => 'Publicationtag',
								 'joinTable'    => 'publications_publicationtags',
								 'foreignKey'   => 'publication_id',
								 'associationForeignKey'=> 'publicationtag_id',
								 'conditions'   => '',
								 'order'        => '',
								 'limit'        => '',
								 'unique'       => true,
								 'finderQuery'  => '',
								 'deleteQuery'  => '',
						   )
						   ); 	
var $actsAs = array( 'SoftDeletable' , 'Publicationtag'=>array('table_label'=>'publicationtags', 'tag_label'=>'publicationtag', 'separator'=>','),
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
					)));
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	 var $validate = array(
			'title' => array(
					'titleRule-1' => array(
							'rule' => 'notEmpty',
							'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†ÛŒØ§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
			          )
 			)
			
// 			'alias' => array(
// 					'aliasRule-1' => array(
// 						'rule' => 'notEmpty',
// 						'message' => 'Ø§ÛŒÙ† Ù…Ø³ØªØ¹Ø§Ø± Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
// 			 		)
// 			),
// 			
			
//			'purpose' => array(
//				'purposeRule-1' => array(
//					'rule' => 'notEmpty',
//					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
//			 	)
//			),
//			
//			'license_holder' => array(
//				'license_holderRule-1' => array(
//					'rule' => 'notEmpty',
//					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
//			     )
//			),
//			
//			'managing_director' => array(
//				'managing_directorRule-1' => array(
//					'rule' => 'notEmpty',
//					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
//			     )
//			),
//			
//			'senior_editor' => array(
//				'senior_editorRule-1' => array(
//					'rule' => 'notEmpty',
//					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
//			     )
//			),
//			
//			'publisher' => array(
//				'publisherRule-1' => array(
//					'rule' => 'notEmpty',
//					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
//			    )
//			),
//			
//			'ISSN' => array(
//				'ISSNRule-1' => array(
//					'rule' => 'numeric',
//					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ø¨Ø§ÛŒØ¯ Ø§Ø² Ù†ÙˆØ¹ Ø¹Ø¯Ø¯ÛŒ Ø¨Ø§Ø´Ø¯',
//			     ),
//			   'ISSNRule-2' => array(
//					'rule' => 'notEmpty',
//					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
//			         )
//			   ),
//			
//			'vol' => array(
//				'volRule-1' => array(
//					'rule' => 'numeric',
//					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ø¨Ø§ÛŒØ¯ Ø§Ø² Ù†ÙˆØ¹ Ø¹Ø¯Ø¯ÛŒ Ø¨Ø§Ø´Ø¯'
//			     ),
//			   'volRule-2' => array(
//					'rule' => 'notEmpty',
//					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
//			    )
//			 ),
//			
//			
//			'month' => array(
//				'monthRule-2' => array(
//					'rule' => 'notEmpty',
//					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
//			     )
//			),
//			
//			'price' => array(
//				'priceRule-1' => array(
//					'rule' => 'numeric',
//					 'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ø¨Ø§ÛŒØ¯ Ø§Ø² Ù†ÙˆØ¹ Ø¹Ø¯Ø¯ÛŒ Ø¨Ø§Ø´Ø¯'
//				),
//				'priceRule-2' => array(
//					'rule' => 'notEmpty',
//					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
//			 		)
//				),
//			
//			'pages' => array(
//				'pagesRule-1' => array(
//					'rule' => 'numeric',
//					 'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ø¨Ø§ÛŒØ¯ Ø¹Ø¯Ø¯ Ø¨Ø§Ø´Ø¯'
//			      ),
//			   'pagesRule-2' => array(
//					'rule' => 'notEmpty',
//					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
//			     )
//			 ),
//			
//			'period' => array(
//				'periodRule-1' => array(
//					'rule' => 'alphaNumeric',
//					 'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ø¨Ø§ÛŒØ¯ Ø§Ø² Ù†ÙˆØ¹ Ø¹Ø¯Ø¯ÛŒ ÛŒØ§ Ú©Ø§Ø±Ø§Ú©ØªØ± Ø¨Ø§Ø´Ø¯',
//				
//			      ),
//			    'periodRule-2' => array(
//					'rule' => 'notEmpty',
//					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
//			     )
//			),
//			
//			'web' => array(
//				'webRule-1' => array(
//					'rule' => 'notEmpty',
//					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
//			     )
//			),
//			
//			'email' => array(
//				'emailRule-1' => array(
//					'rule' => 'email',
//					 'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ø¨Ø§ÛŒØ¯ Ø¨Ù‡ Ù�Ø±Ù…Øª Ù…ÛŒÙ„ Ø¨Ø§Ø´Ø¯',
//				  ),
//			   'emailRule-2' => array(
//					'rule' => 'notEmpty',
//					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
//			    )
//			 ),
//			
//			'address' => array(
//				'addressRule-2' => array(
//					'rule' => 'notEmpty',
//					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
//			     )
//			),
//			
//			'tel' => array(
//				'telRule-1' => array(
//					'rule' => 'numeric',
//					 'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ø¨Ø§ÛŒØ¯ Ø§Ø² Ù†ÙˆØ¹ Ø¹Ø¯Ø¯ Ø¨Ø§Ø´Ø¯',
//				),
//				'telRule-2' => array(
//					'rule' => 'notEmpty',
//					'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
//			     )
//			)
			
	);
			

}
?>