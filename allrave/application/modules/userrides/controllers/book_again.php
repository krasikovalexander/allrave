<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book_again extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('appmodel');
	$this->load->model('reservation_model');
        $this->load->helper('url');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->helper('email_helper');
    }

    function index()
    {
        $this->load->module('layouts');
        $this->load->library('template');
        $this->template->title(
            lang('Add Ride').' - '.$this->config->item('customer_name').' '.$this->config->item('version')
        );
        $data['page'] = lang('subscription');
        $this->template
            ->set_layout('users')
            ->build('book_again',isset($data) ? $data : NULL);
    }

    public function bookAgain($value='')
    {
        $ride_id = $this->uri->segment(5);
        $query = $this->db->get_where('reservation', array('id' => $ride_id));
        // $query = $this->db
        //         ->select('*', false)
        //         //->from('reservation_dummy')
        //         ->from('reservation')
        //         ->where('id =', $ride_id)
        //         ->where('status =', 'accepted')
        $data['ride_detail'] = $query->result();
      // echo "<pre>";
      // print_r($data);
      // die('asdf'); 

        $this->load->module('layouts');
        $this->load->library('template');
        $this->template->title(
            lang('Add Ride').' - '.$this->config->item('customer_name').' '.$this->config->item('version')
        );
        $data['page'] = lang('subscription');
        $this->template
            ->set_layout('users')
            ->build('book_again',isset($data) ? $data : NULL);
        //echo ($this->uri->segment(5)) ;

    }

    // function send_subscription()
    // {
    //     $data['email_body'] = $this->input->post('email_body');
    //     $subject = $this->input->post('subject');
    //     $view = "email_template";
    //     $subscribers = $this->appmodel->get_all_records_simple('subscribers');
    //     $webmaster = $this->appmodel->get_all_records_simple('config',array('config_key' => 'webmaster_email'));
    //     $from = $webmaster[0]['value'];
    //     foreach($subscribers as $subscriber)
    //     {
    //         $email = $subscriber['email'];
	   //  send_email($subject,$from,$email,$data,$view);
    //     }

    //     $this->session->set_flashdata('message', count($subscribers)." emails have been sent");
    //     redirect("subscription");
    // }

    public function getfullslots1()
    {
        $date = $this->input->post('date');
        $type = $this->input->post('type');
        $date = $this->_convertDate($date);//convert the date format.
        if($type == 'reservation1')
        {
            $slots = $this->appmodel->get_all_records_simple('slot_processing',array('date >=' => $date.' '.'00:00:00', 'date <=' => $date.' '.'23:45:00'));
        }
        else
        {
            //$slots = $this->reservation_model->getfullslots($date);
            $slots = $this->appmodel->get_all_records_simple('reservation',array('date >=' => $date.' '.'00:00:00','date <=' => $date.' '.'23:45:00','status' => 'accepted'));
        }

        echo json_encode($slots);
        exit;
    }

    private function _convertDate($date)
    {
        return date('Y-m-d', strtotime($date));
    }


	private function _full_slot($date,$time,$request_id,$email)
    {
        $full_slot = $this->appmodel->get_all_records_simple('full_slot',array('date' => $date,'time' => $time));
        if($full_slot)//if fullslot then reject
        {
            //set the status to rejected.
            $this->appmodel->update('reservation',array('status' => 'rejected'),array('id' => $request_id));
            //make an entry in email table.
            $this->appmodel->insert('schedule_email',array('email' => $email,'type' => 'rejected','reservation_id' => $request_id,'status' => 0,'date' => date('Y-m-d')));

        }
        else //if not a fullslot then check for padding effect.
        {
            //add 15 minutes to the time variable and check for the padding effect in slot_processing table.
            //$time15 = date('H:i:s',strtotime("+15minutes", strtotime($time)));
            //$datetime15 = $date.' '.$time15;
            $count_vehicles = $this->appmodel->count_vehicles();
            //$count_slots15 = $this->appmodel->count_where('slot_processing',array('date' => $datetime15));
            //$count_slots = $this->appmodel->count_where('slot_processing',array('date' => $date.' '.$time));
            //$count_slots15 = ($count_slots15) ? count($count_slots15) : 0;
            //$count_slots = ($count_slots) ? count($count_slots) : 0;

            /*if(($count_slots15 == $count_vehicles) || (($count_slots == $count_vehicles)))
            {
                //reject request due to padding.
                //set the status to rejected.
                $this->appmodel->update('reservation',array('status' => 'rejected'),array('id' => $request_id));
                //make an entry in email table.
                $this->appmodel->insert('schedule_email',array('email' => $email,'type' => 'rejected','reservation_id' => $request_id,'status' => 0,'date' => date('Y-m-d')));
            }
            else
            {*/
                //accept the request.
            $admin = $this->appmodel->get_all_records_simple('config',array('config_key' => 'admin_email'));
            $admin_email = $admin[0]['value'];

                $this->appmodel->update('reservation',array('status' => 'accepted'),array('id' => $request_id));
                $this->appmodel->insert('schedule_email',array('email' => $email,'type' => 'accepted','reservation_id' => $request_id,'status' => 0,'date' => date('Y-m-d')));
                $this->appmodel->insert('schedule_email',array('email' => $admin_email,'type' => 'admin_accepted','reservation_id' => $request_id,'status' => 0,'date' => date('Y-m-d')));
                $this->appmodel->insert('schedule_email',array('email' => $email,'type' => 'reminder','reservation_id' => $request_id,'status' => 0,'date' => $date));
                $this->appmodel->insert('schedule_email',array('email' => $admin_email,'type' => 'admin_reminder','reservation_id' => $request_id,'status' => 0,'date' => $date));

                //fill the slot_processing table.
                $currentDate = strtotime($date.' '.$time);
                $currentDate_negative = $currentDate;
                $interval = 0;
                for($i = 0; $i< 8; $i++)
                {
                    $futureDate = $currentDate+(60*$interval);
                    $new_date = date("Y-m-d H:i:s", $futureDate);
                    $data = array('date' => $new_date,'reservation_id' => $request_id);
                    $this->appmodel->insert('slot_processing',$data);
                    $interval +=  15;
                }
                $interval = -15;
                for($i = 8; $i> 0; $i--)
                {
                    $futureDate = $currentDate_negative+(60*$interval);
                    $new_date = date("Y-m-d H:i:s", $futureDate);
                    $data = array('date' => $new_date,'reservation_id' => $request_id);
                    $this->appmodel->insert('slot_processing',$data);
                    $interval -=  15;
                }

                //check if full slot has happened.
                $full_slot = $this->appmodel->get_all_records_simple('reservation',array('date' => $date.' '.$time, 'status' => 'accepted'));
                $full_slot_count = ($full_slot) ? count($full_slot) : 0;

                if($full_slot_count == $count_vehicles)
                {
                    //if the full slot has happened then insert it in the full slot table.
                    $this->appmodel->insert('full_slot',array('date' => $date, 'time' => $time));
                }
            //}
        }
    }

    function alpha_space($str)
    {
        return ( ! preg_match("^[a-zA-Z][a-zA-Z\\s]+$", $str)) ? FALSE : TRUE;
    }




