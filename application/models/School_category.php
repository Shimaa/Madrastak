<?php
/**
 * @author	Lamees Elhiny
 * @link	http://localhost/Madrastak/School_search_controller
 */
class School_category extends CI_Model{
	var $id;
	var $category_arabic_name;
	var $category_english_name;
	function load_categories_for_School ($school_id){
		//echo 'entry: load_categories_for_School';
		$sql = "SELECT * FROM schoolscategories where school_id ='".$school_id."'";
		$result = $this->db->query($sql);
		return $this->convert_resultset_to_categoreis_array ($result);
	}

	function convert_resultset_to_categoreis_array ($result) {
		//echo 'Inside convert_resultset_to_school_array';
		$school_categories;
		$index = 0;
			
		foreach ($result->result() as $row)
		{
			//echo 'Inside foreach loop';
			$school_categories[$index] =  $this->load_category_object($row);
			$index++;

		}
		return $school_categories;
			
	}

	function load_category_object($row){
		$category = new School_category;
		$sql = "SELECT * FROM category where id ='".$row->category_id."'";
		$result = $this->db->query($sql);
		foreach ($result->result() as $row)
		{
			//echo 'Inside foreach loop';
			$category->id =  $row->id;
			$category->category_arabic_name=  $row->category_arabic_name;
			$category->category_english_name =  $row->category_english_name;
		}
		return $category;
	}


}
/* End of file School_category.php */
