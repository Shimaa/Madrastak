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
	function load_governorate_object ($id, $with_country){
		//echo 'inside load_governorate_object  ';
		$sql = "SELECT * FROM governate where id ='".$id."'";
        $result = $this->db->query($sql);
        return $this->convert_resultset_to_governorate ($result , $with_country);
	}
	
	function convert_resultset_to_governorate ($result , $with_country) {
		//echo 'Inside convert_resultset_to_governorate';
		$governorate = new Governorate;
			
		foreach ($result->result() as $row)
		{
			//echo 'Inside foreach loop';
			$governorate->id =  $row->id;
			$governorate->arabic_name =  $row->arabic_name;
			$governorate->english_name =  $row->english_name;
			if($with_country)
			{
				$this->load->model('Country','',TRUE);
				$governorate->city =  $this->City->load_country_object($row->country_id);
			}
		}
		return $governorate;
			
	}
}
/* End of file Governorate.php */