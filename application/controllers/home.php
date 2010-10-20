<?php

class Home extends MY_Controller {

	function __construct()
	{
		parent::__construct();
        $this->_forse_login(TRUE);	
	}
	
	function index()
	{
        $this->template->load('/templates/main_template', 'homepage');
	}
    
    function reciepts()
    {
        $this->template->load('/templates/main_template', 'reciepts');
    }
}

/* End of file admin.php */
/* Location: ./system/application/controllers/admin.php */