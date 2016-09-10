<section id="content">
    <section class="hbox stretch">
        <!-- .aside -->
        <aside>
            <section class="vbox">
                <header class="header bg-white b-b b-light">
                    <a href="#aside" data-toggle="class:show" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> <?=lang('new_email')?></a>
                    <p><?=$hotel->name?> <?=lang('hotel_emails')?></p>
                </header>
                <section class="scrollable wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <section class="panel panel-default">
                                <div class="table-responsive">
                                    <table id="customers" class="table table-striped m-b-none">
                                        <thead>
                                            <tr>
                                                <th><?=lang('email')?></th>
                                                <th><?=lang('state')?> </th>
                                                <th><?=lang('options')?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if (!empty($emails)) {
                                                foreach ($emails as $key => $email) { ?>
                                            <tr>
                                                <td><?=$email->email?></td>
                                                <td><?=ucwords($email->state)?></td>
                                                <td>
                                                    <a href="<?=base_url()?>hotels/updateemail/<?=$email->id?>" class="btn btn-default btn-xs" data-toggle="ajaxModal" title="<?=lang('edit')?>"><i class="fa fa-edit"></i> </a>
                                                    
                                                    <a href="<?=base_url()?>hotels/deleteemail/<?=$email->id?>" class="btn btn-primary btn-xs" data-toggle="ajaxModal" title="<?=lang('delete')?>"><i class="fa fa-trash-o"></i></a>
                                                    
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
                        echo form_open_multipart(base_url().'hotels/createemail'); 
                        echo $this->session->flashdata('form_errors'); 
                    ?>
                    <input type="hidden" name="r_url" value="<?=base_url()?>hotels/emails/<?=$hotel->id?>">
                    <input type="hidden" name="hotel_id" value="<?=$hotel->id?>">
                    <div class="form-group">
                        <label><?=lang('email')?> <span class="text-danger">*</span></label>
                        <input type="text" class="input-sm form-control" value="<?=set_value('email')?>" placeholder="Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label><?=lang('state')?> <span class="text-danger">*</span></label>
                        <select class="input-sm form-control" name="state" required>
                            <option value='iowa' <?= set_value('state') == 'iowa' ? 'selected' : '' ?>>Iowa Quad Cities</option>
                            <option value='illinois' <?= set_value('state') == 'illinois' ? 'selected' : '' ?>>Illinois Quad Cities</option>
                            <!--<option value='all' <?= set_value('state') == 'all' ? 'selected' : '' ?>>All Quad Cities</option>-->
                        </select>
                    </div>
                    
                    <div class="m-t-lg"><button class="btn btn-sm btn-success"><?=lang('new_email')?></button></div>
                    </form>
                </section>
            </section>
        </aside>
        <!-- /.aside -->
    </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen, open" data-target="#nav,html"></a>
</section>