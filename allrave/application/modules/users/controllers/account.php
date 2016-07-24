<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('tank_auth');
		if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != 'admin') {
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('access_denied'));
			redirect('');
		}
		$this->load->model('user_model');
	}
	function index(){
		$this->active();
	}

	function active()
	{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->template->title(lang('users').' - '.$this->config->item('customer_name'). ' '. $this->config->item('version'));
	$data['page'] = lang('users');
	$data['datatables'] = TRUE;
	$data['form'] = TRUE;
	$data['users'] = $this->user_model->users();
	$data['roles'] = $this->user_model->roles();
	$this->template
	->set_layout('users')
	->build('users',isset($data) ? $data : NULL);
	}
	function delete()
	{
		if ($this->input->post()) {

			if ($this->config->item('demo_mode') == 'TRUE') {
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('demo_warning'));
			redirect($this->input->post('r_url'));
		}
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_id', 'User ID', 'required');
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('delete_failed'));
				$this->input->post('r_url');
		}else{	
			$user = $this->input->post('user_id');
			$this->db->delete('comments', array('posted_by' => $user)); 
			$this->db->delete('activities', array('user' => $user));  
			//$this->db->delete('event_orders', array('reporter' => $user)); 
			// Delete event_order files
			$event_order_files = $this->user_model->user_event_order_files($user);
			foreach ($event_order_files as $key => $f) {
				unlink('./resource/event_order-files/'.$f->file_name);
			}
			if ($this->user_profile->get_profile_details($user,'avatar') != 'default_avatar.jpg') {
				unlink('./resource/avatar/'.$this->user_profile->get_profile_details($user,'avatar'));
			}			

			$this->db->delete('files', array('uploaded_by' => $user)); 
			$this->db->delete('event_order_files', array('uploaded_by' => $user)); 
			$this->db->delete('account_details', array('user_id' => $user)); 
			$this->db->delete('users', array('id' => $user)); 
			// Log Activity
					$params['user'] = $this->tank_auth->get_user_id();
					$params['module'] = 'Users';
					$params['module_field_id'] = $user;
					$params['activity'] = ucfirst('Deleted System User');
					$params['icon'] = 'fa-trash-o';
					modules::run('activitylog/log',$params); //log activity

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('user_deleted_successfully'));
			redirect($this->input->post('r_url'));
		}
		}else{
			$data['user_id'] = $this->uri->segment(4);
			$this->load->view('modal/delete_user',$data);
		}
	}
}

/* End of file account.php */
