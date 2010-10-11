<?php
class Mera extends DataMapper {
    
    var $has_many = array('product');
    
    var $validation = array(
        'name' => array(
            'label' => 'Мера измерения по умолчанию',
            'rules' => array('required', 'trim', 'unique')
        )
    );
    
    function __construct($id = NULL)
    {
        parent::__construct($id);
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