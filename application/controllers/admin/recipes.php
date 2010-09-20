<?php

class Recipes extends MY_Controller {

	function __construct()
	{
		parent::Controller();
        $this->_forse_login(TRUE);	
	}
	
	function index()
	{
        $this->template->load('/admin/templates/main_template', '/admin/dashboard');
	}
    
	function add(){
		/* Loading libraries */	
		$this->load->library('form_validation');
		
		/* Get data for select boxes */
        $category	= new Category();
        $mera		= new Mera();
        $data['category_model']	= $category->get_iterated();
        $data['mera_model']		= $mera->get_iterated();
		
        /* Error and success messages for form - false by default */
        $data['form_success'] = false;
        $data['form_error'] =  false;
		
		/* Settting up validation rules */
        $rules = array(
            array('field' => 'recipe_name', 'label' => 'Название Рецепта', 'rules' => 'trim|required|xss_clean|_recipe_name_exists'));
        $this->form_validation->set_rules($rules);
		
		/* If validation passed try to save a recipe */
		if ($this->form_validation->run())
		{
			/* Success on validation */
			$data['form_success'] = 'Рецепт Сохранен';
		}
		else
		{
			/* Error on validation */
			$data['form_error'] = validation_errors();
		}
		
        $this->template->load('/admin/templates/main_template', '/admin/recipes/add', $data);
	}

	/* Checks to see if recipe name already exists */    
    function _recipe_name_exists($recipe_name){
    	return true;
        $recipe = new Recipe();
        $recipe->where('name', $recipe_name)->get();
        if($recipe->exists()) return false;
        return true;
    }
}

/* End of file admin.php */
/* Location: ./system/application/controllers/admin/admin.php */