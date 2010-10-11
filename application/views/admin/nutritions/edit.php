<?php
    $nutrition_name = array(
		'name'  => 'nutrition_name',
		'id'    => 'nutrition_name',
		'class' => 'f_input',
		'value' => $nutrition->name);

	$sel_category = array(
		'options' => array_for_dropbox($nutritions_categories),
		'name'  => 'nutritions_categories_id',
		'id'    => 'nutritions_categories_id',
		'class' => 'f_select wide',
		'selected' => $nutrition->category_id);
    ?>
<div class="span-24 content" id="product_edit_w">
    <div class="f_header">Добавить Ингридиент</div>
<?php echo form_open_multipart('/admin/nutritions/edit/'.$nutrition->id, array('id' => 'nutrition_edit_form', 'class' => 'f_form'));?>
    <div class="f_content">
        <?php
        form_success_error($form_error, $form_success);
        echo form_label('Название Ингридиента', $nutrition_name['id'], array('class' => 'f_label'));
        echo form_input($nutrition_name);

		echo form_label('Категория ингридиента', $sel_category['id'], array('class' => 'f_label'));
        echo form_dropdown($sel_category['name'], $sel_category['options'], $sel_category['selected'], 'id = "'.$sel_category['id'].'" class = "'.$sel_category['class'].'"');
        ?>
    </div>
    <div class="f_buttons">
        <?php echo form_submit('add_category','Сохранить');?>
    </div>
<?php echo form_close(); ?>
</div>