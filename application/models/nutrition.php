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
        $language->get_by_name($current_language);        
        #NE MENAT' POSLEDOVATEL'NOST' - NE Budet rabotat'
        if(isset($data['nutrition_category']))  $this->nutrition_category_id = $data['nutrition_category'];
        $this->save($language);
        if(isset($data['name']))                $this->set_join_field($language,'name',$data['name']);
        
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