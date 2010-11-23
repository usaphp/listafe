<?php
function cleared_div(){
    return "<div class='clear'></div>";
}

function open_f_block($div_id = '', $div_class = ''){
    return "<div id = '".$div_id."' class='f_block ".$div_class."'>";
}

function close_f_block(){
    return "</div>";
}

function separator_div($height = 5){
	return '<div style="padding:'.$height.'px 0px"></div>';
}

function button_add_language($id_postfix = false, $class_postfix = false){
    $btn_add_language = array(        
        'id'    => ($id_postfix)?'btn_language_add_'.$id_postfix:'btn_language_add_id',
        'class' => ($class_postfix)?'btn_language_add_'.$class_postfix:'btn_language_add'
    );
    $btn_add_language['class'] .= ' f_button green f_last';
    return anchor('#','добавить',$btn_add_language);
}

if ( ! function_exists('form_hidden'))
{
	function form_hidden($name, $value = '', $recursing = FALSE)
	{
		static $form;

		if ($recursing === FALSE)
		{
			$form = "\n";
		}

		if (is_array($name))
		{
			foreach ($name as $key => $val)
			{
				form_hidden($key, $val, TRUE);
			}
			return $form;
		}

		if ( ! is_array($value))
		{
			$form .= '<input type="hidden" name="'.$name.'" id="'.$name.'" value="'.form_prep($value, $name).'" />'."\n";
		}
		else
		{
			foreach ($value as $k => $v)
			{
				$k = (is_int($k)) ? '' : $k; 
				form_hidden($name.'['.$k.']', $v, TRUE);
			}
		}

		return $form;
	}
    
}

function form_attr_hidden($attrs) {
    $elem = '<input type="hidden" ';
    foreach($attrs as $key => $attr){
        $elem .= $key.'="'.$attr.'" ';
    }
    $elem .= '/>';
    return $elem;
}