<?php
class Meras_Product extends DataMapper {
    
    var $has_one = array('product','mera');
    
    
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>