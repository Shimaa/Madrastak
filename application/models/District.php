<?php
/**
 * @author	Lamees Elhiny
 * @link	http://localhost/Madrastak/School_search_controller
 */

class District extends CI_Model{
	var $id;
	var $city;
	var $arabic_name;
	var $english_name;
	function load_district_object ($id, $with_city){
		//echo 'inside load_district_object  ';
		$sql = "SELECT * FROM district where id ='".$id."'";
        $result = $this->db->query($sql);
        return $this->convert_resultset_to_district ($result , $with_city);
	}
	
	function load_all_districts_for_cities ($city_id){
		//echo 'inside load_all_governorates_for_country  ';
		$sql = "SELECT * FROM district where city_id ='".$city_id."'";
		$result = $this->db->query($sql);
		return $this->convert_resultset_to_district ($result , FALSE);
	}
	
	function convert_resultset_to_district ($result , $with_city) {
		//echo 'Inside convert_resultset_to_district';
		$district = null;
			
		foreach ($result->result() as $row)
		{
			//echo 'Inside foreach loop';
			$this->load_district_data($row, $with_city);
		}
		return $district;
			
	}
	function load_district_data($row, $with_city) {
		//echo 'Inside foreach loop';
		$district = new District;
		$district->id =  $row->id;
		$district->arabic_name =  $row->arabic_name;
		$district->english_name =  $row->english_name;
		if($with_city)
		{
			$this->load->model('City','',TRUE);
			$district->city =  $this->City->load_city_object($row->city_id);
		}


		return $district;

	}
	
function convert_resultset_to_district_array ($result, $withCity) {
		//echo 'convert_resultset_to_governorate_array';
		$districts;
		$index = 0;
			
		foreach ($result->result() as $row)
		{
			//echo 'Inside foreach loop';
			$$districts[$index] =  $this->load_district_data($row, $with_city);
			$index++;

		}
		return $$districts;
			
	}
	
}

/* End of file District.php */