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
<table>
    <p>Hello <?php echo $admin_name; ?>,</p>
    <p>A ride has been booked, following are the details.</p>
</table>

<table class="information">
    <th>fields</th>
    <th>value</th>

    <tr>
        <td>Name</td>
        <td><?php echo $user[0]['name']; ?></td>
    </tr>

    <tr>
        <td>Phone</td>
        <td><?php echo $user[0]['phone']; ?></td>
    </tr>

    <tr>
        <td>Email</td>
        <td><?php echo $user[0]['email']; ?></td>
    </tr>

    <tr>
        <td>Date</td>
        <td><?php echo date('m-d-Y',strtotime($user[0]['date'])); ?></td>
    </tr>
    <tr>
        <td>Time</td>
        <td><?php echo date('h:i A', strtotime($user[0]['date'])); ?></td>
    </tr>

    <tr>
        <td>Flight Number</td>
        <td><?php echo $user[0]['flight_number']; ?></td>
    </tr>

    <tr>
        <td>Arrival Time</td>
        <td><?php echo $user[0]['arrival_time']; ?></td>
    </tr>

    <tr>
        <td>Pickup Address</td>
        <td><?php echo $user[0]['pickup_address']; ?></td>
    </tr>

    <tr>
        <td>Pickup city</td>
        <td><?php echo $user[0]['pickup_city']; ?></td>
    </tr>

    <tr>
        <td>Pickup state</td>
        <td><?php echo $user[0]['pickup_state']; ?></td>
    </tr>

    <tr>
        <td>Pickup zip</td>
        <td><?php echo $user[0]['pickup_zip']; ?></td>
    </tr>

    <tr>
        <td>Dropoff address</td>
        <td><?php echo $user[0]['dropoff_address']; ?></td>
    </tr>

    <tr>
        <td>Dropoff city</td>
        <td><?php echo $user[0]['dropoff_city']; ?></td>
    </tr>

    <tr>
        <td>Dropoff state</td>
        <td><?php echo $user[0]['dropoff_state']; ?></td>
    </tr>

    <tr>
        <td>Dropoff zip</td>
        <td><?php echo $user[0]['dropoff_zip']; ?></td>
    </tr>

    <tr>
        <td>Number of passengers</td>
        <td><?php echo $user[0]['number_of_passengers']; ?></td>
    </tr>

    <tr>
        <td>Special Instructions</td>
        <td><?php echo $user[0]['special_instruction']; ?></td>
    </tr>

</table>
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
