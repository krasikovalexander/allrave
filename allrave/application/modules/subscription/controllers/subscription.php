<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subscription extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('appmodel');
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
            lang('subscription').' - '.$this->config->item('customer_name').' '.$this->config->item('version')
        );
        $data['page'] = lang('subscription');
        $this->template
            ->set_layout('users')
            ->build('subscription',isset($data) ? $data : NULL);
    }

    function send_subscription()
    {
        $data['email_body'] = $this->input->post('email_body');
        $subject = $this->input->post('subject');
        $view = "email_template";
        $subscribers = $this->appmodel->get_all_records_simple('subscribers');
        $webmaster = $this->appmodel->get_all_records_simple('config',array('config_key' => 'webmaster_email'));
        $from = $webmaster[0]['value'];
        foreach($subscribers as $subscriber)
        {
            $email = $subscriber['email'];
	    send_email($subject,$from,$email,$data,$view);
        }

        $this->session->set_flashdata('message', count($subscribers)." emails have been sent");
        redirect("subscription");
    }


    function dummy_subscription()
    {
        $data['email_body'] = $this->input->post('email_body');
        $subject = $this->input->post('subject');
        $view = "email_template";
        //$subscribers = $this->appmodel->get_all_records_simple('subscribers');
        $subscribers = $this->appmodel->get_all_records_simple('dummy_subscribers');
        // $subscribers = array(
        //             "deepak.anand@360itpro.com",
        //             "rakesh.budhlakoti@360itpro.com",
        //             "shammi@360itpro.com",
        //             //....as many email address as you need
        //             );

        $webmaster = $this->appmodel->get_all_records_simple('config',array('config_key' => 'webmaster_email'));
        //$webmaster = "testmail@test.com";
        $from = $webmaster[0]['value'];
        foreach($subscribers as $subscriber)
        {
            $email = $subscriber['email'];
            send_email($subject,$from,$email,$data,$view);
        }

        $this->session->set_flashdata('message', count($subscribers)." emails have been sent");
        redirect("subscription");
    }

}
