<?php
    $rec_name = array(
        'name'  => 'recipe_name',
        'id'    => 'recipe_name',
        'class' => 'f_input wide',
        'value' => $dm_recipe->join_name
    );
    
    $prep_time = array(
        'name'	=> 'prep_time',
        'id'	=> 'prep_time',
        'class' => 'f_input',
        'value' => $dm_recipe->prepare_time
    );
    
    $cook_time = array(
        'name'	=> 'cook_time',
        'id'	=> 'cook_time',
        'class' => 'f_input',
        'value' => $dm_recipe->cook_time
    );
    
    $servings  = array(
        'name'	=> 'servings',
        'id'	=> 'servings',
        'class' => 'f_input',
        'value' => $dm_recipe->servings
    );
    
    $image_upload = array(
        'name'	=> 'recipe_image',
        'id'	=> 'recipe_image',
        'class' => 'f_file_upload'
    );
    
    $image_current = array(
        'name' => ''
    );
?>


<div class="span-24 content">  
    <div class="f_header">Добавление рецепта</div>  
	<?php echo form_open_multipart('/admin/recipes/edit/'.$dm_recipe->id, array('id' => 'edit_recipe_form', 'class' => 'f_form span-24'));?>
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
		
		echo form_label('Фотография', $image_upload['id'], array('class' => 'f_label'));
		echo form_upload($image_upload);
		if ($dm_recipe->recipe_image->id) echo '<img src="'.get_name_image($dm_recipe->id, $dm_recipe->recipe_image->id, 'tiny').'"/>'; ?>
		<div class="f_sub_header">Ингредиенты</div>
    		<div id="recipe_products">
        		<?php                 
                #$recipe->products opredelaensa v modele Resipe 4erez Activ Record i sohranaetsa kak array
        		foreach($dm_recipe->product as $key => $product){                    
        			$data['recipe_product_id'] = $key+1;
                    $data['name']   = $product->join_name;
                    $data['mera']   = $product->join_mera_id;
                    $data['value']  = $product->join_value;
                    $data['image']  = $product->image;
        			$this->load->view('/admin/recipes/subs/product.php', $data);
        		}
        		?>
    		</div>
    		<?php
            #
    		echo form_hidden('total_products', $dm_recipe->product->result_count());
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
                foreach($dm_recipe->recipe_step as $key => $step){
                    $data['step_id'] = $key+1;
                    $data['text'] = $step->join_text;
                    $data['image'] = $step->image;
                    $this->load->view('/admin/recipes/subs/step.php', $data);
                }
    			echo form_hidden('total_steps', $dm_recipe->recipe_step->result_count());
    		?>
		</div>
	</div>
	<div class="f_buttons span-13">
		<a href = '#' id = 'add_step' class = 'f_button grey wide'>+ Добавить Шаг</a>
		<a href = '#' id = 'save_recipe' class = 'f_button green wide'>Сохранить Рецепт</a>
	</div>
	<?php echo form_close(); ?>
</div>