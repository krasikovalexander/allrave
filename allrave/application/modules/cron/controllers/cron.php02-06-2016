<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron extends MX_Controller
{
    //Required functions in cron.
    //1) Send the current emails from the schedule_email table (every 10 minutes).✔
    //2) Clear the previous slot entries (twice in a day).✔
    //3) Send Review email (every 10 minutes).✔
    //check if current time is at least 2 hours greater than the ride appointment time.
    //if yes then send an email to the user having the review link.

    function __construct()
    {
        parent::__construct();
        $this->load->model('cron_model');
        $this->load->model('appmodel');
        $this->load->library('email');
        $this->load->helper('email_helper');
    }

    //This function is used to test the mail sending process.
    /*function send_mail_every_ten_minutes()
    {
        $webmaster = $this->appmodel->get_all_records_simple('config',array('config_key' => 'webmaster_email'));
        $webmaster_email = $webmaster[0]['value'];
        $subject = 'Test Mail';
        $email_to = 'avinash360@yopmail.com';
        $current_time = date("Y-m-d H:i:s");
        $code = $this->code();
        $data = array('time' => $current_time,'code' =>$code);
        $view = 'test_mail';
        send_email($subject,$webmaster_email,$email_to,$data,$view);
        log_message('debug', "Current Date $current_time \n Code : $code");

    }*/

    /*function code($length = 4, $chars = 'abcdefghijklmnopqrstuvwxyz1234567890')
    {
        $chars_length = (strlen($chars) - 1);
        $string = $chars{rand(0, $chars_length)};
        for ($i = 1; $i < $length; $i = strlen($string))
        {
            $r = $chars{rand(0, $chars_length)};
            if ($r != $string{$i - 1}) $string .= $r;
        }
        return $string;
    }*/

    function send_reminder_email()
    {
        //send email a day before or at 3 am.
        //get all the emails from the schedule_email table where appointment date today.
        $cdt = date("H:i:s", time() - 60 * 60 * 5);

        //if ($cdt > '06:59:00' && $cdt < '07:02:00') {

            $emails = $this->appmodel->get_all_records_simple('schedule_email', array('status' => 0, 'type' => 'reminder', 'date' => date('Y-m-d', strtotime($cdt . '+ 1 days'))));

            foreach ($emails as $email) {
                $this->send_cron_email($email['id'], $email['email'], $email['type'], $email['reservation_id']);
            }

            $admin = $this->appmodel->get_all_records_simple('config', array('config_key' => 'admin_email'));
            $admin_email = $admin[0]['value'];

            $emails = $this->appmodel->get_all_records_simple('schedule_email', array('status' => 0, 'type' => 'admin_reminder', 'date' => date('Y-m-d', strtotime($cdt . '+ 1 days'))));

            foreach ($emails as $email) {
                $this->send_cron_email($email['id'], $admin_email, $email['type'], $email['reservation_id']);
            }
        //}
    }

    function send_schedule_emails()
    {
        //$emails = $this->appmodel->get_all_records_simple('schedule_email',array('status' => 0,'type <>' => 'reminder','date' => date('Y-m-d' , time() - 60 * 60 * 5)));
        $emails = $this->cron_model->get_schedule_emails();
        if($emails) {
            foreach ($emails as $email) {
                $this->send_cron_email($email->id, $email->email, $email->type, $email->reservation_id);
            }
        }
    }

    function delete_previous_slots()
    {
        //clear the slots before the current date.
        $cdt = date("Y-m-d", time() - 60 * 60 * 5);
        $this->appmodel->delete('slot_processing',array('date <' => $cdt));
    }

    //detect all the request entries ready to be sent a review form email
    function review_email()
    {
        $cdt = date("Y-m-d H:i:s", time() - 60 * 60 * 5);
        //get all the records where status is accepted and date is greater than current time.
        //changes made here.
        $reservations = $this->appmodel->get_all_records_simple('reservation', array('status' => 'accepted', 'date <' => date("Y-m-d H:i:s", strtotime($cdt) - 60 * 60 * 2), 'date >' => date("Y-m-d H:i:s", strtotime($cdt) - 60 * 60 * 1.5)));

        if ($reservations) {
            foreach ($reservations as $reservation) {
                $review_exists = $this->appmodel->get_all_records_simple('schedule_email', array('email' => $reservation['email'], 'type' => 'review'));
                if (!$review_exists) {
                    //make an entry into the schedule email table.
                    $this->appmodel->insert('schedule_email', array('email' => $reservation['email'],
                        'type' => 'review', 'reservation_id' => $reservation['id'], 'status' => '0', 'date' => date('Y-m-d' , time() - 60 * 60 * 5)));
                }
            }
        }
    }

    private function send_cron_email($email_id,$email_to,$email_type,$reservation_id)
    {
        $data['user'] = $this->appmodel->get_all_records_simple('reservation',array('id' => $reservation_id));//get the reservation data.

        if($email_type == 'accepted')
        {
            $subject = 'Congratulations your ride has been booked';
            $view = 'accepted';
            //if the current time is at least 6 hours less than the appointment time.
            if((strtotime($data['user'][0]['date']) - (strtotime(date("Y-m-d H:i:s", time() - 60 * 60 * 5))) > 21600))
            {
                $data['accepted'] = true;
            }
        }
        else if($email_type == 'admin_accepted')
        {
            $subject = 'A Ride has been booked';
            $view = 'admin_accepted';
        }
        else if( $email_type == 'rejected')
        {
            $subject = 'Sorry your ride could not be booked';
            $view = 'rejected';
            $this->_remove_calendar_event($reservation_id);
        }
        elseif( $email_type == 'review')
        {
            $subject = 'Thank you for using All Rave Transportation';
            $view = 'review';
        }
        elseif( $email_type == 'reminder')
        {
            $subject = 'Rave Luxury Transportation appointment reminder';
            $view = 'reminder';
        }
        elseif( $email_type == 'admin_reminder')
        {
            //$subject = 'You have the following ride appointment';
            $subject = 'Rave Luxury Transportation appointment reminder';
            $view = 'admin_reminder';
        }
        elseif( $email_type == 'cancelled')
        {
            $subject = 'You have cancelled your booking';
            $view = 'cancelled';
            $this->_remove_calendar_event($reservation_id);
        }
        else if($email_type == 'admin_cancelled')
        {
            $subject = 'The following booking has been cancelled';
            $view = 'admin_cancelled';
        }
        else
        {
            $subject = '';
            $view = '';
        }

        $webmaster = $this->appmodel->get_all_records_simple('config',array('config_key' => 'webmaster_email'));
        $webmaster_email = $webmaster[0]['value'];

        if(!($email_type == 'admin_accepted' || $email_type == 'admin_reminder' || $email_type == 'admin_cancelled'))
        {

            send_email($subject,$webmaster_email,$email_to,$data,$view);
        }
        else
        {
            $data['admin_name'] = 'Mike';
            send_email($subject,$webmaster_email,$email_to,$data,$view);
        }
        $this->appmodel->update('schedule_email',array('status' => 1), array('id' => $email_id));

        if($email_type == 'accepted')
        {
            //add the calendar event.

            $this->_set_calendar_event($reservation_id);
        }
    }

    private function _set_calendar_event($reservation_id)
    {
        $reservation = $this->appmodel->get_all_records_simple('reservation',array('id' => $reservation_id));
        $pickup_address = $reservation[0]['pickup_address'];
        $pickup_city = $reservation[0]['pickup_city'];
	    $pickup_state = $reservation[0]['pickup_state'];
	    $pickup_zip = $reservation[0]['pickup_zip'];
	    $flight = $reservation[0]['flight_number'];
	
	    $drop_address = $reservation[0]['dropoff_address'];
        $drop_city = $reservation[0]['dropoff_city'];
	    $drop_state = $reservation[0]['dropoff_state'];
	    $drop_zip = $reservation[0]['dropoff_zip'];
        $special_instruction = $reservation[0]['special_instruction'];

        $appointment_date = $reservation[0]['date'];
        $title = 'Pickup '.$reservation[0]['name'].' From '.$pickup_address.','.$pickup_city.','.$pickup_state.','.$pickup_zip.' to '.$drop_address.','.$drop_city.','.$drop_state.','.$drop_zip;

        $cal_id = 'm3hhu0mmpbsbr7h08dua2p0428@group.calendar.google.com';//mikemcmay@gmail.com calendar id.

        /************************************************
         * Make an API request authenticated with a service
         * account.
         ************************************************/

        require_once 'google-api-php-client/src/Google/autoload.php';
        require_once 'google-api-php-client/src/Google/Client.php';
        require_once 'google-api-php-client/src/Google/Service/Calendar.php';

        $client_id = '80971229196-voije5o15tcbim4ipekn4gtg8m7o7udo.apps.googleusercontent.com';
        $service_account_name = '80971229196-voije5o15tcbim4ipekn4gtg8m7o7udo@developer.gserviceaccount.com';

        //the location of the key file .
        $key_file_location = 'allrave-5e13ec556878.p12';

        if (!strlen($service_account_name) || !strlen($key_file_location))
            echo missingServiceAccountDetailsWarning();

        $client = new Google_Client();
        $client->setApplicationName("allrave");

        if (isset($_SESSION['service_token'])) {
            $client->setAccessToken($_SESSION['service_token']);
        }

       // var_dump('000000000000000');
        $key = file_get_contents($key_file_location);
        $cred = new Google_Auth_AssertionCredentials(
            $service_account_name,
            array('https://www.googleapis.com/auth/calendar'),
            $key
        );
        $client->setAssertionCredentials($cred);
        //var_dump('1111111');
        if ($client->getAuth()->isAccessTokenExpired()) {
            $client->getAuth()->refreshTokenWithAssertion($cred);
        }
        $_SESSION['service_token'] = $client->getAccessToken();
        //var_dump($client->getAccessToken());

        $calendarService = new Google_Service_Calendar($client);
        //var_dump('calendarService '.$calendarService);

	    $date = date('Y-m-d', strtotime($appointment_date));
	    $time = date('h:i a', strtotime($appointment_date));

        //$createdEvent = $calendarService->events->quickAdd($cal_id, $title.' at '.$pickup_address.
           // ' ,'.$pickup_city.' on '.$appointment_date);//April 23rd 10am-10:25am');

	//this one is working nicely.
	//$createdEvent = $calendarService->events->quickAdd($cal_id, $title.' at '.$pickup_address.
         //   ' ,'.$pickup_city.' on '.$date.' at '.$time);

	$createdEvent = $calendarService->events->quickAdd($cal_id, $title.' on '.$date.' at '.$time.' Flight Number: '. $flight. ' Phone :'.$reservation[0]['phone']
.' Passengers: '.$reservation[0]['number_of_passengers'].', Email : '. $reservation[0]['email'].', Special Instructions : '. $special_instruction);

        $event_id = $createdEvent->getId();
        echo $event_id;

        $this->appmodel->insert('calendar_events',array('event_id' => $event_id,'reservation_id' => $reservation_id));
    }



    private function _remove_calendar_event($reservation_id)
    {
        //get the reservation id and the event id and delete the event from the admin's gmail calendar.

        $cal_id = 'm3hhu0mmpbsbr7h08dua2p0428@group.calendar.google.com';//mikemcmay@gmail.com calendar id.
       
        /************************************************
         * Make an API request authenticated with a service
         * account.
         ************************************************/

        require_once 'google-api-php-client/src/Google/autoload.php';
        require_once 'google-api-php-client/src/Google/Client.php';
        require_once 'google-api-php-client/src/Google/Service/Calendar.php';

        $client_id = '80971229196-voije5o15tcbim4ipekn4gtg8m7o7udo.apps.googleusercontent.com';

        //uncomment this line in the production website.
        $service_account_name = '80971229196-voije5o15tcbim4ipekn4gtg8m7o7udo@developer.gserviceaccount.com';


        //the location of the key file .
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

    /*public function calendar_details(){
        $cal_id = 'm3hhu0mmpbsbr7h08dua2p0428@group.calendar.google.com';

        require_once 'google-api-php-client/src/Google/autoload.php';
        require_once 'google-api-php-client/src/Google/Client.php';
        require_once 'google-api-php-client/src/Google/Service/Calendar.php';

        $client_id = '80971229196-voije5o15tcbim4ipekn4gtg8m7o7udo.apps.googleusercontent.com';
        $service_account_name = '80971229196-voije5o15tcbim4ipekn4gtg8m7o7udo@developer.gserviceaccount.com';

        $key_file_location = 'allrave-5e13ec556878.p12';

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

        $event = TRUE;
        $event_id = '9qmvp8bifgtmd3k6iuf82al9qo';
        if($event)
        {
            $calendarService = new Google_Service_Calendar($client);
            echo '<pre>';
            var_dump($calendarService->events->get($cal_id, $event_id));
        }
    }*/

    /*public function view_calendar()
    {
        $reservation = $this->appmodel->get_all_records_simple('reservation',array('id' => '357'));
        $pickup_address = $reservation[0]['pickup_address'];
        $pickup_city = $reservation[0]['pickup_city'];
        $pickup_state = $reservation[0]['pickup_state'];
        $pickup_zip = $reservation[0]['pickup_zip'];
        $flight = $reservation[0]['flight_number'];

        $drop_address = $reservation[0]['dropoff_address'];
        $drop_city = $reservation[0]['dropoff_city'];
        $drop_state = $reservation[0]['dropoff_state'];
        $drop_zip = $reservation[0]['dropoff_zip'];
        $special_instruction = $reservation[0]['special_instruction'];

        $appointment_date = $reservation[0]['date'];
        $title = 'Pickup '.$reservation[0]['name'].' From '.$pickup_address.','.$pickup_city.','.$pickup_state.','.$pickup_zip.' to '.$drop_address.','.$drop_city.','.$drop_state.','.$drop_zip;

        $cal_id = 'm3hhu0mmpbsbr7h08dua2p0428@group.calendar.google.com';//mikemcmay@gmail.com calendar id.

        require_once 'google-api-php-client/src/Google/autoload.php';
        require_once 'google-api-php-client/src/Google/Client.php';
        require_once 'google-api-php-client/src/Google/Service/Calendar.php';

        $client_id = '80971229196-voije5o15tcbim4ipekn4gtg8m7o7udo.apps.googleusercontent.com';
        $service_account_name = '80971229196-voije5o15tcbim4ipekn4gtg8m7o7udo@developer.gserviceaccount.com';

        $key_file_location = 'allrave-5e13ec556878.p12';

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

        $calendarService = new Google_Service_Calendar($client);

        $date = date('Y-m-d', strtotime($appointment_date));
        $time = date('h:i a', strtotime($appointment_date));
        $date = "2015-06-23";
        $time = "10:15 am";
        var_dump($date);
        var_dump($time);

        $createdEvent = $calendarService->events->quickAdd($cal_id, $title.' on '.$date.' at '.$time.' Flight Number: '. $flight. ' Phone :'.$reservation[0]['phone']
            .' Passengers: '.$reservation[0]['number_of_passengers'].', Email : '. $reservation[0]['email'].', Special Instructions : '. $special_instruction);
    }*/


}
