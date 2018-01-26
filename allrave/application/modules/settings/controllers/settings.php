<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings extends MX_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('tank_auth');
		if (!$this->tank_auth->is_logged_in()) {
            $this->session->set_flashdata('message',lang('login_required'));
            redirect('auth/login');
        }

		if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != 'admin') {
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('access_denied'));
			redirect('');
		}
		$this->load->model('settings_model');
	}

	public function oauth()
    {
        require_once 'google-api-php-client-master/vendor/autoload.php';
        try {
            $client = new Google_Client();
            $client->setAuthConfig('client-secret.json');
            $client->setAccessType("offline");
            $client->setIncludeGrantedScopes(true);
            $client->addScope(Google_Service_Calendar::CALENDAR);
            $client->setApprovalPrompt('force');
            $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/allrave/settings/oauth');

            if (! isset($_GET['code'])) {
                $auth_url = $client->createAuthUrl();
                header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
            } else {
                $client->authenticate($_GET['code']);
                $access_token = $client->getAccessToken();
                $refresh_token = $client->getRefreshToken();
                file_put_contents('access-token.json', json_encode($access_token));
                file_put_contents('refresh-token.txt', $refresh_token);

                $rule = new Google_Service_Calendar_AclRule();
		        $scope = new Google_Service_Calendar_AclRuleScope();

		        $scope->setType("user");
		        $scope->setValue("610allrave@gmail.com");
		        $rule->setScope($scope);
		        $rule->setRole("owner");
				
				$service = new Google_Service_Calendar($client);
		        $service->acl->insert('primary', $rule);

                $this->session->set_flashdata('message', 'Permissons granted successfully!');
                redirect('');
            }
        } catch (Exception $e) {
            file_put_contents('exceptions.log', $e->getMessage(), FILE_APPEND);
            echo $e->getMessage();
        }
    }

	function update()
	{
		if ($this->input->post()) {
			if ($this->uri->segment(3) == 'general') {
				$this->_update_general_settings('general');
			}else{
				$this->_update_system_settings('system');
			}

		}else{
			$this->load->module('layouts');
			$this->load->library('template');
			$data['form'] = TRUE;
			$this->template->title(lang('settings').' - '.$this->config->item('customer_name'). ' '. $this->config->item('version'));			
			if($this->uri->segment(3) == 'general'){
				$data['page'] = lang('general_settings');
				$setting = 'general';
			}else {
				$data['page'] = lang('system_settings');
				$setting = 'system';
			}

			$this->template
			->set_layout('users')
			->build($setting,isset($data) ? $data : NULL);
		}
	}
	private function _update_general_settings($setting){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('customer_name', 'Customer Name', 'required');
		$this->form_validation->set_rules('customer_address', 'Customer Address', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('settings_update_failed'));
			redirect('settings/update/'.$setting);
		}else{
			foreach ($_POST as $key => $value) {
				$data = array('value' => $value); 
				$this->db->where('config_key', $key)->update('config', $data); 
			}
			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('settings_updated_successfully'));
			redirect('settings/update/'.$setting);
		}
		
	}
	private function _update_system_settings($setting){
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('base_url', 'Base URL', 'required');
		$this->form_validation->set_rules('file_max_size', 'File Max Size', 'required');		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('settings_update_failed'));
			$_POST = '';
			$this->update('system');
		}else{
		foreach ($_POST as $key => $value) {
				$data = array('value' => $value); 
				$this->db->where('config_key', $key)->update('config', $data); 
			}

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('settings_updated_successfully'));
			redirect('settings/update/'.$setting);
		}
		
	}

	function update_email_templates(){
		if ($this->input->post()) {
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
		$this->form_validation->set_rules('email_estimate_message', 'Estimate Message', 'required');
		$this->form_validation->set_rules('email_invoice_message', 'Invoice Message', 'required');	
		$this->form_validation->set_rules('reminder_message', 'Reminder Message', 'required');	
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('settings_update_failed'));
			$_POST = '';
			$this->update('email');
		}else{
			foreach ($_POST as $key => $value) {
				$data = array('value' => $value); 
				$this->db->where('config_key', $key)->update('config', $data); 
			}

			$this->session->set_flashdata('response_status', 'success');
			$this->session->set_flashdata('message', lang('settings_updated_successfully'));
			redirect('settings/update/email');
		}
	}else{
			$this->session->set_flashdata('response_status', 'error');
			$this->session->set_flashdata('message', lang('settings_update_failed'));
			redirect('settings/update/email');
	}
		
	}
	function upload_logo(){
		if ($_FILES['userfile'] != "") {
				$config['upload_path']   = './resource/images/';
            			$config['allowed_types'] = 'jpg|jpeg|png';
            			$config['max_width']  = '300';
            			$config['max_height']  = '300';
            			$config['remove_spaces'] = TRUE;
            			$config['file_name']  = 'logo';
            			$config['overwrite']  = TRUE;
            			$config['max_size']      = '300';
            			$this->load->library('upload', $config);
						if ($this->upload->do_upload())
						{
							$data = $this->upload->data();
							$file_name = $data['file_name'];
							$data = array(
								'value' => $file_name);
							$this->db->where('config_key', 'customer_logo')->update('config', $data); 
							$this->session->set_flashdata('response_status', 'success');
							$this->session->set_flashdata('message', lang('logo_changed'));
							redirect('settings/update/general');
						}else{
							$this->session->set_flashdata('response_status', 'error');
							$this->session->set_flashdata('message', lang('logo_upload_error'));
							redirect('settings/update/general');
						}
			}else{
							$this->session->set_flashdata('response_status', 'error');
							$this->session->set_flashdata('message', lang('file_upload_failed'));
							redirect('settings/update/general');
			}
	}

	function database()
	{
		$this->load->dbutil();
		$prefs = array(
                'format'      => 'txt',             // gzip, zip, txt
                'filename'    => 'latest.sql',    // File name - NEEDED ONLY WITH ZIP FILES
                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
              );
			$backup =& $this->dbutil->backup($prefs);
			$this->load->helper('file');
			write_file('resource/database.backup/latest-freelancerbackup.sql', $backup); 
			$this->load->helper('download');
			force_download('latest-freelancerbackup.sql', $backup);
	}
	
}

/* End of file settings.php */
