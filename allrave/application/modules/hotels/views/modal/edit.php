<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button> 
		<h4 class="modal-title"><?=lang('edit_hotel')?></h4>
		</div>
		<?php
		$attributes = array('class' => 'bs-example form-horizontal');
        echo form_open_multipart(base_url().'hotels/update',$attributes); 
          
		if (!empty($hotel)) { ?>
		<div class="modal-body">
			<input type="hidden" name="hotel_id" value="<?=$hotel->id?>">
			 
			<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('hotel_name')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$hotel->name?>" name="name"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('hotel_name')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<img src="<?=base_url()?>resource/hotel/<?=$hotel->logo?>" class='img-responsive'/>
					<input type="file" class="form-control" name="logo">
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