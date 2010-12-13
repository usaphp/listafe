<?php
class Nutrition extends DataMapper {
	
	var $has_one = array('nutrition_category', 'nutrition');
	var $has_many = array('language', 'product');
    public $data;
//	var $validation = array(
//		'nutritions_categories_id' => array(
//			'label' => 'Название категории состава',
//			'rules' => array('required', 'trim', 'unique')
//		)
//	);
	function __construct($id = NULL){
        parent::__construct($id);
        
    }
    
    function save_by_language($data, $current_language = 'English'){
        $language = new Language();
        is_numeric($current_language)?$language->get_by_id($current_language):$language->get_by_name($current_language);                
        if(isset($data['name'])){
            if(!$this->save($language)) return ;
            $this->set_join_field($language,'name',$data['name']);
        }
        
    }
    
    function get_full_info($id = false, $current_language = 'English'){
        #svazivaet nutrition s vibranim language
        $language = new Language();
        is_numeric($current_language)?$language->get_by_id($current_language):$language->get_by_name($current_language);
        if ($id){
            $this->include_join_fields()->where_related($language)->get_by_id($id);
        }else{
            #!
            #$this->select('id, tagname, value, units')->get();
            $this->select('id, tagname, value, units')->where('short_list',1)->get();
            foreach($this as $nutrition){            
                   $this->data->{strtolower($nutrition->tagname)} = array(
                                            'id'    =>$nutrition->id,
                                            'value' =>$nutrition->value,
                                            'units' =>$nutrition->units
                                            );
            }
            #!
            $full_list = new Nutrition();
            $full_list->select('id, tagname')->get();
            
            foreach($full_list as $elem){        
            print_flex($elem->tagname);
                if(!isset($this->data->{strtolower($elem->tagname)}))
                    $this->data->{strtolower($elem->tagname)} = array(
                                                        'id'    => $elem->id,
                                                        'value' => 0,
                                                        'units' =>''
                                                        );
            }
            $this->id = null;    
        }
        
    }
    
    function get_short_info($id = false, $current_language = 'English'){
        #
        $language = new Language();
        is_numeric($current_language)?$language->get_by_id($current_language):$language->get_by_name($current_language);
        
        #svazivaet nutrition s vibranim language
        if ($id){
            $this->get_by_id($id);
            $this->language->include_join_fields()->get_iterated();
        }else{
            $short_list = new Nutrition();
            $short_list->select('id, tagname')->where('short_list',1)->get_iterated();
            #!
            $this->select('id, tagname, value, units')->where('short_list',1)->get();
            foreach($this as $nutrition){            
                   $this->data->{strtolower($nutrition->tagname)} = array(
                                            'id'    =>$nutrition->id,
                                            'value' =>$nutrition->value,
                                            'units' =>$nutrition->units
                                            );
            }
            #!
            foreach($short_list as $elem){
                if(!isset($this->data->{strtolower($elem->tagname)}))
                    $this->data->{strtolower($elem->tagname)} = array(
                                                        'id'    => $elem->id,
                                                        'value' => 0,
                                                        'units' =>''
                                                        );
            }
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