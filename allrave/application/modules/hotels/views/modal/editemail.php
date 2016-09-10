<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button> 
		<h4 class="modal-title"><?=lang('edit_hotel_email')?></h4>
		</div>
		<?php
		$attributes = array('class' => 'bs-example form-horizontal');
        echo form_open_multipart(base_url().'hotels/updateemail',$attributes); 
          
		if (!empty($email)) { ?>
		<div class="modal-body">
			<input type="hidden" name="hotel_id" value="<?=$email->hotel_id?>">
			<input type="hidden" name="email_id" value="<?=$email->id?>">
			 
			<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('email')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$email->email?>" name="email" required/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('state')?> <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<select class="input-sm form-control" name="state" required>
                        <option value='iowa' <?= $email->state == 'iowa' ? 'selected' : '' ?>>Iowa Quad Cities</option>
                        <option value='illinois' <?= $email->state ==  'illinois' ? 'selected' : '' ?>>Illinois Quad Cities</option>
                        <!--<option value='all' <?= $email->state ==  'all' ? 'selected' : '' ?>>All Quad Cities</option>-->
                    </select>
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