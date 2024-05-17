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
	var $school_categories;
	var $school_grade_levels;
	var $other;
	var $rating_list;

	function load_school_object($row , $heavy){
		$school = new School;
		$school->id = $row->id;
		$school->english_name = $row->english_name;
		$school->arabic_name = $row->arabic_name;
		$this->load->model('Location','',TRUE);
		
		if($heavy){
			$this->load->model('Annual_fees_range','',TRUE);
			$this->load->model('School_category','',TRUE);
			$this->load->model('Grade_level','',TRUE);
			$school->telephone1 = $row->telephone1;
			$school->telephone2 = $row->telephone2;
			$school->email = $row->email;
			$school->website = $row->website;
			$school->location = $this->Location->load_location_object($row->location_id);
			$school->fee_range = $this->Annual_fees_range->load_fees_range_object($row->fee_range_id);
			$school->school_categories = $this->School_category->load_categories_for_School($row->id);
			$school->school_grade_levels = $this->Grade_level->load_grade_levels_for_School($row->id);
			$school->logo_path = $row->logo_path;
			$school->other = $row->other;
		}
		else {
			$school->location = new Location;
			$school->location->english_detailed_address = $row->english_detailed_address;
			$school->location->arabic_detailed_address = $row->arabic_detailed_address;

		}
		return $school;
	}

	function get_school_by_english_name_count ($english_name){
		//echo 'Inside get_school_by_english_name';
		$sql = "SELECT count(*) AS school_count FROM school where english_name like '%".$english_name."%'";
		$result = $this->db->query($sql);
		foreach ($result->result() as $row)
		{
			//echo 'Inside foreach loop';
			return $row->school_count;
		}

		return 0;

	}

	function get_school_by_name_count ($name){
		//echo 'Inside get_school_by_english_name';
		$sql = "SELECT count(*) AS school_count FROM school where english_name like '%".$name."%' OR arabic_name like '%".$name."%'";
		$result = $this->db->query($sql);
		foreach ($result->result() as $row)
		{
			//echo 'Inside foreach loop';
			return $row->school_count;


		}

		return 0;

	}


	function get_school_by_location_count ($governorate, $city, $district){
		echo 'Inside get_school_by_location_count';

		if ($governorate != 0) {
			$sql = "SELECT count(*) AS school_count  FROM `schoolwithlocation` WHERE `governate_id`= ".$governorate;
			if($city != 0) {
				$sql= $sql." AND `city_id` =". $city;
				if($district != 0) {
					$sql= $sql." AND `district_id` =". $district;
				}
			}



			$result = $this->db->query($sql);
			foreach ($result->result() as $row)
			{
				//echo 'Inside foreach loop';
				return $row->school_count;


			}
		}
		return 0;
	}

	function get_school_by_english_name_old_version ($english_name, $limit, $offset){
		//echo 'Inside get_school_by_english_name';
		$this->db->select('*');
		$this->db->from('school');
		$this->db->like('english_name', $english_name);


		$query = $this->db->get($limit, $offset);
		return $query;
	}

	function get_school_by_english_name ($english_name, $limit, $offset){
		//echo 'Inside get_school_by_english_name';
		$sql = "SELECT * FROM school where english_name like '%".$english_name."%' limit ". $limit;
		if($offset != '')
		{
			echo "inside offset";

			$sql= $sql." offset ".$offset;
			echo $sql;
		}
		echo $sql;
		$result = $this->db->query($sql);

		return $this->convert_resultset_to_school_array ($result, TRUE);
	}

	function get_school_by_name ($name, $limit, $offset){
		//echo 'Inside get_school_by_english_name';
		$sql = "SELECT * FROM school where english_name like '%".$name."%' OR arabic_name like '%".$name."%' limit ". $limit;
		if($offset != '')
		{
			echo "inside offset";

			$sql= $sql." offset ".$offset;
			echo $sql;
		}
		echo $sql;
		$result = $this->db->query($sql);

		return $this->convert_resultset_to_school_array ($result, TRUE);
	}

	function get_school_by_location ($governorate, $city, $district, $limit, $offset){
		//echo 'Inside get_school_by_location';
		$result = NULL;
		if ($governorate != 0) {
			$sql = "SELECT * FROM `schoolwithlocation` WHERE `governate_id`= ".$governorate;
			if($city != 0) {
				$sql= $sql." AND `city_id` =". $city;
				if($district != 0) {
					$sql= $sql." AND `district_id` =". $district;
				}
			}


			$sql= $sql." limit ". $limit;
			if($offset != '')
			{
				echo "inside offset";
					
				$sql= $sql." offset ".$offset;
				echo $sql;
			}
			echo $sql;
			$result = $this->db->query($sql);
		}
		return $this->convert_resultset_to_school_array ($result, FALSE);
	}

	function convert_resultset_to_school_array ($result, $heavy) {
		//echo 'Inside convert_resultset_to_school_array';
		$schools= null;
		$index = 0;
		if($result != null){
			foreach ($result->result() as $row)
			{
				//echo 'Inside foreach loop';
				$schools[$index] =  $this->load_school_object($row, $heavy);
				$index++;

			}
		}
		return $schools;
			
	}

	function get_a_school_by_name ($name)
	{
		$this->load->database();
		$this->db->where('english_name', $name);
		$this->db->or_where('arabic_name', $name);
		$query = $this->db->get('school');

		if($query->num_rows() == 0)
			return false;
			
		foreach ($query->result() as $row)
		{
			return  $this->load_school_object($row, TRUE);
		}		

	}
	
	function get_a_school_by_id ($id)
	{
		$this->load->database();
		$this->db->where('id', $id);
		$query = $this->db->get('school');

		if($query->num_rows() == 0)
			return false;
			
		foreach ($query->result() as $row)
		{
			return  $this->load_school_object($row, TRUE);
		}		

	}
	
}
/* End of file School.php */
