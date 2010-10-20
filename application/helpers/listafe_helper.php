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
    return string('/images/recipes/'.'re_'.$image_id.'_'.$recipe_id.'_'.$size);
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
function array_for_dropbox($obj, $caption = '', $value = 'id', $text = 'name'){
    $o = $obj->get_iterated();
    $data = array('' => $caption);
    foreach($o as $obj){
        $data[$obj->$value] = $obj->$text;
    }
    return $data;
}

function print_flex($arr){
    echo '<pre>';
        print_r($arr);
    echo '</pre>';
}