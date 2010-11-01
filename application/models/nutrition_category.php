<?php
class Nutrition_category extends DataMapper {
    
    var $has_many = array('nutrition', 'nutrition_categories_product');
    var $has_one = array('product');
    var $table = 'nutrition_categories'; 
    
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