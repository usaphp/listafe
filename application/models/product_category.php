<?php
class Product_category extends DataMapper {
    
    var $has_many = array('product'); 
    
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
    
}

/* End of file name.php */
/* Location: ./application/models/category.php */
?>