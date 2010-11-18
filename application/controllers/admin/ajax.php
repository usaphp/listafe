<?php

class Ajax extends Admin_Controller {

	function __construct()
	{
		parent::__construct(FALSE);
        $this->output->enable_profiler(FALSE);
	}
	
    function add_language(){                
        #
        $languages = new Language();        
        #
        $languages->get_iterated();
        #
        $this->data['languages'] = $languages;
        #
        $this->data['current_langueage'] = $languages->id;
        $this->load->view('admin/language_form',$this->data);
    }
	function index(){
    
	}
	
	/* login user */
	function login(){       	   
		$username = $this->input->post('username');
		$password = $this->input->post('password');
        
		if($this->security_lib->login($username, $password)){
			echo json_encode(array('status' => TRUE, 'message' => $this->linker->a_home_link()));
		}else{
			echo json_encode(array('status' => FALSE, 'message' => 'Неверное имя пользователя и пароль.'));			
		}
		return;
	}
	
	/* Suggest product for recipe */
	function suggest_products(){
		$product_name = $this->input->post('q', TRUE);        
        
        $products = new Languages_Product();                
        $products->like('name', $product_name, 'after')->get_iterated(); 
		
		foreach($products as $product){
			echo $product->name."\n";
		}
		return;
	}
    
	/* Adds a product to recipe */
	function add_recipe_product(){
        $meras = new Mera();
        $meras->get_full_info();
		$this->data['meras'] = $meras; 
		$this->data['recipe_product_id'] = $this->input->post('recipe_product_id');
        
		$this->load->view('admin/recipes/subs/product', $this->data);
	}
	
	/* Adds a step to recipe */
	function add_step(){
		$data['step_id'] = $this->input->post('step_id');
		$this->load->view('admin/recipes/subs/step', $data);
	}
    
    /* Get ratios for product */
    function get_ratios(){        
        $product    = new Product();
        $meras      = new Mera();        
        $ratios     = new Ratio_mera();        
        $product_name = $this->input->post('product_name');        
        $product->get_by_name($product_name);
        if (!$product->id) return ;                            
        $this->data['product']          = $product;
        $this->data['ratios']           = $product->get_ratios();
        $this->data['meras']            = $meras->get_iterated();                  
        $this->data['scalar_meras']     = $meras->get_clone(true)->where('type',1)->get_iterated();                
        $this->data['relative_meras']   = $meras->get_clone(true)->where('type',2)->get_iterated();      
        
        $this->load->view('admin/ratio_meras/subs/product_data', $this->data);
        $this->output->enable_profiler(TRUE);
    }
    
   	function add_ratio_mera(){
        $meras = new Mera();        
		$this->data['scalar_meras']     = $meras->get_clone(true)->where('type',1)->get_iterated();                
        $this->data['relative_meras']   = $meras->get_clone(true)->where('type',2)->get_iterated();
        $this->load->view('admin/ratio_meras/subs/field_ratio_meras', $this->data);
	}
	
	/* Checks the translate recipe url for existance in database */
	function translate_recipe_url_valid_insert(){
        $recipe = new Translate_recipe();
		// esli recept translate redaktiruetsya - to budet peredano ego id a znachit ego nado iskluchit iz proverki
		$current_recipe_translate = $this->input->post('recipe_translate_id');
		if($current_recipe_translate) $recipe->where('id != '.$current_recipe_translate);
		$recipe->get_by_url(trim($this->input->post('inp_url')));
		echo json_encode(!$recipe->exists());
	}
	
	/* Checks the translate recipe name for existance in database */
	function translate_recipe_name_valid_insert(){
        $recipe = new Translate_recipe();
		// esli recept translate redaktiruetsya - to budet peredano ego id a znachit ego nado iskluchit iz proverki
		$current_recipe_translate = $this->input->post('recipe_translate_id');
		if($current_recipe_translate) $recipe->where('id != '.$current_recipe_translate);
		$recipe->get_by_name(trim($this->input->post('text_name')));
		echo json_encode(!$recipe->exists());
	}
	
	
}
?>