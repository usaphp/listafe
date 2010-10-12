<?php
class Product_nutrition_fact extends DataMapper {
    
    var $has_many = array();
	var $has_one = array('product', 'nutrition', 'nutrition_category');
	
    
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    
	
}

/* End of file name.php */
/* Location: ./application/models/category.php */
?>