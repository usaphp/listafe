<?php
    if(!isset($language_selected)) $language_selected = '1';
    $inp_name = array(
        'name'  => 'inp_name',
        'id'    => 'inp_name_id',
        'class' => 'f_input f_joined required',
        'value' => $text_value
    );
    $sel_languages = array(
        'options'   => array_for_dropbox($languages,''),
        'selected'  => $language_selected,
        'name'      => 'sel_languages[]',
    );
    echo form_input($inp_name);
    echo form_dropdown($sel_languages['name'],$sel_languages['options'],$sel_languages['selected'],'id = "sel_languages" class = "f_select f_last"');
    echo separator_div();
?>