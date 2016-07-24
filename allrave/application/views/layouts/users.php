<!DOCTYPE html>
<html lang="en" class="app">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <meta charset="utf-8" />
    <meta name="description" content="">
    <meta name="author" content="<?=$this->config->item('site_author')?>">
    <meta name="keyword" content="<?=$this->config->item('site_desc')?>">
    <link rel="shortcut icon" href="<?=base_url()?>resource/images/favicon.ico">
    <title><?php  echo $template['title'];?></title>
    <!-- Bootstrap core CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="<?=base_url()?>resource/css/app.v2.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>resource/js/toastr/toastr.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url()?>resource/css/font.css" type="text/css" cache="false" />
    <!--avi30-->
    <?php
    //if ($this->uri->segment(2) == 'update' OR $this->uri->segment(1) == 'messages' OR $this->uri->segment(3) == 'add' OR $this->uri->segment(3) == 'edit' OR $this->uri->segment(3) == 'send' OR $this->uri->segment(2) == 'settings') { ?>
    <?php if (isset($form)) { ?>
    <link rel="stylesheet" href="<?=base_url()?>resource/js/select2/select2.css" type="text/css" cache="false" />
    <link rel="stylesheet" href="<?=base_url()?>resource/js/select2/theme.css" type="text/css" cache="false" />
    <?php } ?>
    <?php
    if ($this->uri->segment(2) == 'help') { ?>
    <link rel="stylesheet" href="<?=base_url()?>resource/js/intro/introjs.css" type="text/css" cache="false" />
    <?php }  ?>
    <?php
    if (isset($datatables)) { ?>
    <link rel="stylesheet" href="<?=base_url()?>resource/js/datatables/datatables.css" type="text/css" cache="false" />
    <?php }  ?>
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js" cache="false">
    </script>
    <script src="js/ie/respond.min.js" cache="false">
    </script>
    <script src="js/ie/excanvas.js" cache="false">
    </script> <![endif]-->
    <script type="text/javascript" src="<?=base_url()?>resource/js/jscolor/jscolor.js"></script>
	<!--<script language="javascript" src="<?=base_url()?>resource/js/autocomplete/jquery.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resource/js/autocomplete/jquery-ui.js"></script>
	  <link rel="stylesheet" href="<?=base_url()?>resource/css/jquery.ui.css" type="text/css" />-->
	  
  </head>
  <body>
    <section class="vbox">
      <!--header start-->
      <?php echo modules::run('sidebar/top_header');?>
      <!--header end-->
      <section>
        <section class="hbox stretch">
          <?php
          if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) == 'admin') {
          echo modules::run('sidebar/admin_menu');
          }elseif ($this->tank_auth->user_role($this->tank_auth->get_role_id()) == 'collaborator') {
          echo modules::run('sidebar/collaborator_menu');
          }else{
          echo modules::run('sidebar/client_menu');
          }
          ?>
          <!--main content start-->
          <?php  echo $template['body'];?>
          <!--main content end-->
          <aside class="bg-light lter b-l aside-md hide" id="notes">
            <div class="wrapper">Notification
            </div> </aside>
          </section>
        </section>
      </section>
      <script src="<?=base_url()?>resource/js/jquery-2.1.1.min.js"></script>
      <script src="<?=base_url()?>resource/js/app.v2.js"></script>
      <script src="<?=base_url()?>resource/js/charts/easypiechart/jquery.easy-pie-chart.js" cache="false"></script>
      <script src="<?=base_url()?>resource/js/charts/sparkline/jquery.sparkline.min.js" cache="false"></script>
      <script src="<?=base_url()?>resource/js/toastr/toastr.js"></script>
      <!-- Bootstrap -->
      <!-- js placed at the end of the document so the pages load faster -->
      <?php  echo modules::run('sidebar/scripts');?>
      <?php
      if ($this->uri->segment(3) == 'details') { ?>
      <script type="text/javascript">
      $('[data-toggle="tabajax"]').click(function(e) {
      var $this = $(this),
      loadurl = $this.attr('href'),
      targ = $this.attr('data-target');
      $.get(loadurl, function(data) {
      $(targ).html(data);
      });
      $this.tab('show');
      return false;
      });
      </script>
      <?php } ?>
    </body>
  </html>
