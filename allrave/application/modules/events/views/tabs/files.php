<section id="content">
		<section class="hbox stretch">	
			<aside class="aside-md bg-white b-r" id="subNav">
			<div class="wrapper b-b header">File Management
			</div>
			<section class="vbox">
			 <section class="scrollable w-f">
			   <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
			<ul class="nav">
			
				<li class="b-b b-light bg-light dk">
				<?php $estimates=$this->db->where(array('event_id'=>$event_id))->get('estimates');
				foreach($estimates->result_array() as $est){ ?>
				<a href="<?=base_url('estimates/manage/details/'.$est['est_id'])?>">View Estimate</a>
				</li>
				<li class="b-b b-light bg-light dk">
				<a href="<?=base_url('fopdf/view_contract/'.$est['est_id'])?>">View Contract</a>
				 <?php } ?>
				</li>
				<li class="b-b b-light bg-light dk">
				<a href="<?=base_url('events/files/index/'.$event_id)?>">File Management</a>
				</li>
				
				<?php $invoices=$this->db->where(array('event_id'=>$event_id))->get('invoices');
				foreach($invoices->result_array() as $inv){ ?>
				
				<li class="b-b b-light bg-light dk">
				<a href="<?=base_url('invoices/manage/details/'.$inv['inv_id'])?>">Add Payment</a> <?php } ?>
				</li>
				<li class="b-b b-light bg-light dk">
				<a href="<?=base_url('events/scheduling/'.$event_id)?>">Scheduling</a>
				</li>
			</ul> 
			</div></section>
			</section>
			</aside> 
			
			<aside>
			<section class="vbox">
			<header class="header b-b b-light hidden-print">
			<a href="<?=base_url()?>events/files/add/<?=$this->uri->segment(4)*1200?>"  data-toggle="ajaxModal" title="<?=lang('upload_file')?>" class="btn btn-sm btn-primary pull-right"><?=lang('upload_file')?></a> 
			 </header>
<section class="scrollable wrapper w-f">
					<!-- Start create project -->
<div class="col-sm-12">
	<section class="panel panel-default">
	<header class="panel-heading font-bold"><i class="fa fa-info-circle"></i> File Management</header>
	<div class="panel-body">


<ul class="list-group no-radius m-b-none m-t-n-xxs list-group-lg no-border"> 
			<?php if (!empty($project_files)) {
				foreach ($project_files as $key => $f) { ?>
		<li class="list-group-item"> 


		<a href="#" class="thumb-sm pull-left m-r-sm"> <img src="<?=base_url()?>resource/avatar/<?=$this->user_profile->get_profile_details($f->uploaded_by,'avatar')?>" class="img-circle"> </a>
			<a href="#" class="clear"> <small class="pull-right"><?php
								$today = time();
								$activity_day = strtotime($f->date_posted) ;
								echo $this->user_profile->get_time_diff($today,$activity_day);
							?> ago</small> <strong class="block"><?=ucfirst($this->user_profile->get_user_details($f->uploaded_by,'username'))?></strong> 
							<small>
							<a href="<?=base_url()?>events/files/download/<?=$f->file_id*1800?>/<?=$f->project*1200?>"><?=$f->file_name?></a></small>
							 </a>

<div><?=$f->description?>
</div> 
<div class="comment-action m-t-sm">
<a href="<?=base_url()?>events/files/download/<?=$f->file_id*1800?>/<?=$f->project*1200?>" title="<?=lang('download_file')?>" class="btn btn-dark btn-xs active"><i class="fa fa-download text-white text-active"></i> <?=lang('download')?></a>
<a href="<?=base_url()?>events/files/delete/<?=$f->file_id*1800?>/<?=$f->project*1200?>" title="<?=lang('delete_file')?>" data-toggle="ajaxModal" class="btn btn-danger btn-xs active"><i class="fa fa-trash-o text-white text-active"></i>  </a>

</div>

 						
		</li> 
		
				<?php } } else{		echo lang('nothing_to_display');	} ?>
	 
		</ul> 
		</div>
</section>

</div></section>
</div>
</section>
</div>


<!-- End create project -->



					</section>  




		</section> </aside> </section> <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>
