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
        $this->load->library('form_validation');
        array_push($this->data['js_functions'], array('name' => 'ratio_meras_edit_init', 'data' => FALSE));
        
        $product    = new Product();                        
        $meras      = new Mera();        
        $meras->get_iterated();    
                        
        $product_name   = $this->input->post('inp_product');
        $mera_scalars   = $this->input->post('mera_scalars')?$this->input->post('mera_scalars'):array();
        $mera_relatives = $this->input->post('mera_relatives')?$this->input->post('mera_relatives'):array();
        $val_scalars    = $this->input->post('val_scalars')?$this->input->post('val_scalars'):array();
        $val_relatives  = $this->input->post('val_relatives')?$this->input->post('val_relatives'):array();
        $ratios         = array();
        #
        if($product_name){
            $product->get_by_name($product_name);            
            if($product->exists()){                                                                
                #
                $ratios     = array_map('dm_get_ratios_array',$mera_scalars,$val_scalars,$mera_relatives,$val_relatives);            
                $dm_ratio   = new Ratio_mera();                
                foreach($ratios as $ratio){
                    #
                    $dm_ratio->where_related($product);
                    $dm_ratio->where('scalar',$ratio['scalar']);
                    $dm_ratio->where('relative',$ratio['relative'])->get();
                    #
                    if(!$dm_ratio->id) $dm_ratio = new Ratio_mera();                                                                
                    #
                    $dm_ratio->scalar        = $ratio['scalar'];
                    $dm_ratio->scalar_value  = $ratio['val_scalar'];
                    $dm_ratio->relative      = $ratio['relative'];
                    $dm_ratio->relative_value= $ratio['val_relative'];                                    
                    $dm_ratio->save($product);                   
                }                
                if($this->form_validation->run('product_prices')){            
                    if(true){
                        $this->data['form_success'] = '... добавил';
                    }else{
                        $this->data['form_error'] = 'erreor'; 
                    }
                }else{
                    $this->data['form_error'] = validation_errors();
                }
        
            }    
        }
        #         
        $this->data['product']          = $product;
        $this->data['meras']            = $meras;        
        $this->data['scalar_meras']     = $meras->get_clone(true)->where('type',1)->get();                
        $this->data['relative_meras']   = $meras->get_clone(true)->where('type',2)->get();    
        $this->data['ratios']           = $dm_ratio->where_related($product)->get();
        echo $dm_ratio->result_count();
        #
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
        
        $meras->get();
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
        $scalar_meras->
        $scalar_meras->
        
        $this->data['product']          = $product;
        $this->data['ratio']            = $ratio;
        $this->data['meras']            = $meras;
        
        $this->template->load('/admin/templates/main_template', 'admin/ratio_meras/edit', $this->data);
    }
}