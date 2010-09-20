    <?php
    $product_name = array(
    'name'  => 'product_name',
    'id'    => 'product_name',
    'class' => 'f_input',
    'value' => $product->name);
    
    $category = array(
    'options' => array_for_dropbox($category_model),
    'name'  => 'category_id',
    'id'    => 'category_id',
    'class' => 'f_select wide',
    'selected' => $product->category_id);
    
    $description = array(
    'name'  => 'description',
    'id'    => 'description',
    'class' => 'f_textarea',
    'value' => $product->description);
    
    $calories = array(
    'name'  => 'calories',
    'id'    => 'calories',
    'class' => 'f_input',
    'value' => $product->calories);
    
    $protein = array(
    'name'  => 'protein',
    'id'    => 'protein',
    'class' => 'f_input',
    'value' => $product->protein);
    
    $fat = array(
    'name'  => 'fat',
    'id'    => 'fat',
    'class' => 'f_input',
    'value' => $product->fat);
    
    $carbo = array(
    'name'  => 'carbo',
    'id'    => 'carbo',
    'class' => 'f_input',
    'value' => $product->carbo);
    
    $mera = array(
    'options' => array_for_dropbox($mera_model),
    'name'  => 'mera_id',
    'id'    => 'mera_id',
    'class' => 'f_select wide',
    'selected' => $product->mera_id);
    
    $price = array(
    'name'  => 'price',
    'id'    => 'price',
    'class' => 'f_input',
    'value' => $product->price
    );
    
    $units_for_price = array(
    'name'  => 'units_for_price',
    'id'    => 'units_for_price',
    'class' => 'f_input f_joined',
    'value' => $product->units_for_price
    );
    
    $units_mera = array(
    'options' => array_for_dropbox($mera_model),
    'name'  => 'units_mera_id',
    'id'    => 'units_mera_id',
    'class' => 'f_select wide f_joined',
    'selected' => $product->units_mera_id
    );
    
    $image = array(
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
        echo form_label('Название продукта', $product_name['id'], array('class' => 'f_label'));
        echo form_input($product_name);
        
        echo form_label('Категория', $category['id'], array('class' => 'f_label'));
        echo form_dropdown($category['name'], $category['options'], $category['selected'], 'id = "'.$category['id'].'" class = "'.$category['class'].'"');
        
        echo form_label('Калорий', $calories['id'], array('class' => 'f_label'));
        echo form_input($calories);
        
        echo form_label('Белки', $protein['id'], array('class' => 'f_label'));
        echo form_input($protein);
        
        echo form_label('Жиры', $fat['id'], array('class' => 'f_label'));
        echo form_input($fat);
        
        echo form_label('Углеводы', $carbo['id'], array('class' => 'f_label'));
        echo form_input($carbo);
        
        echo form_label('Мера измерения', $mera['id'], array('class' => 'f_label'));
        echo form_dropdown($mera['name'], $mera['options'], $mera['selected'], 'id = "'.$mera['id'].'" class = "'.$mera['class'].'"');
        
        echo form_label('Цена', $price['id'], array('class' => 'f_label'));
        echo form_input($price);
        
        echo form_label('Кол-во продукта за эту цену', $units_for_price['id'], array('class' => 'f_label'));
        echo form_input($units_for_price);
        echo form_dropdown($units_mera['name'], $units_mera['options'], $units_mera['selected'], 'id = "'.$units_mera['id'].'" class = "'.$units_mera['class'].'"');
        echo cleared_div();
        
        
        ?>
        </div>
        <div id="pe_vitamins_tab" class="tab_content hidden">
        <?php
        ?>
        </div>
        <div id="pe_additional_tab" class="tab_content hidden">
        <?php 
        echo form_label('Картинка', $image['id'], array('class' => 'f_label'));
        echo form_upload($image);
        
        echo form_label('Описание продукта', $description['id'], array('class' => 'f_label'));
        echo form_textarea($description);
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