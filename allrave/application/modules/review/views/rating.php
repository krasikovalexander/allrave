<!doctype html>
<html>
<head>
    <title>Reservation Form Page Layouts</title>
    <link href="<?php echo base_url() ?>resource/css/review_form.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?php echo base_url() ?>resource/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?php echo base_url() ?>resource/css/bootstrap-rating.css" type="text/css" rel="stylesheet" media="all">
    <!--web-font-->
    <link
        href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400'
        rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url() ?>resource/css/menu_styles.css" rel="stylesheet">
    <!--//web-font-->
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <script type="text/javascript" src="<?php echo base_url() ?>resource/js/min_js.js"></script>
    <!--//main menu  -->
    <script src="<?php echo base_url() ?>resource/js/script.js"></script>
    <script src="<?php echo base_url() ?>resource/js/bootstrap-rating.js"></script>
    <script>
        $(document).ready(function () {
            $('input .rating').rating();
        });
    </script>
</head>

<body>
<div class="container">
    <!--  //Top Header  -->
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-8">
                <figure><img src="<?php echo base_url() ?>resource/images/rave-logo3.png" alt="" title=""/></figure>
            </div>
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
                <li><a href="#"><span>Request an appointment</span></a></li>
		<li class="last active"><a href="<?php echo base_url()?>review/view_reviews"><span>Reviews</span></a></li>
            </ul>
        </div>
    </div>
    <!--  //Reservation Form  -->
    <div class="row">
        <div class="form-control-feedback">

            <div class="col-lg-8 star">
                <?php $attributes = array('id' => 'review_form'); ?>
                <?php echo form_open('review', $attributes); ?>
                <!--<form action="review/review" method="post" id="ratingsForm">-->
                <label>Name:*</label>
                <input type="text" name="username" required placeholder="Name" onkeyup = "this.value=this.value.replace(/[^a-z ^A-Z]/g,'')" />

                <label>Rating:*</label>
                <input type="hidden" name="rating" class="rating" /> <!--data-fractions="2"-->

                <label>Feedback:*</label>
                <textarea name="feedback" id="feedback"></textarea>
                <input type="submit" value="SUBMIT" class="submit"/>
                </form>
                <p><strong class="spacolor">Special Instruction:</strong>Please make sure your details are correct
                    before submitting form and that all fields marked with * are completed!.</p>
            </div>
            <div class="col-lg-4 rightside">
                <h2>Have Questions? </h2>

                <p>If you have any questions or concerns please feel free to contact us:<br/>
                    Tel: (610) 255-7283<br/>
                    Toll Free: (844)-733-7283</p>
            </div>
        </div>
    </div>

    <!--  //Top footer  -->
    <div class="row">
        <div class="col-lg-12 top_bottom">
            <div class="col-lg-4">
                <figure><img src="<?php echo base_url() ?>resource/images/rave-transportation-footer-1.jpg" alt=""
                             title=""/></figure>
            </div>
            <div class="col-lg-4 facebook_text">
                <h4>Join our social media network and stay informed with our promotions.</h4>
                <figure>
                    <img src="<?php echo base_url() ?>resource/images/icon-facebook.png" alt="" title=""/>
                </figure>
            </div>
            <div class="col-lg-4">
                <figure><img src="<?php echo base_url() ?>resource/images/rave-transportation-footer-2.jpg" alt="" title=""/></figure>
            </div>
        </div>
    </div>

    <!--  //bottom footer  -->
    <div class="row">
        <div class="col-lg-12 copyright"> Premium Business WordPress themes | Login</div>
    </div>
</div>
</body>
</html>
