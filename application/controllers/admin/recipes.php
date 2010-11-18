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
		/* Get data for select boxes */        
        $recipe = new Recipe();                                
        $meras  = new Mera();
        
        $recipe->get_full_info($id);
        
        $meras->get_full_info();
        #soedinit' sushestvuushie shagi po language        	
        
		/* If validation passed try to save a recipe */
        
        
		if ($this->form_validation->run('recipe_edit'))
		{
            $this->_save($recipe);
            return ;
		}
		else
		{
			/* Error on validation */
			$this->data['form_error'] = validation_errors();
		}
        #        
		$this->data['recipe'] = $recipe;
                
        $this->data['meras']  = $meras; 
        $this->template->load('/admin/templates/main_template', '/admin/recipes/edit', $this->data);
	}

    function add(){
		/* Loading libraries */	
		$this->load->library('form_validation');
		# Js function from main.js which loads by default
        array_push($this->data['js_functions'], array('name' => 'recipe_add_init', 'data' => FALSE));
		/* Get data for select boxes */
        $recipes = new Recipe();
        $products = new Product();
        $meras = new Mera();
        
        $meras->get();
		/* Settting up validation rules */
		/* If validation passed try to save a recipe */
        #get total number fields for product
        
        $total_products = $this->input->post('total_products'); #peremenna producta catoraia idet v predstavlenie

		if ($this->form_validation->run('recipe_edit'))
		{            
			/* Success on validation */
            
            
            $this->_save();
            return ;
			$data['form_success'] = 'Рецепт Сохранен';
		}
		else
		{
			/* Error on validation */
			$data['form_error'] = validation_errors();
		}
		//$this->data['recipes'] = $recipes;
        $this->data['meras'] = $meras;
        
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
            $recipe_image = new Recipes_Image();
            
                        
            $recipe->prepare_time   = $this->input->post('prep_time');
            $recipe->cook_time      = $this->input->post('cook_time');
            $recipe->servings       = $this->input->post('servings');
            
            $total_products = $this->input->post('total_products');
            #find filling fields of product and create array $product_name
            
            if($recipe->save()){
                //$recipe->reinitialize_model();
                $recipe->save_by_language(array('name' => $this->input->post('recipe_name')));
                #RECIPE IMAGE
                #esli net svazannoi image to sozdaetsa novaia i zadaetsa id                
                if ($recipe->recipes_image->result_count()==0){
                    $recipe_image_id = $recipe->recipes_image->result_count()+1;
                    $recipe_image = new Recipes_Image();
                    $recipe_image->image_type = 1; 
                }else {
                    $recipe_image_id = $recipe->recipes_image->id; #beret sushestvushii ID image is Recipes_Image
                }
                #esli my_upload_image_lib proinicializirovalas' verno to image zagrujaetca i resize
                $this->upload_image_lib->initialize(array('type'=>'recipe', 'size' => 'tiny'));
                    #vozvrashaet polnoe ima kartinki primer: re_id_id.jpg; v bazu sohranaetsa tol'ko $recipe_image_id
                if ($this->upload_image_lib->upload_resize_img('recipe_image',$recipe->id.'_'.$recipe_image_id))
                    $recipe_image->save($recipe);
                else 
                    $this->data['form_error'] = $this->upload->display_errors(); #vivodit log oshibok                
                                                           
                #PRODUKTI
                #zagruzka udaleniih productov 
                $product_removed = $this->input->post('hidden_product_removed');                
                if (!$product_removed) $product_removed = array();                 
                for($i=1;$i<=$total_products;$i++){
                    $product_name       = $this->input->post('product_'.$i);
                    $product_qty        = $this->input->post('qty_'.$i);
                    $product_mera_id    = $this->input->post('mera_'.$i);
                    #
                    if ($product_name && $product_qty && $product_mera_id && !in_array($i,$product_removed)){                       
                        $language = new Language();
                        $language->get_by_name('Russian');
                        $language->product->where_join_field($language,'name',$product_name)->get();                        
                        $recipe->save($language->product);
                        $recipe->set_join_field($language->product,array('mera_id'=>$product_mera_id,'value'=>$product_qty));
                        
                        
                    }    
                }                
                # udalit' vibrannie producti
                $products_name = array(); #peremenaia spiska productov
                foreach($product_removed as $id){
                    #sozdaet spisok udalaemih productov
                    array_push($products_name,$this->input->post('product_'.$id));
                }
                #esli spisok udalaemih productov ne pust to vipolnaetsa uslovie 
                if (!empty($product_removed)){

                    $language = new Language();
                    $language->get_by_name('Russian');
                    $language->product->where_join_field($language,'name',$product_name)->get();                        
                    $recipe->delete($language->product);
                }
                
                #print_flex($products_recipe);
                #SHAGI
                $language = new Language();
                $language->get_by_name('Russian');
                
                $recipe->recipe_step->get();
                $total_steps = $this->input->post('total_steps');                                
                for($i=1;$i<=$total_steps;$i++){
                    #
                    $steps_descript = $this->input->post('step_description_'.$i);
                    $step = new Recipe_Step();
                    #
                    $step->where('number',$i)->get_by_related($recipe);                    
                    #
                    if (!$step->id){
                        $step->number = $i;
                        $step->save($recipe);
                    }
                    $step->save($language);
                    #
                    $step->set_join_field($language,'text',$steps_descript)->get();                    
                    #IMAGE
                    $form_name  = 'step_photo_'.$i;                                                                         
                    $image_name = ($step->id)?$recipe->id.'_'.$step->id:$recipe->id.'_'.$step->result_count()+1;
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