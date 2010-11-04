
<div class="span-24 content" id="product_edit_w">  
    <div class="f_header">Добавление ценовых категорий</div>  
	<?php echo form_open('/admin/product_prices/edit/'.$product->id, array('id' => 'edit_product_prices_form', 'class' => 'f_form span-24', 'autocomplete' => 'off'));?>
    <div class="f_content span-24">
    	<?php form_success_error($form_error, $form_success);
        $inp_product= array(
    	'id'	=> 'product',
    	'name'	=> 'product',
    	'class'	=> 'f_input f_joined suggest_product',
    	'value' => set_value('product',$product->name)); #name- zagruzka iz bazi
        
        echo form_label('Продукт ', "product['id']", array('class' => 'f_label'));
    	echo form_input($inp_product);
        ?>                    
        <a href = '#' id = 'get_product' class = 'f_button grey wide'>Открыть</a>
        <div id="recipe_products">            
        	<?php
            echo cleared_div(); 
            if($product->id){ 
                $sel_mera = array(
            	'options' => array_for_dropbox($meras, 'Мера Измерения'),
            	'id'	=> 'main_mera_'.$product->mera_id,
            	'name'	=> 'main_mera_'.$product->mera_id,
            	'selected' => set_value('main_mera_',$product->mera_id), 
            	'class'	=> 'f_select f_joined');
                echo form_label('Основная мера', '', array('class' => 'f_label'));
                echo form_dropdown($sel_mera['name'], $sel_mera['options'], $sel_mera['selected'], 'id = "'.$sel_mera['id'].'" class = "'.$sel_mera['class'].'"');
                echo cleared_div();
                $sel_mera	= array('options' => array_for_dropbox($meras, 'Мера Измерения'));
                foreach($meras as $key => $mera){                                             	
                	$sel_mera['id']	       = 'mera_'.$mera->id;
                	$sel_mera['name']      = 'mera_'.$mera->id;
                	$sel_mera['selected']  = set_value('mera_'.$product->id); 
                	$sel_mera['class']     = 'f_select f_joined';                    
                    $qty	= array(
                	'id'	=> 'qty_'.$product->id,
                	'name'	=> 'qty_'.$product->id.'_'.$mera->id,
                	'class'	=> 'f_input tiny f_joined f_last',
                	'value' => set_value('qty_'.$product->id.'_'.$mera->id,'')); #value-onalogi4no name            	
                    
                    echo form_label('Конвертируемые меры', '', array('class' => 'f_label'));
                    echo form_dropdown($sel_mera['name'].'_1', $sel_mera['options'], $sel_mera['selected'], 'id = "'.$sel_mera['id'].'" class = "'.$sel_mera['class'].'"');                    
                    echo form_dropdown($sel_mera['name'].'_2', $sel_mera['options'], $sel_mera['selected'], 'id = "'.$sel_mera['id'].'" class = "'.$sel_mera['class'].'"');
                	echo form_input($qty);                	                                    
                    echo cleared_div();
                    #$this->load->view('admin/product_prices/sub/product/product_data',$this->data);
                }
             }
            ?>
        </div>		
	</div>
	
	<?php echo form_close(); ?>