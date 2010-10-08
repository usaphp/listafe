<?php

class Nutritions extends MY_Controller {
	
	var $data = array();

	function __construct(){
		parent::__construct();
        $this->_forse_login(TRUE);
		$this->data['form_success'] = false;
        $this->data['form_error'] =  false;

		# Js function from main.js which loads by default
		$this->data['js_functions'] = array();
		array_push($this->data['js_functions'], array('name' => 'nutritions_edit_init', 'data' => FALSE));
	}

	function index(){
        $this->show();
	}

    function show(){
        $nutritions = new Nutrition();
		$nutritions->include_related('nutrition_category')->get();
        $this->data['nutritions'] = $nutritions;
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

        $nutrition = new Nutrition($id);
		$nutritions_categories = new Nutritions_category();
		$nutritions_categories->get();
		
        $rules = array(
            array('field' => 'nutrition_name', 'label' => 'Название Вещества', 'rules' => 'trim|required|xss_clean|_nutrition_name_exists')
        );
        $this->form_validation->set_rules($rules);

        //if form validates
        if($this->form_validation->run()){
            $nutrition->name				= $this->input->post('nutrition_name');
            $nutrition->category_id          = $this->input->post('nutritions_categories_id');

            if($nutrition->save()){
                $this->data['form_success'] = 'Вещество  добавлено';
            }else{
                $this->data['form_error'] = $nutrition->error->string;
            }
        }
        $this->data['nutrition'] = $nutrition;
        $this->data['nutritions_categories'] = $nutritions_categories;
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