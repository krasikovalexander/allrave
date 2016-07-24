<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AppModel extends CI_Model {

     public function __construct()
     {
      	parent::__construct();
     }

     function get_all_records($table,$where,$join_table,$join_criteria,$order)
		{
			$this->db->where($where);
			if($join_table){
			$this->db->join($join_table,$join_criteria);
			}
			$query = $this->db->order_by($order,'desc')->get($table);
			if ($query->num_rows() > 0)
			{
				return $query->result();
			}
			else
			{
				return NULL;
			}
		}

	function form_insert($data){
        if($this->db->insert('reservation',$data)){
            $last_id = $this->db->insert_id();
         return $last_id;
        } else{
            return false;
        }
    }

	function get_all_records_simple($table,$where = '')
	{
		if($where == '')
		{
		$query = $this->db->get( $table );
		}
		else
		{
			$query = $this->db->get_where( $table , $where );
		}

		if ( $query->num_rows() > 0 )
		{
			$result = $query->result_array();
			return $result;
		}
		else
		{
			return false;
		}
	}

	//function to get the records of a specific user
	function get_all_records_specific_user($table,$where = '')
	{
		if($where == '')
		{
		$query = $this->db->get( $table );
		}
		else
		{
			$query = $this->db->get_where( $table , $where );
		}

		if ( $query->num_rows() > 0 )
		{
			$result = $query->result_array();
			return $result;
		}
		else
		{
			return false;
		}
	}

	function get_records_by_limit($table,$where = '',$limit = 10, $start = 0)
	{
		if($where == '')
		{
			$query = $this->db->get( $table ,$limit, $start);
		}
		else
		{
			$query = $this->db->get_where( $table , $where , $limit , $start );
		}

		if ( $query->num_rows() > 0 )
		{
			$result = $query->result_array();
			return $result;
		}
		else
		{
			return false;
		}
	}
	function get_like($table,$title,$like)
	{
		$this->db->like($title, $like);
		$query = $this->db->get($table);
		if ( $query->num_rows() > 0 )
		{
			$result = $query->result_array();
			return $result;
		}
		else
		{
			return false;
		}
	}

	function get_like_limit($table,$title,$like,$limit)
	{
		$dcs_user_role_id = $this->tank_auth->get_role_id();
		$dcs_user_id = $this->tank_auth->get_user_id();
		if($dcs_user_role_id==1)
		{
		$this->db->like($title, $like, 'after');
		$this->db->distinct();
		$this->db->group_by('name');
		$query = $this->db->get($table,$limit);
		}
		else
		{
		$this->db->like($title, $like, 'after');
		$this->db->distinct();
		$this->db->group_by('name');
		$this->db->where(array('uid'=>$dcs_user_id));
		$query = $this->db->get($table,$limit);
		}
		if ( $query->num_rows() > 0 )
		{
			$result = $query->result_array();
			return $result;
		}
		else
		{
			return false;
		}
	}

	function insert($table,$data){
			$this->db->insert($table, $data);
			return $this->db->insert_id();
	}
	function update($table,$data,$where){
		$this->db->where($where)->update($table, $data);
		return TRUE;
	}
	function delete($table, $where)
	{
		$this->db->delete($table, $where);
		return TRUE;
	}

	function count($query)
	{
		return count($query);
	}

	function count_where($table,$where = '')
	{
		if($where == '')
		{
			$query = $this->db->get($table);
		}
		else
		{
			$query = $this->db->get_where($table,$where);
		}

		if ( $query->num_rows() > 0 )
		{
			$result = $query->result_array();
			return $result;
		}
		else
		{
			return false;
		}
	}

	function count_vehicles()
	{
		return $this->db->count_all('vehicles');
	}

	function search_project($keyword,$where)
	{
		//$array = array('project_title' => $keyword, 'project_code' => $keyword);
		$this->db->like('project_title',$keyword); 
		return $this->db->order_by('date_created','desc')	
						->where($where)					
						->get('events')->result();
	}
	function monthly_data($month)
	{
		$this->db->select_sum('amount');
		$this->db->where('month_paid', $month); 
		$this->db->where('year_paid', date('Y')); 
		$query = $this->db->get('payments');
		foreach ($query->result() as $row)
			{
				$amount = $row->amount ? $row->amount : 0;
   				return round($amount);
			}
	}
	function monthly_user_data($month)
	{
		$this->db->select_sum('amount');
		$this->db->where('paid_by', $this->tank_auth->get_user_id()); 
		$this->db->where('month_paid', $month); 
		$this->db->where('year_paid', date('Y')); 
		$query = $this->db->get('payments');
		foreach ($query->result() as $row)
			{
				$amount = $row->amount ? $row->amount : 0;
   				return round($amount);
			}
	}
}
     
