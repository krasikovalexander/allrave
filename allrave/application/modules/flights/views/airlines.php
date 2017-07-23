<section id="content">
    <section class="hbox stretch">
        <!-- .aside -->
        <aside>
            <section class="vbox">
                <header class="header bg-white b-b b-light">
                    <a href="#aside" data-toggle="class:show" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> <?=lang('new_airline')?></a>
                    <p><?=lang('airlines')?></p>
                </header>
                <section class="scrollable wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel panel-default">
                                <div class="table-responsive">
                                    <table id="customers" class="table table-striped m-b-none">
                                        <thead>
                                            <tr>
                                                <th><?=lang('airline_name')?></th>
                                                <th><?=lang('airline_logo')?> </th>
                                                <th><?=lang('airline_active')?> </th>
                                                <th><?=lang('options')?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if (!empty($airlines)) {
                                                foreach ($airlines as $key => $airline) { ?>
                                            <tr>
                                                <td><?=$airline->name?></td>
                                                <td>
                                                    <img style='max-height:50px' src="<?=base_url()?>resource/airline/<?=$airline->logo?>"/>
                                                </td>
                                                <td><?=$airline->active ? 'Yes': 'No'?></td>
                                                <td>
                                                    <a href="<?=base_url()?>flights/airlines/update/<?=$airline->id?>" class="btn btn-default btn-xs" data-toggle="ajaxModal" title="<?=lang('edit')?>"><i class="fa fa-edit"></i> </a>
                                                    
                                                    <a href="<?=base_url()?>flights/flights/manage/<?=$airline->id?>" class="btn btn-default btn-xs" title="<?=lang('flights')?>"><i class="fa fa-plane"></i></a>

                                                    <a href="<?=base_url()?>flights/airlines/delete/<?=$airline->id?>" class="btn btn-primary btn-xs" data-toggle="ajaxModal" title="<?=lang('delete')?>"><i class="fa fa-trash-o"></i></a>
                                                    
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
                        echo form_open_multipart(base_url().'flights/airlines/create'); 
                        echo $this->session->flashdata('form_errors'); 
                    ?>
                    <input type="hidden" name="r_url" value="<?=base_url()?>flights/airlines/manage">
                    <div class="form-group">
                        <label><?=lang('airline_name')?> <span class="text-danger">*</span></label>
                        <input type="text" class="input-sm form-control" value="<?=set_value('name')?>" placeholder="Airline name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label><?=lang('airline_logo')?> <span class="text-danger">*</span></label>
                        <input type="file" class="input-sm form-control" value="<?=set_value('logo')?>" name="logo" required>
                    </div>
                    <div class="form-group">
                        <label><?=lang('airline_active')?></label>
                        <input type="checkbox" name="active" value='1' <?=set_value('active') ? 'checked' : ''?> >
                    </div>
                    
                    <div class="m-t-lg"><button class="btn btn-sm btn-success"><?=lang('create_airline')?></button></div>
                    </form>
                </section>
            </section>
        </aside>
        <!-- /.aside -->
    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html"></a>
</section>