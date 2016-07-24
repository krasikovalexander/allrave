<section>
    <section class="scrollable wrapper">
        <?php
        $user_selected_date = $this->uri->segment(3, 0);
        $user_selected_time = $this->uri->segment(4, 0);
        //get the current cdt datetime in $cdt.
        if($user_selected_time && $user_selected_date) {
            $cdt = date("Y-m-d H:i", time() - 60 * 60 * 5);
            $cdt_date = date("Y-m-d", strtotime($cdt));
            $cdt_time = date("H:i:s", strtotime($cdt));

            $cdt_date = date_create($cdt_date);
            $user_selected_date = date_create($user_selected_date);
            $diff = date_diff($cdt_date, $user_selected_date);

            $date_difference_sign = $diff->format("%R");
            $days_difference = $diff->format("%R%a");

            $date_difference_sign == '+' ? $date_is_greater = TRUE : $date_is_greater = FALSE;

            $user_selected_time = substr_replace($user_selected_time, ':', 2, 0) . ':00';

            $cdt_time = strtotime($cdt_time);
            $user_selected_time = strtotime($user_selected_time);

            $cdt_time > $user_selected_time ? $time_is_greater = FALSE : $time_is_greater = TRUE;

            $show_top_bar = TRUE;
        }
        ?>
        <div class="row">
            <div class="col-lg-12">
                <section class="w-f scrollable panel panel-default">
                    <header class="panel-heading font-bold">
                        <?php if(!empty($requests)){?>
                        View latest Requests
                        <?php }else{ ?>
                        View Event
                        <?php } ?>

                    </header>
                    <div class="table-responsive">
                        <div id="customers_wrapper" class="dataTables_wrapper" role="grid">
                            <div class="row" style="padding-top: 10px;text-align: center;">
                                <?php if(!isset($show_top_bar)){?>
                                <div class="col-sm-4" >
                                    <div id="number_of_requests" class="dataTables_length">
                                        <label>Show
                                            <select size="1" id="request_select" name="number_of_requests" aria-controls="customers">
                                                <option value="10" selected="selected">10</option><option value="25">25</option>
                                                <option value="50">50</option>
                                            </select> Entries
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-4"><div class="dataTables_filter" id="customers_filter">
                                        <label>Search:</label>
                                        <input type="text" name="search_name" id="search_name" value="" data-if-href="<?php echo base_url()?>requests/get_requests_like"
                                           data-else-href="<?php echo base_url()?>requests/get_all_requests" />
                                    </div>
                                </div>
                                <div class="col-sm-4"><div class="dataTables_filter" id="customers_filter">
                                        <label>Type:</label>
                                        <select class="request_type">
                                            <option value="all">All</option>
                                            <option value="accepted">Accepted</option>
                                            <option value="rejected">Rejected</option>
                                        </select>
                                    </div>
                                </div>
                                <?php } ?>
                                <div id="customers_processing" class="dataTables_processing" style="visibility: hidden;">Processing...</div></div>
                            <div class="scrollit">
                                <?php if(!empty($requests)){?>
                            <table style="text-align: center;" id="request_table" class="table table-striped m-b-none dataTable" aria-describedby="customers_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="customers" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Full Name: activate to sort column descending" style="text-align:center;width: 166px;">Full Name</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="customers" rowspan="1" colspan="1" aria-label="Email : activate to sort column ascending" style="text-align:center;width: 170px;">Email </th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="customers" rowspan="1" colspan="1" aria-label="Date : activate to sort column ascending" style="text-align:center;width: 109px;">Date/Time of Journey </th>
                                    <th class="hidden-sm sorting" role="columnheader" tabindex="0" aria-controls="customers" rowspan="1" colspan="1" aria-label="Booked On : activate to sort column ascending" style="text-align:center;width: 216px;">Booked on </th>
                                </tr>
                                </thead>

                                <tbody role="alert" aria-live="polite" aria-relevant="all" >
                                <?php $count = 1; ?>
                                <?php foreach($requests as $request){ ?>
                                <tr class="<?php if($count%2==0){echo 'even';}else{echo 'odd';}?>" data-href="<?=base_url()?>requests/view_request/<?php echo $request['id']; ?>">
                                    <td class="sorting_1"><?php echo $request['name'];?></td>
                                    <td><?php echo $request['email'];?></td>
                                    <td><span class=""><?php echo $request['date'];?></span></td>
                                    <td class="hidden-sm"><?php echo $request['booking_time'];?></td>
                                </tr>
                                    <?php $count++; ?>
                                <?php } ?>
                                </tbody>
                                    </div>
                            </table>
                            <?php }else{ ?>
                                <p>No Event Found</p>
                            <?php } ?>
                            </div>
                    </div>
                </section>
                <?php //if($admin_padding || $slot_padding){ ?>

                <?php if(($admin_padding || $slot_padding) && ($full_slot)){ ?>
                <?php /* if($days_difference > 0 && isset($full_slot) && !$full_slot) { */?>
                    <div>
                <?php }else if($days_difference > 0 && isset($full_slot) && !$full_slot) { ?>
                    <div>
                        <input type="button" class="btn btn-success add_booking" value="Add a booking" data-url="<?php echo base_url()?>requests/add_request">
                    </div>
                <?php }elseif($days_difference == 0 && isset($full_slot) && !$full_slot){

                    if(isset($date_is_greater) && isset($time_is_greater) && $date_is_greater && $time_is_greater){ var_dump('there'); ?>
                        <div>
                            <input type="button" class="btn btn-success add_booking" value="Add a booking" data-url="<?php echo base_url()?>requests/add_request">
                        </div>
                    <?php } ?>
                <?php } else if($days_difference < 0){ ?>
                    <div>
                        <!--<p>This is a past date you cannot add a booking.</p>-->
                    </div>
                <?php } elseif(isset($full_slot) && $full_slot){ ?>
                        <div>
                            <p>This slot is full, You cannot book any ride on this time.</p>
                        </div>
                <?php } ?>
            </div>
        </div>

    </section>
</section>
