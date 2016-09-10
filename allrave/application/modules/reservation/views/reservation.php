<!doctype html>
<html>
<head>
    <title>Reservation Form Page Layouts</title>
    <link href="<?= base_url() ?>resource/css/formstyle.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>resource/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>resource/css/jquery.simple-dtpicker.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>resource/css/jquery.fancybox.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>resource/css/menu_styles.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.1/basic/jquery.qtip.min.css" type="text/css" rel="stylesheet" media="all">
    <!--web-font-->
	<link href='https://fonts.googleapis.com/css?family=Federo' rel='stylesheet' type='text/css'>
    <!--//web-font-->
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <script type="text/javascript" src="<?= base_url() ?>resource/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>resource/js/min_js.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>resource/js/jquery.simple-dtpicker.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>resource/js/jquery.fancybox.js"></script>
    <?php if ($count_vehicles == 1){?>
    <script type="text/javascript" src="<?= base_url() ?>resource/js/reservation.js"></script>
    <?php }else{?>
    <script type="text/javascript" src="<?= base_url() ?>resource/js/reservation_multi_vehicles.js"></script>
    <?php } ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.1/basic/jquery.qtip.min.js"></script>
    <!--//main menu  -->

    <script src="<?= base_url() ?>resource/js/script.js"></script>
    <script src="<?= base_url() ?>resource/js/reservation_form.js"></script>

</head>

<body>

<div class="container" style="margin-top:30px;">

    <!--  //Top Header  -->
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-8">
                <figure><img src="<?= base_url() ?>resource/images/rave-logo3.png" alt="" title=""/></figure>
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
                <li><a href="<?php echo base_url('../')?>"><span>Home</span></a></li>
                <li><a href="<?php echo base_url('../about-rave-transportation')?>"><span>Company</span></a>
                </li>
                <li><a href="<?php echo base_url('../our-services')?>"><span>Services</span></a></li>
                <li><a href="<?php echo base_url('../rave-transportation-gallery')?>"><span>Photo Gallery</span></a></li>
                <li class="last active"><a href="<?php echo base_url()?>reservation"><span>Request an appointment</span></a></li>
		<li><a href="<?php echo base_url()?>review/view_reviews"><span>Reviews</span></a></li>
            </ul>
        </div>
    </div>

    <!--  //Reservation Form  -->
    <div class="row">
        <div class="form-control-feedback">
            <div style="color: red;">
                <?php echo $this->session->flashdata('message');?>
            </div>

            <!-- <div class="col-lg-12"><h2>Reservation Form</h2></div> -->

            <div class="col-lg-4 rightside">
                <h2>Have Questions? </h2>

                <p>If you have any questions or concerns please feel free to contact us:<br/>
                    Tel: (610) 255-7283<br/>
                    Toll Free: (844)-733-7283</p>

                <p><h3>Fare Calculator</h3></p>

                <!--<label>From</label><input id="from-input" class="from-input" type="text" placeholder="Enter a location">
                <label>To</label><input id="to-input" class="to-input" type="text" placeholder="Enter a location">
                <div class="hidden rate_message"></div>
                <input type="button" value="Calculate Fare" id="calculate-btn" class="btn btn-success" data-url="<?php //echo base_url()?>reservation/get_distance_rate" /> -->
        <label>Enter the number of miles: </label>
        <input type="text" id="miles" />
        <input type="button" id="get_fare" data-url="<?php echo base_url();?>reservation/get_distance_rate" value="Get Fare" />
        <div class="hidden rate_message"></div>

                <p>Rates are only estimates and will differ due to circumstances beyond our control such as extra stops or wait time.
                    <p>This is not an hourly rate calculator</p>
                    <p>Davenport to airport will be no more than $51</p>
                    <p>Rides over 20 miles are calculated much differently</p>
                    <p>The Rate shown here may slightly differ from actual rate.
                </p>
                <input id="from-lat" value="" type="hidden"/>
                <input id="from-long" value="" type="hidden"/>
                <input id="to-lat" value="" type="hidden"/>
                <input id="to-long" value="" type="hidden"/>
            </div>


            <div class="col-lg-8 resform">
                <h2>Reservation Form</h2>
                <?php //echo validation_errors(); ?>
                <?php $attributes = array('id' => 'reservation_form'); ?>
                <?php echo form_open('reservation', $attributes); ?>
                <!--<form action="<? /*=base_url()*/ ?>reservation/book_appointment" method="post" id="reservation_form">-->
                <?php echo form_label('Name: *'); ?> <?php echo form_error('username'); ?>
                <?php echo form_input(
                    array('id' => 'username', 'name' => 'username', 'placeholder' => 'Name', 'required' => 'required', 'data-name' => 'Username')
                ); ?>

                <?php echo form_label('Phone: *'); ?> <?php echo form_error('phone'); ?>
                <?php echo form_input(
                    array('id' => 'phone', 'name' => 'phone', 'required' => 'required', 'placeholder' => 'Phone', 'data-name' => 'Phone')
                ); ?>

                <?php echo form_label('Alternate Phone: '); ?> <?php echo form_error('phone'); ?>
                <?php echo form_input(
                    array('id' => 'alternate_phone1', 'name' => 'alternate_phone1', 'placeholder' => 'Alternate Phone1', 'data-name' => 'Alternate Phone')
                ); ?>
                <?php echo form_input(
                    array('id' => 'alternate_phone2', 'name' => 'alternate_phone2', 'placeholder' => 'Alternate Phone2', 'data-name' => 'Alternate Phone')
                ); ?>


                <?php echo form_label('Email: *'); ?> <?php echo form_error('email'); ?>
                <?php echo form_input(
                    array('id' => 'email', 'name' => 'email', 'required' => 'required', 'placeholder' => 'Email','data-name' => 'Email')
                ); ?>

                <?php echo form_label('Date/time of pick up: *'); ?> <?php echo form_error('hsdate'); ?>
                <div class="">
                    <?php echo form_input(
                        array('id' => 'date', 'class' => 'hsdate', 'name' => 'date', 'required' => 'required', 'value' => '', 'placeholder' => 'Select date')
                    ); ?>
                </div>
