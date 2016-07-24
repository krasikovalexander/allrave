<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
			<h1>Edit Ride</h1>
		</div>
		
			<?php
            /*
			 $attributes = array('class' => 'bs-example form-horizontal');
          echo form_open_multipart(base_url().'requests/save_edited_ride',$attributes); ?>
          <input type="hidden" name="id" value="<?=$free_id?>">
          */?>

		<div class="modal-body" id="editSubsModal">

			<?php //echo "<pre>"; print_r($request['name']); die(); ?>

			<div class="alert alert-danger">
			  You can't change the time slot. To change the time and date of booking, You have to delete the previous booking.
			</div>

			<form method="post" action="<?php echo base_url(); ?>requests/save_edited_ride">
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
                                        <td class="sorting_1">Name <?=$id?></td>
                                        <td class="sorting_1"><input class="form-control" type="text" name="name" value="<?php echo $request['name'];?>"></td>
                                    </tr>

                                    <tr>
                                        <td class="sorting_1">Email</td>
                                        <td><input class="form-control" type="email" name="email" value="<?php echo $request['email'];?>"></td>
                                    </tr>

                                    <tr>
                                        <td class="sorting_1">Phone</td>
                                        <td><input class="form-control" type="text" name="phone" value="<?php echo $request['phone'];?>"></td>
                                    </tr>

                                    <tr>
                                        <td class="sorting_1">Alternate Phone1</td>
                                        <td><input class="form-control" type="text" name="alternate_phn1" value="<?php echo $request['alternate_phone1'];?>"></td>
                                    </tr>

                                    <tr>
                                        <td class="sorting_1">Alternate Phone2</td>
                                        <td><input class="form-control" type="text" name="alternate_phn2" value="<?php echo $request['alternate_phone2'];?>"></td>
                                    </tr>

                                    <!-- <tr>
                                        <td class="sorting_1">Date/Time of Journey</td>
                                        <td><?php echo $request['date'];?></td>
                                    </tr> -->

                                    <tr>
                                        <td class="sorting_1">Flight Number</td>
                                        <td><input class="form-control" type="text" name="flight_number" value="<?php echo $request['flight_number'];?>"></td>
                                    </tr>

                                    <!-- <tr>
                                        <td class="sorting_1">Arrival Time</td>
                                        <td><?php echo $request['arrival_time'];?></td>
                                    </tr> -->

                                    <tr>
                                        <td class="sorting_1">Pickup Address</td>
                                        <td><input class="form-control" type="text" name="pick_address" value="<?php echo $request['pickup_address'];?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">Pickup city</td>
                                        <td><input class="form-control" type="text" name="pick_city" value="<?php echo $request['pickup_city'];?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">Pickup state</td>
                                        <td><input class="form-control" type="text" name="pick_state" value="<?php echo $request['pickup_state'];?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">Pickup Zip</td>
                                        <td><input class="form-control" type="text" name="pick_zip" value="<?php echo $request['pickup_zip'];?>"></td>
                                    </tr>

                                    <tr>
                                        <td class="sorting_1">Dropoff Address</td>
                                        <td><input class="form-control" type="text" name="drop_address" value="<?php echo $request['dropoff_address'];?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">Dropoff city</td>
                                        <td><input class="form-control" type="text" name="drop_city" value="<?php echo $request['dropoff_city'];?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">Dropoff state</td>
                                        <td><input class="form-control" type="text" name="drop_state" value="<?php echo $request['dropoff_state'];?>"></td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">Dropoff zip</td>
                                        <td><input class="form-control" type="text" name="drop_zip" value="<?php echo $request['dropoff_zip'];?>"></td>
                                    </tr>

                                    <tr>
                                        <td class="sorting_1">Number of Passengers</td>
                                        <td><input class="form-control" type="text" name="number_passengers" value="<?php echo $request['number_of_passengers']; ?>"></td>
                                    </tr>

                                    <!-- <tr>
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
                                    </tr> -->

                                    <!-- <tr>
                                        <td class="sorting_1">Booked on</td>
                                        <td class="hidden-sm"><?php echo $request['booking_time'];?></td>
                                    </tr> -->
                                    <tr>
                                        <td class="sorting_1">Special Instruction</td>
                                        <td class="hidden-sm"><input class="form-control" type="text" name="special_instructions" value="<?php echo $request['special_instruction'];?>"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                        	<a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a> 
											<button type="submit" class="btn btn-success">Submit</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </form>
		</div>
		<div class="modal-footer"> <!-- <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a> 
		<button type="submit" class="btn btn-success">Submit</button> -->



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <script type="text/javascript">

	    $(document).ready(function(){
	      $("#addMoreDesc").click(function(){

            $("#editSubsModal").append("<div class='form-group'><label class='col-lg-4 control-label'><input type='text' class='form-control' name='extra_desc[name][]' placeholder='Please enter the name here'></label><div class='col-lg-8'><input type='checkbox' name='extra_desc[check][]' value='1' checked='checked'><br></div></div>");
          	
          });


	      $(".deleteThis").click(function(){
            	$(this).parent().parent().remove();
           });

        });
	    </script>


		</div>
	</div>
	<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
