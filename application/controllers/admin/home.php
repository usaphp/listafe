<?php

class Home extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
        $this->_forse_login(TRUE);	
	}
	
	function index()
	{
        $this->template->load('/admin/templates/main_template', '/admin/dashboard');
	}
    
}

/* End of file home.php */
/* Location: ./system/application/controllers/admin/home.php */