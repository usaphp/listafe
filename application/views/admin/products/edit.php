<?php
    $inp_product_name = array(
        'name'  => 'product_name',
        'id'    => 'product_name',
        'class' => 'f_input required',
        'value' => $product->join_name
    );
    $sel_product_category = array(
        'options' => array_for_dropbox($product_categories,'Категория продукта','id','join_name'),
        'name'  => 'product_category_id',
        'id'    => 'product_category_id',
        'class' => 'f_select wide required',
        'selected' => $product->product_category_id #dm_get_object_by_id($product->product_category_id,$product->product_category)->join_name
    );
    $txt_description = array(
        'name'  => 'description',
        'id'    => 'description',
        'class' => 'f_textarea',
        'value' => $product->join_description
    );
    $sel_mera = array(
        'options' => array_for_dropbox($meras,'Мера измерения','id','join_name'),
        'name'  => 'mera_id',
        'id'    => 'mera_id',
        'class' => 'f_select wide',
        'selected' => $product->mera_id
    );
    $inp_price = array(
        'name'  => 'price',
        'id'    => 'price',
        'class' => 'f_input required',
        'value' => $product->price
    );
    $inp_units_for_price = array(
        'name'  => 'units_for_price',
        'id'    => 'units_for_price',
        'class' => 'f_input f_joined number required',
        'value' => $product->units_for_price
    );
    $sel_units_mera = array(
        'options' => array_for_dropbox($meras,'Мера измерения','id','join_name'),
        'name'  => 'mera_for_price',
        'id'    => 'mera_for_price',
        'class' => 'f_select wide f_joined',
        'selected' => $product->mera_for_price
    );    
    $fu_image = array(
        'name'  => 'image',
        'id'    => 'image',
        'class' => 'f_file_upload'
        );
?>
<div class="span-24 content" id="product_edit_w">  
    <div class="f_header">Добавление продукта</div>  
    <ul class="span-24 tabs">
        <li><a href="#" id="pe_main" class="selected">Основное</a></li>
        <li><a href="#" id="pe_additional">Дополнительное</a></li>
    </ul>
    <div class="clear"></div>
