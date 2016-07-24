<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Requests_model extends CI_Model
{

    function get_all_requests($limit = 10,$where = '')
    {
        //new means that the request is new and the admin has neither accepted or rejected the request.
        if($where == '')
        {
            $this->db->order_by('booking_time','asc');
            $query = $this->db->get_where('reservation',array('status' => 'new'),$limit);
        }
        elseif($where)
        {
            $this->db->order_by('booking_time','asc');
            $query = $this->db->get_where('reservation',$where,$limit);
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

    function get_request($request_id)
    {
        $query = $this->db->get_where('reservation',array('id' => $request_id));
        if ( $query->num_rows() > 0 )
        {
            $result = $query->row_array();
            return $result;
        }
        else
        {
            return false;
        }
    }

    function set_request($request_id, $status = 'rejected')
    {
        $data = array('status' => $status);
        $query = $this->db->update('reservation',$data,"id = $request_id");
    }

    function get_requests_like_limit($table,$where,$title,$like, $limit)
    {
        $this->db->like($title, $like);
        if(!empty($where))
        {
            $query = $this->db->get_where($table, $where, $limit);
        }else
        {
            $query = $this->db->get($table, $limit);
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

}