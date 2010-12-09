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

            $query_string = $this->input->post('query_string', TRUE);
            
            $product_type_names = new Languages_Product_type();
            $product_type       = new Product_type();
                        
            $product_type_names->like('name', $query_string, 'after')->get();
            #PRODUCT TYPE
            foreach($product_type_names as $type)
                $return_arr['product_types'][] = $type->name;            
            #PRODUCT_by_first_type
            if(isset($product_type_names->all[0])){
                $product_type->get_full_info($product_type_names->all[0]->id);
                $product_type->product->get_full_info();
                $data['dm_products'] = $product_type->product;      
                $return_arr['product_items'] = $this->load->view('search/products/items',$data, true);
            }else
                $return_arr['product_items'] = array();
            $return_arr['status'] = true;
            echo json_encode($return_arr);
            return;
        }        
	}
?>