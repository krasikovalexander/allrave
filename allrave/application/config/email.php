<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Email
| -------------------------------------------------------------------------
| This file lets you define parameters for sending emails.
| Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/libraries/email.html
|
*/
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
$config['crlf'] = "\r\n";
$config['smtp_timeout'] = 30;
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'mail.allravetransportation.com';
$config['smtp_port'] = '587';
$config['smtp_user'] = 'info@allravetransportation.com';
//$config['smtp_pass'] = 'allravetrans';		
$config['smtp_pass'] = 'XRkWKApdW87(T';			//changed on 09-12 by deepak... uncomment the above code if any problem occure for mail

/* End of file email.php */
/* Location: ./application/config/email.php */
