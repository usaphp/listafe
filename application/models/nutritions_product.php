<?php
class Nutritions_product extends DataMapper {
    
    var $has_many = array();
	var $has_one = array('product', 'nutrition');
	
    
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    
	
}

?>