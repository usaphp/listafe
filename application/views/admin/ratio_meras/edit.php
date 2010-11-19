<div class="span-24 content">  
    <div class="f_header">Добавление ценовых категорий</div>  
	<?php echo form_open('/admin/ratio_meras/edit/', array('id' => 'edit_ratio_meras_form', 'class' => 'f_form span-24', 'autocomplete' => 'off'));?>
    <div class="f_content span-24">
    	<?php form_success_error($form_error, $form_success);
        $inp_product= array(
    	'id'	=> 'inp_product',
    	'name'	=> 'inp_product',
    	'class'	=> 'f_input f_joined suggest_product',
    	'value' => set_value('product',$product->name)); #name- zagruzka iz bazi
        
        echo form_label('Продукт ', $inp_product['id'], array('class' => 'f_label'));
        echo open_f_block('language_block_id');
        echo form_hidden('total_language',$dm_main_object->result_count());
        foreach($dm_main_object->language as $language){
            $data['text_value']         = $language->join_name;
            $data['language_selected']  = $language->id;
            $this->load->view('admin/language_form',$data);
        }
        echo close_f_block();
        echo button_add_language();        
        echo cleared_div();

        echo anchor('#', 'Load Product', array('class'=> 'f_button grey wide', 'id' => 'load_product'));
        echo cleared_div();
        ?>                    
        <div id="product_meras">            
        	<?php
            if($product->id)
                $this->load->view('admin/ratio_meras/subs/product_data');            
            ?>
        </div>
        	
	</div>	
	<?php echo form_close(); ?>
 </div>