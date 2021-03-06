<?php
    $rec_name = array(
        'name'  => 'recipe_name',
        'id'    => 'recipe_name',
        'class' => 'f_input wide');
    
    $prep_time = array(
        'name'	=> 'prep_time',
        'id'	=> 'prep_time',
        'class' => 'f_input');
    
    $cook_time = array(
        'name'	=> 'cook_time',
        'id'	=> 'cook_time',
        'class' => 'f_input');
    
    $servings  = array(
        'name'	=> 'servings',
        'id'	=> 'servings',
        'class' => 'f_input');
    
    $image  = array(
        'name'	=> 'recipe_image',
        'id'	=> 'recipe_image',
        'class' => 'f_file_upload')
?>


<div class="span-24 content">  
    <div class="f_header">Добавление рецепта</div>  
	<?php echo form_open_multipart('/admin/recipes/add/', array('id' => 'add_recipe_form', 'class' => 'f_form span-24'));?>
    <div class="f_content span-24"><?php
    	form_success_error($form_error, $form_success);
        echo form_label('Название Рецепта', $rec_name['id'], array('class' => 'f_label'));        
        #NAME
        $data['dm_object'] = $dm_recipe;
        $this->load->view('admin/language_form/block_name',$data);
		
		echo form_label('Время Подготовки (мин.)', $prep_time['id'], array('class' => 'f_label'));
		echo form_input($prep_time);
		
		echo form_label('Время Готовки (мин.)', $cook_time['id'], array('class' => 'f_label'));
		echo form_input($cook_time);
		
		echo form_label('Кол-во Порций', $servings['id'], array('class' => 'f_label'));
		echo form_input($servings);
		
		echo form_label('Фотография', $image['id'], array('class' => 'f_label'));
		echo form_upload($image);?>
		
		<div class="f_sub_header">Ингредиенты</div>
		<div id="recipe_products">
        
		<?php 
        #$this->data['meras'] = $meras;
		for($i = 1; $i <= DEFAULT_PRODUCTS_IN_RECIPE; $i++){
			$this->data['recipe_product_id'] = $i;
            #
            
			$this->load->view('/admin/recipes/subs/product.php',$this->data);
		}
        #print_r($meras);
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
			$this->load->view('/admin/recipes/subs/step.php', $data);
			echo form_hidden('total_steps', 1);
			?>
		</div>
	</div>
	<div class="f_buttons span-13">
		<a href = '#' id = 'add_step' class = 'f_button grey wide'>+ Добавить Шаг</a>
		<a href = '#' id = 'add_recipe' class = 'f_button green wide'>Сохранить Рецепт</a>
	</div>
	<?php echo form_close(); ?>
</div>