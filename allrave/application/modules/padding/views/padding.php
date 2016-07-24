<style>
    .padding_table tr td{
        padding: 10px;
    }
</style>
<section>
    <section class="w-f scrollable panel panel-default" style="padding:0px 15px 15px 15px; ">

        <div class="row">
            <div class="form-control-feedback">
                <p><?php echo $this->session->flashdata('message');?></p>
                <div class="col-lg-12"><h2>Padding Form</h2></div>
                <div class="col-lg-8 resform">
                    <div class="error_message">

                    </div>
                    <table class="padding_table">
                        <tr>
                            <td><label>Select the date: </label></td>
                            <td><input type="text" id="date" class="date" /></td>
                        </tr>
                        <tr>
                            <td><label>Select Time From: </label></td>
                            <td><input type="text" id="time_from" class="timepicker" /></td>
                        </tr>

                        <tr>
                            <td><label>Select Time To: </label></td>
                            <td><input type="text" id="time_to" class="timepicker" /></td>
                        </tr>

                        <tr>
                            <td><input data-type="add" data-url="<?php echo base_url()?>padding/padding_process" type="button" id="add_padding" class="btn btn-success" value="Add Padding"></td>
                            <td><input data-type="remove" type="button" id="remove_padding" class="btn btn-danger" value="Remove Padding"></td>
                        </tr>
                    </table>
                    <br>
                    <?php $cdt = date('Y-m-d H:i', time() - 60 * 60 * 5 );
                        $cdt_date = date('Y-m-d', strtotime($cdt));
                        $cdt_time = date('H:i', strtotime($cdt))
                    ?>
                    <input type="hidden" id="cdt_datetime" value="<?php echo $cdt;?>">
                    <input type="hidden" id="cdt_date" value="<?php echo $cdt_date;?>">
                    <input type="hidden" id="cdt_time" value="<?php echo $cdt_time;?>">
                    <input type="button" data-url="<?php echo base_url()?>padding/reset_padding" data-type="reset" id="remove_all_padding" class="btn btn-danger" value="Remove all padding">
                </div>
            </div>
        </div>

    </section>
</section>
