<?php if (!defined('BASEPATH')) exit('Нет доступа к скрипту');

class Security_lib {
    
    private $CI;
	private $logged_in;
	private $user_id;
	
    function __construct(){
        $this->CI = & get_instance();
		$this->update_login_status();
    }
	
	public function force_login(){
		if(!$this->is_loggedin()) redirect($this->CI->linker->a_login_link());
	}
	
	/* Check if user is logged in */
	public function is_loggedin(){
		return $this->logged_in;
	}
	
	/* Login user with username and password */
	public function login($username, $password){
	   
		$admin_user = new Admin_user();
		if($admin_user->login($username, $password)){
			$userdata = array('user_id' => $admin_user->id, 'logged_in' => TRUE);
			$this->CI->session->set_userdata($userdata);
			$this->update_login_status();
			return TRUE;
		}
		return FALSE;
	}
	
	public function logout(){
		$userdata = array('user_id' => '', 'logged_in' => '');
		$this->CI->session->set_userdata($userdata);
		$this->update_login_status();
		return TRUE;
	}
	
	/* updates class variables with the session data */
	private function update_login_status(){
		$this->logged_in = $this->CI->session->userdata('logged_in');
		$this->user_id = $this->CI->session->userdata('user_id');
		return;
	}
	
	public function register(){
		
	}
}
	