<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button> 
		<h4 class="modal-title"><?=lang('delete_place')?></h4>
		</div><?php
			echo form_open(base_url().'places/delete'); ?>
		<div class="modal-body">
			<p><?=lang('delete_place_warning')?></p>
			
			<input type="hidden" name="place_id" value="<?=$place_id?>">
			<input type="hidden" name="r_url" value="<?=base_url()?>places/manage">

		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a>
			<button type="submit" class="btn btn-danger"><?=lang('delete_button')?></button>
		</form>
	</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->