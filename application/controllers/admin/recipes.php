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
        $images->get();
        #$recipes->get();
        $recipes->where_related($images)->get();
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
        $data['recipes'] = $recipes;
        $this->template->load('/admin/templates/main_template', '/admin/recipes/show', $data);
    }
    
	function edit(){
		/* Loading libraries */	
		$this->load->library('form_validation');
		# Js function from main.js which loads by default  
        array_push($this->data['js_functions'], array('name' => 'recipes_edit_init', 'data' => FALSE));
		/* Get data for select boxes */
        $recipes = new Recipe();
		$meras = new Mera(); 
		/* Settting up validation rules */
        $rules = array(
            array('field' => 'recipe_name', 'label' => 'Название Рецепта', 'rules' => 'trim|required|xss_clean|_recipe_name_exists'));
        $this->form_validation->set_rules($rules);
		
		/* If validation passed try to save a recipe */
		if ($this->form_validation->run())
		{
			/* Success on validation */
			//$data['form_success'] = 'Рецепт Сохранен';
		}
		else
		{
			/* Error on validation */
			//$data['form_error'] = validation_errors();
		}
		
        $this->template->load('/admin/templates/main_template', '/admin/recipes/edit', $this->data);
	}

    function add(){
		/* Loading libraries */	
		$this->load->library('form_validation');
		# Js function from main.js which loads by default  
        array_push($this->data['js_functions'], array('name' => 'recipe_add_init', 'data' => FALSE));
		/* Get data for select boxes */
        $meras = new Mera(); 
        $meras->get();
        $recipes = new Recipe();
        $products = new Product();
		/* Settting up validation rules */
		/* If validation passed try to save a recipe */
  #get total number fields for product
        $total_products = $this->input->post('total_products');
		if ($this->form_validation->run('recipes_add'))
		{
            $recipes->name = $this->input->post('recipe_name');
            $recipes->prepare_time = $this->input->post('prep_time');
            $recipes->cook_time = $this->input->post('cook_time');
            $recipes->servings = $this->input->post('servings');
            #find filling fields of product and create array $product_name
            
            if($recipes->save()){
                for($i=1;$i<$total_products;$i++){
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