<?php
class Short_list_nutrition extends DataMapper {
    
    var $has_many   = array();
    var $has_one    = array('nutrition');

    function __construct($id = NULL){
        parent::__construct($id);
    }
    
    
}

/* End of file name.php */
/* Location: ./application/models/product_image.php */
?>