function reservation1()
{


	$data['count_vehicles'] = $this->appmodel->count_vehicles();
        //include the form validation library.
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username','Name','trim|required');
        $this->form_validation->set_rules('phone','Phone','trim|required');//|max_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('pickup_address', 'Pickup Address:', 'trim|required');
        $this->form_validation->set_rules('pickup_city', 'Pickup City', 'trim|required');
        $this->form_validation->set_rules('pickup_state', 'Pickup State', 'trim|required');
        $this->form_validation->set_rules('pickup_zip', 'Pickup Zip', 'trim|required|integer');
        $this->form_validation->set_rules('drop_address', 'Drop Address', 'trim|required');
        $this->form_validation->set_rules('drop_city', 'Drop City', 'trim|required');
        $this->form_validation->set_rules('drop_state', 'Drop State', 'trim|required');
        $this->form_validation->set_rules('drop_zip', 'Drop Zip', 'trim|required|integer');
        $this->form_validation->set_rules('passenger', 'Passenger', 'trim|required|callback_select_validate');

        if($this->form_validation->run() == FALSE) {
            //$this->load->view('book_again',$data);

	$ride_id = $this->input->post('ride_id');
        $query = $this->db->get_where('reservation', array('id' => $ride_id));
        // $query = $this->db
        //         ->select('*', false)
        //         //->from('reservation_dummy')
        //         ->from('reservation')
        //         ->where('id =', $ride_id)
        //         ->where('status =', 'accepted')
        $data['ride_detail'] = $query->result();
      // echo "<pre>";
      // print_r($data);
      // die('asdf'); 
	$this->load->module('layouts');
        $this->load->library('template');
        $this->template->title(
            lang('Add Ride').' - '.$this->config->item('customer_name').' '.$this->config->item('version')
        );
        $data['page'] = lang('subscription');
        $this->template
            ->set_layout('users')
            ->build('book_again',isset($data) ? $data : NULL);


        }
        else{
            $date = $this->input->post('date');
            $date = DateTime::createFromFormat('m-d-Y', $date);
            $date = $date->format('Y-m-d');

            $time = $this->input->post('appointment_time');
            $time = date("H:i:s", strtotime($time));
            $datetime = $date.' '.$time;

            $booking_time = date("Y-m-d H:i:s", time() - 60 * 60 * 5);//current cdt time.

            //get the id of user depending upon the email id from user table
            $uid=0;
            $query = $this->db->get_where('users',array('email' => $this->input->post('email')) );
            foreach ($query->result() as $row)
            {
                $uid = $row->id;
            }
            if($uid!=null)
            {
                $user_id=$uid;
            }
            else
            {
                $user_id=0;
            }

            $data = array(
                'name' => $this->input->post('username'),
                'phone' => $this->input->post('phone'),
                'alternate_phone1' => $this->input->post('alternate_phone1'),
                'alternate_phone2' => $this->input->post('alternate_phone2'),
                'email' => $this->input->post('email'),
                'date' => $datetime,
                'flight_number' => $this->input->post('flightnumber'),
                'arrival_time' => $this->input->post('usr_time'),
                'pickup_address' => $this->input->post('pickup_address'),
                'pickup_city' => $this->input->post('pickup_city'),
                'pickup_state' => $this->input->post('pickup_state'),
                'pickup_zip' => $this->input->post('pickup_zip'),
                'dropoff_address' => $this->input->post('drop_address'),
                'dropoff_city' => $this->input->post('drop_city'),
                'dropoff_state' => $this->input->post('drop_state'),
                'dropoff_zip' => $this->input->post('drop_zip'),
                'number_of_passengers' => $this->input->post('passenger'),
                'booking_time' => $booking_time,
                'special_instruction' => $this->input->post('special_instruction'),
                'uid' => $user_id

            );
               //get the data of user for finding the distance if user already booked the same ride
                $where_data= array(
                            'email' => $data['email'],
                            'pickup_zip' => $data['pickup_zip'],
                            'dropoff_zip' => $data['dropoff_zip']
                            );
                $query = $this->db->get_where('reservation', $where_data);
                $rowcount = $query->num_rows();
                if($rowcount<1)
                {
                    $zip1=$where_data['pickup_zip'];
                    $zip2=$where_data['dropoff_zip'];
                    $zip_distance=$this->getDistance($zip1, $zip2);
                   // echo "<script type='text/javascript'>alert($zip_distance);</script>";
                }
                

               //end of get the data of user for finding the distance if user already booked the same ride






            //$subscribe = ($this->input->post('enroll'));
            //enter the user to the subscriber table.
            //if($subscribe){
                //make changes here.
                $this->reservation_model->subscriber_check($data['email']);     //put the email id in the subscription table
            //}
            $insert_id = $this->reservation_model->form_insert($data);          // put the data in the table
            if($insert_id){ //if the data has been saved in the database.

                $data['heading'] = 'Your appointment has not yet been confirmed';
                $data['user_subject'] = 'Thank you for your request';
                $webmaster = $this->appmodel->get_all_records_simple('config',array('config_key' => 'webmaster_email'));
                $from = $webmaster[0]['value'];

                send_email($data['user_subject'],$from,$data['email'],$data,'email');

                $data['admin_subject'] = 'The following request has been posted';
                $data['heading'] = 'The following request has been posted';
                $admin = $this->appmodel->get_all_records_simple('config',array('config_key' => 'admin_email'));
                $to =  $admin[0]['value'];
                send_email($data['admin_subject'],$from,$to,$data,'email');

                $this->_full_slot($date,$time,$insert_id,$data['email']);
		$this->session->set_flashdata('response_status', 'success');
                $this->session->set_flashdata('message', 'Your ride booked again with new date time');
                redirect('userrides/viewrides');

            }else{ //if the data could not be saved in the database.
		$this->session->set_flashdata('response_status', 'error');
                $this->session->set_flashdata('message', 'Your Request could not be saved due to some problem, Kindly try again.');
                redirect('userrides/viewrides');
            }
        }
}

//This method is used to save the reservation form data into the database.
    function thankyou()
    {
        $this->load->view('message');
    }

}
