<?php
class Product extends Datamapper {
    
    var $has_one = array('product_category', 'mera');
    var $has_many = array('nutritions_product', 'recipe', 'nutrition_category', 'products_recipe','nutrition_categories_product','nutrition'); 
    
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