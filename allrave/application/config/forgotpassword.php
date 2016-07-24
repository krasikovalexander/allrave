<style type="text/css">
.dcs_resend input#inputEmail {
    background-color: #FAFFBD !important;
    margin-left: 4px !important;
    color: #000 !important;
}
</style>

<?php
$email = array(
  'name'  => 'email',
  'id'  => 'email',
  'value' => $email,
  'maxlength' => 80,
  'size'  => 30,
  'class' => 'form-control input-lg'
);
?>

<div class="wrapper login-id dcs_resend">
  <div class="login-page">
    <?php if ($this->session->flashdata('response_status') == "code_resent_msg") { ?>
    <div class="alert alert-success">
      <button data-dismiss="alert" class="close" type="button">×</button>
        <i class="fa fa-ok-sign"></i><?php echo $this->session->flashdata('message'); ?>.
      </div>
    <?php } ?>
    <?php if ($this->session->flashdata('response_status') == "code_notsent_msg") { ?>
    <div class="alert alert-danger">
        <button data-dismiss="alert" class="close" type="button">×</button>
        <i class="fa fa-ok-sign"></i><?php echo $this->session->flashdata('message'); ?>.
    </div>
    <?php } ?>
    
    <!-- if user registered successfully -->
    <?php if ($this->session->flashdata('response_status') == "success_reg") { ?>
      <div class="alert alert-success">
          <button data-dismiss="alert" class="close" type="button">×</button>
          <i class="fa fa-ok-sign"></i><?php echo $this->session->flashdata('message'); ?>.
      </div>
    <?php } ?>

     <!-- if user registered successfully -->
    <?php if ($this->session->flashdata('response_status') == "account_not_active") { ?>
      
      <div class="alert alert-danger">
          <button data-dismiss="alert" class="close" type="button">×</button>
          <i class="fa fa-ok-sign"></i><?php echo $this->session->flashdata('message'); ?>.
          <?php $user_email=$this->session->flashdata('user_email'); ?>
      </div>

    <?php } ?>

     <!-- if user registered successfully -->
    <?php if ($this->session->flashdata('response_status') == "invalid_user") { ?>
      
      <div class="alert alert-danger">
          <button data-dismiss="alert" class="close" type="button">×</button>
          <i class="fa fa-ok-sign"></i><?php echo $this->session->flashdata('message'); ?>.
      </div>

    <?php } ?>



    <!-- if user activated successfully -->
    <?php if ($this->session->flashdata('response_status') == "success_active") { ?>
      <div class="alert alert-success">
          <button data-dismiss="alert" class="close" type="button">×</button>
          <i class="fa fa-ok-sign"></i><?php echo $this->session->flashdata('message'); ?>.
      </div>
    <?php } ?>

    <?php if ($this->session->flashdata('response_status') == "success") { ?>
      
      <div class="alert alert-success">
          <button data-dismiss="alert" class="close" type="button">×</button>
          <i class="fa fa-ok-sign"></i><?php echo $this->session->flashdata('message'); ?>.
      </div>

    <?php } 

    if ($this->session->flashdata('response_status') == "error") { ?>
      
      <div class="alert alert-danger">
          <button data-dismiss="alert" class="close" type="button">×</button>
          <i class="fa fa-ok-sign"></i><?php echo $this->session->flashdata('message'); ?>.
      </div>

    <?php } ?>

        <p class="signin-heading">Resend Activation Link </p>
    
        <?php 
    $attributes = array('class' => 'panel-body wrapper-lg');
    echo form_open( base_url().'auth/send_again',$attributes); ?>
    <!-- <form class="panel-body wrapper-lg" method="post" action="<?php echo base_url();?>auth/send_again"> -->
      <div class="form-group">
        <!-- <label class="control-label"><?=lang('email_address')?>Email</label> -->
        <input type="email" autofocus="" required="" placeholder="Enter Email" class="form-control" id="inputEmail" name="email" value="<?php echo $user_email; ?>">
        <?php /* echo form_input($email); */ ?>
        <!-- <span style="color: red;">
        <?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
        </span> -->
      </div>

      <input type="hidden" name="submit" value="1">
      <button type="submit" class="btn btn-primary">Resend Activation Link</button>
      <div class="line line-dashed">
      </div> 
     <!--  <?php if ($this->config->item('allow_registration', 'tank_auth')){ ?>
      <p class="text-muted text-center"><small>Do not have an account?</small></p> 
      <?php } ?>
      <a href="<?=base_url()?>auth/register/" class="btn btn-success btn-block">Get Your Account</a> -->
    </form>
<?php /* echo form_close(); */ ?>
  
  </div>
 <!--  <p>
    Don't have an account? <a href="<?=base_url()?>frontend#childrens">Create account</a> 
  </p> -->
  
</div>
  
