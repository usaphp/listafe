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
            $this->show();
            return;
        }
		/* Loading libraries */	
		$this->load->library('form_validation');
		# Js function from main.js which loads by default  
        array_push($this->data['js_functions'], array('name' => 'recipes_edit_init', 'data' => FALSE));
		/* Get data for select boxes */        
        $recipe = new Recipe();        
        $product = new Product();
        
        $steps = new Recipes_Step();
        $meras = new Mera();
        
        $recipe->get_full_info($id);
        
        $meras->get_full_info();
        #soedinit' sushestvuushie shagi po language        	
        
		/* If validation passed try to save a recipe */
        $total_products = $this->input->post('total_products');
        
		if ($this->form_validation->run('recipe_edit'))
		{
  	/* Success on validation */
            # Zagruzka Recepta
            $recipe->save_by_language(array('name',$this->input->post('recipe_name')));            
            $recipe->prepare_time   = $this->input->post('prep_time');
            $recipe->cook_time      = $this->input->post('cook_time');
            $recipe->servings       = $this->input->post('servings');
            
            #find filling fields of product and create array $product_name
            
            if($recipe->save()){
                #RECIPE IMAGE
                #esli net svazannoi image to sozdaetsa novaia i zadaetsa id
                if ($recipe->recipes_image->result_count()==0){
                    $recipe_image_id = $recipe->recipes_image->result_count()+1;
                    $recipe_image = new Recipes_Image();
                    $recipe_image->image_type = 1; 
                }else {
                    $recipe_image_id = $recipe->recipes_image->id; #beret sushestvushii ID image is Recipes_Image
                }
                #esli biblioteka my_upload_image_lib proinicializirovalas' verno to image zagrujaetca i resize
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
                       // # beret ID producta po imeni dla bazi Products_Recipe();
//                        $products_id_by_name = $product->where('name', $product_name)->get()->id; #
//                        $products_recipe = new Products_Recipe();
//                        $products_recipe->where_related($recipe);
//                        $products_recipe->where('product_id',$products_id_by_name)->get();
//                        #prove na sushestvovanie zapisi
//                        if ($products_recipe->result_count()==0)$products_recipe = new Products_Recipe(); #!vozmojno ect' bolee prodvinutiq variant
//                        # izmenennie ili dobavlenie znachenii
//                        $products_recipe->product_id = $products_id_by_name;
//                        $products_recipe->mera_id = $product_mera_id;
//                        $products_recipe->value = $product_qty;
//                        $products_recipe->save($recipe);                        
                        $product->where_related('language','name',$product_name)->get();
                         
                        return ;
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
                    $products = new Product();
                    $products_recipe = new Products_Recipe();
                    #berem iz bazi producti po spisku hidden
                    $products->where_in('name',$products_name)->get();
                    #berem producti tol'ko te 4to otnosatsa k dannomy recepty
                    $products_recipe->where_related($recipe);
                    #berem producti tol'ko te 4to otnosatsa k spisku hidden
                    $products_recipe->where_related($products)->get();
                    #udalaem vse 4to ostalos' v zaprose 
                    $products_recipe->delete();
                }
                
                #print_flex($products_recipe);
                #SHAGI
                $total_steps = $this->input->post('total_steps');
                for($i=1;$i<=$total_steps;$i++){
                    $step_descript = $this->input->post('step_description_'.$i);
                    if($step_descript!=''){
                        $recipes_step = new Recipes_Step();
                        $recipes_step->where_related($recipe);
                        $recipes_step->where('step',$i)->get();
                        #esli danogo shaga net v baze to sozadetsa novii
                        if ($recipes_step->result_count()==0) $recipes_step = new Recipes_Step(); #!vozmojno ect' bolee prodvinutiq variant
                        $recipes_step->step = $i; 
                        $recipes_step->text = $step_descript;
                        
                        #dobavlenie image 4erez upload_image_lib
                        $form_name  = 'step_photo_'.$i;                                              #nazvanie form_upload
                        #generit name image : esli sushestviet to beret iz bazi esli net to zadaet 
                        $image_name = ($recipes_step->id)?$recipe->id.'_'.$recipes_step->id:$recipe->id.'_'.($recipes_step->get_count()+1);
                        #inizializiruet my_image_lib
                        if($this->upload_image_lib->initialize(array('type'=>'step', 'size' => 'tiny'))){
                            $image_name = $this->upload_image_lib->upload_resize_img($form_name,$image_name);
                            if($image_name)
                                $recipes_step->image = $image_name;    
                            else $data['form_error'] = $this->upload_image_lib->get_errors().$this->upload->display_errors();
                        }
                        else
                            echo $this->upload_image_lib->get_errors();
                        $recipes_step->save($recipe);
                    }elseif($total_steps == $i){
                        $recipes_step = new Recipes_Step();
                        $recipes_step->where_related($recipe);
                        $recipes_step->where('step',$i)->get();
                        $recipes_step->delete();
                        
                    }
                    
                }
                $this->data['form_success'] = 'Рецепт Сохранен';
                redirect($this->linker->a_recipe_edit_by_id_link($recipe->id));
            }else{
                 $this->data['form_error'] = $recipe->error->string;
            }
		}
		else
		{
			/* Error on validation */
			$this->data['form_error'] = validation_errors();
		}
        #        
		$this->data['recipe'] = $recipe;
        $this->data['steps']  = $steps;        
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
		if ($this->form_validation->run('recipes_add'))
		{
            
            $recipes->name = $this->input->post('recipe_name');
            $recipes->prepare_time = $this->input->post('prep_time');
            $recipes->cook_time = $this->input->post('cook_time');
            $recipes->servings = $this->input->post('servings');
            #find filling fields of product and create array $product_name
            
            if($recipes->save()){
                #RECIPE IMAGE
                $recipe_image = new Recipes_Image();                
                $recipe_image_id = $recipe_image->get_count()+1;
                $recipe_image->image_type = 1;
                $this->upload_image_lib->initialize(array('type'=>'recipe', 'size' => 'tiny'));
                #vozvrashaet polnoe ima kartinki primer: re_id_id.jpg ina4e false
                if($this->upload_image_lib->upload_resize_img('recipe_image',$recipes->id.'_'.$recipe_image_id)){
                        $recipe_image->save($recipes);echo 1;}
                else 
                        $this->data['form_error'] = $this->upload_image_lib->get_errors().$this->upload->display_errors(); #vivodit log oshibok
                #PRODUCTS          
                for($i=1;$i<=$total_products;$i++){
                    $product_name = $this->input->post('product_'.$i);
                    $product_qty = $this->input->post('qty_'.$i);
                    $product_mera_id = $this->input->post('mera_'.$i);
                    if ($product_name && $product_qty && $product_mera_id){
                        $products_recipes_model = new Products_Recipe();
                        $products_recipes_model->product_id = $products->where('name', $product_name)->get()->id;
                        $products_recipes_model->mera_id = $product_mera_id;
                        $products_recipes_model->value = $product_qty;
                        $products_recipes_model->save($recipes);
                    }
                }
                #STEPS                              
                $total_steps = $this->input->post('total_steps');                
                for($i=1;$i<=$total_steps;$i++){
                    $step_descript = $this->input->post('step_description_'.$i);                   
                    if($step_descript){                        
                        $recipes_step = new Recipes_Step();
                        $recipes_step->step = $i; #nomer shaga opredelaet posledovatel'nost'
                        $recipes_step->text = $step_descript;                        
                        #dobavlenie image 4erez upload_image_lib
                        $form_name  = 'step_photo_'.$i;                                              #nazvanie form_upload
                        #generit name image : esli sushestviet to beret iz bazi esli net to zadaet 
                        $image_name = $recipes->id.'_'.($recipes_step->get_count()+1);
                        #inizializiruet my_image_lib
                        if($this->upload_image_lib->initialize(array('type'=>'step', 'size' => 'tiny')))
                            if($this->upload_image_lib->upload_resize_img($form_name,$image_name))
                                $recipes_step->image = $image_name;    
                            else $data['form_error'] = $this->upload_image_lib->get_errors().' '.$this->upload->display_errors();
                        else
                            echo $this->upload_image_lib->get_errors();
                        $recipes_step->save($recipes);                
                    }
                }
                $this->data['form_success'] = 'Рецепт добавлена';
            }else{
                $this->data['form_error'] = $recipes->error->string;
            } 
			/* Success on validation */
			//$data['form_success'] = 'Рецепт Сохранен';
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
        $recipe->get_by_id($id);
        $recipe->recipes_image->where_related()->get();
        #
        $this->upload_image_lib->delete_img('recipe',$recipe->id.'_'.$recipe->recipes_image->id);
        $recipe->recipes_image->delete();
        #
        $recipe->recipes_step->where_related()->get();
        #
        foreach($recipe->recipes_step as $step)
            $this->upload_image_lib->delete_img('step',$step->image);
        $recipe->recipes_step->delete();
        $recipe->delete();
        $this->show();
    }
    
    /* Checks to see if recipe name already exists */    
    function _recipe_name_exists($recipe_name){
        $recipe = new Recipe();
        $recipe->where('name', $recipe_name)->get();
        if($recipe->exists()) return false;
        return true;
    }
    
        //uploads recipe image
    function _upload_recipe_images($recipe_id){
        //set all the appropriate data
        
        $recipe_image = new Recipes_Image($recipe_id);
        $recipe_image->recipe_id = $recipe_id;
        $recipe_image->image_type = 1;
        $recipe_image->save();
        $image_name = 're_'.$recipe_image->id.'_'.$recipe_id.'.jpg';
        
        
        //define upload class with configs
        $config['upload_path'] = $this->config->item('recipe_images_path');
		$config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $image_name;
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);
        
        //try to upload file
        if ($this->upload->do_upload('recipe_image')){
            $upload_data = $this->upload->data();
            $this->_resize_image($upload_data['full_path']);
            return true;
        }else{
            #!predusmatrit' uslovia otkata iz $recipe_image
            return false;   
        }
    }
    #universalnii uploader pozvolaet zagrujati' image i rezat' dla bazi nezavisimo ot modeli 
    #ispolzuetsa dla zagruzki image Steps mojno takje primenit' k zagruzke image Recipe
    function _upload_images($form_name,$image_name, $upload_path, $width=40){ # $form_name- otkuda beret image
        //define upload class with configs
        $config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $image_name;
        $config['overwrite'] = TRUE;
        $this->load->library('upload');
        $this->upload->initialize($config);
        //try to upload file
        if ($this->upload->do_upload($form_name)){
            $this->_resize_image($config['upload_path'].$config['file_name']);
            return true;
        }else{
            return false;   
        }
    }

    
}

/* End of file admin.php */
/* Location: ./system/application/controllers/admin/admin.php */