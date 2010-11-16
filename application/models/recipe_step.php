<?php
class Recipe_Step extends DataMapper {    
    var $has_one    = array('recipe');
    var $has_many   = array('language');
    function __construct($id = NULL)
    {
        parent::__construct();
    }
    
    function get_count(){
        return $this->db->count_all_results('recipe_steps');
    }
}

/* End of file name.php */
/* Location: ./application/models/product_image.php */
?>