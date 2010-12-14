<?php
class Nutrition_category extends DataMapper {
    var $table = 'nutrition_categories';
    var $has_one = array();
    var $has_many = array('language','nutrition');    
//    var $validation = array(
//        'name' => array(
//            'label' => 'Название категрии',
//            'rules' => array('required', 'trim', 'unique')
//        )
//    );
//    
    function __construct($id = NULL){
        parent::__construct($id);
    }
    function get_full_info($id = false,$current_language = 'English'){        
        #svazivaet nutrition s vibranim language
        $language = new Language();
        is_numeric($current_language)?$language->get_by_id($current_language):$language->get_by_name($current_language);
        if ($id){
            $this->include_join_fields()->where_related($language)->get_by_id($id);
        }else{
            $this->include_join_fields()->where_related($language)->get_iterated();
            $this->id = null;    
        }
    }
    function save_by_language($data,$current_language = 'Russian'){        
        $language = new Language();
        is_numeric($current_language)?$language->get_by_id($current_language):$language->get_by_name($current_language);        
        #
        if(isset($data['name'])){
            $this->value = 1;
            $this->save($language);
            $this->set_join_field($language, 'name', $data['name']);
        }
        #
    }
}

/* End of file name.php */
/* Location: ./application/models/category.php */
?>