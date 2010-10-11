    <?php
    $inp_product_name = array(
    'name'  => 'product_name',
    'id'    => 'product_name',
    'class' => 'f_input',
    'value' => $product->name);
    
    $sel_category = array(
    'options' => array_for_dropbox($category_model),
    'name'  => 'category_id',
    'id'    => 'category_id',
    'class' => 'f_select wide',
    'selected' => $product->category_id);
	
    $txt_description = array(
    'name'  => 'description',
    'id'    => 'description',
    'class' => 'f_textarea',
    'value' => $product->description);
    
    $inp_calories = array(
    'name'  => 'calories',
    'id'    => 'calories',
    'class' => 'f_input',
    'value' => $product->calories);
    
    $inp_protein = array(
    'name'  => 'protein',
    'id'    => 'protein',
    'class' => 'f_input',
    'value' => $product->protein);
    
    $inp_fat = array(
    'name'  => 'fat',
    'id'    => 'fat',
    'class' => 'f_input',
    'value' => $product->fat);
    
    $inp_carbo = array(
    'name'  => 'carbo',
    'id'    => 'carbo',
    'class' => 'f_input',
    'value' => $product->carbo);
    
    $sel_mera = array(
    'options' => array_for_dropbox($mera_model),
    'name'  => 'mera_id',
    'id'    => 'mera_id',
    'class' => 'f_select wide',
    'selected' => $product->mera_id);
    
    $inp_price = array(
    'name'  => 'price',
    'id'    => 'price',
    'class' => 'f_input',
    'value' => $product->price
    );
    
    $inp_units_for_price = array(
    'name'  => 'units_for_price',
    'id'    => 'units_for_price',
    'class' => 'f_input f_joined',
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
<?php echo form_open_multipart('/admin/products/edit/'.$product->id, array('id' => 'product_edit_form', 'class' => 'f_form'));?>
    <div class="f_content">
        <?php echo form_success_error($form_error, $form_success); ?>
        <div id="pe_main_tab" class="tab_content">
        <?php
        echo form_label('Название продукта', $inp_product_name['id'], array('class' => 'f_label'));
        echo form_input($inp_product_name);
        
        echo form_label('Категория', $sel_category['id'], array('class' => 'f_label'));
        echo form_dropdown($sel_category['name'], $sel_category['options'], $sel_category['selected'], 'id = "'.$sel_category['id'].'" class = "'.$sel_category['class'].'"');
        
        echo form_label('Калорий', $inp_calories['id'], array('class' => 'f_label'));
        echo form_input($inp_calories);
        
        echo form_label('Белки', $inp_protein['id'], array('class' => 'f_label'));
        echo form_input($inp_protein);
        
        echo form_label('Жиры', $inp_fat['id'], array('class' => 'f_label'));
        echo form_input($inp_fat);
        
        echo form_label('Углеводы', $inp_carbo['id'], array('class' => 'f_label'));
        echo form_input($inp_carbo);
        
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
<script type="text/javascript">
    imain.product_edit_init();
</script>