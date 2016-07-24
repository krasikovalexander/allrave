<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if(! function_exists('send_email'))
{
    function send_email($subject,$from,$to,$data,$view)
    {
        $CI = & get_instance();
        $CI->load->library('email');
        $CI->email->from($from, 'All Rave Transportation');
        $CI->email->to($to);
        // $CI->email->bcc('avinash.thakur@360itpro.com');
        $CI->email->subject($subject);
        $message = $CI->load->view($view,$data,TRUE);
        $CI->email->message($message);

        if($CI->email->send())
        {
            return true;
        }
        else
        {
            //echo $CI->email->print_debugger();
            return false;
        }
    }
}
