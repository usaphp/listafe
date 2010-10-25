<?php
class Product extends Datamapper {
    
    var $has_one = array('product_category', 'mera');
    var $has_many = array('product_nutrition_fact', 'product_nutrition_category_fact', 'recipe'); 
    
    var $validation = array(
        'name' => array(
            'label' => 'Название продукта',
            'rules' => array('required', 'trim', 'unique')
        )
    );
    
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    
}

/* End of file name.php */
/* Location: ./application/models/product.php */
?>