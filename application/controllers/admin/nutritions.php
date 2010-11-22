<?php

class Nutritions extends Admin_Controller {
	
	function __construct(){
		parent::__construct();
	}

	function index(){
        $this->show();
	}

    function show(){
        $nutritions             = new Nutrition();
        $nutrition_categories   = new Nutrition_category();        
		$nutritions->get_full_info();        
        $nutrition_categories->get_full_info();        
        $this->data['nutritions'] = $nutritions;
        $this->data['nutrition_categories'] = $nutrition_categories;
        $this->template->load('/admin/templates/main_template', '/admin/nutritions/show', $this->data);
    }

	function delete($id = false) {
		if ($id) {
			$nutrition = new Nutrition($id);
			if ($nutrition->exists())
				$nutrition->delete();
		}
		
		$this->session->set_flashdata('top_success', 'Вещество  удалено');
		redirect('admin/nutritions/show');
	}

	function edit($id = false){
        $this->load->library('form_validation');
        # var $data['js_functions'] init from Admin_Controller
		# Js function from main.js which loads by default  
		array_push($this->data['js_functions'], array('name' => 'nutritions_edit_init', 'data' => FALSE));
        
        $languages                = new Language();
        $nutrition                = new Nutrition();
		$nutrition_categories     = new Nutrition_category();
        
        $languages->get_iterated();
        $nutrition->get_full_info($id);
        $nutrition_categories->get_full_info();

        //if form validates
        if($this->form_validation->run('nutrition')){
            $nutrition_category = new Nutrition_category();
            $nutrition_category->get_by_id($this->input->post('nutritions_categories_id'));
            $nutrition->nutrition_category_id = $nutrition_category->id; 
            if($this->save_object_name($nutrition)){                
                $this->data['form_success'] = 'Вещество  добавлено';
            }else{
                $this->data['form_error'] = $nutrition->error->string;
            }
        }else{
            #$this->data['form_error'] = validation_errors();
        }
        
        $this->data['languages']            = $languages;
        $this->data['dm_nutrition']         = $nutrition;
        $this->data['current_language']     = 1; #Russian
        $this->data['nutrition_categories'] = $nutrition_categories; 
        $this->template->load('/admin/templates/main_template', '/admin/nutritions/edit', $this->data);
    }

	function _nutrition_name_exists($name) {
		$nutrition = new Nutrition();
		$nutrition->where('name', $name)->get();
		if ($nutrition->exists())
			return false;
		return true;
	}
}