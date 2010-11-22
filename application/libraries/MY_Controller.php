<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends Controller {
		
	public $top_error;
    public $top_success;    
    function __construct($force_login = TRUE){
        parent::__construct();
        
		# forse admin user to login
		if($force_login) $this->security_lib->force_login();
		
        $this->top_error    = $this->session->flashdata('top_error');
        $this->top_success  = $this->session->flashdata('top_success');
        
		
		$this->data                 = array();
        $this->data['form_success'] = FALSE;
        $this->data['form_error']   = FALSE;        
        $this->data['language']     = array('current' => 'Russian','default' => 'Russian');
		
		$this->data['js_functions'] = array();
		array_push($this->data['js_functions'], array('name' => 'general_init', 'data' => FALSE));
		array_push($this->data['js_functions'], array('name' => 'tabs_init', 'data' => FALSE));
		array_push($this->data['js_functions'], array('name' => 'dropdown_init', 'data' => FALSE));
        array_push($this->data['js_functions'], array('name' => 'language_name_init', 'data' => FALSE));		
		$this->output->enable_profiler(TRUE);
    }
    function get_current_language(){
        return $this->data['language']['current'];
    }
    function get_default_language(){
        return $this->data['language']['default'];
    }
    function set_current_language($language){
        $this->data['language']['current'] = $language; 
    }
    function save_object_name($dm_object){
        $total_language_names = $this->input->post('total_language_names');
        if ($total_language_names){
            #sohranaet name i language po ID
            for($i=1;$i<=$total_language_names;$i++){
                $language_names = $this->input->post('inp_name_'.$i);
                $dm_object->save_by_language(array('name' => $this->input->post('inp_name_'.$i)),
                                                    $this->input->post('sel_languages_'.$i));
            }
            return true;
        }
        return false;
    }
}

class MY_Controller extends Controller {
    
    public $top_error;
    public $top_success;
    
    function __construct(){
        parent::__construct();
        $this->top_error    = $this->session->flashdata('top_error');
        $this->top_success  = $this->session->flashdata('top_success');
		$this->output->enable_profiler(TRUE);
    }
    
}