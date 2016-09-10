<style type="text/css">
.nav-primary ul.nav>li>a {
    font-family: "Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif !important;
    font-weight: bold !important;
    font-size: 14px !important;
}
#content
{
  width: 100% !important;
}

.row {
    margin-right: 15px;
    margin-left: 15px;
}

</style>



<link href="<?= base_url() ?>resource/css/formstyle.css" type="text/css" rel="stylesheet" media="all">
    <!-- <link href="<?= base_url() ?>resource/css/bootstrap.css" type="text/css" rel="stylesheet" media="all"> -->
    <link href="<?= base_url() ?>resource/css/jquery.simple-dtpicker.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>resource/css/jquery.fancybox.css" type="text/css" rel="stylesheet" media="all">
    <!-- <link href="<?= base_url() ?>resource/css/menu_styles.css" rel="stylesheet">-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.1/basic/jquery.qtip.min.css" type="text/css" rel="stylesheet" media="all">

    <!--//web-font-->
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 <!-- <script src="<?= base_url() ?>resource/js/reservation_dashboard.js"></script> -->
   <script type="text/javascript" src="<?= base_url() ?>resource/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>resource/js/min_js.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>resource/js/jquery.simple-dtpicker.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>resource/js/jquery.fancybox.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/qtip2/2.2.1/basic/jquery.qtip.min.js"></script>
 <!--   //main menu  

    <script src="<?= base_url() ?>resource/js/script.js"></script> -->
    <script src="<?= base_url() ?>resource/js/reservation_form.js"></script>
   

<section id="content" style="background-color: #fff;"> <section class="vbox"> <section class="scrollable padder">
	<!-- <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
		<li><a href="<?=base_url()?>"><i class="fa fa-home"></i> <?=lang('dashboard')?></a></li>
		<li><a href="<?=base_url()?>profile/settings"><?=lang('profile')?></a></li>
		<li class="active"><?=lang('activities')?></li>
	</ul> -->
	<section class="panel panel-default">
	<header class="panel-heading"> All Rides </header>
	
	<div class="table-responsive">
		
<!--  //Reservation Form  -->
<?php 
////get all the data from controlere for ride
foreach ($ride_detail as $user) {
          $ride_id = $user->id;
           //pickup_addres$s= $user->pickup_address;
          $pickup_addess = $user->pickup_address;
          $pickup_city = $user->pickup_city;      
          $pickup_state = $user->pickup_state;     
          $pickup_zip = $user->pickup_zip;        
          $dropoff_address = $user->dropoff_address;       
          $dropoff_city = $user->dropoff_city;        
          $dropoff_state = $user->dropoff_state ;   
          $dropoff_zip = $user->dropoff_zip;
          $name = $user->name;
          $email = $user->email;
          $phone = $user->phone;
          $alt_phone1 = $user->alternate_phone1;
          $alt_phone2 = $user->alternate_phone2;
          $flightnumber = $user->flight_number;
          $number_of_passengers = $user->number_of_passengers;
        }
        // echo "<pre>";
        // print_r($user);
