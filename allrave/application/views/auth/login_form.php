<?php
$login = array(
	'name'	=> 'login',
	'class'	=> 'form-control input-lg',
	'placeholder' => 'admin',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or Username';
} else if ($login_by_username) {
	$login_label = 'Username';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'inputPassword',
	'size'	=> 30,
	'class' => 'form-control input-lg'
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>



<?php 
//fb code
		// Load facebook library and pass associative array which contains appId and secret key
		$this->load->library('facebook', array('appId' => '1641066482849364', 'secret' => '303bc30d4932276d7c40cee9c37abe81'));
		// Get user's login information
		$this->user = $this->facebook->getUser();

		

	if ($this->user) 
	{ 
		$data['user_profile'] = $this->facebook->api('/me', array('fields' => 'name,first_name,last_name,gender,id,email'));
		// Get logout url of facebook
		$data['logout_url'] = $this->facebook->getLogoutUrl(array('next' => base_url() . 'fblogin/logout'));		
		$_SESSION['user_type'] = 'facebook';
		redirect('fblogin');
		//$this->load->view('profile', $data);
		//redirect('profile', $data);
	}
	else
	{



			$params = array(
			  'scope' => array("email"),
			);
			$this->session->set_userdata('login_url', $this->facebook->getLoginUrl($params));
			//$data['login_url'] = $this->facebook->getLoginUrl($params);
			$login_url_session = $this->facebook->getLoginUrl($params);
			//echo $login_url;
			//die("here");
	}

			//fb code ends here


?>


<section id="content" class="m-t-lg wrapper-md animated fadeInUp">


	


		<div class="container aside-xxl">
		 <a class="navbar-brand block" href="<?=base_url()?>"><?=$this->config->item('customer_name')?></a> 





		 <section class="panel panel-default bg-white m-t-lg">
		<header class="panel-heading text-center"> <strong><?=lang('welcome_to')?> <?=$this->config->item('customer_name')?></strong> 
			<?php  echo modules::run('sidebar/flash_msg');?>  
		</header>


		 <!-- fb login -->
		<?php $login_url_session = $this->session->userdata('login_url');?>
		<?php echo "<a href='$login_url_session'><img class='img-responsive' src=".base_url()."resource/images/facebook-login-blue.png"."></a>"; ?>
		<!-- fb login -->

		<?php 
		$attributes = array('class' => 'panel-body wrapper-lg');
		echo form_open($this->uri->uri_string(),$attributes); ?>
			<div class="form-group">
				<label class="control-label"><?=lang('email_user')?></label>
				<?php echo form_input($login); ?>
				<span style="color: red;">
				<?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></span>
			</div>
			<div class="form-group">
				<label class="control-label"><?=lang('password')?></label>
				<?php echo form_password($password); ?>
				<span style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></span>
			</div>


	<?php if ($show_captcha) {
		if ($use_recaptcha) { ?>
	<tr>
		<td colspan="2">
			<div id="recaptcha_image"></div>
		</td>
		<td>
			<a href="javascript:Recaptcha.reload()"><?=lang('Get_another_CAPTCHA')?></a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')"><?=lang('Get_an_audio_CAPTCHA')?></a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')"><?=lang('Get_an_image_CAPTCHA')?></a></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="recaptcha_only_if_image"><?=lang('Enter_the_words_above')?></div>
			<div class="recaptcha_only_if_audio"><?=lang('Enter_the_numbers_you_hear')?></div>
		</td>
		<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
		<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
		<?php echo $recaptcha_html; ?>
	</tr>
	<?php } else { ?>
	<tr>
		<td colspan="3">
			<p><?=lang('Enter_the_code_exactly')?></p>
			<?php echo $captcha_html; ?>
		</td>
	</tr>
	<tr>
		<td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
		<td><?php echo form_input($captcha); ?></td>
		<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
	</tr>
	<?php }
	} ?>

	<div class="checkbox">
				<label>
					<?php echo form_checkbox($remember); ?> <?=lang('This_is_my_computer')?></a>
				</label>
			</div>
 <a href="<?=base_url()?>auth/forgot_password" class="pull-right m-t-xs"><small><?=lang('Forgot_password')?></small></a> 
			<button type="submit" class="btn btn-primary"><?=lang('Sign_in')?></button>
			<div class="line line-dashed">
			</div> 
 </section>
	</div> 
	</section>
