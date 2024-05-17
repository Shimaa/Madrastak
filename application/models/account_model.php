<?php

class Account_model extends CI_Model {

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	/**
	 * AddUser method creates a record in the users table.
	 */
	function add_user($data = array())
	{
		// qualification (make sure that we're not allowing the site to insert data that it shouldn't)
		$qualificationArray = array('email', 'name', 'user_type_id', 'signup_date');
		foreach($qualificationArray as $qualifier)
		{
			if(isset($data[$qualifier])) $this->db->set($qualifier, $data[$qualifier]);
		}

		// MD5 the password if it is set
		if(isset($data['password'])) $this->db->set('password', md5($data['password'], true));

		// Execute the query
		$this->db->insert('user');
		 
		$errNo   = $this->db->_error_number();
		$errMess = $this->db->_error_message();
			
		echo $errNo. " " . $errMess;

		// Return the ID of the inserted row, or false if the row could not be inserted
		return $this->db->insert_id();
	}

	function email_exists($email)
	{
		$this->load->database();
		$this->db->where('email', $email);
		$query = $this->db->get('user');

		if($query->num_rows() == 0)
		return false;
			
		return true;
	}

	function save_activation_code ($email, $code)
	{
		$this->load->database();

		$data = array(
               'activation_token' => $code
		);

		$this->db->where('email', $email);
		$this->db->update('user', $data);

		return $this->db->insert_id();
	}

	function check_code($email, $code)
	{
		$this->load->database();
		$this->db->where('email', $email);
		$this->db->where('activation_token', $code);
		$query = $this->db->get('user');

		if($query->num_rows() == 0)
		return false;
			
		return true;
	}

	function activate_account($email, $activation_date)
	{
		$this->load->database();

		$data = array(
               'last_activation_request' => $activation_date
		);

		$this->db->where('email', $email);
		$this->db->update('user', $data);

		return $this->db->insert_id();
	}

	function login ($email, $password)
	{
		$this->load->database();
		$this->db->where('email', $email);
		$this->db->where('password', md5($password, true));

		$query = $this->db->get('user');

		if($query->num_rows() == 0)
			return false;
			
			echo 'reached';
		$this->load->model('User', '', TRUE);

		// return user object
		foreach ($query->result() as $row)
		{
			return $this->User->load_user_object ($row);
		}
	}

	function save_user_status ($email, $login_date, $is_active)
	{
		$this->load->database();
		$this->db->where('email', $email);

		$data = array(
               'last_login' => $login_date,
				'active' => $is_active
		);

		$this->db->update('user', $data);

		return $this->db->insert_id();
	}

	function save_facebook_user ($data)
	{
		$this->load->database();

		// qualification (make sure that we're not allowing the site to insert data that it shouldn't)
		$qualificationArray = array('email', 'name', 'facebook_user', 'facebook_username', 'signup_date');
		foreach($qualificationArray as $qualifier)
		{
			if(isset($data[$qualifier])) $this->db->set($qualifier, $data[$qualifier]);
			echo $data[$qualifier];
		}

		// Execute the query
		$this->db->insert('user');
		 
		$errNo   = $this->db->_error_number();
		$errMess = $this->db->_error_message();
			
		echo $errNo. " " . $errMess;

		// Return the ID of the inserted row, or false if the row could not be inserted
		return $this->db->insert_id();

	}
}
?>