<div class = "step_block span-13">
<?php
    #ecli zagruzka stranici proishodit 4erez 'recipe/add' to peremenii ne sozdautsa 
    #vozmojno ect' lutshii variant! 
    if(!isset($text))$text='';
    if(!isset($image))$image='';
    $step_description = array(
    'id'    => 'step_description_'.$step_id,
    'name'	=> 'step_description_'.$step_id,
    'class'	=> 'f_textarea small',
    'value' => set_value('product_'.$step_id,$text));
    
    $step_image = array(
    'id'	=> 'step_photo_'.$step_id,
    'name'	=> 'step_photo_'.$step_id,
    'class'	=> 'f_file_upload'
    );
echo form_label('Шаг '.$step_id, $step_description['id'], array('class' => 'f_label'));
echo form_textarea($step_description);
echo form_label('Картинка', $step_image['id'], array('class' => 'f_label'));
echo form_upload($step_image);
if ($image!='') echo '<img src="/images/steps/'.substr($image,0,strpos($image,'.')).'_tiny.jpg'.'"/>';
?>
</div>