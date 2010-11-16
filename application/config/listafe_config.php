<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
    /*
    |--------------------------------------------------------------------------
    | Session Variables
    |--------------------------------------------------------------------------
    */
    $config['sess_use_database']	= FALSE;
    //-------------------------------------------------------------------------    

    $config['product_images_path']  = $_SERVER['DOCUMENT_ROOT'].'/photos/product_images/';
    $config['recipe_images_path']   = $_SERVER['DOCUMENT_ROOT'].'/images/recipes/';
    $config['step_images_path']     = $_SERVER['DOCUMENT_ROOT'].'/images/steps/';
    
    
?>