<?php if (!empty($event_details)) {
				foreach ($event_details as $key => $event) { ?>		
				<script type="text/javascript" src="<?=base_url()?>resource/js/snavi.js"></script>
<script type="text/javascript">

		$(document).ready(function(){ 	   
		
		$("#room_name").change(function(){		
			var curnt_evnt=$("#room_name").val();
				  if(curnt_evnt!=""){
					$.get("<?=base_url('events/view/get_hall/'.$event->event_id)?>",{term:curnt_evnt},function(result){								
					var result_1=JSON.stringify(result);
					var ret_res=($.parseJSON(result_1));
					$("#venue_rental").val(ret_res.venue_rental);
					//$("#catering_bayout").val(ret_res.catering_bayout);
					//$("#sub_total").val(ret_res.sub_total);					
					//$("#sub_total").val( parseFloat(ret_res.venue_rental) + parseFloat(ret_res.catering_bayout) + parseFloat(ret_res.extras) );

					var vr		=	parseFloat(jQuery("#venue_rental").val());
					var extras	=	parseFloat(jQuery("#extras").val());
					var cb		=	parseFloat(jQuery("#catering_bayout").val());
					var stax	=	parseFloat(jQuery("#default_tax_per").val());	
					var scharge	=	parseFloat(jQuery("#service_charge_per").val());
					
					var st		=	vr + extras + cb;
					var stcal	=	st * stax / 100; //Total tax
					var stotal  = 	st+stcal ;
					var scal	=	st * scharge / 100;
					$("#default_tax").val(stcal);
					
					$("#service_charge").val(scal);
					var gtotal	=	vr+extras+cb+stcal+scal;
					$("#grand_total").val(gtotal);


					var monthly_ins	=	parseFloat(jQuery("#monthly_ins").val());
			var downp	=	parseFloat(jQuery("#down_payment").val());
			var tbal	=	gtotal - downp;
			var num_of_install = tbal/monthly_ins;
			jQuery("#total_balance").val(tbal);
			jQuery("#no_of_ins").val(num_of_install);

						},"json");							  
							} }); 
						}); 

</script>

	<script type="text/javascript">		
		// =============Custom Code--------------------********************************************
					
			jQuery(document).ready(function(){						
		   var array_store_values=new Array();
		   var atr=new Array();  // important array
		   var totalcharges=parseFloat(jQuery("#extras").val());
		   var value_to_subt=0;
	  
	       //alert(totalcharges);
	     jQuery(".panel-body #fixed_rate").change(function(){
			 
			 if(jQuery(this).prop('checked') == false)    // If checkbox is not checked
			 {
				 var checkbox_val=jQuery(this).val();
				 alert("hi"+checkbox_val);

				 value_to_subt=parseFloat(array_store_values[checkbox_val]);
				 		
				 

				 delete array_store_values[checkbox_val];
				 atr = [];  // empty existing Array				 
				 var keys = Object.keys(array_store_values);
					for (var i = 0; i < keys.length; i++) {
							atr.push(array_store_values[keys[i]]);
							// use val
						}

						
				
				   totalcharges=totalcharges-value_to_subt;
				   jQuery("#extras").val(totalcharges);
				    jQuery("#store_hidden_array").val(atr); 

				    var vr		=	parseFloat(jQuery("#venue_rental").val());
					var extras	=	parseFloat(jQuery("#extras").val());
					var cb		=	parseFloat(jQuery("#catering_bayout").val());
					var stax	=	parseFloat(jQuery("#default_tax_per").val());	
					var scharge	=	parseFloat(jQuery("#service_charge_per").val());
					var st		=	vr + extras + cb;
					var stcal	=	st * stax / 100; //Total tax
					var stotal  = 	st+stcal ;
					var scal	=	st * scharge / 100;
					$("#default_tax").val(stcal);
					$("#service_charge").val(scal);
					var gtotal	=	vr+extras+cb+stcal+scal;
					$("#grand_total").val(gtotal);

					


			
			 }
			 else     // if checkbox is checked
			 {
				var checkbox_val=jQuery(this).val();
	           var curnt_div=jQuery(this).parent().parent().parent().parent().find('#service_type_price').val();
	           curnt_div=parseFloat(curnt_div);
	           //alert(curnt_div);
	           array_store_values[checkbox_val]=curnt_div;   // CREATE A Assoc array  
	           totalcharges=totalcharges+curnt_div;
	              jQuery("#extras").val(totalcharges);
				atr = [];  // empty existing Array				 
				    var keys = Object.keys(array_store_values);
					for (var i = 0; i < keys.length; i++) {
							atr.push(array_store_values[keys[i]]);
							// use val
						}
	              
	                    jQuery("#store_hidden_array").val(atr);

	              var vr		=	parseFloat(jQuery("#venue_rental").val());
					var extras	=	parseFloat(jQuery("#extras").val());
					var cb		=	parseFloat(jQuery("#catering_bayout").val());
					var stax	=	parseFloat(jQuery("#default_tax_per").val());	
					var scharge	=	parseFloat(jQuery("#service_charge_per").val());
					
					var st		=	vr + extras + cb;
					var stcal	=	st * stax / 100; //Total tax
					var stotal  = 	st+stcal ;
					var scal	=	st * scharge / 100;
					$("#default_tax").val(stcal);
					
					$("#service_charge").val(scal);
					var gtotal	=	vr+extras+cb+stcal+scal;
					$("#grand_total").val(gtotal);

			 }
			   
			    		
			  
	    });   // CHECKBOX CHANGE CLOSED
	    
	      //   Test Custom Code---------------------****************************START********************************
			/*   
			     jQuery("input#service_type_price").bind("keyup",function(){
					 var curnt_prev_val=jQuery(this).attr("value");   // get the attr value
				     var crnt_txt_box_val=(jQuery(this).val());
				          this.setAttribute("Value",crnt_txt_box_val);     // SET the attribute value
	                 var curnt_div_1=jQuery(this).parent().parent().find('#fixed_rate');
	                 var curnt_div_1_val=jQuery(this).parent().parent().find('#fixed_rate').val();
	                 var curnt_val1=0;
	                 var extra_charges=parseFloat(jQuery("#extras").val());
	                     if(jQuery(curnt_div_1).is(':checked'))   // if checkbox is checked and value is changed
	                      {
						      curnt_val1=parseFloat(crnt_txt_box_val); 
                              extra_charges=extra_charges-curnt_prev_val+curnt_val1;
	                          array_store_values[curnt_div_1_val]=curnt_val1;          // CHANGE value inside array if checked
	                          jQuery("#extras").val(extra_charges);   // set value of extra charge
	                          
	                          // SET THE Hidden field array
	                          atr = [];  // empty existing Array				 
				              var keys = Object.keys(array_store_values);
					            for (var i = 0; i < keys.length; i++) {
							        atr.push(array_store_values[keys[i]]);
							   
						             }   // For closed
	                          jQuery("#store_hidden_array").val(atr);
	                          
						  }   
	                
	                
	                
	                
	                
					 });   // bind closed
			  */ 
			   //TEST custom Code-----------------------------------*******************************ENDS************************* 		
			    		
			    			 
	    
	    jQuery("#room_name, #venue_rental, #catering_bayout, #extras, #default_tax, #service_charge, #security_deposit, #down_payment").bind("keyup", function(){
					
					var vr		=	parseFloat(jQuery("#venue_rental").val());
					var extras	=	parseFloat(jQuery("#extras").val());
					var cb		=	parseFloat(jQuery("#catering_bayout").val());
					var stax	=	parseFloat(jQuery("#default_tax_per").val());	
					var scharge	=	parseFloat(jQuery("#service_charge_per").val());
					var st		=	vr + extras + cb;
					var stcal	=	st * stax / 100; 
					var stotal  = 	st+stcal ;
					jQuery("#sub_total").val(stotal);
					
					var scal	=	st * scharge / 100;
					var schtotal	=	st + scal;

					jQuery("#default_tax").val(stcal);
					jQuery("#service_charge").val(scal);

					jQuery("#schtotal").val(schtotal);
					var gtotal	=	vr+extras+cb+stcal+scal;
					jQuery("#grand_total").val(gtotal);

			
			var monthly_ins	=	parseFloat(jQuery("#monthly_ins").val());
			var downp	=	parseFloat(jQuery("#down_payment").val());
			var tbal	=	gtotal - downp;

			var num_of_install = tbal/monthly_ins;
			
			
			jQuery("#total_balance").val(tbal);
			jQuery("#no_of_ins").val(num_of_install);




				});						
	   });
</script>	
		
<section id="content">
	<section class="hbox stretch">			
			<aside>
			<section class="vbox">
				<header class="header bg-white b-b clearfix">
					<div class="row m-t-sm">
						<div class="col-sm-8 m-b-xs">
							
						<div class="btn-group">
						</div>
						<a class="btn btn-sm btn-dark" href="<?=base_url()?>events/view_events/all" title="<?=lang('all_projects')?>" data-original-title="<?=lang('all_projects')?>" data-toggle="tooltip" data-placement="bottom">
						<i class="fa fa-coffee"></i>All Events</a>
						</div>
						<div class="col-sm-4 m-b-xs">
						<?php  echo form_open(base_url().'events/search'); ?>
							<div class="input-group">
								<input type="text" class="input-sm form-control" name="keyword" placeholder="<?=lang('search')?> <?=lang('project')?>">
								<span class="input-group-btn"> <button class="btn btn-sm btn-default" type="submit">Go!</button>
								</span>
							</div>
							</form>
						</div>
					</div> </header>
					<section class="scrollable wrapper w-f">
					<!-- Start Event Form -->
	<?php
			 $attributes = array('class' => 'bs-example form-horizontal');
          echo form_open(base_url().'events/view/edit/'.$event->event_id,$attributes); ?>
          <?php echo validation_errors('<span style="color:red">', '</span><br>'); ?>
			 <input type="hidden" name="event_id" value="<?=$event->event_id?>">				
					
						<!----   Charges, Room Setup and Event Status   -->
				
				
				<div class="col-sm-12">
					<h2>Edit Event</h2>
						<section class="panel panel-default">
						<header class="panel-heading font-bold"><i class="fa fa-info-circle"></i> Booking Information</header>
						<div class="panel-body">
				<div class="col-sm-6">
					<div class="form-group">
			        <label class="col-lg-4 control-label">Select Hall <span class="text-danger">*</span> </label>
			       <div class="col-lg-8">
					  <select id="room_name" class="form-control" name="room_name" required> 
			          <option value="">Please Select..</option>
			            <?php
			             if (!empty($rooms)) {
			            foreach ($rooms as $key => $c) { ?>
			            <option <?php if($c->room_name==$event->room_name) echo "selected='selected'" ?> value="<?=$c->room_name?>"><?=$c->room_name?></option>
			            <?php }} ?>
			          
			          </select>
				</div>
				</div>
				
				<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('start_date')?></label> 
			<div class="col-lg-8">
				<input class="input-sm datepicker-input form-control" size="16" type="text" value="<?=$event->start_date?>" name="start_date" data-date-format="dd-mm-yyyy" >
			</div> 
			</div> 
			
			<!--<div class="form-group">
				<label class="col-lg-4 control-label">End Date</label> 
			<div class="col-lg-8">
				<input class="input-sm datepicker-input form-control" size="16" type="text" value="<?=$event->due_date?>" name="due_date" data-date-format="dd-mm-yyyy" >
			</div> 
			</div> -->
			
			
						
			</div>
				<div class="col-sm-6">
			
				<div class="form-group">
				<label class="col-lg-4 control-label">Start Time</label> 
				<div class="col-lg-8">
						<select class="form-control" name="start_time">							
						<?php $from_time=$this->config->item('start_time');
						$to_time=$this->config->item('end_time');				
						for ($i = $from_time; $i <= $to_time; $i++) 
						{ 
						for ($s = 0; $s <= 59; $s+=30) 
							{ 
						$time=date('h:i:sa', mktime($i, $s, 0, 0, 0, 2006));?>
						<option <?php if($event->start_time==$time) echo "selected='selected'"?> value="<?php echo $time ?>"><?php echo $time ?></option>
						<?php  if($i==$to_time)
						break;
						}} ?>
						</select>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-lg-4 control-label">End Time</label> 
				<div class="col-lg-8">
						<select class="form-control" name="end_time">
						<?php $from_time=$this->config->item('start_time');
						$to_time=$this->config->item('end_time');						
						for ($i = $from_time; $i <= $to_time; $i++) 
						{ 
						for ($s = 0; $s <= 59; $s+=30) 
							{ 
						$time=date('h:i:sa', mktime($i, $s, 0, 0, 0, 2006));?>
						<option <?php if($event->end_time==$time) echo "selected='selected'"?> value="<?php echo $time ?>"><?php echo $time ?></option>
						<?php  if($i==$to_time)
						break;
						}} ?>
						</select>
				</div>
			</div>
				
				
				</div>
				</section>
				</div>
					
					
					<div class="col-sm-12">
						<section class="panel panel-default">
						<header class="panel-heading font-bold"><i class="fa fa-info-circle"></i> <?=lang('project_details')?></header>
						<div class="panel-body">
					
			 	<div class="col-sm-6">          		
				<?php $this->load->helper('string'); ?>
					<input type="hidden" class="form-control" value="<?=$event->event_code?>" name="event_code">
				
				
							    
			      <div class="form-group">				
				<label class="col-lg-4 control-label"> Name <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<input value="<?=$event->customer_name?>" type="text" id="customer_name" class="form-control" name="customer_name">
				</div>
				</div>
				<div class="form-group">
				<label class="col-lg-4 control-label"> Address <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<input value="<?=$event->address?>" type="text" id="customer_address" class="form-control" name="address">
				</div>
				</div>
				<div class="form-group">
				<label class="col-lg-4 control-label"> Telephone</label>
				<div class="col-lg-8">
					<input value="<?=$event->telephone?>" type="text" id="customer_phone" class="form-control" name="mobile">
				</div>
				</div>
				<div class="form-group">
				<label class="col-lg-4 control-label"> Email <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<input value="<?=$event->email?>" id="customer_email" type="text" class="form-control" name="email">
				</div>
				</div>	
			  </div>
				
				
			      <div class="col-sm-6">	
					  <div class="form-group">
				<label class="col-lg-4 control-label">Event Title <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<input value="<?=$event->event_title?>" type="text" class="form-control" placeholder="Event Title" name="event_title">
				</div>
				</div>			
				<div class="form-group">
			        <label class="col-lg-4 control-label">Event Type <span class="text-danger">*</span> </label>
			        <div class="col-lg-8">
			          <select class="form-control" name="type" required> 
			            <?php
			            if (!empty($type)) {
			            foreach ($type as $key => $c) { ?>
			            <option <?php if($event->type==$c->event_type) echo "selected='selected'"?> value="<?=$c->event_type?>"><?=strtoupper($c->event_type)?></option>
			            <?php }} ?>			         
			          </select> 
			        </div>
			      </div>
			       <div class="form-group">
			        <label class="col-lg-4 control-label">Event Status <span class="text-danger">*</span> </label>
			       <div class="col-lg-8">
						<select class="form-control" name="event_status" required> 
			          
			            <?php
			            if (!empty($event_status)) {
			            foreach ($event_status as $key => $c) { ?>
			            <option <?php if($event->event_status==$c->event_status) echo "selected='selected'"?> value="<?=$c->event_status?>"><?=$c->event_status?></option>
			            <?php }} ?>
			          
			          </select> 
				</div>
				</div>
			      <div class="form-group">
				<label class="col-lg-4 control-label"> Number of Guests <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<input value="<?=$event->pax?>" type="text" class="form-control" name="pax">
				</div>
			</div>
			
				</div></div>
				</section> </div>
				
			
				
				<!---    Repeat This Event  -->
				
				<div class="col-sm-12">
						<section class="panel panel-default">
						<header class="panel-heading font-bold"><i class="fa fa-info-circle"></i> Additional Services </header>
						<div class="panel-body">
					<div class="col-sm-12">
				
			        	<?php $inc=explode(",",$event->service_type);?>		        
						<?php foreach ($service_type as $service) { ?>
							<div class="col-sm-6">
							<div class="form-group">
							
					<div class="col-lg-4">
					<div class="checkbox"> 
					<label class="control-label"> 
						
					<input id="fixed_rate" <?php  if (isset($inc) && in_array($service->service_type , $inc))  echo "checked";?> name="service_type[]"  value="<?=$service->service_type?>" type="checkbox"><?=$service->service_type?>
					</label> 					
					</div>
					</div>
					<div class="col-sm-6">
					<input  id="service_type_price" type="text" value="<?=$service->price?>" class="form-control" name="service_type_price[]">
					</div>
					</div>
					</div>
					<?php } ?> 

				</div>	
				</div>
				</section>
				</div>
				

				
				<!---    Create Additional Sessions For:  -->
				
				<div class="col-sm-12">
						<section class="panel panel-default">
						<header class="panel-heading font-bold"><i class="fa fa-info-circle"></i> Pricing </header>
						<div class="panel-body">
			<table class="table table-striped m-b-none dataTable">
				<tr>				
					<td> Venue Rental <span class="text-danger">*</span></td>
					<td><div class="input-group m-b">
					<span class="input-group-addon"><?=$this->config->item('default_currency_symbol')?></span>
					<input type="text" value="<?=$event->venue_rental?>" id="venue_rental" class="form-control" name="venue_rental"></div></td>
					<td></td>
					<td></td>
				</tr>
				
				<tr>
					<td> Catering/Buyout <span class="text-danger">*</span></td>
					<td><div class="input-group m-b">
					<span class="input-group-addon"><?=$this->config->item('default_currency_symbol')?></span>
					<input value="0" type="text" value="<?=$event->catering_bayout?>" id="catering_bayout" class="form-control" name="catering_bayout"></div></td>
					
				</tr>
				
				<tr>
					<td> Extras/Waiters/Bartenders</td>
					<td><div class="input-group m-b">
					<span class="input-group-addon"><?=$this->config->item('default_currency_symbol')?></span>
					<input type="text" value="<?=$event->extras?>" id="extras" class="form-control" name="extras" readonly></div></td>
				</tr>
				
				<tr>
					<td> State Tax <span class="text-danger">*</span></td>
					<td><div class="input-group m-b">
					<span class="input-group-addon"><?=$this->config->item('default_currency_symbol')?></span>
					<input id="default_tax_per" value="<?=$this->config->item('default_tax')?>" type="hidden">
					<input id="default_tax" value="<?=$event->state_tax?>" type="text" class="form-control" name="state_tax" readonly>
					</div></td>
					<!--
					<td>Total After State Tax</td>
					<td><div class="input-group m-b">
					<span class="input-group-addon"><?=$this->config->item('default_currency_symbol')?></span>
					<input id="sub_total" value="0" type="text" class="form-control" name="sub_total" ></div>
					</td>
					-->
				</tr>
				
				<tr>							
					<td>Service Charge<span class="text-danger">*</span></td>
					<td><div class="input-group m-b">
					<span class="input-group-addon"><?=$this->config->item('default_currency_symbol')?></span>
					<input id="service_charge_per" type="hidden" value="<?=$this->config->item('service_charge')?>" >
					<input id="service_charge" type="text" value="<?=$event->service_charge?>"  class="form-control" name="service_charge" readonly>
					</div></td>
				</tr>
				
				<tr>
					<td> Security Deposit (Refundable) <span class="text-danger">*</span></td>
					<td><div class="input-group m-b">
					<span class="input-group-addon"><?=$this->config->item('default_currency_symbol')?></span>
					<input id="security_deposit" type="text" value="<?=$this->config->item('security_deposit')?>" class="form-control" name="security_deposit"></div></td>
				</tr>
				<?php //$grand_total	=?>
				
				<tr>
					<td> Grand Total</td>
					<td><div class="input-group m-b">
					<span class="input-group-addon"><?=$this->config->item('default_currency_symbol')?></span>
					<input type="text" id="grand_total" value="<?=$event->grand_total?>" class="form-control" name="grand_total"></div></td>
					<td> Monthly Installment</td>
					<td>
					<div class="input-group m-b">
					<span class="input-group-addon"><?=$this->config->item('default_currency_symbol')?></span>
					<input value="<?=$event->monthly_ins?>" type="text" id="monthly_ins" class="form-control" name="monthly_ins"></td>
					</div>
				</tr>
				
				<tr>
					<td> Down Payment<span class="text-danger">*</span></td>
					<td><div class="input-group m-b">
					<span class="input-group-addon"><?=$this->config->item('default_currency_symbol')?></span>
					<input value="<?=$event->down_payment?>" id="down_payment" type="text" class="form-control" name="dowm_payment"></div></td>
					<td> Number of Installments</td>
					<td><div class="input-group m-b">
					<span class="input-group-addon">#</span>
					<input value="<?=$event->no_of_ins?>" type="text" id="no_of_ins" class="form-control" name="no_of_ins"></div></td>
				</tr>
					
				<tr>
					<td> Total Balance<span class="text-danger">*</span></td>
					<td><div class="input-group m-b">
					<span class="input-group-addon"><?=$this->config->item('default_currency_symbol')?></span>
					<input value="<?=$event->total_balance?>" value="<?=$event->ins_start_date?>" type="text" class="form-control" name="total_balance"></div></td>
					<td colspan="2">
						<div class="col-lg-6"><input value="<?=$event->ins_start_date?>" type="text" class="datepicker-input form-control" name="ins_start_date"></div>
						<div class="col-lg-6"><input value="<?=$event->ins_end_date?>" type="text" class="datepicker-input form-control" data-date-format="dd-mm-yyyy" name="ins_end_date" ></div>
					</td>
				</tr>	
			</table>
				</div>
				</section>
				</div>
							<!-- Notes Section -->
	<div class="col-sm-12">
		<section class="panel panel-default">
			<header class="panel-heading font-bold"><i class="fa fa-info-circle"></i> Additional Information</header>
			<div class="panel-body">
					<div class="col-sm-6">				
						<div class="form-group">
							<label class="col-lg-4 control-label">Event Producer</label> 
							<div class="col-lg-8">
							<input class="input-sm form-control" type="text" value="<?=$event->event_producer?>" name="event_producer" >
							</div> 
						</div> 						
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-lg-4 control-label">Notes</label> 
							<div class="col-lg-8">
							<textarea class="input-sm form-control" name="notes" ><?=$event->notes?></textarea>
							</div> 
						</div> 	
					</div>				
			</div>
		</section>
	</div>
				
				
			<div class="col-lg-12">
					<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Update Event</button>
			</div>			
			</div>
	</section>
				</div>					 
				</form>
					 <!-- End Event Form -->

					</section>  

		</section> </aside> </section> <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>

<?php }} ?>

<!-- end -->
