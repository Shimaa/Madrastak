<?php
class Login extends Base_Controller {

	public function index()
	{
		if ($this->session->userdata('lang') == ENGLISH)
		{
			$this->load->view('english/main_view', null, false);
		}
		else
		{
			$this->load->view('arabic/main_view', null, false);
		}

	}

	public function verify()
	{
		$email = $_POST["email"];
		$pass = $_POST["password"];

		$this->load->model('Account_model');
		if ($this->Account_model->login ($email, $pass))
		{
			echo "Success";
			//	$this->load->view('success.php');

			// save on database that the user is active and sign in date
			$date = date('Y-m-d H:i:s');
			$active = true;
			$this->Account_model->save_user_status($email, $date, $active);
		}
		else
		{
			echo "Failed to login, try again";
				
			if ($this->session->userdata('lang') == ENGLISH)
			{
				$this->load->view('english/main_view', null, false);
			}
			else
			{
				$this->load->view('arabic/main_view', null, false);
			}
		}

	}

	function forgotpassword()
	{
		$this->load->view('forgot_password.php', null, false);
	}

	function submitforgot()
	{
		$email = $_POST["email"];

		$url = "www.madrastak.com/login/resetpassword/".$email;

		$this->load->library('email');

		$this->email->from('madrastak@gmail.com');
		$this->email->to($email);
		$this->email->bcc('alshimaa_cs@yahoo.com');
		$this->email->subject('Update Your Password For Madrastak!');
		$this->email->message(
		'To update your Madrastak password, go to this link.'
		.$url);

		//	$this->email->send();

		echo "An email has been sent, please use the link on it to update your password";
		echo "URL: ".$url;
	}

	function resetpassword($email)
	{
		$this->session->set_userdata('email', '$email');
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('reset_password.php', null, false);
		}
		else
		{

		}
			
	}

	/*	function resetpassword()
	 {
		$this->resetpassword($_SESSION['email']);
		}
		*/

	function savefbinfo()
	{
		//	session_start();
		//	$user = $_SESSION["fb_user_profile"];

		//
		// TODO: check if user data saved before

		// save user data
		$signup_date = date('Y-m-d H:i:s');
			
			
		$data = array("email" => $user['email'], "name" => $user['name'], "facebook_user" => "1" ,"facebook_username" => $user["username"], "signup_date" => $signup_date);

		$this->load->model('Account_model');
		$this->Account_model->save_facebook_user($data);

		$this->load->view('success.php', null, false);
	}

	function en()
	{
		parent::en();
		$this->load_action();
		
	}

	function ar()
	{
		parent::ar();
		$this->load_action();
	}
	
	function load_action()
	{
		echo "reached";
		$action = $this->session->userdata('action');
		echo $action;
		if($action != null)
		{
			if ($action == FORGOTPASSWORD)
			{
				$this->forgotpassword();
			}
			
		}
		else {
			
			$this->index();
			
		}
	}
	
	

}


?>