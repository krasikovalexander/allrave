<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requests extends MX_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('requests_model');
        $this->load->model('appmodel');
        $this->load->helper('url');
        $this->load->library('email');
        $this->load->helper('email_helper');
	$this->load->helper('form');
    }

    //this method shows all the new requests and is also used to show
    // request for a specific date and time.
    function view_requests($date = '',$time = '')
    {
        $this->load->module('layouts');
        $this->load->library('template');
        $this->template->title(
            lang('requests').' - '.$this->config->item('customer_name').' '.$this->config->item('version')
        );
        $data['page'] = lang('requests');

        if(!empty($date) && !empty($time))
        {
            //example time = 0900
            $time = str_split($time,2); //array['09', '00']
            $time = $time[0].':'.$time[1].':00';//09:00:00
            $datetime = $date.' '.$time;
            //get the user id of logged in user
            $dcs_user_id = $this->tank_auth->get_user_id();
            //get the user role
            $dcs_role_id = $this->tank_auth->get_role_id();

           // echo "user id is:".$dcs_user_id;
            //echo "user role is:".$dcs_role_id;
            //die('die after user id and role');

            if($dcs_role_id==2)
            {
                $data['requests'] = $this->appmodel->get_all_records_simple('reservation',array('date' => $datetime, 'uid' => $dcs_user_id));
            }
            else
            {
                $data['requests'] = $this->appmodel->get_all_records_simple('reservation',array('date' => $datetime));
            }
            /*$data['full_slot'] = $this->appmodel->get_all_records_simple('full_slot',array('date' => $date, 'time' => $time));*/
            $count_slot = $this->appmodel->get_all_records_simple('slot_processing',array('date' => $date.' '.$time));
            $count_vehicles = $this->appmodel->count_vehicles();
            if($count_slot && $count_vehicles) {
                $data['full_slot'] = count($count_slot) >= $count_vehicles ? TRUE : FALSE;
            }else
            {
                $data['full_slot'] = FALSE;
            }
            $data['admin_padding'] = $this->appmodel->get_all_records_simple('slot_processing',array('date' => $datetime,'reservation_id' => '-1'));
            $data['slot_padding'] = $this->appmodel->get_all_records_simple('slot_processing', array('date' => $datetime));
        }
        else
        {
            $data['requests'] = $this->appmodel->get_all_records_simple('reservation',array('status'=>'new'));
        }

        $data['page'] = lang('requests');
        $this->template
            ->set_layout('users')
            ->build('requests',isset($data) ? $data : NULL);
    }

    function view_request()
    {
        if ($this->uri->segment(3) === FALSE)//check if the id value is present in the url parameters.
        {
            redirect('requests/view_requests');
        }
        else
        {
            $this->load->module('layouts');
            $this->load->library('template');
            $this->template->title(
                lang('requests').' - '.$this->config->item('customer_name').' '.$this->config->item('version')
            );
            $request_id = $this->uri->segment(3);
            //get the loged in user's details and match if the request id matches with ride details or not.
            //get user id from session
            $dcs_user_id = $this->tank_auth->get_user_id();
            //gte the user role
            $dcs_user_role = $this->tank_auth->get_role_id();
            if($dcs_user_role==2)
            {
                $query=$this->db->get_where('reservation', array('uid' => $dcs_user_id, 'id' => $request_id));
                if ($query->num_rows() == 0) //if no ride with that user booked then redirect to home page
                {
                    $this->tank_auth->logout();
                    redirect('/auth/login');
                }

            }
            //end of code to get the loged in user's details and match if the request id matches with ride details or not.
            


            $data['page'] = lang('requests');

            $data['request'] = $this->requests_model->get_request($request_id);//get the request data.

            //echo "<pre>"; print_r($data['request']); die();

            $datetime = $data['request']['date'];
            $date = $this->_convertDate($datetime);
            $time = date("H:i", strtotime($datetime));
            //check for fullslot.
            $data['fullslot'] = $this->appmodel->get_all_records_simple('full_slot',array('date' => $date, 'time' => $time));


            /*date_default_timezone_set("UTC");*/
            $cdt = date("Y-m-d H:i", time() - 60 * 60 * 5);//current cdt time
            $cdt6 = date('Y-m-d H:i:s', strtotime($cdt) + 60 * 60 * 6);//cdt +6 hours.

            /*if(strtotime($datetime) - strtotime($cdt6) >= 0)//if the datetime for the ride is greater than cdt +6hours then allow the accept and reject actions.
            {*/
	    if(strtotime($datetime) - strtotime($cdt) >= 0)//if the datetime for the ride is greater than cdt then allow the accept and reject actions.
            {
                $data['allow_action'] = TRUE;
            }
            else
            {
                $data['allow_action'] = FALSE;
            }

            $this->template
                ->set_layout('users')
                ->build('request',isset($data) ? $data : NULL);
        }

    }
    
    function process_request()
    {
        $request_id = $this->input->post('request_id');
        $reservation = $this->appmodel->get_all_records_simple('reservation', array('id' => $request_id));
        $accept = $this->input->post('accept');
        $reject = $this->input->post('reject');
        $silent_reject = $this->input->post('silent_reject');

        //get delete and edit button clicks for specific user
        $delete = $this->input->post('delete');
        $edit = $this->input->post('edit');

        $admin = $this->appmodel->get_all_records_simple('config',array('config_key' => 'admin_email'));
        $admin_email = $admin[0]['value'];

        if($accept)
        {
            $this->requests_model->set_request($request_id,'accepted');

            //add the accepted request email to the schedule email table.
            $this->appmodel->insert('schedule_email',array('email' => $reservation[0]['email'],'type' => 'accepted',
                'reservation_id' => $request_id, 'status' => 0,'date' => date('Y-m-d')));

            //add the accept request email to the schedule email table.
            $this->appmodel->insert('schedule_email',array('email' => $admin_email,'type' => 'admin_accepted',
                'reservation_id' => $request_id, 'status' => 0,'date' => date('Y-m-d')));
        }
        else if($reject)
        {
            $this->requests_model->set_request($request_id,'rejected');
            $this->appmodel->insert('schedule_email',array('email' => $reservation[0]['email'],'type' => 'rejected',
                'reservation_id' => $request_id, 'status' => 0,'date' => date('Y-m-d')));

            $this->appmodel->insert('schedule_email',array('email' => $admin_email,'type' => 'admin_cancelled',
                'reservation_id' => $request_id, 'status' => 0,'date' => date('Y-m-d')));

	        //delete the slots from the slot_processing table.
	        $this->appmodel->delete('slot_processing',array('reservation_id' => $request_id));
	        $this->appmodel->delete('full_slot',array('date' => date('Y-m-d', strtotime($reservation[0]['date'])),'time' => date('H:i:s', strtotime($reservation[0]['date']))));

            $this->appmodel->delete('schedule_email',array('reservation_id' => $request_id,'type' => 'reminder'));
            $this->appmodel->delete('schedule_email',array('reservation_id' => $request_id,'type' => 'admin_reminder'));
        }
        else if($silent_reject)
        {
            $this->requests_model->set_request($request_id,'rejected');
            $this->appmodel->delete('schedule_email',array('reservation_id' => $request_id));
            $this->appmodel->delete('full_slot',array('date' => date('Y-m-d', strtotime($reservation[0]['date'])),'time' => date('H:i:s', strtotime($reservation[0]['date']))));
            $this->appmodel->delete('slot_processing',array('reservation_id' => $request_id));
            $this->_remove_calendar_event($request_id);
        }
        elseif ($delete)        //if user wants to delete the ride from dashboard
        {
            $this->requests_model->set_request($request_id,'rejected');
            $this->appmodel->delete('schedule_email',array('reservation_id' => $request_id));
            $this->appmodel->delete('full_slot',array('date' => date('Y-m-d', strtotime($reservation[0]['date'])),'time' => date('H:i:s', strtotime($reservation[0]['date']))));
            $this->appmodel->delete('slot_processing',array('reservation_id' => $request_id));
            $this->_remove_calendar_event($request_id);
        }
        // elseif ($edit) {
            
        // }

        redirect('requests/view_requests');
    }

    //function to load modal for edit ride
    function edit_ride()
    {
        $data['id'] = $this->uri->segment(4);

        $data['request'] = $this->requests_model->get_request($data['id']);//get the request data.

        $this->load->view('modal/edit_ride', $data);
    }

    //save edited ride in db and call function to update the calender
    function save_edited_ride()
    {
        $request_id = $this->input->post('request_id');
        //get data from popup form
        $name=$this->input->post('name');
        $email=$this->input->post('email');
        $phone=$this->input->post('phone');
        $alternate_phn1=$this->input->post('alternate_phn1');
        $alternate_phn2=$this->input->post('alternate_phn2');
        $flight_number=$this->input->post('flight_number');
        $pick_address=$this->input->post('pick_address');
        $pick_city=$this->input->post('pick_city');
        $pick_state=$this->input->post('pick_state');
        $pick_zip=$this->input->post('pick_zip');
        $drop_address=$this->input->post('drop_address');
        $drop_city=$this->input->post('drop_city');
        $drop_state=$this->input->post('drop_state');
        $drop_zip=$this->input->post('drop_zip');
        $number_passengers=$this->input->post('number_passengers');
        $special_instructions=$this->input->post('special_instructions');

        $data = array(
            'name' => $name, 
            'email' => $email, 
            'phone' => $phone, 
            'alternate_phone1' => $alternate_phn1, 
            'alternate_phone2' => $alternate_phn2, 
            'flight_number' => $flight_number, 
            'pickup_address' => $pick_address, 
            'pickup_city' => $pick_city, 
            'pickup_state' => $pick_state, 
            'pickup_zip' => $pick_zip, 
            'dropoff_address' => $drop_address, 
            'dropoff_city' => $drop_city, 
            'dropoff_state' => $drop_state, 
            'dropoff_zip' => $drop_zip, 
            'number_of_passengers' => $number_passengers, 
            'special_instruction' => $special_instructions, 

            );

        //end of get data from popup form

        //now update the calender
        $this->_update_calendar_event($request_id,$data);
    }




    function get_request_by_limit()
    {
        $where = '';
        $limit = $this->input->post('limit');
        $type = $this->input->post('type');

        if($type != 'all')
        {
            $where = array('status' => $type);
        }
        if ($limit) {
            $data = $this->appmodel->get_records_by_limit('reservation',$where,$limit);
        } else {
            $data = $this->appmodel->get_all_records_simple('reservation',$where);
        }
        
        echo json_encode($data);
        exit;
    }

    function add_request()
    {
        $this->load->module('layouts');
        $this->load->library('template');
        $this->template->title(
            lang('requests').' - '.$this->config->item('customer_name').' '.$this->config->item('version')
        );
        $data['date'] = $this->uri->segment(3);
        $data['time'] = $this->uri->segment(4);
        $data['page'] = lang('requests');

        //$data['request'] = $this->requests_model->get_request($request_id);

        //include the form validation library.
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Name','trim|required');
        $this->form_validation->set_rules('phone','Phone','trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('pickup_address', 'Pickup Address:', 'trim|required');
        $this->form_validation->set_rules('pickup_city', 'Pickup City', 'trim|required');
        $this->form_validation->set_rules('pickup_state', 'Pickup State', 'trim|required');
        $this->form_validation->set_rules('pickup_zip', 'Pickup Zip', 'trim|required|integer');
        $this->form_validation->set_rules('drop_address', 'Drop Address', 'trim|required');
        $this->form_validation->set_rules('drop_city', 'Drop City', 'trim|required');
        $this->form_validation->set_rules('drop_state', 'Drop State', 'trim|required');
        $this->form_validation->set_rules('drop_zip', 'Drop Zip', 'trim|required|integer');
        $this->form_validation->set_rules('passenger', 'Passenger', 'required|callback_select_validate');

        if($this->form_validation->run() == FALSE)
        {
            $this->template
                ->set_layout('users')
                ->build('add_request',isset($data) ? $data : NULL);
        }
        else
        {
	    $datetime = $this->input->post('date_cdt');
	    $date = date('Y-m-d', strtotime($datetime));
	    $time = date('H:i:s', strtotime($datetime));

            /*date_default_timezone_set("UTC");*/
            $booking_time = date("Y-m-d H:i:s", time() - 60 * 60 * 5);//cdt time.
            //check this section later as we might to need to save the booking time as per cdt timezone.


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

            //$insert = $this->appmodel->insert('reservation',$data);
		$insert_id = $this->appmodel->form_insert($data);

            if($insert_id)
            { //if the data has been saved in the database.
                $data['heading'] = 'Your appointment has not yet been confirmed';
                $user_subject = 'Thank you for your request';
                $webmaster = $this->appmodel->get_all_records_simple('config',array('config_key' => 'webmaster_email'));
                $webmaster_email = $webmaster[0]['value'];

                send_email($user_subject,$webmaster_email,$data['email'],$data,'reservation/email');

                $admin_subject = 'The following request has been posted';
                $data['heading'] = 'The following request has been posted';

                $admin = $this->appmodel->get_all_records_simple('config',array('config_key' => 'admin_email'));
                $admin_email = $admin[0]['value'];

                send_email($admin_subject,$webmaster_email,$admin_email,$data,'reservation/email');
		        $this->_full_slot($date,$time,$insert_id,$data['email']);
                $this->session->set_flashdata('message', 'The data has been saved');
                $time = date('Hi',strtotime($time));
                redirect("requests/add_request/$date/$time");
            }
            else
            { //if the data could not be saved in the database.
                $this->session->set_flashdata('message', 'Your Request could not be saved due to some problem, Kindly try again.');
                redirect("requests/add_request/$date/$time");
            }
        }
    }

    private function _convertDate($date)
    {
        return date('Y-m-d', strtotime($date));
    }

    function select_validate($select_val)
    {
        if($select_val=="Number of Passenger"){
	$this->form_validation->set_message('select_validate', 'Please Select The Number Of Passengers.');
	return false;
	} else{
	return true;
	}
    }

    function alpha_space($str)
    {
        return ( ! preg_match("^[a-zA-Z][a-zA-Z\\s]+$", $str)) ? FALSE : TRUE;
    }

    function get_requests_like()
    {
        $text = $this->input->post('text');
        $type = $this->input->post('type');
        $limit = $this->input->post('limit');
        $where = '';
        if($type != 'all')
        {
            $where = array('status' => $type);
        }
        $result = $this->requests_model->get_requests_like_limit('reservation',$where ,'name',$text, $limit);
        echo json_encode($result);
        exit;
    }

    function get_all_requests()
    {
        $result = $this->appmodel->get_records_by_limit('reservation','',10,'');
        echo json_encode($result);
        exit;
    }

    function get_user_details_by_name()
    {
        $name = $this->input->post('name');
        $result = $this->appmodel->get_like_limit('reservation','name',$name,'10');
        echo json_encode($result);
        exit;
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
                $this->appmodel->insert('schedule_email',array('email' => $admin_email,'type' => 'admin_reminder','reservation_id' => $request_id,'status' => 0,'date' => $date));
                $this->appmodel->insert('schedule_email',array('email' => $email,'type' => 'reminder','reservation_id' => $request_id,'status' => 0,'date' => $date));

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
                $full_slot = $this->appmodel->get_all_records_simple('reservation',array('date' => $date.' '.$time,'status' => 'accepted'));
                $full_slot_count = ($full_slot) ? count($full_slot) : 0;

                if($full_slot_count == $count_vehicles)
                {
                    //if the full slot has happened then insert it in the full slot table.
                    $this->appmodel->insert('full_slot',array('date' => $date, 'time' => $time));
                }
            //}
        }
    }



    private function _remove_calendar_event($reservation_id)
    {
        //get the reservation id and the event id and delete the event from the admin's gmail calendar.
        //$cal_id = 'i77dimnbf8v118tsprka2h5mac@group.calendar.google.com';

        $cal_id = 'm3hhu0mmpbsbr7h08dua2p0428@group.calendar.google.com';//mikemcmay@gmail.com calendar id.
        //uncomment this line in the production website.


        /************************************************
         * Make an API request authenticated with a service
         * account.
         ************************************************/

        require_once 'google-api-php-client/src/Google/autoload.php';
        require_once 'google-api-php-client/src/Google/Client.php';
        require_once 'google-api-php-client/src/Google/Service/Calendar.php';

        //obviously, insert your own credentials from the service account in the Google Developer's console

        //$client_id = '637353149472-m15kipqrg1r13hd1ke6meb57ir8tbl89.apps.googleusercontent.com';

        //uncomment this line in the production website.
        $client_id = '80971229196-voije5o15tcbim4ipekn4gtg8m7o7udo.apps.googleusercontent.com';


        //$service_account_name = '637353149472-m15kipqrg1r13hd1ke6meb57ir8tbl89@developer.gserviceaccount.com';

        //uncomment this line in the production website.
        $service_account_name = '80971229196-voije5o15tcbim4ipekn4gtg8m7o7udo@developer.gserviceaccount.com';


        //the location of the key file .
        //$key_file_location = 'test-e7db1fd48348.p12';
        $key_file_location = 'allrave-5e13ec556878.p12'; //uncomment this line in the production website.

        if (!strlen($service_account_name) || !strlen($key_file_location))
            echo missingServiceAccountDetailsWarning();

        $client = new Google_Client();
        $client->setApplicationName("allrave");

        if (isset($_SESSION['service_token'])) {
            $client->setAccessToken($_SESSION['service_token']);
        }

        $key = file_get_contents($key_file_location);
        $cred = new Google_Auth_AssertionCredentials(
            $service_account_name,
            array('https://www.googleapis.com/auth/calendar'),
            $key
        );
        $client->setAssertionCredentials($cred);
        if ($client->getAuth()->isAccessTokenExpired()) {
            $client->getAuth()->refreshTokenWithAssertion($cred);
        }
        $_SESSION['service_token'] = $client->getAccessToken();

        $event = $this->appmodel->get_all_records_simple('calendar_events',array('reservation_id' => $reservation_id));
        $event_id = $event[0]['event_id'];
        if($event)
        {
            $calendarService = new Google_Service_Calendar($client);
            $calendarService->events->delete($cal_id, $event_id);

            $this->appmodel->delete('calendar_events',array('event_id' => $event_id, 'reservation_id' => $reservation_id));
        }
    }

    //function to update the calendar

    private function _update_calendar_event($reservation_id, $data)
    {
        //get the reservation id and the event id and delete the event from the admin's gmail calendar.
        //$cal_id = 'i77dimnbf8v118tsprka2h5mac@group.calendar.google.com';

        $cal_id = 'm3hhu0mmpbsbr7h08dua2p0428@group.calendar.google.com';//mikemcmay@gmail.com calendar id.
        //uncomment this line in the production website.


        /************************************************
         * Make an API request authenticated with a service
         * account.
         ************************************************/

        require_once 'google-api-php-client/src/Google/autoload.php';
        require_once 'google-api-php-client/src/Google/Client.php';
        require_once 'google-api-php-client/src/Google/Service/Calendar.php';

        //obviously, insert your own credentials from the service account in the Google Developer's console

        //$client_id = '637353149472-m15kipqrg1r13hd1ke6meb57ir8tbl89.apps.googleusercontent.com';

        //uncomment this line in the production website.
        $client_id = '80971229196-voije5o15tcbim4ipekn4gtg8m7o7udo.apps.googleusercontent.com';


        //$service_account_name = '637353149472-m15kipqrg1r13hd1ke6meb57ir8tbl89@developer.gserviceaccount.com';

        //uncomment this line in the production website.
        $service_account_name = '80971229196-voije5o15tcbim4ipekn4gtg8m7o7udo@developer.gserviceaccount.com';


        //the location of the key file .
        //$key_file_location = 'test-e7db1fd48348.p12';
        $key_file_location = 'allrave-5e13ec556878.p12'; //uncomment this line in the production website.

        if (!strlen($service_account_name) || !strlen($key_file_location))
            echo missingServiceAccountDetailsWarning();

        $client = new Google_Client();
        $client->setApplicationName("allrave");

        if (isset($_SESSION['service_token'])) {
            $client->setAccessToken($_SESSION['service_token']);
        }

        $key = file_get_contents($key_file_location);
        $cred = new Google_Auth_AssertionCredentials(
            $service_account_name,
            array('https://www.googleapis.com/auth/calendar'),
            $key
        );
        $client->setAssertionCredentials($cred);
        if ($client->getAuth()->isAccessTokenExpired()) {
            $client->getAuth()->refreshTokenWithAssertion($cred);
        }
        $_SESSION['service_token'] = $client->getAccessToken();

        $event = $this->appmodel->get_all_records_simple('calendar_events',array('reservation_id' => $reservation_id));
        $event_id = $event[0]['event_id'];
        if($event)
        {
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
            //echo"1111111";
            
           // print_r($data['name']);

            //die("<br>die after showing the data from form");

            $calendarService = new Google_Service_Calendar($client);
            //$calendarService->events->delete($cal_id, $event_id);

            //echo"22222";

            $event = $calendarService->events->get($cal_id, $event_id);
            //echo"3333333333";
            $name=$data['name'];
            $pick_address=$data['pickup_address'].' '.$data['pickup_city'].' '.$data['pickup_state'].' '.$data['pickup_zip'];
            $drop_address=$data['dropoff_address'].' '.$data['dropoff_city'].' '.$data['dropoff_state'].' '.$data['dropoff_zip'];
            $flightnumber = $data['flight_number'];
            $phone=$data['phone'];
            $number_passengers=$data['number_of_passengers'];
            $email=$data['email'];
            $special_instructions=$data['special_instruction'];

            $event->setSummary("Pickup $name from $pick_address to $drop_address Flight number: $flightnumber Phone: $phone Passangers: $number_passengers, Email: $email, special instructions: $special_instructions");
            //echo"444444";
           

            $updatedEvent = $calendarService->events->update($cal_id, $event->getId(), $event);  //query to update the calender event
            /* 
            now after calender event updation, we need to do
                - update reservation table with new data
                - send email to the client.
                -send email to the admin on gmail
                - update data on time slot and in the rides table.
            */

              //update reservation table with new data
               $update_reservation  = $this->appmodel->update('reservation',$data, array('id' => $reservation_id));
               if($update_reservation)
               {
                //send mail to the client
                // $data['heading'] = 'You have made the changes to your ride.';
                // $user_subject = 'Thank you for your request';
                // $webmaster = $this->appmodel->get_all_records_simple('config',array('config_key' => 'webmaster_email'));
                // $webmaster_email = $webmaster[0]['value'];

                // send_email($user_subject,$webmaster_email,$data['email'],$data,'reservation/email');
                 //end of send mail to the client


                $this->session->set_flashdata('response_status', 'success');
                $this->session->set_flashdata('message', 'Your ride has been updated successfully' );
               }
               else
               {
                    $this->session->set_flashdata('response_status', 'error');
                    $this->session->set_flashdata('message', 'Some error occured' );
               }
               redirect("requests/view_request/$reservation_id");
        }
    }



}
