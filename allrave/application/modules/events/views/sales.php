<!-- Start -->


<section id="content">
	<section class="hbox stretch">
	
		<aside class="aside-md bg-white b-r" id="subNav">

			<div class="wrapper b-b header">Sales Reports
			</div>
			<section class="vbox">
			 <section class="scrollable w-f">
			   <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
			<ul class="nav">
        <section class="scrollable wrapper w-f">
      <div class="col-sm-12 m-b-xs">
        <div class="row">
          <?php  echo form_open(base_url().'events/search_reports'); ?>
              <div class="form-group">
                <select class="input-sm form-control" name="room_name">
						<option value="">All</option>
						<?php foreach ($rooms as $room){?>
						<option <?php if($_POST['room_name']==$room->room_name) echo "selected='selected'"?> value="<?=$room->room_name?>"><?=$room->room_name?></option>
						<?php } ?>
				</select>	
              </div>
              <div class="form-group">
                <input type="text" class="input-sm datepicker-input form-control" value="<?=$_POST['start_date']?>" name="start_date" placeholder="From Date" required>
              </div>
              <div class="form-group">
                <input type="text" class="input-sm datepicker-input form-control" value="<?=$_POST['end_date']?>" name="end_date" placeholder="To Date" required>
              </div>
              <div class="form-group">
                <span class="input-group-btn"> <button class="btn btn-sm btn-default" type="submit"><?=lang('go')?></button>
                </span>
              </div>
              </form>
            </div> </div>
          </section>
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
						
						</div>
					</div> </header>
					<section class="scrollable wrapper w-f">
							<div class="col-md-12">
								<div class="row">
					<!-- Start Display chart -->
					<?php
				if (!empty($events)) {
			foreach ($events as $key => $p) { 
			$rms=$this->db->where(array('room_name'=>$p->room_name))->get('rooms');
			foreach ($rms->result_array() as $rm){ ?>				
									
			
					
						<div class="col-lg-4">
							<section class="panel panel-default">
                    <header class="panel-heading"> <?=$p->event_title?><div class="pull-right">
				<strong> <?=$p->start_date?></strong>
				</div></header>
                    <div class="panel-body text-center">   
				<a href="<?=base_url()?>events/view/details/<?=$p->event_id?>" data-toggle="tooltip" data-original-title="<?=$p->event_title?>">
				<small class="block small text-muted"> 
				 <span style="background:#<?=$rm['color']?>" class="label bg-primary"><?=$rm['room_name']?></span>
				 
				 </small>
				

				</a> </div>


				<?php
				$evt	=	$this->db->where(array('event_id'=>$p->event_id))->get('invoices');
				foreach ($evt->result_array() as $ev){ 
      $total_receipts = $this->applib->get_sum('payments','amount',$array = array('inv_deleted' => 'No','invoice' => $ev['inv_id']));
  
      $invoice_amount = $this->applib->get_sum('items','total_cost',$array = array('total_cost >' => '0','invoice_id' => $ev['inv_id']));
      $total_sales = $invoice_amount + $p->state_tax + $p->service_charge;
      $outstanding = $total_sales - $total_receipts;
      if ($outstanding < 0) {
       $outstanding = 0;
      }
      if ($total_sales > 0) {
            $perc_paid = ($total_receipts/$total_sales)*100;
            if ($perc_paid > 100) {
              $perc_paid = '100';
            }else{
              $perc_paid = round($perc_paid,1);
            }
            $perc_outstanding = round(100 - $perc_paid,1);
          }else{ $perc_paid = 0; $perc_outstanding = 0;}   }      
          ?>

 				<div class="panel-body text-center">             
                <div class="sparkline inline" data-type="pie" data-height="150" data-slice-colors="['#8EC165','#FFC333']">
                <?=$perc_paid?>,<?=$perc_outstanding?></div>
                      <div class="line pull-in"></div>
                      <div class="text-xs">
                        <i class="fa fa-circle text-warning"></i> Amount Due - <?=$perc_outstanding?>%
                        <i class="fa fa-circle text-success"></i> <?=lang('paid')?> - <?=$perc_paid?>%
                      </div>
                    </div>
                    <div class="panel-footer"><small>Grand Total : <strong>
                     <?=$this->config->item('default_currency')?> <?=number_format($p->grand_total,2,$this->config->item('decimal_separator'),$this->config->item('thousand_separator'))?></strong></small></div>
                     <div class="panel-footer"><small>Amount Due : <strong>
                     <?=$this->config->item('default_currency')?> <?=number_format($outstanding,2,$this->config->item('decimal_separator'),$this->config->item('thousand_separator'))?></strong></small></div>
                     <div class="panel-footer"><small>Amount Paid : <strong>
                     <?=$this->config->item('default_currency')?> <?=number_format($total_sales,2,$this->config->item('decimal_separator'),$this->config->item('thousand_separator'))?></strong></small></div>
			</section></div>
				<?php } } }?>
					 <?php  echo modules::run('sidebar/flash_msg');?>


					 <!-- End display chart -->



					 </div>
					 </div>

					</section>  




		</section> </aside> </section> <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>



<!-- end -->
