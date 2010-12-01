<?php
class Mera extends DataMapper {
    
    var $has_many = array('language','product');
    
//    var $validation = array(
//        'name' => array(
//            'label' => 'Мера измерения по умолчанию',
//            'rules' => array('required', 'trim', 'unique')
//        )
//    );
    
    function __construct($id = NULL){
        parent::__construct($id);
    }
    
    function get_full_info($id = false, $current_language = 'English'){
        $language = new Language();
        $language->get_by_name($current_language);
        if($id)
            $this->include_join_fields()->where_related($language)->get_by_id($id);
        else
            $this->include_join_fields()->get_by_related($language);
    }

    function array_for_dropbox(){
        $o = $this->get_iterated();
        $data = array('' => 'Выберите меру измерения');
        foreach($o as $obj){
            $data[$obj->id] = $obj->name;
        }
        return $data;
    }
    
}

/* End of file name.php */
/* Location: ./application/models/product_image.php */
?>