<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button> 
		<h4 class="modal-title"><?=lang('delete_project')?></h4>
		</div><?php
			echo form_open(base_url().'events/view/delete_scheduling'); ?>
		<div class="modal-body">
			<p><?=lang('delete_project_warning')?></p>
			
			<input type="hidden" name="id" value="<?=$id?>">
			<input type="hidden" name="event_id" value="<?=$_GET['event_id']?>">
		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a>
			<button type="submit" class="btn btn-danger"><?=lang('delete_button')?></button>
		</form>
	</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
