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
    
    function show(){
        array_push($this->data['js_functions'], array('name' => 'products_show_init', 'data' => FALSE));
        $product_categories = new Product_category();
        
        $product_categories ->get_full_info();

        $this->data['dm_product_categories'] = $product_categories ;
        
        $this->template->load('/admin/templates/main_template', '/admin/products/show', $this->data);
    }
    
    function delete($id = false){
        if($id){
            $product = new Product($id);
            if($product->exists()){
                $product->delete();
            }
        }
        $this->session->set_flashdata('top_success', 'Продукт удален');
        redirect('admin/products/show');
    }
    
    function edit($id = false){
        $this->load->library('form_validation');
        # Js function from main.js which loads by default  
        array_push($this->data['js_functions'], array('name' => 'products_edit_init', 'data' => FALSE));
        $product                = new Product($id);
        # if form validates
        
        if($this->form_validation->run('products_edit')){
            $product->product_category_id   = $this->input->post('product_category_id');
            $product->mera_id               = $this->input->post('mera_id');
            $product->price                 = $this->input->post('price');
            $product->units_for_price       = $this->input->post('units_for_price');
            $product->mera_for_price        = $this->input->post('mera_for_price');
            #
            if($this->save_object_name($product)){
                $nutrition_categories   = new Nutrition_category();
                $nutrition_categories->get();
                #
                foreach($nutrition_categories as $nc){
                    if(!$this->input->post('nutrition_category_'.$nc->id)) continue;
                    $nc->save($product);
                    $nc->set_join_field($product,'value', $this->input->post('nutrition_category_'.$nc->id));
                }                                               
                #NUTRITION          
                $hidden_nutrition_add       = ($this->input->post('hidden_nutrition'))?$this->input->post('hidden_nutrition'):array();
                $hidden_nutrition_remove    = ($this->input->post('hidden_nutrition_removed'))?$this->input->post('hidden_nutrition_removed'):array();                                                                                                                 
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
                #IMAGES
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
        $nutrition              = new Nutrition();
        $nutrition_categories   = new Nutrition_category();
        $languages              = new Language();        
        
        $product->get_full_info($id);
        $product->nutrition->convert_to_mera(1);
        $meras_available = array('100 gramms');
        foreach($product->mera as $mera){                
            $meras_available[$mera->join_seq] = $mera->join_name.' ( '.$mera->join_weight.' gm )';
        }
        #
        $meras->get_full_info();        
        #
        $nutrition->get_full_info();
        #
        $nutrition_categories->get_full_info();        
        #
        $languages->get_iterated();            
        #
        $this->data['meras_available']              = $meras_available;
        $this->data['dm_product']                   = $product;        
        $this->data['product_categories']	        = $product_categories;
        $this->data['dm_nutrition_categories']     = $nutrition_categories;
        $this->data['dm_languages']                 = $languages;
        $this->data['meras']                        = $meras;
        
        $this->template->load('/admin/templates/main_template', '/admin/products/edit', $this->data);
        
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
?>