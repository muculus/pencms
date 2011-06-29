<?php
class StarOwner extends AppModel {

	var $name = 'StarOwner';
	var $actsAs = array('SoftDeletable');

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Star' => array('className' => 'Star',
								'foreignKey' => 'star_owner_id',
								'dependent' => true,
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
			)
);

      var $validate = array(
           'first_name' => array(
             'first_nameRule-1' => array(
                'rule' => 'notEmpty',
                'message' => 'این فیلد نباید خالی باشد'
             )
           ),

	  'lastname' => array(
             'lastnameRule-1' => array(
                'rule' => 'notEmpty',
                'message' => 'این فیلد نباید خالی باشد'
              )
           ),

          'tel' => array(
             'telRule-1' => array(
                'rule' => 'notEmpty',
                'message' => 'این فیلد نباید خالی باشد'
              )
           ),

          'address' => array(
             'addressRule-2' => array(
                'rule' => 'notEmpty',
                'message' => 'این فیلد نباید خالی باشد'
              ) 
           ),

           'date_payment' => array(
              'date_paymentRule-1' => array(
                 'rule' => 'date',
                 'message' => 'این فیلد باید از نوع تاریخ باشد',
               ),
              'date_paymentRule-2' => array(
                 'rule' => 'notEmpty',
                 'message' => 'این فیلد نباید خالی باشد'
               )
          ),

            'star' => array(
               'starRule-1' => array(
                 'rule' => 'numeric',
                 'message' => 'این فیلد باید از نوع عددی یا کاراکتری باشد',
               ),
              'starRule-2' => array(
                 'rule' => 'notEmpty',
                 'message' => 'این فیلد نباید خالی باشد'
               )
           ),

            'price' => array(
               'priceRule-1' => array(
                 'rule' => 'notEmpty',
                 'message' => 'این فیلد نباید خالی باشد'
               )
          ),

            'url' => array(
                'urlRule-2' => array(
                  'rule' => 'notEmpty',
                  'message' => 'این فیلد نباید خالی باشد'
                )
          )
	);

	
}
?>