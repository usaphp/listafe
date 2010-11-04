<?php

class Product_prices extends Admin_Controller {
	
	function __construct(){
		parent::__construct();
	}

	function index(){
        $this->show();
	}

    function show(){        
        $this->template->load('/admin/templates/main_template', '/admin/product_prices/show', $this->data);
    }

	function delete($id = false) {
		
	}

	function edit($id = false){
        $this->load->library('form_validation');
		array_push($this->data['js_functions'], array('name' => 'product_prices_edit_init', 'data' => FALSE));
        #
        $ratio          = new Ratio_measure();
        $product        = new Product($id);
        $meras          = new Mera();        
        #
        $ratio->where_related($product)->get_iterated();
        $product_name = $this->input->post('product');        				                
        $product->include_related('mera')->get_by_name($product_name);
        
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
        $this->template->load('/admin/templates/main_template', 'admin/product_prices/edit', $this->data);
    }
}