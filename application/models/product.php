<?php
class Product extends Datamapper {
    
    var $has_one = array('product_category');
    var $has_many = array('language', 'languages_product', 'mera', 'recipe', 'nutrition', 'ratio_mera', 'nutrition_category'); 
    
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
        is_numeric($current_language)?$language->get_by_id($current_language):$language->get_by_name($current_language);       
        if(isset($data['name']))        $this->set_join_field($language,'name',$data['name']);        
        if(isset($data['description'])) $this->set_join_field($language,'description',$data['description']);
    }
    function get_full_info($id = false){        
        #                
        if($id){
            $this->get_by_id($id);
            $this->language->include_join_fields()->get_iterated();
            $this->nutrition_category->get_full_info();
            $this->nutrition->include_related('nutrition_category')->where_in_related('language')->get_iterated();
            $this->product_category->include_join_fields()->where_in_related('language')->get_iterated();
            $this->mera->include_join_fields()->where_in_related('language')->get_iterated();
        }else{
            $this->include_join_fields()->where_in_related('language')->get_iterated();
            foreach($this as $product){
                $product->product_category->include_join_fields()->where_in_related('language')->get_iterated();
                $product->mera->include_join_fields()->where_in_related('language')->get_iterated();            
            }
            $this->id = null;
        }        
    }
    function get_by_name($name = false,$current_language = false){
        if(!$name) return ;        
        $this->where_related_languages_product('name',$name)->get();
    } 
    function get_ratios($ratio = false){
        $dm_ratio = new Ratio_mera();
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