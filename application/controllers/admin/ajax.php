<?php

class Ajax extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
        $this->output->enable_profiler(FALSE);
	}
	
	function index()
	{
    
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
}

/* End of file admin.php */
/* Location: ./system/application/controllers/admin/admin.php */