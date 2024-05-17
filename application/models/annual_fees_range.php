<?php
/**
 * @author	Lamees Elhiny
 * @link	http://localhost/Madrastak/School_search_controller
 */
class Annual_fees_range extends CI_Model{
	var $id;
	var $lower_value;
	var $higher_value;
	function load_fees_range_object ($id){
		//echo 'inside load_city_object  ';
		$sql = "SELECT * FROM feerange where id ='".$id."'";
        $result = $this->db->query($sql);
        return $this->convert_resultset_to_fees_range ($result);
	}
	
	function convert_resultset_to_fees_range ($result) {
		//echo 'Inside convert_resultset_to_city';
		$fees_range = new Annual_fees_range;
			
		foreach ($result->result() as $row)
		{
			//echo 'Inside foreach loop';
			$fees_range->id =  $row->id;
			$fees_range->lower_value=  $row->lower_value;
			$fees_range->higher_value =  $row->higher_value;
		}
		return $fees_range;
			
	}
}
/* End of file Annual_fees_range.php */