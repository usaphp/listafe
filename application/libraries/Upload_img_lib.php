<?php if (!defined('BASEPATH')) exit('Нет доступа к скрипту');

class Upload_img_lib {
    
    private $config = array();
    private $err = array();
    private $CI;
    #v construktor peredaetsa array( Tip risunka, Razmer )
    function __construct($cfg){
        $this->CI = & get_instance();
        $this->initialize($cfg);
        print_flex($this->config['resize']);
        
    }
    function initialize($cfg = false){
        if (!$cfg) {$this->err['init'] = 'library is not initialize';
        echo 'init';} 
        if (is_array($cfg['size'])) 
            $this->config['resize'] = $cfg['size']; 
        else
            $this->config['resize'] = array($cfg['size']);
        
        #viberaet put' dla sohranenia v zavisimosti ot tipa risunka
        if (!$this->_set_type_image($cfg['type']))
            $this->err['type'] = 'type don\'t select';
        
        print_flex($cfg);
        #print_flex($this->err['type']); 
    }
    
    #v func upload peredaetsa Put' otkuda zagrujat' image i Ima (primer - 2_2) bez prefiksa
    
    function upload_img($form_name,$image_name){
        #esli sgenerirovalas' oshibka pri initialize to return
        if (isset($this->err['init'])) return false;
        #
        $upload_config['upload_path'] = $this->config['up_path'];
		$upload_config['allowed_types'] = 'gif|jpg|png';
        $upload_config['file_name'] = $image_name;
        $upload_config['overwrite'] = TRUE;
        $this->CI->load->library('upload');
        $this->CI->upload->initialize($upload_config);
        print_flex($upload_config);
        return;
        //try to upload file
        if ($this->upload->do_upload($form_name)){
            $this->_resize_image($config['upload_path'].$config['file_name']);
            return true;
        }else{
            return false;   
        }
    }
    
    function resize_img(){
        #if !
        #viberaet razmer resunka
        if (!_set_size($cfg['size'])) 
            $this->err['size'] = 'size don\'t select';
        #ostalinie nastroiki
    }
    
    function upload_resize_img($upload_path,$name){    }
    #konstanti beret iz application/constants
    private function _set_size($size){
        switch($size){
            case 'tiny':
                $this->config['width'] = image_tiny_width;  
                $this->config['height'] = image_tiny_height;
                break;
            case 'small':
                $this->config['width'] = image_small_width;  
                $this->config['height'] = image_small_height;
                break;
            case 'medium':
                $this->config['width'] = image_medium_width;  
                $this->config['height'] = image_medium_height;
                break;
            case 'large':
                $this->config['width'] = image_large_width;  
                $this->config['height'] = image_large_height;
                break;  
            default: #pri oshibre vibora
                return false; 
        }
        $this->config['postfix'] = '_'.$size;
        return true;
    }
    #vibor directory s images i prefixa k name image
    function _set_type_image($type){
        switch($type){
            case 'recipe':
                $this->config['image_name_prefix'] = IMAGE_RECIPE_PREFIX;        
                $path = 'recipe_images_path';
                break;
            case 'product':
                $this->config['image_name_prefix'] = IMAGE_PRODUCT_PREFIX;
                $path = 'product_images_path';
                break;
            case 'step':
                $this->config['image_name_prefix'] = IMAGE_STEP_PREFIX;
                $path = 'step_images_path';
                break;
            default: #pri oshibre vibora
                return false;     
        }
        $this->config['up_path'] = $this->CI->config->item($path);
        return true;
    }
    #
    function _get_name_image($name){
        
    }
}

    function _upload_images($form_name,$image_name, $upload_path, $width=40){ # $form_name- otkuda beret image
        //define upload class with configs
        #$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $image_name;
        $config['overwrite'] = TRUE;
        $this->load->library('upload');
        $this->upload->initialize($config);
        //try to upload file
        if ($this->upload->do_upload($form_name)){
            $this->_resize_image($config['upload_path'].$config['file_name']);
            return true;
        }else{
            return false;   
        }
    }
    function _resize_image($image_path, $width=40, $height=40){
        
        $config['source_image']     = $image_path;
        $config['create_thumb']     = TRUE;
        $config['thumb_marker']     = '_tiny';
        $config['width']            = $width;
        $config['height']           = $height;
        $config['master_dim']       = 'width';
        $config['maintain_ratio']   = TRUE;
        $this->load->library('image_lib');
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }
?>