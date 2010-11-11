<?php
class Nutrition extends DataMapper {
	
	var $has_one = array('nutrition_category');
	var $has_many = array('language','nutritions_product','product');
                          
	var $validation = array(
		'name' => array(
			'label' => 'Название категрии состава',
			'rules' => array('required', 'trim', 'unique')
		)
	);

	function __construct($id = NULL){
        parent::__construct($id);
    }


}