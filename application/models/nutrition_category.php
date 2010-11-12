<?php
class Nutrition_category extends DataMapper {
    
    var $has_many = array('language','nutrition', 'nutrition_categories_product');
    var $has_one = array('product');
    var $table = 'nutrition_categories'; 
    
//    var $validation = array(
//        'name' => array(
//            'label' => 'Название категрии',
//            'rules' => array('required', 'trim', 'unique')
//        )
//    );
//    
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    function save_by_language($key = false, $value = false,$current_language = 'Russian'){
        if(!($key && $value)) return false;
        $language = new Language();
        $language->get_by_name($current_language);                
        $this->set_join_field($language,$key,$value);
        if($this->save())return true;
        return false;        
    }
    function get_full_info($id = false,$current_language = 'Russian'){
        $language = new Language();
        $language->get_by_name($current_language);
        #svazivaet nutrition s vibranim language
        if($id) 
            $this->include_join_fields()->where_related($language)->get_by_id($id);
        else
            $this->include_join_fields()->get_by_related_language($language);
    }
	
}

/* End of file name.php */
/* Location: ./application/models/category.php */
?>