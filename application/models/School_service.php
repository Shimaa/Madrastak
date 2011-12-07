<?php
/**
 * @author	Lamees Elhiny
 * @link	http://localhost/Madrastak/School_search_controller
 */

class School_service extends CI_Model {

 
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function find_school_by_name($school_name)
    {
		$this->load->model('School','',TRUE);
        return $this->School->get_school_by_english_name ($school_name);
    }
}
/* End of file School_search_controller.php */