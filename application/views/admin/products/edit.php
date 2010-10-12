    <?php
    $inp_product_name = array(
    'name'  => 'product_name',
    'id'    => 'product_name',
    'class' => 'f_input required',
    'value' => $product->name);
    
    $sel_category = array(
    'options' => array_for_dropbox($category_model),
    'name'  => 'category_id',
    'id'    => 'category_id',
    'class' => 'f_select wide required',
    'selected' => $product->category_id);
	
    $txt_description = array(
    'name'  => 'description',
    'id'    => 'description',
    'class' => 'f_textarea',
    'value' => $product->description);
   
    $sel_mera = array(
    'options' => array_for_dropbox($mera_model),
    'name'  => 'mera_id',
    'id'    => 'mera_id',
    'class' => 'f_select wide',
    'selected' => $product->mera_id);
    
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
    'options' => array_for_dropbox($mera_model),
    'name'  => 'units_mera_id',
    'id'    => 'units_mera_id',
    'class' => 'f_select wide f_joined',
    'selected' => $product->units_mera_id
    );
    
    $fu_image = array(
    'name'  => 'image',
    'id'    => 'image',
    'class' => 'f_file_upload');
    
    ?>
<div class="span-24 content" id="product_edit_w">  
    <div class="f_header">Добавление продукта</div>  
    <ul class="span-24 tabs">
        <li><a href="#" id="pe_main" class="selected">Основное</a></li>
        <li><a href="#" id="pe_vitamins">Витамины</a></li>
        <li><a href="#" id="pe_additional">Дополнительное</a></li>
    </ul>
    <div class="clear"></div>
<?php echo form_open_multipart('/admin/products/edit/'.$product->id, array('id' => 'product_edit_form', 'class' => 'f_form f_validate'));?>
    <div class="f_content">
        <?php echo form_success_error($form_error, $form_success); ?>
        <div id="pe_main_tab" class="tab_content">
        <?php
        echo form_label('Название продукта', $inp_product_name['id'], array('class' => 'f_label'));
        echo form_input($inp_product_name);
        
        echo form_label('Категория', $sel_category['id'], array('class' => 'f_label'));
        echo form_dropdown($sel_category['name'], $sel_category['options'], $sel_category['selected'], 'id = "'.$sel_category['id'].'" class = "'.$sel_category['class'].'"');
            
		# Cikl po kategoriam veshestv
        foreach($nutrition_categories as $nutrition_category):
            $inp_nutrition_category = array(
                                    'name'  => 'nutrition_category'.$nutrition_category->id,        
                                    'id'    => 'nutrition_category'.$nutrition_category->id,
                                    'class' => 'f_input f_joined',
                                    'value' => '');
            echo form_label($nutrition_category->name, $inp_nutrition_category['id'], array('class' => 'f_label'));
            echo form_input($inp_nutrition_category);
            echo anchor('#', '+', array('class' => 'f_joined f f_subinput_node'));
            echo cleared_div();
			
			$nutritions_select = array(
								    'options' => array_for_dropbox($nutrition_category->nutrition),
								    'name'  => 'nutrition_'.$nutrition_category->id,
								    'id'    => 'nutrition_'.$nutrition_category->id,
								    'class' => 'f_select wide required',
								    'selected' => '');
			?>
			<div>
				<div>
					<?php 
						echo form_dropdown($nutritions_select['name'], $nutritions_select['options'], $nutritions_select['selected'], 'id = ""'.$nutritions_select['id'].'" class = "'.$nutritions_select['class'].'""');
						echo form_input('', '');
						echo anchor('#', '+'); 
					?>
				</div>
				<?php if($product_nutrition_facts): ?>
				<div>
					<?php foreach($product_nutrition_facts as $nf):
					echo $nf->nutrition_name."<br/>";
						if($nf->nutrition_category_id == $nutrition_category->id):
							echo $nf->nutrition_name."<br/>";
						endif;
					endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
			<?php
            
        endforeach;
		
        echo form_label('Мера измерения', $sel_mera['id'], array('class' => 'f_label'));
        echo form_dropdown($sel_mera['name'], $sel_mera['options'], $sel_mera['selected'], 'id = "'.$sel_mera['id'].'" class = "'.$sel_mera['class'].'"');
        
        echo form_label('Цена', $inp_price['id'], array('class' => 'f_label'));
        echo form_input($inp_price);
        
        echo form_label('Кол-во продукта за эту цену', $inp_units_for_price['id'], array('class' => 'f_label'));
        echo form_input($inp_units_for_price);
        echo form_dropdown($sel_units_mera['name'], $sel_units_mera['options'], $sel_units_mera['selected'], 'id = "'.$sel_units_mera['id'].'" class = "'.$sel_units_mera['class'].'"');
        echo cleared_div();
        
        
        ?>
        </div>
        <div id="pe_vitamins_tab" class="tab_content hidden">
        <?php
        ?>
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
<?php echo form_close(); ?>
</div>