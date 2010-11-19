<?php
class Product_category extends DataMapper {
    
    var $has_many = array('language','product'); 
    
//    var $validation = array(
//        'name' => array(
//            'label' => 'Название категрии',
//            'rules' => array('required', 'trim', 'unique')
//        )
//    );
    
    function __construct($id = NULL){
        parent::__construct($id);
    }
    
    function save_by_language($data,$current_language = 'Russian'){
        $language = new Language();
        is_numeric($current_language)?$language->get_by_id($current_language):$language->get_by_name($current_language);                
        if(isset($data['name'])){
            if (!$this->id){
                $this->id = 1;
                $count = $this->count();                
                if($count>=1)
                    $this->id = $this->id + $this->get(1,$count-1)->id;                                                    
                $this->save_as_new($language);
            }
            $this->set_join_field($language,'name',$data['name']);
        }
    }

    function get_full_info($id = false, $current_language = 'Russian'){
        $language   = new Language();
        $language->get_by_name($current_language);
        if($id)
            $this->include_join_fields()->where_related($language)->get_by_id($id);
        else{
            $this->include_join_fields()->get_by_related_language($language);
            $this->id = null;
        }
    }
    
}

/* End of file name.php */
/* Location: ./application/models/category.php */
?>