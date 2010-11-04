<?php
function cleared_div(){
    return "<div class='clear'></div>";
}

function open_f_block(){
    return "<div class='f_block'>";
}

function close_f_block(){
    return "</div>";
}

function separator_div($height = 5){
	return '<div style="padding:'.$height.'px 0px"></div>';
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