//get all the data from controlere for ride
?>
    <div class="row">
        <div class="form-control-feedback">
            <div style="color: red;">
                <?php echo $this->session->flashdata('message');?>
            </div>

            <!-- <div class="col-lg-12"><h2>Reservation Form</h2></div> -->
            <div class="error_message">
                <ul></ul>
    <?php echo validation_errors();?>
            </div>
            <div class="col-lg-12 resform">
                <h2>Reservation Form</h2>
                <?php //echo validation_errors(); ?>
                <?php $attributes = array('id' => 'reservation_form'); ?>
                <?php echo form_open('/userrides/book_again/reservation1', $attributes); ?>
                <!--<form action="<? /*=base_url()*/ ?>reservation/book_appointment" method="post" id="reservation_form">-->
                <?php echo form_label('Name: *'); ?> <?php echo form_error('username'); ?>
                <?php echo form_input(
                    array('id' => 'username', 'name' => 'username', 'placeholder' => 'Name', 'required' => 'required', 'data-name' => 'Username', 'value' => $name)
                ); ?>

                <?php echo form_label('Phone: *'); ?> <?php echo form_error('phone'); ?>
                <?php echo form_input(
                    array('id' => 'phone', 'name' => 'phone', 'required' => 'required', 'placeholder' => 'Phone', 'data-name' => 'Phone','value'=> $phone)
                ); ?>

                <?php echo form_label('Alternate Phone: '); ?> <?php echo form_error('phone'); ?>
                <?php echo form_input(
                    array('id' => 'alternate_phone1', 'name' => 'alternate_phone1', 'placeholder' => 'Alternate Phone1', 'data-name' => 'Alternate Phone','value'=> $alt_phone1)
                ); ?>
                <?php echo form_input(
                    array('id' => 'alternate_phone2', 'name' => 'alternate_phone2', 'placeholder' => 'Alternate Phone2', 'data-name' => 'Alternate Phone','value'=> $alt_phone2)
                ); ?>


                <?php echo form_label('Email: *'); ?> <?php echo form_error('email'); ?>
                <?php echo form_input(
                    array('id' => 'email', 'name' => 'email', 'required' => 'required', 'placeholder' => 'Email','data-name' => 'Email','value'=>$email)
                ); ?>

                <?php echo form_label('Select Date: '); ?> <?php echo form_error('hsdate'); ?>
                <div class="">
                    <?php echo form_input(
                        array('id' => 'date1', 'class' => 'hsdate', 'name' => 'date', 'value' => '')
                    ); ?>
                </div>

                <?php form_label('Appointment Time: '); ?>
                <?php echo form_input(
                    array('data-name' => 'Appointment Time','id' => 'appointment_time1','required' => 'required', 'name' => 'appointment_time', 'readonly' => 'readonly','placeholder' => 'Appointment Time')
                ) ?>

                <?php form_label('Flight Number: '); ?>
                <label>Flight Number:</label>
                <?php echo form_input(
                    array(
                        'id' => 'flightnumber',
                        'name' => 'flightnumber',
                        'placeholder' => 'Flight Number',
                        'value' => $flightnumber
                    )
                ); ?>

                <?php echo form_label('Arrival Time:'); ?>
                <?php echo form_input(array('id' => 'usr_time', 'name' => 'usr_time', 'value' => '','placeholder' => 'Enter Arrival time')); ?>

                <?php echo form_label('Pickup Address:'); ?> <?php form_error('pickup_address'); ?>
                <?php echo form_input(
                    array(
                        'id' => 'pickup_address',
                        'name' => 'pickup_address',
                        'rows' => '1',
                        'cols' => '50',
                        'placeholder' => 'Address Line 1',
                        'value' => $pickup_addess
        
                    )
                ); ?>

                <?php echo form_input(
                    array(
                        'id' => 'pickup_city',
                        'name' => 'pickup_city',
                        'required' => 'required',
                        'placeholder' => 'City',
                        'class' => 'cityarea',
                        'data-name' => 'Pickup City',
                        'value' => $pickup_city
                    )
                ); ?>
                <?php $pickup_option = array(
                    'IA' => 'IA',
                    'IL' => 'IL',
                    'MI' => 'MI',
                    'MN' => 'MN',
                    'MO' => 'MO',
                    'NE' => 'NE',
                    'WI' => 'WI'
                ); ?>
		<?php $selected=array($pickup_state => $pickup_state ); ?>
                <?php echo form_dropdown(
                    'pickup_state',
                    $pickup_option,
                    $selected,
                    'id = "pickup_state" class = "statearea"'
                ); ?>

                <?php echo form_input(
                    array(
                        'id' => 'pickup_zip',
                        'name' => 'pickup_zip',
                        'required' => 'required',
                        'placeholder' => 'Zip Code',
                        'class' => 'ziparea',
                        'data-name' => 'Pickup Zip',
                        'value' => $pickup_zip

                    )
                ); ?>

                <?php echo form_label('Drop off address:'); ?> <?php form_error('drop_address'); ?>
                <?php echo form_input(
                    array(
                        'id' => 'drop_address',
                        'name' => 'drop_address',
                        'rows' => '1',
                        'cols' => '50',
                        'placeholder' => 'Address Line 1',
                        'value' => $dropoff_address
                    )
                ); ?>

                <?php echo form_input(
                    array(
                        'id' => 'drop_city',
                        'name' => 'drop_city',
                        'required' => 'required',
                        'placeholder' => 'City',
                        'class' => 'cityarea',
                        'data-name' => 'Drop City',
                        'value' => $dropoff_city
                    )
                ); ?>
                <?php $drop_option = array(
                    'IA' => 'IA',
                    'IL' => 'IL',
                    'MI' => 'MI',
                    'MN' => 'MN',
                    'MO' => 'MO',
                    'NE' => 'NE',
                    'WI' => 'WI'
                ); ?>
		<?php $selected=array($dropoff_state => $dropoff_state ); ?>
                <?php echo form_dropdown('drop_state', $drop_option, $selected , 'id = "drop_state" class = "statearea"'); ?>

                <?php echo form_input(
                    array(
                        'id' => 'drop_zip',
                        'name' => 'drop_zip',
                        'required' => 'required',
                        'placeholder' => 'Zip Code',
                        'class' => 'ziparea',
                        'data-name' => 'Drop Zip',
                        'value' => $dropoff_zip
                    )
                ); ?>

                <?php echo form_label('Number of Passenger:'); ?> <?php echo form_error('passenger') ?>
                <?php $passenger_option = array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4'
                ); ?>
		<?php $selected=array($number_of_passengers => $number_of_passengers ); ?>
		
                <?php echo form_dropdown('passenger', $passenger_option, $selected, 'id = "passenger"'); ?>
