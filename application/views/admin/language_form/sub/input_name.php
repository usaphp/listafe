<?php    
    $inp_name = array(
        'name'  => 'inp_name_'.$number,
        'id'    => 'inp_name_id',
        'class' => 'f_input f_joined required',
        'value' => (isset($language))?$language->join_name:''
    );
    $sel_languages = array(
        'options'   => array_for_dropbox($languages,''),
        'selected'  => ($language->id)?$language->id:$number,
        'name'      => 'sel_languages_'.$number,
    );
    echo form_input($inp_name);
    echo form_dropdown($sel_languages['name'],$sel_languages['options'],$sel_languages['selected'],'id = "sel_languages" class = "f_select f_last"');
    echo separator_div();
?>