<?php	
    echo open_f_block('language_block_'.$number);
    #
    if(is_null($dm_object)){         
        echo form_hidden('total_language_'.$number, 1);
        $data['number'] = $number;
        $this->load->view('admin/language_form/sub/input_text',$data);
        $lang_count = 1; 
    }else{                    
        echo form_hidden('total_language_'.$number, $dm_object->language->result_count());
        foreach($dm_object->language as $key => $language){
            $data['language']       = $language;
            $data['number']         = $number;
            $data['language_number']= $key+1;
            $this->load->view('admin/language_form/sub/input_text',$data);
        }
    }
    echo close_f_block();
    echo button_add_language($number,'text');
    echo cleared_div();
?>