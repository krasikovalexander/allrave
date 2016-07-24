
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button> <h4 class="modal-title">Add Room Setup</h4>
		</div>
		
					<?php
			 $attributes = array('class' => 'bs-example form-horizontal');
          echo form_open(base_url().'events/tasks/add_room_setup',$attributes); ?>
          <input type="hidden" name="project" value="<?=$this->uri->segment(4)?>">
		<div class="modal-body">
			<h4>Package Menus</h4>
			
          		<div class="form-group">
					<input type="hidden" name="cid" value="<?php echo $_GET['cid']?>">
				<label class="col-lg-4 control-label">Package <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<div class="m-b"> 				
				<select id="title" name="room_setup_pid" class="form-control">
				<?php if (!empty($modify_packages)) {
					foreach ($modify_packages as $key => $c) { ?>
						<option value="<?=$c->id?>"><?=$c->title." Price at $ ".$c->customer_price?></option>
					<?php } } ?>					
				</select>
				</div>
				</div>
				</div>

				<div class="form-group">
				<label class="col-lg-4 control-label">Number of Guests<span class="text-danger">*</span></label>
				<div class="col-lg-8">
				<input type="text" id="pax" placeholder="Number of Guests" class="form-control" name="pax">
				</div>
				</div>

				<div class="form-group">
				<label class="col-lg-4 control-label">Serving Notes <span class="text-danger">*</span></label>
				<div class="col-lg-8">
				<textarea name="description" class="form-control"></textarea>
				</div>
				</div>
			
		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal"><?=lang('close')?></a> 
		<button type="submit" class="btn btn-primary">Add</button>
		</form>
		</div>
	</div>
	<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
