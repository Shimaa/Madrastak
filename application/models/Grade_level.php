<?php
/**
 * @author	Lamees Elhiny
 * @link	http://localhost/Madrastak/School_search_controller
 */
class Grade_level extends CI_Model{
	var $id;
	var $level_arabic;
	var $level_english;
	function load_grade_levels_for_School ($school_id){
		//echo 'entry: load_categories_for_School';
		$sql = "SELECT * FROM schoolsgradelevels where school_id ='".$school_id."'";
		$result = $this->db->query($sql);
		return $this->convert_resultset_to_grade_levels_array ($result);
	}

	function convert_resultset_to_grade_levels_array($result) {
		//echo 'convert_resultset_to_grade_levels_array';
		$grade_levels = NULL;
		$index = 0;
			
		foreach ($result->result() as $row)
		{
			//echo 'Inside foreach loop';
			$grade_levels[$index] =  $this->load_grade_level_object($row);
			$index++;

		}
		return $grade_levels;
			
	}

	function load_grade_level_object($row){
		$grade_level = new Grade_level;
		$sql = "SELECT * FROM gradelevel where id ='".$row->grade_level_id."'";
		$result = $this->db->query($sql);
		foreach ($result->result() as $row)
		{
			//echo 'Inside foreach loop';
			$grade_level->id =  $row->id;
			$grade_level->level_arabic=  $row->level_arabic;
			$grade_level->level_english =  $row->level_english;
		}
		return $grade_level;
	}

	function get_grade_level_object_by_id($id){
		$grade_level = new Grade_level;
		$sql = "SELECT * FROM gradelevel where id ='".$id."'";
		$result = $this->db->query($sql);
		foreach ($result->result() as $row)
		{
			//echo 'Inside foreach loop';
			$grade_level->id =  $row->id;
			$grade_level->level_arabic=  $row->level_arabic;
			$grade_level->level_english =  $row->level_english;
		}
		return $grade_level;
	}

}
/* End of file Grade_level.php */

