<?php
    print_flex($body_parts);
    $inp_product_name = array(
        'name'  => 'product_name',
        'id'    => 'product_name',
        'class' => 'f_input required',
        'value' => $dm_product->join_name
    );
    $sel_product_category = array(
        'options' => array_for_dropbox($product_categories,'Категория продукта','id','join_name'),
        'name'  => 'product_category_id',
        'id'    => 'product_category_id',
        'class' => 'f_select wide required',
        'selected' => $dm_product->product_category_id
    );
    $txt_description = array(
        'name'  => 'description',
        'id'    => 'description',
        'class' => 'f_textarea',
        'value' => $dm_product->join_description
    );
    $sel_mera = array(
        'options'   => $meras_available,
        'name'      => 'mera_id',
        'id'        => 'mera_id',
        'class'     => 'f_select wide',
        'selected'  => '0'
    );
    $inp_price = array(
        'name'  => 'price',
        'id'    => 'price',
        'class' => 'f_input required',
        'value' => $dm_product->price
    );
    $inp_units_for_price = array(
        'name'  => 'units_for_price',
        'id'    => 'units_for_price',
        'class' => 'f_input f_joined number required',
        'value' => $dm_product->units_for_price
    );
    $sel_units_mera = array(
        'options' => array_for_dropbox($meras,'Мера измерения','id','join_name'),
        'name'  => 'mera_for_price',
        'id'    => 'mera_for_price',
        'class' => 'f_select wide',
        'selected' => $dm_product->mera_for_price
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
<?php echo form_open_multipart('/admin/products/edit/'.$dm_product->id, array('id' => 'product_edit_form', 'class' => 'f_form f_validate'));?>
    <div class="f_content">
        <?php echo form_success_error($form_error, $form_success); ?>
        <div id="pe_main_tab" class="tab_content">
            <?php
            echo form_label('Название продукта', $inp_product_name['id'], array('class' => 'f_label'));
            #NAME
            $data['dm_object'] = $dm_product;
            $this->load->view('admin/language_form/block_name',$data);
            #soderjit id producta
            echo form_hidden('number_product_id',$dm_product->id);                 
            echo form_label('Категория', $sel_product_category['id'], array('class' => 'f_label'));
            echo form_dropdown($sel_product_category['name'], $sel_product_category['options'], $sel_product_category['selected'], 'id = "'.$sel_product_category['id'].'" class = "'.$sel_product_category['class'].'"');
            
            echo form_label('Меры измерения', $sel_mera['id'], array('class' => 'f_label'));
            echo form_dropdown($sel_mera['name'], $sel_mera['options'], $sel_mera['selected'], 'id = "'.$sel_mera['id'].'" class = "'.$sel_mera['class'].'"');?>
            <div id="nutrition_wrapper">
                <?php 
                $data['dm_nutritions_categories']   = $dm_nutrition_categories;
                $data['dm_product']                 = $dm_product;
                $this->load->view('admin/products/sub/nutrition_tables',$data);?>        
            </div>
            <div class="clear"></div>
            <?php
            echo form_label('Цена', $inp_price['id'], array('class' => 'f_label'));
            echo form_input($inp_price);
            
            echo form_label('Кол-во продукта за эту цену', $inp_units_for_price['id'], array('class' => 'f_label'));
            echo form_input($inp_units_for_price);
            echo form_dropdown($sel_units_mera['name'], $sel_units_mera['options'], $sel_units_mera['selected'], 'id = "'.$sel_units_mera['id'].'" class = "'.$sel_units_mera['class'].'"');
            echo separator_div();?>
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