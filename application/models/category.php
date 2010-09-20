<?php
class Category extends DataMapper {
    
    var $has_many = array('product');
    var $table = 'categories'; 
    
    var $validation = array(
        'name' => array(
            'label' => 'Название категрии',
            'rules' => array('required', 'trim', 'unique')
        )
    );
    
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    
    function array_for_dropbox(){
        $o = $this->get_iterated();
        $data = array('' => 'Выберите категорию');
        foreach($o as $obj){
            $data[$obj->id] = $obj->name;
        }
        return $data;
    }
}

/* End of file name.php */
/* Location: ./application/models/category.php */
?>