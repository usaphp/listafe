<?php
    if(!isset($current_langueage)) $current_langueage = '1';
    $inp_name = array(
            'name'  => 'inp_name',
            'id'    => 'inp_name_id',
            'class' => 'f_input f_joined required',
            'value' => $object->join_name
    );
        
    $sel_languages = array(
        'options'   => array_for_dropbox($languages,''),
        'selected'  => $current_langueage,
        'name'      => 'sel_languages f_last',
    );
    echo form_input($inp_name);
    echo form_dropdown($sel_languages['name'],$sel_languages['options'],$sel_languages['selected'],'id = "sel_languages" class = "f_select f_joined"');            
?>