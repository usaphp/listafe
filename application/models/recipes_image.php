<?php
class Recipes_image extends DataMapper {
    
    var $has_one = array('recipe');
    
    function __construct($id = NULL)
    {
        parent::__construct();
    }
}

/* End of file name.php */
/* Location: ./application/models/product_image.php */
?>