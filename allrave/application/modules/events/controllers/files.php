<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Files extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('tank_auth');
        if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != ('admin' && 'collaborator')) {
            $this->session->set_flashdata('message', lang('access_denied'));
            redirect('');
        }
        $this->load->model('event_model', 'project');
    }

    function index()
    {
        $this->load->module('layouts');
        $this->load->library('template');
        $data['project_files'] = $this->project->project_files($this->uri->segment(4));
        $data['event_id'] = $this->uri->segment(4);
        $this->template
            ->set_layout('users')
            ->build('tabs/files', isset($data) ? $data : null);
    }

    function add()
    {
        $this->load->module('layouts');
        $this->load->library('template');
        if ($this->input->post()) {
            $project = $this->input->post('project', true);
            $description = $this->input->post('description', true);

            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<span style="color:red">', '</span><br>');
            $this->form_validation->set_rules('description', 'Description', 'required');

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('response_status', 'error');
                $this->session->set_flashdata('message', lang('error_in_form'));
                redirect('events/view/details/'.$project);
            } else {
                $config['upload_path'] = './resource/project-files/';
                $config['allowed_types'] = $this->config->item('allowed_files');
                $config['max_size'] = $this->config->item('file_max_size');
                $config['file_name'] = 'EVENT-'.$this->input->post('event_code', true).'-0';
                $config['overwrite'] = false;
                //$config['encrypt_name'] = $this->config->item('encrypt_file_name');

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload()) {
                    $this->session->set_flashdata('response_status', 'error');
                    $this->session->set_flashdata('message', $this->lang->line('operation_failed'));
                    redirect('events/files/index/'.$project);
                } else {
                    if (!$this->upload->do_upload()) {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $file_id = $this->project->insert_file($data['file_name'], $project, $description);
                        $filelink = '<a href="'.base_url(
                            ).'resource/project-files/'.$data['file_name'].'" target="_blank">'.$data['file_name'].'</a>';

                        //$activity = ucfirst($this->tank_auth->get_username())." added a file ".$filelink;
                        //$this->_log_activity($project,$activity,$icon='fa-file'); //log activity
                        //$this->_upload_notification($event);
                        $this->session->set_flashdata('response_status', 'success');
                        $this->session->set_flashdata('message', 'File Uploaded Successfully');
                        redirect('events/files/index/'.$project);
                    }
                }
            }
        }
        else{
                $event = $this->uri->segment(4) / 1200;
                $event_details = $this->project->event_details($event);
                foreach ($event_details as $key => $p) {
                    $event_code = $p->event_code;
                    $project = $p->event_id;
                }
                $data['event_code'] = $event_code;
                $data['project'] = $project;
                $this->template
                    ->set_layout('users')
                    ->build('modal/add_file', isset($data) ? $data : null);
                //$this->load->view('modal/add_file',isset($data) ? $data : NULL);
            }
        }
        function download()
        {
            $this->load->helper('download');
            $file_id = $this->uri->segment(4) / 1800;
            $event_id = $this->uri->segment(5) / 1200;
            if ($this->project->get_file($file_id)) {
                $file = $this->project->get_file($file_id);
                if (file_exists('./resource/project-files/'.$file->file_name)) {
                    $data = file_get_contents('./resource/project-files/'.$file->file_name); // Read the file's contents
                    force_download($file->file_name, $data);
                } else {
                    $this->session->set_flashdata('message', $this->lang->line('operation_failed'));
                    redirect('events/view/details/'.$event_id);
                }
            } else {
                $this->session->set_flashdata('message', $this->lang->line('operation_failed'));
                redirect('events/view/details/'.$event_id);
            }
        }

        function delete()
        {
            if ($this->input->post()) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('file_id', 'File ID', 'required');
                //$this->form_validation->set_rules('project', 'Event ID', 'required');
                $event_id = $this->input->post('event_id', true);
                $file_id = $this->input->post('file_id', true);

                if ($this->form_validation->run() == false) {
                    $this->session->set_flashdata('response_status', 'error');
                    $this->session->set_flashdata('message', lang('delete_failed'));
                    redirect('events/files/index/'.$event_id);
                } else {
                    $file = $this->project->get_file($file_id);
                    unlink('./resource/project-files/'.$file_id->file_name);
                    $this->db->delete('files', array('file_id' => $event_id));

                    $activity = ucfirst($this->tank_auth->get_username())." deleted a file ".$file_id->file_name;
                    //$this->_log_activity($event_id,$activity,$icon='fa-times'); //log activity

                    $this->session->set_flashdata('response_status', 'success');
                    $this->session->set_flashdata('message', lang('file_deleted'));
                    redirect('events/files/index/'.$event_id);
                }
            } else {
                $data['file_id'] = $this->uri->segment(4) / 1800;
                $data['event_id'] = $this->uri->segment(5) / 1200;
                $this->load->view('modal/delete_file', $data);
            }
        }

        function _upload_notification($event)
        {
            $event_title = $this->user_profile->get_events($event, 'event_title');
            //$assigned_to = $this->user_profile->get_events($project,'assign_to');

            $upload_user = $this->user_profile->get_user_details($this->tank_auth->get_user_id(), 'username');
            $data['event_title'] = $event_title;
            $data['upload_user'] = $upload_user;

            if (!empty($assigned_to)) {
                foreach (unserialize($assigned_to) as $value) {

                    $params['recipient'] = $this->user_profile->get_user_details($value, 'email');

                    $params['subject'] = '[ '.$this->config->item('customer_name').' ]'.' New File Uploaded';
                    $params['message'] = $this->load->view('email/upload_notification', $data, true);

                    $params['attached_file'] = '';

                    modules::run('fomailer/send_email', $params);
                }
            }
        }

        function _log_activity($event_id, $activity, $icon)
        {
            $this->db->set('module', 'events');
            $this->db->set('module_field_id', $event_id);
            $this->db->set('user', $this->tank_auth->get_user_id());
            $this->db->set('activity', $activity);
            $this->db->set('icon', $icon);
            $this->db->insert('activities');
        }
    }

/* End of file files.php */
