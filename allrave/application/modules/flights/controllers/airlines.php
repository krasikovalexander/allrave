<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Airlines extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('airline_model');
    }

    public function manage()
    {
        $this->load->library('tank_auth');
        if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != 'admin') {
            $this->session->set_flashdata('response_status', 'error');
            $this->session->set_flashdata('message', lang('access_denied'));
            redirect('');
        }
        $this->load->module('layouts');
        $this->load->library('template');

        $this->template->title(lang('airlines'));
        $data['page'] = lang('airlines');
        $data['datatables'] = true;
        $data['form'] = true;
        $data['airlines'] = $this->airline_model->airlines();
        $this->template
            ->set_layout('users')
            ->build('airlines', isset($data) ? $data : null);
    }

    public function create()
    {
        $this->load->library('tank_auth');
        if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != 'admin') {
            $this->session->set_flashdata('response_status', 'error');
            $this->session->set_flashdata('message', lang('access_denied'));
            redirect('');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|alpha_numeric_spaces');

        if ($this->form_validation->run($this)) {
            if ($_FILES['logo']['size'] > 0) {
                $upload_dir = BASEPATH.'../resource/airline/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir);
                }
                    
                $config['upload_path']   = $upload_dir;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['file_name']     = substr(md5(rand()), 0, 7);
                $config['overwrite']     = false;
                $config['max_size']         = '5120';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('logo')) {
                    $upload_data = $this->upload->data();

                    $this->airline_model->create([
                            'name' => $this->form_validation->set_value('name'),
                            'logo' => $upload_data['file_name'],
                            'active' => $this->input->post('active', 0)
                        ]);
                } else {
                    $this->form_validation->add_to_error_array('logo', $this->upload->display_errors('', ''));
                    $this->session->set_flashdata('response_status', 'error');
                    $this->session->set_flashdata('message', lang('airline_creation_failed'));
                    $this->session->set_flashdata('form_errors', validation_errors('<span style="color:red">', '</span><br>'));
                }
            }
        } else {
            $this->session->set_flashdata('response_status', 'error');
            $this->session->set_flashdata('message', lang('airline_creation_failed'));
            $this->session->set_flashdata('form_errors', validation_errors('<span style="color:red">', '</span><br>'));
        }
        redirect($this->input->post('r_url'));
    }

    public function delete()
    {
        $this->load->library('tank_auth');
        if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != 'admin') {
            $this->session->set_flashdata('response_status', 'error');
            $this->session->set_flashdata('message', lang('access_denied'));
            redirect('');
        }
            
        if ($this->input->post()) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('airline_id', 'Airline ID', 'required');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('response_status', 'error');
                $this->session->set_flashdata('message', lang('delete_failed'));
                $this->input->post('r_url');
            } else {
                $airline = $this->input->post('airline_id');

                $this->airline_model->deleteById($airline);

                $params['user'] = $this->tank_auth->get_user_id();
                $params['module'] = 'Airlines';
                $params['module_field_id'] = $airline;
                $params['activity'] = ucfirst('Deleted Airline');
                $params['icon'] = 'fa-trash-o';
                modules::run('activitylog/log', $params);

                $this->session->set_flashdata('response_status', 'success');
                $this->session->set_flashdata('message', lang('airline_deleted_successfully'));
                redirect($this->input->post('r_url'));
            }
        } else {
            $data['airline_id'] = $this->uri->segment(4);
            $this->load->view('modal/airline/delete', $data);
        }
    }

    public function update()
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
            $this->form_validation->set_rules('airline_id', 'Airline ID', 'required');

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('response_status', 'error');
                $this->session->set_flashdata('message', lang('operation_failed'));
                redirect('flights/airlines/manage');
            } else {
                $airline = $this->input->post('airline_id');
                $data = [
                    'name' => $this->form_validation->set_value('name'),
                    'active' => $this->input->post('active', 0),
                ];

                if ($_FILES['logo']['size'] > 0) {
                    $upload_dir = BASEPATH.'../resource/airline/';
                    if (!is_dir($upload_dir)) {
                        mkdir($upload_dir);
                    }
                    
                    $config['upload_path']   = $upload_dir;
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['file_name']     = substr(md5(rand()), 0, 7);
                    $config['overwrite']     = false;
                    $config['max_size']         = '5120';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('logo')) {
                        $upload_data = $this->upload->data();
                        $data['logo'] = $upload_data['file_name'];
                    } else {
                        $this->form_validation->add_to_error_array('logo', $this->upload->display_errors('', ''));
                        $this->session->set_flashdata('response_status', 'error');
                        $this->session->set_flashdata('message', lang('operation_failed'));
                        $this->session->set_flashdata('form_errors', validation_errors('<span style="color:red">', '</span><br>'));
                        redirect('flights/airlines/manage');
                    }
                }

                $this->airline_model->updateById($airline, $data);

                $params['user'] = $this->tank_auth->get_user_id();
                $params['module'] = 'airlines';
                $params['module_field_id'] = $airline;
                $params['activity'] = ucfirst('Updated airline : '.$this->input->post('name'));
                $params['icon'] = 'fa-edit';
                modules::run('activitylog/log', $params);
                $this->session->set_flashdata('response_status', 'success');
                $this->session->set_flashdata('message', lang('airline_edited_successfully'));
                redirect('flights/airlines/manage');
            }
        } else {
            $data['airline'] = $this->airline_model->getById($this->uri->segment(4));
            $this->load->view('modal/airline/edit', $data);
        }
    }
}
