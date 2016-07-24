<header class="bg-dark  header navbar navbar-fixed-top-xs">
	<div class="navbar-header aside-md"> <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> <a href="#" class="navbar-brand" data-toggle="fullscreen"><img src="<?=base_url()?>resource/images/<?=$this->config->item('customer_logo')?>" class="m-r-sm"><?=$this->config->item('customer_name')?></a><a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i> </a>
	</div>
	<ul class="nav navbar-nav hidden-xs">
		<li class="dropdown">
		<a href="#" class="dropdown-toggle dker" data-toggle="dropdown"> <i class="fa fa-user"></i>
			<span class="font-bold"></span>
		</a> <section class="dropdown-menu aside-xl on animated fadeInLeft no-borders lt">
				<div class="wrapper lter m-t-n-xs"> <a href="#" class="thumb pull-left m-r"> <img src="<?=base_url()?>resource/avatar/<?=$this->user_profile->get_profile_details($this->tank_auth->get_user_id(),'avatar')?>" class="img-circle"> </a>
					<div class="clear"> 
					<a href="<?=base_url()?>profile/settings">
						<span class="text-white font-bold"><?php
						echo ucfirst($this->user_profile->get_profile_details($this->tank_auth->get_user_id(),'fullname') ? $this->user_profile->get_profile_details($this->tank_auth->get_user_id(),'fullname'): $this->tank_auth->get_username())?>
						</a>
						</span> <small class="block"><?=lang('role')?>: <?=ucfirst($this->tank_auth->user_role($this->tank_auth->get_role_id()))?></small> <a href="<?=base_url()?>profile/settings" class="btn btn-xs btn-success m-t-xs"><?=lang('my_account')?></a>
					</div>
				</div>
			</section> </li>
			</ul>
			<ul class="nav navbar-nav navbar-right hidden-xs nav-user">
		

						<!--<li class="dropdown hidden-xs"> <a href="#" class="dropdown-toggle dker" data-toggle="dropdown"><i class="fa fa-fw fa-search"></i></a> <section class="dropdown-menu aside-xl animated fadeInUp"> <section class="panel bg-white">
							<?php /*
							$role = $this->tank_auth->user_role($this->tank_auth->get_role_id());
							if ($role == 'client') { 
									$link = 'customers/inv_manage/search'; }
								elseif ($role == 'collaborator') { 
									$link = 'collaborator/inv_manage/search'; }
								else{ 
									$link = 'invoices/manage/search';
							}
							$attributes = array('role' => 'search');
							echo form_open(base_url().$link,$attributes); */?>
								<div class="form-group wrapper m-b-none">
									<div class="input-group">
										<input type="text" class="form-control" name="keyword" placeholder="<?/*=lang('invoice_search')*/?>">
										<span class="input-group-btn"> 
										<button type="submit" class="btn btn-dark btn-icon"><i class="fa fa-search"></i></button>
										</span>
									</div>
								</div>
							</form>
						</section>
					</section> </li>-->
					<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<span class="thumb-sm avatar pull-left"> 
						<img src="<?=base_url()?>resource/avatar/<?=$this->user_profile->get_profile_details($this->tank_auth->get_user_id(),'avatar') ?>">
						</span> <?php 
	echo $this->user_profile->get_profile_details($this->tank_auth->get_user_id(),'fullname') ? $this->user_profile->get_profile_details($this->tank_auth->get_user_id(),'fullname') : $this->tank_auth->get_username()?> <b class="caret"></b> </a>
						<ul class="dropdown-menu animated fadeInRight">
							<span class="arrow top">
							</span>
							<li> <a href="<?=base_url()?>profile/settings"><?=lang('settings')?></a> </li>
							<!-- <li> <a href="<?=base_url()?>profile/activities">
								<span class="badge bg-danger pull-right">
								<?php
				$query = $this->db->where('user',$this->tank_auth->get_user_id())->get('activities');
               echo $query->num_rows();
                ?>
							</span> <?=lang('activities')?> </a> </li> -->
							
							
							<li class="divider"></li>
							<li> <a href="<?=base_url()?>auth/logout" ><?=lang('logout')?></a> </li>
						</ul> </li>
					</ul>
				</header>
