<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Padding extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('appmodel');
    }

    function index()
    {
        $this->load->module('layouts');
        $this->load->library('template');
        $this->template->title(
            lang('padding').' - '.$this->config->item('customer_name').' '.$this->config->item('version')
        );
        $data['page'] = lang('padding');
        $this->template
            ->set_layout('users')
            ->build('padding',isset($data) ? $data : NULL);
    }

    //add the padding here
    function padding_process()
    {
        $date = $this->input->post('date');
        $time_from = $this->input->post('time_from');
        $time_to = $this->input->post('time_to');
        $type = $this->input->post('type');

        $datetime_from = strtotime($date.' '.$time_from);//convert to time value.
        $datetime_to = strtotime($date.' '.$time_to);//convert to time value.

        $interval = 15;
        $count = 0;

        do {
            if($count == 0)
            {
                //this section is visited only once.
                $datetime_from = $datetime_from + (60 * 0);
                $data = array('date' => date('Y-m-d H:i:s', $datetime_from),'reservation_id' => '-1');
                if($type == 'add')
                {
                    $exists = $this->value_exists($data);
                    if(!$exists)
                    {
                        $this->appmodel->insert('slot_processing',$data);
                    }
                }
                else
                {
                    $data_delete = array('date' => date('Y-m-d H:i:s', $datetime_from));
                    $this->appmodel->delete('slot_processing',$data_delete);
                }
                ++$count;
            }
            else
            {
                //this section is visited after every time after the first loop till the end.
                $datetime_from = $datetime_from + (60 * $interval);
                $data = array('date' => date('Y-m-d H:i:s', $datetime_from),'reservation_id' => '-1');
                if($type == 'add')
                {
                    $exists = $this->value_exists($data);
                    if(!$exists)
                    {
                        $this->appmodel->insert('slot_processing',$data);
                    }
                }
                else
                {
                    $data_delete = array('date' => date('Y-m-d H:i:s', $datetime_from));
                    $this->appmodel->delete('slot_processing',$data_delete);
                }
            }
        } while($datetime_from < $datetime_to);

        echo json_encode('{}');exit;
    }

    function value_exists($data)
    {
        $result = $this->appmodel->get_all_records_simple('slot_processing',$data);
        return $result;
    }

    function reset_padding()
    {
        $data = array('reservation_id' => '-1');
        $this->appmodel->delete('slot_processing',$data);
        echo json_encode('{}');exit;
    }
}