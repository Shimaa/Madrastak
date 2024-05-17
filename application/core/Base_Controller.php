<?php
class Base_Controller extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	function en()
	{
		$this->session->set_userdata('lang', ENGLISH);
		//$this->update_url();
	}

	function ar()
	{
		$this->session->set_userdata('lang', ARABIC);
		//$this->update_url();
	}

	function update_url()
	{
		$action = $this->session->userdata('action');
		$requestUrl = $this->session->userdata('requestUrl');
		echo 'inside update_url'.$requestUrl;
		$this->load->helper('url');
		if($action != null)
		{
			echo 'not null';
			echo $requestUrl.'/'.$action;
			echo base_url();
			echo current_url();
			//	call_user_func(array($this, $action));
			//redirect(base_url().$action);
			//redirect($requestUrl.'/'.$action);
			

		} else { // if no action, call index

			//	call_user_func(array($this, 'index'));
			echo 'No action';
			//redirect(base_url());
			//redirect($requestUrl);

		}
	}



}
?>