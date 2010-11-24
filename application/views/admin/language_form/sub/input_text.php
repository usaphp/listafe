<?php
    if (!isset($number)) $number = 1;
    #if (!isset($main_number)) $main_number = 1;
    $sel_languages = array(
        'options'   => array_for_dropbox($dm_languages,''),
        'selected'  => (isset($language->id))?$language->id:$number,
        'name'      => 'sel_languages_text_'.$main_number.'_'.$number,
    );
    $inp_textarea = array(
        'name'  => 'inp_text_'.$main_number.'_'.$number,
        'id'    => 'inp_text_id',
        'class' => 'f_textarea small',
        'value' => (isset($language))?$language->join_text:''
    );
    echo form_dropdown($sel_languages['name'],$sel_languages['options'],$sel_languages['selected'],'id = "sel_languages" class = "f_select"');
    echo separator_div();
    echo form_textarea($inp_textarea);
    echo separator_div();
?>