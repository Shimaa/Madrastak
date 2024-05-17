<?php
class Register extends CI_Controller {

	function index()
	{
		$this->load->helper(array('form', 'url'));
		
		if ($this->session->userdata('lang') == "arabic")
		{
			$this->lang->load('error', 'arabic');
			$this->lang->load('content', 'arabic');
			
		}
		else 
		{
			$this->lang->load('error', 'english');
			$this->lang->load('content', 'english');
		}
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'lang:email', 'required|valid_email|callback_email_check');
		$this->form_validation->set_rules('name', 'lang:name', 'required');
		$this->form_validation->set_rules('password', 'lang:password', 'required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'lang:password_confirmation', 'required');

		$this->form_validation->set_message('required', $this->lang->line('error_required'));
		
		$this->load->model('Account_model');

		if ($this->form_validation->run() == FALSE)
		{
			if ($this->session->userdata('lang') == "english")
			{
				$this->load->view('english/register_form');
			}
			else
			{
				$this->load->view('arabic/register_form');
			}
		}
		else if ($this->email_check($_POST['email']) == FALSE)
		{
			if ($this->session->userdata('lang') == "english")
			{
				$this->load->view('english/register_form');
			}
			else
			{
				$this->load->view('arabic/register_form');
			}
		}
		else if ($this->form_validation->run() && $this->email_check($_POST['email']) == TRUE)
		{
			$signup_date = date('Y-m-d H:i:s');

			echo $signup_date;

			$data = array("email" => $_POST['email'], "password" => $_POST['password'], "name" => $_POST['name'], "user_type_id" => $_POST['type'], "signup_date" => $signup_date);
			echo $this->Account_model->add_user($data);

			$this->send_activation_code($_POST['name'], $_POST['email']);

			if ($this->session->userdata('lang') == "english")
			{
				$this->load->view('english/success');
			}
			else
			{
				$this->load->view('arabic/success');
			}
		}
	}

	function email_check($email)
	{

		if ( $this->Account_model->email_exists($email))
		{
			$this->form_validation->set_message('email_check', 'lang:This email is already registered.');
			return FALSE;
		}

		return TRUE;
	}

	function send_activation_code ($name, $email)
	{

		$code = $this->generate_random_string(5);

		// save activation code into user row into DB
		$this->Account_model->save_activation_code($email, $code);

		$url = "www.madrastak.com/register/activate/".$email.'/'.$code;

		echo $url;

		$this->load->library('email');

		$this->email->from('madrastak@gmail.com');
		$this->email->to($email);
		$this->email->bcc('alshimaa_cs@yahoo.com');

		$this->email->subject('Activate Your Madrastak Account!');
		$this->email->message('Hello'.$name.
		'To complete your Madrastak account, you must click the link below and enter your password on the following page to confirm your email address.'
		.$url);

		$this->email->send();

		echo $this->email->print_debugger();
	}

	function generate_random_string($length)
	{
		// start with a blank random string
		$rStr = "";

		// define possible characters
		$possible = "0123456789bcdfghjkmnpqrstvwxyz";

		// set up a counter
		$i = 0;
		// add random characters to $rStr until $length is reached
		while ($i < $length) {

			// pick a random character from the possible ones
			$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);

			// we don't want this character if it's already in the random string
			if (!strstr($rStr, $char)) {
				$rStr .= $char;
				$i++;
			}
		}
		// done!
		return $rStr;
	}


	function activate ($email, $code)
	{
		$this->load->model('Account_model');

		if ( $this->Account_model->email_exists($email))
		{
			if ($this->Account_model->check_code($email, $code))
			{
				$activation_date = date('Y-m-d H:i:s');
				$this->Account_model->activate_account($email, $activation_date);
				echo "Your account has been successfully activated.";
			}
			else
			echo "There is a problem with this activation code!";
		}

	}

	function english()
	{
		$this->session->set_userdata('lang', 'english');
		$this->index();
	}

	function arabic()
	{
		$this->session->set_userdata('lang', 'arabic');
		$this->index();
	}

}