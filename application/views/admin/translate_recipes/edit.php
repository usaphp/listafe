<?php
    $inp_name = array(
        'name'  => 'inp_name',
        'value' => $recipe->name,
        'id'    => 'inp_name',
        'class' => 'f_input required'
    );
    $inp_url = array(
        'name'  => 'inp_url',
        'value' => $recipe->url,
        'id'    => 'inp_url',
        'class' => 'f_input required'
    );
	$text_original = array(
        'name'  => 'text_original',
        'value' => $recipe->original,
        'id'    => 'text_original',
        'class' => 'f_textarea',
        'cols'  => '50'
    );
    $text_translate = array(
        'name'  => 'text_translate',
        'value' => $recipe->translate,
        'id'    => 'text_translate',
        'class' => 'f_textarea',
        'cols'  => '50'
    );
    $rdo_status = array(
        'name'  => 'rdo_statuses[]',
        'id'=> 'status_',            
        'class' => 'f_checkbox'
    );
?>
<div class="span-24 content">  
    <div class="f_header">Редактор перевода</div>
    <?php echo form_open_multipart('/admin/translate_recipes/edit/'.$recipe->id, array('id' => 'translate_recipe_edit_form', 'class' => 'f_form f_validate'));?>
    <div class="f_content">
        <?php echo form_success_error($form_error, $form_success); ?>
            <?php
                echo form_label('Название рецепта', $inp_name['id'], array('class' => 'f_label'));
                echo form_input($inp_name);
                
                echo form_label('Ссылка', $inp_url['id'], array('class' => 'f_label'));
                echo form_input($inp_url);            
            ?>            
            <div class="f_two_column_l">
                <?php
                echo form_label('Оригинальный текст', $text_original['name'], array('class' => 'f_label '));
                echo form_textarea($text_original);
                ?>                
            </div>
            <div class="f_two_column_r">
                <?php
                echo form_label('Перевод', $text_translate['name'], array('class' => 'f_label'));
                echo form_textarea($text_translate);
                ?>
            </div>
            <?php echo cleared_div();?>
            <div class="separator"></div>
            <div>
                <?php        
                #sozdaet radio_button
                foreach($dm_statuses as $status){                    
                    $rdo_status['value']    = $status->id;
                    #esli dannii status sovpodaet so sozdavaemim statusom to del. pometka
                    $rdo_status['checked']  = ($recipe->status == $status->id)?'checked':'';                    
                    $rdo_status['id']       = 'rdo_status_'.$status->id;
                    echo form_radio($rdo_status);
                    echo form_label($status->name, 'rdo_status_'.$status->id, array('class' => 'f_label_cb'));
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