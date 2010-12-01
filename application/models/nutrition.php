<?php
class Nutrition extends DataMapper {
	
	var $has_one = array('nutrition_category');
	var $has_many = array('language','product');
                          
//	var $validation = array(
//		'nutritions_categories_id' => array(
//			'label' => 'Название категории состава',
//			'rules' => array('required', 'trim', 'unique')
//		)
//	);
	function __construct($id = NULL){
        parent::__construct($id);
        
    }
    
    function save_by_language($data, $current_language = 'Russian'){
        $language = new Language();
        is_numeric($current_language)?$language->get_by_id($current_language):$language->get_by_name($current_language);                
        if(isset($data['name'])){
            if(!$this->save($language)) return ;
            $this->set_join_field($language,'name',$data['name']);
        }
        
    }
    
    function get_full_info($id = false, $current_language = false){
        
        
        #svazivaet nutrition s vibranim language
        if ($id){
            $this->get_by_id($id);
            $this->language->include_join_fields()->get_iterated();
        }else{
            $language = new Language();
            if ($current_language)                
                $language->get_by_name($current_language);
            else
                $language->get_by_name('Russian');
            $this->include_join_fields()->where_in_related($language)->get_iterated();
            $this->id = null;    
        }
        
    }
    function convert_to_mera($sequence = 0){        
        if ($sequence == 0){
            $this->include_join_fields()->where_related('language','id',1)->include_join_fields()->get();                    
            return ;
        }
        $ratio_mera = new Ratio_mera();
        $ratio_mera->where(array('seq' => $sequence, 'product_id' => $this->parent['id']))->get();
        if($ratio_mera->exists()){
            $factor = $ratio_mera->weight/100;
            foreach($this as $nutrition){
                $nutrition->join_weight = $factor*$nutrition->join_weight;
            }
        }
        return $this;
    }
}