<?php
class Mera_for_price extends DataMapper {
    
    var $has_many = array('a_product','a_mera');
    
//    var $validation = array(
//        'name' => array(
//            'label' => '���� ��������� �� ���������',
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

    function array_for_dropbox(){
        $o = $this->get_iterated();
        $data = array('' => '�������� ���� ���������');
        foreach($o as $obj){
            $data[$obj->id] = $obj->name;
        }
        return $data;
    }
}

/* End of file name.php */
/* Location: ./application/models/product_image.php */
?>