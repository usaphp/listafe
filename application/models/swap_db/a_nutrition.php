<?php
class A_Nutrition extends DataMapper {
	var $table = 'a_nutritions';
	var $has_one = array('a_nutrition_category');
	var $has_many = array('a_language','a_product');
                          
//	var $validation = array(
//		'nutritions_categories_id' => array(
//			'label' => 'Название категории состава',
//			'rules' => array('required', 'trim', 'unique')
//		)
//	);
	function __construct($id = NULL){
        parent::__construct($id);
        
    }
    
    function save_by_language($data, $current_language = 'Russian'){
        $language = new Language();
        is_numeric($current_language)?$language->get_by_id($current_language):$language->get_by_name($current_language);                
        if(isset($data['name'])){
            if(!$this->save($language)) return ;
            $this->set_join_field($language,'name',$data['name']);
        }
        
    }
    
    function get_full_info($id = false, $current_language = false){
        
        
        #svazivaet nutrition s vibranim language
        if ($id){
            $this->get_by_id($id);
            $this->language->include_join_fields()->get_iterated();
        }else{
            $language = new Language();
            if ($current_language)                
                $language->get_by_name($current_language);
            else
                $language->get_by_name('Russian');
            $this->include_join_fields()->where_in_related($language)->get_iterated();
            $this->id = null;    
        }
        
    }
}