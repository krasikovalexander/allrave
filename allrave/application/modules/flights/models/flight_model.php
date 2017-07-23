<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*


CREATE TABLE `fx_flights` ( `id` INT NULL AUTO_INCREMENT , `path` VARCHAR(200) NOT NULL , `airline_id` INT NOT NULL , `active` INT(1) NOT NULL , PRIMARY KEY (`id`) ) ENGINE = InnoDB;



*/

class Flight_model extends CI_Model
{
    public function flights($airline_id)
    {
        return $this->db->where('airline_id', $airline_id)->get('flights')->result();
    }

    public function activeFlights($airline_id)
    {
        return $this->db->where('airline_id', $airline_id)->where('active', 1)->get('flights')->result();
    }
    

    public function create($data)
    {
        return $this->db->insert('flights', $data);
    }

    public function deleteById($id)
    {
        return $this->db->delete('flights', ['id' => $id]);
    }

    public function updateById($id, $data)
    {
        return $this->db->where('id', $id)->update('flights', $data);
    }

    public function getById($id)
    {
        return $this->db->where('id', $id)->get('flights')->row();
    }
}
