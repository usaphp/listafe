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
        
		
		$this->data = array();
        $this->data['form_success'] = FALSE;
        $this->data['form_error'] =  FALSE;
		
		$this->data['js_functions'] = array();
		array_push($this->data['js_functions'], array('name' => 'general_init', 'data' => FALSE));
		array_push($this->data['js_functions'], array('name' => 'tabs_init', 'data' => FALSE));
		array_push($this->data['js_functions'], array('name' => 'dropdown_init', 'data' => FALSE));
		
		$this->output->enable_profiler(TRUE);
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