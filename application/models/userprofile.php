<?php
class Userprofile extends CI_Model
{
	var $id;
	var $user_id;
	var $date_of_birth;
	var $image_path;
	var $gender;
	var $name_appear_as;
	var $address;
	var $telephone;
	var $mobile;
	var $job;	
	
	function get_userprofile_by_id($id){
		$userprofile = new Userprofile;

		$this->load->database();
		$this->db->where('id', $id);

		$query = $this->db->get('userprofile');

		foreach ($query->result() as $row)
		{
			$userprofile->id =  $row->id;
			$userprofile->user_id = $row->user_id;
			$userprofile->date_of_birth = $row->date_of_birth;
			$userprofile->image_path = $row->image_path;
			$userprofile->gender = $row->gender;
			$userprofile->name_appear_as = $row->name_appear_as;
			$userprofile->address = $row->address;
			$userprofile->telephone = $row->telephone;
			$userprofile->mobile = $row->mobile;
			$userprofile->job = $row->job;
		}

		return $userprofile;
	}
	
}
?>