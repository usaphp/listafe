<?php

class Nutrition_categories extends Admin_Controller {
    
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
        $nutrition_categories = new Nutrition_category();
        $nutrition_categories->get();
        $this->data['nutrition_categories'] = $nutrition_categories;
        $this->template->load('/admin/templates/main_template', '/admin/nutrition_categories/show', $this->data);
    }
    
    function delete($id = false){
        if($id){
            $nutrition_categories = new Nutrition_category($id);
            if($nutrition_categories->exists()) $nutrition_categories->delete();
        }
        $this->session->set_flashdata('top_success', 'Категория удалена');
        redirect('admin/categories/show');
    }
    
    function edit($id = false){
        $this->load->library('form_validation');
        # Js function from main.js which loads by default  
        array_push($this->data['js_functions'], array('name' => 'nutrition_categories_edit_init', 'data' => FALSE));
        
        $nutrition_categories = new Nutrition_category($id);
        
        $rules = array(
            array('field' => 'nutrition_categories_name', 'label' => 'Название Категории', 'rules' => 'trim|required|xss_clean|_nutrition_category_name_exists')
        );
        $this->form_validation->set_rules($rules);
        
        //if form validates
        if($this->form_validation->run()){
            $nutrition_categories->name = $this->input->post('nutrition_categories_name');
            
            if($nutrition_categories->save()){
                $this->data['form_success'] = 'Категория добавлена';
            }else{
                $this->data['form_error'] = 'error';
            }
        }else{
            $this->data['form_error'] = validation_errors();
        }
        $this->data['nutrition_categories'] = $nutrition_categories;
        $this->template->load('admin/templates/main_template', 'admin/nutrition_categories/edit', $this->data);
    }
    
    
    //checks to see if category name already exists    
    function _nutrition_category_name_exists($name){
        $nutrition_categories = new Nutrition_category();
        $nutrition_categories->where('name', $name)->get();
        if($nutrition_categories->exists()) return false;
        return true;
    }
}

/* End of file admin.php */
/* Location: ./system/application/controllers/admin/products.php */