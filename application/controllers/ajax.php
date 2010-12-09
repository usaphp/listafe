<?php
	class Pablic_ajax extends MY_Controller{
        public function __construct()
    	{
    		parent::__construct(FALSE);
            $this->output->enable_profiler(FALSE);
    	}
            	
    	public function index(){
        
    	}
        
        public function suggest_product_types(){
            $product_types = $this->input->post('q', TRUE);
            
            $product_types = new Languages_Product_type();
            $products      = new Product();
            $product_types->like('name', $product_type, 'after')->get_iterated();
            #$products->get_full_info();
    		
    		foreach($product_types as $product_type){
    			echo $product_type->name."\n";
    		}
    		return;
        }
        
        
	}
?>