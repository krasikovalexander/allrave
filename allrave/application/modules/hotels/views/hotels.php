<section id="content">
    <section class="hbox stretch">
        <!-- .aside -->
        <aside>
            <section class="vbox">
                <header class="header bg-white b-b b-light">
                    <a href="#aside" data-toggle="class:show" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> <?=lang('new_hotel')?></a>
                    <p><?=lang('hotels')?></p>
                </header>
                <section class="scrollable wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel panel-default">
                                <div class="table-responsive">
                                    <table id="customers" class="table table-striped m-b-none">
                                        <thead>
                                            <tr>
                                                <th><?=lang('hotel_name')?></th>
                                                <th><?=lang('hotel_logo')?> </th>
                                                <th><?=lang('hotel_requests')?> </th>
                                                <th><?=lang('options')?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if (!empty($hotels)) {
                                                foreach ($hotels as $key => $hotel) { ?>
                                            <tr>
                                                <td><?=$hotel->name?></td>
                                                <td>
                                                    <img style='height:50px' src="<?=base_url()?>resource/hotel/<?=$hotel->logo?>"/>
                                                </td>
                                                <td><?=$hotel->requests?></td>
                                                <td>
                                                    <a href="<?=base_url()?>hotels/update/<?=$hotel->id?>" class="btn btn-default btn-xs" data-toggle="ajaxModal" title="<?=lang('edit')?>"><i class="fa fa-edit"></i> </a>
                                                    
                                                    <a href="<?=base_url()?>hotels/emails/<?=$hotel->id?>" class="btn btn-default btn-xs" title="<?=lang('hotel_emails')?>"><i class="fa fa-envelope"></i></a>

                                                    <a href="<?=base_url()?>hotels/delete/<?=$hotel->id?>" class="btn btn-primary btn-xs" data-toggle="ajaxModal" title="<?=lang('delete')?>"><i class="fa fa-trash-o"></i></a>
                                                    
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
                        echo form_open_multipart(base_url().'hotels/create'); 
                        echo $this->session->flashdata('form_errors'); 
                    ?>
                    <input type="hidden" name="r_url" value="<?=base_url()?>hotels/manage">
                    <div class="form-group">
                        <label><?=lang('hotel_name')?> <span class="text-danger">*</span></label>
                        <input type="text" class="input-sm form-control" value="<?=set_value('name')?>" placeholder="Hotel name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label><?=lang('hotel_logo')?> <span class="text-danger">*</span></label>
                        <input type="file" class="input-sm form-control" value="<?=set_value('logo')?>" name="logo" required>
                    </div>
                    
                    <div class="m-t-lg"><button class="btn btn-sm btn-success"><?=lang('create_hotel')?></button></div>
                    </form>
                </section>
            </section>
        </aside>
        <!-- /.aside -->
    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html"></a>
</section>