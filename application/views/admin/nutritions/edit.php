<?php
    $nutrition_name = array(
    'name'  => 'nutrition_name',
    'id'    => 'nutrition_name',
    'class' => 'f_input',
    'value' => $nutrition->name);

    ?>
<div class="span-24 content" id="product_edit_w">
    <div class="f_header">Добавить Категорию</div>
<?php echo form_open_multipart('/admin/nutritions/edit/'.$nutrition->id, array('id' => 'nutrition_edit_form', 'class' => 'f_form'));?>
    <div class="f_content">
        <?php
        form_success_error($form_error, $form_success);
        echo form_label('Название Ингридиента', $nutrition_name['id'], array('class' => 'f_label'));
        echo form_input($nutrition_name);
        ?>
    </div>
    <div class="f_buttons">
        <?php echo form_submit('add_category','Сохранить');?>
    </div>
<?php echo form_close(); ?>
</div>
<script type="text/javascript">
    imain.category_edit_init();
</script>