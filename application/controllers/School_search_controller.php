<?php
/**
 * @author	Lamees Elhiny
 * @link	http://localhost/Madrastak/School_search_controller
 */

class School_search_controller extends CI_Controller {
	public function index() {
	$this->load->view('Search_by_name_view');
	}
	public function load_search_by_location_view(){
		
	}
	public function load_search_by_location_name(){
	//echo 'Entry: load_search_by_location_name()';
	$this->load->model('School_service');
	$school_name = $this->input->post("school_name");
	
	$data['query'] = $this->School_service->find_school_by_name($school_name);
	//echo 'Exit: load_search_by_location_name()';
	$this->load->view('School_search_result', $data);
	
		
	}
}
/* End of file School_search_controller.php */