<input type="hidden" value="<?php echo $ride_id; ?>" name="ride_id">
                <?php echo form_submit(array('value' => 'SUBMIT', 'class' => 'submit')); ?>
                <?php echo form_reset(array('value' => 'RESET', 'class' => 'reset')); ?>

                
                <?php echo form_close(); ?>
                <p><strong class="spacolor">Special Instruction:</strong> Please make sure your details are correct
                    before submitting form and that all fields marked with * are completed!.</p>
            </div>
            
        </div>
    </div>
</div>

</footer>
</section>
</section>
</section>
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>



<a class="fancybox hide" href="#popup1">Click here</a>

    <div id="popup1" style="display: none;">
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
        <input type="hidden" id="cdt1" value="<?php
        date_default_timezone_set("UTC");
        $cdt = date("d-m-Y H:i", time() - 60 * 60 * 5);
        $cdt12 = date("d-m-Y H:i", strtotime($cdt) + 60 * 60 * 12);
  //$cdt12 = "07-06-2015 08:01";
        echo $cdt12; ?>">
  <input type="hidden" id="cdt_current_date1" value="<?php
  date_default_timezone_set("UTC");
        $cdt = date("d-m-Y h:i", time() - 60 * 60 * 5);
  //$cdt = "06-06-2015 20:01";
  echo $cdt; ?>" />
        <input type="hidden" id="count_vehicles1" value="<?php echo $count_vehicles;?>">
    </div>



