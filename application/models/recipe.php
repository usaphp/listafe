<?php
class Recipe extends DataMapper {
    
    var $has_many = array('product','recipes_image','recipes_step');
                        
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    
    function get_full_info() {
        $query = $this->db->select('recipes.*, recipes_images.id as recipes_image_id')
                        ->from('recipes')
                        ->join('recipes_images', 'recipes_images.recipe_id = recipes.id', 'left')
                        ->get()
                        ->result();
        $this->data = $query;
    }
}

/* End of file name.php */
/* Location: ./application/models/category.php */
?>