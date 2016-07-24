<script language="javascript">
  function PrintDiv() {   
           var divToPrint = document.getElementById('divToPrint');
           var popupWin = window.open('', '_blank', '<span class="IL_AD" id="IL_AD11">width</span>=766,height=300');
           popupWin.document.open();
           popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
                }
</script>
	<section id="content">
		<section class="hbox stretch">	
			<aside class="aside-md bg-white b-r" id="subNav">
			<div class="wrapper b-b header">Scheduling</div>
			<section class="vbox">
			 <section class="scrollable w-f">
			   <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
			<ul class="nav">
			
				<li class="b-b b-light bg-light dk">
				<?php $estimates=$this->db->where(array('event_id'=>$event_id))->get('estimates');
				foreach($estimates->result_array() as $est){ ?>
				<a href="<?=base_url('estimates/manage/details/'.$est['est_id'])?>">View Estimate</a>
				</li>
				<li class="b-b b-light bg-light dk">
				<a href="<?=base_url('fopdf/view_contract/'.$est['est_id'])?>">View Contract</a>
				 <?php } ?>
				</li>
				<li class="b-b b-light bg-light dk">
				<a href="<?=base_url('events/files/index/'.$event_id)?>">File Management</a>
				</li>
				
				<?php $invoices=$this->db->where(array('event_id'=>$event_id))->get('invoices');
				foreach($invoices->result_array() as $inv){ ?>
				
				<li class="b-b b-light bg-light dk">
				<a href="<?=base_url('invoices/manage/details/'.$inv['inv_id'])?>">Add Payment</a> <?php } ?>
				</li>
				<li class="b-b b-light bg-light dk">
				<a href="<?=base_url('events/scheduling/'.$event_id)?>">Scheduling</a>
				</li>
			</ul> 
			</div></section>
			</section>
			</aside> 
			
			<aside>
			<section class="vbox">
		
				<header class="header bg-white b-b b-light">

         <a href="#" class="btn btn-sm btn-default" onClick="PrintDiv();"><i class="fa fa-print"></i></a>
        </header>
					<section id="divToPrint" class="scrollable wrapper w-f">
					<!-- Start create project -->
<div class="col-sm-12">
	<section class="panel panel-default">
	<header class="panel-heading font-bold"><i class="fa fa-info-circle"></i>Schedulig Details</header>
	<div class="panel-body">
         <div class="table-responsive"> 
			  
          <table class="table table-striped m-b-none">
			  <thead>
			 <tr>
				<th>Employee Category</th>
				<th>Names</th>
				<th>Action</th>
			  </tr> </thead> <tbody>
                      <?php
                      if (!empty($schedulings)) {
                      foreach ($schedulings as $scheduling) { ?>
                      <tr>                       
                       <td><?=$scheduling->emp_cat?> <span class="badge bg-success" title="Employee Category"></span></td>  
                       <td><?=$scheduling->name?> <span class="badge bg-success" title="Name"></span></td>                
                      
                      <td>
                        <a href="<?=base_url()?>events/view/scheduling_details/<?=$scheduling->id?>" class="btn btn-default btn-xs" title="<?=lang('details')?>"><i class="fa fa-home"></i> </a>
                        <a href="<?=base_url()?>events/view/delete_scheduling/<?=$scheduling->id?>" class="btn btn-default btn-xs" data-toggle="ajaxModal" title="<?=lang('delete')?>"><i class="fa fa-trash-o"></i></a>
                      </td>
                    </tr>
                    <?php } } ?>
                    <?php
      echo form_open(base_url().'events/scheduling_create'); ?>
      <?php echo validation_errors(); ?>
         
      <input type="hidden" name="event_id" value="<?=$event_id?>">
                 <tr>
                 <td> <select class="form-control" name="emp_cat">
        <?php foreach ($scheduling_cat as $sch_cat) {?>
			<option value="<?=$sch_cat->scheduling?>"><?=$sch_cat->scheduling?></option>			
			<?php } ?> </select>
			</td>
			<td> <input type="text" name="name" placeholder="name" value="<?=set_value('name')?>" class="input-sm form-control"></td>
			<td> <button type="submit" class="btn btn-sm btn-success">Add Scheduling</button></td>
                 </tr>   
              </form>      
                  </tbody>
			
	</table>

	</div>
</div>
</section>

</div>


<!-- End create project -->






					</section>  




		</section> </aside>
		 
		
		 </section> <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>

<!-- end -->
