<?php
/**
 * @author	Lamees Elhiny
 * @link	http://localhost/Madrastak/School_search_controller
 */

class Country extends CI_Model{
	var $id;
	var $arabic_name;
	var $english_name;
	function load_country_object ($id){
		//echo '***********inside load_country_object************  ';
		$sql = "SELECT * FROM country where id ='".$id."'";
        $result = $this->db->query($sql);
        return $this->convert_resultset_to_country ($result);
	}
	
	function convert_resultset_to_country ($result) {
		//echo '***Inside convert_resultset_to_country*****';
		$country = new Country;
			
		foreach ($result->result() as $row)
		{
			//echo '****Inside foreach loop****';
			$country->id =  $row->id;
			$country->arabic_name =  $row->arabic_name;
			$country->english_name =  $row->english_name;
		}
		return $country;
			
	}
}
/* End of file Country.php */