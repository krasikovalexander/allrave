<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Hotels extends MX_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('hotel_model');
	}

	function index(){

		if ($this->input->post()) {
			//TODO: update chain counters
			$emails = $this->hotel_model->getEmailsByStateAndChains($this->input->post('state'), $this->input->post('hotels'));
			if (count($emails)) {
				$this->load->library('email');
        		
        		$data = $this->input->post();
				$from = "RaveHotelRequest@allravetransportation.com";

				$subject = "Availability Request";
				foreach ($emails as $email) {
					$to = $email->email;
					
					$this->email->clear();
					$this->email->from($from, 'All Rave Transportation');
			        $this->email->to($to);
			        $this->email->subject($subject);

			        $message = $this->load->view('request', $data, TRUE);

			        $this->email->message($message);
			        $this->email->set_header('Message-ID', $messageId = "<".time()."-".md5("$from:$to:".microtime())."@allravetransportation.com>");

			        if($this->email->send())
			        {
			            $this->hotel_model->addRequest($this->input->post('email'), $to, $messageId, $email->hotel_id);
			        }
				}

				echo lang('request_sent');
				return;
			}
		}
		$data['hotels'] = $this->hotel_model->hotels();
		$this->load->view('index', $data);
	}

	function manage() {
		$this->load->library('tank_auth');
		if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != 'admin') {
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('access_denied'));
			redirect('');
		}
		$this->load->module('layouts');
		$this->load->library('template');

		$this->template->title(lang('hotels'));
		$data['page'] = lang('hotels');
		$data['datatables'] = TRUE;
		$data['form'] = TRUE;
		$data['hotels'] = $this->hotel_model->hotels();
		$this->template
			->set_layout('users')
			->build('hotels', isset($data) ? $data : NULL);
	}

	function create() {
		$this->load->library('tank_auth');
		if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != 'admin') {
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('access_denied'));
			redirect('');
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|alpha_numeric_spaces');

		if ($this->form_validation->run($this)) {	

	            if($_FILES['logo']['size'] > 0)
	            {

	                $upload_dir = BASEPATH.'../resource/hotel/';
					if (!is_dir($upload_dir)) {
					    mkdir($upload_dir);
					}	
					
					$config['upload_path']   = $upload_dir;
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['file_name']     = substr(md5(rand()),0,7);
					$config['overwrite']     = false;
					$config['max_size']	     = '5120';

					$this->load->library('upload', $config);

	                if ($this->upload->do_upload('logo'))
	                {

	                    $upload_data = $this->upload->data();

	                    $this->hotel_model->create([
							'name' => $this->form_validation->set_value('name'),
							'logo' => $upload_data['file_name']
						]);
	                }
	                else
	                {
	                    $this->form_validation->add_to_error_array('logo', $this->upload->display_errors('', ''));
	                    $this->session->set_flashdata('response_status', 'error');
						$this->session->set_flashdata('message', lang('hotel_creation_failed'));
						$this->session->set_flashdata('form_errors', validation_errors('<span style="color:red">', '</span><br>'));
	                }
	            }
		} else {
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('hotel_creation_failed'));
			$this->session->set_flashdata('form_errors', validation_errors('<span style="color:red">', '</span><br>'));
		}
		redirect($this->input->post('r_url'));
	}

	function delete()
	{
		$this->load->library('tank_auth');
		if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != 'admin') {
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('access_denied'));
			redirect('');
		}
			
		if ($this->input->post()) {
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('hotel_id', 'Hotel ID', 'required');
			if ($this->form_validation->run() == FALSE)
			{
					$this->session->set_flashdata('response_status', 'error');
					$this->session->set_flashdata('message', lang('delete_failed'));
					$this->input->post('r_url');
			}else{	
				$hotel = $this->input->post('hotel_id');

				$this->hotel_model->deleteById($hotel);

				$params['user'] = $this->tank_auth->get_user_id();
				$params['module'] = 'Hotels';
				$params['module_field_id'] = $hotel;
				$params['activity'] = ucfirst('Deleted Hotel');
				$params['icon'] = 'fa-trash-o';
				modules::run('activitylog/log',$params);

				$this->session->set_flashdata('response_status', 'success');
				$this->session->set_flashdata('message', lang('hotel_deleted_successfully'));
				redirect($this->input->post('r_url'));
			}
		}else{
			$data['hotel_id'] = $this->uri->segment(3);
			$this->load->view('modal/delete', $data);
		}
	}

	function update()
	{
		$this->load->library('tank_auth');
		if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != 'admin') {
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('access_denied'));
			redirect('');
		}
		if ($this->input->post()) {
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
			$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|alpha_numeric_spaces');
			$this->form_validation->set_rules('hotel_id', 'Hotel ID', 'required');

			if ($this->form_validation->run() == FALSE)
			{
					$this->session->set_flashdata('response_status', 'error');
					$this->session->set_flashdata('message', lang('operation_failed'));
					redirect('hotels/manage');
			}else{	
				$hotel = $this->input->post('hotel_id');
				$data = ['name' => $this->form_validation->set_value('name')];

				if($_FILES['logo']['size'] > 0)
	            {
	                $upload_dir = BASEPATH.'../resource/hotel/';
					if (!is_dir($upload_dir)) {
					    mkdir($upload_dir);
					}	
					
					$config['upload_path']   = $upload_dir;
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['file_name']     = substr(md5(rand()),0,7);
					$config['overwrite']     = false;
					$config['max_size']	     = '5120';

					$this->load->library('upload', $config);

	                if ($this->upload->do_upload('logo'))
	                {
	                    $upload_data = $this->upload->data();
	                    $data['logo'] = $upload_data['file_name'];
	                }
	                else
	                {
	                    $this->form_validation->add_to_error_array('logo', $this->upload->display_errors('', ''));
	                    $this->session->set_flashdata('response_status', 'error');
						$this->session->set_flashdata('message', lang('operation_failed'));
						$this->session->set_flashdata('form_errors', validation_errors('<span style="color:red">', '</span><br>'));
						redirect('hotels/manage');
	                }
	            }

	            $this->hotel_model->updateById($hotel, $data);

				$params['user'] = $this->tank_auth->get_user_id();
				$params['module'] = 'Hotels';
				$params['module_field_id'] = $hotel;
				$params['activity'] = ucfirst('Updated Hotel : '.$this->input->post('name'));
				$params['icon'] = 'fa-edit';
				modules::run('activitylog/log',$params);
				$this->session->set_flashdata('response_status', 'success');
				$this->session->set_flashdata('message', lang('hotel_edited_successfully'));
				redirect('hotels/manage');
			}
		}else{
			$data['hotel'] = $this->hotel_model->getById($this->uri->segment(3));
			$this->load->view('modal/edit', $data);
		}
	}

	function emails() {
		$this->load->library('tank_auth');
		if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != 'admin') {
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('access_denied'));
			redirect('');
		}
		$this->load->module('layouts');
		$this->load->library('template');

		$this->template->title(lang('hotel_emails'));
		$data['page'] = lang('hotels');
		$data['datatables'] = TRUE;
		$data['form'] = TRUE;
		$data['emails'] = $this->hotel_model->emails($this->uri->segment(3));
		$data['hotel'] = $this->hotel_model->getById($this->uri->segment(3));

		$this->template
			->set_layout('users')
			->build('emails', isset($data) ? $data : NULL);
	}


	function createemail() {
		$this->load->library('tank_auth');
		if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != 'admin') {
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('access_denied'));
			redirect('');
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('state', 'State', 'trim|required|in_list[iowa,illinois,all]');
		$this->form_validation->set_rules('hotel_id', 'Hotel ID', 'required');

		if ($this->form_validation->run($this)) {	
            $this->hotel_model->addEmail([
            	'hotel_id' => $this->form_validation->set_value('hotel_id'),
				'email' => $this->form_validation->set_value('email'),
				'state' => $this->form_validation->set_value('state'),
			]);
		} else {
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('hotel_email_creation_failed'));
			$this->session->set_flashdata('form_errors', validation_errors('<span style="color:red">', '</span><br>'));
		}
		redirect($this->input->post('r_url'));
	}

	function updateemail()
	{
		$this->load->library('tank_auth');
		if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != 'admin') {
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('access_denied'));
			redirect('');
		}

		if ($this->input->post()) {
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
			$this->form_validation->set_rules('state', 'State', 'trim|required|in_list[iowa,illinois,all]');

			$hotel = $this->input->post('hotel_id');

			if ($this->form_validation->run() == FALSE)
			{
					$this->session->set_flashdata('response_status', 'error');
					$this->session->set_flashdata('message', lang('operation_failed'));
					redirect('hotels/emails/'.$hotel);
			}else{	
				$email = $this->input->post('email_id');
				$data = [
					'email' => $this->form_validation->set_value('email'),
					'state' => $this->form_validation->set_value('state'),
				];
				
	            $this->hotel_model->updateEmailById($email, $data);

				$this->session->set_flashdata('response_status', 'success');
				$this->session->set_flashdata('message', lang('hotel_email_edited_successfully'));
				redirect('hotels/emails/'.$hotel);
			}
		}else{
			$data['email'] = $this->hotel_model->getEmailById($this->uri->segment(3));
			$this->load->view('modal/editemail', $data);
		}
	}

	function deleteemail()
	{
		$this->load->library('tank_auth');
		if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != 'admin') {
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('access_denied'));
			redirect('');
		}
			
		if ($this->input->post()) {
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email_id', 'Email ID', 'required');
			if ($this->form_validation->run() == FALSE)
			{
					$this->session->set_flashdata('response_status', 'error');
					$this->session->set_flashdata('message', lang('delete_failed'));
					$this->input->post('r_url');
			}else{	
				$email = $this->input->post('email_id');

				$this->hotel_model->deleteEmailById($email);

				$this->session->set_flashdata('response_status', 'success');
				$this->session->set_flashdata('message', lang('hotel_email_deleted_successfully'));
				redirect($this->input->post('r_url'));
			}
		}else{
			$data['email'] = $this->hotel_model->getEmailById($this->uri->segment(3));
			$this->load->view('modal/deleteemail', $data);
		}
	}

	public function checkmail() {
		if(!$this->input->is_cli_request()) {
			//return;
		}

    	$this->load->library('email');
    	$this->load->model('hotel_model');

		try{
			//TODO: dreamhost mail issue - Can't create mailbox
			/*if ($this->email->status_mailbox("Unknown") === false) {
				$this->email->create_mailbox("Unknown");
			}
			if ($this->email->status_mailbox("Responses") === false) {
				$this->email->create_mailbox("Responses");
			}*/
			$inbox = $this->email->check_mailbox();

			$messages = $this->email->overview("1:$inbox->Nmsgs");
			if ($messages) {
				$responses = [];
				$unknown   = [];
				$inline = 0;

				foreach ($messages as $number => $message) {
					if (isset($message->in_reply_to)) {
     					$request = $this->hotel_model->getRequestByHash($message->in_reply_to);
						if ($request) {
							$parts = $this->email->parse($number+1);
							$this->email->clear(true);
							$this->email->from("RaveHotelRequest@allravetransportation.com", 'All Rave Transportation');
					        $this->email->to($request->from);
					        $this->email->subject('Re: Hotels Availability Request');
					       	
					       	$body = $parts['html']?:$parts['text'];
					        if (count($parts['attachments'])) {
					        	$this->load->helper('url');
					        	foreach ($parts['attachments'] as $attach) {
					        		//if ($attach['disposition'] == 'inline') {
					        		//	$hash = str_replace(["<",">","@allravetransportation.com"], '', $message->in_reply_to);
					        		//	$upload_dir = BASEPATH."../resource/attachments/$hash/";
									//	if (!is_dir($upload_dir)) {
									//	    mkdir($upload_dir);
									//	}	
					        		//	$filename = $upload_dir.$attach['filename'];
					        		//	$url = base_url("resource/attachments/$hash/".$attach['filename']);
					        		//	if (isset($matches[1][$inline])) {
					        		//		$body = str_replace( str_replace(["<",">"], '', $attach['id']), $url, $body);
					        		//		$inline++;
					        		//	}
					        		//} else {
					        			$filename = '/tmp/'.$attach['filename'];
					        		//}
					        		//echo $filename;
					        		file_put_contents($filename, $attach['content']);
					        		$this->email->attachWithId($filename, $attach['disposition'], $attach['id']);
					        	}
					        }
					        //print_r($body);
					        $this->email->message($body);
					        $this->email->send();
					        if (count($parts['attachments'])) {
					        	foreach ($parts['attachments'] as $attach) {
					        		if ($attach['disposition'] != 'inline') {
					        			unlink('/tmp/'.$attach['filename']);
					        		}
					        	}
					        }
					        $responses[] = $number+1;
						}
					} else {
						$unknown[] = $number+1;
					}
				}
				if (!empty($responses)) {
					$this->email->move($responses, 'INBOX.Responses');
				}
				if (!empty($unknown)) {
					$this->email->move($unknown, 'INBOX.Unknown');
				}
				if (!empty($responses) || !empty($unknown)) {
					$this->email->expunge_deleted_mails();
				}	
			}
		} catch (Exception $e) {
			var_dump($e);
		}
	
	}

}