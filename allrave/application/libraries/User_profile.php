<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class User_profile {

	function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->database();
	}
	public function count_table_rows($table)
    	{
	$query = $this->ci->db->get($table);
		if ($query->num_rows() > 0)
			{
  		 return $query->num_rows();
  		}else{
  			return 0;
  		}
	}
	public function task_by_status($progress)
    	{
    	$this->ci->db->where('progress <',$progress);
	$query = $this->ci->db->get('tasks');
		if ($query->num_rows() > 0)
			{
  		 return $query->num_rows();
  		}else{
  			return 0;
  		}
	}

	public function generate_string()
   	 {
   	 $this->ci->load->helper('string');
   	 return random_string('nozero', 7);
	}
	
	function role_by_id($role_id) {
	$query = $this->ci->db->where('r_id',$role_id)->select('role')->get('roles');
		if ($query->num_rows() > 0)
			{
  		 $row = $query->row();
  		 return $row->role;
  		}
	}	

	function get_user_details($user,$field) {
	$this->ci->db->where('id',$user);
	$this->ci->db->select($field);
	$query = $this->ci->db->get('users');
		if ($query->num_rows() > 0)
			{
  		 $row = $query->row();
  		 return $row->$field;
  		}
	}

	function get_profile_details($user,$field) {
	$this->ci->db->where('user_id',$user);
	$this->ci->db->select($field);
	$query = $this->ci->db->get('account_details');
		if ($query->num_rows() > 0)
			{
  		 $row = $query->row();
  		 return $row->$field;
  		}
	}

	function count_rows($table,$where)
	{
		$this->ci->db->where($where);
		$query = $this->ci->db->get($table);
		if ($query->num_rows() > 0){
			return $query->num_rows();
		} else{
			return 0;
		}
	}
	function get_sum($table,$field,$where)
	{
		$this->ci->db->where($where);
		$this->ci->db->select_sum($field);
		$query = $this->ci->db->get($table);
		if ($query->num_rows() > 0){
		$row = $query->row();
  		 return $row->$field;
		} else{
			return 0;
		}
	}

	function get_time_diff($from , $to){
	$diff = abs ( $from - $to );
	$years = $diff/31557600;
	$months = $diff/2635200;
	$weeks = $diff/604800;
	$days = $diff/86400;
	$hours = $diff/3600;
	$minutes = $diff/60;
	if ($years > 1) {
		$duration = round($years) .' years';
	}elseif ($months > 1) {
		$duration = round($months) .' months';
	}elseif ($weeks > 1) {
		$duration = round($weeks) .' weeks';
	}elseif ($days > 1) {
		$duration = round($days).' days';
	}elseif ($hours > 1) {
		$duration = round($hours) .' hours';
	} else {
		$duration = round($minutes) .' minutes';
	}
	
	return $duration;
	}

	function addOrdinalNumberSuffix($num) {
      switch ($num) {
        // Handle 1st, 2nd, 3rd
        case 1:  return $num.'st';
        case 2:  return $num.'nd';
        case 3:  return $num.'rd';
      }
    return $num.'th';
  }
  
}

/* End of file User_prof.php */