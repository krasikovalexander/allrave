<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MX_Controller {

	function __construct()
	{
		parent::__construct();

		if (!$this->tank_auth->is_logged_in()) {
			$this->session->set_flashdata('message',lang('login_required'));
			redirect('auth/login');
		}

		if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) == 'client') {
			redirect('customers');
		}

	}

	function index()
	{
	$this->load->model('home_model');
	$this->load->module('layouts');
	$this->load->library('template');
	$this->template->title('All Rave Admin Section  - '.$this->config->item('customer_name'));
	$data['page'] = lang('home');
	$data['events'] = $this->home_model->recent_projects($limit = 5);
	$data['activities'] = $this->home_model->recent_activities($limit = 6);

	$this->template
	->set_layout('users')
	->build('user_home',isset($data) ? $data : NULL);
	}
	function _monthly_data($month)
	{
		$query = $this->db->select_sum('amount')->where(array('month_paid'=>$month,'year_paid'=>date('Y')))->get('payments');
		foreach ($query->result() as $row)
			{
				$amount = $row->amount ? $row->amount : 0;
   				return round($amount);
			}
	}
}

/* End of file welcome.php */
