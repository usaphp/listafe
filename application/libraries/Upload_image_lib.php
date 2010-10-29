<?php if (!defined('BASEPATH')) exit('Нет доступа к скрипту');

class Upload_image_lib {
    private $image_sizes = array('tiny','small','medium','large');
    private $config = array();
    private $log_error;
    private $log_deleted;
    private $CI;
    #v construktor peredaetsa array( Tip risunka, Razmer )
    function __construct($cfg = false){
        $this->CI = & get_instance();
        if($cfg) return $this->initialize($cfg);
    }
    function initialize($cfg = false){
        $this->config['caller_method'] = 'initialize()';
        $this->log_error = '';
        if (!$cfg)                  return $this->_return_log_error('configuration variable is not set');
        if (!isset($cfg['size']))   return $this->_return_log_error('variable size is not set');
        if (!isset($cfg['type']))   return $this->_return_log_error('variable type is not set');
        
        #sozdaet array s razmerami 
        if (is_array($cfg['size']))
            $this->config['sizes'] = $cfg['size'];
        else
            $this->config['sizes'] = array($cfg['size']);
        
        #viberaet put' dla sohranenia v zavisimosti ot tipa risunka
        if (!$this->_set_type_image($cfg['type']))
            return $this->_return_log_error('type image don\'t select');
        
        return !($this->_error_exist()); 
    }
    
    #v func upload peredaetsa Put' otkuda zagrujat' image i Ima (primer - 2_2) bez prefiksa
    
    function upload_img($form_name = false,$image_name = false){
        $this->config['caller_method'] = 'upload_img()';
        #
        if (!$image_name)           return $this->_return_log_error('image name not set');
        if (!$form_name)            return $this->_return_log_error('form image not set');
        if ($this->_error_exist())  return $this->_return_log_error('init error');
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
            
            return $this->_return_log_error('?CI->upload->do_upload?');   
        }
    }
    
    function resize_img($image_name = false){
        $this->config['caller_method'] = '_resize_img()';
        #for ERRORS init
        
        if (!$image_name)           return   $this->_return_log_error('image name not set');
        if ($this->_error_exist())  return   $this->_return_log_error('init error');
         
        $config['source_image']     = $this->config['upload_path'].$this->_get_name_img($image_name); #!
        $config['master_dim']       = 'width';
        $config['create_thumb']     = TRUE;
        $config['maintain_ratio']   = TRUE;
        $this->CI->load->library('image_lib');
        foreach($this->config['sizes'] as $size){
            $result = false;
            if (!$this->_set_size($size)) return $this->_return_log_error('is not defined true size');
            $config['upload_path'] = $this->config['upload_path']; 
            $config['thumb_marker']     = $this->config['thumb_marker'];
            $config['width']            = $this->config['width'];
            $config['height']           = $this->config['height'];           
            $this->CI->image_lib->initialize($config);
            if (!$this->CI->image_lib->resize()) $this->_return_log_error('?CI->image_lib->resize()?');
        }
        return $this->_error_exist();
    }
    
    function upload_resize_img($form_name,$image_name){  
        $result_image_name = $this->upload_img($form_name,$image_name);
        $this->resize_img($image_name);
        #esli ne image ne zagruzilas^ to return false
        return $result_image_name;
    }
    function delete_img($image_type, $image_name){
        $this->config['caller_method'] = 'delete_img()'; 
        #
        $this->_set_type_image($image_type);
        #sozdaet array(name,ext) name=> .. ,ext => '.jpg'               
        $exp_name = $this->_explode_name_img($image_name);
        #
        if(unlink ($this->_get_name_img($exp_name['name'])))
            $this->_delete_log($exp_name['name']);
        foreach($this->image_sizes as $size){
            if (unlink($this->_get_name_img($exp_name['name'],$size)))
                $this->_delete_log($exp_name['name'],$size); 
        }        
        
    }
    #
    function _delete_log($log){
        $this->log_deleted .= $log.'; ';
        return false;
    }
    #
    function get_deleted(){
        if ($this->log_deleted)
            return $this->log_deleted;
        else 
            return false;
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
    function _explode_name_img($name)
	{
		$ext = strrchr($name, '.');
		$name = ($ext === FALSE) ? $name : substr($name, 0, -strlen($ext));
		
		return array('ext' => $ext, 'name' => $name);
	}
    #
    function _get_name_img($name,$postfix = false){
        $prefix = $this->config['image_name_prefix'];
        if ($postfix) 
            return $prefix.$name.'_'.$postfix.'.jpg'; 
        return $prefix.$name.'.jpg';
    }
    function _return_log_error($str = ''){
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