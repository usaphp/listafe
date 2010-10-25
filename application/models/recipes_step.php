<?php
class Recipes_Step extends DataMapper {
    
    var $has_one = array('recipe');
    
    function __construct($id = NULL)
    {
        parent::__construct();
    }
    function get_count(){
        return $this->db->count_all_results('recipes_steps');
    }
}

/* End of file name.php */
/* Location: ./application/models/product_image.php */
?>