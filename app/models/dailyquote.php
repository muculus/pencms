<?php
class dailyquote extends AppModel {

	var $name = 'Dailyquote';
	var $actsAs = array( 'SoftDeletable' );
	
	var $validate = array(
	'title' => array(
		'titleRule-1' => array(
			'rule' => 'notEmpty',
			'message' => 'فیلد عنوان نباید خالی باشد'
		 )
 	),
	
// 	'alias' => array(
// 		'aliasRule-1' => array(
// 			'rule' => 'notEmpty',
// 			'message' => 'نام مستعار نباید خالی باشد'
// 		 )
// 	),
	/*
	'intro' => array(
		'introRule-1' => array(
			'rule' => 'notEmpty',
			'message' => 'فیلد مقدمه نباید خالی باشد'
	    )
	),
	
// 	'content' => array(
// 	   'contentRule-1' => array(
// 			'rule' => 'notEmpty',
// 			'message' => 'فیلد محتوا نباید خالی باشد'
// 	    )
// 	 ),
	
	'author' => array(
		'authorRule-1' => array(
			'rule' => 'notEmpty',
			'message' => 'فیلد مقدمه نباید خالی باشد'
	    )
	),
	
	'copyright' => array(
		'copyrightRule-1' => array(
			'rule' => 'notEmpty',
			'message' => 'این فیلد نباید خالی باشد'
	    )
	),
	
	'source' => array(
		'sourceRule-1' => array(
			'rule' => 'notEmpty',
			'message' => 'این فیلد نباید خالی باشد'
	    )
	),
	
	'publish_date' => array(
		'publish_dateRule-1' => array(
			'rule' => 'notEmpty',
			'message' => 'فیلد مقدمه نباید خالی باشد'
	    )
	),
	
	'pages' => array(
		'pagesRule-1' => array(
			'rule' => 'numeric',
			 'message' => 'این فیلد باید از نوع عدد باشد',
	     ),
	    'pagesRule-2' => array(
			'rule' => 'notEmpty',
			'message' => 'فیلد تعداد صفحات نباید خالی باشد'
	     )
	),
	
	'hits' => array(
		'hitsRule-1' => array(
			'rule' => 'numeric',
			'message' => 'این فیلد باید از نوع عدد باشد',
	      ),
	  'hitsRule-2' => array(
		  'rule' => 'notEmpty',
		  'message' => 'فیلد مقدمه نباید خالی باشد'
	   )
	 )
		*/
    );

}
?>
