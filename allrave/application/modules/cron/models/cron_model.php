<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Cron_model extends CI_Model
{
    function get_unique_datetime()
    {
        $this->db->distinct();
        $this->db->select('date');
        $query = $this->db->get('slot_processing');

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

    function get_schedule_emails()
    {
        $date = date('Y-m-d' , time() - 60 * 60 * 5);
        $query = "SELECT * FROM fx_schedule_email WHERE TYPE NOT IN ('admin_reminder',  'reminder')
                  AND STATUS = 0
                  AND DATE = '$date'";

        $result = $this->db->query($query)->result();
        
        return $result;

        //return ':)';

    }
}