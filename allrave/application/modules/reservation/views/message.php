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

    <!--  //Top Header  -->
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-8"><figure><img src="<?=base_url()?>resource/images/rave-logo3.png" alt="" title="" /></figure></div>
            <div class="col-lg-4 callus"><h3>IF YOU HAVE QUESTIONS<br/>
                    CALL US NOW AT<br/>
                    Tel: (610) 255-7283<br/>
                    Toll Free: (844)-733-7283</h3></div>
        </div>
    </div>
    <!--  //main menu  -->
    <div class="row main_menu">
        <div id="cssmenu">
            <ul>
                <li><a href="#"><span>Home</span></a></li>
                <li class="has-sub"><a href="#"><span>Company</span></a>
                    <ul>
                        <li class="has-sub"><a href="#"><span>Product 1</span></a></li>
                        <li class="has-sub"><a href="#"><span>Product 2</span></a></li>
                    </ul>
                </li>
                <li><a href="#"><span>Services</span></a></li>
                <li><a href="#"><span>Photo Gallery</span></a></li>
                <li class="last active"><a href="#"><span>Request an appointment</span></a></li>
            </ul>
        </div>
    </div>
    <!--  //Reservation Form  -->
    <div class="message text-center">
        <?php $message = $this->session->flashdata('message'); ?>
        <h3><?php echo $message ;?></h3>
    </div>

    <!--  //Top footer  -->
    <div class="row">
        <div class="col-lg-12 top_bottom">
            <div class="col-lg-4">
                <figure><img src="<?=base_url()?>resource/images/rave-transportation-footer-1.jpg" alt="" title="" /></figure>
            </div>
            <div class="col-lg-4 facebook_text">
                <h4>Join our social media network and stay informed with our promotions.</h4>
                <figure>
                    <img src="<?=base_url()?>resource/images/icon-facebook.png" alt="" title="" />
                </figure>
            </div>
            <div class="col-lg-4">
                <figure><img src="<?=base_url()?>resource/images/rave-transportation-footer-2.jpg" alt="" title="" /></figure>
            </div>
        </div>
    </div>

    <!--  //bottom footer  -->
    <div class="row">
        <div class="col-lg-12 copyright"> Premium Business WordPress themes | Login	</div>
    </div>
</div>

</body>
</html>