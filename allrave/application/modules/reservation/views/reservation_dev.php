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

    <link href="<?= base_url() ?>resource/js/easyautocomplete/easy-autocomplete.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>resource/js/easyautocomplete/easy-autocomplete.themes.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?= base_url() ?>resource/js/easyautocomplete/jquery.easy-autocomplete.min.js"></script>
    
    <link rel="stylesheet" href="<?=base_url()?>resource/js/select2-4.0.3/css/select2.min.css" type="text/css"/>
    <script src="<?=base_url()?>resource/js/select2-4.0.3/js/select2.min.js" cache="false"></script>
    <!--
    <link rel="stylesheet" href="<?=base_url()?>/resource/js/bootstrap-timepicker/css/bootstrap-timepicker.css" type="text/css">
    <script type="text/javascript" src="<?=base_url()?>/resource/js/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="<?= base_url() ?>resource/js/jquery-clickout.min.js"></script>
-->
    <link rel="stylesheet" href="<?=base_url()?>resource/js/mobiscroll-picker-scroll-picker/mobiscroll.css" type="text/css">
    <script type="text/javascript" src="<?=base_url()?>resource/js/mobiscroll-picker-scroll-picker/mobiscroll.js"></script>

    <link rel="stylesheet" href="<?=base_url()?>/resource/js/image-picker/image-picker.css" type="text/css">
    <script type="text/javascript" src="<?=base_url()?>/resource/js/image-picker/image-picker.js"></script>
    
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/rome/2.1.22/rome.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>
    <link href="<?=base_url()?>resource/js/material-datetime-picker.css" rel="stylesheet">
    <script src="<?=base_url()?>resource/js/material-datetime-picker.js" charset="utf-8"></script>

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

            <div class="col-lg-8 resform"  style='display:none'>
                <h2>Call us, we are updating to a more simple quality experience.</h2>
            </div>

            <div class="col-lg-8 resform">
                <h2>Reservation Form</h2>

                <?php //echo validation_errors(); ?>
                <?php $attributes = array('id' => 'reservation_form', 'autocomplete'=>"on"); ?>
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
                <div class="flight-area">
                <?php form_label('Flight Number: '); ?>
                <label>Flight:</label>
                <?php 
                if (!count($airlines)) {
                    echo form_input(
                        array(
                            'id' => 'flightnumber',
                            'name' => 'flightnumber',
                            'placeholder' => 'Flight Number'
                        )
                    ); 
                } else {
                    echo "<select name='airline' id='airlines'>
                    <option value=''>Select airline</option>";
                    foreach ($airlines as $airline) {
                        echo "<option data-img-src='".base_url()."resource/airline/$airline->logo' value='{$airline->id}'>{$airline->name}</option>";
                    }
                    echo "</select>";
                    foreach ($airlines as $airline) {
                        echo "<select name='flightnumber-{$airline->id}' class='flights' id='flights-of-{$airline->id}'><option value=''>Select flight</option>";
                    
                        if (count($airline->flights)) {
                            foreach ($airline->flights as $flight) {
                                echo "<option data-path=\"$flight->path\" value=\"$flight->id\">$flight->path To Quad Cities MLI</option>";
                            }
                        }
                        echo "</select>";
                    }
                    
                }
                ?>
                </div>
                <div class="flight-container">
                <?php echo form_label('Arrival Time:'); ?>
                <div class='flight'>
                    <div class="from">
                        <div class="code">ORD</div>
                        <div class="city">Chicago</div>
                    </div>
                    <div class="arrow">
                        <img src="<?=base_url()?>resource/images/plane.png">
                        <div class="line"></div>
                    </div>
                    <div class="to">
                        <div class="code">MLI</div>
                        <div class="city">Moline</div>
                    </div>

                </div>
                                    <?php echo form_input(array('id' => 'usr_time', 'name' => 'usr_time', 'readonly'=>true ,'value' => '','placeholder' => 'Enter Arrival time')); ?>
                </div>
                <?php echo form_label('Pickup Address: *'); ?> <?php form_error('pickup_address'); ?>
                <?php echo form_input(
                    array(
                        'id' => 'pickup_address',
                        'name' => 'pickup_address',
                        'placeholder' => 'Type POI or address',
                        'autocomplete' => 'on'
                    )
                ); ?>


                <?php echo form_label('Drop off address: *'); ?> <?php form_error('drop_address'); ?>
                <?php echo form_input(
                    array(
                        'id' => 'drop_address',
                        'name' => 'drop_address',
                        'placeholder' => 'Type POI or address',
                        'autocomplete' => 'on'
                    )
                ); ?>

                <?php echo form_label('Select car: *'); ?> <?php echo form_error('passenger') ?>
                <select name="passenger" id="passenger" class="image-picker show-html" required>
                    <option value="">Click car image or select from a list</option>
                    <option data-img-src='<?= base_url() ?>resource/images/lexus.jpg' value='2' text-label="Up to 4 passengers">Lexus RX</option>
                    <option data-img-src='<?= base_url() ?>resource/images/dmc.png' value='1' text-label="Up to 6 passengers ($10
