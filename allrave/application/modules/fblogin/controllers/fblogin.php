<?php

class fblogin extends MX_Controller {

public $user = "";

public function __construct() {
parent::__construct();

// Load facebook library and pass associative array which contains appId and secret key
$this->load->library('facebook', array('appId' => '1641066482849364', 'secret' => '303bc30d4932276d7c40cee9c37abe81'));

// Get user's login information
$this->user = $this->facebook->getUser();
}

// Store user information and send to profile page
public function index() 
{

	if ($this->user) 
	{ 
		//$data['user_profile'] = $this->facebook->api('/me/');
		//$data['user_profile'] = $this->facebook->api('/me','GET');

		$data['user_profile'] = $this->facebook->api('/me', array('fields' => 'name,first_name,last_name,gender,id,email'));


		//$data['user_profile1'] = $_SESSION['facebook_access_token'];

		// Get logout url of facebook
		$data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => base_url() . 'fblogin/logout'));

		// Send data to profile page
		//$this->load->view('profile', $data);
		
		$_SESSION['user_type'] = 'facebook';

		$this->load->view('profile', $data);
		//redirect('profile', $data);
	} 
	else 
	{
		// Store users facebook login url
		$params = array(
		  'scope' => array("email"),
		);
		$data['login_url'] = $this->facebook->getLoginUrl($params);
		$this->session->set_userdata('login_url', $this->facebook->getLoginUrl($params));
		//$this->load->view('login', $data);
		redirect('auth/login');
	}
}

// Logout from facebook
public function logout() {

// Destroy session
session_destroy();

// Redirect to baseurl
redirect(base_url());
}

}
?>