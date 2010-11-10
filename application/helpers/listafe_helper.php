<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function ajax_json_return($status, $message){
        $string = json_encode(array('status' => $status, 'message' => $message));
        return $string;
    }
    
    function image_url($image, $type, $size = ''){
        switch($type){
            case 'product':
                $image_name = preg_replace('/(.+)\.(\w+)/iU', '$1_'.$size.'.$2', $image);
                $image_path = '/photos/product_images/'.$image_name;
                return $image_path;
            case 'recipe':
                $image_name = preg_replace('/(.+)\.(\w+)/iU', '$1_'.$size.'.$2', $image);
                $image_path = '/images/recipes/'.$image_name;
                return $image_path;
            break;
        }
    }
    # return name image for input recipe on show
    function get_name_image($image_id, $recipe_id, $size = ''){
        $name = '/images/recipes/'.'re_'.$image_id.'_'.$recipe_id.'_'.$size.'.jpg';
        return $name;
    }
    
	/* sets flashdata message by location(head, top) , type (error, succes, notification), message (string) */
    function inform_flash_message($location, $type, $message){
    	$key = $location.'_'.$type.'_message';
    	$this->session->set_flashdata($key, $message);
    }
	
    function top_success_error($top_error, $top_success){
        if($top_error){
            echo "<div class='top_error'>".$top_error."</div>";
        }
        if($top_success){
            echo "<div class='top_success'>".$top_success."</div>";
        }
    }
    
    /* Generates the form error and success messages if there are any */
    function form_success_error($form_error, $form_success){
        if($form_error){
            echo "<div class='f_error_top f_message'>".$form_error."</div>";
        }
        if($form_success){
            echo "<div class='f_success_top f_message'>".$form_success."</div>";
        }
    }
    
    //generates an array from passed obect to use in select box 
    function array_for_dropbox($objs, $caption = '', $value = 'id', $text = 'name'){
        $data = array('' => $caption);
        foreach($objs as $obj){
            $data[$obj->$value] = $obj->$text;
        }
        return $data;
    }
    
    function generate_url($segments) {
		for($i=0; $i< count($segments); $i++){
			$segments[$i] = clean_string($segments[$i]);
		}
		$url = site_url($segments);
		return $url;
	}	
	
	/* Removes everything except numbers and letters from url */
	function clean_string($string) {
		/*
        Poka ne budem ispolzovat potom budet vidno. Tamik
        $string = preg_replace('/[^\w\d\/]/','-', $string);
		$string = preg_replace('/\-+/', '-', $string);
		$string = preg_replace('/.*\-$/', '', $string);*/
		return $string;
	}
    function explode_ext($var,$keys=false){
        if(!$keys){
            list($id,$val) = explode('_',$var);
            return array('id'=>$id,'value'=>$val);
        }
        $stacks = explode('_',$var);
        $results = array();
        if (count($stacks)<count($keys)) return false;
        foreach ($keys as $num => $key)
            $results[$key] = $stek[$num];
        return $results;
    }
    function explode_scalar_relative($var){
        list($scalar,$relative) = explode('_',$var);
        return array('scalar'=>$scalar,'relative'=>$relative);
    }
    #
    function return_subarray_by_key($search_key,array $input_array){
        $result_array = array();
        foreach($input_array as $val)
            array_push($result_array, $val[$search_key]);
        return $result_array;
    }
    #
    function datamapper_object_exist(DataMapper $needle,DataMapper $haystack){        
        foreach($haystack as $val){
            if($needle->id==$val->id) return true;                        
        }
        return false;
    }
    #vozvrashaet nabor otnosheni' velichit
    function dm_get_ratios_array($scalar,$val_scalar,$relative,$val_relative){
        echo $scalar.' '.$relative;
       if ($scalar && $relative) return array('scalar'=>$scalar,'val_scalar'=>$val_scalar,'relative'=>$relative,'val_relative'=>$val_relative); 
        
    }
    function array_wrap($var){
        return array($var);
    }
    function print_flex($arr){
        echo '<pre>';
            print_r($arr);
        echo '</pre>';
    }