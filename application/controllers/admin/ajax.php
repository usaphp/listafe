<?php

class Ajax extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
        $this->output->enable_profiler(FALSE);
	}
	
	function index(){
    
	}
	
	/* login user */
	function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$admin_user = new Admin_user();
		if($admin_user->login($username, $password)){
			echo json_encode(array('status' => TRUE, 'message' => $this->linker->a_home_link()));
		}else{
			echo json_encode(array('status' => FALSE, 'message' => 'Вы ввели неверные имя пользователя и пароль.'));			
		}
		return;
	}
	
	/* Suggest product for recipe */
	function suggest_products(){
		$product_name = $this->input->post('q', TRUE);
		$products = new Product();
		$products->like('name', $product_name, 'after')->get();
		foreach($products as $product){
			echo $product->name."\n";
		}
		return;
	}
    
	/* Adds a product to recipe */
	function add_recipe_product(){
        $meras = new Mera();
		$this->data['meras'] = $meras->get_iterated();
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
}
?>
/* End of file admin.php */
/* Location: ./system/application/controllers/admin/admin.php */