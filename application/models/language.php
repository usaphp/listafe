<?php
class Language extends DataMapper {
    
    var $has_many = array('recipe','recipe_step','product_category', 'product_type', 'product','nutrition_category','nutrition','mera');
            
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    
}

/* End of file name.php */
/* Location: ./application/models/product_image.php */
?>