<?php
class Reader extends AppModel {

	var $name = 'Reader';
    var $hasAndBelongsToMany = array('Category' =>
                               array('className'    => 'Category',
                                     'joinTable'    => 'readers_categories',
                                     'foreignKey'   => 'reader_id',
                                     'associationForeignKey'=> 'category_id',
                                     'conditions'   => '',
									 'fields'		=>  '',
                                     'order'        => '',
                                     'limit'        => '',
                                     'unique'       => true,
                                     'finderQuery'  => '',
                                     'deleteQuery'  => '',
                               )); 	

}
?>