<script type="text/javascript">
jQuery(document).ready(function($){
  //alert('aaaaaaaaaaaa');
    var cdt = $('#cdt1').val();
    cdt = cdt.split(' ');
    var cdt_date = cdt[0];
    var cdt_time = cdt[1].replace(':', '');

    var cdt_current = $('#cdt_current_date1').val();
    cdt_current = cdt_current.split(' ');
    var cdt_current_date = cdt_current[0];
    var cdt_current_time = cdt_current[1].replace(':', '');
       $("#date1").appendDtpicker({
        "dateOnly": true,
        //"dateFormat": "DD-MM-YYYY",
        "dateFormat": "MM-DD-YYYY",
        "futureOnly": true,
        "closeOnSelected": true,
        "autodateOnStart": false
    });
     


     $(document).on('click','tr .active', function() {
        
        clear_slots(); //clear the unwanted slot classes.
        if ($(".datepicker_table .active").hasClass('wday_sat') || $(".datepicker_table .active").hasClass('wday_sun')) { //For weekend days i.e. saturday or sunday.
            //weekend_past_slots();//set the weekend past slots i.e. disable all the slots less than 4am.
            process_slots();
        }
        else { //if the day is weekday.
            process_slots();//for the current date.
        }
	$(".fancybox").fancybox();
        //alert("reached to fancy.........");
        $(".fancybox").trigger("click");
    });

    $(document).on('click','.slot',function(){
        if($(this).hasClass('slot_full') || $(this).hasClass('slot_past')){
            return false;
        }else{
            $('#appointment_time1').val($(this).text());
            $.fancybox.close();
        }
    });

    function process_slots(){
        //alert("process slot called");
    //convert the #date into proper format.
    var date = $('#date1').val();
   //alert("date is::"+date);
    var arr = date.split("-",3);
    var arr_date = [arr[1],arr[0],arr[2]];
    date = arr_date.join("-");
        if ((cdt_current_date == date) && (cdt_date == date)) { //if it is current date and less than 12:00 am
            get_past_slots(date,cdt_date);//get all the past slots
            set_full_slot();//set the full slots.
    } else if((cdt_current_date == date) && (date < cdt_date) ){ //if it is current date and greater than 12:00 am
        get_past_slots(date,cdt_date);//get all the past slots
            set_full_slot();//set the full slots.
        } else if((date > cdt_current_date) && (date == cdt_date)) { //if it is the next day
            get_past_slots(date,cdt_date);
        set_full_slot();
        } else { // for all the future dates.
        set_full_slot();
    }
    }

    function full_slots(slots){
        //alert("full slot called");
        var time_slots = [];
        $.each(slots, function (key, value) {
            //alert("popup each calleddddddddddddddd");
            var time = value.date;
            time = convert_time(time);
            time_slots.push($.trim(time));
        });
        $('#popup1 ul li').each(function () {
            //alert("set date time slorttt");
            if(!(time_slots.indexOf($(this).attr('data-time')) == -1)){
                $(this).addClass('slot_full');
                $(this).qtip({
                    content: {
                        text: 'All reservations currently scheduled have a 2 hour gap to prevent overbooking If your reservation time is not available ' +
                        'please call to see if your ride can be accommodated at 610-255-7283'
                    }
                });
            }
        });
    }

    function convert_time(time){
        time = time.split(' ');
        time = time[1].replace(':', '');
        time = time.substring(0,time.length - 3);
        return time;
    }

    function get_past_slots(date,cdt_date)
    {
    //console.log(date,cdt_date);
    if(date == cdt_date)
    {
        $('#popup1 ul li').each(function () {
            if ($(this).attr('data-time') < cdt_time) {
                $(this).addClass('slot_past');
            }
        });
    }else{
        $('#popup1 ul li').each(function () {
                $(this).addClass('slot_past');
        });
    }
    }

    function weekend_past_slots(){
        $('#popup1 ul li').each(function () {
            if ($(this).attr('data-time') < '0400') {
                $(this).addClass('slot_past');
            }
        });
    }

    //do no delete this function. as it gets data from the full slot table.
    /*function set_full_slot(){
        var date = $("#date").val(); // the selected date in the form.
        $.post("reservation/getfullslots", { date: date }, function (result) {
            var arr = JSON.parse(result); //here we get the result in json format.
            full_slots(arr);
        });*/

    function set_full_slot(){
        //alert("set full slot called");
    //convert the #date into proper format.
    var date = $('#date1').val();
    var arr = date.split("-",3);
    var arr_date = [arr[1],arr[0],arr[2]];
    date = arr_date.join("-");

    //alert(date);
        var type = 'reservation1';
        //var date = $("#date").val(); // the selected date in the form.
       // $.post("reservation/getfullslots", { date: date, type: type}, function (result) {
        $.post("/allrave/userrides/book_again/getfullslots1", {date: date, type: type}, function (result1) {
           // alert('unknow function calleddddddddddddddd');
           var arr = JSON.parse(result1);
            //alert(arr);
           // alert(result1);
            //var arr = jQuery.parseJSON(result1); //here we get the result in json format.
            //var arr = 'abc'; //here we get the result in json format.
            //alert(arr);
            full_slots(arr);
        });
    }

    function clear_slots(){
        $('#popup1 ul li').each(function () {
            $(this).removeClass('slot_full');
            $(this).removeClass('slot_past');
            //$(this).qtip("destroy",true);
            $(this).removeAttr('aria-describedby');
            $(this).removeAttr('data-hasqtip');
        });
    }

    $(document).on('click','#get_fare', function(){
        var distance = $("#miles").val();
        var url = $(this).data('url');
        $.post(url,{distance: distance}, function (e) {
            var price = JSON.parse(e);
            if(price !== null)
            {
                $('.rate_message').html('The Rate for ' + distance +' miles is ' + ' $' + price).css('color','red');
                $('.rate_message').removeClass('hidden');
            }
            else
            {
                $('.rate_message').html('No Rate found').css('color','red');
                $('.rate_message').removeClass('hidden');
            }
        });
    });
});
</script>

