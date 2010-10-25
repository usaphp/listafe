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
	<?php echo form_open_multipart('/admin/recipes/edit/'.$recipe->id, array('id' => 'edit_recipe_form', 'class' => 'f_form span-24'));?>
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
		<?php if ($image->id) echo '<img src="'.get_name_image($image->id, $recipe->id, 'tiny').'"/>'; ?>
		<div class="f_sub_header">Ингредиенты</div>
		<div id="recipe_products">
		<?php 
        #print_flex($recipe->products);
        #$recipe->products opredelaensa v modele Resipe 4erez Activ Record i sohranaetsa kak array
		foreach($recipe->products as $key => $product){
            #$key = isset($key)?$key:0;
			$data['recipe_product_id'] = $key+1;
            $data['name'] = $product->name;
            $data['mera']= $product->mera_id;
            $data['value'] = $product->value;
            $data['image'] = $product->image;
			$this->load->view('/admin/recipes/subs/product.php', $data);
		}
		?>
		</div>
		<?php
        #
		echo form_hidden('total_products', count($recipe->products));
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
            #vse shagi iz bazi
            foreach($steps as $key => $step){
                $data['step_id'] = $key+1;
                $data['text'] = $step->text;
                $data['image'] = $step->image;
                $this->load->view('/admin/recipes/subs/step.php', $data);
            }
			echo form_hidden('total_steps', $steps->result_count());
		?>
		</div>
	</div>
	<div class="f_buttons span-13">
		<a href = '#' id = 'add_step' class = 'f_button grey wide'>+ Добавить Шаг</a>
		<a href = '#' id = 'save_recipe' class = 'f_button green wide'>Сохранить Рецепт</a>
	</div>
	<?php echo form_close(); ?>
<script type="text/javascript">
    imain.recipe_add_init();
</script>