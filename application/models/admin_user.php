<?php
class Admin_user extends DataMapper {
    
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    
	/* search for a user with specified username and password in database */
	function login($username, $password){
		$this->where(array('username' => $username, 'password' => $password))->get();
		if($this->exists()){
			return TRUE;
		}
		return FALSE;
	}
    
}