<?php
class A_Mera_category extends DataMapper {
    var $table      = 'a_mera_categories';
    var $has_many   = array('a_language','a_mera');
    
//    var $validation = array(
//        'name' => array(
//            'label' => 'Мера измерения по умолчанию',
//            'rules' => array('required', 'trim', 'unique')
//        )
//    );
    
    function __construct($id = NULL){
        parent::__construct($id);
    }
    
    function get_full_info($id = false, $current_language = 'Russian'){
        $language = new Language();
        $language->get_by_name($current_language);
        if($id)
            $this->include_join_fields()->where_related($language)->get_by_id($id);
        else
            $this->include_join_fields()->get_by_related($language);
    }
}

/* End of file name.php */
/* Location: ./application/models/product_image.php */
?>