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
	
	function convert_resultset_to_district ($result , $with_city) {
		//echo 'Inside convert_resultset_to_district';
		$district = new District;
			
		foreach ($result->result() as $row)
		{
			//echo 'Inside foreach loop';
			$district->id =  $row->id;
			$district->arabic_name =  $row->arabic_name;
			$district->english_name =  $row->english_name;
			if($with_city)
			{
				$this->load->model('City','',TRUE);
				$district->city =  $this->City->load_city_object($row->city_id);
			}
		}
		return $district;
			
	}
}
/* End of file District.php */