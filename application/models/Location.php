<?php
/**
 * @author	Lamees Elhiny
 * @link	http://localhost/Madrastak/School_search_controller
 */

class Location extends CI_Model{
	var $id;
	var $country;
	var $governorate;
	var $city;
	var $district;
	var $arabic_detailed_address;
	var $english_detailed_address;
	var $latitude;
	var $longitude;
	
	function load_location_object ($id){
		//echo 'inside load_location_object  ';
		$sql = "SELECT * FROM location where id ='".$id."'";
        $result = $this->db->query($sql);
        return $this->convert_resultset_to_location ($result);
	}
	
	function convert_resultset_to_location ($result) {
		//echo 'Inside convert_resultset_to_location';
		$location = new Location;
			
		foreach ($result->result() as $row)
		{
			//echo 'Inside foreach loop';
			$location->id =  $row->id;
			$location->arabic_detailed_address =  $row->arabic_detailed_address;
			$location->english_detailed_address =  $row->english_detailed_address;
			$location->latitude =  $row->latitude;
			$location->longitude =  $row->longitude;
			if($row->country_id != null && $row->country_id != 0 ) {
				$this->load->model('Country','',TRUE);
				$location->country = $this->Country->load_country_object($row->country_id);
			}
			if($row->governate_id != null && $row->governate_id != 0 ) {
				$this->load->model('Governorate','',TRUE);
				$location->governorate = $this->Governorate->load_governorate_object($row->governate_id, FALSE);
			}
			if($row->city_id != null && $row->city_id != 0 ) {
				$this->load->model('City','',TRUE);
				$location->city = $this->City->load_city_object($row->city_id);
			}
			if($row->district_id != null && $row->district_id != 0 ) {
				$this->load->model('District','',TRUE);
				$location->district = $this->District->load_district_object ($row->district_id, FALSE);
			}
			
		}
		return $location;
		
			
	}
}
/* End of file Location.php */
