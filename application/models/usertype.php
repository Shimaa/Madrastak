<?php
class Usertype extends CI_Model
{

	var $id;
	var $value;
	var $english_name;
	var $arabic_name;

	function get_usertype_by_id($id){
		$usertype = new Usertype;

		$this->load->database();
		$this->db->where('id', $id);

		$query = $this->db->get('usertype');

		foreach ($query->result() as $row)
		{
			$usertype->id =  $row->id;
			$usertype->value = $row->value;
			$usertype->english_name = $row->english_name;
			$usertype->arabic_name = $row->arabic_name;
		}

		return $usertype;
	}

}
?>