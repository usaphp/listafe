<?php

class Ratio_meras extends Admin_Controller {
	
	function __construct(){
		parent::__construct();
	}

	function index(){
        $this->show();
	}

    function show(){        
        $this->template->load('/admin/templates/main_template', '/admin/ratio_meras<br />/show', $this->data);
    }

	function delete($id = false) {
		
	}
    
    function edit(){
        array_push($this->data['js_functions'], array('name' => 'ratio_meras_edit_init', 'data' => FALSE));
        
        $product    = new Product();
        $meras      = new Mera();        
        $ratios     = new Ratio_mera();
                
        $product_name   = $this->input->post('inp_product');
        $product->get_by_name($product_name);
        
        if($product_name){
            $product->get_by_name($product_name);
            if($product->exists()){
                $meras->get_iterated();
                $ratios->where_related($product);
                
                if($this->form_validation->run('product_prices')){            
                    if($ratios->save()){
                        $this->data['form_success'] = '... добавил';
                    }else{
                        $this->data['form_error'] = 'erreor'; 
                    }
                }else{
                    $this->data['form_error'] = validation_errors();
                }
        
            }    
        }
        
        $this->data['product'] = $product;
        $this->data['meras'] = $meras;
        $this->data['ratios'] = $ratios;
        
        $this->template->load('/admin/templates/main_template', 'admin/ratio_meras/edit', $this->data);
    }
    
	function edit2(){
        $this->load->library('form_validation');
		array_push($this->data['js_functions'], array('name' => 'ratio_meras_edit_init', 'data' => FALSE));
        #
        $ratio          = new Ratio_mera();
        $product        = new Product();
        $meras          = new Mera();
        #
        $ratio->where_related($product)->get_iterated();
        $product_name = $this->input->post('product');        				                
        $product->where_related('mera')->get_by_name($product_name);
        
        $meras->get_iterated();
        #                
        //if form validates
        if($this->form_validation->run('product_prices')){            
//            if($nutrition->save()){
//                $this->data['form_success'] = '... добавлено';
//            }else{
//                $this->data['form_error'] = 'erreor'; #$nutrition->error->string;
//            }
//        }else{
//            $this->data['form_error'] = validation_errors();
        }
        
        $this->data['product']      = $product;
        $this->data['ratio']        = $ratio;
        $this->data['meras']        = $meras;
        $this->template->load('/admin/templates/main_template', 'admin/ratio_meras/edit', $this->data);
    }
}