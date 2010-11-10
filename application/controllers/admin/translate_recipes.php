<?php
class Translate_recipes extends Admin_Controller {
    
	function __construct(){
		parent::__construct();        
	}
	#
	function index(){
        $this->show();
	}
    #
    function show(){        
        $recipes = new Translate_recipe();
        $this->data['recipes'] = $recipes->get_iterated();
        $this->template->load('/admin/templates/main_template', '/admin/translate_recipes/show', $this->data);
    }
    #
    function edit($id = false){        
        
        $this->load->library('form_validation');
        #
        $statuses       = new Translate_status();
        $recipe         = new Translate_recipe();                        
        $recipe->get_by_id($id);        
        #vihodit esli net takogo id
        #
        if($this->form_validation->run('translate_recipe')){
            $recipe->name               = $this->input->post('inp_name');
            $recipe->name_translate     = $this->input->post('inp_name_translate');
            $recipe->custom         	= $this->input->post('text_custom');
            $recipe->custom_translate	= $this->input->post('text_custom_translate');
			$recipe->ingredients         	= $this->input->post('text_ingredients');
            $recipe->ingredients_translate	= $this->input->post('text_ingredients_translate');
			$recipe->preparation         	= $this->input->post('text_preparation');
            $recipe->preparation_translate	= $this->input->post('text_preparation_translate');
            $recipe->url              		= $this->input->post('inp_url');
			$recipe->status					= $this->input->post('rdo_statuses');        
            if($recipe->save()){                    
                $this->data['form_success'] = 'Рецепт Сохранен';
            }
            else{
                $this->data['form_error'] = 'error';
            }
        }else{
            $this->data['form_error'] = validation_errors();
        }
        $this->data['recipe']           = $recipe;
        $this->data['dm_statuses']      = $statuses->get_iterated();        
        $this->template->load('/admin/templates/main_template', '/admin/translate_recipes/edit', $this->data);
    }

    #
    function delete($id=false){
    #    
    }
    function add(){          
        $this->load->library('form_validation');
        #
        $statuses       = new Translate_status();
        $recipe         = new Translate_recipe();                        
        #        
        $this->data['recipe']           = $recipe;
        $this->data['dm_statuses']      = $statuses->get_iterated();        
        $this->template->load('/admin/templates/main_template', '/admin/translate_recipes/edit', $this->data);
    }    
}
/* End of file admin.php */
/* Location: ./system/application/controllers/admin/admin.php */
?>
