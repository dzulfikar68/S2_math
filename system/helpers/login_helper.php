<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//ini helper membuat sendri

function is_logged_in() {
   
    $CI =& get_instance();
   
    $user = $CI->session->userdata('username');
    if (!isset($user)) { 
		return false; 
	} 
	else { 
		return true; 
	}
}