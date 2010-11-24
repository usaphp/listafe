<?php

class Recipes extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->library('upload_image_lib');
	}
	
	function index()
	{
        $this->show();
	}
    
    function preview($id = false){
        $recipe     = new Recipe();
        $language   = new Language();
        #
        $language->get_by_name('Russian');
        $recipe->include_join_fields()->get_by_related_language($language);
        #print_flex($recipe);
    }
    function show(){        
        #
        $recipes    = new Recipe();                
        $recipes->get_full_info();
        
        #
        $data['recipes'] = $recipes;
        $this->template->load('/admin/templates/main_template', 'admin/recipes/show', $data);
    }
    
	function edit($id = false){
        if(!$id){
            redirect($this->linker->a_recipe_show_link());
        }
		/* Loading libraries */	
		$this->load->library('form_validation');
		# Js function from main.js which loads by default  
        array_push($this->data['js_functions'], array('name' => 'recipes_edit_init', 'data' => FALSE));
        array_push($this->data['js_functions'], array('name' => 'language_text_init', 'data' => FALSE));
		/* Get data for select boxes */        
        $recipe     = new Recipe();                                
        $meras      = new Mera();
        $languages  = new Language();
        
        $recipe->get_full_info($id);
        $languages->get_iterated();
        $meras->get_full_info();
        #soedinit' sushestvuushie shagi po language

		if ($this->form_validation->run('recipe_edit')){
            $this->_save($recipe);
		}else{
			/* Error on validation */
			$this->data['form_error'] = validation_errors();
		}
        #
		$this->data['dm_recipe']    = $recipe;
        $this->data['dm_languages'] = $languages;                 
        $this->data['dm_meras']     = $meras;
        $this->template->load('/admin/templates/main_template', '/admin/recipes/edit', $this->data);
	}

    function add(){
		/* Loading libraries */	
		$this->load->library('form_validation');
		# Js function from main.js which loads by default
        array_push($this->data['js_functions'], array('name' => 'recipe_add_init', 'data' => FALSE));
		
        $total_products = $this->input->post('total_products'); #peremenna producta catoraia idet v predstavlenie
        $meras = new Mera();
        $meras->get_iterated();
		
        if ($this->form_validation->run('recipe_edit'))
		{            
			/* Success on validation */                        
            $this->_save();
			$data['form_success'] = 'Рецепт Сохранен';
		}
		else
		{
			/* Error on validation */
			$data['form_error'] = validation_errors();
		}

        $this->data['dm_meras'] = $meras;
        $this->data['total_products'] = $total_products;
        $this->template->load('/admin/templates/main_template', '/admin/recipes/add', $this->data);
	}
    #delete recipe
    function delete($id=false){
        #esli ID ne peredaetsa to perehod na spisok
        if(!$id){
            $this->show();
            return;
        }
        $recipe = new Recipe();
        $recipe->get_full_info($id);        
        if($recipe->id){    
            #            
            foreach($recipe->recipe_step as $recipe_step) 
                $this->upload_image_lib->delete_img('recipe',$recipe_step->image);            
            $recipe->recipe_step->delete_all();
            #
            foreach($recipe->recipe_image as $recipe_image)
                $this->upload_image_lib->delete_img('recipe',$recipe->id.'_'.$recipe_image->id);
            $recipe->recipe_image->delete_all();
            #
            $recipe->delete();
        }
        $this->show();
    }
    
    function _save(Recipe $recipe = NULL){ /* Success on validation */
            # Zagruzka Recepta
            if ($recipe == NULL) {
                $recipe = new Recipe();                                
            }
            $recipe_image = new Recipe_Image();
                                    
            $recipe->prepare_time   = $this->input->post('prep_time');
            $recipe->cook_time      = $this->input->post('cook_time');
            $recipe->servings       = $this->input->post('servings');
            
            $total_products = $this->input->post('total_products');
            #find filling fields of product and create array $product_name
            
            if($this->save_object_name($recipe)){                
                #RECIPE IMAGE
                #esli net svazannoi image to sozdaetsa novaia i zadaetsa id                
                if ($recipe->recipe_image->result_count()==0){
                    $recipe_image_id = $recipe->recipe_image->result_count()+1;
                    $recipe_image = new Recipe_Image();
                    $recipe_image->image_type = 1; 
                }else {
                    $recipe_image_id = $recipe->recipe_image->id; #beret sushestvushii ID image is Recipes_Image
                }
                #esli my_upload_image_lib proinicializirovalas' verno to image zagrujaetca i resize
                $this->upload_image_lib->initialize(array('type'=>'recipe', 'size' => 'tiny'));
                    #vozvrashaet polnoe ima kartinki primer: re_id_id.jpg; v bazu sohranaetsa tol'ko $recipe_image_id
                if ($this->upload_image_lib->upload_resize_img('recipe_image',$recipe->id.'_'.$recipe_image_id))
                    $recipe_image->save($recipe);
                
                #else 
                    #$this->data['form_error'] = $this->upload->display_errors(); #vivodit log oshibok
                                                           
                #PRODUKTI
                #zagruzka udaleniih productov 
                $products_remove_selected = $this->input->post('hidden_product_removed');                
                if (!$products_remove_selected) $products_remove_selected = array();                 
                for($number=1;$number<=$total_products;$number++){
                    $product_name       = $this->input->post('product_'.$number);
                    $product_qty        = $this->input->post('qty_'.$number);
                    $product_mera_id    = $this->input->post('mera_'.$number);
                    #
                    if ($product_name && $product_qty && $product_mera_id && !in_array($number,$products_remove_selected)){                       
                        $dm_product = new Product();
                        $dm_product->where_related('languages_product','name',$product_name)->get();
                        $recipe->save($dm_product);
                        $recipe->set_join_field($dm_product,array('mera_id'=>$product_mera_id,'value'=>$product_qty));
                    }    
                }                
                # udalit' vibrannie producti
                $products_name = array(); #peremenaia spiska productov
                foreach($products_remove_selected as $number){
                    #sozdaet spisok udalaemih productov
                    array_push($products_name,$this->input->post('product_'.$number));
                }
                #esli spisok udalaemih productov ne pust to vipolnaetsa uslovie
                if (!empty($products_name)){
                    $dm_products = new Product();
                    $dm_products->where_in_related('languages_product','name',$products_name)->get();
                    $recipe->delete($dm_products->all);
                }

                #SHAGI
                $total_steps = $this->input->post('total_steps');                                             
                for($step_number = 1; $step_number <= $total_steps;$step_number++){
                    
                    #Languages
                    $total_languages = $this->input->post('total_language_'.$step_number);                    
                    $dm_current_step = dm_get_object_by_field($step_number,$recipe->recipe_step,'number');
                    if(!$dm_current_step){
                        $dm_current_step = new Recipe_Step();
                        $dm_current_step->number = $step_number;
                        $dm_current_step->save($recipe);
                        
                    }                     
                    for($lang_number = 1; $lang_number <= $total_languages; $lang_number++){
                        
                        $language_selected  = $this->input->post('sel_languages_text_'.$step_number.'_'.$lang_number);
                        $language_text      = $this->input->post('inp_text_'.$step_number.'_'.$lang_number);
                        echo $dm_current_step->id.' '.$language_text.' '; 
                        $dm_current_step->save_by_language(array('text'=>$language_text),$language_selected);                    
                    }
                    #IMAGE
                    $form_name  = 'step_photo_'.$number;                                                                         
                    $image_name = (isset($recipe->recipe_step->id))?$recipe->id.'_'.$recipe->recipe_step:$recipe->id.'_'.$recipe->recipe_step->count()+1;
                    #                    
                    if($this->upload_image_lib->initialize(array('type'=>'step', 'size' => 'tiny'))){                        
                        $image_name = $this->upload_image_lib->upload_resize_img($form_name,$image_name);                        
                        if($image_name)
                            $recipe->recipe_step->image = $image_name;
                        else
                            $data['form_error'] = $this->upload_image_lib->get_errors().$this->upload->display_errors();
                    }
                }
                $this->data['form_success'] = 'Рецепт Сохранен';
            }else{
                 $this->data['form_error'] = $recipe->error->string;
            }
    }
    /* Checks to see if recipe name already exists */    
    function _recipe_name_exists($recipe_name){
        $recipe = new Recipe();
        $recipe->where('name', $recipe_name)->get();
        if($recipe->exists()) return false;
        return true;
    }

    
}

/* End of file admin.php */
/* Location: ./system/application/controllers/admin/admin.php */
?>