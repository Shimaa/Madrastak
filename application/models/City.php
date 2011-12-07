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
		$city = new City;
			
		foreach ($result->result() as $row)
		{
			//echo 'Inside foreach loop';
			$city->id =  $row->id;
			$city->arabic_name =  $row->arabic_name;
			$city->english_name =  $row->english_name;
		}
		return $city;
			
	}
}
/* End of file City.php */