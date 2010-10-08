<?php
class Nutrition extends DataMapper {

	var $has_one = array('nutritions_category');

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