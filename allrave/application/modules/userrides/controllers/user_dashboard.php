<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_dashboard extends MX_Controller
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
            lang('User Dashboard').' - '.$this->config->item('customer_name').' '.$this->config->item('version')
        );

         $this->template
            ->set_layout('users')
            ->build('user_dashboard',isset($data) ? $data : NULL);
    }

}
