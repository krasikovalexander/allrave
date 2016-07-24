<!doctype html>
<html>
<head>
    <title>Reservation Form Page Layouts</title>
    <link href="<?=base_url()?>resource/css/formstyle.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>resource/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?=base_url()?>resource/css/bootstrap-datepicker.min.css" type="text/css" rel="stylesheet" media="all">
    <!--web-font-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400' rel='stylesheet' type='text/css'>
    <!--//web-font-->
    <!-- Custom Theme files -->
    <meta http-equiv="refresh" content="5; url=<?php echo 'reservation';?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!--//main menu  -->
    <link href="<?=base_url()?>resource/css/menu_styles.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <!--  //Reservation Form  -->
    <div class="message text-center">
        <?php $message = $this->session->flashdata('message'); ?>
        <h3><?php echo $message ;?></h3>
    </div>
</div>

</body>
</html>
