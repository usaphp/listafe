<?php
$rec_name = array(
'name'  => 'recipe_name',
'id'    => 'recipe_name',
'class' => 'f_input wide',
'value' => $recipe->name
);

$prep_time = array(
'name'	=> 'prep_time',
'id'	=> 'prep_time',
'class' => 'f_input',
'value' => $recipe->prepare_time
);

$cook_time = array(
'name'	=> 'cook_time',
'id'	=> 'cook_time',
'class' => 'f_input',
'value' => $recipe->cook_time
);

$servings  = array(
'name'	=> 'servings',
'id'	=> 'servings',
'class' => 'f_input',
'value' => $recipe->servings
);

$image_upload = array(
'name'	=> 'recipe_image',
'id'	=> 'recipe_image',
'class' => 'f_file_upload');

$image_current = array(
'name' => '');
?>


<div class="span-24 content" id="product_edit_w">  
    <div class="f_header">Добавление рецепта</div>  
	<?php echo form_open_multipart('/admin/recipes/add/', array('id' => 'add_recipe_form', 'class' => 'f_form span-24'));?>
    <div class="f_content span-24">
    	<?php form_success_error($form_error, $form_success); ?>
		<?php echo form_label('Название Рецепта', $rec_name['id'], array('class' => 'f_label')); ?>
		<?php echo form_input($rec_name); ?>
		
		<?php echo form_label('Время Подготовки (мин.)', $prep_time['id'], array('class' => 'f_label')); ?>
		<?php echo form_input($prep_time); ?>
		
		<?php echo form_label('Время Готовки (мин.)', $cook_time['id'], array('class' => 'f_label')); ?>
		<?php echo form_input($cook_time); ?>
		
		<?php echo form_label('Кол-во Порций', $servings['id'], array('class' => 'f_label')); ?>
		<?php echo form_input($servings); ?>
		
		<?php echo form_label('Фотография', $image_upload['id'], array('class' => 'f_label')); ?>
		<?php echo form_upload($image_upload); ?>
		<img src="<?php echo get_name_image($image->id, $recipe->id, 'tiny'); ?>"/>
		<div class="f_sub_header">Ингредиенты</div>
		<div id="recipe_products">
		<?php 
		foreach($recipe->products as $key => $product){
			$data['recipe_product_id'] = $key;
            $data['name'] = $product->name;
            $data['value'] = $product->value;
			$this->load->view('/admin/recipes/subs/product.php', $data);
		}
		?>
		</div>
		<?php
		echo form_hidden('total_products', DEFAULT_PRODUCTS_IN_RECIPE);
		$data['step_id'] = 1;
		echo separator_div(5);
		?>
		<div class="f_buttons_inside span-13">
			<a href = '#' id = 'add_product_recipe' class = 'f_button grey'>+ Еще Продукт</a>
		</div>
		<div class="clear"></div>
		<div class="f_sub_header">Приготовление</div>
		<div id="recipe_steps">
		<?php 
            foreach($steps as $key => $step){
                $data['step_id'] = $key;
                $data['text'] = $step->text;
                $data['image'] = $step->image;
                $this->load->view('/admin/recipes/subs/step.php', $data);
            }
			echo form_hidden('total_steps', $key);
		?>
		</div>
	</div>
	<div class="f_buttons span-13">
		<a href = '#' id = 'add_step' class = 'f_button grey wide'>+ Добавить Шаг</a>
		<a href = '#' id = 'add_recipe' class = 'f_button green wide'>Сохранить Рецепт</a>
	</div>
	<?php echo form_close(); ?>
<script type="text/javascript">
    imain.recipe_add_init();
</script>