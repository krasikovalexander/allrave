<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reservation_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function form_insert($data){
        if($this->db->insert('reservation',$data)){
            $last_id = $this->db->insert_id();
         return $last_id;
        } else{
            return false;
        }
    }

    //This function is used to check if the user is already a subscriber.
    //if yes then return true.
    //if no then save the user to the subscribers table.
    function subscriber_check($email){
        $query = $this->db->get_where('subscribers',array('email' => $email));
        //if the email does not exist then insert it into the database.

        if($query->num_rows() < 1 ){
            /*date_default_timezone_set("UTC");*/
            $this->db->insert('subscribers',array('email' => $email,'created_at' => date('Y-m-d H:i:s', time() - 60 * 60 * 5)));
        }
    }

    function getfullslots($date){
        $query = $this->db->get_where('full_slot',array('date' => $date));//gets all the full slots for a particular date.
        if ( $query->num_rows() > 0 )
        {
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }
}

/* End of file model.php */
