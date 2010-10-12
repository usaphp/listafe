<?php

class Categories extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
        $this->_forse_login(TRUE);
		$this->data['form_success'] = false;
        $this->data['form_error'] =  false;

		# Js function from main.js which loads by default
		$this->data['js_functions'] = array();    
	}
	
	function index()
	{
        $this->show();
	}
    
    function show()
    {
        $categories = new Category();
        $categories->get();
        $this->data['categories'] = $categories;
        $this->template->load('/admin/templates/main_template', '/admin/categories/show', $this->data);
    }
    
    function delete($id = false){
        if($id){
            $category = new Category($id);
            if($category->exists()) $category->delete();
        }
        $this->session->set_flashdata('top_success', 'Категория удалена');
        redirect('admin/categories/show');
    }
    
    function edit($id = false){
        $this->load->library('form_validation');

		array_push($this->data['js_functions'], array('name' => 'category_edit_init', 'data' => FALSE));
        
        $category = new Category($id);
        
        $rules = array(
            array('field' => 'category_name', 'label' => 'Название Категории', 'rules' => 'trim|required|xss_clean|_category_name_exists')
        );
        $this->form_validation->set_rules($rules);
        
        //if form validates
        if($this->form_validation->run()){
            $category->name = $this->input->post('category_name');
            if($category->save()){
                $this->data['form_success'] = 'Категория добавлена';
            }else{
                $this->data['form_error'] = $category->error->string;
            }
        }else{
            $this->data['form_error'] = validation_errors();
        }
        $this->data['category'] = $category;
        $this->template->load('/admin/templates/main_template', '/admin/categories/edit', $this->data);
    }
    
    
    //checks to see if category name already exists    
    function _category_name_exists($name){
        $category = new Category();
        $category->where('name', $name)->get();
        if($category->exists()) return false;
        return true;
    }
}

/* End of file admin.php */
/* Location: ./system/application/controllers/admin/products.php */