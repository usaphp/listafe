<?php
	$product= array(
	'id'	=> 'product_'.$recipe_product_id,
	'name'	=> 'product_'.$recipe_product_id,
	'class'	=> 'f_input f_joined suggest_product',
	'value' => set_value('product_'.$recipe_product_id));
	$mera	= array(
	'options' => array_for_dropbox($mera_model, 'Мера Измерения'),
	'id'	=> 'mera_'.$recipe_product_id,
	'name'	=> 'mera_'.$recipe_product_id,
	'selected' => set_value('mera_'.$recipe_product_id),
	'class'	=> 'f_select f_joined');
	$qty	= array(
	'id'	=> 'qty_'.$recipe_product_id,
	'name'	=> 'qty_'.$recipe_product_id,
	'class'	=> 'f_input tiny f_joined f_last',
	'value' => set_value('qty_'.$recipe_product_id));
	
	echo form_label('Продукт '.$recipe_product_id, $product['id'], array('class' => 'f_label'));
	echo form_input($product);
	echo form_dropdown($mera['name'], $mera['options'], $mera['selected'], 'id = "'.$mera['id'].'" class = "'.$mera['class'].'"');
	echo form_input($qty);
	echo cleared_div();
?>