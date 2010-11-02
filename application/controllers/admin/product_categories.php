<?php

class Product_categories extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
        
	}
	
	function index()
	{
        $this->show();
	}
    
    function show()
    {
        $product_categories = new Product_category();
        $product_categories->get();
        $this->data['product_categories'] = $product_categories;
        $this->template->load('/admin/templates/main_template', '/admin/product_categories/show', $this->data);
    }
    
    function delete($id = false){
        if($id){
            $product_category = new Product_category($id);
            if($product_category->exists()) $product_category->delete();
        }
        $this->session->set_flashdata('top_success', 'Категория удалена');
        redirect('admin/product_categories/show');
    }
    
    function edit($id = false){
        $this->load->library('form_validation');
        # Js function from main.js which loads by default  
		array_push($this->data['js_functions'], array('name' => 'categories_edit_init', 'data' => FALSE));   
		
        
        $product_category = new Product_category($id);
        
        $rules = array(
            array('field' => 'category_name', 'label' => 'Название Категории', 'rules' => 'trim|required|xss_clean|_category_name_exists')
        );
        $this->form_validation->set_rules($rules);
        
        //if form validates
        if($this->form_validation->run()){
            $product_category->name = $this->input->post('category_name');
            if($product_category->save()){
                $this->data['form_success'] = 'Категория добавлена';
            }else{
                $this->data['form_error'] = $product_category->error->string;
            }
        }else{
            $this->data['form_error'] = validation_errors();
        }
        $this->data['product_category'] = $product_category;
        $this->template->load('/admin/templates/main_template', '/admin/product_categories/edit', $this->data);
    }
    
    
    //checks to see if category name already exists    
    function _category_name_exists($name){
        $category = new Product_category();
        $category->where('name', $name)->get();
        if($category->exists()) return false;
        return true;
    }
}

/* End of file admin.php */
/* Location: ./system/application/controllers/admin/products.php */