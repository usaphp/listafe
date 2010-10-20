<?php
class Product_nutrition_category_fact extends DataMapper {
    
    var $has_many = array();
	var $has_one = array('product', 'nutrition_category');
	
    
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    
	
}

?>