<?php
class Product extends Datamapper {
    
    var $has_one = array('product_category');
    var $has_many = array('mera', 'recipe', 'nutrition', 'ratio_mera', 'nutritions_product', 'nutrition_category', 'products_recipe','nutrition_categories_product'); 
    
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