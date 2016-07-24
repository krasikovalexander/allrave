<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Notebook extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('tank_auth');
		if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != ('admin' && 'collaborator')) {
			$this->session->set_flashdata('message', lang('access_denied'));
			redirect('');
		}
		$this->load->model('project_model','project');
	}

	function notes()
	{
	$this->load->module('layouts');
	$this->load->library('template');
	$this->template->title(lang('notes').' - '.$this->config->item('customer_name'). ' '. $this->config->item('version'));
	$data['page'] = lang('events');
	$data['events'] = $this->project->get_all_records($table = 'events',
		$array = array(
			'proj_deleted' => 'No'),$join_table = 'account_details',$join_criteria = 'account_details.user_id = events.client','date_created');
	$this->template
	->set_layout('users')
	->build('notes',isset($data) ? $data : NULL);
	}
	function savenote()
	{
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('project', 'Event', 'required');
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('error_in_form'));
				redirect($this->input->post('r_url', TRUE));
		}else{		
			$project = $this->input->post('project', TRUE);	
			$form_data = array(
			                'notes' => $this->input->post('notes')						
			            );
			$this->db->where('project_id',$project)->update('events', $form_data); 
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('note_saved_successfully'));
			redirect($this->input->post('r_url', TRUE));
			}
		}else{
			redirect('events/notebook/notes');
		}
	}
}

/* End of file project_home.php */