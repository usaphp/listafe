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
        
        $nutrition                = new Nutrition();
		$nutrition_categories     = new Nutrition_category();
		         
        $nutrition->get_full_info($id);	
        $nutrition_categories->get_full_info();

        //if form validates
        if($this->form_validation->run('nutrition')){
            $curr_lang = new Language();
            #
            $curr_lang->get_by_name($this->data['language']['current']);
            #
            $nutrition->set_join_field($curr_lang,'name',$this->input->post('nutrition_name'));
            #
            $nutrition->nutrition_category_id = $this->input->post('nutritions_categories_id');
            if($nutrition->save()){
                $this->data['form_success'] = 'Вещество  добавлено';
            }else{
                $this->data['form_error'] = $nutrition->error->string;
            }
        }else{
            #$this->data['form_error'] = validation_errors();
        }        
        $this->data['nutrition'] = $nutrition;
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