<!doctype html>
<html>
<head>
	<title>Reservation Form Page Layouts</title>
	<link href="<?php echo base_url()?>resource/css/formstyle.css" type="text/css" rel="stylesheet" media="all">
	<link href="<?php echo base_url()?>resource/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	<link href="<?php echo base_url()?>resource/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?php echo base_url()?>resource/css/simplePagination.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?php echo base_url() ?>resource/css/bootstrap-rating.css" type="text/css" rel="stylesheet" media="all">
	<!--web-font-->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400' rel='stylesheet' type='text/css'>
	<!--//web-font-->
	<!-- Custom Theme files -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>resource/js/min_js.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>resource/js/jquery.simplePagination.js"></script>
    <script src="<?php echo base_url() ?>resource/js/bootstrap-rating.js"></script>
    <!--//main menu  -->
    <link href="<?php echo base_url()?>resource/css/menu_styles.css" rel="stylesheet">
    <style>
        .feedback {
            background: lightgray;
            margin: 10px;
            border-radius: 10px;
            padding-bottom: 15px;
        }

        blockquote {
            background: #f9f9f9;
            border-left: 10px solid #ccc;
            margin: 1.5em 1px;
            padding: 0.5em 10px;
            quotes: "\201C""\201D""\2018""\2019";
            font-style: italic;
        }

        blockquote:before {
            color: #ccc;
            content: open-quote;
            font-size: 4em;
            line-height: 0.1em;
            margin-right: 0.25em;
            vertical-align: -0.4em;
        }

        .review_table tr{

        }

        .review_table td{
            min-width: 85px;
        }

    </style>
	<!--<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>-->
	<script src="<?php echo base_url()?>resource/js/script.js"></script>
    <script>
        $(function() {
            var items = $(".testimonial .feedback");

            var numItems = items.length;
            var perPage = 3;
            items.slice(perPage).hide();

            $('.pagination').pagination({
                items: numItems,
                itemsOnPage: perPage,
                onPageClick: function(pageNumber) {
                    var showFrom = perPage * (pageNumber - 1);
                    var showTo = showFrom + perPage;
                    items.hide().slice(showFrom, showTo).show();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('input .rating').rating();
        });
    </script>
        <style>
        .contacts-widget {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }
        .qr {
            width: 180px;
            text-align: center;
            flex-grow:1;
            position:relative;
        }

        .phones {
            text-align: center;
            flex-grow:1;
            align-self: center;
        }
        .qr .img:hover::after {
        display: block;
        position:absolute;
        content: "Chat agents are not always available";
        position: absolute;
        left:0;
        right:0;
        bottom:0;
        top:0;
        background-color: rgba(0,0,0,0.7);
        color: white;
        font-weight: bold;
        padding-top:40%;
        border-radius:6px;
        pointer-events: none;
        }

        @media only screen and (min-width: 768px) {
        .qr a {
        pointer-events: none;
        }
        .scan-tap {
        display:none;
        }
        }

        @media only screen and (max-width: 767px) {
        .scan {
        display: none;
        }
        }

    </style>

</head>
<body>
<div class="container" style="margin-top: 30px">
	
    <!--  //Top Header  -->
    <div class="row">
    <div class="col-lg-12">
    <div class="col-lg-8"><figure><img src="<?php echo base_url()?>resource/images/rave-logo3.png" alt="" title="" /></figure></div>
    <div class="col-lg-4 callus">
        <div class="contacts-widget">
        <div class="phones">
        <h6><span style="font-size: x-large;"><span style="font-size: large;">Tel: (610) 255-7283</span>&nbsp;</span></h6>
        <h6><span style="font-size: large;">Toll Free: (844)-733-7283</span></h6>
        </div>
        <div class="qr" style="text-align: center;">
        <div class="img"><a href="https://allo.app.goo.gl/u-ilbcUdVkEs7Mc5voBXmO2E"><img class="qr" src="/allo.png" alt="" /></a></div>
        <span style="font-size: medium;" class="scan">Scan to chat via Allo</span> <span style="font-size: medium;" class="scan-tap">Scan or tap to chat via Allo</span></div>
        </div>
        <!--<h3>IF YOU HAVE QUESTIONS<br/>
        CALL US NOW AT<br/>
        Tel: (610) 255-7283<br/>
        Toll Free: (844)-733-7283</h3>-->
    </div>
    </div>
    </div>
    <!--  //main menu  -->
    <div class="row main_menu">
    <div id="cssmenu">
        <!-- <ul>
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
    	</ul> -->
	<ul>
                <li><a href="<?php echo base_url('../')?>"><span>Home</span></a></li>
                <li><a href="<?php echo base_url('../about-rave-transportation')?>"><span>Company</span></a>
                    <!-- <ul>
                        <li class="has-sub"><a href="#"><span>Product 1</span></a></li>
                        <li class="has-sub"><a href="#"><span>Product 2</span></a></li>
                    </ul> -->
                </li>
                <li><a href="<?php echo base_url('../our-services')?>"><span>Services</span></a></li>
                <li><a href="<?php echo base_url('../rave-transportation-gallery')?>"><span>Photo Gallery</span></a></li>
                <li><a href="<?php echo base_url()?>reservation"><span>Request an appointment</span></a></li>
		<li class="last active"><a href="<?php echo base_url()?>review/view_reviews"><span>Reviews</span></a></li>
            </ul>
    </div>
    </div>
    <!--  //Reservation Form  -->
	<div class="row">
    <div class="form-control-feedback">
        <div class="col-lg-8 testimonial">
			<?php foreach($reviews as $review) {?>
				<div class="col-lg-12 col-sm-12 feedback drak">
					<div class="col-sm-9 col-lg-9">
						<table class="review_table">
                            <tr>
                                <td><blockquote><?php echo $review['feedback'];?></blockquote></td>
                            </tr>
                            <tr>
                                <td><input type="hidden" class="rating" readonly="readonly" value="<?php echo $review['rating']; ?>">
                                    <div style="float: right;"><h4><?php echo $review['name'];?></h4></div></td>
                            </tr>
						</table>
					</div>
				</div>
			<?php } ?>
        </div>

        <div class="col-lg-4 rightside">
        <h2>Have Questions? </h2>
        <p>If you have any questions or concerns please feel free to contact us:<br/> 
Tel: (610) 255-7283<br/>
Toll Free: (844)-733-7283</p>
        </div>
    </div>
    </div>
    <div class="pagination">
    </div>
    
        <!--  //Top footer  -->
    <div class="row">
    <div class="col-lg-12 top_bottom">
    <div class="col-lg-4">
    <figure><img src="<?php echo base_url()?>resource/images/rave-transportation-footer-1.jpg" alt="" title="" /></figure>
    </div>
    <div class="col-lg-4 facebook_text">
    <h4>Join our social media network and stay informed with our promotions.</h4>
    <figure>
    <a href="https://www.facebook.com/RaveLuxuryTransportation" target="_new"><img src="<?php echo base_url()?>resource/images/icon-facebook.png" alt="" title="" /></a>
    </figure>
    </div>
    <div class="col-lg-4">
    <figure><img src="<?php echo base_url()?>resource/images/rave-transportation-footer-2.jpg" alt="" title="" /></figure>
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
