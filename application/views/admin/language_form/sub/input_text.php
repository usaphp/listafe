<?php
    if (!isset($language_number)) $language_number = 1;
    #if (!isset($main_number)) $main_number = 1;
    $sel_languages = array(
        'options'   => array_for_dropbox($dm_languages,''),
        'selected'  => (isset($language->id))?$language->id:$language_number,
        'name'      => 'sel_languages_text_'.$number.'_'.$language_number,
    );
    $inp_textarea = array(
        'name'  => 'inp_text_'.$number.'_'.$language_number,
        'id'    => 'inp_text_id',
        'class' => 'f_textarea small',
        'value' => (isset($language))?$language->join_text:''
    );
    echo form_dropdown($sel_languages['name'],$sel_languages['options'],$sel_languages['selected'],'id = "sel_languages" class = "f_select"');
    echo separator_div();
    echo form_textarea($inp_textarea);
    echo separator_div();
?>