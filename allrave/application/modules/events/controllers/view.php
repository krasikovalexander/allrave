<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('tank_auth');
		if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != ('admin' && 'collaborator')) {
			$this->session->set_flashdata('message', lang('access_denied'));
			redirect('');
		}
		$this->load->model('event_model','project');
	}
	function details()
	{		
		$this->load->module('layouts');
		$this->load->library('template');
		$this->template->title(lang('events').' - '.$this->config->item('customer_name'). ' '. $this->config->item('version'));
		$data['page'] = lang('events');
		$data['events'] = $this->project->get_all_records($table = 'events',
		$array = array(),$join_table = '',$join_criteria = '','date_created');
		$data['event_details'] = $this->project->event_details($this->uri->segment(4));
		$this->template
		->set_layout('users')
		->build('event_details',isset($data) ? $data : NULL);
	}
	function scheduling_details()
	{		
		$this->load->module('layouts');
		$this->load->library('template');
		$this->template->title(lang('admin').' - '.$this->config->item('scheduling'). ' '. $this->config->item('version'));
		$data['page'] = 'admin';
		$data['datatables'] = TRUE;
		$data['form'] = TRUE;
		$data['scheduling_details'] = $this->project->scheduling_details($this->uri->segment(4));	
		$data['scheduling_cat'] = $this->project->get_all_records($table = 'scheduling_cat',
		$array = array(),$join_table = '',$join_criteria = '','date_added');	
		$this->template
		->set_layout('users')
		->build('scheduling_details',isset($data) ? $data : NULL);
	}
	function delete_scheduling()
	{
		
		if ($this->input->post()) {
			$co_id = $this->input->post('admin', TRUE);
			$this->db->delete('scheduling', array('id' => $this->input->post('id'))); 
			//$this->db->where('co_nid',$co_id)->delete('admin'); 

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', 'Scheduling deleted Successfully');
			redirect('events/scheduling');
		}else{
			$data['id'] = $this->uri->segment(4);
			$this->load->view('modal/delete_scheduling',$data);

		}
	}
	function scheduling_update()
	{
		if ($this->input->post()) {
				$this->load->library('form_validation');
				$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
				//$this->form_validation->set_rules('event_id', 'Event Id', 'required');
				$this->form_validation->set_rules('quantity', 'Quantity', 'required');
				//$this->form_validation->set_rules('event_status', 'Event Status', 'required');
				if ($this->form_validation->run() == FALSE)
				{
						$this->session->set_flashdata('response_status', 'error');
						$this->session->set_flashdata('message', lang('error_in_form'));
						$_POST = '';
						$this->index();
						//redirect('invoices/manage/add');
				}else{	
					$customer_id = $_POST['id'];	
					$form_data = $_POST;
					$this->db->where('id',$customer_id)->update('scheduling', $form_data); 	
					$params['user'] = $this->tank_auth->get_user_id();
					$params['module'] = 'Admin';
					$params['module_field_id'] = $customer_id;
					$params['activity'] = ucfirst('Updated Scheduling '.$this->input->post('scheduling'));
					$params['icon'] = 'fa-edit';
					modules::run('activitylog/log',$params); //log activity

					$this->session->set_flashdata('response_status', 'success');
					$this->session->set_flashdata('message', 'Scheduling Updated');
					redirect('events/view/scheduling_details/'.$customer_id);
				}
		}else{
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('error_in_form'));
			redirect('events');
		}
	}
	
	
	function add()
	{
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('event_title', 'Event Title', 'required');
		$this->form_validation->set_rules('start_date', 'Start Date', 'required');
		$start_date	=	date('Y-m-d', strtotime($this->input->post('start_date')));
			$start_time	=	$this->input->post('start_time');
			$end_time	=	$this->input->post('end_time');
		$check_res=$this->db->get_where('events', array('start_time <='=> $start_time, 'end_time >='=> $end_time, 'start_date' => $start_date, 'room_name' => $this->input->post('room_name')));
		$check_rest=$this->db->get_where('events', array('start_time'=> $start_time, 'start_date' => $start_date, 'room_name' => $this->input->post('room_name')));	
		if ($check_res->num_rows() || $check_rest->num_rows() != 0) {
		$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', 'The Event has already booked, Please choose another Time');
				redirect('events/view/add/');
		}
		
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('operation_failed'));
				$_POST = '';
				$this->add('add');
		}else{
			//$_POST['assign_to'] = 	serialize($this->input->post('assign_to'));
			
			$project_id = $this->AppModel->insert('events',array(
			/* Event Details */
			//'event_code'		=>		$this->input->post('event_code'),
			'event_title'		=>		$this->input->post('event_title'),
			'type'				=>		$this->input->post('type'),		
			'event_status'		=>		$this->input->post('event_status'),
			'pax'				=>		$this->input->post('pax'),
			'customer_name'		=>		$this->input->post('customer_name'),
			'address'			=>		$this->input->post('address'),
			'telephone'			=>		$this->input->post('telephone'),
			'email'				=>		$this->input->post('email'),
			/*  Charges, Room Setup and Event Status */
			'room_name'			=>		$this->input->post('room_name'),
			'start_date'		=>		date('Y-m-d', strtotime($this->input->post('start_date'))),
			//'due_date'			=>		date('Y-m-d', strtotime($this->input->post('due_date'))),
			'start_time'		=>		$this->input->post('start_time'),
			'end_time'			=>		$this->input->post('end_time'),
			/* Service Type  */
			'service_type'		=>		implode(",",$this->input->post('service_type')),
			'service_type_price'=> 		$this->input->post('service_type_price'),
			/* Pricing */
			'venue_rental'		=> 		$this->input->post('venue_rental'),
			'catering_bayout'	=> 		$this->input->post('catering_bayout'),
			'extras'			=> 		$this->input->post('extras'),
			'state_tax'			=> 		$this->input->post('state_tax'),
			'service_charge'	=> 		$this->input->post('service_charge'),
			'security_deposit'	=> 		$this->input->post('security_deposit'),
			'grand_total'		=> 		$this->input->post('grand_total'),
			'down_payment'		=> 		$this->input->post('down_payment'),
			'total_balance'		=> 		$this->input->post('total_balance'),
			'total_payment'		=> 		$this->input->post('total_payment'),
			'monthly_ins'		=>		$this->input->post('monthly_ins'),
			'no_of_ins'			=>		$this->input->post('no_of_ins'),
			'ins_start_date'	=>		$this->input->post('ins_start_date'),
			'ins_end_date'		=>		$this->input->post('ins_end_date'),
			'event_producer'	=>		$this->input->post('event_producer'),
			'notes'				=>		$this->input->post('notes')
			));
			$estimate_data = array(
			                'reference_no' => 'EST'.random_string('nozero', 5),
			                'event_id' => $project_id,
			                'due_date' => $this->input->post('start_date'),
			                'tax' => $this->config->item('default_tax'),
			                'notes' => 'Looking forward to doing business with you.',
			            );
			$this->db->insert('estimates', $estimate_data); 
			$estimate_id = $this->db->insert_id();
			
			$other_est_items = array(
			   array(
				  'estimate_id' => $estimate_id,
			      'item_desc' => 'Venue Rental',
			      'unit_cost' => $this->input->post('venue_rental'),
			      'quantity' => '1',
			      'total_cost' => $this->input->post('venue_rental')
			   ),
			   array(
				  'estimate_id' => $estimate_id,
			      'item_desc' => 'Catering Bayout',
			      'unit_cost' => $this->input->post('catering_bayout'),
			      'quantity' => '1',
			      'total_cost' => $this->input->post('catering_bayout')
			   )
			);

			$this->db->insert_batch('estimate_items', $other_est_items); 
			$item_id = $this->db->insert_id();
			
			$exp = explode(',',$this->input->post('service_type_price'));
			$abc =	$this->input->post('service_type');
			foreach (array_combine($abc,$exp) as $st=>$stp) {			
			$estimate_items = array(
			                'estimate_id' => $estimate_id,
			                'item_desc' => $st,
			                'unit_cost' => $stp,
			                'quantity' => '1',
			                'total_cost' => $stp
			            );
			$this->db->insert('estimate_items', $estimate_items); 
			$item_id = $this->db->insert_id();
			}
			$invoice_data = array(
			                'reference_no' => 'INV'.random_string('nozero', 5),
			                'event_id' => $project_id,
			                'due_date' => $this->input->post('start_date'),
							'allow_paypal'	=>	'Yes',
							'recurring'	=>	'No',
							'currency'	=>	$this->config->item('default_currency'),
							'status'	=>	'Unpaid',
							'archived'	=>	'0',
							'inv_deleted'	=>	'No',
							'emailed'	=>	'No',
			                'tax' => $this->config->item('default_tax'),
			                'notes' => $this->config->item('default_terms'), 
			            );
			$this->db->insert('invoices', $invoice_data); 
			$invoice_id = $this->db->insert_id();
			$inv_pay = array(
			                'invoice' => $invoice_id,
			                'paid_by' => $this->user_profile->get_invoice_details($invoice_id,'event_id'),
			                'payment_method' => '1',
			                'amount' => $this->input->post('down_payment'),
			                'trans_id' => random_string('nozero', 6),
			                'notes' => '',
			                'month_paid' => date('m'),
			                'year_paid' => date('Y'),
			            );
			$this->db->insert('payments', $inv_pay); 
			
			
			
			$other_inv_items = array(
			   array(
				  'invoice_id' => $invoice_id,
			      'item_desc' => 'Venue Rental',
			      'unit_cost' => $this->input->post('venue_rental'),
			      'quantity' => '1',
			      'total_cost' => $this->input->post('venue_rental')
			   ),
			   array(
				  'invoice_id' => $invoice_id,
			      'item_desc' => 'Catering Bayout',
			      'unit_cost' => $this->input->post('catering_bayout'),
			      'quantity' => '1',
			      'total_cost' => $this->input->post('catering_bayout')
			   )
			);

			$this->db->insert_batch('items', $other_inv_items); 
			$item_id = $this->db->insert_id();	

			$exp = explode(',',$this->input->post('service_type_price'));
			$abc	=	$this->input->post('service_type');
			
			foreach (array_combine($abc,$exp) as $st=>$stp) {
			
			$invoice_items = array(
			                'invoice_id' => $invoice_id,
			                'item_desc' => $st,
			                'unit_cost' => $stp,
			                'quantity' => '1',
			                'total_cost' => $stp
			            );
			$this->db->insert('items', $invoice_items); 
			$item_id = $this->db->insert_id();
			}		
			$activity = ucfirst($this->tank_auth->get_username()).' created a event #'.$this->input->post('event_code');
			$this->_log_activity($project_id,$activity); //log activity

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('project_added_successfully'));
			redirect('events/view/details/'.$project_id);
		}
		}else{
		$this->load->module('layouts');
		$this->load->library('template');
		$this->template->title(lang('events').' - '.$this->config->item('customer_name'). ' '. $this->config->item('version'));
		$data['page'] = lang('events');
		$data['form'] = TRUE;
		$data['event_idt_details'] = $this->project->event_idt_details($this->uri->segment(4));
		$data['events'] = $this->project->get_all_records($table = 'events',
		$array = array(),$join_table = '',$join_criteria = '','date_created');
		$data['event_status'] = $this->AppModel->get_all_records($table = 'event_status',
		$array = array(
			'co_id >' => '0'),$join_table = '',$join_criteria = '','date_added');
		$data['type'] = $this->AppModel->get_all_records($table = 'admin',
		$array = array(
			'co_id >' => '0'),$join_table = '',$join_criteria = '','date_added');
		$data['rooms'] = $this->AppModel->get_all_records($table = 'rooms',
		$array = array(
			'id >' => '0'),$join_table = '',$join_criteria = '','date_added');
		$data['service_type'] = $this->AppModel->get_all_records($table = 'service_type',
		$array = array(
			'id >' => '0'),$join_table = '',$join_criteria = '','date_added');
		$data['start_date'] = $this->uri->segment(4);		
		$data['start_time'] = $this->uri->segment(5);
		$this->template
		->set_layout('users')
		->build('create_event',isset($data) ? $data : NULL);
		}
	}
	function edit()
	{
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('event_title', 'Event Title', 'required');
		$this->form_validation->set_rules('start_date', 'Start Date', 'required');
		$event_id = $this->input->post('event_id');	
		
		if ($this->form_validation->run() == FALSE)
		{
				$this->session->set_flashdata('response_status', 'error');
				$this->session->set_flashdata('message', lang('operation_failed'));
				$_POST = '';
				$this->edit($event_id);
		}else{	
			$this->db->where('event_id', $event_id)->update('events',array(
			/* Event Details */
			'event_title'		=>		$this->input->post('event_title'),
			'type'				=>		$this->input->post('type'),		
			'event_status'		=>		$this->input->post('event_status'),
			'pax'				=>		$this->input->post('pax'),
			'customer_name'		=>		$this->input->post('customer_name'),
			'address'			=>		$this->input->post('address'),
			'telephone'			=>		$this->input->post('telephone'),
			'email'				=>		$this->input->post('email'),
			/*  Charges, Room Setup and Event Status */
			'room_name'			=>		$this->input->post('room_name'),
			'start_date'		=>		date('Y-m-d', strtotime($this->input->post('start_date'))),
			//'due_date'			=>		date('Y-m-d', strtotime($this->input->post('due_date'))),
			'start_time'		=>		$this->input->post('start_time'),
			'end_time'			=>		$this->input->post('end_time'),
			/* Service Type  */
			'service_type'		=>		implode(",",$this->input->post('service_type')),
			//'service_type_price'=> 		implode(",",$this->input->post('service_type_price')),
			/* Pricing */
			'venue_rental'		=> 		$this->input->post('venue_rental'),
			'catering_bayout'	=> 		$this->input->post('catering_bayout'),
			'extras'			=> 		$this->input->post('extras'),
			'state_tax'			=> 		$this->input->post('state_tax'),
			'service_charge'	=> 		$this->input->post('service_charge'),
			'security_deposit'	=> 		$this->input->post('security_deposit'),
			'grand_total'		=> 		$this->input->post('grand_total'),
			'down_payment'		=> 		$this->input->post('down_payment'),
			'total_balance'		=> 		$this->input->post('total_balance'),
			'total_payment'		=> 		$this->input->post('total_payment'),
			'monthly_ins'		=>		$this->input->post('monthly_ins'),
			'no_of_ins'			=>		$this->input->post('no_of_ins'),
			'ins_start_date'	=>		$this->input->post('ins_start_date'),
			'ins_end_date'		=>		$this->input->post('ins_end_date'),
			'event_producer'	=>		$this->input->post('event_producer'),
			'notes'				=>		$this->input->post('notes')
			));

			$activity = ucfirst($this->tank_auth->get_username()).' edited a project #'.$this->input->post('event_code');
			$this->_log_activity($event_id,$activity); //log activity

			//if ($this->input->post('progress') == '100') {
				//$this->_project_complete($project_id);
			//}
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('project_edited_successfully'));
			redirect('events/view/edit/'.$event_id);
		}
		}else{
		$this->load->module('layouts');
		$this->load->library('template');
		$this->template->title(lang('events').' - '.$this->config->item('customer_name'). ' '. $this->config->item('version'));
		$data['page'] = lang('events');
		$data['form'] = TRUE;
		$data['event_details'] = $this->project->event_details($this->uri->segment(4));
		$data['events'] = $this->project->get_all_records($table = 'events',
		$array = array(),$join_table = '',$join_criteria = '','date_created');
		$data['event_status'] = $this->AppModel->get_all_records($table = 'event_status',
		$array = array(
			'co_id >' => '0'),$join_table = '',$join_criteria = '','date_added');
		$data['type'] = $this->AppModel->get_all_records($table = 'admin',
		$array = array(
			'co_id >' => '0'),$join_table = '',$join_criteria = '','date_added');
		$data['rooms'] = $this->AppModel->get_all_records($table = 'rooms',
		$array = array(
			'id >' => '0'),$join_table = '',$join_criteria = '','date_added');
		$data['service_type'] = $this->AppModel->get_all_records($table = 'service_type',
		$array = array(
			'id >' => '0'),$join_table = '',$join_criteria = '','date_added');	
		$this->template
		->set_layout('users')
		->build('edit_event',isset($data) ? $data : NULL);
		}
	}

	function _log_activity($project_id,$activity){
			$this->db->set('module', 'events');
			$this->db->set('module_field_id', $project_id);
			$this->db->set('user', $this->tank_auth->get_user_id());
			$this->db->set('activity', $activity);
			$this->db->set('icon', 'fa-coffee');
			$this->db->insert('activities'); 
	}
	function get_customer(){
    if (isset($_GET['term'])){
      $q = strtolower($_GET['term']);
      $this->project->get_customer($q);
      }
    }
    function get_hall(){
    if (isset($_GET['term'])){
      $q = strtolower($_GET['term']);
      $this->project->get_hall($q);
      }
    }
}

/* End of file view.php */
