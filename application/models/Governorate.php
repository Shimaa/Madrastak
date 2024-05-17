<?php
/**
 * @author	Lamees Elhiny
 * @link	http://localhost/Madrastak/School_search_controller
 */
class Governorate extends CI_Model{
	var $id;
	var $country;
	var $arabic_name;
	var $english_name;
	function load_governorate_object ($id , $with_country){
		//echo 'inside load_governorate_object  ';
		$sql = "SELECT * FROM governate where id ='".$id."'";
        $result = $this->db->query($sql);
        return $this->convert_resultset_to_governorate ($result , $with_country);
	}
	
	function load_all_governorates_for_country ($id){
		//echo 'inside load_all_governorates_for_country  ';
		$sql = "SELECT * FROM governate where country_id ='".$id."'";
		$result = $this->db->query($sql);
		return $this-> convert_resultset_to_governorate_array  ($result , FALSE);
	}
	
	function convert_resultset_to_governorate ($result , $with_country) {
		//echo 'Inside convert_resultset_to_governorate';
		foreach ($result->result() as $row)
		{
			return $this->load_governorate_data($row, $with_country);
			//echo 'Inside foreach loop';
			/*$governorate->id =  $row->id;
			$governorate->arabic_name =  $row->arabic_name;
			$governorate->english_name =  $row->english_name;
			//echo 'Governorate'.$governorate->english_name;
			if($with_country)
			{
				$this->load->model('Country','',TRUE);
				$governorate->city =  $this->City->load_country_object($row->country_id);
			}*/
		}
		return NULL;
			
	}
	
function convert_resultset_to_governorate_array ($result, $withCountry) {
		//echo 'convert_resultset_to_governorate_array';
		$governorates;
		$index = 0;
			
		foreach ($result->result() as $row)
		{
			//echo 'Inside foreach loop';
			$governorates[$index] =  $this->load_governorate_data($row, $withCountry);
			$index++;

		}
		return $governorates;
			
	}
	
	function load_governorate_data($row, $with_country) {
		//echo 'Inside foreach loop';
		$governorate = new Governorate;
		$governorate->id =  $row->id;
		$governorate->arabic_name =  $row->arabic_name;
		$governorate->english_name =  $row->english_name;
		//echo 'Governorate'.$governorate->english_name;
		if($with_country)
		{
			$this->load->model('Country','',TRUE);
			$governorate->city =  $this->City->load_country_object($row->country_id);
		}
		return $governorate;

	}
}
/* End of file Governorate.php */