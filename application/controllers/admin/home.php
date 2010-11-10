<?php

class Home extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->security_lib->force_login();
	}
	
	function index()
	{
        $this->template->load('/admin/templates/main_template', '/admin/dashboard');
	}
    
}

/* End of file home.php */
/* Location: ./system/application/controllers/admin/home.php */