<?php
class Recipe extends DataMapper {
    var $has_one    = array();
    var $has_many   = array('language', 'product', 'recipes_image', 'recipes_step', 'products_recipe');
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    
    function get_full_info($id = false, $current_language = 'Russian'){
        $language = new Language();
        $language->get_by_name($current_language);
        #svazivaet nutrition s vibranim language
        if($id){
            $this->include_join_fields()->where_related($language)->get_by_id($id);
            #IMAGE REC
            $this->recipes_image->get_by_image_type(RECIPE_IMAGE_MAIN_TYPE);
            #PRODUCTS
            $this->product->include_join_fields()->where_related($language)->include_join_fields()->get();
            foreach($this->product as $val_product){
                    $val_product->product_category->include_join_fields()->get_by_related_language($language);
                    $val_product->mera->include_join_fields()->get_by_related_language($language);
            }            
            #RECIPES
            $this->recipes_step->include_join_fields()->get_by_related($language);
        }else{
            $this->include_join_fields()->get_by_related($language);
            foreach($this as $recipe){
                $recipe->recipes_image->get_by_image_type(RECIPE_IMAGE_MAIN_TYPE);
            }
        }
        #
        
    }
    function save_by_language($data, $current_language = 'Russian'){
        $language = new Language();
        $language->get_by_name($current_language);
        if(isset($data['name'])) $this->set_join_field($language,'name',$data['name']);                        
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
}

/* End of file name.php */
/* Location: ./application/models/category.php */
?>