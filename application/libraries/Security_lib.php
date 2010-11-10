<?php if (!defined('BASEPATH')) exit('Нет доступа к скрипту');

class Security_lib {
    
    private $CI;
	
    function __construct(){
        $this->CI = & get_instance();
    }
	
	public function force_login(){
		if(!$this->is_loggedin()) redirect($this->CI->linker->a_login_link());
	}
	
	/* Check if user is logged in */
	public function is_loggedin(){
		if($this->CI->session->userdata('user_id')){
			return TRUE;
		}
		return FALSE;
	}
	
	/* Login user with username and password */
	public function login($username, $password){
		
	}
	
	public function register(){
		
	}
}
	