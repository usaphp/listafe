<?php
class A_Product_property extends DataMapper {
    #
    var $table      = 'a_product_properties';
    var $has_one    = array();
    var $has_many   = array('a_language','a_product');
    #        
    function __construct($id = NULL)
    {
        
        parent::__construct($id);
    }
    
}

/* End of file name.php */
/* Location: ./application/models/product_image.php */
?>