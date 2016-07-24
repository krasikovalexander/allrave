<section>
    <header class="header bg-white b-b clearfix">
        <div class="row m-t-sm">
            <div class="col-sm-4 m-b-xs">
                <h3>Subscription Email</h3>
            </div>
        </div></header>

    <section class="scrollable wrapper">


        <?php 
        $msg=$this->session->flashdata('message');
        if($msg)
        { ?>
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $msg; ?>
            </div>
        <?php 
        }
        ?>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel panel-default">
                    <div class="table-responsive">
                        <div id="customers_wrapper" class="dataTables_wrapper" role="grid" style="padding: 10px;">
                            <!-- <form method="post" action="<?php echo base_url(); ?>subscription/send_subscription"> -->
                            <form method="post" action="<?php echo base_url(); ?>subscription/dummy_subscription">
                                <!--<select name="send_to" id="send_to">
                                    <option selected >Send Email To</option>
                                    <option>Subscribers</option>
                                    <option>Individual</option>
                                </select><br>-->
                                <!--<input class="form-control" type="text" name="individual_email" id="individual_email" placeholder="Enter Email id">-->
                                <label for="subject">Subject</label>
                                <input class="form-control" type="text" placeholder="Subject" value="" id="subject" name="subject" style="width: 100%;margin-top:10px;margin-bottom: 10px;" />
                                <label for="email_body">Content</label>
                                <textarea name="email_body" id="email_body" style="height: 100%"></textarea>
                                <input class="btn btn-success" type="submit" id="send_email" value="Send Email" name="send_email" style="width: 100%;margin-top: 10px;" />
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>