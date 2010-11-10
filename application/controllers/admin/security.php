<?php

class Security extends Admin_Controller {
	
	function __construct()
	{
		parent::__construct(FALSE);
	}
	
	function index()
	{
        $this->template->load('/admin/templates/main_template', '/admin/dashboard');
	}
    
	/* admin user login */
	function login(){
		# Js function from main.js which loads by default  
		array_push($this->data['js_functions'], array('name' => 'login_init', 'data' => FALSE));
        
        $this->template->load('/admin/templates/login_template', '/admin/login_form', $this->data);
	}
	
	/* admin user logout */
	function logout(){
		$this->security_lib->logout();
		redirect($this->linker->a_home_link());
	}
}

/* End of file home.php */
/* Location: ./system/application/controllers/admin/home.php */