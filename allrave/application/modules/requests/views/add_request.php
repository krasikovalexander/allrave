<section>
    <!--<header class="header bg-white b-b clearfix">
        <div class="row m-t-sm">
            <div class="col-sm-4 m-b-xs">
                <h3>Add Request</h3>
            </div>
        </div></header>-->

    <section class="scrollable wrapper" style="padding:0px 15px 15px 15px; ">

        <div class="row">
            <div class="col-lg-12">
                <section class="w-f scrollable panel panel-default">
                    <header class="panel-heading font-bold">
                        Reservation Form
                    </header>
                    <p style="color: red;"><?php echo $this->session->flashdata('message');?></p>
                    <h4 style='color:red'><?php echo validation_errors();?></h4>
                    <div class="error_message">
                        <ul></ul>
                    </div>
                    <div style="margin: 0px auto;width: 100%;overflow-y: scroll; height: 530px;">
                        <div class="col-lg-8 resform">
                            <?php $attributes = array('id' => 'reservation_form'); ?>
                            <?php echo form_open("requests/add_request/$date/$time", $attributes); ?>
                            <table>
                                <!--<thead></thead>-->
                                <tbody>
                                <tr>
                                    <td><?php echo form_label('Name: *'); ?> <?php echo form_error('username'); ?></td>
                                    <td><?php echo form_input(
                                            array('class' => 'form-control','id' => 'username', 'name' => 'username', 'placeholder' => 'Name', 'required' => 'required', 'autocomplete' => 'off','data-url' => base_url().'requests/get_user_details_by_name' )
                                        ); ?>
                                        <div class="hidden name_list_div" style="background: lightblue;">
                                            <ul style="padding-left:0;list-style: none;">

                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><?php echo form_label('Phone: *'); ?> <?php echo form_error('phone'); ?></td>
                                    <td><?php echo form_input(
                                            array('class' => 'form-control', 'id' => 'phone', 'name' => 'phone', 'required' => 'required', 'placeholder' => 'Phone')
                                        ); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td><?php echo form_label('Email: *'); ?> <?php echo form_error('email'); ?></td>
                                    <td><?php echo form_input(
                                            array('class' => 'form-control', 'id' => 'email', 'name' => 'email', 'required' => 'required', 'placeholder' => 'Email')
                                        ); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td><?php echo form_label('Flight Number: '); ?></td>
                                    <td><?php echo form_input(
                                            array(
                                                'class' => 'form-control',
                                                'id' => 'flightnumber',
                                                'name' => 'flightnumber',
                                                'placeholder' => 'Flight Number'
                                            )
                                        ); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td><?php echo form_label('Arrival Time:'); ?></td>
                                    <td><?php echo form_input(array('class' => 'form-control','id' => 'usr_time', 'name' => 'usr_time', 'value' => '')); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td><?php echo form_label('Pickup Address:'); ?> <?php form_error('pickup_address'); ?></td>
                                    <td><?php echo form_textarea(
                                            array(
                                                'class' => 'form-control',
                                                'id' => 'pickup_address',
                                                'name' => 'pickup_address',
                                                'rows' => '1',
                                                'cols' => '50',
                                                'placeholder' => 'Address Line 1'
                                            )
                                        ); ?></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td><?php echo form_input(
                                            array(
                                                'id' => 'pickup_city',
                                                'name' => 'pickup_city',
                                                'required' => 'required',
                                                'placeholder' => 'City',
                                                'class' => 'cityarea form-control'
                                            )
                                        ); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td><?php $pickup_option = array(
                                            '0' => 'State',
                                            'IA' => 'IA',
                                            'IL' => 'IL',
                                            'MI' => 'MI',
                                            'MN' => 'MN',
                                            'MO' => 'MO',
                                            'NE' => 'NE',
                                            'WI' => 'WI'
                                        ); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td><?php echo form_dropdown(
                                            'pickup_state',
                                            $pickup_option,
                                            '0',
                                            'id = "pickup_state" class = "statearea form-control" '
                                        ); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td><?php echo form_input(
                                            array(
                                                'id' => 'pickup_zip',
                                                'name' => 'pickup_zip',
                                                'required' => 'required',
                                                'placeholder' => 'Zip Code',
                                                'class' => 'ziparea form-control'
                                            )
                                        ); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td><?php echo form_label('Drop off address:'); ?> <?php form_error('drop_address'); ?></td>
                                    <td><?php echo form_textarea(
                                            array(
                                                'class' => 'form-control',
                                                'id' => 'drop_address',
                                                'name' => 'drop_address',
                                                'rows' => '1',
                                                'cols' => '50',
                                                'placeholder' => 'Address Line 1'
                                            )
                                        ); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td><?php echo form_input(
                                            array(
                                                'id' => 'drop_city',
                                                'name' => 'drop_city',
                                                'required' => 'required',
                                                'placeholder' => 'City',
                                                'class' => 'cityarea form-control'
                                            )
                                        ); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <?php $drop_option = array(
                                            '0' => 'State',
                                            'IA' => 'IA',
                                            'IL' => 'IL',
                                            'MI' => 'MI',
                                            'MN' => 'MN',
                                            'MO' => 'MO',
                                            'NE' => 'NE',
                                            'WI' => 'WI'
                                        ); ?>
                                        <?php echo form_dropdown('drop_state', $drop_option, '0', 'id = "drop_state" class = "statearea form-control"'); ?></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td><?php echo form_input(
                                            array(
                                                'id' => 'drop_zip',
                                                'name' => 'drop_zip',
                                                'required' => 'required',
                                                'placeholder' => 'Zip Code',
                                                'class' => 'ziparea form-control'
                                            )
                                        ); ?></td>
                                </tr>

                                <tr>
                                    <td><?php echo form_label('Number of Passenger:'); ?></td>
                                    <td><?php $passenger_option = array(
                                            '' => 'Number of Passenger',
                                            '1' => '1',
                                            '2' => '2',
                                            '3' => '3',
                                            '4' => '4'
                                        ); ?>
                                        <?php echo form_dropdown('passenger', $passenger_option, 0, 'id = "passenger" class = "form-control" '); ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td><?php echo form_label('Special Instruction:'); ?></td>
                                    <td><?php echo form_textarea(
                                            array(
                                                'class' => 'form-control',
                                                'id' => 'special_instruction',
                                                'name' => 'special_instruction',
                                                'rows' => '2',
                                                'cols' => '50',
                                                'placeholder' => 'Special Instruction'
                                            )
                                        );?></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td><?php echo form_submit(array('value' => 'SUBMIT', 'class' => 'submit btn btn-success')); ?>
                                        <?php echo form_reset(array('value' => 'RESET', 'class' => 'reset btn btn-dark')); ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <?php
                            $date = $this->uri->segment(3);
                            $time = $this->uri->segment(4);
                            $time = substr($time,0,2).':'.substr($time,2,2).':00';
                            $datetime = $date.' '.$time;
                            ?>
                            <input type="hidden" name="date_cdt" value="<?php echo $datetime;?>"/>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                        </div>
                </section>
            </div>
            <!--<div class="form-control-feedback">
                <!--<p style="color: red;"><?php /*echo $this->session->flashdata('message');*/?></p>-->
                <!--<div class="col-lg-12"><h3>Reservation Form</h3>-->
		<!--<h4 style='color:red'><?php /*echo validation_errors();*/?></h4>
		</div>-->

            </div>

    </section>
</section>
