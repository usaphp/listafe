<?php

class Recipes extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
        
	}
	
	function index()
	{
        $this->show();
	}
    
    function show(){
        $recipes = new Recipe();
        $images = new Recipes_image();
         $recipes->get_full_info();
        //$recipes->select('recipes.*, recipes_images.id as recipes_image_id')->where_related('recipes_image', 'image_type', 1)->get();
        /*
        $recipes_arr = array();
        foreach($recipes as $recipe){
            $recipe->recipes_image->get();
            array_push($recipes_arr, $recipe);
        }
        */
        #$recipes->get();
        #$recipes->where_related('recipes_image','image_type',1);
        //$images->include_related('recipes')->get();
        #foreach($recipes as $recipe):
           #print_flex ($recipes);
            #echo $recipe->id;
        #endforeach;
        #$recigies->include_related('mera', array('name'))->get();
        #$recigies->include_related('category', array('name'))->get();
        
        #$data['images'] = $images->get();
        $data['recipes'] = $recipes->data;
        $this->template->load('/admin/templates/main_template', '/admin/recipes/show', $data);
    }
    
	function edit($id){
		/* Loading libraries */	
		$this->load->library('form_validation');
		# Js function from main.js which loads by default  
        array_push($this->data['js_functions'], array('name' => 'recipes_edit_init', 'data' => FALSE));
		/* Get data for select boxes */
        $recipe = new Recipe();
        $product = new Product();
        $recipe_image = new Recipes_Image();
        $steps = new Recipes_Step();
        $meras = new Mera(); 
        
        $recipe->get_by_id($id);
        #zagruzka neobhodimih produktod 4erez ActivRecord
        $recipe->get_products(); 
 
        #ne realizovana podderjka situacii so mnojestvom kartion na odin recipe
        $recipe_image->where_related($recipe);
        $recipe_image->where('image_type','1')->get();
        
        #esli net svazannoi image to sozdaetsa novaia i zadaetsa budushii id
        if ($recipe_image->result_count()==0){ 
            $recipe_image_id = $recipe_image->get()->result_count()+1;
            $recipe_image = new Recipes_Image();
        }else {
            $recipe_image_id = $recipe_image->id; #beret sushestvushii ID image is Recipes_Image
        } 
        #soedinit' sushestvuushie shagi
        $steps->where_related($recipe)->get();
        $meras->get();
        #print_flex($steps);
        
        #$recipes->get_full_info($id);
		
		/* Settting up validation rules */
        $rules = array(
            array('field' => 'recipe_name', 'label' => 'Название Рецепта', 'rules' => 'trim|required|xss_clean|_recipe_name_exists'));
        $this->form_validation->set_rules($rules);
        
		/* If validation passed try to save a recipe */
        $total_products = $this->input->post('total_products');
        #echo $total_products.'</br>'; #!
		if ($this->form_validation->run())
		{
			/* Success on validation */
            # Zagruzka Recepta
            
            $recipe->name = $this->input->post('recipe_name');
            $recipe->prepare_time = $this->input->post('prep_time');
            $recipe->cook_time = $this->input->post('cook_time');
            $recipe->servings = $this->input->post('servings');
            
            #find filling fields of product and create array $product_name
            
            if($recipe->save()){
                #Dobavlenie Izmenenie resunka resepta
                $recipe_image_name = 're_'.$recipe->id.'_'.$recipe_image_id.'.jpg';
                $recipe_image_path = $upload_path = $this->config->item('recipe_images_path');
                #esli zagruzka uda4na to sohranenie v baze   
                if($this->_upload_images('recipe_image',$recipe_image_name,$recipe_image_path)) 
                    $recipe_image->save();
                else $data['form_error'] = $this->upload->display_errors();
                #PRODUKTI
                for($i=1;$i<=$total_products;$i++){
                    $product_name = $this->input->post('product_'.$i);
                    $product_qty = $this->input->post('qty_'.$i);
                    $product_mera_id = $this->input->post('mera_'.$i);
                    if ($product_name && $product_qty && $product_mera_id){
                        # beret ID producta po imeni dla bazi Products_Recipe();
                        $products_id_by_name = $product->where('name', $product_name)->get()->id; #
                        $products_recipe = new Products_Recipe();
                        $products_recipe->where_related($recipe);
                        $products_recipe->where('product_id',$products_id_by_name)->get();
                        #prove na sushestvovanie zapisi
                        if ($products_recipe->result_count()==0)$products_recipe = new Products_Recipe(); #!vozmojno ect' bolee prodvinutiq variant
                        # izmenennie ili dobavlenie znachenii
                        $products_recipe->product_id = $products_id_by_name;
                        $products_recipe->mera_id = $product_mera_id;
                        $products_recipe->value = $product_qty;
                        $products_recipe->save($recipe);
                    }
                }
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
                        
                        # v paramtrah func ukazivaetsa id recepta i ID step kotorii budet sozdan
                        # takze peredaetsa $i dla oboznach4enia nuznogo pola formi image
                        # $recipes_step->get_count()-utilitnay func sozdanaia v modeli Recipes_Step() dla uproshenia i lu4shego vospriatia coda 
                        $name_image = 'sp_'.$recipe->id.'_'.($recipes_step->get_count()).'.jpg'; #generiruet ima iz prefixa ID recepta i tekushey stroki v base
                        $upload_path = $this->config->item('step_images_path');                     #kuda
                        $form_name = 'step_photo_'.$i;                                              #nazvanie form_upload
                        # esli image sozdal udachno to vozvrashaen ima image inache vozvrachaet false
                        if($this->_upload_images($form_name,$name_image,$upload_path)){ 
                            $recipes_step->image = $name_image;
                        }
                        else $data['form_error'] = $this->upload->display_errors();
                        $recipes_step->save($recipe);
                    }elseif($total_steps == $i){
                        $recipes_step = new Recipes_Step();
                        $recipes_step->where_related($recipe);
                        $recipes_step->where('step',$i)->get();
                        $recipes_step->delete();
                        
                    }
                    
                }
                $this->data['form_success'] = 'Рецепт Сохранен';
                redirect('admin/recipes/edit/'.$id);
            }else{
                 $this->data['form_error'] = $recipe->error->string;
            }
		}
		else
		{
			/* Error on validation */
			$this->data['form_error'] = validation_errors();
		}
        #print_flex($steps);
		$this->data['recipe'] = $recipe;
        $this->data['steps'] = $steps;
        $this->data['image'] = $recipe_image;
        $this->data['meras'] = $meras; 
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
                $image_upload_status = '';
                if(!$this->_upload_recipe_images($recipes->id)) $data['form_error'] = $this->upload->display_errors();
                
                $total_steps = $this->input->post('total_steps');
                
                for($i=1;$i<=$total_steps;$i++){
                    $step_descript = $this->input->post('step_description_'.$i);
                   
                    if($step_descript){
                        
                        $recipes_step = new Recipes_Step();
                        $recipes_step->step = $i; #nomer shaga opredelaet posledovatel'nost'
                        $recipes_step->text = $step_descript;
                        
                        # v paramtrah func ukazivaetsa id recepta i ID step kotorii budet sozdan
                        # takze peredaetsa $i dla oboznach4enia nuznogo pola s image
                        # $recipes_step->get_count()-utilitnay func sozdanaia v modeli Recipes_Step() dla uproshenia i lu4shego vospriatia coda 
                        $name_image = 'sp_'.$recipes->id.'_'.($recipes_step->get_count()+1).'.jpg'; #generiruet ima iz prefixa ID recepta i tekushey stroki v base
                        $upload_path = $this->config->item('step_images_path');                     #kuda
                        $form_name = 'step_photo_'.$i;                                              #nazvanie form_upload
                        # esli image sozdal udachno to vozvrashaen ima image inache vozvrachaet false
                        if($this->_upload_images($form_name,$name_image,$upload_path)){ 
                            $recipes_step->image = $name_image;
                        }
                        else $data['form_error'] = $this->upload->display_errors();
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
    function _save_recipe(){
        //code
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
    function _resize_image($image_path, $width=40, $height=40){
        
        $config['source_image']     = $image_path;
        $config['create_thumb']     = TRUE;
        $config['thumb_marker']     = '_tiny';
        $config['width']            = $width;
        $config['height']           = $height;
        $config['master_dim']       = 'width';
        $config['maintain_ratio']   = TRUE;
        $this->load->library('image_lib');
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }
    
}

/* End of file admin.php */
/* Location: ./system/application/controllers/admin/admin.php */