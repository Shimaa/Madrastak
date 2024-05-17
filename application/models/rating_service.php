<?php
class Rating_service extends CI_Model
{
	
	function get_school_rating_list ($school_id){
		$this->load->database();
		$this->db->where('school_id', $school_id);
		$query = $this->db->get('rating');

		$rating_list = NULL;
		$index = 0;
		
		$this->load->model('Rating','',TRUE);

		foreach ($query->result() as $row)
		{
			$rating_list[$index] =  $this->Rating->load_rating_object($row);
			$index++;

		}

		return $rating_list;
	}
	
	function calculate_school_overall_rating ($school_id)
	{
		$this->load->database();
		$this->db->where('school_id', $school_id);
		$this->db->select_avg('overall_rating');
		$query = $this->db->get('rating');
		
		return $query->result();
	}
	
	function calculate_school_detailed_rating_1 ($school_id)
	{
		$this->load->database();
		$this->db->where('school_id', $school_id);
		$this->db->select_avg('detailed_rating_1');
		$query = $this->db->get('rating');
		
		return $query->result();
	}
	
	function calculate_school_detailed_rating_2 ($school_id)
	{
		$this->load->database();
		$this->db->where('school_id', $school_id);
		$this->db->select_avg('detailed_rating_2');
		$query = $this->db->get('rating');
		
		return $query->result();
	
	}
	
	function calculate_school_detailed_rating_3 ($school_id)
	{
		$this->load->database();
		$this->db->where('school_id', $school_id);
		$this->db->select_avg('detailed_rating_3');
		$query = $this->db->get('rating');
		
		return $query->result();
	
	}
	
	function calculate_school_detailed_rating_4 ($school_id)
	{
		$this->load->database();
		$this->db->where('school_id', $school_id);
		$this->db->select_avg('detailed_rating_4');
		$query = $this->db->get('rating');
		
		return $query->result();
	
	}
	
	function add_rate($school_id, $user_id, $overall_rating, $review_heading,
		$review_text, $detailed_rating_1, $detailed_rating_2, $detailed_rating_3, $detailed_rating_4)
		{
			$submit_date = date('Y-m-d H:i:s');
			$latest_update = date('Y-m-d H:i:s');
			
			$this->Rating->add_rate($school_id, $user_id, $overall_rating, $review_heading,
				$review_text, $detailed_rating_1, $detailed_rating_2, $detailed_rating_3, $detailed_rating_4
				, $submit_date
				, $latest_update
			);
							
		}

		
}
?>