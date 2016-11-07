<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*

CREATE TABLE fx_places ( id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT , name VARCHAR(100) NOT NULL , address VARCHAR(100) NOT NULL , city VARCHAR(100) NOT NULL , state VARCHAR(2) NOT NULL , zip VARCHAR(10) NOT NULL , PRIMARY KEY (id) ) ENGINE = InnoDB;

*/

class Place_model extends CI_Model
{
	
	public function places()
	{
		return $this->db->get('places')->result();
	}

	public function create($data) 
	{
		return $this->db->insert('places', $data); 
	}

	public function deleteById($id) {
		return $this->db->delete('places', ['id' => $id]); 
	}

	public function updateById($id, $data) {
		return $this->db->where('id', $id)->update('places', $data); 
	}

	public function getById($id) {
		return $this->db->where('id', $id)->get('places')->row(); 
	}
}