<link rel="stylesheet" type="text/css" href="<?=base_url()?>resource/css/style.css"/>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>resource/css/colorbox.css"/>
<link rel="stylesheet" type="text/css" href="<?=base_url();?>resource/css/event_time.css"/>

<section id="content">
	<section class="hbox stretch">
			<aside>
			<section class="vbox">
				<header class="header bg-white b-b clearfix">
					<?php echo "<h3>Events for ".$this->uri->segment(3, 0)."</h3>";?>
					<div class="row m-t-sm">

						<div class="col-sm-8 m-b-xs">
							<!--<div class="btn-group">
						</div>-->
						<!--<a class="btn btn-sm btn-dark" href="<?/*=base_url()*/?>events/view/add" title="" data-original-title="New Event" data-toggle="tooltip" data-placement="bottom">
						<i class="fa fa-plus"></i> --><!--</a>-->
						</div>
						<!--<div class="col-sm-4 m-b-xs">
						<form action="<?/*=base_url()*/?>events/search" method="post" accept-charset="utf-8"><div style="display:none">
						<input name="csrf_fo_name" value="651953c156bb195f7e8a021e10bf2fb1" type="hidden">
						</div>							
						<div class="input-group">
								<input class="input-sm form-control" name="keyword" placeholder="Search Event" type="text">
								<span class="input-group-btn"> <button class="btn btn-sm btn-default" type="submit">Go!</button>
								</span>
							</div>
							</form>
						</div>-->
						<input type="hidden" class="date" value="<?php echo $this->uri->segment(3, 0);?>">
					</div>
				</header>
					<section class="scrollable wrapper w-f">
						<!--<input type="text" id="cdt" value="<?php
/*						date_default_timezone_set("UTC");
						$cdt = date("d-m-Y H:i", time() - 60 * 60 * 5);
						echo $cdt; */?>">-->
						<?php if($count_vehicles < 2){?>
						<div class="col-lg-4" style="float: left">
							<div style="width: 100%">
							<div style="float:left;background: red;width: 30px;height: 30px;border: 1px solid #ffff00;"></div>
								<div><p>Red slot shows the time at which a booking is done.</p></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="col-lg-4" style="float: left">
							<div style="width: 100%">
							<div style="float:left;background: cornflowerblue;width: 30px;height: 30px;border: 1px solid #ffff00;"></div>
								<div><p>Blue Slot shows the padding involved with a booking </p></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="col-lg-4" style="float: left">
							<div style="width: 100%">
							<div style="float:left;background: #000000;width: 30px;height: 30px;border: 1px solid #ffff00;"></div>
								<div><p>Black means there has been a rejection in this slot</p></div>
							</div>
							<div class="clear"></div>
						</div>

						<?php }else{?>

							<div class="col-lg-3" style="float: left">
								<div style="width: 100%">
									<div style="float:left;background: red;width: 30px;height: 30px;border: 1px solid #ffff00;"></div>
									<div><p>Red color shows all the full slots</p></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="col-lg-3" style="float: left">
								<div style="width: 100%">
									<div style="float:left;background: cornflowerblue;width: 30px;height: 30px;border: 1px solid #ffff00;"></div>
									<div><p>Blue Slot shows the padding involved with a booking </p></div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="col-lg-3" style="float: left">
								<div style="width: 100%">
									<div style="float:left;background: #000000;width: 30px;height: 30px;border: 1px solid #ffff00;"></div>
									<div><p>Black means there has been a rejection in this slot</p></div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="col-lg-3" style="float: left">
								<div style="width: 100%">
									<div style="float:left;background: gold;width: 30px;height: 30px;border: 1px solid #ffff00;"></div>
									<div><p>Gold color means this is the time of appointment</p></div>
								</div>
								<div class="clear"></div>
							</div>
						<?php } ?>
						<div class="clear"></div>
					<div class="calendar_big">
							<div id="popup" style="display: block;">
								<div class="text-center">
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
									<div class="clear"></div>
									<li class="slot" data-time="0330">3:30 am</li>
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
									<div class="clear"></div>
									<li class="slot" data-time="1030">10:30 am</li>
									<li class="slot" data-time="1045">10:45 am</li>
									<li class="slot" data-time="1100">11:00 am</li>
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
									<div class="clear"></div>
									<li class="slot" data-time="1400">2:00 pm</li>
									<li class="slot" data-time="1415">2:15 pm</li>
									<li class="slot" data-time="1430">2:30 pm</li>
									<li class="slot" data-time="1445">2:45 pm</li>
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
									<div class="clear"></div>
									<li class="slot" data-time="1730">5:30 pm</li>
									<li class="slot" data-time="1745">5:45 pm</li>
									<li class="slot" data-time="1800">6:00 pm</li>
									<li class="slot" data-time="1815">6:15 pm</li>

									<li class="slot" data-time="1830">6:30 pm</li>
									<li class="slot" data-time="1845">6:45 pm</li>
									<li class="slot" data-time="1900">7:00 pm</li>
									<li class="slot" data-time="1915">7:15 pm</li>
									<li class="slot" data-time="1930">7:30 pm</li>
									<li class="slot" data-time="1945">7:45 pm</li>
									<li class="slot" data-time="2000">8:00 pm</li>
									<li class="slot" data-time="2015">8:15 pm</li>
									<li class="slot" data-time="2030">8:30 pm</li>
									<li class="slot" data-time="2045">8:45 pm</li>
									<div class="clear"></div>
									<li class="slot" data-time="2100">9:00 pm</li>
									<li class="slot" data-time="2115">9:15 pm</li>
									<li class="slot" data-time="2130">9:30 pm</li>
									<li class="slot" data-time="2145">9:45 pm</li>
									<li class="slot" data-time="2200">10:00 pm</li>
									<li class="slot" data-time="2215">10:15 pm</li>
									<li class="slot" data-time="2230">10:30 pm</li>
									<li class="slot" data-time="2245">10:45 pm</li>
									<li class="slot" data-time="2300">11:00 pm</li>
									<li class="slot" data-time="2315">11:15 pm</li>
									<li class="slot" data-time="2330">11:30 pm</li>
									<li class="slot" data-time="2345">11:45 pm</li>
								</ul>
								<div class="clear"></div>
							</div>
						</div>
						<div>
							<!--This text box is used to display current cdt time-->
							<!--It shows cdt time + 12 hours -->
							<input type="hidden" value="<?php echo base_url()?>events/get_rejected_requests" id="get_rejected_requests">
							<input type="hidden" value="<?php echo base_url()?>events/getrides" id="get_rides">
							<input type="hidden" value="<?php echo base_url()?>reservation/getfullslots" id="get_full_slots">
							<input type="hidden" value="<?php echo base_url()?>requests/view_requests" id="view_requests">
							<input type="hidden" value="<?php echo base_url()?>events/get_main_slot" id="get_main_slots">
							<input type="hidden" value="<?php echo $count_vehicles;?>" id="count_vehicles">
						</div>
						</section>
		</section>
			</aside>
			</section>

	</section>
	<!-- end -->
