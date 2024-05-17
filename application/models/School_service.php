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
    
    function find_school_by_name($school_name, $limit, $offset)
    {
		$this->load->model('School','',TRUE);
        return $this->School->get_school_by_name ($school_name, $limit, $offset);
    }
    
    function find_school_by_location($governorate, $city, $district, $limit, $offset)
    {
    	 
    	$this->load->model('School','',TRUE);
    	return $this->School->get_school_by_location ($governorate, $city, $district, $limit, $offset);
    }
    function get_total_rows($school_name){
    	$this->load->model('School','',TRUE);
    	$school_count = $this->School->get_school_by_name_count ($school_name);
    	return $school_count;
    	

    }
    
 function get_total_rows_school_by_location($governorate, $city, $district){
    	$this->load->model('School','',TRUE);
    	$school_count = $this->School->get_school_by_location_count ($governorate, $city, $district);
    	return $school_count;
    	}
    
    
    function get_governorates_for_country($country_id){
    	//echo 'Entry:get_governorates_for_country';
    	$this->load->model('Governorate','',TRUE);
    	return  $this->Governorate->load_all_governorates_for_country($country_id);
    	//$governorates = json_encode( $this->Governorate->load_all_governorates_for_country($country_id));
    	//echo $governorates;
    	//return;
    	
    }
    function get_city_for_governorate($governorate_id) {
    	$this->load->model('City','',TRUE);
    	return  $this->City->load_all_cities_for_governorate($governorate_id);
    	
    }
 function get_district_for_city($city_id) {
    	$this->load->model('District','',TRUE);
    	return  $this->District->load_all_districts_for_cities($city_id);
    	
    }
}
/* End of file School_search_controller.php */