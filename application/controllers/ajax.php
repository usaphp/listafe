<?php
	class Ajax extends MY_Controller{
        public function __construct()
    	{
    		parent::__construct(FALSE);
            $this->output->enable_profiler(FALSE);
    	}
            	
    	public function index(){
        
    	}
        
        public function search_suggest_products(){

            $product_types = $this->input->post('query_string', TRUE);
            
            $product_types = new Languages_Product_type();
            $products      = new Product();
            $product_types->like('name', $product_type, 'after')->get_iterated();
            $products->get_full_info(1);
    		
            $return_arr = array('product_types' => $product_types, 'product_items' => $products);
            echo json_encode($return_arr);
            return;
        }
        
        
	}
?>