<?php
class Language extends DataMapper {
    
    var $has_many = array('recipe','recipes_step','product_category','product','nutrition_category','nutrition','mera');
            
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    
}

/* End of file name.php */
/* Location: ./application/models/product_image.php */
?>