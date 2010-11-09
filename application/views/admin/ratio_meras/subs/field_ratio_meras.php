<?php
        if(!isset($scalar_selected))    $scalar_selected = '';
        if(!isset($scalar_value))       $scalar_value = '';
        if(!isset($relative_selected))  $relative_selected = '';
        if(!isset($relative_value))     $relative_value = '';
        if(!isset($scalar_relative))    $scalar_relative = '_';
        $sel_scalar_mera	= array(            
            'name'    => 'mera_scalars[]',
            'options' => array_for_dropbox($scalar_meras, 'Мера Измерения'),            
            'selected'=> $scalar_selected,
            'class'   => 'f_select f_joined');        
        $sel_relative_mera	= array(
            'name'    => 'mera_relatives[]',
            'options' => array_for_dropbox($relative_meras, 'Мера Измерения'),                        
            'selected'=> $relative_selected,
            'class'   => 'f_select f_joined');
        $inp_scalar = array(   	        	
            'name'  => 'val_scalars[]',
        	'value' => $scalar_value,
            'class'	=> 'f_input tiny f_joined f_last');
        $inp_relative = array(
        	'name'   => 'val_relatives[]',            
        	'value' => $relative_value,
            'class'	   => 'f_input tiny f_joined f_last');
        $btn_remove = array(
            'id'=>'remove_ratio_'.$scalar_relative,
            'class'=>'f_remove f_button grey');   	
    	        
        echo form_label('Конвертируемые меры', '', array('class' => 'f_label'));
        echo form_input($inp_scalar);
        echo form_dropdown($sel_scalar_mera['name'], $sel_scalar_mera['options'], $sel_scalar_mera['selected'], '" class = "'.$sel_scalar_mera['class'].'""');                    
        echo form_label('Содержится', '', array('class' => 'f_label f_joined'));
        echo form_input($inp_relative);
        echo form_dropdown($sel_relative_mera['name'], $sel_relative_mera['options'], $sel_relative_mera['selected'],'" class = "'.$sel_relative_mera['class'].'"');
        echo anchor('#','delete',$btn_remove);                	                	                                    
        echo cleared_div();
?>