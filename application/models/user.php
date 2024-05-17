<?php
class User extends CI_Model {
	var $id;
	var $email;
	var $name;
	var $password;
	var $user_type;
	var $user_profile;
	var $activation_token;
	var $last_activation_request;
	var $active;
	var $signup_date;
	var $last_login;

	function get_user_by_id($id){

		$this->load->model('Userprofile','',TRUE);
		$this->load->model('Usertype','',TRUE);

		$this->load->database();
		$this->db->where('id', $id);

		$query = $this->db->get('user');

		foreach ($query->result() as $row)
		{
			return load_user_object ($row);
		}

		return null;
	}

	function load_user_object ($row)
	{
		$user = new User;
		
		$this->load->model('Userprofile','',TRUE);
		$this->load->model('Usertype','',TRUE);		
		
		$user->id =  $row->id;
		$user->name = $row->name;
		//	$user->$password = $row->$password; // no need to save password in the object
		$user->user_type = $this->Usertype->get_usertype_by_id($row->user_type_id);
		$user->user_profile = $this->Userprofile->get_userprofile_by_id($row->user_profile_id);
		$user->active = $row->active;
		$user->signup_date = $row->signup_date;
		$user->last_login = $row->last_login;
		
		return $user;
	}

}
?>