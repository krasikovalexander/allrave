<section>
    <!--<header class="header bg-white b-b clearfix">
        <div class="row m-t-sm">
            <div class="col-sm-4 m-b-xs">
                <h3>Vehicles Module</h3>
                <h4 style="color: red"><?php /*echo $message; */?></h4>
		<h4 style="color: red"><?php /*echo $upload_error; */?></h4>
            </div>
        </div></header>-->

    <section class="scrollable wrapper">

        <div class="row">
            <div class="col-lg-12">
                <section class="w-f scrollable panel panel-default">
                <header class="panel-heading font-bold">
                    <p>Vehicles Module</p>
                    <p><?php echo $message;?></p>
                    <p><?php echo $upload_error;?></p>
                </header>
                    </section>
            </div>
            <div class="col-lg-5" style="float: left;">
                <section class="w-f scrollable panel panel-default">
                    <header class="panel-heading font-bold" style="margin-bottom: 10px;">
                        Add Vehicles
                    </header>
                    <!--<p class="heading_text"><h3>Add Vehicles</h3></p>-->
                    <div class="table-responsive" style="text-align: center;">
                        <div id="customers_wrapper" class="dataTables_wrapper" role="grid">
                            <div class="row">
                                <table>
                                    <?php if(isset($error)){echo $error;}?>
                                    <?php $attributes = array('class' => 'add_form'); ?>
                                    <?php echo form_open_multipart('vehicles/add_vehicle',$attributes);?>
                                    <tr>
                                        <td class="col-lg-5"><label for="vehicle_name">Vehicle Name</label></td>
                                        <td><input type="text" name="vehicle_name" id="vehicle_name" required="required"></td>
                                    </tr>

                                    <tr>
                                        <td><label for="vehicle_name">Vehicle Number</label></td>
                                        <td><input type="text" name="vehicle_number" id="vehicle_number" required="required"></td>
                                    </tr>

                                    <tr>
                                        <td><label for="vehicle_image">Vehicle Image</label></td>
                                        <td><!--<input type="text" name="vehicle_image" id="vehicle_image">-->
                                            <input type="file" name="userfile" size="20" />
                                        </td>
                                    </tr>

                                    <tr>
                                        <!--<td></td>-->
                                        <td colspan="2" style="padding-top: 10px;padding-bottom: 10px;"><input type="submit" value="Add" style="width: 150px;" class="btn btn-success submit"></td>
                                    </tr>
                                    <input id="type" value="insert" name="type" type="hidden">
                                    <input id="vehicle_id" value="" name="vehicle_id" type="hidden">

                                </form>
                                </table>
                            </div>
                        </div>
                </section>
                </div>
            <div class="col-lg-7" style="float: right;">
                <section class="panel panel-default">

                    <div class="table-responsive">
                        <div id="customers_wrapper" class="dataTables_wrapper" role="grid">
                            <div class="row">
                            <div class="scrollit">
                            <table id="vehicle_table" class="table table-striped m-b-none dataTable" aria-describedby="customers_info" style="text-align: center;">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="customers" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Full Name: activate to sort column descending" style="width: 150px;text-align: center;">Name</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="customers" rowspan="1" colspan="1" aria-label="Email : activate to sort column ascending" style="width: 130px;text-align: center;">Vehicle Number</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="customers" rowspan="1" colspan="1" aria-label="Date : activate to sort column ascending" style="width: 109px;text-align: center;"></th>
                                    <!--<th class="hidden-sm sorting" role="columnheader" tabindex="0" aria-controls="customers" rowspan="1" colspan="1" aria-label="Booked On : activate to sort column ascending" style="width: 216px;">Booked on </th>-->
                                </tr>
                                </thead>

                                <tbody role="alert" aria-live="polite" aria-relevant="all" >
                                <?php $count = 1; ?>
                                <?php foreach($vehicles as $vehicle){ ?>
                                    <?php if($count < 11){?>
                                <tr class="<?php if($count%2==0){echo 'even';}else{echo 'odd';}?>">
                                    <td class="sorting_1"><?php echo $vehicle['vehicle_name'];?></td>
                                    <td><?php echo $vehicle['vehicle_number'];?></td>
                                    <td>
                                        <?php if(!$vehicle['image'] == ''){?>
                                        <img href="#test" src="<?=base_url()?>uploads/<?php echo $vehicle['image'];?>" width="40px" class="vehicle-img-icon fancybox">
                                        <?php } ?>
                                        <input type="button" data-id="<?php echo $vehicle['id']?>" class="btn btn-dark edit" value="edit">
                                        <input type="button" data-id="<?php echo $vehicle['id']?>" class="btn btn-danger delete" value="delete"></span>
                                    </td>
                                </tr>
                                    <?php }?>
                                    <?php $count++; ?>
                                <?php } ?>
                                </tbody>
                                    </div>
                            </table>
                            </div>
                    </div>

                </section>
            </div>
        </div>
        <div class="clear"></div>
    </section>
</section>
<div id="test" style="display: none;width: 100%;height: 100%;">
    <img src="" class="vehicle_img_big">
</div>
