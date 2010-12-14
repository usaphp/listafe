<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct()
	{
		parent::__construct(FALSE);   	
	}
	
	function index()
	{
        $this->output->enable_profiler(FALSE);
        $this->product_type_by_name();
        #$this->template->load('/templates/main_template', 'homepage');
	}
    
    public function product_categories(){
        array_push($this->data['js_functions'], array('name' => 'home_product_categories_init', 'data' => FALSE));
        
        $product_categories         = new Product_category();
        $product_category_selected  = new Product_category();
        
        $product_categories ->get_full_info();
        
        if(isset($prodcut_categories_name))
            $product_category_selected->get_full_info($category_name);
            
        $this->data['dm_product_categories']        = $product_categories;
        $this->data['dm_product_category_selected'] = $product_category_selected;
        $this->template->load('/templates/main_template', 'homepage',$this->data);
    }
    
    public function product_types($category_name = FALSE){
        if(!$category_name) echo 'product_types return false';
        array_push($this->data['js_functions'], array('name' => 'home_product_types_init', 'data' => FALSE));
        #!
        $product_categories = new Product_category();
        #!
        $product_category_selected = new Product_category();        
        #!
        $product_categories->get_full_info();
        $product_category_selected->get_full_info($category_name);
        #!        
        $product_category_selected->product_type->get_full_info();
        #!
        $this->data['dm_product_categories']        = $product_categories;
        $this->data['dm_product_category_selected'] = $product_category_selected;
        $this->data['dm_product_types']             = $product_category_selected->product_type;
        #!        
        $this->template->load('/templates/main_template', 'homepage',$this->data);
    }
    
    public function products_by_type($category_name = '', $type_name = '', $type_id = false){
        if(!$type_id) echo 'return false';
        array_push($this->data['js_functions'], array('name' => 'home_products_init', 'data' => FALSE));
        #!
        $product_categories = new Product_category();
        $product_type       = new Product_types();        
        #Vse categorii
        $product_categories->get_full_info();                
        #!
        $product_type_selected->get_full_info($type_id);
        $product_category_selected->get_by_related($product_type)->get();
        $product_type_selected->product->get_full_info();
        #!
        $this->data['dm_product_categories']    = $product_category;
        $this->data['dm_product_types']         = $product_type;
        #!
        $this->data['dm_product_category_selected'] = $product_category_selected;
        $this->data['dm_product_type_selected']     = $product_type_selected;
        $this->data['dm_products']                  = $product_type_selected->product;
        
        $this->template->load('/templates/main_template', 'homepage',$this->data);
    }
    
    public function product_type_by_name(){
        array_push($this->data['js_functions'], array('name' => 'main_search_init', 'data' => FALSE));
        $this->template->load('/templates/main_template', 'homepage',$this->data);    
    }
    
    public function product_show($product_id, $product_name = ''){
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
    
    function reciepts()
    {
        $this->template->load('/templates/main_template', 'reciepts');
    }
}

/* End of file admin.php */
/* Location: ./system/application/controllers/admin.php */