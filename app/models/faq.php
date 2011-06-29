<?php
class Faq extends AppModel {

	var $name = 'Faq';
	var $actsAs = array('SoftDeletable');
	//The Associations below have been created with all possible keys, those that are not needed can be removed
   var $hasAndBelongsToMany = array('Category' =>
                               array('className'    => 'Category',
                                     'joinTable'    => 'faqs_categories',
                                     'foreignKey'   => 'faq_id',
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
			
			'question' => array(
				  'questionRule-1' => array(
						'rule' => 'notEmpty',
						'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
		           )
		     ),
			
		'answer' => array(
			'answerRule-1' => array(
				'rule' => 'notEmpty',
				'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
		     )
		),
		
		'text' => array(
			'textRule-1' => array(
				'rule' => 'notEmpty',
				'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
		     )
		)
	);
		

}
?>