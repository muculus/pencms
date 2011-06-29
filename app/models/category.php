<?php
class Category extends AppModel {

	var $name = 'Category';

	var $actsAs = array( 'Tree' ,'Containable',
			'MeioUpload' => array(
				
				'file' => array(
					'dir' => 'img{DS}{ModelName}{DS}{fieldName}',
					'create_directory' => true,
					'allowed_mime' => array('image/jpeg', 'image/jpeg', 'image/png', 'application/x-tar','application/x-rar-compressed','application/x-zip-compressed', 'application/x-shockwave-flash',	'application/msword', 'application/vnd.ms-powerpoint', 'application/vnd.ms-excel', 'application/pdf'
											),
					'allowed_ext' => array('.jpg', '.jpeg', '.png', '.tar', '.rar','.zip', '.swf', '.doc', '.ppt', '.xls', '.pdf'),
					'fields' => array(
                                'filesize' => '{field}_filesize',
                                'mimetype' => '{field}_mimetype',
								'dir' => 'file_dir'
                       ),
					),
				'picture' => array(
					'dir' => 'img{DS}{ModelName}{DS}{fieldName}',
					'create_directory' => true,
					'allowed_mime' => array('image/jpeg', 'image/jpeg', 'image/png'),
					'allowed_ext' => array('.jpg', '.jpeg', '.png'),
					'fields' => array(
                                'dir' => 'picture_dir'
                       ),
					)	
				)
			);
	var $order = 'Category.lft ASC';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'SiteLayout' => array('className' => 'SiteLayout',
								'foreignKey' => 'site_layout_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Widget' => array('className' => 'Widget',
								'foreignKey' => 'widget_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
			
      );
      var $hasAndBelongsToMany = array('Download' =>
                               array('className'    => 'Download',
                                     'joinTable'    => 'categories_downloads',
                                     'foreignKey'   => 'category_id',
                                     'associationForeignKey'=> 'download_id',
                                     'conditions'   => '',
                                     'order'        => '',
                                     'limit'        => '',
                                     'unique'       => true,
                                     'finderQuery'  => '',
                                     'deleteQuery'  => '',
                               ),'Article' =>
                               array('className'    => 'Article',
                                     'joinTable'    => 'articles_categories',
                                     'foreignKey'   => 'category_id',
                                     'associationForeignKey'=> 'article_id',
                                     'conditions'   => '',
                                     'order'        => '',
                                     'limit'        => '',
                                     'unique'       => true,
                                     'finderQuery'  => '',
                                     'deleteQuery'  => '',
                               ),'Poll' =>
                               array('className'    => 'Poll',
                                     'joinTable'    => 'polls_categories',
                                     'foreignKey'   => 'category_id',
                                     'associationForeignKey'=> 'poll_id',
                                     'conditions'   => '',
                                     'order'        => '',
                                     'limit'        => '',
                                     'unique'       => true,
                                     'finderQuery'  => '',
                                     'deleteQuery'  => '',
                               ),'Reader' =>
                               array('className'    => 'Reader',
                                     'joinTable'    => 'readers_categories',
                                     'foreignKey'   => 'category_id',
                                     'associationForeignKey'=> 'reader_id',
                                     'conditions'   => '',
                                     'order'        => '',
                                     'limit'        => '',
                                     'unique'       => true,
                                     'finderQuery'  => '',
                                     'deleteQuery'  => '',
                               ),'Link' =>
                               array('className'    => 'Link',
                                     'joinTable'    => 'links_categories',
                                     'foreignKey'   => 'category_id',
                                     'associationForeignKey'=> 'link_id',
                                     'conditions'   => '',
                                     'order'        => '',
                                     'limit'        => '',
                                     'unique'       => true,
                                     'finderQuery'  => '',
                                     'deleteQuery'  => '',
                               ),'Content' =>
                               array('className'    => 'Content',
                                     'joinTable'    => 'contents_categories',
                                     'foreignKey'   => 'category_id',
                                     'associationForeignKey'=> 'content_id',
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
			  'message' => 'این فیلد نباید خالی باشد'
		      )
                 ),

// 	         'alias' => array(
// 	             'aliasRule-۱' => array(
// 			'rule' => 'notEmpty',
// 			'message' => 'فیلد نام مستعار نباید خالی باشد'
//                       )       
//                  ),

/*		 'metakey' => array(
                       'metakeyRule-1' => array(
                        'rule' => 'notEmpty',
                        'message' => 'این فیلد نباید خالی باشد'
                     )
                 ),

                'metadesc' => array(
                    
                     'metadescRule-1' => array(
                        'rule' => 'notEmpty',
                        'message' => 'این فیلد نباید خالی باشد'
                     )
                 ),
		
                'access' => array(
                     'accessRule-1' => array(
                        'rule' => 'numeric',
                        'message' => 'این فیلد باید از نوع رقم باشد'
                     ),
                     'accessRule-2' => array(
                        'rule' => 'notEmpty',
                        'message' => 'این فیلد نباید خالی باشد'
                     )
                ),
*/
//                 'content' => array(
//                        
//                      'contentRule-1' => array(
//                         'rule' => 'notEmpty',
//                         'message' => 'این فیلد نباید خالی باشد'
//                        )
//                 ),
	);
	
/*	function paginate($conditions, $fields, $order, $limit, $page = 1, $recursive = null, $contain) {   
	    $params = array(
	          'conditions' => $conditions,
	          'recursive' => $recursive,
	          'fields' => $fields,
	          'order' => $order,
	          'limit' => $limit,
	          'page' => $page,
	    	  'contain' => $contain['contain']
	     );
	     $rows = $this->find('all', $params);
		 for ($i = ($page - 1)*$limit; $i < $limit + ($page - 1)*$limit; $i++) {
	     	$r = $rows[1]['Download'][$i];
	     }
         return $r;
	}
*/
	

}
?>
