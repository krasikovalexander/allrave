<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Reservation extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('reservation_model');
        $this->load->model('appmodel');
        $this->load->helper('url');
        $this->load->library('email');
        $this->load->helper('email_helper');
    }

   
    /*public function index()
    {
        $data['count_vehicles'] = $this->appmodel->count_vehicles();
        $this->load->model('places/place_model');
        $this->load->model('flights/airline_model');
        $this->load->model('flights/flight_model');
        $data['places'] = $this->place_model->places();

        $airlines = $this->airline_model->activeAirlines();

        if (count($airlines)) {
            foreach ($airlines as &$airline) {
                $airline->flights = $this->flight_model->activeFlights($airline->id);
            }
        }

        $data['airlines'] = $airlines;

        //include the form validation library.
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Name', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');//|max_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('pickup_address', 'Pickup Address:', 'trim|required');
        //$this->form_validation->set_rules('pickup_city', 'Pickup City', 'trim|required');
        //$this->form_validation->set_rules('pickup_state', 'Pickup State', 'trim|required');
        $this->form_validation->set_rules('pickup_zip', 'Pickup Zip', 'trim|integer');
        $this->form_validation->set_rules('drop_address', 'Drop Address', 'trim|required');
        //$this->form_validation->set_rules('drop_city', 'Drop City', 'trim|required');
        //$this->form_validation->set_rules('drop_state', 'Drop State', 'trim|required');
        $this->form_validation->set_rules('drop_zip', 'Drop Zip', 'trim|integer');
        $this->form_validation->set_rules('passenger', 'Car', 'trim|required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('reservation', $data);
        } else {
            $date = $this->input->post('date');
            $fulldate = DateTime::createFromFormat('m/d/Y H:i A', $date);
            $datetime  = $fulldate->format('Y-m-d H:i:s');

            $date = $fulldate->format('Y-m-d');
            $time = $fulldate->format('H:i:s');

            $booking_time = date("Y-m-d H:i:s", time() - 60 * 60 * 5);//current cdt time.

            //get the id of user depending upon the email id from user table
            $uid=0;
            $query = $this->db->get_where('users', array('email' => $this->input->post('email')));
            foreach ($query->result() as $row) {
                $uid = $row->id;
            }
            if ($uid!=null) {
                $user_id=$uid;
            } else {
                $user_id=0;
            }

            $airline = null;
            $flight = null;
            if ($this->input->post('airline')) {
                $airline = $this->airline_model->getById($this->input->post('airline'));
                $flight = $this->flight_model->getById($this->input->post("flightnumber-".$this->input->post('airline')));
            }

            $data = array(
                'name' => $this->input->post('username'),
                'phone' => $this->input->post('phone'),
                'alternate_phone1' => $this->input->post('alternate_phone1'),
                'alternate_phone2' => $this->input->post('alternate_phone2'),
                'email' => $this->input->post('email'),
                'date' => $datetime,
                'flight_number' => $flight ? $airline->name." ".$flight->path : $this->input->post('flightnumber'),
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

            //$subscribe = ($this->input->post('enroll'));
            //enter the user to the subscriber table.
            //if($subscribe){
                //make changes here.
                $this->reservation_model->subscriber_check($data['email']);     //put the email id in the subscription table
            //}
            $insert_id = $this->reservation_model->form_insert($data);          // put the data in the table

            if ($insert_id) { //if the data has been saved in the database.

                //$data['heading'] = 'Your appointment has not yet been confirmed';
                //$data['user_subject'] = 'Thank you for your request';
                $webmaster = $this->appmodel->get_all_records_simple('config', array('config_key' => 'webmaster_email'));
                $from = $webmaster[0]['value'];

                //send_email($data['user_subject'],$from,$data['email'],$data,'email');

                $data['admin_subject'] = 'The following request has been posted';
                $data['heading'] = 'The following request has been posted';
                
                $data['airline'] = $airline;
                $data['flight'] = $flight;

                $admin = $this->appmodel->get_all_records_simple('config', array('config_key' => 'admin_email'));
                $to =  $admin[0]['value'];
                send_email($data['admin_subject'], $from, $to, $data, 'request');


                //$this->_full_slot($date,$time,$insert_id,$data['email']);
                $this->session->set_flashdata('message', 'Your Request has been received by us, we will contact you shortly. Meanwhile, You can book another ride.');
                redirect('reservation/thankyou');
            } else { //if the data could not be saved in the database.
                $this->session->set_flashdata('message', 'Your Request could not be saved due to some problem, Kindly try again.');
                redirect('reservation/thankyou');
            }
        }
    }*/

    public function notifications()
    {
        //$req_dump = print_r(getallheaders(), true);
        //file_put_contents('notifications.log', $req_dump, FILE_APPEND);

        $headers = getallheaders();

        if (isset($headers['X-Goog-Channel-Id']) && $headers['X-Goog-Resource-State'] == 'exists') {
            $this->load->model('reservation_v2_model');
            $reservation = $this->reservation_v2_model->getById(intval(str_replace("notify_", "", $headers['X-Goog-Channel-Id'])));

            require_once 'google-api-php-client-master/vendor/autoload.php';
            $client = new Google_Client();
            $client->setAuthConfig('client-secret.json');
            $access_token = json_decode(file_get_contents('access-token.json'), true);
            $refresh_token = file_get_contents('refresh-token.txt');
            $client->setAccessToken($access_token);
            if ($client->isAccessTokenExpired()) {
                $client->refreshToken($refresh_token);
                $access_token = $client->getAccessToken();
                file_put_contents('access-token.json', json_encode($access_token));
            }

            $client->setScopes(Google_Service_Calendar::CALENDAR);

            $service = new Google_Service_Calendar($client);

            date_default_timezone_set('America/Chicago');
            
            $channel = new Google_Service_Calendar_Channel($service);
            $channel->setId($headers['X-Goog-Channel-Id']);
            $channel->setResourceId($headers['X-Goog-Resource-Id']);

            if ($reservation) {
                $event = $service->events->get($reservation['calendar_id'], $reservation['event_id']);
                if (!$event || ($event && $event->status == 'cancelled')) {
                    $service->channels->stop($channel);
                }

                $attendees = $event->getAttendees();
                $owner = $attendees[0];

                if (count($attendees) == 1) {
                    if ($owner->getResponseStatus() == "accepted") {
                        $guest = new Google_Service_Calendar_EventAttendee();
                        $guest->setDisplayName($reservation['name']);
                        $guest->setEmail($reservation['email']);
                        $guest->setResponseStatus('needsAction');

                        $attendees[] = $guest;
                        $event->setAttendees($attendees);

                        $updatedEvent = $service->events->update($reservation['calendar_id'], $event->getId(), $event, array('sendNotifications' => true));
                        $this->reservation_v2_model->setRaveStatus($reservation['id'], "accepted");
                    } elseif ($owner->getResponseStatus() == "declined") {
                        if ($reservation['rave_status'] != "declined") {
                            $this->reservation_v2_model->setRaveStatus($reservation['id'], "declined");
                            send_email('Rave reservation was declined', 'info@allravetransportation.com', $reservation['email'], $reservation, 'declined');
                        }
                    }
                } else {
                    $client = $attendees[1];
                    if ($client->getResponseStatus() == "accepted" && $reservation['client_status'] != "accepted") {
                        $this->reservation_v2_model->setClientStatus($reservation['id'], "accepted");
                        send_email('Rave reservation was confirmed by client', 'info@allravetransportation.com', $owner->getEmail(), $reservation+['htmlLink' => $event->htmlLink], 'client_accepted');
                    }
                    if ($client->getResponseStatus() == "declined" && $reservation['client_status'] != "declined") {
                        $this->reservation_v2_model->setClientStatus($reservation['id'], "declined");
                        send_email('Rave reservation was declined by client', 'info@allravetransportation.com', $owner->getEmail(), $reservation+['htmlLink' => $event->htmlLink], 'client_declined');
                    }
                }
            } else {
                $service->channels->stop($channel);
            }
        }
    }

    public function index()
    {
        $data['count_vehicles'] = $this->appmodel->count_vehicles();
        $this->load->model('places/place_model');
        $this->load->model('flights/airline_model');
        $this->load->model('flights/flight_model');
        $data['places'] = $this->place_model->places();

        $airlines = $this->airline_model->activeAirlines();

        if (count($airlines)) {
            foreach ($airlines as &$airline) {
                $airline->flights = $this->flight_model->activeFlights($airline->id);
            }
        }

        $data['airlines'] = $airlines;

        //include the form validation library.
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Name', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');//|max_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('pickup_address', 'Pickup Address:', 'trim|required');
        $this->form_validation->set_rules('drop_address', 'Drop Address', 'trim|required');
        $this->form_validation->set_rules('passenger', 'Car', 'trim|required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('reservation_dev', $data);
        } else {
            try {
                date_default_timezone_set('America/Chicago');
                $date = $this->input->post('date');
                $fulldate = DateTime::createFromFormat('m/d/Y H:i A', $date);
                $datetime  = $fulldate->format('Y-m-d H:i:s');

                $date = $fulldate->format('Y-m-d');
                $time = $fulldate->format('H:i:s');

                $airline = null;
                $flight = null;
                if ($this->input->post('airline')) {
                    $airline = $this->airline_model->getById($this->input->post('airline'));
                    $flight = $this->flight_model->getById($this->input->post("flightnumber-".$this->input->post('airline')));
                }

                $data = array(
                    'name' => $this->input->post('username'),
                    'phone' => $this->input->post('phone'),
                    'alternate_phone1' => $this->input->post('alternate_phone1'),
                    'alternate_phone2' => $this->input->post('alternate_phone2'),
                    'email' => $this->input->post('email'),
                    'date' => $datetime,
                    'flight_number' => $flight ? $airline->name." ".$flight->path : $this->input->post('flightnumber'),
                    'arrival_time' => $this->input->post('usr_time'),
                    'pickup_address' => $this->input->post('pickup_address'),
                    'dropoff_address' => $this->input->post('drop_address'),
                    'car' => $this->input->post('passenger') == "1" ? "Yukon XL" : "Lexus RX",
                    'special_instruction' => $this->input->post('special_instruction'),
                );

                $this->load->model('reservation_v2_model');
                $id = $this->reservation_v2_model->form_insert($data);

                if ($id) {
                    require_once 'google-api-php-client-master/vendor/autoload.php';
                    
                    $client = new Google_Client();
                    $client->setAuthConfig('client-secret.json');
                    $access_token = json_decode(file_get_contents('access-token.json'), true);
                    $refresh_token = file_get_contents('refresh-token.txt');
                    $client->setAccessToken($access_token);
                    if ($client->isAccessTokenExpired()) {
                        $client->refreshToken($refresh_token);
                        $access_token = $client->getAccessToken();
                        file_put_contents('access-token.json', json_encode($access_token));
                    }

                    $client->setScopes(Google_Service_Calendar::CALENDAR);

                    $service = new Google_Service_Calendar($client);

                    $description =
                        "Name: {$data['name']}\n".
                        "Phone: {$data['phone']}\n".
                        "Email: {$data['email']}\n".
                        "Date/Time: ".date('m/d/Y h:i A', strtotime($data['date']))."\n".
                        "Flight Number: {$data['flight_number']}\n".
                        "Arrival Time: {$data['arrival_time']}\n".
                        "Pickup Address: {$data['pickup_address']}\n".
                        "Dropoff address: {$data['dropoff_address']}\n".
                        "Car: {$data['car']}\n".
                        "Special Instructions: {$data['special_instruction']}\n\n\n".
                        "Please confirm if you are going.";

                    $event = new Google_Service_Calendar_Event(array(
                      'summary' => 'Rave Reservation',
                      'location' => "{$data['pickup_address']}",
                      'description' => $description,
                      'start' => array(
                        'dateTime' => $fulldate->format(DateTime::RFC3339),
                      ),
                      'end' => array(
                        'dateTime' => $fulldate->format(DateTime::RFC3339),
                      ),
                      'attendees' => array(
                        array('email' => '610allrave@gmail.com', 'displayName' => 'Rave Luxury Transportation', 'responseStatus' => 'needsAction'),
                      ),
                      'reminders' => array(
                        'useDefault' => false,
                        'overrides' => array(
                          array('method' => 'popup', 'minutes' => 24 * 60),
                          array('method' => 'popup', 'minutes' => 2 * 60),
                          array('method' => 'popup', 'minutes' => 60),
                          array('method' => 'popup', 'minutes' => 45)
                        ),
                      ),
                    ));

                    $calendarId = 'primary';
                    $event = $service->events->insert($calendarId, $event, array('sendNotifications' => true));
                    $this->reservation_v2_model->set_calendar($id, $calendarId, $event->id);

                    $service->events->watch($calendarId, new Google_Service_Calendar_Channel(array(
                        "id" => "notify_{$id}",
                        "type" => "web_hook",
                        "address" => "https://www.allravetransportation.com/allrave/reservation/notifications"
                        //"expiration" => $fulldate->format("U")
                    )));

                    $this->session->set_flashdata('message', 'Your Request has been received by us, we will contact you shortly. Meanwhile, You can book another ride.');
                    redirect('reservation/thankyou');
                } else {
                    $this->session->set_flashdata('message', 'Your Request could not be saved due to some problem, Kindly try again.');
                    redirect('reservation/thankyou');
                }
            } catch (Exception $e) {

                $webmaster = $this->appmodel->get_all_records_simple('config', array('config_key' => 'webmaster_email'));
                $from = $webmaster[0]['value'];

                $data['admin_subject'] = 'Request failed!';
                $data['heading'] = 'The following request has been posted';
                
                $data['airline'] = $airline;
                $data['flight'] = $flight;
                $data['error'] = $e->getMessage();

                $admin = $this->appmodel->get_all_records_simple('config', array('config_key' => 'admin_email'));
                $to = $admin[0]['value'];
                send_email($data['admin_subject'], $from, $to, $data, 'request_fail');

                file_put_contents('exceptions.log', $e->getMessage(), FILE_APPEND);
                $this->session->set_flashdata('message', 'Your Request could not be saved due to some problem, Kindly try again.');
                redirect('reservation/thankyou');
            }
        }
    }


    //This method is used to save the reservation form data into the database.
    public function thankyou()
    {
        $this->load->view('message');
    }

    public function select_validate($select_val)
    {
        if ($select_val=="Number of Passenger") {
            $this->form_validation->set_message('select_validate', 'Please Select The Number Of Passengers.');
            return false;
        } else {
            return true;
        }
    }

    public function getfullslots()
    {
        $date = $this->input->post('date');
        $type = $this->input->post('type');
        $date = $this->_convertDate($date);//convert the date format.
        if ($type == 'reservation') {
            $slots = $this->appmodel->get_all_records_simple('slot_processing', array('date >=' => $date.' '.'00:00:00', 'date <=' => $date.' '.'23:45:00'));
        } else {
            //$slots = $this->reservation_model->getfullslots($date);
            $slots = $this->appmodel->get_all_records_simple('reservation', array('date >=' => $date.' '.'00:00:00','date <=' => $date.' '.'23:45:00','status' => 'accepted'));
        }

        echo json_encode($slots);
        exit;
    }

    //This method is used to convert the date format from d-m-Y to Y-m-d
    //So that we can search in the database table.
    private function _convertDate($date)
    {
        return date('Y-m-d', strtotime($date));
    }

    private function _full_slot($date, $time, $request_id, $email)
    {
        $full_slot = $this->appmodel->get_all_records_simple('full_slot', array('date' => $date,'time' => $time));
        if ($full_slot) {//if fullslot then reject
            //set the status to rejected.
            $this->appmodel->update('reservation', array('status' => 'rejected'), array('id' => $request_id));
            //make an entry in email table.
            $this->appmodel->insert('schedule_email', array('email' => $email,'type' => 'rejected','reservation_id' => $request_id,'status' => 0,'date' => date('Y-m-d')));
        } else { //if not a fullslot then check for padding effect.
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
            $admin = $this->appmodel->get_all_records_simple('config', array('config_key' => 'admin_email'));
            $admin_email = $admin[0]['value'];

            $this->appmodel->update('reservation', array('status' => 'accepted'), array('id' => $request_id));
            $this->appmodel->insert('schedule_email', array('email' => $email,'type' => 'accepted','reservation_id' => $request_id,'status' => 0,'date' => date('Y-m-d')));
            $this->appmodel->insert('schedule_email', array('email' => $admin_email,'type' => 'admin_accepted','reservation_id' => $request_id,'status' => 0,'date' => date('Y-m-d')));
            $this->appmodel->insert('schedule_email', array('email' => $email,'type' => 'reminder','reservation_id' => $request_id,'status' => 0,'date' => $date));
            $this->appmodel->insert('schedule_email', array('email' => $admin_email,'type' => 'admin_reminder','reservation_id' => $request_id,'status' => 0,'date' => $date));

                //fill the slot_processing table.
                $currentDate = strtotime($date.' '.$time);
            $currentDate_negative = $currentDate;
            $interval = 0;
            for ($i = 0; $i< 8; $i++) {
                $futureDate = $currentDate+(60*$interval);
                $new_date = date("Y-m-d H:i:s", $futureDate);
                $data = array('date' => $new_date,'reservation_id' => $request_id);
                $this->appmodel->insert('slot_processing', $data);
                $interval +=  15;
            }
            $interval = -15;
            for ($i = 8; $i> 0; $i--) {
                $futureDate = $currentDate_negative+(60*$interval);
                $new_date = date("Y-m-d H:i:s", $futureDate);
                $data = array('date' => $new_date,'reservation_id' => $request_id);
                $this->appmodel->insert('slot_processing', $data);
                $interval -=  15;
            }

                //check if full slot has happened.
                $full_slot = $this->appmodel->get_all_records_simple('reservation', array('date' => $date.' '.$time, 'status' => 'accepted'));
            $full_slot_count = ($full_slot) ? count($full_slot) : 0;

            if ($full_slot_count == $count_vehicles) {
                //if the full slot has happened then insert it in the full slot table.
                    $this->appmodel->insert('full_slot', array('date' => $date, 'time' => $time));
            }
            //}
        }
    }

    public function alpha_space($str)
    {
        return (! preg_match("^[a-zA-Z][a-zA-Z\\s]+$", $str)) ? false : true;
    }

    public function get_distance_rate()
    {
        $distance = $this->input->post('distance');
        $distance_rate = $this->appmodel->get_all_records_simple('distance_rate', array('bottom <' => $distance, 'top >=' => $distance));
        echo json_encode($distance_rate[0]['price']); //return the price.
        exit;
    }

    public function reject()
    {
        //if the appointment is cancelled then.
        //set the status to rejected in the reservation table.
        //delete the slots form the slot processing table.
        //delete the full slot.

        $reservation_id = $this->uri->segment(3);
        $data = $this->appmodel->get_all_records_simple('reservation', array('id' => $reservation_id));
        $type = $data[0]['status'];
        $this->appmodel->update('reservation', array('status' => 'rejected'), array('id' => $reservation_id));

        $data = $this->appmodel->get_all_records_simple('reservation', array('id' => $reservation_id));
        $cdt = date("Y-m-d H:i:s", time() - 60 * 60 * 5);
        $date = $data[0]['date'];
        $admin = $this->appmodel->get_all_records_simple('config', array('config_key' => 'admin_email'));
        $admin_email = $admin[0]['value'];

        if (strtotime($date) - strtotime($cdt) > 21600 && $type == 'accepted') { //if there is difference of at least 6 hours.
            $this->appmodel->delete('slot_processing', array('reservation_id' => $reservation_id));
            $this->appmodel->delete('full_slot', array('date' => date('Y-m-d', strtotime($date)), 'time' => date('H:i:s', strtotime($date))));
            $this->appmodel->insert('schedule_email', array('email' => $data[0]['email'],'type' => 'cancelled','reservation_id' => $reservation_id,
                'status' => 0, 'date' => date('Y-m-d')));
            $this->appmodel->insert('schedule_email', array('email' => $admin_email,'type' => 'admin_cancelled','reservation_id' => $reservation_id,
                'status' => 0, 'date' => date('Y-m-d')));
            $this->appmodel->delete('schedule_email', array('reservation_id' => $reservation_id,'type' => 'reminder'));
            $this->appmodel->delete('schedule_email', array('reservation_id' => $reservation_id,'type' => 'admin_reminder'));
           //set the message that the ride has been cancelled.
            $this->session->set_flashdata('message', 'Your booking has been cancelled');
        } else { //if the difference is less than 6 hours
            //set the message that the ride cannot be cancelled.
            $this->session->set_flashdata('message', 'Your booking cannot be cancelled now, Contact us to cancel your booking');
        }
        $this->load->view('reservation');
    }

    //code to find the distence between two zip codes
        // This function returns Longitude & Latitude from zip code.
        public function getLnt($zip)
        {
            $url = "https://maps.googleapis.com/maps/api/geocode/json?address=
        ".urlencode($zip)."&sensor=false";
            $result_string = file_get_contents($url);
            $result = json_decode($result_string, true);
            $result1[]=$result['results'][0];
            $result2[]=$result1[0]['geometry'];
            $result3[]=$result2[0]['location'];
            return $result3[0];
        }

    public function getDistance($zip1, $zip2)
    {
        $first_lat = $this->getLnt($zip1);
        $next_lat = $this->getLnt($zip2);
        $lat1 = $first_lat['lat'];
        $lon1 = $first_lat['lng'];
        $lat2 = $next_lat['lat'];
        $lon2 = $next_lat['lng'];
        $theta=$lon1-$lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +
        cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
        cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        //$unit = strtoupper($unit);

        //if ($unit == "K"){
        //return ($miles * 1.609344)." ".$unit;
        //}
        //else if ($unit =="N"){
        //return ($miles * 0.8684)." ".$unit;
        //}
        //else{
        return $miles." miles";
    }
    //end of code to find the distence between two zip codes
}

/* End of file reservation.php */
