<?php
    #ecli zagruzka stranici proishodit 4erez 'recipe/add' to peremenii ne sozdautsa 
    #vozmojno ect' lutshii variant! 
    if(!isset($name))$text='';
    if(!isset($value))$image='';
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
?>
<div class = "step_block span-13">
<?php
echo form_label('Шаг '.$step_id, $step_description['id'], array('class' => 'f_label'));
echo form_textarea($step_description);
echo form_label('Картинка', $step_image['id'], array('class' => 'f_label'));
echo form_upload($step_image);
?>
<img src="/images/steps/<?php echo $image = ($image!='')? substr($image,0,strpos($image,'.')).'_tiny.jpg': 'sp_empty_tiny.jpg'; ?>"/>
</div>