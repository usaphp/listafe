
<div class="span-24 content" id="product_edit_w">  
    <div class="f_header">Добавить Вещество</div>
<?php echo form_open_multipart('admin/nutrition_categories/edit/'.$nutrition_categories->id, array('id' => 'nutrition_categories_edit_form', 'class' => 'f_form f_validate'));?>
    <div class="f_content">
        <?php
        form_success_error($form_error, $form_success);        
        echo form_label('Название категории', '', array('class' => 'f_label'));
        $data['object'] = $nutrition_categories;        
        $this->load->view('admin/language_form',$data['object']);
        echo cleared_div();
        echo separator_div();
        echo button_language_add();        
        echo cleared_div();
        ?>
    </div>
    <div class="f_buttons">
        <?php echo form_submit('add_category','Сохранить');?>
    </div>
<?php echo form_close(); ?>
</div>