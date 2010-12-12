<?php
class Languages_Product_type extends DataMapper {
    var $has_one    = array('language','product_type');
    var $has_many   = array();
            
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    
}

/* End of file name.php */
/* Location: ./application/models/product_image.php */
?>