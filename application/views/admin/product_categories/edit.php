<?php
    $category_name = array(
    'name'  => 'category_name',
    'id'    => 'category_name',
    'class' => 'f_input required',
    'value' => $product_category->join_name);
    
    ?>
<div class="span-24 content" id="product_edit_w">  
    <div class="f_header">Добавить Категорию</div>
<?php echo form_open_multipart('/admin/product_categories/edit/'.$product_category->id, array('id' => 'category_edit_form', 'class' => 'f_form f_validate'));?>
    <div class="f_content">
        <?php
        form_success_error($form_error, $form_success);
        echo form_label('Название категории', $category_name['id'], array('class' => 'f_label'));
        echo open_f_block('language_block_id');
        echo form_hidden('total_language',$dm_objects->result_count());
        foreach($dm_objects as $dm_object){
            $data['text_value']         = $dm_object->join_name;
           # $data['language_selected']  = $object->
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