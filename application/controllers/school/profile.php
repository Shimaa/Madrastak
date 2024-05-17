<?php
class profile extends Base_Controller {
	// var $id;
	// var $name;
	var $overall_rating_image_path;
	

	function display ($school_name)
	{
		$this->load->model('School');

		$school = $this->School->get_a_school_by_name ($school_name);
		
		// save school object into session
		$this->session->set_userdata("school", serialize($school));

		if ($school == false)
			echo "Cannot find a school with this name";
		else
		{
			echo $school->id;
			echo $school->english_name;
			echo $school->email;
		}
		
		$rating_list = $this->get_school_ratings($school->id);
		
		for ($i = 0 ; $i < count($rating_list); $i ++)
		{
			$rating = $rating_list[i];
			echo 'ID =  ' . $rating->id . ' Value = ' . $rating->value . ' Heading = ' . $rating->review_heading . ' Text = ' . $rating->review_text;
		}

	}
	
	private function get_school_ratings ($school_id)
	{
		$this->load->model('Rating_service');
		$this->Rating_service->get_school_rating_list($school_id);
	}
	
	private function get_overall_ratings()
	{

	}

	private function get_detailed_ratings()
	{

	}

	private function get_users_ratings()
	{

	}

	private function get_geo_coordinates()
	{

	}

}
?>