<!--
                <?php form_label('Appointment Time: '); ?>
                <?php echo form_input(
                    array('data-name' => 'Appointment Time','id' => 'appointment_time','required' => 'required', 'name' => 'appointment_time', 'readonly' => 'readonly','placeholder' => 'Appointment Time')
                ) ?>
-->
                <?php form_label('Flight Number: '); ?>
                <label>Flight Number:</label>
                <?php echo form_input(
                    array(
                        'id' => 'flightnumber',
                        'name' => 'flightnumber',
                        'placeholder' => 'Flight Number'
                    )
                ); ?>

                <?php echo form_label('Arrival Time:'); ?>
                <?php echo form_input(array('id' => 'usr_time', 'name' => 'usr_time', 'value' => '','placeholder' => 'Enter Arrival time')); ?>

                <?php echo form_label('Pickup Address: *'); ?> <?php form_error('pickup_address'); ?>
                <?php echo form_textarea(
                    array(
                        'id' => 'pickup_address',
                        'name' => 'pickup_address',
                        'rows' => '1',
                        'cols' => '50',
                        'placeholder' => 'Address Line 1'
                    )
                ); ?>

                <?php echo form_input(
                    array(
                        'id' => 'pickup_city',
                        'name' => 'pickup_city',
                        'required' => 'required',
                        'placeholder' => 'City',
                        'class' => 'cityarea',
                        'data-name' => 'Pickup City'
                    )
                ); ?>
                <?php $pickup_option = array(
                    '0' => 'State',
                    'IA' => 'IA',
                    'IL' => 'IL',
                    'MI' => 'MI',
                    'MN' => 'MN',
                    'MO' => 'MO',
                    'NE' => 'NE',
                    'WI' => 'WI'
                ); ?>
                <?php echo form_dropdown(
                    'pickup_state',
                    $pickup_option,
                    '0',
                    'id = "pickup_state" class = "statearea"'
                ); ?>

                <?php echo form_input(
                    array(
                        'id' => 'pickup_zip',
                        'name' => 'pickup_zip',
                        //'required' => 'required',
                        'placeholder' => 'Zip Code',
                        'class' => 'ziparea',
                        'data-name' => 'Pickup Zip'
                    )
                ); ?>

                <?php echo form_label('Drop off address: *'); ?> <?php form_error('drop_address'); ?>
                <?php echo form_textarea(
                    array(
                        'id' => 'drop_address',
                        'name' => 'drop_address',
                        'rows' => '1',
                        'cols' => '50',
                        'placeholder' => 'Address Line 1'
                    )
                ); ?>

                <?php echo form_input(
                    array(
                        'id' => 'drop_city',
                        'name' => 'drop_city',
                        'required' => 'required',
                        'placeholder' => 'City',
                        'class' => 'cityarea',
                        'data-name' => 'Drop City'
                    )
                ); ?>
                <?php $drop_option = array(
                    '0' => 'State',
                    'IA' => 'IA',
                    'IL' => 'IL',
                    'MI' => 'MI',
                    'MN' => 'MN',
                    'MO' => 'MO',
                    'NE' => 'NE',
                    'WI' => 'WI'
                ); ?>
                <?php echo form_dropdown('drop_state', $drop_option, '0', 'id = "drop_state" class = "statearea"'); ?>

                <?php echo form_input(
                    array(
                        'id' => 'drop_zip',
                        'name' => 'drop_zip',
                        //'required' => 'required',
                        'placeholder' => 'Zip Code',
                        'class' => 'ziparea',
                        'data-name' => 'Drop Zip'
                    )
                ); ?>

                <?php echo form_label('Number of Passenger: *'); ?> <?php echo form_error('passenger') ?>
                <?php $passenger_option = array(
                    '' => 'Number of Passenger',
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5 (surcharge will be added)',
                    '6' => '6 (surcharge will be added)'
                ); ?>

                <?php echo form_dropdown('passenger', $passenger_option, 0, 'id = "passenger"'); ?>
                <?php echo form_label('Special Instruction:'); ?> <?php echo form_error('special_instruction') ?>
                <?php echo form_textarea(array(
                    'id' => 'special_instruction',
                    'name' => 'special_instruction',
                    'rows' => '5',
                    'cols' => '50',
                    'placeholder' => 'Kindly fill in any special instruction you would like to provide us'
                )); ?>
