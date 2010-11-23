<div class = "step_block span-13">
<?php
    #ecli zagruzka stranici proishodit 4erez 'recipe/add' to peremenii ne sozdautsa 
    #vozmojno ect' lutshii variant! 
    if(!isset($step))$step = null;
//    if(!isset($image))$image='';
//    $step_description = array(
//    'id'    => 'step_description_'.$step_id,
//    'name'	=> 'step_description_'.$step_id,
//    'class'	=> 'f_textarea small',
//    'value' => set_value('product_'.$step_id,$text));
    
    $step_image = array(
    'id'	=> 'step_photo_'.$number,
    'name'	=> 'step_photo_'.$number,
    'class'	=> 'f_file_upload'
    );
    echo form_label('Шаг '.$number, '', array('class' => 'f_label'));
    $data['dm_object']  = $step;
    $data['number']     = $number;
    $this->load->view('admin/language_form/block_text',$data);
    echo form_label('Картинка', '', array('class' => 'f_label'));
    echo form_upload($step_image);
    if (isset($step->image)) echo '<img src="/images/steps/sp_'.$step->image.'_tiny.jpg'.'"/>';
?>
</div>