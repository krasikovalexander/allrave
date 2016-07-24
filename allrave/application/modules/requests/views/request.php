<section>
    <!--<header class="header bg-white b-b clearfix">
        <div class="row m-t-sm">
            <div class="col-sm-4 m-b-xs">
                <h3>Request</h3>
            </div>
        </div></header>-->

    <section class="scrollable wrapper">

        <div class="row">
            <div class="col-lg-12">
                <section class="w-f scrollable panel panel-default">
                    <!--<header class="panel-heading font-bold">

                    </header>-->
                    <div class="table-responsive">
                        <div class="scrollit" style="overflow-y: scroll; height: 560px;">
                        <div id="customers_wrapper" class="dataTables_wrapper" role="grid">
                            <!--<div class="row">
                                <div class="col-sm-6"></div>
                                <div id="customers_processing" class="dataTables_processing" style="visibility: hidden;">Processing...</div>
                            </div>-->

                            <form method="post" action="<?php echo base_url(); ?>requests/process_request">
                                <input type="hidden" value="<?php echo $request['id']; ?>" name="request_id">
                            <table class="table table-striped m-b-none dataTable" aria-describedby="customers_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="customers" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Full Name: activate to sort column descending" style="width: 166px;">Full Name</th>
                                    <th class="hidden-sm sorting" role="columnheader" tabindex="0" aria-controls="customers" rowspan="1" colspan="1" aria-label="Booked On : activate to sort column ascending" style="width: 216px;">Booked on </th>
                                </tr>
                                </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all">

                                    <tr>
                                        <td class="sorting_1">Name</td>
                                        <td class="sorting_1"><?php echo $request['name'];?></td>
                                    </tr>

                                    <tr>
                                        <td class="sorting_1">Email</td>
                                        <td><?php echo $request['email'];?></td>
                                    </tr>

                                    <tr>
                                        <td class="sorting_1">Phone</td>
                                        <td><?php echo $request['phone'];?></td>
                                    </tr>

                                    <tr>
                                        <td class="sorting_1">Alternate Phone1</td>
                                        <td><?php echo $request['alternate_phone1'];?></td>
                                    </tr>

                                    <tr>
                                        <td class="sorting_1">Alternate Phone2</td>
                                        <td><?php echo $request['alternate_phone2'];?></td>
                                    </tr>

                                    <tr>
                                        <td class="sorting_1">Date/Time of Journey</td>
                                        <td><?php echo $request['date'];?></td>
                                    </tr>

                                    <tr>
                                        <td class="sorting_1">Flight Number</td>
                                        <td><?php echo $request['flight_number'];?></td>
                                    </tr>

                                    <tr>
                                        <td class="sorting_1">Arrival Time</td>
                                        <td><?php echo $request['arrival_time'];?></td>
                                    </tr>

                                    <tr>
                                        <td class="sorting_1">Pickup Address</td>
                                        <td><?php echo $request['pickup_address'].', '.$request['pickup_city'].', '.$request['pickup_state'].', '.$request['pickup_zip'];?></td>
                                    </tr>

                                    <tr>
                                        <td class="sorting_1">Dropoff Address</td>
                                        <td><?php echo $request['dropoff_address'].', '.$request['dropoff_city'].
                                                ', '.$request['dropoff_state'].', '.$request['dropoff_zip'];?></td>
                                    </tr>

                                    <tr>
                                        <td class="sorting_1">Number of Passengers</td>
                                        <td><?php echo $request['number_of_passengers']; ?></td>
                                    </tr>

                                    <tr>
                                        <td class="sorting_1">Status</td>
                                        <?php $status = $request['status'];?>
                                        <td><?php if( $status === 'new' && isset( $request['id'] ) )
                                            {
                                                echo 'New Request';
                                            }
                                            elseif( $status === 'rejected' )
                                            {
                                                echo 'Rejected Request';
                                            }
                                            elseif( $status === 'accepted' )
                                            {
                                                echo 'Accepted Request';
                                            }
                                            else
                                            {
                                                echo 'Wrong Request';
                                            }
                                            ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="sorting_1">Booked on</td>
                                        <td class="hidden-sm"><?php echo $request['booking_time'];?></td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">Special Instruction</td>
                                        <td class="hidden-sm"><?php echo $request['special_instruction'];?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <?php if($allow_action){ ?>
                                                <?php if($status === 'rejected') { ?>
                                                    <!--<input type="submit" class="btn btn-success" value="Accept" name="accept" /> -->
                                                <?php }
                                                else if($status === 'accepted')
                                                    {
                                                        //get the user id and role
                                                        $dcs_user_id = $this->tank_auth->get_user_id();
                                                        $dcs_user_role = $this->tank_auth->get_role_id();
                                                        if($dcs_user_role==2)
                                                        { ?>
                                                            <input type="submit" class="btn btn-danger" value="Delete"  name="delete" />
                                                            <a class="dcs_left btn btn-success" href="<?=base_url()?>requests/edit_ride/id/<?php echo $request['id']; ?>"  data-toggle="ajaxModal" title="Submit" class="btn btn-sm btn-primary pull-right">
                                                            Edit
                                                        </a>
                                                        <?php 
                                                        }
                                                        else
                                                        {

                                                     ?>
                                                    <input type="submit" class="btn btn-danger" value="Reject"  name="reject" />
                                                    <input type="submit" class="btn btn-dark" value="Silent Reject"  name="silent_reject" />
                                                    <?php }
                                                    } ?>

                                            <?php } ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </form>
                        </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </section>
</section>
