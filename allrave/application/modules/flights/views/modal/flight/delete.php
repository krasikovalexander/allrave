<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button> 
		<h4 class="modal-title"><?=lang('delete_flight')?></h4>
		</div><?php
			echo form_open(base_url().'flights/flights/delete'); ?>
		<div class="modal-body">
			<p><?=lang('delete_flight_warning')?></p>
			
			<input type="hidden" name="flight_id" value="<?=$flight->id?>">
			<input type="hidden" name="r_url" value="<?=base_url()?>flights/flights/manage/<?=$flight->airline_id?>">

		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a>
			<button type="submit" class="btn btn-danger"><?=lang('delete_button')?></button>
		</form>
	</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->