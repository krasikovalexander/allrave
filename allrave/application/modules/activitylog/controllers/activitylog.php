<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Activitylog extends MX_Controller {

		function __construct()
	{
		parent::__construct();
		$this->load->library('tank_auth');
		if (!$this->tank_auth->get_username()) {
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('access_denied'));
			redirect('');
		}
	}

	function log($params)
	{
		$this->db->insert('activities', $params); 
		return TRUE;
	
	}
}

/* End of file fomailer.php */