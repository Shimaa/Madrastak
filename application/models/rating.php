<?php
class Rating extends CI_Model {
	var $id;
	var $school;
	var $user;
	var $overall_rating;
	var $detailed_rating_1;
	var $detailed_rating_2;
	var $detailed_rating_3;
	var $detailed_rating_4;
	var $review_heading;
	var $review_text;
	var $schools_categories;
	var $schools_grade_level;
	var $sumbit_date;
	var $latest_update;

	function load_rating_object($row){

		$rating = new Rating;

		$this->load->model('School', '', TRUE);
		$this->load->model('User', '', TRUE);
		$this->load->model('School_category', '', TRUE);
		$this->load->model('Grade_level', '', TRUE);

		$rating->id = $row->id;
		$rating->school = $this->School->load_school_object($row->school_id, FALSE);
		$rating->user = $this->User->load_user_object($row->user_id);
		$rating->overall_rating = $row->overall_rating;
		$rating->detailed_rating_1 = $row->detailed_rating_1;
		$rating->detailed_rating_2 = $row->detailed_rating_2;
		$rating->detailed_rating_3 = $row->detailed_rating_3;
		$rating->detailed_rating_4 = $row->detailed_rating_3;
		$rating->review_heading = $row->review_heading;
		$rating->review_text = $row->review_text;
		$rating->schools_categories_id = $this->School_category->get_category_object_by_id($row->schools_categories_id);
		$rating->schools_grade_level_id = $this->Grade_level->get_grade_level_object_by_id($row->schools_grade_level_id);
		$rating->sumbit_date = $row->sumbit_date;
		$rating->latest_updat = $row->latest_updatee;

		return $rating;

	}

	function add_rate($school_id, $user_id, $overall_rating, $review_heading, $review_text
	, $detailed_rating_1, $detailed_rating_2, $detailed_rating_3, $detailed_rating_4
	, $submit_date
	, $latest_update)
	{
		$this->load->database();
		
		$this->db->set('school_id', $school_id);
		$this->db->set('user_id', $user_id);
		$this->db->set('overall_rating', $overall_rating);
		$this->db->set('review_heading', $review_heading);
		$this->db->set('review_text', $review_text);
		$this->db->set('detailed_rating_1', $detailed_rating_1);
		$this->db->set('detailed_rating_2', $detailed_rating_2);
		$this->db->set('detailed_rating_3', $detailed_rating_3);
		$this->db->set('detailed_rating_4', $detailed_rating_4);
		$this->db->set('submit_date', $submit_date);
		$this->db->set('latest_update', $latest_update);
		
		// Execute the query
		$this->db->insert('user');
	  
		$errNo   = $this->db->_error_number();
		$errMess = $this->db->_error_message();
		 
		echo $errNo. " " . $errMess;

		// Return the ID of the inserted row, or false if the row could not be inserted
		return $this->db->insert_id();
		
	}
}
?>