<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vehicles extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('appmodel');
        $this->load->helper(array('form', 'url'));
    }

    function view_vehicles()
    {
        $this->load->module('layouts');
        $this->load->library('template');
        $this->template->title(
            lang('vehicles').' - '.$this->config->item('customer_name').' '.$this->config->item('version')
        );
        $data['page'] = lang('vehicles');
        $data['vehicles'] = $this->appmodel->get_all_records_simple('vehicles');
        $data['message'] = $this->session->flashdata('message');
	    $data['upload_error'] = $this->session->flashdata('upload_error');
        $this->template
            ->set_layout('users')
            ->build('vehicles',isset($data) ? $data : NULL);
    }

    function add_vehicle()
    {
        $name = trim($this->input->post('vehicle_name'));
        $number = trim($this->input->post('vehicle_number'));
        $type = trim($this->input->post('type'));

        if(($_FILES['userfile']['size'] > 0))
        {
            $filename = $_FILES['userfile']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
	   
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '1000';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';
            $config['file_name']  = $name.$number;
            $vehicle_image = $config['file_name'].'.'.$ext;
            $this->load->library('upload', $config);
            $this->upload->do_upload();
	    $this->session->set_flashdata('upload_error', $this->upload->display_errors());
        }
        else
        {
            $vehicle_image = '';
        }
            if($type == 'insert')
            {
                $this->appmodel->insert('vehicles',array('vehicle_name' => $name, 'vehicle_number' => $number,'image' => $vehicle_image));
                $this->session->set_flashdata('message', 'The vehicle has been added');
            }
            elseif($type == 'update')
            {
                $vehicle_id = trim($this->input->post('vehicle_id'));
                $this->appmodel->update('vehicles',array('vehicle_name' => $name, 'vehicle_number' => $number,'image' => $vehicle_image),array('id' => $vehicle_id));
                $this->session->set_flashdata('message', 'The vehicle has been updated');
            }

            redirect('vehicles/view_vehicles');

    }

    function get_vehicle()
    {
        $id = $this->input->post('id');
        $vehicle = $this->appmodel->get_all_records_simple('vehicles',array('id' => $id));
        echo json_encode($vehicle);
        exit;
    }

    function delete_vehicle()
    {
        $id = $this->input->post('id');
        $delete = $this->appmodel->delete('vehicles',array('id' => $id));
        echo '';
        exit;
    }
}
