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
            #
            #$this->select('id, tagname, value, units')->get();
            $this->select('id, tagname, value, units, nutrition_category_id, Group_List')->include_join_fields()->where_related($language)->get();
            #создает объектную модель данных для одбращения к данным через свойства объекта
            foreach($this as $nutrition){
                   $this->data->{strtolower($nutrition->tagname)} = array(
                                            'id'    =>$nutrition->id,
                                            'value' =>$nutrition->value,
                                            'units' =>$nutrition->units
                                            );
            }
            #добавляет нулевые значения к отсутствующим данным 
            #full_list - определяет полный перечень nutritions
            $full_list = new Nutrition();
            $full_list->select('id, nutrition_category_id, units, Group_List, Num_Dec, Tagname as tagname')->include_join_fields()->where_related_language('id',1)->limit(1)->get();            
            foreach($full_list as $elem){                
                if(!isset($this->data->{strtolower($elem->tagname)})){
                    $this->all[] = $elem;
                    $this->data->{strtolower($elem->tagname)} = array(
                                                        'id'    => $elem->id,
                                                        'value' => '~',
                                                        'units' =>''
                                                        );
                                        
                }
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
            $full_list = new Nutrition();
            $full_list->select('id, tagname')->where('Group_List',3)->get_iterated();
            #создает объектную модель данных для одбращения к данным через свойства объекта
            $this->select('id, tagname, value, units')->where('group_list',3)->get();
            foreach($this as $nutrition){            
                   $this->data->{strtolower($nutrition->tagname)} = array(
                                            'id'    =>$nutrition->id,
                                            'value' =>$nutrition->value,
                                            'units' =>$nutrition->units
                                            );
            }
            #добавляет нулевые значения к отсутствующим данным 
            foreach($full_list as $elem){
                if(!isset($this->data->{strtolower($elem->tagname)}))
                    $this->data->{strtolower($elem->tagname)} = array(
                                                        'id'    => $elem->id,
                                                        'value' => '~',
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
            $factor = $ratio_mera->value/100;
            foreach($this as $nutrition){
                $nutrition->value = $factor*$nutrition->value;
                $this->data->{strtolower($nutrition->tagname)}['value'] =  $nutrition->value;
                #echo $this->data->{strtolower($nutrition->tagname)}['value']; 
            }
        }
        #print_flex($this);
    }
}
?>