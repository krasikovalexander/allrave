<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*

CREATE TABLE `fx_airlines` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(200) NULL , `logo` VARCHAR(200) NULL , `active` INT(1) NOT NULL , PRIMARY KEY (`id`) ) ENGINE = InnoDB;

*/

class Airline_model extends CI_Model
{
    public function airlines()
    {
        return $this->db->get('airlines')->result();
    }

    public function activeAirlines()
    {
        return $this->db->where('active', 1)->get('airlines')->result();
    }
    

    public function create($data)
    {
        return $this->db->insert('airlines', $data);
    }

    public function deleteById($id)
    {
        return $this->db->delete('airlines', ['id' => $id]);
    }

    public function updateById($id, $data)
    {
        return $this->db->where('id', $id)->update('airlines', $data);
    }

    public function getById($id)
    {
        return $this->db->where('id', $id)->get('airlines')->row();
    }
}
