<?php
class Nutrition extends DataMapper {
	
	var $has_one = array('nutrition_category');
	var $has_many = array('language','product');
                          
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
            
        #NE MENAT' POSLEDOVATEL'NOST' - NE Budet rabotat'
        if(isset($data['nutrition_category']))  $this->nutrition_category_id = $data['nutrition_category'];
        $this->save($language);
        if(isset($data['name']))                $this->set_join_field($language,'name',$data['name']);
        
    }
    
    function get_full_info($id = false, $current_language = false){        
        #svazivaet nutrition s vibranim language
        if ($id){
            $this->get_by_id($id);
            $this->language->include_join_fields()->get_iterated();
        }else{
            $this->include_join_fields()->where_in_related('language')->get_iterated();
            $this->id = null;    
        }
        
    }
}