<section id="content"> 
	<section class="vbox"> <section class="scrollable padder">
	<!-- <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
		<li><a href="<?=base_url()?>"><i class="fa fa-home"></i> <?=lang('dashboard')?></a></li>
		<li><a href="<?=base_url()?>profile/settings"><?=lang('profile')?></a></li>
		<li class="active"><?=lang('activities')?></li>
	</ul> -->
	<section class="panel panel-default">
	<header class="panel-heading"> User Dashboard </header>



	
	<div class="table-responsive">
		<div class="col-sm-12 col-md-12">
			<div class="thumbnail tile tile-wide tile-orange">
				<center>
				<a href="#" >
					<h1 class="tile-text">
						All Rides
					</h1>
				</a>
			</center>
			</div>

			<div class="col-sm-6 col-md-6">
			<div class="thumbnail tile tile-wide tile-orange">
				<a href="#" >
					<h1 class="tile-text">
						I'm the 2!</h1>
				</a>
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<div class="thumbnail tile tile-wide tile-orange">
				<a href="#" >
					<h1 class="tile-text">
						I'm the 2!</h1>
				</a>
			</div>
		</div>



		<div class="col-sm-6 col-md-6">
			<div class="thumbnail tile tile-wide tile-orange">
				<a href="#" >
					<h1 class="tile-text">
						I'm the 2!</h1>
				</a>
			</div>
		</div>

		</div>
	</div>
<?php /*
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
*/ ?>
</section>
</section>
</section>
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>
