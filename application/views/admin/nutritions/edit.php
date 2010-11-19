<?php    
	$sel_category = array(
		'options' => array_for_dropbox($nutrition_categories,'Категории','id','join_name'),
		'name'  => 'nutritions_categories_id',
		'id'    => 'nutritions_categories_id',
		'class' => 'f_select wide',
		'selected' => $dm_main_object->nutrition_category_id);
    ?>
<div class="span-24 content" id="product_edit_w">
    <div class="f_header">Добавить Ингридиент</div>
<?php echo form_open_multipart('/admin/nutritions/edit/'.$dm_main_object->id, array('id' => 'nutrition_edit_form', 'class' => 'f_form f_validate'));?>
    <div class="f_content">
        <?php
        form_success_error($form_error, $form_success);
        echo form_label('Название Ингридиента', 'inp_name_id', array('class' => 'f_label'));
        echo open_f_block('language_block_id');
        echo form_hidden('total_language',$dm_main_object->result_count());
        foreach($dm_main_object->language as $language){
            $data['text_value']         = $language->join_name;
            #$data['language_selected']  = $object->
            $this->load->view('admin/language_form',$data);
        }
        echo close_f_block();
        echo button_add_language();        
        echo cleared_div();

        echo form_label('Категория ингридиента', $sel_category['id'], array('class' => 'f_label'));
        echo form_dropdown($sel_category['name'], $sel_category['options'], $sel_category['selected'], 'id = "'.$sel_category['id'].'" class = "'.$sel_category['class'].'"');
        ?>
    </div>
    <div class="f_buttons">
        <?php echo form_submit('add_category','Сохранить');?>
    </div>
<?php echo form_close(); ?>
</div>