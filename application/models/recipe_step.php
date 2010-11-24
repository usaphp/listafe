<?php
class Recipe_Step extends DataMapper {    
    var $has_one    = array('recipe');
    var $has_many   = array('language');
    function __construct($id = NULL)
    {
        parent::__construct();
    }
    
    function save_by_language($data,$current_language = 'Russian'){
        $language = new Language();
        is_numeric($current_language)?$language->get_by_id($current_language):$language->get_by_name($current_language);        
        #
        if(isset($data['text'])){            
            $this->save($language);
            $this->set_join_field($language, 'text', $data['text']);
        }
        #
    }
    function get_count(){
        return $this->db->count_all_results('recipe_steps');
    }
}

/* End of file name.php */
/* Location: ./application/models/product_image.php */
?>