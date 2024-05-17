<?php
class Main extends CI_Controller {
	
	function english () {
		$_SESSION["lang"] = "english";
		
		$url = $_SESSION["CURRENT_URL"];
		// check if there is a controller main action or an action inside it
		
		
		$this->load->view('main_view', null, false);
	}
	
	function arabic () {
		$_SESSION["lang"] = "arabic";
		$this->load->view('main_view', null, false);
	}
	
}
?>