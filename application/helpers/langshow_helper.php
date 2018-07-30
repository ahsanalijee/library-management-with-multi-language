<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('witelang'))
{
    function writelang($var,$def='')
    {
    	$ci =& get_instance();
    	if ($var) {
    		echo $ci->lang->line($var);
    	}
    	else{
    		echo $def;
    	}
        
    }   
}
