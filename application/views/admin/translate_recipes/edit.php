<?php

	
    $inp_url = array(
        'name'  => 'inp_url',
        'value' => $recipe->url,
        'id'    => 'inp_url',
        'class' => 'f_input required widest'
    );
	
    $inp_name = array(
        'name'  => 'inp_name',
        'value' => $recipe->name,
        'id'    => 'inp_name',
        'class' => 'f_input required'
    );
	
    $inp_name_translate = array(
        'name'  => 'inp_name_translate',
        'value' => $recipe->name_translate,
        'id'    => 'inp_name_translate',
        'class' => 'f_input'
    );
	
    $text_custom = array(
        'name'  => 'text_custom',
        'value' => $recipe->custom,
        'id'    => 'text_custom',
        'class' => 'f_textarea',
        'cols'  => '50'
    );
	$text_ingredients = array(
        'name'  => 'text_ingredients',
        'value' => $recipe->ingredients,
        'id'    => 'text_original',
        'class' => 'f_textarea',
        'cols'  => '50'
    );
    $text_preparation = array(
        'name'  => 'text_preparation',
        'value' => $recipe->preparation,
        'id'    => 'text_preparation',
        'class' => 'f_textarea',
        'cols'  => '50'
    );
	
    $text_custom_translate = array(
        'name'  => 'text_custom_translate',
        'value' => $recipe->custom_translate,
        'id'    => 'text_custom_translate',
        'class' => 'f_textarea',
        'cols'  => '50'
    );
	$text_ingredients_translate = array(
        'name'  => 'text_ingredients_translate',
        'value' => $recipe->ingredients_translate,
        'id'    => 'text_original_translate',
        'class' => 'f_textarea',
        'cols'  => '50'
    );
    $text_preparation_translate = array(
        'name'  => 'text_preparation_translate',
        'value' => $recipe->preparation_translate,
        'id'    => 'text_preparation_translate',
        'class' => 'f_textarea',
        'cols'  => '50'
    );
	
    $rdo_status = array(
        'name'  => 'rdo_statuses',      
        'class' => 'f_radio'
    );
	
    $comment = array(
        'name'  => 'comment',   
        'value' => $recipe->comment,   
        'class' => 'f_textarea',
        'cols'	=> '110',
        'rows'	=> '5'
    );
?>
<div class="span-24 content">  
    <div class="f_header">Редактор перевода</div>
    <?php echo form_open_multipart('/admin/translate_recipes/edit/'.$recipe->id, array('id' => 'translate_recipe_edit_form', 'class' => 'f_form f_validate'));?>
    <div class="f_content">
        <?php echo form_success_error($form_error, $form_success); ?>
            <?php
                
                echo form_label('Ссылка', $inp_url['id'], array('class' => 'f_label'));
                echo form_input($inp_url);            
            ?>            
            <div class="f_two_column_l">
                <?php
                
                echo form_label('Название рецепта', $inp_name['id'], array('class' => 'f_label'));
                echo form_input($inp_name);
                
                echo form_label('Описание Рецепта', $text_custom['name'], array('class' => 'f_label '));
                echo form_textarea($text_custom);
                echo form_label('Ингредиенты', $text_ingredients['name'], array('class' => 'f_label '));
                echo form_textarea($text_ingredients);
                echo form_label('Приготовление', $text_preparation['name'], array('class' => 'f_label '));
                echo form_textarea($text_preparation);
                ?>                
            </div>
            <div class="f_two_column_r">
                <?php
				
                echo form_label('Название рецепта', $inp_name_translate['id'], array('class' => 'f_label'));
                echo form_input($inp_name_translate);
				
                echo form_label('Описание Рецепта', $text_custom_translate['name'], array('class' => 'f_label '));
                echo form_textarea($text_custom_translate);
                echo form_label('Ингредиенты', $text_ingredients_translate['name'], array('class' => 'f_label '));
                echo form_textarea($text_ingredients_translate);
                echo form_label('Приготовление', $text_preparation_translate['name'], array('class' => 'f_label '));
                echo form_textarea($text_preparation_translate);
                ?>
            </div>
            <?php echo cleared_div();?>
            <?php
                echo form_label('Комментарии', $comment['name'], array('class' => 'f_label '));
                echo form_textarea($comment);            
            ?>
            <div class="separator"></div>
            <div>
                <?php        
                #sozdaet radio_button
				echo form_label('Статус Перевода:', '', array('class' => 'f_label'));
				echo separator_div(2);
                foreach($dm_statuses as $status){                    
                    $rdo_status['value']    = $status->id;
                    #esli dannii status sovpodaet so sozdavaemim statusom to del. pometka
                    $rdo_status['checked']  = ($recipe->status == $status->id)?'checked':'';                    
                    $rdo_status['id']       = 'rdo_status_'.$status->id;
                    echo form_radio($rdo_status);
                    echo form_label($status->name, 'rdo_status_'.$status->id, array('class' => 'f_label_radio'));
					echo cleared_div();
                }?>
            </div>
            <?php echo cleared_div();?>
            <div class="separator"></div>
            <div class="f_buttons">                
                <?php echo form_submit('btn_save_recipe','Сохранить');?>
            </div>    
        <?php echo form_close(); ?>
    </div>
</div>