<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MY_Controller {

	function __construct(){
		parent::__construct(FALSE);   	
	}
	
	function index(){
        $this->show();
	}
    
    public function show($product_id, $product_name = ''){
        if(!$product_id) echo 'product_show return false';
        array_push($this->data['js_functions'], array('name' => 'home_prodcut_show_init', 'data' => FALSE));
        #!
        $product_category_selected  = new Product_category();
        $product_type_selected      = new Product_type();
        $product_selected           = new Product();
        $nutrition_categories       = new Nutrition_category();
        #!
        $product_selected->get_full_info($product_id);
        $product_selected->nutrition->get_full_info();
        
        #$product_selected->nutrition->convert_to_mera(2);
        $product_type_selected->get_full_info($product_selected->product_type_id);
        $product_type_selected->product->get_full_info();
        
        $product_category_selected->get_full_info($product_type_selected->product_category_id);        
        $nutrition_categories->get_full_info();
        #!
        $meras_available = array('100 gramms');
        foreach($product_selected->mera as $mera){                
            $meras_available[$mera->join_seq] = $mera->join_name.' ( '.$mera->join_value.' )';
        }
        #!
        $this->data['meras_available']              = $meras_available;
        $this->data['dm_product_category_selected'] = $product_category_selected;
        $this->data['dm_product_type_selected']     = $product_type_selected;
        $this->data['dm_product_selected']          = $product_selected;
        $this->data['dm_nutrition_categories']      = $nutrition_categories;
        #nutritions by selected product
        $this->data['dm_nutritions']                = $product_selected->nutrition;
        $this->data['dm_products']                  = $product_type_selected->product;        
        array_push ($this->data['crumbs'], array('name'=>'home', 'link'=> $this->linker->home_page_link()));
        array_push ($this->data['crumbs'], array('name'=>$product_selected->join_name,'link'=>false));
        #!
        $this->template->load('/templates/main_template', '/products/product_show',$this->data);
    }
}    
?>