<?php
    $nutrition_categories_name = array(
    'name'  => 'nutrition_categories_name',
    'id'    => 'nutrition_categories_name',
    'class' => 'f_input required',
    'value' => $nutrition_categories->name);
    
    ?>
<div class="span-24 content" id="product_edit_w">  
    <div class="f_header">Добавить Вещество</div>
<?php echo form_open_multipart('admin/nutrition_categories/edit/'.$nutrition_categories->id, array('id' => 'nutrition_categories_edit_form', 'class' => 'f_form f_validate'));?>
    <div class="f_content">
        <?php
        form_success_error($form_error, $form_success);
        echo form_label('Название категории', $nutrition_categories_name['id'], array('class' => 'f_label'));
        echo form_input($nutrition_categories_name);
        ?>
    </div>
    <div class="f_buttons">
        <?php echo form_submit('add_category','Сохранить');?>
    </div>
<?php echo form_close(); ?>
</div>