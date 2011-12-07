<?php
/**
 * @author	Lamees Elhiny
 * @link	http://localhost/Madrastak/School_search_controller
 */
class School extends CI_Model{
	var $id;
	var $english_name;
	var $arabic_name;
	var $telephone1;
	var $telephone2;
	var $email;
	var $website;
	var $location;
	var $fee_range;
	var $logo_path;
	var $other;
	
	function load_school_object($row){
		$school = new School;
		$this->load->model('Location','',TRUE);
		//var $fee_range_obj = new Annual_fees_range;
		
		$school->id = $row->id;
		$school->english_name = $row->english_name;
		$school->arabic_name = $row->arabic_name;
		$school->telephone1 = $row->telephone1;
		$school->telephone2 = $row->telephone2;
		$school->email = $row->email;
		$school->website = $row->website;
		$school->location = $this->Location->load_location_object($row->location_id);
		//$school->fee_range = $row->english_name;
		//$school->logo_path = $row->logo_path;
		//$school->other = $row->other;
		return $school;
	}
	
	function get_school_by_english_name ($english_name){
		//echo 'Inside get_school_by_english_name';
	    $sql = "SELECT * FROM school where english_name like '%".$english_name."%'";
        $result = $this->db->query($sql);
        return $this->convert_resultset_to_school_array ($result);
 }
 	function convert_resultset_to_school_array ($result) {
 		//echo 'Inside convert_resultset_to_school_array';
 		$schools;
 		$index = 0;
 		
 	foreach ($result->result() as $row)
	{
   	//echo 'Inside foreach loop';
   	$schools[$index] =  $this->load_school_object($row);
   	$index++;
   	
	}
	return $schools;
 		
 	}
}
/* End of file School.php */
