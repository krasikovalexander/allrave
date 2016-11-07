<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Places extends MX_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('place_model');
        $this->load->model('appmodel');
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
        $this->template->title(lang('places'));

        $data['page'] = lang('places');
        $data['datatables'] = TRUE;
        $data['form'] = TRUE;
        $data['places'] = $this->place_model->places();
        $this->template
            ->set_layout('users')
            ->build('places', isset($data) ? $data : NULL);
    }


    function create() {
        $this->load->library('tank_auth');
        if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != 'admin') {
            $this->session->set_flashdata('response_status', 'error');
            $this->session->set_flashdata('message', lang('access_denied'));
            redirect('');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Title', 'trim|required|xss_clean|alpha_numeric_spaces');
        $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
        $this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
        $this->form_validation->set_rules('zip', 'State', 'trim|required|xss_clean');
        $this->form_validation->set_rules('state', 'Zip', 'trim|required|xss_clean');

        if ($this->form_validation->run($this)) {   
            $this->place_model->create([
                'name' => $this->form_validation->set_value('name'),
                'address' => $this->form_validation->set_value('address'),
                'city' => $this->form_validation->set_value('city'),
                'state' => $this->form_validation->set_value('state'),
                'zip' => $this->form_validation->set_value('zip'),
            ]);
        } else {
            $this->session->set_flashdata('response_status', 'error');
            $this->session->set_flashdata('message', lang('place_creation_failed'));
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
            $this->form_validation->set_rules('place_id', 'Place ID', 'required');
            if ($this->form_validation->run() == FALSE)
            {
                    $this->session->set_flashdata('response_status', 'error');
                    $this->session->set_flashdata('message', lang('delete_failed'));
                    $this->input->post('r_url');
            }else{  
                $place = $this->input->post('place_id');

                $this->place_model->deleteById($place);

                $params['user'] = $this->tank_auth->get_user_id();
                $params['module'] = 'Places';
                $params['module_field_id'] = $place;
                $params['activity'] = ucfirst('Deleted Place');
                $params['icon'] = 'fa-trash-o';
                modules::run('activitylog/log',$params);

                $this->session->set_flashdata('response_status', 'success');
                $this->session->set_flashdata('message', lang('place_deleted_successfully'));
                redirect($this->input->post('r_url'));
            }
        }else{
            $data['place_id'] = $this->uri->segment(3);
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
            $this->form_validation->set_rules('name', 'Title', 'trim|required|xss_clean|alpha_numeric_spaces');
            $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
            $this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
            $this->form_validation->set_rules('zip', 'State', 'trim|required|xss_clean');
            $this->form_validation->set_rules('state', 'Zip', 'trim|required|xss_clean');
            $this->form_validation->set_rules('place_id', 'Place ID', 'required');

            if ($this->form_validation->run() == FALSE)
            {
                    $this->session->set_flashdata('response_status', 'error');
                    $this->session->set_flashdata('message', lang('operation_failed'));
                    redirect('places/manage');
            }else{  
                $place = $this->input->post('place_id');
                $data = [
                    'name' => $this->form_validation->set_value('name'),
                    'address' => $this->form_validation->set_value('address'),
                    'city' => $this->form_validation->set_value('city'),
                    'state' => $this->form_validation->set_value('state'),
                    'zip' => $this->form_validation->set_value('zip')
                ];

                $this->place_model->updateById($place, $data);

                $params['user'] = $this->tank_auth->get_user_id();
                $params['module'] = 'Places';
                $params['module_field_id'] = $place;
                $params['activity'] = ucfirst('Updated Place : '.$this->input->post('name'));
                $params['icon'] = 'fa-edit';
                modules::run('activitylog/log',$params);
                $this->session->set_flashdata('response_status', 'success');
                $this->session->set_flashdata('message', lang('place_edited_successfully'));
                redirect('places/manage');
            }
        }else{
            $data['place'] = $this->place_model->getById($this->uri->segment(3));
            $this->load->view('modal/edit', $data);
        }
    }
}