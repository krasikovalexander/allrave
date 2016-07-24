<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Events extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('tank_auth');
        $this->load->model('appmodel');

        session_start();

        //if (!$this->tank_auth->is_logged_in() && $_SESSION['user_type'] == "") {
        if (!$this->tank_auth->is_logged_in()) {
            $this->session->set_flashdata('message',lang('login_required'));
            redirect('auth/login');
        }

        if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) == 'client') {
            redirect('customers');
        }

        /*if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != ('admin' && 'collaborator')) {
            $this->session->set_flashdata('message', lang('access_denied'));
            redirect('');
        }*/
        $this->load->model('event_model');
        $this->load->model('appmodel');
    }

    function search()
    {
        if ($this->input->post()) {
            $this->load->module('layouts');
            $this->load->library('template');
            $this->template->title(
                lang('events').' - '.$this->config->item('customer_name').' '.$this->config->item('version')
            );
            $data['page'] = lang('events');
            $data['rooms'] = $this->AppModel->get_all_records(
                $table = 'rooms',
                $array = array(
                    'id >' => '0'
                ),
                $join_table = '',
                $join_criteria = '',
                'date_added'
            );
            $room_name = $this->input->post('room_name', true);
            if ($this->input->post('start_date', true)) {
                $start_date = date('Y-m-d', strtotime($this->input->post('start_date', true)));
            }
            $event_id = $this->input->post('event_id', true);
            $data['events'] = $this->event_model->search_event($room_name, $event_id, $start_date);
            $this->template
                ->set_layout('users')
                ->build('events', isset($data) ? $data : null);
        } else {
            redirect('events/view_events/all');
        }
    }

    function event_time($year = null, $month = null, $day = null)
    {
        $this->load->module('layouts');
        $this->load->library('template');
        $this->template->title(
            lang('events').' - '.$this->config->item('customer_name').' '.$this->config->item('version')
        );
        $data['page'] = lang('events');
        $data['count_vehicles'] = $this->appmodel->count_vehicles();
        $data['events'] = $this->event_model->get_all_records(
            $table = 'events',
            $array = array(),
            $join_table = '',
            $join_criteria = '',
            'date_created'
        );
        $data['events'] = '';
        $data['start_date'] = '';$this->uri->segment(3);
        $this->template
            ->set_layout('users')
            ->build('event_time', isset($data) ? $data : null);
    }

    function event_calender($year = null, $month = null, $day = null)
    {
        $this->load->module('layouts');
        $this->load->library('template');
        $this->template->title(
            lang('events').' - '.$this->config->item('customer_name').' '.$this->config->item('version')
        );
        //$data['module'] = 'events';
        $timeid = $this->uri->segment(3);
        if ($timeid == 0) {
            $time = time();
        } else {
            $time = $timeid;
        }
        $data = $this->_date($time);
        $data['page'] = lang('event_calender');
        $this->template
            ->set_layout('users')
            ->build('event_calender', isset($data) ? $data : null);
    }



    function _date($time)
    {
        $data['events'] = $this->event_model->getEvents($time);

        $today = date("Y/n/j", time());
        $data['today'] = $today;

        $current_month = date("n", $time);
        $data['current_month'] = $current_month;

        $current_year = date("Y", $time);
        $data['current_year'] = $current_year;

        $current_month_text = date("F Y", $time);
        $data['current_month_text'] = $current_month_text;

        $total_days_of_current_month = date("t", $time);
        $data['total_days_of_current_month'] = $total_days_of_current_month;

        $first_day_of_month = mktime(0, 0, 0, $current_month, 1, $current_year);
        $data['first_day_of_month'] = $first_day_of_month;

        //geting Numeric representation of the day of the week for first day of the month. 0 (for Sunday) through 6 (for Saturday).
        $first_w_of_month = date("w", $first_day_of_month);
        $data['first_w_of_month'] = $first_w_of_month;

        //how many rows will be in the calendar to show the dates
        $total_rows = ceil(($total_days_of_current_month + $first_w_of_month) / 7);
        $data['total_rows'] = $total_rows;

        //trick to show empty cell in the first row if the month doesn't start from Sunday
        $day = -$first_w_of_month;
        $data['day'] = $day;

        $next_month = mktime(0, 0, 0, $current_month + 1, 1, $current_year);
        $data['next_month'] = $next_month;

        $next_month_text = date("F \'y", $next_month);
        $data['next_month_text'] = $next_month_text;

        $previous_month = mktime(0, 0, 0, $current_month - 1, 1, $current_year);
        $data['previous_month'] = $previous_month;

        $previous_month_text = date("F \'y", $previous_month);
        $data['previous_month_text'] = $previous_month_text;

        $next_year = mktime(0, 0, 0, $current_month, 1, $current_year + 1);
        $data['next_year'] = $next_year;

        $next_year_text = date("F \'y", $next_year);
        $data['next_year_text'] = $next_year_text;

        $previous_year = mktime(0, 0, 0, $current_month, 1, $current_year - 1);
        $data['previous_year'] = $previous_year;

        $previous_year_text = date("F \'y", $previous_year);
        $data['previous_year_text'] = $previous_year_text;

        return $data;

    }

    function getrides()
    {
        $date = $this->input->post('date');
        //$slots = $this->appmodel->get_all_records_simple('reservation',array('DATE(date)' => $date, 'status' => 'accepted'));
        $slots = $this->appmodel->get_all_records_simple('slot_processing',array('date >=' => $date.' '.'00:00:00', 'date <=' => $date.' '.'23:45:00'));
        echo json_encode($slots);
        exit;
    }
    function get_rejected_requests()
    {
        $date = $this->input->post('date');
        $slots = $this->appmodel->get_all_records_simple('reservation',array('DATE(date)' => $date, 'status' => 'rejected'));
        echo json_encode($slots);
        exit;
    }

    function get_main_slot()
    {
        $date = $this->input->post('date');
        $slots = $this->appmodel->get_all_records_simple('reservation',array('DATE(date)' => $date, 'status' => 'accepted'));
        echo json_encode($slots);
        exit;
    }
}
/* End of file events.php */
 
