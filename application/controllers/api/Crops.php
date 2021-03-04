<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
header('Content-Type:application/json');
Class Crops extends CI_Controller {
/**
@author: Om prakash Sahoo
@date: 23th, Dec 2020
@project : insurance-flow
***/
public function group_data(){
	$responseData=array();
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
			if((isset($_GET['crop']) && $_GET['crop']!='')){
				$cropInput = html_escape($this->security->xss_clean($_GET['crop']));
				$responseData = $this->CropModel->group_data($cropInput);
			}else{
				$responseData= getStatusCode(400, 0,"Inalid params");
				}
			}else{
				$responseData= getStatusCode(400, 0,"Bad Request");
			}
		echo json_encode($responseData);die;
	}
public function crop_list(){
		if($_SERVER['REQUEST_METHOD'] == 'GET'){
			$responseData = $this->CropModel->crop_list();	
		}else{
			$responseData= getStatusCode(400, 0,"Bad Request");
		}
		echo json_encode($responseData);die;
		}

// public function showErrorMsg(){
// 	$errorResponse = array(
// 	   "Status" => 0,
// 	   "Code" => 404,
// 	   "message" => "Invalid Url,please check your url"       
// 	);
// 	echo json_encode($errorResponse);die;
// } 

}
?>