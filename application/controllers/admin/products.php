<?php

class Products extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->library('upload_image_lib');
	}
	
	function index()
	{
        $this->show();
	}
    
    function show()
    {        
        $products   = new Product();
        $meras      = new Mera();
        #vzat' product i dobavit' kategoriu producta
        $products->get_full_info();        
        
        $this->data['products'] = $products;
        
        $this->template->load('/admin/templates/main_template', '/admin/products/show', $this->data);
    }
    
    function delete($id = false){
        if($id){
            $product = new Product($id);
            if($product->exists()) $product->delete();
        }
        $this->session->set_flashdata('top_success', 'Продукт удален');
        redirect('admin/products/show');
    }
    
    function edit($id = false)
    {
        $this->load->library('form_validation');
        # Js function from main.js which loads by default  
        array_push($this->data['js_functions'], array('name' => 'products_edit_init', 'data' => FALSE));
        $product                = new Product($id);
        # if form validates
        if($this->form_validation->run('products_edit')){            
            if($this->_save($id)){                
                #esli biblioteka my_upload_image_lib proinicializirovalas' verno to image zagrujaetca i resize
                $this->upload_image_lib->initialize(array('type'=>'product', 'size' => 'tiny'));
                #vozvrashaet polnoe ima kartinki primer: pi_id.jpg; v bazu sohranaetsa tol'ko $recipe_image_id
                $image_name = $this->upload_image_lib->upload_resize_img('image',$product->id);                
                if($image_name){
                    $product->image = $image_name;
                    $product->save();
                } 
                $this->data['form_success'] = 'Продукт добавлен';
            }else
                $this->data['form_error'] = $product->error->string;            
        }else
        	echo validation_errors();                  
        #
        $meras                  = new Mera();
        $product                = new Product();
        $product_categories     = new Product_category();
        $nutrition_categories   = new Nutrition_category();
        
        $nutr_product           = new Nutritions_Product();
        $nutr_categor_products  = new Nutrition_categories_product();
        
        $product->get_full_info();
        #
        $meras->get_full_info();
        #
        $product_categories->get_full_info();
        
        $nutrition_categories->get();
        #k kajdomu nutrition_category dobavlaetsa svoi nutrition         
        foreach($nutrition_categories as $nutrition_category){
            $nutrition_category->nutrition->get_iterated();        
        }
        #viberaet ID i zna4enia nutrition_category po ID productov i dobavlaet nazvanie dannoi nutr_categ 
        $nutr_categor_products ->where_related($product)
                            ->include_related('nutrition_category')
                            ->get();
        ##viberaet ID i zna4enia nutrition po ID productov i dobavlaet nazvanie dannoi nutrrition 
        $nutr_product->where_related($product)
                    ->include_related('nutrition')
                    ->include_join_fields()->get();        
        #
        
        $this->data['product']                      = $product;
        $this->data['product_categories']	        = $product_categories;
        $this->data['all_nutrition_categories']     = $nutrition_categories;
        $this->data['current_nutrition_categories'] = $nutr_categor_products;
        $this->data['nutritions']                   = $nutr_product;
        $this->data['meras']                        = $meras;
        $this->template->load('/admin/templates/main_template', '/admin/products/edit', $this->data);
    }

    function _save($id = false){
        $product = new Product($id);
        #
        $data = array(
                    'name'          => $this->input->post('product_name'),
                    'description'   => $this->input->post('description')
        );
        #        
        $product->save_by_language($data);
        #                        
        $product->product_category_id   = $this->input->post('product_category_id');
        $product->mera_id               = $this->input->post('mera_id');
        $product->price                 = $this->input->post('price');
        $product->units_for_price       = $this->input->post('units_for_price');
        $product->mera_for_price        = $this->input->post('mera_for_price');        

        # If products was saved to db successfully
        if($product->skip_validation()->save()){
            
            $nutrition_categories   = new Nutrition_category();
            $nutrition_categories->get_iterated();
            #
            foreach($nutrition_categories as $nc){            
                if(!$this->input->post('nutrition_category_'.$nc->id)) continue;
                $nc->save($product);
                $nc->set_join_field($product,'value', $this->input->post('nutrition_category_'.$nc->id));
            }                                               
            #NUTRITION          
            $hidden_nutrition_add = ($this->input->post('hidden_nutrition'))?$this->input->post('hidden_nutrition'):array();
            $hidden_nutrition_remove = ($this->input->post('hidden_nutrition_removed'))?$this->input->post('hidden_nutrition_removed'):array();                                                                                                                 
            #
            $hidden_nutrition_add = array_map('explode_ext',$hidden_nutrition_add);
            #
            $hidden_nutrition_remove = array_diff($hidden_nutrition_remove,return_subarray_by_key('id',$hidden_nutrition_add));
            #SAVE Nutrition
            $nutrition = new Nutrition();                            
            foreach($hidden_nutrition_add as $hn_add){
                $nutrition->get_by_id($hn_add['id']);
                $product->save($nutrition);
                $product->set_join_field($nutrition,'value',$hn_add['value']);                            
            }
            #DELETE Nutrition
            if($hidden_nutrition_remove){
                $nutrition->where_in('id',$hidden_nutrition_remove)->get();
                $product->delete($nutrition->all);
            }
            #MERAS-PRODUCT
            $selected_mera = $this->input->post('selected_meras');
            
            $meras = new Mera();            
            if($selected_mera){
                $meras->where_not_in('id',$selected_mera)->get();
                $product->delete($meras->all);
                $meras->where_in('id',$selected_mera)->get();        
                $product->save($meras->all);                
            }                                                                                      
        }else{
            return false;
        }
        return true;            
    }
    //checks to see if product name already exists    
    function _product_name_exists($product_name){
        $product = new Product();
        $product->where('name', $product_name)->get();
        if($product->exists()) return false;
        return true;
    }
}

/* End of file admin.php */
/* Location: ./system/application/controllers/admin/products.php*/ 
    