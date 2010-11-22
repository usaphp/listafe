<?php
	echo open_f_block('language_block_id');
    echo form_hidden('total_language_names',$dm_object->language->result_count());
    foreach($dm_object->language as $key => $language){
        $data['language']   = $language;
        $data['number']     = $key+1;
        $this->load->view('admin/language_form/sub/input_name',$data);
    }
    echo close_f_block();
    echo button_add_language();        
    echo cleared_div();
?>