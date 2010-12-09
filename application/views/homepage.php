<?php        
    
    $inp_product_name = array(
    	'id'	=> 'product_type_id',
    	'name'	=> 'product_type_name',
    	'class'	=> 'f_input f_joined suggest_product_types',
    	'value' => ''
     ); #
     $btn_search = array(
    	'id'	=> 'search_button_id',
    	'name'	=> 'search_bytton_name',
    	'class'	=> 'f_button tiny f_last',
    	'value' => 'Search'
    ); #value-onalogi4no name
?>
    <div class="span-24 content">
    <div class="f_header">Поиск продукта</div>
    <?php echo form_open($this->linker->home_product_type_by_name(), array('class' => 'f_form'));?>
    <div class="f_content">
        <?php 
            echo form_label('Food Name', $inp_product_name['id'], array('class' => 'f_label'));
        	echo form_input($inp_product_name);
            echo form_submit($btn_search);
        ?>
        <div class="clear"></div>
        <div id = "products_result_block"></div>
<?php echo form_close(); ?>
</div>