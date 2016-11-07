<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button> 
		<h4 class="modal-title"><?=lang('edit_place')?></h4>
		</div>
		<?php
		$attributes = array('class' => 'bs-example form-horizontal');
        echo form_open_multipart(base_url().'places/update', $attributes); 
          
		if (!empty($place)) { ?>
		<div class="modal-body">
			<input type="hidden" name="place_id" value="<?=$place->id?>">
			 
			<div class="form-group">
                <label class="col-lg-4 control-label"><?=lang('place_name')?> <span class="text-danger">*</span></label>
                <input type="text" class="input-sm form-control" value="<?=$place->name?>" name="name">
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label"><?=lang('place_address')?> <span class="text-danger">*</span></label>
                <input type="text" class="input-sm form-control" value="<?=$place->address?>" name="address">
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label"><?=lang('place_city')?> <span class="text-danger">*</span></label>
                <input type="text" class="input-sm form-control" value="<?=$place->city?>" name="city">
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label"><?=lang('place_state')?> <span class="text-danger">*</span></label>
                <select class="input-sm form-control" name="state">
                    <option value='0'>State</option>
                    <option value='IA' <?=($place->state == 'IA' ? 'selected': '')?>>IA</option>
                    <option value='IL' <?=($place->state == 'IL' ? 'selected': '')?>>IL</option>
                    <option value='MI' <?=($place->state == 'MI' ? 'selected': '')?>>MI</option>
                    <option value='MN' <?=($place->state == 'MN' ? 'selected': '')?>>MN</option>
                    <option value='MO' <?=($place->state == 'MO' ? 'selected': '')?>>MO</option>
                    <option value='NE' <?=($place->state == 'NE' ? 'selected': '')?>>NE</option>
                    <option value='WI' <?=($place->state == 'WI' ? 'selected': '')?>>WI</option>
                </select>
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label"><?=lang('place_zip')?> <span class="text-danger">*</span></label>
                <input type="text" class="input-sm form-control" value="<?=$place->zip?>" name="zip">
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