<section id="content">
          <section class="hbox stretch">
            <!-- .aside -->
            <aside>
              <section class="vbox">
               <header class="header bg-white b-b b-light">
                  <a href="#aside" data-toggle="class:show" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> <?=lang('new_user')?></a>
                  <p><?=lang('system_users')?></p>
                </header>
                <section class="scrollable wrapper">

                  <div class="row">			
				<div class="col-lg-12">
					<section class="panel panel-default">

						<div class="table-responsive">
							<table id="customers" class="table table-striped m-b-none">
								<thead>
									<tr>
									<th><?=lang('full_name')?></th>
									<th><?=lang('username')?> </th>
									<th><?=lang('role')?> </th>
									<th class="hidden-sm"><?=lang('registered_on')?> </th>
									<th class="hidden-sm"><?=lang('avatar_image')?></th>
									<th><?=lang('options')?></th>
									</tr> </thead> <tbody>
			<?php
			if (!empty($users)) {
			foreach ($users as $key => $user) { ?>
									<tr>
									
									<td><?=$user->fullname?></td>
									<td><?=ucfirst($user->username)?></td>
									
										<td><?php
					if ($this->user_profile->role_by_id($user->role_id) == 'admin') {
						$span_badge = 'label label-danger';
					}elseif ($this->user_profile->role_by_id($user->role_id) == 'collaborator') {
						$span_badge = 'label label-primary';
					}
					else{
						$span_badge = '';
					}
					?><span class="<?=$span_badge?>">
					<?php if(($this->user_profile->role_by_id($user->role_id))=='collaborator')
					{
						echo "Manager";
					}elseif(($this->user_profile->role_by_id($user->role_id))=='admin')
					{
						echo "Admin";

					}?></span></td>
										<td class="hidden-sm"><?=strftime("%b %d, %Y", strtotime($user->created));?> </td>
										<td class="hidden-sm"><a class="pull-left thumb-sm avatar">
									<img src="<?=base_url()?>resource/avatar/<?=$user->avatar?>" class="img-circle"></a>
									</td>
					<td>
					<a href="<?=base_url()?>users/view/update/<?=$user->user_id?>" class="btn btn-default btn-xs" data-toggle="ajaxModal" title="<?=lang('edit')?>"><i class="fa fa-edit"></i> </a>
					<?php
					if ($user->username != $this->tank_auth->get_username()) { ?>
					<a href="<?=base_url()?>users/account/delete/<?=$user->user_id?>" class="btn btn-primary btn-xs" data-toggle="ajaxModal" title="<?=lang('delete')?>"><i class="fa fa-trash-o"></i></a>
					<?php } ?>
					</td>
									</tr>
									<?php } } ?>
									
									
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>

                </section>
              </section>
            </aside>
            <!-- /.aside -->
            <!-- .aside -->
            <aside class="aside-lg bg-white b-l hide" id="aside">
              <section class="vbox">
      <section class="scrollable wrapper">
                <?php
          echo form_open(base_url().'auth/register_user'); ?>
           <?php echo $this->session->flashdata('form_errors'); ?>
           <input type="hidden" name="r_url" value="<?=base_url()?>users/account">
          <div class="form-group">
				<label><?=lang('full_name')?> <span class="text-danger">*</span></label>
					<input type="text" class="input-sm form-control" value="<?=set_value('fullname')?>" placeholder="E.g John Doe" name="fullname" required>
				</div>
                  <div class="form-group">
                    <label><?=lang('username')?> <span class="text-danger">*</span></label>
                    <input type="text" name="username" placeholder="Eg. johndoe" value="<?=set_value('username')?>" class="input-sm form-control">
                  </div>
                  <div class="form-group">
                    <label><?=lang('email')?> <span class="text-danger">*</span></label>
                    <input type="email" placeholder="johndoe@me.com" name="email" value="<?=set_value('email')?>" class="input-sm form-control">
                  </div>
                  <div class="form-group">
                    <label><?=lang('password')?> <span class="text-danger">*</span></label>
                    <input type="password" placeholder="<?=lang('password')?>" value="<?=set_value('password')?>" name="password"  class="input-sm form-control">
                  </div>
                  <div class="form-group">
                    <label><?=lang('confirm_password')?> <span class="text-danger">*</span></label>
                    <input type="password" placeholder="<?=lang('confirm_password')?>" value="<?=set_value('confirm_password')?>" name="confirm_password"  class="input-sm form-control">
                  </div>
			      <div class="form-group">
				<label><?=lang('phone')?> </label>
					<input type="text" class="input-sm form-control" value="<?=set_value('phone')?>" name="phone" placeholder="+52 782 983 434">
				</div>
                  <div class="form-group">
                    <label><?=lang('role')?></label>
                    <div>
                      <select name="role" class="form-control">
                      	<option value="1">Admin</option>
                        <option value="3">Manager</option>
                          </select>
                    </div>
                  </div>
                  <div class="m-t-lg"><button class="btn btn-sm btn-success"><?=lang('register_user')?></button></div>
                </form>
              </section>
              </section>
            </aside>
            <!-- /.aside -->
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html"></a>
        </section>

