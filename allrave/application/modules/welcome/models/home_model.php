<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model
{
	
	function recent_projects($limit)
	{
		return $this->db->order_by('date_created','desc')->get('events',$limit)->result();
	}
	function recent_activities($limit)
	{
		return $this->db->order_by('activity_date','DESC')->get('activities',$limit)->result();
	}
	
}

/* End of file model.php */
