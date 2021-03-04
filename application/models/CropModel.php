<?php
class CropModel extends CI_Model {

	public function group_data($params)	{
		$this->db->select('*');
		$this->db->from('crop_details');
		$this->db->where('crop',$params);
		$result = $this->db->get();
		if ($result->num_rows()>=1) 
		{
			$data = $result->row();
			return array(
			"status"=> 1,
			"code"=> 200,
			"message"=> "Success",
			'crop_select'=> $data->crop,
			"resultData"=> $data
		);
		}
		else{
			return getStatusCode(204, 0,"Data not found");
		}
	}
	public function crop_list(){
		$this->db->select('crop_id,crop,menu_images');
		$this->db->from('crop_details');
		$result = $this->db->get();
		if($result){
			return getStatusCode(200, 1,"Success",$result->result());
		}else{
			return getStatusCode(204, 0,"Data not found");
		}
	}
	public function auth_key_verify($params){
		$this->db->select('*');
		$this->db->from('auth');
		$this->db->where('auth_key',$params);
		$result = $this->db->get();
		if ($result->num_rows()>0) {
			return $result->row();
		}else{
			return false;
		}
	}
	// public function check_auth($params){
	// 	if ($params == $uniqKey) {
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }
}

?>