<?php
	class Ajax extends MY_Controller{
        public function __construct()
    	{
    		parent::__construct(FALSE);
            $this->output->enable_profiler(FALSE);
    	}
            	
    	public function index(){
        
    	}
        
        public function suggest_products_info(){

            $query_string = $this->input->post('query_string', TRUE);
            
            $product_type_names = new Languages_Product_type();
            $product_type       = new Product_type();
      
            $product_type_names->like('name', $query_string, 'after')->get(5);
            #PRODUCT TYPE
            foreach($product_type_names as $type)
                $return_arr['product_types'][] = $query_string.'<strong>'.(str_ireplace($query_string,'',$type->name)).'</strong>';
            #PRODUCT_by_first_type
            if(isset($product_type_names->all[0])){
                $product_type->get_full_info($product_type_names->all[0]->id);
                $product_type->product->get_short_info();
                $data['dm_products'] = $product_type->product;
                $return_arr['product_items'] = $this->load->view('search/products/items',$data, true);
            }else
                $return_arr['product_items'] = array();
            $return_arr['status'] = true;
            echo json_encode($return_arr);
            return ;
        }
        
        public function suggest_products_list(){

            $query_string = $this->input->post('query_string', TRUE);
            
            $product_type_names = new Languages_Product_type();
            $product_type       = new Product_type();
      
            $product_type_names->like('name', $query_string, 'after')->get(5);
            #PRODUCT TYPE
            foreach($product_type_names as $type)
                $return_arr['product_types'][] = $query_string.'<strong>'.(str_ireplace($query_string,'',$type->name)).'</strong>';
            #PRODUCT_by_first_type
            if(isset($product_type_names->all[0])){
                $product_type->get_full_info($product_type_names->all[0]->id);
                $product_type->product->get_short_info();
                $data['dm_products'] = $product_type->product;
                $return_arr['product_items'] = $this->load->view('search/products/items',$data, true);
            }else
                $return_arr['product_items'] = array();
            $return_arr['status'] = true;
            echo json_encode($return_arr);
            return ;
        }
        //temp_function
        public function search_result(){

            $query_string = 'apple';
            
            $product_type_names = new Languages_Product_type();
            $product_type       = new Product_type();
      
            $product_type_names->like('name', $query_string, 'after')->get(1);
            #PRODUCT TYPE
            foreach($product_type_names as $type)
                $return_arr['product_types'][] = $query_string.'<strong>'.(str_ireplace($query_string,'',$type->name)).'</strong>';
            #PRODUCT_by_first_type
            if(isset($product_type_names->all[0])){
                $product_type->get_full_info($product_type_names->all[0]->id);
                $product_type->product->get_short_info();
                $data['dm_products'] = $product_type->product;
                $return_arr['product_items'] = $this->load->view('search/products/items',$data, true);
            }else
                $return_arr['product_items'] = array();
            $return_arr['status'] = true;
            print_flex($product_type_names->all[0]);
            $this->output->enable_profiler(true);
            return ;
        }
        function get_nutrition_by_mera(){
            $return_arr['status']   = false;
            $product_selected_id    = $this->input->post('product_selected_id');
            $mera_selecte_id        = $this->input->post('mera_selected_id');
            #if(!$product_selected_id or !$mera_selecte_id) return ;
            
            $product                = new Product();
            $nutrition_categories   = new Nutrition_category();
            
            $product->get_full_info($product_selected_id);
            if(!$product->exists()) return ;
            
            $product->nutrition->get_full_info();
            $product->nutrition->convert_to_mera($mera_selecte_id);            
            $nutrition_categories->get_full_info();
            
            $this->data['dm_nutrition_categories']  = $nutrition_categories;
            
            $return_arr['nutrition_facts']  = $this->load->view('shared/nutrition_facts',array('dm_nutritions' => $product->nutrition),true);
            $return_arr['nutrition_tables'] = $this->load->view('products/nutrition_tables',array('dm_product' => $product, 'dm_nutrition_categories' => $nutrition_categories),true);
            $return_arr['status'] = true;
            echo json_encode($return_arr);
            return ;
        }
        function get_nutrition_by_product(){
            $return_arr['status']   = false;
            $product_selected_id    = $this->input->post('product_selected_id');
            if(!$product_selected_id ) return ;
            
            $product                = new Product();
            $nutrition_categories   = new Nutrition_category();
            
            $product->get_full_info($product_selected_id);
            if(!$product->exists()) return ;
            
            $product->nutrition->get_full_info();
            $meras_available = '<option value = 0> 100 gramms </option>';
            foreach($product->mera as $mera){                
                $meras_available .= '<option value = '.$mera->join_seq.'> '.$mera->join_name.' ( '.$mera->join_value.' gm ) </option>';
            }
            #print_flex($meras_available);
            $nutrition_categories->get_full_info();
            
            $this->data['dm_nutrition_categories']  = $nutrition_categories;
            
            $return_arr['nutrition_facts']  = $this->load->view('shared/nutrition_facts',array('dm_nutritions' => $product->nutrition),true);
            $return_arr['nutrition_tables'] = $this->load->view('products/nutrition_tables',array('dm_product' => $product, 'dm_nutrition_categories' => $nutrition_categories),true);
            $return_arr['meras_available']  = $meras_available;
            $return_arr['status'] = true;
            echo json_encode($return_arr);
            return ;
        }
	}
?>