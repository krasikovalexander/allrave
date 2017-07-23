<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button> 
		<h4 class="modal-title"><?=lang('edit_flight')?></h4>
		</div>
		<?php
		$attributes = array('class' => 'bs-example form-horizontal');
        echo form_open_multipart(base_url().'flights/flights/update',$attributes); 
          
		if (!empty($flight)) { ?>
		<div class="modal-body">
			<input type="hidden" name="airline_id" value="<?=$flight->airline_id?>">
			<input type="hidden" name="flight_id" value="<?=$flight->id?>">
			 
			<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('flight_path')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$flight->path?>" name="path" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('flight_active')?></label>
				<div class="col-lg-8">
					<input type="checkbox" class="form-control" value="1" name="active" <?=$flight->active?'checked':'' ?>/>
				</div>
			</div>
		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a> 
		<button type="submit" class="btn btn-primary"><?=lang('save_changes')?></button></div>
		</form>
		<?php } ?>
	</div>
	<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->