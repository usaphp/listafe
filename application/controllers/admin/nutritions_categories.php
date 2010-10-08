<?php

class Nutritions_categories extends MY_Controller {

	function __construct()
	{
		parent::__construct();
        $this->_forse_login(TRUE);
		$this->data = array();
        $this->data['form_success'] = FALSE;
        $this->data['form_error'] =  FALSE;
	}
	
	function index()
	{
        $this->show();
	}
    
    function show()
    {
        $nutritions_categories = new Nutrition_category();
        $nutritions_categories->get();
        $this->data['nutritions_categories'] = $nutritions_categories;
        $this->template->load('/admin/templates/main_template', '/admin/nutrition_categories/show', $this->data);
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
        
        
        $category = new Category($id);
        
        $rules = array(
            array('field' => 'category_name', 'label' => 'Название Категории', 'rules' => 'trim|required|xss_clean|_category_name_exists')
        );
        $this->form_validation->set_rules($rules);
        
        //if form validates
        if($this->form_validation->run()){
            $category->name          = $this->input->post('category_name');
            
            if($category->save()){
                $data['form_success'] = 'Категория добавлена';
            }else{
                $data['form_error'] = $category->error->string;
            }
        }
        $data['category'] = $category;
        $this->template->load('/admin/templates/main_template', '/admin/categories_edit', $data);
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