<?php
class Nutrition_category extends DataMapper {
    var $table = 'nutrition_categories';
    var $has_one = array('product');
    var $has_many = array('language','nutrition', 'nutrition_categories_product');    
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
    function save_by_language($data,$current_language = 'Russian'){
        $language = new Language();
        $language->get_by_name($current_language);                
        if(isset($data['name']))    $this->set_join_field($language,'name',$data['name']);                       
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