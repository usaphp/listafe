<?php
class Nutrition_category extends DataMapper {
    
    var $has_many = array('nutrition', 'product','nutrition_categories_product');
    var $table = 'nutrition_categories'; 
    
    var $validation = array(
        'name' => array(
            'label' => 'Название категрии',
            'rules' => array('required', 'trim', 'unique')
        )
    );
    
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    function get_values($product_id){
        $nutr_category_values = new Nutrition_categories_Product();
        $nutr_category_values->where('product_id',$product_id);
        foreach($this->all as $nutr_category)
            $nutr_category_values->or_where_related($nutr_category);            
        $nutr_category_values->get();
        #print_flex($nutr_category_values->all[0]);
        foreach($nutr_category_values as $val)
            foreach($this->all as $key => $nutr_category)
                if ($nutr_category->id == $val->nutrition_category_id){
                    $this->all[$key]->value = $val->value;
                    echo 'key = '.$key.'<br/>';
                    echo $val->value.'<br/>';
                } 
                    
                    #array_push($this->all[$key],array('value' => $val->value));#echo $val->value.' '.$key.'; ';# $this->all[$key]->value = $val->value;
        echo $this->all[0]->value;
        echo $this->all[1]->value;
        echo $this->all[2]->value;
        #print_flex($this->all[0]);
        
    }
	
}

/* End of file name.php */
/* Location: ./application/models/category.php */
?>