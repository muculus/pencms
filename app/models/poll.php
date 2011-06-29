<?php
class Poll extends AppModel {

	var $name = 'Poll';
   var $hasAndBelongsToMany = array('Category' =>
                               array('className'    => 'Category',
                                     'joinTable'    => 'polls_categories',
                                     'foreignKey'   => 'poll_id',
                                     'associationForeignKey'=> 'category_id',
                                     'conditions'   => '',
                                     'order'        => '',
                                     'limit'        => '',
                                     'unique'       => true,
                                     'finderQuery'  => '',
                                     'deleteQuery'  => '',
                               )
                               ); 	
/*	var $validate = array(
		'title' => array(
			'titleRule-1' => array(
				'rule' => 'notEmpty',
				'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†ÛŒØ§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
	         )
	      ),
		
		'alias' => array(
			'aliasRule-2' => array(
				'rule' => 'notEmpty',
				'message' => 'Ø§ÛŒÙ† Ù…Ø³ØªØ¹Ø§Ø± Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
	        )
		),
		
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
	
	'ip' => array(
		'ipRule-1' => array(
			'rule' => 'date',
			 'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ø¨Ø§ÛŒØ¯ Ù�Ø±Ù…Øª Ø¢Ù† Ø§Ø² Ù†ÙˆØ¹ ØªØ§Ø±ÛŒØ® Ø¨Ø§Ø´Ø¯',

         ),
		'ipRule-2' => array(
			'rule' => 'notEmpty',
			'message' => 'Ø§ÛŒÙ† Ù�ÛŒÙ„Ø¯ Ù†Ø¨Ø§ÛŒØ¯ Ø®Ø§Ù„ÛŒ Ø¨Ø§Ø´Ø¯'
        )
	)
);
*/
}
?>