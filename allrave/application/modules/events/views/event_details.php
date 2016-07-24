<!-- Start -->
	<?php if (!empty($event_details)) {
				foreach ($event_details as $key => $project) { ?>
	<section id="content">
		<section class="hbox stretch">	
			<aside class="aside-md bg-white b-r" id="subNav">
			<div class="wrapper b-b header"><?=lang('all_projects')?>
			</div>
			<section class="vbox">
			 <section class="scrollable w-f">
			   <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
			<ul class="nav">
			
				<li class="b-b b-light bg-light dk">
				<?php $estimates=$this->db->where(array('event_id'=>$project->event_id))->get('estimates');
				foreach($estimates->result_array() as $est){ ?>
				<a href="<?=base_url('estimates/manage/details/'.$est['est_id'])?>">View Estimate</a>
				</li>
				<li class="b-b b-light bg-light dk">
				<a href="<?=base_url('fopdf/view_contract/'.$est['est_id'])?>">View Contract</a>
				 <?php } ?>
				</li>
				<li class="b-b b-light bg-light dk">
				<a href="<?=base_url('events/files/index/'.$project->event_id)?>">File Management</a>
				</li>
				
				<?php $invoices=$this->db->where(array('event_id'=>$project->event_id))->get('invoices');
				foreach($invoices->result_array() as $inv){ ?>
				
				<li class="b-b b-light bg-light dk">
				<a href="<?=base_url('invoices/manage/details/'.$inv['inv_id'])?>">Add Payment</a> <?php } ?>
				</li>
				<li class="b-b b-light bg-light dk">
				<a href="<?=base_url('events/scheduling/'.$project->event_id)?>">Scheduling</a>
				</li>
			</ul> 
			</div></section>
			</section>
			</aside> 
			
			<aside>
			<section class="vbox">
		
				<header class="header bg-white b-b clearfix">
					<div class="row m-t-sm">
						<div class="col-sm-8 m-b-xs">
							
						<div class="btn-group">
						
						</div>
						<a class="btn btn-sm btn-dark" href="<?=base_url()?>events/view/add" title="<?=lang('new_project')?>" data-original-title="<?=lang('new_project')?>" data-toggle="tooltip" data-placement="bottom">
						<i class="fa fa-plus"></i> <?=lang('new_project')?></a>
						<a class="btn btn-sm btn-danger" href="<?=base_url()?>events/delete/<?=$project->event_id?>" title="<?=lang('delete_project')?>" data-toggle="ajaxModal" data-placement="bottom">
						<i class="fa fa-trash-o"></i> <?=lang('delete_project')?></a>
						
						<a class="btn btn-sm btn-dark" href="<?=base_url()?>events/view/edit/<?=$project->event_id?>" title="Edit" data-original-title="Edit" data-toggle="tooltip" data-placement="bottom">
						<i class="fa fa-edit"></i> Edit</a>
						
						</div>
						<div class="col-sm-4 m-b-xs">
						<?php  echo form_open(base_url().'events/search'); ?>
							<div class="input-group">
								<input type="text" class="input-sm form-control" name="keyword" placeholder="<?=lang('search')?> <?=lang('project')?>">
								<span class="input-group-btn"> <button class="btn btn-sm btn-default" type="submit"><?=lang('go')?>!</button>
								</span>
							</div>
							</form>
						</div>
					</div> </header>
					<section class="scrollable wrapper w-f">
					<!-- Start create project -->
<div class="col-sm-12">
	<section class="panel panel-default">
	<header class="panel-heading font-bold"><i class="fa fa-info-circle"></i> <?=lang('project_details')?></header>
	<div class="panel-body">
          <table class="table table-striped m-b-none dataTable">
			 <tr>
				<td><?=lang('project_code')?></td>
				<td><?=$project->event_id?>	</td>
				<td><?=lang('project_title')?></td>
				<td><?=$project->event_title?></td>
			</tr>
			
			<tr>
				<td>Hall</td>
				<td><?=$project->room_name?></td>
				<td>Start Time </td>
				<td><?=$project->start_time?></td>
			</tr>
			
			<tr>
				<td>Start Date</td>
				<td><?=$project->start_date?></td>
				<td>End Time</td>
				<td><?=$project->end_time?></td>
			</tr>
			
			<tr><td>Name</td>
				<td><?=$project->customer_name?></td>
				<td> Event title</td>
				<td><?=$project->event_title?>
			</tr>
			<tr><td>Address</td>
				<td><?=$project->address?></td>
				<td>Event Type</td>
				<td><?=$project->type?></td>
			</tr>
			<tr>
				<td>Telephone </td>
				<td><?=$project->telephone?></td>
				<td>Event Status </td>
				<td><?=$project->event_status?></td>
			</tr>
			<tr>				
				<td>Email</td>
				<td><?=$project->email?></td>
				<td>No of Guests</td>
				<td><?=$project->pax?></td>
			</tr>
			
			
				
	</table>

	
</div>
</section>

<section class="panel panel-default">
	<header class="panel-heading font-bold"><i class="fa fa-info-circle"></i>Additional Services</header>
	<div class="panel-body">

	<?php $st  = explode(',',$project->service_type);
	$stp = explode(',',$project->service_type_price); ?>
 <table class="table table-striped m-b-none dataTable">

<tr>
	<?php foreach ($st as $est) { ?>
	<td><?=$est?></td>
	<?php } ?>
</tr>

<tr>
	<?php foreach ($stp as $estp) { ?>
	<td><?=$estp?></td>
	<?php } ?>
</tr>

 </table>
</div>
</section>

<section class="panel panel-default">
	<header class="panel-heading font-bold"><i class="fa fa-info-circle"></i>Event Cost</header>
	<div class="panel-body">
 <table class="table table-striped m-b-none dataTable">
 <tr>
 <th>Item</th>
 <th>Detail</th>
 </tr>
 <tr>
	<td>Venue Rental</td>
	<td><?=$project->venue_rental?></td>
</tr>
<tr>
	<td>Catering/Buyout</td>
	<td><?=$project->catering_bayout?></td>
</tr>
<tr>	
	<td>Extras/Waiters/Bartenders</td>
	<td><?=$project->extras?></td>
</tr>
<tr>
	<td>State Tax </td>
	<td><?=$project->state_tax?></td>
</tr>
<tr>
	<td>Service Charge</td>
	<td><?=$project->service_charge?></td>
</tr>
<tr>
	<td>Security Deposit (Refundable) </td>
	<td><?=$project->security_deposit?></td>
</tr>
<tr>
	<td>Grand Total</td>
	<td><?=$project->grand_total?></td>
</tr>
<tr>
	<td>Number of Installments</td>
	<td><?=$project->no_of_ins?></td>
</tr>
<tr>
	<td>Installment Amount</td>
	<td><?=$project->monthly_ins?></td>
</tr>
<tr>
	<td>Start Date</td>
	<td><?=$project->ins_start_date?></td>
</tr>
<tr>
	<td>End Date</td>
	<td><?=$project->ins_end_date?></td>
</tr>
<tr>
	<td>Down Payment</td>
	<td><?=$project->down_payment?></td>
</tr>
<tr>
<td>Total_balance</td>
<td><?=$project->total_balance?></td>
</tr>
 
 </table>
</div>
</section>
</div>

<section class="panel panel-default">
	<header class="panel-heading font-bold"><i class="fa fa-info-circle"></i>Additional Information</header>
	<div class="panel-body">
 <table class="table table-striped m-b-none dataTable">
<tr>
	<td>Event Producer</td>
	<td><?=$project->event_producer?></td>
</tr>
<tr>
	<td>Notes</td>
	<td><?=$project->notes?></td>
</tr>

 </table>
</div>
</section>	
<!-- End create project -->



					</section>  




		</section> </aside> </section> <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>

	<?php } } ?>

<!-- end -->
