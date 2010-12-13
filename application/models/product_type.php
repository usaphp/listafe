<?php
	class Product_type extends DataMapper{
        var $has_one    = array('product_category');
        var $has_many   = array('product', 'language');
        public function __construct() {
            parent::__construct();
        }
        
        function get_full_info($id = false,$current_language = 'English'){
            #
            $language = new Language();
            is_numeric($current_language)?$language->get_by_id($current_language):$language->get_by_name($current_language);
            if($id){
                $this->get_by_id($id);
                $this->language->include_join_fields()->get_iterated();            
            }else{
                $this->include_join_fields()->where_related($language)->get();
                $this->id = null;
            }
        }

	}
?>