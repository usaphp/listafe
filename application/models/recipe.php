<?php
class Recipe extends DataMapper {
    
    var $has_many = array('language', 'product', 'recipes_image', 'recipes_step', 'products_recipe');
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
    function get_products(){
        $query = $this->db->select('products_recipes.*,products.name,products.image')
                            ->from('products_recipes')
                            ->join('products','products.id = products_recipes.product_id') 
                            ->where('products_recipes.recipe_id',$this->id)
                            ->get()
                            ->result();
        $this->products = $query;
        
    }
    function get_image(){
        foreach($this as $recipe)
            $recipe->recipes_image->get_by_image_type(RECIPE_IMAGE_MAIN_TYPE);            
    }
    
}

/* End of file name.php */
/* Location: ./application/models/category.php */
?>