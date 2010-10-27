<?php if (!defined('BASEPATH')) exit('Нет доступа к скрипту');

class Upload_image_lib {
    
    private $config = array();
    private $log_error ;
    private $CI;
    #v construktor peredaetsa array( Tip risunka, Razmer )
    function __construct($cfg = false){
        $this->CI = & get_instance();
        if($cfg) return $this->initialize($cfg);
    }
    function initialize($cfg = false){
        $this->config['caller_method'] = 'initialize()';
        $this->log_error = '';
        if (!$cfg)                  return $this->_return_error('configuration variable is not set');
        if (!isset($cfg['size']))   return $this->_return_error('variable size is not set');
        if (!isset($cfg['type']))   return $this->_return_error('variable type is not set');
        #if (!isset($cfg['format'])) return $this->_return_error('variable type is not set');
        
        #sozdaet array s razmerami 
        if (is_array($cfg['size']))
            $this->config['sizes'] = $cfg['size'];
        else
            $this->config['sizes'] = array($cfg['size']);
        
        #viberaet put' dla sohranenia v zavisimosti ot tipa risunka
        if (!$this->_set_type_image($cfg['type']))
            return $this->_return_error('type image don\'t select');
        #
        return $this->_error_exist(); 
    }
    
    #v func upload peredaetsa Put' otkuda zagrujat' image i Ima (primer - 2_2) bez prefiksa
    
    function upload_img($form_name = false,$image_name = false){
        $this->config['caller_method'] = 'upload_img()';
        #
        if (!$image_name)           return $this->_return_error('image name not set');
        if (!$form_name)            return $this->_return_error('form image not set');
        if ($this->_error_exist())  return $this->_return_error('init error');
        #
		$this->config['allowed_types'] = 'jpg|png';
        $this->config['file_name'] = $this->_get_name_img($image_name);#! izmenit rasshiretie
        $this->config['overwrite'] = TRUE;
        $this->CI->load->library('upload');
        $this->CI->upload->initialize($this->config);
        //try to upload file
        if ($this->CI->upload->do_upload($form_name)){
            return $this->_get_name_img($image_name);
        }else{
            return $this->_return_error('?CI->upload->do_upload?');   
        }
    }
    
    function resize_img($image_name = false){
        $this->config['caller_method'] = '_resize_image()';
        #for ERRORS init
        
        if (!$image_name)           return   $this->_return_error('image name not set');
        if ($this->_error_exist())  return   $this->_return_error('init error');
         
        $config['source_image']     = $this->config['upload_path'].$this->_get_name_img($image_name); #!
        $config['master_dim']       = 'width';
        $config['create_thumb']     = TRUE;
        $config['maintain_ratio']   = TRUE;
        $this->CI->load->library('image_lib');
        foreach($this->config['sizes'] as $size){
            $result = false;
            if (!$this->_set_size($size)) return $this->_return_error('is not defined true size');
            $config['upload_path'] = $this->config['upload_path']; 
            $config['thumb_marker']     = $this->config['thumb_marker'];
            $config['width']            = $this->config['width'];
            $config['height']           = $this->config['height'];           
            $this->CI->image_lib->initialize($config);
            if (!$this->CI->image_lib->resize()) $this->_return_error('?CI->image_lib->resize()?');
        }
        return $this->_error_exist();
    }
    
    function upload_resize_img($upload_path,$name){  
        $this->upload_img($upload_path,$name);
        $this->resize_img($image_name);
    }
    #konstanti beret iz application/constants
    private function _set_size($size){
        switch($size){
            case 'tiny':
                $this->config['width'] = IMAGE_TINY_WIDTH;  
                $this->config['height'] = IMAGE_TINY_HEIGHT;
                break;
            case 'small':
                $this->config['width'] = IMAGE_SMALL_WIDTH;  
                $this->config['height'] = IMAGE_SMALL_HEIGHT;
                break;
            case 'medium':
                $this->config['width'] = IMAGE_MEDIUM_WIDTH;  
                $this->config['height'] = IMAGE_MEDIUM_HEIGHT;
                break;
            case 'large':
                $this->config['width'] = IMAGE_LARGE_WIDTH;  
                $this->config['height'] = IMAGE_LARGE_HEIGHT;
                break;  
            default: #pri oshibre vibora
                return false; 
        }
        $this->config['thumb_marker'] = '_'.$size;
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
        $this->config['upload_path'] = $this->CI->config->item($path);
        return true;
    }
    #
    function _get_name_img($name){
        $prefix = $this->config['image_name_prefix'];
        return $prefix.$name.'.jpg';
    }
    function _return_error($str = ''){
        $this->log_error .= ' Function->'.$this->config['caller_method'].' error:'.$str.'; ';
        return false;
    }
    function _error_exist(){
        if(empty($this->log_error))return false;
        return true;
    }
    function get_errors(){
        if ($this->_error_exist())
            return $this->log_error;
        else 
            return false;
    }
}

?>