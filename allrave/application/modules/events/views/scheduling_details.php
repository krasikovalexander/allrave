<section id="content">
	<section class="hbox stretch">
		<?php
										if (!empty($scheduling_details)) {
		foreach ($scheduling_details as $key => $i) { ?>
		<!-- .aside -->
		<aside>
			<section class="vbox">
				<header class="header bg-white b-b b-light">
					

					<p>Scheduling Details </p>
				</header>
				<section class="scrollable wrapper">
					<div class="row">		
						
											
							<!-- Details START -->
							<div class="col-lg-3">
				<ul class="nav">				
				<?php $schedulings=$this->db->where(array('id'=>$i->id))->get('scheduling');
				foreach($schedulings->result_array() as $sch){ ?>
				<li class="b-b b-light bg-light dk"><a href="<?=base_url('events/scheduling/'.$sch['event_id'])?>">Back to Scheduling</a>
				<?php } ?>
				</li>
				</ul>						 
			  </div>
            <div class="col-lg-9">
				<section class="panel panel-default">	
								<div class="group panel-body">
									<h4 class="subheader text-muted">Scheduling Details</h4>
									<?php
					echo form_open(base_url().'events/view/scheduling_update'); ?>
					<?php echo validation_errors(); ?>
					<input type="hidden" name="event_id" value="<?=$i->event_id?>">
					<input type="hidden" name="id" value="<?=$i->id?>">
					
					
					 <div class="form-group">
						<label>Employee Category<span class="text-danger">*</span></label>
						<select class="form-control" name="emp_cat">
						<?php foreach ($scheduling_cat as $sch_cat) {?>
							<option <?php if($sch_cat->scheduling==$i->emp_cat) echo "selected='selected'";?> value="<?=$sch_cat->scheduling?>"><?=$sch_cat->scheduling?></option>			
							<?php } ?>
						</select>
					  </div>
					 
					<div class="form-group">
						<label>Quantity <span class="text-danger">*</span></label>
						<input type="text" name="quantity" value="<?=$i->quantity?>" class="input-sm form-control" required>
					</div>
					
					<div class="form-group">
						<label>Name <span class="text-danger">*</span></label>
						<input type="text" name="name" value="<?=$i->name?>" class="input-sm form-control" required>
					</div></div>								
					<button type="submit" class="btn btn-sm btn-success"><?=lang('save_changes')?></button>
					
				</form>
								  </div>								
								</div>
				</section>			
							<!-- Details END -->
				</div>	
					
				</section>
			</section>
		</aside>
		<!-- /.aside -->

		<?php }} ?>
	</section>
	<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html"></a>
</section>