<?php echo form_open_multipart('/admin/products/edit/'.$product->id, array('id' => 'product_edit_form', 'class' => 'f_form f_validate'));?>
    <div class="f_content">
        <?php echo form_success_error($form_error, $form_success); ?>
        <div id="pe_main_tab" class="tab_content">
        <?php
        echo form_label('Название продукта', $inp_product_name['id'], array('class' => 'f_label'));
        echo form_hidden('total_language',$dm_main_object->result_count());
        foreach($dm_main_object->language as $language){
            $data['text_value']         = $language->join_name;
            $data['language_selected']  = $language->id;        
            $this->load->view('admin/language_form',$data);
        }        
        echo form_label('Категория', $sel_product_category['id'], array('class' => 'f_label'));
        echo form_dropdown($sel_product_category['name'], $sel_product_category['options'], $sel_product_category['selected'], 'id = "'.$sel_product_category['id'].'" class = "'.$sel_product_category['class'].'"');
            
		# Cikl po kategoriam veshestv
		$nutrition_fact_count = 1;
        foreach($all_nutrition_categories as $nutrition_category):            
            #
            $value = dm_get_field_by_id($nutrition_category->id,$product->nutrition_category);
            #
            $inp_nutrition_category = array(
	            'name'  => 'nutrition_category_'.$nutrition_category->id,        
	            'id'    => 'nutrition_category_'.$nutrition_category->id,
	            'class' => 'f_input f_joined',
	            'value' => $value);
				
            echo form_label($nutrition_category->join_name, $inp_nutrition_category['id'], array('class' => 'f_label'));
            echo form_input($inp_nutrition_category);
            echo anchor('#', 'Details', array('class' => 'f_joined f_subinput_node', 'id' => 'f_subinput_node_'.$nutrition_category->id));
            echo cleared_div();
			?>
			<div class='f_subinput_node_holder' id='f_subinput_node_holder_<?php echo $nutrition_category->id; ?>'>
				<div>
					<?php
						$sel_nutritions = array(
						    'options'  => array_for_dropbox($nutrition_category->nutrition),
						    'name'     => 'sel_nutrition_'.$nutrition_category->id,
						    'id'       => 'sel_nutrition_'.$nutrition_category->id,
						    'class'    => 'f_select wide f_joined',
						    'selected' => '');
						$inp_nutritions_value = array(
				            'name'  => 'inp_nutrition_'.$nutrition_category->id,        
				            'id'    => 'inp_nutrition_'.$nutrition_category->id,
				            'class' => 'f_input f_joined',
				            'value' => '');
						echo form_dropdown($sel_nutritions['name'], $sel_nutritions['options'], $sel_nutritions['selected'], 'id = "'.$sel_nutritions['id'].'" class = "'.$sel_nutritions['class'].'"');
						echo form_input($inp_nutritions_value);
						echo anchor('#', 'Add', array('class' => 'f_joined add_nutrition_fact', 'id' => 'add_product_fact_'.$nutrition_category->id));
						echo cleared_div();
					?>
				</div>
					<div class='prod_nutritions_wrapper' id='prod_nutritions_wrapper_<?php echo $nutrition_category->id; ?>'>
						<?php                            
							foreach($product->nutrition as $nutrition):                                                                                                                                                   
                                if($nutrition->nutrition_category_id == $nutrition_category->id){																
                                    echo '<div class="" id="hidden_nutrition_wrapper_'.$nutrition_fact_count.'">';								
    								$inp_hidden = array(
    									'name' => 'hidden_nutrition_existed[]', 
    									'id' => 'hid_nutrition_fact_'.$nutrition_fact_count, 
    									'value' => $nutrition->nutrition_id);								
                                    echo form_attr_hidden($inp_hidden);								
    								echo $nutrition->nutrition_name." - ".$nutrition->value.' '.anchor('#','remove', array('class' => 'nutrition_fact_remove nf_remove_from_db', 'id' => 'nutrition_fact_remove_'.$nutrition_fact_count));								
    								echo "</div>";
    								$nutrition_fact_count++;
                                }
							endforeach;
						?>
					</div>
			</div>
            <?php
            endforeach;
    		
            echo form_label('Мера измерения по умолчанию', $sel_mera['id'], array('class' => 'f_label'));
            echo form_dropdown($sel_mera['name'], $sel_mera['options'], $sel_mera['selected'], 'id = "'.$sel_mera['id'].'" class = "'.$sel_mera['class'].'"');
            
            echo form_label('Цена', $inp_price['id'], array('class' => 'f_label'));
            echo form_input($inp_price);
            
            echo form_label('Кол-во продукта за эту цену', $inp_units_for_price['id'], array('class' => 'f_label'));
            echo form_input($inp_units_for_price);
            echo form_dropdown($sel_units_mera['name'], $sel_units_mera['options'], $sel_units_mera['selected'], 'id = "'.$sel_units_mera['id'].'" class = "'.$sel_units_mera['class'].'"');
            echo cleared_div();
            foreach($meras as $mera){   
                echo open_f_block();
                echo form_checkbox(array('value' => $mera->id, 'id'=> 'selected_meras_'.$mera->id, 'checked' => dm_object_exist($mera,$product->mera), 'name' => 'selected_meras[]', 'class' => 'f_checkbox' ));
                echo form_label($mera->name, 'selected_meras_'.$mera->id, array('class' => 'f_label_cb'));
                echo cleared_div();
                echo close_f_block();                  
            }?>
        </div>
        <div id="pe_additional_tab" class="tab_content hidden">
            <?php 
            echo form_label('Картинка', $fu_image['id'], array('class' => 'f_label'));
            echo form_upload($fu_image);
            
            echo form_label('Описание продукта', $txt_description['id'], array('class' => 'f_label'));
            echo form_textarea($txt_description);
            ?>
        </div>
    </div>
    <div class="f_buttons">
        <?php echo form_submit('add_product','Сохранить');?>
    </div>
    <input type='hidden' value='<?php echo $nutrition_fact_count; ?>' id='max_nutrition_fact'/>
<?php echo form_close(); ?>
</div>