<?php
class Recipe extends DataMapper {
    var $has_one    = array();
    var $has_many   = array('language', 'product', 'recipe_image', 'recipe_step');
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    
    function get_full_info($id = false,$current_language = false){        
        #svazivaet nutrition s vibranim language
        if($id){
            $this->get_by_id($id);
            $this->language->include_join_fields()->get_iterated();
            #IMAGE REC
            $this->recipe_image->get_by_image_type(RECIPE_IMAGE_MAIN_TYPE);
            #PRODUCTS
            $this->product->include_join_fields()->where_related('language')->include_join_fields()->get();
            foreach($this->product as $val_product){
                    $val_product->product_category->include_join_fields()->where_in_related('language')->get_iterated();
                    $val_product->mera->include_join_fields()->where_in_related('language')->get_iterated();
            }
            #RECIPES
            $this->recipe_step->include_join_fields()->where_in_related('language')->get_iterated();
        }else{
            $this->include_join_fields()->where_in_related('language')->get_iterated();
            foreach($this as $recipe){
                $recipe->recipe_image->get_by_image_type(RECIPE_IMAGE_MAIN_TYPE);
            }
            $this->id = null;
        }
        #
        
    }
    function save_by_language($data, $current_language = 'Russian'){
        $language = new Language();
        is_numeric($current_language)?$language->get_by_id($current_language):$language->get_by_name($current_language);        
        if(isset($data['name'])) {            
            $this->save($language);    
            $this->set_join_field($language,'name',$data['name']);            
        }
        
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