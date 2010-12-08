<?php
class Product_category extends DataMapper {
    
    var $has_many = array('language','product_type'); 
    
//    var $validation = array(
//        'name' => array(
//            'label' => 'Название категрии',
//            'rules' => array('required', 'trim', 'unique')
//        )
//    );
    
    function __construct($id = NULL){
        parent::__construct($id);
    }
    
    function save_by_language($data,$current_language = 'Russian'){
        $language = new Language();
        is_numeric($current_language)?$language->get_by_id($current_language):$language->get_by_name($current_language);                
        if(isset($data['name'])){
            $this->value = 1;
            $this->save($language);
            $this->set_join_field($language,'name',$data['name']);
        }
    }
    function get_full_info($id_name = false, $current_language = 'English'){
        $language = new Language();
        is_numeric($current_language)?$language->get_by_id($current_language):$language->get_by_name($current_language);
        if ($id_name){
            if(is_numeric($id_name)){
                $this->get_by_id($id_name);                    
            }else
                $this->include_join_fields()->where_related($language)->get();            
            $this->language->include_join_fields()->get_iterated();
        }else{
            $this->include_join_fields()->where_related($language)->get_iterated();
            $this->id = null;
        }
    }
}

/* End of file name.php */
/* Location: ./application/models/category.php */
?>