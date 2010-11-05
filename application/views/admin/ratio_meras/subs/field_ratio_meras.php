<?php
        if(!isset($value_scalar))   $value_scalar = '';
        if(!isset($relativ_scalar)) $value_relativ = '';
        $sel_mera	= array(
            'options' => array_for_dropbox($meras, 'Мера Измерения'),
            'name'    => 'mera',            
            'class'   => 'f_select f_joined');
        $qty_scalar = array(   	        	
            'name'   => 'qty_scalar',
        	'class'	   => 'f_input tiny f_joined f_last');
        	
        $qty_relativ = array(
        	'name'   => 'qty_relativ',            
        	'class'	   => 'f_input tiny f_joined f_last');
        $sel_mera['id']	       = 'mera';    	
    	$sel_mera['selected']  =  '';#         
    	#$qty_scalar['id']      = 'qty_1_';
        $qty_scalar['value']   = $value_scalar; #value-onalogi4no name
        #$qty_relativ['id']     = 'qty_2'
        $qty_relativ['value']  = $value_relativ; #value-onalogi4no name                    
        
        echo form_label('Конвертируемые меры', '', array('class' => 'f_label'));
        echo form_input($qty_scalar);
        echo form_dropdown($sel_mera['name'].'_scalar[]', $sel_mera['options'], $sel_mera['selected'], 'id = "'.$sel_mera['id'].'" class = "'.$sel_mera['class'].'""');                    
        echo form_label('Содержится', '', array('class' => 'f_label f_joined'));
        echo form_input($qty_relativ);
        echo form_dropdown($sel_mera['name'].'_relativ[]', $sel_mera['options'], $sel_mera['selected'], 'id = "'.$sel_mera['id'].'" class = "'.$sel_mera['class'].'"');                	                	                                    
        echo cleared_div();
?>