<!--
                <label class="enrollnum1">Enroll in special offers
                    <?php echo form_checkbox(array('name'  => 'enroll', 'value' => 'Enroll', 'class' => 'enrollnum')); ?>
                </label>
-->
                <label class='enrollnum1'>
                <?php echo form_checkbox(array('id' => 'terms','name'  => 'terms', 'value' => 'terms', 'class' => 'enrollnum', 'required' => 'required')); ?> I understand that the appointment has not been confirmed until I receive email from 610allrave@gmail.com stating my appointment request has been accepted.  
                </label>
                <?php echo form_submit(array('value' => 'SUBMIT', 'class' => 'submit')); ?>
                <?php echo form_reset(array('value' => 'RESET', 'class' => 'reset')); ?>
                <?php echo form_close(); ?>
                <div class="error_message">
                    <ul></ul>
                    <?php echo validation_errors();?>
                </div>
                <p><strong class="spacolor">Special Instruction:</strong> Please make sure your details are correct
                    before submitting form and that all fields marked with * are completed!.</p>
            </div>
            
        </div>
    </div>

    <!--  //Top footer  -->
    <div class="row">
        <div class="col-lg-12 top_bottom">
            <div class="col-lg-4">
                <figure><img src="<?= base_url() ?>resource/images/rave-transportation-footer-1.jpg" alt="" title=""/>
                </figure>
            </div>
            <div class="col-lg-4 facebook_text">
                <h4>Join our social media network and stay informed with our promotions.</h4>
                <figure>
                    <a href="https://www.facebook.com/RaveLuxuryTransportation" target="_new"><img src="<?= base_url() ?>resource/images/icon-facebook.png" alt="" title=""/></a>
                </figure>
            </div>
            <div class="col-lg-4">
                <figure><img src="<?= base_url() ?>resource/images/rave-transportation-footer-2.jpg" alt="" title=""/>
                </figure>
            </div>
        </div>
    </div>

    <a class="fancybox hide" href="#popup">Click here</a>

    <div id="popup" style="display: none;">
        <div class="text-center">
	<div class="col-lg-4" style="float: left">
							<div style="width: 100%">
							<div style="float:left;background: red;width: 30px;height: 30px;border: 1px solid black;"></div>
								<div><p>Red color shows all the booked slots.</p></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="col-lg-4" style="float: left">
							<div style="width: 100%">
							<div style="float:left;background: #808080;width: 30px;height: 30px;border: 1px solid black;"></div>
								<div><p>Grey color shows the slots unavailable due to time restrictions. </p></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="col-lg-4" style="float: left">
							<div style="width: 100%">
							<div style="float:left;background: lightgreen;width: 30px;height: 30px;border: 1px solid black;"></div>
								<div><p>Green color shows the available slots.</p></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
        <h2>Please select your appointment time</h2>
        </div>
        <ul>
            <li class="slot" data-time="0000">12:00 am</li>
            <li class="slot" data-time="0015">12:15 am</li>
            <li class="slot" data-time="0030">12:30 am</li>
            <li class="slot" data-time="0045">12:45 am</li>
            <li class="slot" data-time="0100">1:00 am</li>
            <li class="slot" data-time="0115">1:15 am</li>
            <li class="slot" data-time="0130">1:30 am</li>
            <li class="slot" data-time="0145">1:45 am</li>
            <li class="slot" data-time="0200">2:00 am</li>
            <li class="slot" data-time="0215">2:15 am</li>
            <li class="slot" data-time="0230">2:30 am</li>
            <li class="slot" data-time="0245">2:45 am</li>
            <li class="slot" data-time="0300">3:00 am</li>
            <li class="slot" data-time="0315">3:15 am</li>
            <li class="slot" data-time="0330">3:30 am</li>
            <div class="clear"></div>
            <li class="slot" data-time="0345">3:45 am</li>
            <li class="slot" data-time="0400">4:00 am</li>
            <li class="slot" data-time="0415">4:15 am</li>
            <li class="slot" data-time="0430">4:30 am</li>
            <li class="slot" data-time="0445">4:45 am</li>
            <li class="slot" data-time="0500">5:00 am</li>
            <li class="slot" data-time="0515">5:15 am</li>
            <li class="slot" data-time="0530">5:30 am</li>
            <li class="slot" data-time="0545">5:45 am</li>
            <li class="slot" data-time="0600">6:00 am</li>
            <li class="slot" data-time="0615">6:15 am</li>
            <li class="slot" data-time="0630">6:30 am</li>
            <li class="slot" data-time="0645">6:45 am</li>
            <li class="slot" data-time="0700">7:00 am</li>
            <li class="slot" data-time="0715">7:15 am</li>
            <div class="clear"></div>
            <li class="slot" data-time="0730">7:30 am</li>
            <li class="slot" data-time="0745">7:45 am</li>
            <li class="slot" data-time="0800">8:00 am</li>
            <li class="slot" data-time="0815">8:15 am</li>
            <li class="slot" data-time="0830">8:30 am</li>
            <li class="slot" data-time="0845">8:45 am</li>
            <li class="slot" data-time="0900">9:00 am</li>
            <li class="slot" data-time="0915">9:15 am</li>
            <li class="slot" data-time="0930">9:30 am</li>
            <li class="slot" data-time="0945">9:45 am</li>
            <li class="slot" data-time="1000">10:00 am</li>
            <li class="slot" data-time="1015">10:15 am</li>
            <li class="slot" data-time="1030">10:30 am</li>
            <li class="slot" data-time="1045">10:45 am</li>
            <li class="slot" data-time="1100">11:00 am</li>
            <div class="clear"></div>
            <li class="slot" data-time="1115">11:15 am</li>
            <li class="slot" data-time="1130">11:30 am</li>
            <li class="slot" data-time="1145">11:45 am</li>
            <li class="slot" data-time="1200">12:00 pm</li>
            <li class="slot" data-time="1215">12:15 pm</li>
            <li class="slot" data-time="1230">12:30 pm</li>
            <li class="slot" data-time="1245">12:45 pm</li>
            <li class="slot" data-time="1300">1:00 pm</li>
            <li class="slot" data-time="1315">1:15 pm</li>
            <li class="slot" data-time="1330">1:30 pm</li>
            <li class="slot" data-time="1345">1:45 pm</li>
            <li class="slot" data-time="1400">2:00 pm</li>
            <li class="slot" data-time="1415">2:15 pm</li>
            <li class="slot" data-time="1430">2:30 pm</li>
            <li class="slot" data-time="1445">2:45 pm</li>
            <div class="clear"></div>
            <li class="slot" data-time="1500">3:00 pm</li>
            <li class="slot" data-time="1515">3:15 pm</li>
            <li class="slot" data-time="1530">3:30 pm</li>
            <li class="slot" data-time="1545">3:45 pm</li>
            <li class="slot" data-time="1600">4:00 pm</li>
            <li class="slot" data-time="1615">4:15 pm</li>
            <li class="slot" data-time="1630">4:30 pm</li>
            <li class="slot" data-time="1645">4:45 pm</li>
            <li class="slot" data-time="1700">5:00 pm</li>
            <li class="slot" data-time="1715">5:15 pm</li>
            <li class="slot" data-time="1730">5:30 pm</li>
            <li class="slot" data-time="1745">5:45 pm</li>
            <li class="slot" data-time="1800">6:00 pm</li>
            <li class="slot" data-time="1815">6:15 pm</li>
            <li class="slot" data-time="1830">6:30 pm</li>
            <div class="clear"></div>
            <li class="slot" data-time="1845">6:45 pm</li>
            <li class="slot" data-time="1900">7:00 pm</li>
            <li class="slot" data-time="1915">7:15 pm</li>
            <li class="slot" data-time="1930">7:30 pm</li>
            <li class="slot" data-time="1945">7:45 pm</li>
            <li class="slot" data-time="2000">8:00 pm</li>
            <li class="slot" data-time="2015">8:15 pm</li>
            <li class="slot" data-time="2030">8:30 pm</li>
            <li class="slot" data-time="2045">8:45 pm</li>
            <li class="slot" data-time="2100">9:00 pm</li>
            <li class="slot" data-time="2115">9:15 pm</li>
            <li class="slot" data-time="2130">9:30 pm</li>
            <li class="slot" data-time="2145">9:45 pm</li>
            <li class="slot" data-time="2200">10:00 pm</li>
            <li class="slot" data-time="2215">10:15 pm</li>
            <div class="clear"></div>
            <li class="slot" data-time="2230">10:30 pm</li>
            <li class="slot" data-time="2245">10:45 pm</li>
            <li class="slot" data-time="2300">11:00 pm</li>
            <li class="slot" data-time="2315">11:15 pm</li>
	    <li class="slot" data-time="2330">11:30 pm</li>
	    <li class="slot" data-time="2345">11:45 pm</li>
        </ul>
        <div class="clear"></div>
    </div>
    <div>
        <!--This text box is used to display current cdt time-->
        <!--It shows cdt time + 12 hours -->
        <input type="hidden" id="cdt" value="<?php
        date_default_timezone_set("UTC");
        $cdt = date("d-m-Y H:i", time() - 60 * 60 * 5);
        $cdt12 = date("d-m-Y H:i", strtotime($cdt) + 60 * 60 * 12);
	//$cdt12 = "07-06-2015 08:01";
        echo $cdt12; ?>">
	<input type="hidden" id="cdt_current_date" value="<?php
	date_default_timezone_set("UTC");
        $cdt = date("d-m-Y h:i", time() - 60 * 60 * 5);
	//$cdt = "06-06-2015 20:01";
	echo $cdt; ?>" />
        <input type="hidden" id="count_vehicles" value="<?php echo $count_vehicles;?>">
    </div>
    <!--  //bottom footer  -->
    <div class="row">
        <div class="col-lg-12 copyright"> Premium Business WordPress themes | Login</div>
    </div>
</div>
</body>
</html>
