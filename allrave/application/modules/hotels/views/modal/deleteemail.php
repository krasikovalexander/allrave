<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button> 
		<h4 class="modal-title"><?=lang('delete_email')?></h4>
		</div><?php
			echo form_open(base_url().'hotels/deleteemail'); ?>
		<div class="modal-body">
			<p><?=lang('delete_hotel_email_warning')?></p>
			
			<input type="hidden" name="email_id" value="<?=$email->id?>">
			<input type="hidden" name="r_url" value="<?=base_url()?>hotels/emails/<?=$email->hotel_id?>">

		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a>
			<button type="submit" class="btn btn-danger"><?=lang('delete_button')?></button>
		</form>
	</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->