<?php
class Recipes_Image extends DataMapper {
    
    var $has_one = array('recipe');
    
    function __construct($id = NULL)
    {
        parent::__construct();
    }
    function get_count(){
        $query = $this->db->count_all_results('recipes_images');
        return $query;
    }
}

/* End of file name.php */
/* Location: ./application/models/product_image.php */
?>