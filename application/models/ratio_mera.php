<?php
class Ratio_mera extends DataMapper {
    
    var $has_one = array('product');
    
    
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>