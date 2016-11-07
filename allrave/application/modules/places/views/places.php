<section id="content">
    <section class="hbox stretch">
        <!-- .aside -->
        <aside>
            <section class="vbox">
                <header class="header bg-white b-b b-light">
                    <a href="#aside" data-toggle="class:show" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> <?=lang('new_place')?></a>
                    <p><?=lang('places')?></p>
                </header>
                <section class="scrollable wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel panel-default">
                                <div class="table-responsive">
                                    <table id="customers" class="table table-striped m-b-none">
                                        <thead>
                                            <tr>
                                                <th><?=lang('place_name')?></th>
                                                <th><?=lang('place_address')?> </th>
                                                <th><?=lang('options')?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if (!empty($places)) {
                                                foreach ($places as $key => $place) { ?>
                                            <tr>
                                                <td><?=$place->name?></td>
                                                <td><?=$place->address?>, <?=$place->city?>, <?=$place->state?>, <?=$place->zip?></td>
                                                <td>
                                                    <a href="<?=base_url()?>places/update/<?=$place->id?>" class="btn btn-default btn-xs" data-toggle="ajaxModal" title="<?=lang('edit')?>"><i class="fa fa-edit"></i> </a>
                                                    
                                                    <a href="<?=base_url()?>places/delete/<?=$place->id?>" class="btn btn-primary btn-xs" data-toggle="ajaxModal" title="<?=lang('delete')?>"><i class="fa fa-trash-o"></i></a>
                                                    
                                                </td>
                                            </tr>
                                            <?php } } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
            </section>
        </aside>
        <!-- /.aside -->
        <!-- .aside -->
        <aside class="aside-lg bg-white b-l hide" id="aside">
            <section class="vbox">
                <section class="scrollable wrapper">
                    <?php
                        echo form_open_multipart(base_url().'places/create'); 
                        echo $this->session->flashdata('form_errors'); 
                    ?>
                    <input type="hidden" name="r_url" value="<?=base_url()?>places/manage">
                    <div class="form-group">
                        <label><?=lang('place_name')?> <span class="text-danger">*</span></label>
                        <input type="text" class="input-sm form-control" value="<?=set_value('name')?>" placeholder="Title" name="name" required>
                    </div>

                    <div class="form-group">
                        <label><?=lang('place_address')?> <span class="text-danger">*</span></label>
                        <input type="text" class="input-sm form-control" value="<?=set_value('address')?>" placeholder="Address" name="address" required>
                    </div>

                    <div class="form-group">
                        <label><?=lang('place_city')?> <span class="text-danger">*</span></label>
                        <input type="text" class="input-sm form-control" value="<?=set_value('city')?>" placeholder="City" name="city" required>
                    </div>

                    <div class="form-group">
                        <label><?=lang('place_state')?> <span class="text-danger">*</span></label>
                        <select class="input-sm form-control" name="state" required>
                            <option value='0'>State</option>
                            <option value='IA' <?=(set_value('state') == 'IA' ? 'selected': '')?>>IA</option>
                            <option value='IL' <?=(set_value('state') == 'IL' ? 'selected': '')?>>IL</option>
                            <option value='MI' <?=(set_value('state') == 'MI' ? 'selected': '')?>>MI</option>
                            <option value='MN' <?=(set_value('state') == 'MN' ? 'selected': '')?>>MN</option>
                            <option value='MO' <?=(set_value('state') == 'MO' ? 'selected': '')?>>MO</option>
                            <option value='NE' <?=(set_value('state') == 'NE' ? 'selected': '')?>>NE</option>
                            <option value='WI' <?=(set_value('state') == 'WI' ? 'selected': '')?>>WI</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label><?=lang('place_zip')?> <span class="text-danger">*</span></label>
                        <input type="text" class="input-sm form-control" value="<?=set_value('zip')?>" placeholder="Zip" name="zip" required>
                    </div>
                                        
                    <div class="m-t-lg"><button class="btn btn-sm btn-success"><?=lang('create_place')?></button></div>
                    </form>
                </section>
            </section>
        </aside>
        <!-- /.aside -->
    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html"></a>
</section>