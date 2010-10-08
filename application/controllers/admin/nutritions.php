<?php

class Nutritions extends MY_Controller {
	
	var $data = array();

	function __construct(){
		parent::__construct();
        $this->_forse_login(TRUE);
		$this->data['form_success'] = false;
        $this->data['form_error'] =  false;
	}

	function index(){
        $this->show();
	}

    function show(){
        $nutritions = new Nutrition();
        $nutritions->get_iterated();
        $this->data['nutritions'] = $nutritions;
        $this->template->load('/admin/templates/main_template', '/admin/nutritions/nutritions_show', $this->data);
    }

	function delete($id = false) {
		if ($id) {
			$nutrition = new Nutrition($id);
			if ($nutrition->exists())
				$nutrition->delete();
		}
		$this->session->set_flashdata('top_success', 'Категория удалена');
		redirect('admin/nutritions/show');
	}

	function edit($id = false){
        $this->load->library('form_validation');

        $nutrition = new Nutrition($id);

        $rules = array(
            array('field' => 'nutrition_name', 'label' => 'Название Ингридиента', 'rules' => 'trim|required|xss_clean|_nutrition_name_exists')
        );
        $this->form_validation->set_rules($rules);

        //if form validates
        if($this->form_validation->run()){
            $nutrition->name          = $this->input->post('nutrition_name');

            if($nutrition->save()){
                $this->data['form_success'] = 'Ингридиент добавлен';
            }else{
                $this->data['form_error'] = $nutrition->error->string;
            }
        }
        $this->data['nutrition'] = $nutrition;
        $this->template->load('/admin/templates/main_template', '/admin/nutritions/nutritions_edit', $this->data);
    }

	function _nutrition_name_exists($name) {
		$nutrition = new Nutrition();
		$nutrition->where('name', $name)->get();
		if ($nutrition->exists())
			return false;
		return true;
	}

}