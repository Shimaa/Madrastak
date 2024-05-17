<?php
class Newrate extends Base_Controller {
	var $rating;
	
	public function index()
	{
		if ($this->session->userdata('lang') == ENGLISH)
		{
			$this->load->view('english/school/newrate', null, false);
		}
		else
		{
			$this->load->view('arabic/school/newrate', null, false);
		}
		
	}
		
	function add()
	{
		$this->load->model('School');
		$this->load->model('User');
		
		$school_id = unserialize($this->session->userdata('school'))->id;
		$user_id = unserialize($this->session->userdata('user'))->id;
		
		$this->load->model('Rating_service');
		$this->Rating_service->add_rate(
			$school_id, 
			$user_id, 
			$_POST['overall_rating'], 
			$_POST['$review_heading'],
			$_POST['$review_text'], 
			$_POST['$detailed_rating_1'], 
			$_POST['$detailed_rating_2'], 
			$_POST['$detailed_rating_3'],
			$_POST['$detailed_rating_4']);
		
	}
	
}
?>