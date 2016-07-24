<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
	
	function users()
	{
		$this->db->join('account_details','account_details.user_id = users.id');
		return $this->db->where(array('activated'=>'1'))->order_by('created','desc')->get('users')->result();
	}
	function user_details($user_id)
	{
		$this->db->join('account_details','account_details.user_id = users.id');
		$query = $this->db->where('user_id',$user_id)->get('users');
		if ($query->num_rows() > 0){
			return $query->result();
		} 
	}
	function user_project_files($user)
	{
		$this->db->join('users','users.id = files.uploaded_by');
		return $this->db->where('uploaded_by',$user)->get('files')->result();
	}
	function user_event_order_files($user)
	{
		$this->db->join('users','users.id = event_order_files.uploaded_by');
		return $this->db->where('uploaded_by',$user)->get('event_order_files')->result();
	}
	function roles()
	{
		$query = $this->db->get('roles');
		if ($query->num_rows() > 0){
			return $query->result();
		} 
	}
	
}

/* End of file model.php */
