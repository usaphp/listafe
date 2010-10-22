<?php
class Products_Recipe extends DataMapper {
    
    var $has_one = array('product','recipe');
    
    
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>