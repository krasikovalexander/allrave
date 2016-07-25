<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>All Rave Transportation</title>
    <style>
        
    </style>
</head>

<body>
    <p>
    <?php echo date('F jS g:ia',strtotime($date)); ?> Pick up <?php echo $name; ?> Location <?php echo $pickup_address; ?> <?php echo $pickup_city; ?> <?php echo $pickup_state; ?> <?php echo $pickup_zip; ?>
    </p>
    <br/>

    <p>
        Drop off address <?php echo $dropoff_address; ?> <?php echo $dropoff_city; ?> <?php echo $dropoff_state; ?> <?php echo $dropoff_zip; ?>,
        <?php echo $number_of_passengers; ?> passengers, <?php echo $phone; ?>, <?php echo $email; ?>, <?php echo $special_instruction; ?>
    </p>

    <table class="information">
        <tr>
            <td>Alternate Phone</td>
            <td><?php echo $alternate_phone1; ?> <?php echo $alternate_phone2; ?></td>
        </tr>
        <tr>
            <td>Flight Number</td>
            <td><?php echo $flight_number; ?></td>
        </tr>
        <tr>
            <td>Arrival Time</td>
            <td><?php echo $arrival_time; ?></td>
        </tr>
    </table>
</body>
</html>
