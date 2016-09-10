<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*

CREATE TABLE fx_hotels ( id INT NOT NULL AUTO_INCREMENT , name VARCHAR(100) NOT NULL , logo VARCHAR(100) NOT NULL , PRIMARY KEY (id) ) ENGINE = InnoDB;
CREATE TABLE fx_hotel_emails ( id INT NOT NULL AUTO_INCREMENT , email VARCHAR(100) NOT NULL , state ENUM('iowa','illinois','all') NOT NULL , PRIMARY KEY (id) ) ENGINE = InnoDB;
ALTER TABLE fx_hotels CHANGE id id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE fx_hotel_emails ADD hotel_id INT UNSIGNED NOT NULL ;
ALTER TABLE fx_hotel_emails ADD INDEX(hotel_id);

ALTER TABLE fx_hotel_emails ADD CONSTRAINT foreign_hotel FOREIGN KEY (hotel_id) REFERENCES fx_hotels(id) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE IF NOT EXISTS `fx_hotel_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(100) NOT NULL,
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
   PRIMARY KEY (id)
) ENGINE=InnoDB;

ALTER TABLE `fx_hotels` ADD `requests` INT NOT NULL ;


*/

class Hotel_model extends CI_Model
{
	
	public function hotels()
	{
		return $this->db->get('hotels')->result();
	}
	

	public function create($data) 
	{
		return $this->db->insert('hotels', $data); 
	}

	public function deleteById($id) {
		return $this->db->delete('hotels', ['id' => $id]); 
	}

	public function updateById($id, $data) {
		return $this->db->where('id', $id)->update('hotels', $data); 
	}

	public function getById($id) {
		return $this->db->where('id', $id)->get('hotels')->row(); 
	}

	public function emails($hotel_id) {
		return $this->db->where('hotel_id', $hotel_id)->get('hotel_emails')->result(); 
	}

	public function addEmail($data) {
		return $this->db->insert('hotel_emails', $data); 
	} 

	public function getEmailById($id) {
		return $this->db->where('id', $id)->get('hotel_emails')->row(); 
	}

	public function updateEmailById($id, $data) {
		return $this->db->where('id', $id)->update('hotel_emails', $data); 
	}

	public function deleteEmailById($id) {
		return $this->db->delete('hotel_emails', ['id' => $id]); 
	}

	public function getEmailsByStateAndChains($state, $chains) {
		if($state == 'all') {
			return $this->db->where_in('hotel_id', $chains)->get('hotel_emails')->result();
		}
		return $this->db->where('state', $state)->where_in('hotel_id', $chains)->get('hotel_emails')->result();
 	}

	public function addRequest($from, $to, $hash, $hotel) {
		$data = [
			"from" => $from,
			"to"   => $to,
			"hash" => $hash,
		];
		$inserted = $this->db->insert('hotel_requests', $data);
		if ($inserted) {
			$this->db->where('id', $hotel);
			$this->db->set('requests', 'requests+1', FALSE);
			$this->db->update('hotels');
		}
		return $inserted; 
	}

	public function getRequestByHash($hash) {
		return $this->db->where('hash', $hash)->get('hotel_requests')->row(); 
	}
}