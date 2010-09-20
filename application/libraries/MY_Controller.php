<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends Controller {
    
    public $top_error;
    public $top_success;
    
    function __construct(){
        parent::__construct();
        $this->top_error    = $this->session->flashdata('top_error');
        $this->top_success  = $this->session->flashdata('top_success');
    }
    
    // loggs user in
    function _forse_login($admin = FALSE){
        //if admin is not logged in redirect
        
    }
}