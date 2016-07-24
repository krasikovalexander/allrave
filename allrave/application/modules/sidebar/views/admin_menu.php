<!-- .aside -->
<aside class="bg-<?=$this->config->item('sidebar_theme')?> b-r aside-md hidden-print" id="nav">
  <section class="vbox">
      <section class="w-f scrollable">
        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
          <!-- nav -->
          <nav class="nav-primary hidden-xs">
            <ul class="nav">
				<li class="<?php if($page == lang('event_calender')){echo  "active"; }?>"> <a href="<?=base_url()?>events/event_calender" > <i class="fa fa-calendar icon"> <b class="bg-success"></b> </i>
                <span>Calendar </span> </a> </li>
                <li class="<?php if($page == lang('requests')){ echo 'active';} ?>">
                    <a href="<?=base_url()?>requests/view_requests"> <i class="fa fa-dashboard icon"> <b class="bg-success"></b> </i>
                        <span>Requests</span> </a>
                </li>

              <li class="<?php if($page == lang('vehicles')){ echo 'active';} ?>">
                <a href="<?=base_url()?>vehicles/view_vehicles"> <i class="fa fa-dashboard icon"> <b class="bg-success"></b> </i>
                  <span>Vehicles</span> </a>
              </li>

              <li class="<?php if($page == lang('subscription')){echo  "active"; }?>"> <a href="<?=base_url()?>subscription" > <i class="fa fa-dropbox icon"> <b class="bg-success"></b> </i>
                  <span>Send Email </span> </a> </li>
              <li class="<?php if($page == lang('padding')){echo  "active"; }?>"> <a href="<?=base_url()?>padding" > <i class="fa fa-dropbox icon"> <b class="bg-success"></b> </i>
                  <span>Set Padding </span> </a> </li>

              <li class="<?php if($page == lang('general_settings') OR $page == lang('admin') OR $page == lang('system_settings') OR $page == lang('email_settings')){echo  "active"; }?>">
                <a href="#" >
                <i class="fa fa-cogs icon"> <b class="bg-success"></b> </i>
                <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i>
                </span>
                <span><?=lang('settings')?> </span> </a>
                <ul class="nav lt">
                  <li class="<?php if($page == lang('system_settings')){echo "active"; } ?>"> <a href="<?=base_url()?>settings/update/system" > <i class="fa fa-angle-right"></i>
                  <span><?=lang('system_settings')?> </span> </a> </li>
                </ul> </li>
                <li class="<?php if($page == lang('users')){echo  "active"; }?>"> <a href="<?=base_url()?>users/account" > <i class="fa fa-lock icon"> <b class="bg-success"></b> </i>
                <span><?=lang('system_users')?> </span> </a> </li>

              </ul> </nav>
            </div>
          </section>
          <footer class="footer lt hidden-xs b-t b-light">
            <div id="inv" class="dropup"> <section class="dropdown-menu on aside-md m-l-n"> <section class="panel bg-white">
            <header class="panel-heading b-b b-light"><?=lang('invoice_shortcuts')?></header>
            <div class="panel-body animated fadeInRight">
              <p class="text-sm"><?=lang('create_invoice')?></p>
              <p><a href="<?=base_url()?>invoices/manage/add" class="btn btn-sm btn-primary"><?=lang('new_invoice')?></a></p>
            </div> </section> </section>
          </div>
          <div id="pro" class="dropup"> <section class="dropdown-menu on aside-md m-l-n"> <section class="panel bg-white">
          <header class="panel-heading b-b b-light"> <?=lang('project_shortcuts')?> </header>
          <div class="panel-body animated fadeInRight">
            <p class="text-sm"><?=lang('create_project')?></p>
            <p><a href="<?=base_url()?>events/view/add" class="btn btn-sm btn-primary"><?=lang('create_project')?></a></p>
          </div>
        </section>
      </section>
    </div>
  </footer>

  
</section>
</aside>
<!-- /.aside -->
