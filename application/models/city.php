<?php
/**
 * @author	Lamees Elhiny
 * @link	http://localhost/Madrastak/School_search_controller
 */
class City extends CI_Model{
	var $id;
	var $arabic_name;
	var $english_name;
	function load_city_object ($id){
		//echo 'inside load_city_object  ';
		$sql = "SELECT * FROM city where id ='".$id."'";
        $result = $this->db->query($sql);
        return $this->convert_resultset_to_city ($result);
	}
	
	function convert_resultset_to_city ($result) {
		//echo 'Inside convert_resultset_to_city';
		
		$city = null;	
		foreach ($result->result() as $row)
		{
			//echo 'Inside foreach loop';
			$city = $this->load_city_data($row);
		}
		return $city;
			
	}
	
	function load_all_cities_for_governorate ($governorate_id){
		//echo 'inside load_all_governorates_for_country  ';
		$sql = "SELECT * FROM city where governate_id ='".$governorate_id."'";
		$result = $this->db->query($sql);
		return $this->convert_resultset_to_city_array ($result);
	}
	function convert_resultset_to_city_array ($result) {
		//echo 'convert_resultset_to_governorate_array';
		$cities = null;
		$index = 0;
			
		foreach ($result->result() as $row)
		{
			//echo 'Inside foreach loop';
			$cities[$index] =  $this->load_city_data($row);
			$index++;

		}
		return $cities;
			
	}
	
	function load_city_data($row) {
		//echo 'Inside foreach loop';
		$city = new City;
		$city->id =  $row->id;
			$city->arabic_name =  $row->arabic_name;
			$city->english_name =  $row->english_name;
		//echo 'Governorate'.$governorate->english_name;
		return $city;

	}
}
/* End of file City.php */