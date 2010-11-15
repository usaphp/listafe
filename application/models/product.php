<?php
class Product extends Datamapper {
    
    var $has_one = array('product_category');
    var $has_many = array('language', 'mera', 'recipe', 'nutrition', 'ratio_mera', 'nutritions_product', 'nutrition_category', 'products_recipe','nutrition_categories_product'); 
    
//    var $validation = array(
//        'name' => array(
//            'label' => 'Название продукта',
//            'rules' => array('required', 'trim', 'unique')
//        )
//    );
    
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    function save_by_language($data,$current_language = 'Russian'){        
        $language = new Language();
        $language->get_by_name($current_language);        
        if(isset($data['name']))        $this->set_join_field($language,'name',$data['name']);        
        if(isset($data['description'])) $this->set_join_field($language,'description',$data['description']);
    }
    function get_full_info($id = false, $current_language = 'Russian'){
        $language   = new Language();
        $language->get_by_name($current_language);
        #        
        $this->include_join_fields()->get_by_related_language($language);
        foreach($this as $product){
            $product->product_category->include_join_fields()->get_by_related_language($language);
            $product->mera->include_join_fields()->get_by_related_language($language);
        }        
    }
    function get_ratios($ratio = false){
        $dm_ratio   = new Ratio_mera();
        $dm_ratio->where_related($this);
        if (!$ratio) return $dm_ratio->get();
        $dm_ratio->where('scalar',$ratio['scalar'])
                 ->where('relative',$ratio['relative'])
                 ->get();
        return $dm_ratio;
    }    
}

/* End of file name.php */
/* Location: ./application/models/product.php */
?>