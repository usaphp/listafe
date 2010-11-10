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
        if(!$id) return $this->show();
        $this->load->library('form_validation');
        #
        $statuses       = new Translate_status();
        $recipe         = new Translate_recipe();                        
        $recipe->get_by_id($id);        
        #vihodit esli net takogo id
        if(!$recipe->id) return $this->show();
        #
        if($this->form_validation->run('translate_recipe')){
            $text_translate         = $this->input->post('text_translate');
            # v array rdo_statuses to'ko odno zna4enie pereklu4atela statusa
            list($status_selected)  = $this->input->post('rdo_statuses');            
            if ($text_translate){
                #
                $recipe->translate  = $text_translate;
                if ($status_selected) $recipe->status = $status_selected;
                
                if($recipe->save()){
                    
                    $this->data['form_success'] = '... coхранен';
                }
                else
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
    function add(){
		
	}
    #
    function delete($id=false){
    #    
    }
    function _save(){
        #code
    }    
}
/* End of file admin.php */
/* Location: ./system/application/controllers/admin/admin.php */
?>
