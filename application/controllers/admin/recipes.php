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
        $recipes->get_iterated();
        #$recigies->include_related('mera', array('name'))->get();
        #$recigies->include_related('category', array('name'))->get();
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
		$this->data['recipes'] = $recipes;
        $this->data['meras'] = $meras;
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