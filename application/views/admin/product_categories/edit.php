<?php
    $category_name = array(
    'name'  => 'category_name',
    'id'    => 'category_name',
    'class' => 'f_input required',
    'value' => $dm_product_category->join_name);
    
    ?>
<div class="span-24 content" id="product_edit_w">  
    <div class="f_header">Добавить Категорию</div>
<?php echo form_open_multipart('/admin/product_categories/edit/'.$dm_product_category->id, array('id' => 'category_edit_form', 'class' => 'f_form f_validate'));?>
    <div class="f_content">
        <?php
        form_success_error($form_error, $form_success);
        echo form_label('Название категории', $category_name['id'], array('class' => 'f_label'));
        #NAME
        $data['dm_object'] = $dm_product_category;
        $this->load->view('admin/language_form/block_name',$data);
        ?>
    </div>
    <div class="f_buttons">
        <?php echo form_submit('add_category','Сохранить');?>
    </div>
<?php echo form_close(); ?>
</div>