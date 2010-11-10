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
                        
        $product_name   = $this->input->post('inp_product');
        $mera_scalars   = $this->input->post('mera_scalars')?$this->input->post('mera_scalars'):array();
        $mera_relatives = $this->input->post('mera_relatives')?$this->input->post('mera_relatives'):array();
        $val_scalars    = $this->input->post('val_scalars')?$this->input->post('val_scalars'):array();
        $val_relatives  = $this->input->post('val_relatives')?$this->input->post('val_relatives'):array();
        $remove_ratios  = $this->input->post('hidden_ratio_removed')?$this->input->post('hidden_ratio_removed'):array();
        $ratios         = array();        
        #
        if($product_name){
            $product->get_by_name($product_name);            
            if($product->exists()){                                                                
                #generiruen array vida ('scalar'=> zna4enie, relative=> zna4enie) 
                #kotorii bedet parameterom zaprosa v baze Ratio_Meras
                $ratios         = array_map('dm_get_ratios_array',$mera_scalars,$val_scalars,$mera_relatives,$val_relatives);                                                       
                #generiruet spisok udalenia (preobrazua 3_2 v array('scalar'=>3,'relative=>2'))
                $remove_ratios  = array_map('explode_scalar_relative',$remove_ratios);                
                #
                foreach($ratios as $ratio){
                    if(empty($ratio)) continue; 
                    #soedinaet meri i producti 
                    $dm_ratio = $product->get_ratios($ratio);
                    #esli net svazi to sozdaen novuu
                    if(!$dm_ratio->id) $dm_ratio = new Ratio_mera();                                                                
                    #
                    $dm_ratio->scalar        = $ratio['scalar'];
                    $dm_ratio->scalar_value  = $ratio['val_scalar'];
                    $dm_ratio->relative      = $ratio['relative'];
                    $dm_ratio->relative_value= $ratio['val_relative'];
                    
                    $dm_ratio->save($product);
                }
                #
                foreach($remove_ratios as $ratio){
                    $dm_ratio = $product->get_ratios($ratio);
                    $dm_ratio->delete();
                }
                #
                if($this->form_validation->run('product_prices')){            
                    if(true){
                        $this->data['form_success'] = '... добавил';
                    }else{
                        $this->data['form_error'] = 'error'; 
                    }
                }else{
                    $this->data['form_error'] = validation_errors();
                }
        
            }    
        }
        #         
        $this->data['product']          = $product;
        $this->data['meras']            = $meras->get_iterated();        
        $this->data['scalar_meras']     = $meras->get_clone(true)->where('type',1)->get();                
        $this->data['relative_meras']   = $meras->get_clone(true)->where('type',2)->get();    
        $this->data['ratios']           = $product->get_ratios();
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