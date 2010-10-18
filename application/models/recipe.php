<?php
class Recipe extends DataMapper {
    
    var $has_many = array('product');
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    
}

/* End of file name.php */
/* Location: ./application/models/category.php */
?>