<?php
class Language extends DataMapper {
    
    var $has_many = array('recipe','recipe_step','product_category', 'product_type', 'product','nutrition_category','nutrition','mera');
            
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    function get_full_info($id = false){        
        #        
        
        if($id){
            $this->include_join_fields()->get_by_id($id);
            #$this->nutrition->get_full_info();
            #$this->nutrition->include_join_fields()->where_related($language)->include_join_fields()->get();
            $this->mera->include_join_fields()->where_related($language)->include_join_fields()->get_iterated();
        }else{
            $this->include_join_fields()->get();            
            $this->id = null;
        }
    }
}

/* End of file name.php */
/* Location: ./application/models/product_image.php */
?>