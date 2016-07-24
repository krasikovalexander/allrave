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
    <p>Hello <?php echo $user[0]['name']; ?>,</p>
    <p>Your Ride has been booked with us.</p>
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
<!--new_code-->
<p><?php if(isset($accepted)){?>
        <a href="<?php echo base_url().'reservation/reject/'.$user[0]['id']; ?>">Cancel your Booking.</a>
    <?php } ?>
</p>
<p>
    <?php
    $date_from = date('Y-m-d H:i:s', strtotime($user[0]['date']) + 60 * 60 * 5);//do not delete this line.
    $date_from = date('Ymd', strtotime($date_from)).'T'.date('His',strtotime($date_from)).'Z';
    //$date_from = '20150529T140000Z';

    $date_to = date('Ymd', strtotime($date_from)).'T'.date('His',strtotime($date_from) + 60 * 60).'Z';
    $location = $user[0]['pickup_address'].' , '.$user[0]['pickup_city'].' , '.$user[0]['pickup_state'];
    $location_to = $user[0]['dropoff_address'].' , '.$user[0]['dropoff_city'].' , '.$user[0]['dropoff_state'];
    $flight_number = $user[0]['flight_number'];
    $arrival_time = $user[0]['arrival_time'];
    $number_of_passengers = $user[0]['number_of_passengers'];
    $text = "Ride+With+AllRaveTransportation+from+$location+to+$location_to+,+Flight+Number+$flight_number+,+Arrival+Time+$arrival_time+,+Number+of+passengers+$number_of_passengers";
    ?>
    <a href='<?php echo "https://www.google.com/calendar/render?action=TEMPLATE&text="."$text"."&dates=$date_from/$date_to"."&location=$location"."&sf=true&output=xml"?>'>Add event to your calendar</a>
</p>
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