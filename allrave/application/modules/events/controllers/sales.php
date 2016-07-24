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
			
			</ul>
			</div></section>
			</section>
			</aside> 
			
			<aside>
			<section class="vbox">
				<header class="header bg-white b-b clearfix">
					<div class="row m-t-sm">
						<div class="col-sm-2 m-b-xs">
							
						<div class="btn-group">
						
						</div>
						<a class="btn btn-sm btn-dark" href="<?=base_url()?>events/view/add" title="<?=lang('new_project')?>" data-original-title="<?=lang('new_project')?>" data-toggle="tooltip" data-placement="bottom">
						<i class="fa fa-plus"></i> <?=lang('new_project')?></a>
						</div>
						<div class="col-sm-10 m-b-xs">
						<?php  echo form_open(base_url().'events/search'); ?>
							<div class="input-group">
								<div class="col-sm-3 m-b-xs">
								<select class="input-sm form-control" name="room_name">
									<option value="">All</option>
								<?php foreach ($rooms as $room){?>
									<option <?php if($_POST['room_name']==$room->room_name) echo "selected='selected'"?> value="<?=$room->room_name?>"><?=$room->room_name?></option>
									<?php } ?>
								</select>	
								</div>
								<div class="col-sm-3 m-b-xs">
								<input type="text" class="input-sm form-control" value="<?=$_POST['event_id']?>" name="event_id" placeholder="Event Code">
								</div>
								<div class="col-sm-3 m-b-xs">
								<input type="text" class="input-sm datepicker-input form-control" value="<?=$_POST['start_date']?>" name="start_date" placeholder="Event Date">
								</div>								
								<span class="input-group-btn"> <button class="btn btn-sm btn-default" type="submit"><?=lang('go')?>!</button>
								</span>
							</div>
							</form>
						</div>
					</div> </header>
					<section class="scrollable wrapper w-f">
					<!-- Start Display chart -->
					<?php
				if (!empty($events)) {
			foreach ($events as $key => $p) { 
			$rms=$this->db->where(array('room_name'=>$p->room_name))->get('rooms');
			foreach ($rms->result_array() as $rm){ ?>				
									
				<li class="b-b b-light">
				<a href="<?=base_url()?>events/view/details/<?=$p->event_id?>" data-toggle="tooltip" data-original-title="<?=$p->event_title?>">
				 <?=$p->start_date?>
				<div class="pull-right">
				<strong> <?=$p->event_title?></strong>
				</div> <br>
				<small class="block text-muted"></small>
				<small class="block small text-muted"> | <i style="color:#<?=$rm['color']?>" class="fa fa-circle text-dark pull-right m-t-xs"></i>
				
				 <span style="background:#<?=$rm['color']?>" class="label bg-primary"><?=$rm['room_name']?></span>
				 
				 </small>
				

				</a> </li>
				<?php } } }?>
					 <?php  echo modules::run('sidebar/flash_msg');?>


					 <!-- End display chart -->






					</section>  




		</section> </aside> </section> <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>



<!-- end -->
