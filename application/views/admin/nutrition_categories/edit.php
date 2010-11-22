
<div class="span-24 content" id="product_edit_w">  
    <div class="f_header">Добавить Вещество</div>
<?php echo form_open_multipart('admin/nutrition_categories/edit/'.$dm_nutrition_category->id, array('id' => 'nutrition_categories_edit_form', 'class' => 'f_form f_validate'));?>
    <div class="f_content">
        <?php
        form_success_error($form_error, $form_success);
        echo form_label('Название категории', '', array('class' => 'f_label'));
        #NAME
        $data['dm_object'] = $dm_nutrition_category;
        $this->load->view('admin/language_form/block_name',$data);
        ?>
    </div>
    <div class="f_buttons">
        <?php echo form_submit('add_category','Сохранить');?>
    </div>
<?php echo form_close(); ?>
</div>