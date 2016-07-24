<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Viewrides extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('appmodel');
        $this->load->helper('url');
        $this->load->library('email');
        $this->load->library('session');
        $this->load->library('tank_auth');
        $this->load->helper('email_helper');

    }

    function index()
    {
        $this->load->module('layouts');
        $this->load->library('template');
        $this->template->title(
            lang('User Rides').' - '.$this->config->item('customer_name').' '.$this->config->item('version')
        );




        $user_id = $this->tank_auth->get_user_id();
       // echo "user id fb:::".$user_id;
        //die("<br>die after user id");


        //get the rides by dates
        $now_time = date("Y-m-d H:i:s", time() - 60 * 60 * 5);//cdt time.

       // $query = $this->db->get_where('reservation', array('uid' => $user_id));

        //get the previous rides from reservation table.......
        $query = $this->db
                ->select('*', false)
                //->from('reservation_dummy')
                ->from('reservation')
                ->where('uid =', $user_id)
                ->where('status =', 'accepted')
                ->where('date <=', $now_time)
                ->distinct()
                //->group_by('pickup_address')
                ->group_by(array('pickup_address','dropoff_address'))
                ->get();
        $data['users_previous_rides'] = $query->result();

        //get the upcomming rides from reservation table.......
        $query1 = $this->db
                ->select('*', false)
                ->from('reservation')
                ->where('uid =', $user_id)
                ->where('status =', 'accepted')
                ->where('date >=', $now_time)
                ->distinct()
                //->group_by('pickup_address')
                ->group_by(array('pickup_address','dropoff_address'))
                ->get();
        $data['users_upcomming_rides'] = $query1->result();



        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        //$this->load->view('viewrides',$data);
         $this->template
            ->set_layout('users')
            ->build('viewrides',isset($data) ? $data : NULL);
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

}
