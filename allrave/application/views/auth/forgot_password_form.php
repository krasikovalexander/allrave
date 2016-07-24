<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'class'	=> 'form-control input-lg',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
?>

<?php  echo modules::run('sidebar/flash_msg');?>  

<section id="content" class="m-t-lg wrapper-md animated fadeInUp">

		<div class="container aside-xxl">
		 <a class="navbar-brand block" href="<?=base_url()?>"><?=$this->config->item('customer_name')?></a> 
		 <section class="panel panel-default bg-white m-t-lg">
		<header class="panel-heading text-center"> <strong><?=lang('Forgot_password')?> <?=$this->config->item('customer_name')?></strong> </header>

		<?php 
		$attributes = array('class' => 'panel-body wrapper-lg');
		echo form_open($this->uri->uri_string(),$attributes); ?>
			<div class="form-group">
				<label class="control-label"><?=lang('email')?>/<?=lang('username')?></label>
				<?php echo form_input($login); ?>
				<span style="color: red;">
				<?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></span>
			</div>

 <a href="<?=base_url()?>auth/login" class="pull-right m-t-xs"><small>Rembered Password?</small></a> 
			<button type="submit" class="btn btn-danger">Get new Password</button>
			<div class="line line-dashed">
			</div> 
			<?php if ($this->config->item('allow_registration', 'tank_auth')){ ?>
			<p class="text-muted text-center"><small>Do not have an account?</small></p> 
			<?php } ?>
			<a href="<?=base_url()?>auth/register/" class="btn btn-success btn-block">Get Your Account</a>
<?php echo form_close(); ?>

 </section>
	</div> 
	</section>
