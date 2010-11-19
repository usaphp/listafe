
<div class="span-24 content" id="product_edit_w">  
    <div class="f_header">Добавить Вещество</div>
<?php echo form_open_multipart('admin/nutrition_categories/edit/'.$dm_main_object->id, array('id' => 'nutrition_categories_edit_form', 'class' => 'f_form f_validate'));?>
    <div class="f_content">
        <?php
        form_success_error($form_error, $form_success);
        echo form_label('Название категории', '', array('class' => 'f_label'));                
        echo open_f_block('language_block_id');
        echo form_hidden('total_language',$dm_main_object->result_count());
        foreach($dm_main_object->language as $language){
            $data['text_value']         = $language->join_name;
            $data['language_selected']  = $object->id;
            $this->load->view('admin/language_form',$data);
        }
        echo close_f_block();
        echo button_add_language();        
        echo cleared_div();
        ?>
    </div>
    <div class="f_buttons">
        <?php echo form_submit('add_category','Сохранить');?>
    </div>
<?php echo form_close(); ?>
</div>