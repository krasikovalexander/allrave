<?php if ($page == lang('events') OR $page == lang('add_invoice') OR $page == 'search_reports' OR $this->uri->segment(3) == 'edit' OR $this->uri->segment(3) == 'add') { ?>
<script src="<?=base_url()?>resource/js/slider/bootstrap-slider.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/datepicker/bootstrap-datepicker.js" cache="false"></script>
<?php } ?>
<?php
// if ($this->uri->segment(2) == 'update' OR $this->uri->segment(1) == 'messages' OR $this->uri->segment(3) == 'add' OR $this->uri->segment(3) == 'edit' OR $this->uri->segment(3) == 'send' OR $this->uri->segment(2) == 'settings') { ?>
<?php if (isset($form)) { ?>
<script src="<?=base_url()?>resource/js/select2/select2.min.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/file-input/bootstrap-filestyle.min.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/wysiwyg/jquery.hotkeys.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/wysiwyg/bootstrap-wysiwyg.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/wysiwyg/demo.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/parsley/parsley.min.js" cache="false"></script>
<script src="<?=base_url()?>resource/js/parsley/parsley.extend.js" cache="false"></script>
<?php } ?>
<?php if ($this->uri->segment(2) == 'help') { ?>
 <!-- App --> 
<script src="<?=base_url()?>resource/js/intro/intro.min.js" cache="false"> </script>
<script src="<?=base_url()?>resource/js/intro/demo.js" cache="false"> </script>
<?php }  ?>

<?php
if (isset($datatables)) { ?>
<script src="<?=base_url()?>resource/js/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript">
		$(function() {
	var oTable1 = $('#customers').dataTable({
		"bProcessing": true,
      "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
      "sPaginationType": "full_numbers"
	});
	var oTable1 = $('#tbl-contacts').dataTable({
		"bProcessing": true,
      "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
      "sPaginationType": "full_numbers"
	});
	var oTable1 = $('#tbl-invoices').dataTable({
		"bProcessing": true,
      "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
      "sPaginationType": "full_numbers"
	});
	var oTable1 = $('#tbl-events').dataTable({
		"bProcessing": true,
      "sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
      "sPaginationType": "full_numbers"
	});
	$('[data-rel=tooltip]').tooltip();
})

		</script>
<?php }  ?>

<?php if ($this->uri->segment(2) == 'view' AND $this->uri->segment(3) == 'add' OR $this->uri->segment(3) == 'edit') { ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#fixed_rate").click(function(){
			//if checked
			if($("#fixed_rate").is(":checked")){
				$("#fixed_price").show("fast");
				$("#hourly_rate").hide("fast");
				}else{
					$("#fixed_price").hide("fast");
					$("#hourly_rate").show("fast");
				}
		});
	});
</script>
<?php } ?>
<?php if(isset($chart)){ ?>
<!-- App -->
<script src="<?=base_url()?>resource/js/charts/Chart.js"></script>
<?php $this->load->language('calendar');?>
<script>
		var lineChartData = {
			labels : ['<?=lang('cal_jan')?>','<?=lang('cal_feb')?>','<?=lang('cal_mar')?>','<?=lang('cal_apr')?>','<?=lang('cal_may')?>','<?=lang('cal_jun')?>','<?=lang('cal_jul')?>','<?=lang('cal_aug')?>','<?=lang('cal_sep')?>','<?=lang('cal_oct')?>','<?=lang('cal_nov')?>','<?=lang('cal_dec')?>'],
			datasets: [
        {
            label: '<?=lang('yearly_overview')?>',
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "#4acab4",
            pointColor: "#4acab4",
            pointStrokeColor: "#4acab4",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            scaleGridLineColor : "#4acab4",
            data: [<?=$this->AppModel->monthly_data('01')?>, <?=$this->AppModel->monthly_data('02')?>, <?=$this->AppModel->monthly_data('03')?>, <?=$this->AppModel->monthly_data('04')?>, <?=$this->AppModel->monthly_data('05')?>, <?=$this->AppModel->monthly_data('06')?>, <?=$this->AppModel->monthly_data('07')?>, <?=$this->AppModel->monthly_data('08')?>, <?=$this->AppModel->monthly_data('09')?>, <?=$this->AppModel->monthly_data('10')?>, <?=$this->AppModel->monthly_data('11')?>, <?=$this->AppModel->monthly_data('12')?>]
        }
			]

		}

	window.onload = function(){
		var ctx = document.getElementById("invoice_revenue").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true
		});
	}


	</script>
<?php }  ?>
 <?php
if($this->session->flashdata('message')){ 
$message = $this->session->flashdata('message');
$alert = $this->session->flashdata('response_status');
	?>
<script type="text/javascript">
	$(document).ready(function(){
toastr.<?=$alert?>("<?=$message?>", "Response Status");
toastr.options = {
  "closeButton": true,
  "debug": false,
  "positionClass": "toast-bottom-right",
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
});
</script>
<?php } ?>

<?php if($page == lang('requests')){?>
<script type="text/javascript" src="<?php echo base_url().'resource/js/requests.js'; ?>" ></script>
<?php }?>

<?php if($page == lang('vehicles')){?>
	<link href="<?= base_url() ?>resource/css/jquery.fancybox.css" type="text/css" rel="stylesheet" media="all">
	<script type="text/javascript" src="<?php echo base_url().'resource/js/vehicles.js'; ?>" ></script>
	<script type="text/javascript" src="<?php echo base_url().'resource/js/jquery.fancybox.js'; ?>" ></script>
<?php }?>

<?php if($page == lang('events')){?>
	<?php if($count_vehicles < 2){?>
	<script src="<?=base_url()?>resource/js/event_time.js"></script>
		<?php }else{ ?>
		<script src="<?=base_url()?>resource/js/event_time_multi_vehicles.js"></script>
	<?php } ?>
<?php }?>

<?php if($page == lang('subscription')){?>
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	<script>tinymce.init({selector:'textarea'});</script>
	<script>
		$(document).ready(function () {
			$(document).on('click', "#send_email", function(e){
				if($("#subject").val() == "") {
					var answer = confirm('Do you want to send email with no subject ?');
					if (!answer) {
						e.preventDefault();
					}
				}
			});
		})
	</script>
<?php }?>

<!--avi30-->
<?php if($page == lang('padding')){?>
	<link href="<?= base_url() ?>resource/css/jquery.simple-dtpicker.css" type="text/css" rel="stylesheet" media="all">
	<link href="<?= base_url() ?>resource/css/jquery.timepicker.css" type="text/css" rel="stylesheet" media="all">
<script type="text/javascript" src="<?= base_url() ?>resource/js/jquery.simple-dtpicker.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>resource/js/jquery.timepicker.js"></script>
	<script type="text/javascript" src="<?= base_url() ?>resource/js/padding.js"></script>
<?php }?>