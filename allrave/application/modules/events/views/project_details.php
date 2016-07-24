<!-- Start -->


<section id="content">
	<section class="hbox stretch">
	
		<aside class="aside-md bg-white b-r" id="subNav">

			<div class="wrapper b-b header"><?=lang('all_projects')?>
			</div>
			<section class="vbox">
			 <section class="scrollable w-f">
			   <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
			<ul class="nav">
			<?php
				if (!empty($events)) {
			foreach ($events as $key => $p) { 
						$project_hours = $this->user_profile->project_hours($p->project_id);
						$hours_spent = round($project_hours, 1);
						$fix_rate = $this->user_profile->get_project_details($p->project_id,'fixed_rate');
						$hourly_rate = $this->user_profile->get_project_details($p->project_id,'hourly_rate');
						if ($fix_rate == 'No') {
							$cost = $hours_spent * $hourly_rate;
						}else{
							$cost = $this->user_profile->get_project_details($p->project_id,'fixed_price');
						}
					?>
				<li class="b-b b-light">
				<a href="<?=base_url()?>events/view/details/<?=$p->project_id?>" data-toggle="tooltip" data-original-title="<?=$p->project_title?>">
				<?=ucfirst($this->applib->customer_details($p->client,'customer_name'))?>
				<div class="pull-right">
				<small class="text-muted"><strong><?=$this->config->item('default_currency')?> <?=number_format($cost,2,$this->config->item('decimal_separator'),$this->config->item('thousand_separator'))?></strong></small>
				</div> <br>
				<small class="block text-muted"><?=$p->project_title?> 
				<?php if($p->timer == 'On'){ ?><i class="fa fa-clock-o text-danger"></i> <?php } ?></small>

				</a> </li>
				<?php } }?>
			</ul> 
			</div></section>
			</section>
			</aside> 
			
			<aside>
			<section class="vbox">
			<?php if (!empty($project_details)) {
				foreach ($project_details as $key => $project) { ?>
				<header class="header bg-white b-b clearfix">
					<div class="row m-t-sm">
						<div class="col-sm-8 m-b-xs">
							
						<div class="btn-group">
						
						</div>
						<a class="btn btn-sm btn-dark" href="<?=base_url()?>events/view/add" title="<?=lang('new_project')?>" data-original-title="<?=lang('new_project')?>" data-toggle="tooltip" data-placement="bottom">
						<i class="fa fa-plus"></i> <?=lang('new_project')?></a>
						<a class="btn btn-sm btn-danger" href="<?=base_url()?>events/delete/<?=$project->project_id?>" title="<?=lang('delete_project')?>" data-toggle="ajaxModal" data-placement="bottom">
						<i class="fa fa-trash-o"></i> <?=lang('delete_project')?></a>
						
						<a class="btn btn-sm btn-dark" href="<?=base_url()?>events/view/edit/<?=$project->project_id?>" title="Edit" data-original-title="Edit" data-toggle="tooltip" data-placement="bottom">
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

<?php
			 $attributes = array('class' => 'bs-example form-horizontal');
          echo form_open(base_url().'events/view/edit',$attributes); ?>
          <?php echo validation_errors('<span style="color:red">', '</span><br>'); ?>
          <table class="table table-striped m-b-none dataTable">
			 <tr>
				<td><?=lang('project_code')?></td>
				<td>	<?=$project->project_code?>	</td>
				<td><?=lang('project_title')?></td>
				<td><?=$project->project_title?></td>
			</tr>
			<tr>
				<td>Department</td>
				<td><?=$project->department?></td>
				<td>Zip/Post Code</td>
				<td><?=$project->zip_code?>
			</tr>
			<tr>
				<td>Address</td>
				<td><?=$project->address?></td>
				<td>Telephone </td>
				<td><?=$project->telephone?></td>
			</tr>
			<tr><td>Suburb</td>
				<td><?=$project->suburb?></td>
				<td> Mobile/Cell</td>
				<td><?=$project->mobile?>
			</tr>
			<tr><td> Contact Name </td>
				<td><?=$project->contact_name?></td>
				<td>City </td>
				<td><?=$project->city?></td>
			</tr>
			<tr>
				<td>Fax </td>
				<td><?=$project->fax?></td>
				<td>Event Host </td>
				<td><?=$project->event_host?></td>
			</tr>
			<tr>				
				<td>State / Country</td>
				<td><?=$project->state?></td>
				<td>Email</td>
				<td><?=$project->email?></td>
			</tr>
			<tr>
				<td>Company</td>
				<td><?=$project->company?></td>
				<td>Hear about us?</td>
				<td><?=$project->hear_aboutus?></td>
			</tr>
			<tr>
				<td><?=lang('start_date')?></td>
				<td><?=$project->start_date?></td>
				<td><?=lang('due_date')?></td>
				<td><?=$project->due_date?>
			</tr>
			
				</table>
				
		</form>
		<?php } } ?>
</div>
</section>
</div>


<!-- End create project -->






					</section>  




		</section> </aside> </section> <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>



<!-- end -->
