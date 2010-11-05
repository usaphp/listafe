<?php
$sel_main_mera = array(
	'options' => array_for_dropbox($meras, 'Мера Измерения'),
	'id'	=> 'main_mera_'.$product->mera_id,
	'name'	=> 'main_mera_'.$product->mera_id,
	'selected' => $product->mera_id, 
	'class'	=> 'f_select f_joined');
    echo form_label('Основная мера', '', array('class' => 'f_label'));
    echo form_dropdown($sel_main_mera['name'], $sel_main_mera['options'], $sel_main_mera['selected'], 'id = "'.$sel_main_mera['id'].'" class = "'.$sel_main_mera['class'].'"');
    echo cleared_div();?>
    <div id="ratio_options_holder">
    <?php
    foreach($ratios as $key => $ratio){
        $this->data['value_scalar']     = $key;
        $this->data['value_relativ']    = $key;
        $this->load->view('admin/ratio_meras/subs/field_ratio_meras',$this->data);        
    }
    $this->load->view('admin/ratio_meras/subs/field_ratio_meras',$this->data);
    ?>
    </div>
    <?php
    echo anchor('#', 'Add ratio', array('class'=> 'f_button green', 'id' => 'add_ratio'));    	
	echo anchor('#', 'Save Product', array('class'=> 'f_button grey wide', 'id' => 'save_product'));        
          
?>