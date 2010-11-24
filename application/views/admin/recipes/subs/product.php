<?php
    #ecli zagruzka stranici proishodit 4erez 'recipe/add' to name,value,mera ne sozdautsa 
    #vozmojno ect' lutshii variant! 
    #mera vremenno ne realizovana  
    if(!isset($name))$name = '';
    if(!isset($value))$value = '';
    if(!isset($mera_selected))$mera_selected = '';
	$inp_product   = array(
    	'id'	=> 'product_'.$number,
    	'name'	=> 'product_'.$number,
    	'class'	=> 'f_input f_joined suggest_product',
    	'value' => $name
    ); #name- zagruzka iz bazi
	$sel_mera  = array(
    	'options' => array_for_dropbox($dm_meras, 'Мера Измерения','id','join_name'),
    	'id'	=> 'mera_'.$number,
    	'name'	=> 'mera_'.$number,
    	'selected' => $mera_selected, 
    	'class'	=> 'f_select f_joined'
    );
	$inp_qty	= array(
    	'id'	=> 'qty_'.$number,
    	'name'	=> 'qty_'.$number,
    	'class'	=> 'f_input tiny f_joined f_last',
    	'value' => $value
    ); #value-onalogi4no name
	echo form_label('Продукт '.$number, $inp_product['id'], array('class' => 'f_label'));
	echo form_input($inp_product);
	echo form_dropdown($sel_mera['name'], $sel_mera['options'], $sel_mera['selected'], 'id = "'.$sel_mera['id'].'" class = "'.$sel_mera['class'].'"');
	echo form_input($inp_qty);
    if(isset($image)) echo '<img src="/photos/product_images/'.substr($image,0,strpos($image,'.')).'_tiny.jpg'.'"/>';
    echo anchor('#','delete',array('id'=>'remove_product_'.$number,'class'=>'f_remove f_button grey'));
    echo cleared_div();
?>