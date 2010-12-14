<?php

class Ajax extends Admin_Controller {

	function __construct()
	{
		parent::__construct(FALSE);
        $this->output->enable_profiler(FALSE);
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
		$this->data['dm_meras'] = $meras; 
		$this->data['number'] = $this->input->post('recipe_product_id');
        
		$this->load->view('admin/recipes/subs/product', $this->data);
	}
	
	/* Adds a step to recipe */
	function add_step(){
        $languages = new Language();
        $languages->get_iterated();
		#$data['main_number']  = $this->input->post('step_id');
        #pri dobavlenii novogo shaga budet odno pole vvoda
        $data['number']       = $this->input->post('step_id');
        $data['dm_languages']= $languages;
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
        $meras->get_full_info();                     
        $this->data['product']          = $product;
        $this->data['ratios']           = $product->get_ratios();
        $this->data['meras']            = $meras;                  
        $this->data['scalar_meras']     = dm_get_array_by_filtr('type',1,$meras);                
        $this->data['relative_meras']   = dm_get_array_by_filtr('type',2,$meras);      
        
        $this->load->view('admin/ratio_meras/subs/product_data', $this->data);
        $this->output->enable_profiler(TRUE);
    }
    
    function add_language(){
        $total_language_names = $this->input->post('total_language_names');
        #
        $languages = new Language();        
        #
        $languages->get_iterated();
        if ($total_language_names >= $languages->count()) return false;
        #
        $this->data['number']       = $total_language_names+1;
        #ves' spisok lang
        $this->data['dm_languages'] = $languages;
        #dla dla vibranogo lang
        $this->data['language']     = $languages;
        if($this->input->post('param')) 
            $this->load->view('admin/language_form/sub/input_text',$this->data);
        else
            $this->load->view('admin/language_form/sub/input_name',$this->data);        
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
	#preres4itivaet nutrition v zavisimosti ot meri
    function get_nutrition_by_mera(){
        $product_id     = $this->input->post('number_product_id');
        $mera_selected  = $this->input->post('mera_id');
        
        $product                = new Product();
        $nutrition_categories   = new Nutrition_category();
        
        $product->get_full_info($product_id);
        $product->nutrition->convert_to_mera($mera_selected);
        
        $nutrition_categories->get_full_info();
        
        $this->data['dm_product']               = $product;
        $this->data['dm_nutrition_categories']  = $nutrition_categories;
        $this->load->view('admin/products/sub/nutrition_tables',$this->data);
        
    }
    function get_products_list(){
        $type_id = (int)$this->input->post('type_id');
        if (!$type_id and !is_numeric($type_id)) echo 'return !';
        $product_type   = new Product_type();
        $products       = new Product();
        
        $product_type->get_full_info($type_id);
        $product_type->product->get_full_info();
        $this->data['dm_products'] = $product_type->product;
        $this->load->view('admin/products/sub/show_products_list',$this->data);
    }
    function get_product_types_list(){
        $category_id = (int)$this->input->post('category_id');
        if (!$category_id and !is_numeric($type_id)) echo 'return false';
        $product_category   = new Product_category();
        $products           = new Product();
        
        $product_category->get_full_info($category_id);
        $product_category->product_type->get_full_info();
        $this->data['dm_product_types'] = $product_category->product_type;
        $this->load->view('admin/products/sub/show_types_list',$this->data);
    }
	
}
?>