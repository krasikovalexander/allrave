<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Flights extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('flight_model');
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

        $this->template->title(lang('flights'));
        $data['page'] = lang('flights');
        $data['datatables'] = true;
        $data['form'] = true;
        $data['flights'] = $this->flight_model->flights($this->uri->segment(4));
        $data['airline'] = $this->airline_model->getById($this->uri->segment(4));

        $this->template
            ->set_layout('users')
            ->build('flights', isset($data) ? $data : null);
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
        $this->form_validation->set_rules('path', 'Path', 'trim|required');
        $this->form_validation->set_rules('airline_id', 'Airline ID', 'required');

        if ($this->form_validation->run($this)) {
            $this->flight_model->create([
                'airline_id' => $this->form_validation->set_value('airline_id'),
                'active' => $this->input->post('active', 0),
                'path' => $this->form_validation->set_value('path'),
            ]);
        } else {
            $this->session->set_flashdata('response_status', 'error');
            $this->session->set_flashdata('message', lang('flight_creation_failed'));
            $this->session->set_flashdata('form_errors', validation_errors('<span style="color:red">', '</span><br>'));
        }
        redirect($this->input->post('r_url'));
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
            $this->form_validation->set_rules('path', 'Path', 'trim|required');
            $this->form_validation->set_rules('airline_id', 'Airline ID', 'required');

            $airline = $this->input->post('airline_id');

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('response_status', 'error');
                $this->session->set_flashdata('message', lang('operation_failed'));
                redirect('flights/'.$airline);
            } else {
                $flight = $this->input->post('flight_id');
                $data = [
                    'active' => $this->input->post('active', 0),
                    'path' => $this->form_validation->set_value('path'),
                ];
                
                $this->flight_model->updateById($flight, $data);

                $this->session->set_flashdata('response_status', 'success');
                $this->session->set_flashdata('message', lang('flight_edited_successfully'));
                redirect('flights/flights/manage/'.$airline);
            }
        } else {
            $data['flight'] = $this->flight_model->getById($this->uri->segment(4));
            $this->load->view('modal/flight/edit', $data);
        }
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
            $this->form_validation->set_rules('flight_id', 'Flight ID', 'required');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('response_status', 'error');
                $this->session->set_flashdata('message', lang('delete_failed'));
                redirect($this->input->post('r_url'));
            } else {
                $flight = $this->input->post('flight_id');

                $this->flight_model->deleteById($flight);

                $this->session->set_flashdata('response_status', 'success');
                $this->session->set_flashdata('message', lang('flight_deleted_successfully'));
                redirect($this->input->post('r_url'));
            }
        } else {
            $data['flight'] = $this->flight_model->getById($this->uri->segment(4));
            $this->load->view('modal/flight/delete', $data);
        }
    }
}
