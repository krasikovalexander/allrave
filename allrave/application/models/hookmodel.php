<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HookModel extends CI_Model {

     public function __construct()
     {
      parent::__construct();
     }

     public function get_config()
     {
      return $this->db->get('config');
     }

     public function get_lang()
     {
      $query = $this->db->select('value')->where('config_key','language')->get('config');
        if ($query->num_rows() > 0)
          {
           $row = $query->row();
           return $row->value;
          }
     }
}