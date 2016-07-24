<section id="content"> <section class="vbox"> <section class="scrollable padder">
	<!-- <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
		<li><a href="<?=base_url()?>"><i class="fa fa-home"></i> <?=lang('home')?></a></li>
		<li><a href="<?=base_url()?>settings/general"><?=lang('settings')?></a></li>
		<li class="active"><?=lang('general_settings')?></li>
	</ul> -->
	<?php  echo modules::run('sidebar/flash_msg');?>
	 <div class="row">
	<!-- Start Form -->
	<div class="col-lg-6">

	<section class="panel panel-default">
	<header class="panel-heading font-bold"><i class="fa fa-cogs"></i> <?=lang('general_settings')?></header>
	<div class="panel-body">
	  <?php
$attributes = array('class' => 'bs-example form-horizontal');
echo form_open(uri_string(), $attributes); ?>
<input type="hidden" name="r_url" value="<?=uri_string()?>">
			<div class="form-group">
				<label class="col-lg-4 control-label">Display Name<span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<input type="text" name="customer_name" class="form-control" value="<?=$this->config->item('customer_name')?>" required>
				</div>
			</div>
			<!--<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('contact_person')?> </label>
				<div class="col-lg-8">
					<input type="text" class="form-control"  value="<?=$this->config->item('contact_person')?>" name="contact_person">
					<span class="help-block m-b-none"><?=lang('customer_representative')?></strong>.</span>
				</div>
			</div>-->
			<div class="form-group">
				<label class="col-lg-4 control-label">Address <span class="text-danger">*</span></label>
				<div class="col-lg-8">
					<textarea class="form-control" name="customer_address" required><?=$this->config->item('customer_address')?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-4 control-label">Phone</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$this->config->item('customer_phone')?>" name="customer_phone">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-4 control-label">Domain</label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$this->config->item('company')?>" name="company">
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('city')?></label>
				<div class="col-lg-8">
					<input type="text" class="form-control" value="<?=$this->config->item('customer_city')?>" name="customer_city">
				</div>
			</div>


			<div class="form-group">
				<div class="col-lg-offset-4 col-lg-8">
				<button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i> <?=lang('save_changes')?></button>
				</div>
			</div>
		</form>

		<h4 class="page-header"><?=lang('customer_logo')?></h4>
        <?php
        echo form_open_multipart(base_url().'settings/upload_logo'); ?>

			<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('customer_logo')?></label>
				<div class="col-lg-8">
					<input type="file" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline input-s" name="userfile">
				</div>
			</div>

        <button type="submit" class="btn btn-sm btn-dark"><?=lang('change_logo')?></button>
      </form>


	</div> </section>
</div>
<!-- End Form -->


<div class="col-lg-6">

        <!-- Account Form -->
        <section class="panel panel-default">
      <header class="panel-heading font-bold"><?=lang('payment_settings')?></header>
      <div class="panel-body">

       <?php
$attributes = array('class' => 'bs-example form-horizontal');
echo form_open(base_url().'settings/update_payment_settings', $attributes); ?>
        <input type="hidden" name="r_url" value="<?=uri_string()?>">
        <div class="form-group">
			<label class="col-lg-4 control-label"><?=lang('default_tax')?> </label>
			<div class="col-lg-8">
				<div class="input-group m-b">
					<span class="input-group-addon">%</span>
					<input class="form-control " type="text" value="<?=$this->config->item('default_tax')?>" name="default_tax">
				</div>
			</div>
		</div>

		 <div class="form-group">
			<label class="col-lg-4 control-label">Service Charge </label>
			<div class="col-lg-8">
				<div class="input-group m-b">
					<span class="input-group-addon">%</span>
					<input class="form-control " type="text" value="<?=$this->config->item('service_charge')?>" name="service_charge">
				</div>
			</div>
		</div>

        <div class="form-group">
			<label class="col-lg-4 control-label"><?=lang('default_currency')?> <span class="text-danger">*</span></label>
			<div class="col-lg-4">
				<input type="text" class="form-control"  value="<?=$this->config->item('default_currency')?>" name="default_currency" required>
			</div>
		</div>

         <div class="form-group">
			<label class="col-lg-4 control-label"><?=lang('default_currency_symbol')?> <span class="text-danger">*</span></label>
			<div class="col-lg-4">
				<input type="text" class="form-control"  value="<?=$this->config->item('default_currency_symbol')?>" name="default_currency_symbol" required>
			</div>
		</div>

		<div class="form-group">
			<label class="col-lg-4 control-label"><?=lang('thousand_separator')?> <span class="text-danger">*</span></label>
			<div class="col-lg-4">
				<input type="text" class="form-control"  value="<?=$this->config->item('thousand_separator')?>" name="thousand_separator" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-4 control-label"><?=lang('decimal_separator')?> <span class="text-danger">*</span></label>
			<div class="col-lg-4">
				<input type="text" class="form-control"  value="<?=$this->config->item('decimal_separator')?>" name="decimal_separator" required>
			</div>
		</div>

		<!--<div class="form-group">
			<label class="col-lg-4 control-label"><?=lang('paypal_live')?></label>
			<div class="col-lg-4">
				<select name="paypal_live" class="form-control">
					<option value="<?=$this->config->item('paypal_live')?>"><?=lang('use_current')?></option>
					<option value="FALSE"><?=lang('false')?></option>
					<option value="TRUE"><?=lang('true')?></option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-lg-4 control-label"><?=lang('paypal_email')?> <span class="text-danger">*</span> </label>
			<div class="col-lg-8">
				<input type="email" class="form-control" value="<?=$this->config->item('paypal_email')?>" name="paypal_email" data-type="email" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-4 control-label"><?=lang('paypal_cancel_url')?> <span class="text-danger">*</span> </label>
			<div class="col-lg-8">
				<input type="text" class="form-control" data-original-title="Default is OK" data-toggle="tooltip" data-placement="top" title="" value="<?=$this->config->item('paypal_cancel_url')?>" name="paypal_cancel_url"  required>

			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-4 control-label"><?=lang('paypal_ipn_url')?> <span class="text-danger">*</span> </label>
			<div class="col-lg-8">
				<input type="text" class="form-control" data-original-title="Default is OK" data-toggle="tooltip" data-placement="top" title="" value="<?=$this->config->item('paypal_ipn_url')?>" name="paypal_ipn_url" data-type="text" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-lg-4 control-label"><?=lang('paypal_success_url')?> <span class="text-danger">*</span> </label>
			<div class="col-lg-8">
				<input type="text" class="form-control" data-original-title="Default is OK" data-toggle="tooltip" data-placement="top" title="" value="<?=$this->config->item('paypal_success_url')?>" name="paypal_success_url" data-type="text" required>

			</div>
		</div>-->
        <div class="form-group">
				<div class="col-lg-offset-4 col-lg-8">
        <button type="submit" class="btn btn-sm btn-success"><?=lang('save_changes')?></button>
      </div></div>
	  </form>

      <h4 class="page-header"><?=lang('invoice_logo')?></h4>
        <?php
        echo form_open_multipart(base_url().'settings/invoice_logo'); ?>

			<div class="form-group">
				<label class="col-lg-4 control-label"><?=lang('invoice_logo')?></label>
				<div class="col-lg-8">
					<input type="file" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline input-s" name="userfile">
				</div>
			</div>

        <button type="submit" class="btn btn-sm btn-dark"><?=lang('upload_logo')?></button>
      </form>





    </div>
  </section>
  <!-- /Account form -->

    </div>


</div>

</section>
</section>
<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
</section>
