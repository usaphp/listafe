<?php
class Nutrition_categories_Product extends DataMapper {
    
    var $has_one = array('nutrition_category', 'product');
    var $table = 'nutrition_categories_products';
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