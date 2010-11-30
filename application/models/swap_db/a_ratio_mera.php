<?php
class A_Ratio_mera extends DataMapper {
    
    var $has_one = array('a_product');
    
    
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>