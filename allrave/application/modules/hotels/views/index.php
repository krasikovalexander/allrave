<!doctype html>
<html>
<head>
    <title>Hotel Reservation</title>
    <link href="<?= base_url() ?>resource/css/formstyle.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>resource/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>resource/css/menu_styles.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/css/bootstrap-datepicker3.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!--web-font-->
	<link href='https://fonts.googleapis.com/css?family=Federo' rel='stylesheet' type='text/css'>
    <!--//web-font-->
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link href="<?= base_url() ?>resource/css/vendor.css" rel="stylesheet">

    <style type="text/css">
        body{
          background-color: transparent;
        }

        .jf-form{
          margin-top: 28px;
        }

        .jf-option-box{
          display: none;
          margin-left: 8px;
        }

        .jf-hide{
          display: none;
        }

        .jf-disabled {
            background-color: #eeeeee;
            opacity: 0.6;
            pointer-events: none;
        }

        /* 
        overwrite bootstrap default margin-left, because the <label> doesn't contain the <input> element.
        */
        .checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio] {
          position: absolute;
          margin-top: 4px \9;
          margin-left: 0px;
        }

        div.form-group{
          padding: 8px 8px 4px 8px;
        }

        .mainDescription{
          margin-bottom: 10px;
        }
        .responsive img{
          width: 100%;
        }

        p.error, p.validation-error{
          padding: 5px;
        }

        p.error{
          margin-top: 10px;
          color:#a94442;
        }

        p.server-error{
          font-weight: bold;
        }

        div.thumbnail{
          position: relative;
          text-align: center;
        }

        div.thumbnail.selected p{
          color: #ffffff;
        }

        div.thumbnail .glyphicon-ok-circle{
          position: absolute;
          top: 16px;
          left: 16px;
          color: #ffffff;
          font-size: 32px;
        }

        .jf-copyright{color: #888888; display: inline-block; margin: 16px;display:none;}

        .form-group.required .control-label:after {
            color: #dd0000;
            content: "*";
            margin-left: 6px;
        }

        .submit .btn.disabled, .submit .btn[disabled]{
          background: transparent;
          opacity: 0.75;
        }

        /* for image option with span text */
        .checkbox label > span, .radio label > span{
          display: block;
          visibility: hidden;
        }

        .form-group.inline .control-label,
        .form-group.col-1 .control-label,
        .form-group.col-2 .control-label,
        .form-group.col-3 .control-label
        {
          display: block;
        }

        .form-group.inline div.radio,
        .form-group.inline div.checkbox{
          display: inline-block;
        }

        .form-group.col-1 div.radio,
        .form-group.col-1 div.checkbox{
          display: block;
        }

        .form-group.col-2 div.radio,
        .form-group.col-2 div.checkbox{
          display: inline-block;
          width: 48%;
        }

        .form-group.col-3 div.radio,
        .form-group.col-3 div.checkbox{
          display: inline-block;
          width: 30%;
        }

        .jf-copyright {
            visibility: hidden;
        }

        .bg-info {
            background-color: initial;
        }
        .form-group.c28 img {
            width: 96px;
        }
        .form-group.c28 {
            background-color: gainsboro;
        }
        .form-group.c28.bg-info {
            background-color: gainsboro;
        }
    </style>
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
                <li class="last active"><a href="<?php echo base_url('../our-services')?>"><span>Services</span></a></li>
                <li><a href="<?php echo base_url('../rave-transportation-gallery')?>"><span>Photo Gallery</span></a></li>
                <li><a href="<?php echo base_url()?>reservation"><span>Request an appointment</span></a></li>
		        <li><a href="<?php echo base_url()?>review/view_reviews"><span>Reviews</span></a></li>
            </ul>
        </div>
    </div>

    <!--  //Reservation Form  -->
    <div class="row">
        <div class="">
            <div style="color: red;">
                <?php echo $this->session->flashdata('message');?>
            </div>

            <div class="col-lg-8">
                <h2>Hotel Availability Request</h2>
                <!-- ----------------------------------------------- -->
                <div class="jf-form">
                <form id="jqueryform-1b1898" action='' method='post' novalidate autocomplete="on">


                <div class="form-group c28 required inline" data-cid="c28">
                  <label class="control-label" for="c28">Hotel chains</label>

                <?php foreach ($hotels as $key => $hotel) {?>

                  <div class="checkbox">
                    <input  id="c28_<?=$key?>" name="hotels[]"  type="checkbox" value="<?=$hotel->id?>" 
                    data-rule-minlength="1" data-msg-minlength="Please select at least {0} option(s)"  
                    data-rule-required="true"  >
                    <label  for="c28_<?=$key?>">
                        <img src="<?= base_url() ?>resource/hotel/<?=$hotel->logo?>" />
                        <span><?=$hotel->name?></span>
                    </label>
                  </div>
                <?php } ?>
                  
                  <p id="c2-help-block" class="description">Select one or multiple hotel chains</p>
                  
                </div>

                <div class="form-group c30 required col-3" data-cid="c30">
                  <label class="control-label" for="c30">State</label>

                <div class="radio">
                    <input  id="c30_1" name="state"  type="radio" value="iowa" data-rule-required="true" >
                    <label  for="c30_1">
                        Iowa Quad Cities
                    </label>
                  </div>

                  <div class="radio">
                    <input  id="c30_2" name="state"  type="radio" value="illinois"  >
                    <label  for="c30_2">
                        Illinois Quad Cities
                    </label>
                  </div>

                  <div class="radio">
                    <input  id="c30_3" name="state" type="radio" value="all"  >
                    <label  for="c30_3">
                        All Quad Cities
                    </label>
                  </div>

                  
                </div>



                <div class="form-group c40 required" data-cid="c40">
                  <label class="control-label" for="c40">Check in</label>

                <div class="input-group date"><span class="input-group-addon left"><i class="fa fa-calendar"></i> </span>
                <input type="text" class="form-control datepicker" id="c40" name="checkin" value=""  placeholder="Select date" 
                    data-rule-required="true"  
                  data-datepicker-format="mm/dd/yyyy"
                  data-datepicker-startDate="0d"
                  data-datepicker-endDate="+1m"
                  data-datepicker-multidate="false" />
                </div>
                  
                </div>




                <div class="form-group c51 required" data-cid="c51">
                  <label class="control-label" for="c51">Check out</label>

                <div class="input-group date"><span class="input-group-addon left"><i class="fa fa-calendar"></i> </span>
                <input type="text" class="form-control datepicker" id="c51" name="checkout" value=""  placeholder="Select date" 
                    data-rule-required="true"  
                  data-datepicker-format="mm/dd/yyyy"
                  data-datepicker-startDate="0d"
                  data-datepicker-endDate="+1m"
                  data-datepicker-multidate="false" />
                </div>
                  
                </div>


                <div class="form-group c50 " data-cid="c50">
                  <label class="control-label" for="c50">Rooms 2 Queen Size Beds</label>

                <div class="input-group"><span class="input-group-addon left"><i class="fa fa-bed"></i> </span>
                <select class="form-control" id="c50" name="rooms_queen">
                  <option  value="">Select number of rooms required</option>
                  <option  value="1">1</option>
                  <option  value="2">2</option>
                  <option  value="3">3</option>
                  <option  value="4">4</option>
                  <option  value="5">5</option>
                  </select>
                </div>
                  
                </div>




                <div class="form-group c55 " data-cid="c55">
                  <label class="control-label" for="c55">Rooms 1 King Size Bed</label>

                <div class="input-group"><span class="input-group-addon left"><i class="fa fa-bed"></i> </span>
                <select class="form-control" id="c55" name="rooms_king"   
                    >
                  <option  value="">Select number of rooms required</option>
                  <option  value="1">1</option>
                  <option  value="2">2</option>
                  <option  value="3">3</option>
                  <option  value="4">4</option>
                  <option  value="5">5</option>
                  </select>
                </div>
                  
                </div>

                <div class="form-group c26 required" data-cid="c26">
                  <label class="control-label" for="c26">Adults</label>

                <div class="input-group"><span class="input-group-addon left"><i class="fa fa-user"></i> </span>
                <input type="text" class="form-control " id="c26" name="adults" value="" placeholder="Type number"  
                    data-rule-number="true" 
                    data-rule-required="true" 
                    data-rule-min="1"  
                    data-rule-max="100"    />
                </div>
                  
                </div>




                <div class="form-group c31 " data-cid="c31">
                  <label class="control-label" for="c31">Children</label>

                <div class="input-group"><span class="input-group-addon left"><i class="fa fa-child"></i> </span>
                <input type="text" class="form-control " id="c31" name="children" value="" placeholder="Type number"  
                    data-rule-number="true" 
                    data-rule-min=""  
                    data-rule-max="100"    />
                </div>
                  
                </div>




                <div class="form-group c2 required" data-cid="c2">
                  <label class="control-label" for="c2">Email</label>

                <div class="input-group"><span class="input-group-addon left"><i class="glyphicon glyphicon-envelope"></i> </span>
                <input type="email" class="form-control" id="c2" name="email" value="" aria-describedby="c2-help-block" placeholder="Enter your email" 
                    data-rule-email="true" 
                    data-rule-required="true"  />
                </div>

                  <p id="c2-help-block" class="description">This email will not be stored. It is only used to receive emails from hotels who respond with availability.</p>
                  
                </div>




                <div class="form-group c63 " data-cid="c63">
                  <label class="control-label" for="c63">Special requirements</label>

                <div class="checkbox">
                    <input  id="c63_1" name="special[]"  type="checkbox" value="wheelchair" 
                     >
                    <label  for="c63_1">
                        <i class="fa fa-wheelchair" aria-hidden="true"></i> Wheelchair accessible room
                    </label>
                  </div>

                  
                </div>

                <div class="form-group c40 " data-cid="c41">
                  <label class="control-label" for="c41">Additional notes</label>


                <textarea class="form-control" id="c41" name="note" rows="3"   ></textarea>

                  
                </div>





                <div class='form-group recaptcha'>
                  <script type="text/javascript">
                    function renderReCaptcha(){
                        var jfKey = '6Ldh_QkTAAAAAA1WdrF09PX4bYuZklOKqzAZ916H', // when form loaded from jqueryform.com
                        realKey = '6LcswycTAAAAAAhjv4Vszpapq5qSPgBJtImeS8lD',
                        theme = 'dark',
                        key = -1 !== location.href.indexOf('jqueryform.com/') ? jfKey : realKey;
                        grecaptcha.render( document.getElementById('g-recaptcha'), {
                          'sitekey' : key,
                          'theme' : theme
                        });
                    };
                  </script>
                  <script src="https://www.google.com/recaptcha/api.js?hl=&onload=renderReCaptcha&render=explicit" async defer></script>
                  <div id='g-recaptcha' class='g-recaptcha col_field' data-theme='dark' data-sitekey='6LcswycTAAAAAAhjv4Vszpapq5qSPgBJtImeS8lD'></div>
                </div>




                <div class="form-group submit c100 " data-cid="c100" style="position: relative;">
                  <label class="control-label sr-only" for="c100" style="display: block;">Submit Button</label>

                  <div class="progress" style="display: none; z-index: -1; position: absolute;">
                    <div class="progress-bar progress-bar-striped active" role="progressbar" style="width:100%">
                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary btn-lg" style="z-index: 1;">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        Request
                  </button>
                  

                  <p class="error bg-warning" style="display:none;">
                    Please fill all required fields.  </p>
                  
                </div>

                </form>

                <a href="http://www.jqueryform.com" target="_blank" class="jf-copyright">Powered by jqueryform.com</a>
                </div>

                <div class="container jf-thankyou" style="display:none;" data-redirect="" data-seconds="10">
                  <h3>Your form has been submitted. Thank You!</h3>
                </div>
                <!-- ----------------------------------------------- -->

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

   
    <div class="row">
        <div class="col-lg-12 copyright"> Premium Business WordPress themes | Login</div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.0/jquery.scrollTo.min.js"></script>
<script src="<?= base_url() ?>resource/js/vendor.js" ></script>

<script src="<?= base_url() ?>resource/js/jqueryform.com.min.js?ver=v1.0-rc24&id=jqueryform-1b1898" ></script>

<!-- [ Start: iCheck support ] ---------------------------------- -->
<link href="https://cdn.jsdelivr.net/icheck/1.0.2/skins/flat/_all.min.css" rel="stylesheet">
<style type="text/css">
/* overwrite bootstrap styles */
.checkbox input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio] {
    position: relative;
    margin-top: 0px;
    margin-left: 2px;
}

.checkbox label, .radio label {
   padding-left: 4px;
}
</style>

<script src="https://cdn.jsdelivr.net/icheck/1.0.2/icheck.min.js"></script>
<script type="text/javascript">
  $('.jf-form input').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
  }).on('ifClicked', function(e){
    setTimeout( function(){
      $(e.target).valid();
      $(e.target).trigger('change').trigger('handleOptionBox');
    }, 250);
  });
</script>
<!-- [ End: iCheck support ] ---------------------------------- -->


<script type="text/javascript">

    // start jqueryform initialization
    // --------------------------------
    JF.init('#jqueryform-1b1898');

</script>

</body>
</html>
