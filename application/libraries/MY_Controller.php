<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends Controller {
		
	public $top_error;
    public $top_success;
    
    function __construct(){
        parent::__construct();
        
        $this->top_error    = $this->session->flashdata('top_error');
        $this->top_success  = $this->session->flashdata('top_success');
        
        $this->_forse_login(TRUE);
		
		$this->data = array();
        $this->data['form_success'] = FALSE;
        $this->data['form_error'] =  FALSE;
		
		$this->data['js_functions'] = array();
		array_push($this->data['js_functions'], array('name' => 'general_init', 'data' => FALSE));
		array_push($this->data['js_functions'], array('name' => 'tabs_init', 'data' => FALSE));
		array_push($this->data['js_functions'], array('name' => 'dropdown_init', 'data' => FALSE));
		
		$this->output->enable_profiler(TRUE);
    }
    
    // loggs user in
    function _forse_login($admin = FALSE){
        //if admin is not logged in redirect
        
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
    
    // loggs user in
    function _forse_login($admin = FALSE){
        //if admin is not logged in redirect
        
    }
}