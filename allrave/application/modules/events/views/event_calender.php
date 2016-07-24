<!-- Start -->
<script language="javascript" src="<?=base_url()?>resource/js/jquery-2.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>resource/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>resource/css/colorbox.css"/>

<section id="content">
	<section class="hbox stretch">

			<aside>
			<section class="vbox">
				<!--<header class="header bg-white b-b clearfix">
					<div class="row m-t-sm">
						<div class="col-sm-4 m-b-xs">
							
						<div class="btn-group">
						
						</div>
						<a class="btn btn-sm btn-dark" href="<?/*=base_url()*/?>events/view/add" title="" data-original-title="New Event" data-toggle="tooltip" data-placement="bottom">
						<i class="fa fa-plus"></i> New Event</a>
						</div>
					 </header>-->
					<section class="scrollable wrapper w-f">
							<div class="col-lg-10">
					<div class="calendar_big">
		<h2><?=$current_month_text?></h2>
    <table class="date">
        <thead>
        <tr>
            <th>Sun</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thu</th>
            <th>Fri</th>
            <th>Sat</th>
        </tr>
        </thead>
        <tr>
            <?php
            for($i=0; $i< $total_rows; $i++)
            {
                for($j=0; $j<7;$j++)
                {
                    $day++;
 
                    if($day>0 && $day<=$total_days_of_current_month)
                    {
                        //YYYY-MM-DD date format
                        $date_form = "$current_year/$current_month/$day";
 
                        echo '<td';
 
                        //check if the date is today
                        if($date_form == $today)
                        {
                            echo ' id="today"';
                        }
 
                        //check if any event stored for the date
                        if(array_key_exists($day,$events))
                        {
                            //adding the date_has_event class to the <td> and close it
                            echo ' class="date_has_event"> <a href="'.base_url("events/event_time/$day-$current_month-$current_year").'">'.$day.'</a>';
                            //adding the eventTitle and eventContent wrapped inside <span> & <li> to <ul>
                            echo '<div class="events"><ul>';
 
                            foreach ($events as $key=>$event){
                                if ($key == $day){
                                foreach ($event as $single){									
                                    echo '<li>';
                                    $rms=$this->db->where(array('room_name'=>$single->room_name))->get('rooms');
									 foreach ($rms->result_array() as $rm){ ?>
										<div style="background:#<?=$rm['color']?>">
										<?php }
                                    echo anchor("events/view/details/$single->event_id",'<span class="title">'.$single->event_title.'</span>');
								
                                    echo '</div></li>';
                                } // end of for each $event
                                }
 
                            } // end of foreach $events
 
                            echo '</ul></div>';
                        } // end of if(array_key_exists...)
 
                        else
                        {
                            //if there is not event on that date then just close the <td> tag
                            echo '><a href="'.base_url("events/event_time/$current_year-$current_month-$day").'">'.$day.'</a>';
                        }
                        echo "</td>";
                    }
                    else
                    {
                        //showing empty cells in the first and last row
                        echo '<td class="padding">&nbsp;</td>';
                    }
                }
                echo "</tr><tr>";
            }
 
            ?>
        </tr>
        <tfoot>
            <th>
            <?php echo anchor('events/event_calender/'.$previous_year,'&laquo;&laquo;', array('title'=>$previous_year_text));?>
            </th>
            <th>
            <?php echo anchor('events/event_calender/'.$previous_month,'&laquo;', array('title'=>$previous_month_text));?>
            </th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>
            <?php echo anchor('events/event_calender/'.$next_month,'&raquo;', array('title'=>$next_month_text));?>
            </th>
            <th>
            <?php echo anchor('events/event_calender/'.$next_year,'&raquo;&raquo;', array('title'=>$next_year_text));?>
 
            </th>
        </tfoot>
    </table>		
					</div>
					</div>
					
					<div class="col-lg-2">
					<!--<div id="external-events">
						<h2>All Rooms</h2>
					<?php /*if (!empty($rooms)) {
			            foreach ($rooms as $key => $c) { */?>
							<div style="background:#<?/*=$c->color*/?>" class="external-event label label-default ui-draggable" data-event-class="fc-event-default"><?/*=$c->room_name*/?></div>
					<?php /*}} */?>
					</div>-->
					</div> 
					</section>
		</section> </aside>
</div>
    </section>
<!-- end -->
