<section id="content"> <section class="vbox"> <section class="scrollable padder">
	<!-- <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
		<li><a href="<?=base_url()?>"><i class="fa fa-home"></i> <?=lang('dashboard')?></a></li>
		<li><a href="<?=base_url()?>profile/settings"><?=lang('profile')?></a></li>
		<li class="active"><?=lang('activities')?></li>
	</ul> -->
	<section class="panel panel-default">
	<header class="panel-heading"> <?=lang('all_activities')?> </header>
	
	<div class="table-responsive">
		<table class="table table-striped b-t b-light text-sm">
			<thead>
				<tr>					
					<th><?=lang('module')?></th>
					<th><?=lang('activity')?> </th>
					<th><?=lang('activity_date')?></th>
				</tr> </thead> <tbody>
				<?php
					if (!empty($activities)) {
					foreach ($activities as $key => $a) { ?>
				<tr>
				<td><?=strtoupper($a->module)?></td>
				<td><?=$a->activity?></td>
				<td><?=$a->activity_date?></td>
			</tr>
			<?php }} else{ ?>
				 <tr>
								<td></td><td><?=lang('nothing_to_display')?></td><td></td>
								</tr>
				<?php } ?>
			
	

 </tbody>
</table>
</div>
<footer class="panel-footer">
				<div class="row">
				<div class="col-sm-4 hidden-xs">
				<?php
				$query = $this->db->where('user',$this->tank_auth->get_user_id())->get('activities');
                $records_found = $query->num_rows();
                ?>
				</div>
				<div class="col-sm-4 text-center"> <small class="text-muted inline m-t-sm m-b-sm">Showing <?=$records_found?> <?=lang('activities')?></small>
				</div>
				<div class="col-sm-4 text-right text-center-xs">
				<!-- Paging-->
            <div class="mt40 clearfix">
                      <?php
                                   

                                  
                                        $this->load->library('pagination');
                                        $config['base_url'] = site_url().'profile/activities/';
                                        $config['total_rows'] = $records_found;
                                        $config['full_tag_open'] = '<ul class="pagination pagination-sm m-t-none m-b-none">';
                                        $config['full_tag_close'] = '</ul>';
                                        $config['per_page'] = 30;
                                        $config['uri_segment'] = 3;
                                        $this->pagination->initialize($config);
                                        echo $this->pagination->create_links();
                                        ?>
               
            </div>
				</div>
				</div>
</footer>
</section>
</section>
</section>
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>
