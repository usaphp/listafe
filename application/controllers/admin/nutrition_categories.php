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
        $nutrition_categories->get_full_info();
        $this->data['nutrition_categories'] = $nutrition_categories;
        $this->template->load('/admin/templates/main_template', '/admin/nutrition_categories/show', $this->data);
    }
    
    function delete($id = false){
        if($id){
            $nutrition_categories = new Nutrition_category($id);
            if($nutrition_categories->exists()) $nutrition_categories->delete();
        }
        $this->session->set_flashdata('top_success', 'Вещество  удалено');
        redirect('admin/nutrition_categories/show');
    }
    
    function edit($id = false){
        $this->load->library('form_validation');
        # Js function from main.js which loads by default  
        array_push($this->data['js_functions'], array('name' => 'nutrition_categories_edit_init', 'data' => FALSE));
        
        $nutrition_category = new Nutrition_category();
        if($id) $nutrition_category->get_full_info($id);                
        //if form validates
        if($this->form_validation->run('nutrition_category')){
            $nutr_category_name = $this->input->post('nutrition_categories_name');
            if($nutr_category_name){
                $nutrition_category->save_by_language(array('name'=>$nutr_category_name));                                
                $this->data['form_success'] = 'Категория добавлена';
            }else{
                $this->data['form_error'] = 'error';
            }
        }else{
            $this->data['form_error'] = validation_errors();
        }
        $this->data['nutrition_categories'] = $nutrition_category;
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