<?php
class Product_Recipe extends DataMapper {
    
    var $has_many = array('product','recipe');
    
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    
}