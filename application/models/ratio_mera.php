<?php
class Ratio_mera extends DataMapper {
    var $table   = 'meras_products';
    var $has_one = array('product','mera');
    
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>