<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function showError($type, $msg){
	$ci =& get_instance();
	$messge = array('msg' => $msg, 'type' => $type);
	$ci->session->set_flashdata('item', $messge);
	$ci->session->keep_flashdata('item',$messge);
}

function checkAuth(){
	$ci =& get_instance();

	$userId=$ci->session->userdata('userId');
	if(isset($userId)){
		return true;
	}else{
		redirect('User/login', 'refresh');
	}

}
