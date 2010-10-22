<?php
    #ecli zagruzka stranici proishodit 4erez 'recipe/add' to name,value,mera ne sozdautsa 
    #vozmojno ect' lutshii variant! 
    #mera vremenno ne realizovana  
    if(!isset($name))$name='';
    if(!isset($mera))$mera='';
    if(!isset($value))$value='';
    if(!isset($image))$image='';
	$product= array(
	'id'	=> 'product_'.$recipe_product_id,
	'name'	=> 'product_'.$recipe_product_id,
	'class'	=> 'f_input f_joined suggest_product',
	'value' => set_value('product_'.$recipe_product_id,$name)); #name- zagruzka iz bazi
	$mera	= array(
	'options' => array_for_dropbox($meras, 'Мера Измерения'),
	'id'	=> 'mera_'.$recipe_product_id,
	'name'	=> 'mera_'.$recipe_product_id,
	'selected' => set_value('mera_'.$recipe_product_id,$mera), 
	'class'	=> 'f_select f_joined');
	$qty	= array(
	'id'	=> 'qty_'.$recipe_product_id,
	'name'	=> 'qty_'.$recipe_product_id,
	'class'	=> 'f_input tiny f_joined f_last',
	'value' => set_value('qty_'.$recipe_product_id,$value)); #value-onalogi4no name
	echo form_label('Продукт '.$recipe_product_id, $product['id'], array('class' => 'f_label'));
	echo form_input($product);
	echo form_dropdown($mera['name'], $mera['options'], $mera['selected'], 'id = "'.$mera['id'].'" class = "'.$mera['class'].'"');
	echo form_input($qty);
?>	
    <img src="/photos/product_images/<?php echo $image = ($image!='')? substr($image,0,strpos($image,'.')).'_tiny.jpg': 'pi_empty_tiny.jpg'; ?>"/>
    <?php
    echo cleared_div();
?>