<section id="content"> <section class="vbox"> <section class="scrollable padder">
	<!-- <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
		<li><a href="<?=site_url()?>"><i class="fa fa-home"></i> <?=lang('home')?></a></li>
		<li class="active"><?=lang('dashboard')?></li>
	</ul> -->
	<div class="m-b-md"> <h3 class="m-b-none"><?=lang('dashboard')?></h3>
		<small><?=lang('welcome_back')?> , <?php
		echo $this->user_profile->get_profile_details($this->tank_auth->get_user_id(),'fullname')  ? $this->user_profile->get_profile_details($this->tank_auth->get_user_id(),'fullname') : $this->tank_auth->get_username()?> </small>
	</div>
	<section class="panel panel-default">
		<div class="row m-l-none m-r-none bg-light lter">
			<div class="col-sm-6 col-md-3 padder-v b-r b-light">
				<span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-dark"></i> <i class="fa fa-th-list icon fa-stack-1x text-white"></i>
				</span> <a class="clear" href="<?=base_url()?>events/view_events/all">
				<span class="h3 block m-t-xs"><strong><?=$this->user_profile->count_table_rows('events')?> </strong>
				</span> <small class="text-muted text-uc"><?=lang('events')?> </small> </a>
			</div>
			<div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
				<span class="fa-stack fa-2x pull-left m-r-sm"> <i class="fa fa-circle fa-stack-2x text-success"></i> <i class="fa fa-user fa-stack-1x text-white"></i>
				</span> <a class="clear" href="<?=base_url()?>users/account/active">
				<span class="h3 block m-t-xs"><strong><?=$this->user_profile->count_table_rows('users')?></strong>
				</span> <small class="text-muted text-uc"><?=lang('users')?>  </small> </a>
			</div>
		</div> </section>
		<div class="row">
			<div class="col-md-8">
				<section class="panel panel-default">
				<header class="panel-heading font-bold"> <?=lang('recent_projects')?></header>
				<div class="panel-body">
					
					<table class="table table-striped m-b-none text-sm">
						<thead>
							<tr>
								<th>Start Date</th>
								<th>Event Name</th>
								<th><?=lang('options')?></th>
							</tr> </thead>
							<tbody>
								
								<?php
								if (!empty($events)) {
								foreach ($events as $key => $project) { ?>								
								<tr>
								
									<td><?=$project->start_date?></td>
									<td><?=$project->event_title?> </td>
									<td>
										<a class="btn  btn-dark btn-xs" href="<?=base_url()?>events/view/details/<?=$project->event_id?>">
										<i class="fa fa-suitcase text"></i> <?=lang('project')?></a>
									</td>
								</tr>
								<?php }
								}else{ ?>
								<tr>
									<td><?=lang('nothing_to_display')?></td><td></td><td></td>
								</tr>
								<?php } ?>
								
								
							</tbody>
						</table>
					</div> <footer class="panel-footer bg-white no-padder">
					<div class="row text-center no-gutter">
						<div class="col-xs-3 b-r b-light">
							<span class="h4 font-bold m-t block"><?=$this->user_profile->count_rows('events',array('event_status >='=>'confirm'))?>
							</span> <small class="text-muted m-b block">Confirmed Events</small>
						</div>
						<div class="col-xs-3 b-r b-light">
							<span class="h4 font-bold m-t block"><?=$this->user_profile->count_rows('events',array('event_status >='=>'pending'))?>
							</span> <small class="text-muted m-b block">Pending Events</small>
						</div>
					</div> </footer>
				</section>
			</div>

			<div class="col-lg-4"> <section class="panel panel-default">
			<header class="panel-heading"><?=lang('paid_this_month')?> </header>
			<div class="panel-footer"><small><?=lang('average_this_month')?></small>
			</div> </section>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="row">
			<!-- Revenue Collection -->
                  <div class="col-lg-6">
                  <section class="panel panel-default">
                    <header class="panel-heading">Booking Calendar Chart</header>
                    <div class="panel-body text-center"> 
                 
                    

                <div class="col-lg-12">
				<table class="table table-striped m-b-none text-sm">
				<tr><td><a class="btn  btn-dark btn-xs" href="<?=base_url()?>events/view_confirmed_events">
				<i class="fa fa-suitcase text"></i> Confirmed Events</a></td>
				</tr>
				<tr>
				<td><a class="btn  btn-danger btn-xs" href="<?=base_url()?>events/view_pending_events">
										<i class="fa fa-suitcase text"></i> Pending Events</a></td>
				</tr>
				<tr>
				<td><a class="btn  btn-info btn-xs" href="<?=base_url()?>events/view_booked_events">
										<i class="fa fa-suitcase text"></i> Booked Events</a></td>
               </tr>
               
               </table>
                    </div>
                     
                  </section>
                </div>
                <!-- Percentage Received -->
                <div class="col-lg-6">
                  <section class="panel panel-default">
                    <header class="panel-heading">
                     <?=lang('percentage_received')?>
                    </header>
                    <div class="panel-body text-center">
                    <h4><?=lang('received_amount')?></h4>  
                     <small class="text-muted block"><?=lang('percentage_received')?></small> 

                      <div class="inline">
                        <div class="easypiechart" data-percent="<?=$perc_paid?>" data-line-width="6" data-loop="false" data-size="188">
                          <span class="h2 step"><?=$perc_paid?></span>%
                          <div class="easypie-text"><?=lang('received')?></div>
                        </div>
                      </div>
                    </div>
                    <div class="panel-footer">
                    <small><?=lang('total_receipts')?> + <?=lang('tax')?>: <strong><?=$this->config->item('default_currency')?> 
                    <?=number_format($total_receipts,2,$this->config->item('decimal_separator'),$this->config->item('thousand_separator'))?></strong></small></div>
                  </section>
                </div>
                
              </div>
		</div>
		<div class="col-md-4"> <section class="panel panel-default b-light">
<div class="panel-body">
			<section class="comment-list block"> 
			<?php
								if (!empty($activities)) {
								foreach ($activities as $key => $activity) { ?>
			<article id="comment-id-1" class="comment-item">
				<span class="fa-stack pull-left m-l-xs"><a class="pull-left thumb-sm"><img src="<?=base_url()?>resource/avatar/<?=$this->user_profile->get_profile_details($activity->user,'avatar')?>" class="img-circle"></a>
				</span> <section class="comment-body m-b-lg">
					<header> <a href="#"><strong><?=$this->user_profile->get_profile_details($activity->user,'fullname')?$this->user_profile->get_profile_details($activity->user,'fullname'):$this->user_profile->get_user_details($activity->user,'username')?></strong></a>					
						<span class="text-muted text-xs"> <?php
								$today = time();
								$activity_day = strtotime($activity->activity_date) ;
								echo $this->user_profile->get_time_diff($today,$activity_day);
							?> ago</span> </header>
					<div><?=$activity->activity?></div> 
					</section>
			</article>
			<?php }} ?>
						
						</section>

							</div>
							
						</section>
					</div>
				</div>
			</section>
		</section>
	<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>
