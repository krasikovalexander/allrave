<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Reservation_v2_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function form_insert($data)
    {
        if ($this->db->insert('reservation_v2', $data)) {
            $last_id = $this->db->insert_id();
            return $last_id;
        } else {
            return false;
        }
    }

    public function set_calendar($id, $calendar, $event)
    {
        $data = array(
            'calendar_id' => $calendar,
            'event_id' => $event,
        );
        $this->db->where('id', $id)->update('reservation_v2', $data);
        return true;
    }

    public function setRaveStatus($id, $status)
    {
        $data = array(
            'rave_status' => $status
        );
        $this->db->where('id', $id)->update('reservation_v2', $data);
        return true;
    }

    public function setClientStatus($id, $status)
    {
        $data = array(
            'client_status' => $status
        );
        $this->db->where('id', $id)->update('reservation_v2', $data);
        return true;
    }


    public function getById($id)
    {
        return $this->db->select('*')->from('reservation_v2')->where('id', $id)->limit(1)->get()->row_array();
    }
}

/* End of file model.php */
