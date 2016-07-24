<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>All Rave Transportation</title>
    <style>
        .information tr td{
            border: 1px solid #000000;
        }
        .information th{
            border: 1px solid #000000;
        }
    </style>
</head>

<body>

<h2> <?php echo $heading; ?></h2>
    <?php if(isset($user_subject) && !isset($admin_subject)){ ?>

    <p>Dear <?php echo $name; ?><br>You have filled the following data :</p>

    <?php }else{?>

    <p>The Following data has been filled by the user :</p>

    <?php } ?>
<table class="information">
    <th>fields</th>
    <th>value</th>

    <tr>
        <td>Name</td>
        <td><?php echo $name; ?></td>
    </tr>

    <tr>
        <td>Phone</td>
        <td><?php echo $phone; ?></td>
    </tr>

    <tr>
        <td>Email</td>
        <td><?php echo $email; ?></td>
    </tr>

    <tr>
        <td>Date</td>
        <td><?php echo date('m-d-Y',strtotime($date)); ?></td>
    </tr>
     <tr>
        <td>Time</td>
        <td><?php echo date('h:i A', strtotime($date)); ?></td>
    </tr>

    <tr>
        <td>Flight Number</td>
        <td><?php echo $flight_number; ?></td>
    </tr>

    <tr>
        <td>Arrival Time</td>
        <td><?php echo $arrival_time; ?></td>
    </tr>

    <tr>
        <td>Pickup Address</td>
        <td><?php echo $pickup_address; ?></td>
    </tr>

    <tr>
        <td>Pickup city</td>
        <td><?php echo $pickup_city; ?></td>
    </tr>

    <tr>
        <td>Pickup state</td>
        <td><?php echo $pickup_state; ?></td>
    </tr>

    <tr>
        <td>Pickup zip</td>
        <td><?php echo $pickup_zip; ?></td>
    </tr>

    <tr>
        <td>Dropoff address</td>
        <td><?php echo $dropoff_address; ?></td>
    </tr>

    <tr>
        <td>Dropoff city</td>
        <td><?php echo $dropoff_city; ?></td>
    </tr>

    <tr>
        <td>Dropoff state</td>
        <td><?php echo $dropoff_state; ?></td>
    </tr>

    <tr>
        <td>Dropoff zip</td>
        <td><?php echo $dropoff_zip; ?></td>
    </tr>

    <tr>
        <td>Number of passengers</td>
        <td><?php echo $number_of_passengers; ?></td>
    </tr>

    <tr>
        <td>Special Instructions</td>
        <td><?php echo $special_instruction; ?></td>
    </tr>

</table>
<?php if(isset($user_subject) && !isset($admin_subject)){ ?>
<p>** Please note you will receive additional email once confirmed</p>
<?php } ?>

<p>
    <table>
<tr>
<td>    IF YOU HAVE QUESTIONS
                CALL US NOW AT
                Tel: (610) 255-7283
                Toll Free: (844)-733-7283
            </td>
</tr>
        <tr>
            <td><img src="<?php echo base_url() ?>resource/images/rave-logo.png" /></td>
        </tr>
    </table>
</p>
</body>
</html>
