<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Review extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('appmodel');
        $this->load->library('email');
        $this->load->helper('email_helper');
    }

    function index()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Name','trim|required');
        $this->form_validation->set_rules('rating','Rating','trim|required|min_length[1]');
        $this->form_validation->set_rules('feedback','Name','trim|required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('rating');
        }
        else
        {
            $name = $this->input->post('username');
            $rating = $this->input->post('rating');
            $feedback = $this->input->post('feedback');

            $data = array(
                'name' => $name,
                'rating' => $rating,
                'feedback' => $feedback
            );
            $this->appmodel->insert('reviews', $data);
            $data['heading'] = "$name Has filled a review";
            $user_subject = 'New Review';
            $webmaster = $this->appmodel->get_all_records_simple('config',array('config_key' => 'webmaster_email'));
            $from = $webmaster[0]['value'];
            $admin = $this->appmodel->get_all_records_simple('config',array('config_key' => 'admin_email'));
            $to = $admin[0]['value'];

            send_email($user_subject,$from,$to,$data,'review_email');
            redirect('review');
        }

    }

    function view_reviews()
    {
        $data['reviews'] = $this->appmodel->get_all_records_simple('reviews','');
        $this->load->view('testimonial',$data);
    }
}