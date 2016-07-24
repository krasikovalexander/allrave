<!-- Start -->
<script language="javascript" src="<?=base_url()?>resource/js/jquery-2.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>resource/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>resource/css/colorbox.css"/>

<section id="content">
	<section class="hbox stretch">
	
		<aside class="aside-md bg-white b-r" id="subNav">
	<!-- Start Form -->
	<div class="col-lg-12">	

<div id="evencal">
		<div class="calendar">
			<?php echo $current_cal.$next_cal.$next2_cal; ?>
			
		</div>
		<!--<div class="event_detail">
			<h2 class="s_date">Detail Event <?php echo "$day $month $year";?></h2>
			<div class="detail_event">
				<?php 
					if(isset($events)){
						$i = 1;
						foreach($events as $e){
						 if($i % 2 == 0){
								echo '<div class="info1"><h4>'.$e['time'].'<img src="'.base_url().'resource/css/images/delete.png" class="delete" alt="" title="delete this event" day="'.$day.'" val="'.$e['id'].'" /></h4><p>'.$e['event'].'</p></div>';
							}else{
								echo '<div class="info2"><h4>'.$e['time'].'<img src="'.base_url().'resource/css/images/delete.png" class="delete" alt="" title="delete this event" day="'.$day.'" val="'.$e['id'].'" /></h4><p>'.$e['event'].'</p></div>';
							} 
							$i++;
						}
					}else{
						echo '<div class="message"><h4>No Event</h4><p>There\'s no event in this date</p></div>';
					}
				?>
				<input type="button" name="add" value="Add Event" val="<?php echo $day;?>" class="add_event"/>
			</div>
		</div>-->
	</div>
	<script type="text/javascript">
		var jQuery=jQuery.noConflict();
		
		jQuery(".detail").on('click',function(){
			jQuery(".s_date").html("Detail Event for "+jQuery(this).attr('val')+" <?php echo "$month $year";?>");
			var day = jQuery(this).attr('val');
			var add = '<input type="button" name="add" value="Add Event" val="'+day+'" class="add_event"/>';
			jQuery.ajax({
				type: 'post',
				dataType: 'json',
				url: "<?php echo site_url("events/detail");?>",
				data:{<?php echo "year: $year, mon: $mon";?>, day: day},
				success: function( data ) {
					var html = '';
					if(data.status){
						var i = 1;
						jQuery.each(data.data, function(event_calender, value) {
						    if(i % 2 == 0){
								html = html+'<div class="info1"><h4>'+value.time+'<img src="<?php echo base_url();?>resource/css/images/delete.png" class="delete" alt="" title="delete this event" day="'+day+'" val="'+value.id+'" /></h4><p>'+value.event+'</p></div>';
							}else{
								html = html+'<div class="info2"><h4>'+value.time+'<img src="<?php echo base_url();?>resource/css/images/delete.png" class="delete" alt="" title="delete this event" day="'+day+'" val="'+value.id+'" /></h4><p>'+value.event+'</p></div>';
							} 
							i++;
						});
					}else{
						html = '<div class="message"><h4>'+data.title_msg+'</h4><p>'+data.msg+'</p></div>';
					}
					html = html+add;
					jQuery( ".detail_event" ).fadeOut("slow").fadeIn("slow").html(html);
				} 
			});
		});
		jQuery(".delete").on("click", function() {
			if(confirm('Are you sure delete this event ?')){
				var deleted = jQuery(this).parent().parent();
				var day =  jQuery(this).attr('day');
				var add = '<input type="button" name="add" value="Add Event" val="'+day+'" class="add_event"/>';
				jQuery.ajax({
					type: 'POST',
					dataType: 'json',
					url: "<?php echo site_url("event_calender/delete_event");?>",
					data:{<?php echo "year: $year, mon: $mon";?>, day: day,del: jQuery(this).attr('val')},
					success: function(data) {
						if(data.status){
							if(data.row > 0){
								jQuery('.d'+day).html(data.row);
							}else{
								jQuery('.d'+day).html('');
								jQuery( ".detail_event" ).fadeOut("slow").fadeIn("slow").html('<div class="message"><h4>'+data.title_msg+'</h4><p>'+data.msg+'</p></div>'+add);
							}
							deleted.remove();
						}else{
							alert('an error for deleting event');
						}
					}
				});
			}
		});
		jQuery(".add_event").on('click', function(){
			jQuery.colorbox({ 
					overlayClose: false,
					href: '<?php echo site_url('event_calender/add_event');?>',
					data:{year:<?php echo $year;?>,mon:<?php echo $mon;?>, day: jQuery(this).attr('val')}
			});
		});
</script></div>			
				
			
			</aside>
			<aside>
			<section class="vbox">
				<header class="header bg-white b-b clearfix">
					<div class="row m-t-sm">
						<div class="col-sm-8 m-b-xs">
							
						<div class="btn-group">
						
						</div>
						<a class="btn btn-sm btn-dark" href="<?=base_url?>events/view/add" title="" data-original-title="New Event" data-toggle="tooltip" data-placement="bottom">
						<i class="fa fa-plus"></i> New Event</a>
						</div>
						<div class="col-sm-4 m-b-xs">
						<form action="<?=base_url?>events/search" method="post" accept-charset="utf-8">
						<div style="display:none">
							<input name="csrf_fo_name" value="651953c156bb195f7e8a021e10bf2fb1" type="hidden">
						</div>
						<div class="input-group">
								<input class="input-sm form-control" name="keyword" placeholder="Search Event" type="text">
								<span class="input-group-btn"> <button class="btn btn-sm btn-default" type="submit">Go!</button>
								</span>
							</div>
							</form>
						</div>
					</div> </header>
					<section class="scrollable wrapper w-f">
					<div class="calendar_big">
			<?php echo $current_cal?>
			
		</div>

					</section>  




		</section> </aside>
			</section>
			
		



<!-- end -->