extra for local transportation)">Yukon XL</option>
                    
                </select>


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

</div>
<div id="overlay"></div>

<script>
    $("#airlines").imagepicker({
        hide_select: true,
        show_label: false,
    }).on('change', function(){
        $(".flights").hide();
        $("#flights-of-"+$("#airlines").val()).change().show();
    });

    var pickupPicker = new MaterialDatetimePicker;
    pickupPicker.on('submit', function (val) {
      $('#date').val(moment(val).format("DD/MM/YYYY hh:mm A"));
    });

    document.querySelector('#date').addEventListener('click', function () {
      $('#date').blur();
      var timeString = $('#date').val();
      var time = moment(timeString, "DD/MM/YYYY hh:mm A").isValid() ? moment(timeString, "DD/MM/YYYY hh:mm A") : moment();
      return pickupPicker.open('Date/time of pick up') || pickupPicker.set(time);
    });


    $('#usr_time').scroller({ preset: 'time', timeFormat: 'hh:ii A', ampm: true, stepMinute: 5, rows: 3 });
    /*.timepicker({
        minuteStep: 5,
        defaultTime: 'AM',
        snapToStep: true,
        showInputs: true,
        disableFocus: false,
        modalBackdrop: true,
        explicitMode: true,
    }).on('show.timepicker', function(e) {
        $("#overlay").show();
    }).on('hide.timepicker', function(e) {
        $("#overlay").hide();
    });*/

    $(".flights").on("change", function(){
        if ($(this).val()) {
            var parts = $(this).find(":selected").attr("data-path").split(" ");
            var code = parts.shift();

            var city = parts.join(" ");
            $('.from .code').html(code);
            $('.from .city').html(city);
            $('.flight-container').show();
            //$('#usr_time').timepicker('showWidget');
            $('#usr_time').scroller('show');
        } else {
            $('.flight-container').hide();
            //$('#usr_time').timepicker('hideWidget');
            $('#usr_time').scroller('hide');
        }
    });

    //$(".bootstrap-timepicker-widget, #usr_time, .flights").on('clickout', function(){
    //    $('#usr_time').timepicker('hideWidget');
    //});

    $("#passenger").imagepicker({
        hide_select: true,
        show_label: true,
    });

      var autocompletePickup, autocompleteDropoff;

      function initAutocomplete() {
        autocompletePickup = new google.maps.places.Autocomplete(
            document.getElementById('pickup_address'),
            {});
        autocompleteDropoff = new google.maps.places.Autocomplete(
            document.getElementById('drop_address'),
            {});

        geolocate();
      }
     
      function geolocate() {
        var geolocation = {
          lat: 41.527366,
          lng: -90.520049
        };
        var circle = new google.maps.Circle({
          center: geolocation,
          radius: 50000
        });
        autocompletePickup.setBounds(circle.getBounds());
        autocompleteDropoff.setBounds(circle.getBounds());
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAWLS8f_r8eIIcuPgqOULbdwDRDAoHtK5o&libraries=places&callback=initAutocomplete"
        async defer></script>

</body>
</html>
