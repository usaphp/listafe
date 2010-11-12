<?php
class Nutrition extends DataMapper {
	
	var $has_one = array('nutrition_category');
	var $has_many = array('language','nutritions_product','product');
                          
//	var $validation = array(
//		'nutritions_categories_id' => array(
//			'label' => 'Название категории состава',
//			'rules' => array('required', 'trim', 'unique')
//		)
//	);
	function __construct($id = NULL){
        parent::__construct($id);
        
    }
    function get_full_info($id = false, $current_language = 'Russian'){
        $language = new Language();
        $language->get_by_name($current_language);
        #svazivaet nutrition s vibranim language
        if ($id)
            $this->include_join_fields()->where_related($language)->get_by_id($id);
        else                     
            $this->include_join_fields()->get_by_related($language);       
    }
}