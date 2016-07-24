<!-- .aside -->
<aside class="bg-<?=$this->config->item('sidebar_theme')?> b-r aside-md hidden-print" id="nav">
  <section class="vbox">
    <header class="header bg-primary lter text-center clearfix">
      <div class="btn-group">
        <button type="button" class="btn btn-sm btn-dark btn-icon" title="<?=lang('quick_links')?>"><i class="fa fa-link"></i></button>
        <div class="btn-group hidden-nav-xs">
          <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown"> <?=lang('quick_links')?>
          <span class="caret">
          </span> </button>
          <ul class="dropdown-menu text-left">
            <li><a href="<?=base_url()?>event_orders/view/add" data-toggle="ajaxModal"><?=lang('new_event_order')?></a></li>
            <li><a href="<?=base_url()?>settings/update/general"><?=lang('settings')?></a></li>
            
          </ul>
        </div>
      </div> </header>
      <section class="w-f scrollable">
        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
          <!-- nav -->
          <nav class="nav-primary hidden-xs">
            <ul class="nav">
              <li class="<?php if($this->uri->uri_string() == 'userrides/user_dashboard'){echo  "active"; }?>">
                <!-- <a href="<?=base_url()?>"> <i class="fa fa-dashboard icon"> <b class="bg-success"></b> </i> -->
                <a href="<?=base_url()?>"> <i class="fa fa-calendar icon"> <b class="bg-success"></b> </i>
              <span>Calendar</span> </a> </li>

              <li class="<?php if($this->uri->uri_string() == 'userrides/viewrides'){echo  "active"; }?>">
                <a href="<?=base_url()?>userrides/viewrides"> <i class="fa fa-car"> <b class="bg-success"></b> </i>
              <span>All rides</span> </a> </li>

              <!-- <li class="">
                <a href="<?=base_url()?>userrides/addride"> <i class="fa fa-dashboard icon"> <b class="bg-success"></b> </i>
              <span>Book New Rides</span> </a> </li> -->

            <li class="<?php if($this->uri->uri_string() == 'profile/settings'){echo  "active"; }?>">
                <a href="<?=base_url()?>profile/settings"> <i class="fa fa-user"> <b class="bg-success"></b> </i>
              <span>Profile</span> </a> 
            </li>


            <?php 
            $front_url = $this->config->item('front_url'); 
            //print_r($front_url);
            ?>
            <li class="">
                <a target="_blank" href="<?php echo $front_url; ?>"> <i class="fa fa-external-link"> <b class="bg-success"></b> </i>
              <span>Visit The Site</span> </a> 
            </li>
<!-- 
              <li class="<?php if($page == 'event_calender'){echo  "active"; }?>"> <a href="<?=base_url()?>events/event_calender" > <i class="fa fa-calendar icon"> <b class="bg-success"></b> </i>
                <span>Calender </span> </a> </li>   
                 <li class="<?php if($page == lang('events')){echo  "active"; }?>"> <a href="<?=base_url()?>events/view_events/all" > <i class="fa fa-th-list icon"> <b class="bg-success"></b> </i>
              <span><?=lang('events')?> </span> </a> </li>
               <li class="<?php if($page == 'Event Order'){echo  "active"; }?>"> <a href="<?=base_url()?>event_orders/view_by_status/all" > <i class="fa fa-list-alt icon"> <b class="bg-success"></b> </i>
                <span>Event Order </span> </a> </li>   
 -->
       
                
              </ul> </nav>
              <!-- / nav -->
            </div>
          </section>
          <?php /*
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
    
    <div class="btn-group hidden-nav-xs"> <button type="button" title="<?=lang('invoices')?>" class="btn btn-icon btn-sm btn-black " data-toggle="dropdown" data-target="#inv"><i class="fa fa-shopping-cart"></i></button>
    <button type="button" title="<?=lang('events')?>" class="btn btn-icon btn-sm btn-black" data-toggle="dropdown" data-target="#pro"><i class="fa fa-coffee"></i></button>
    </div>
  </footer>
  */ ?>

  
</section>
</aside>
<!-- /.aside -->
