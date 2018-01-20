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

    <p>
        Dear <?php echo $name; ?>, thank you for your request, but we can not currently serve it.
        <br/>
        You have filled the following data :
    </p>
    <p>
        Name: <?php echo $name; ?> <br/>
        Phone: <?php echo $phone; ?> <br/>
        Email: <?php echo $email; ?> <br/>
        Date/Time: <?php echo date('m/d/Y h:i A', strtotime($date)); ?><br/>
        Flight Number: <?php echo $flight_number; ?> <br/>
        Arrival Time: <?php echo $arrival_time; ?> <br/>
        Pickup Address: <?php echo $pickup_address; ?> <br/>
        Dropoff address: <?php echo $dropoff_address; ?> <br/>
        Car: <?php echo $car; ?> <br/>
        Special Instructions: <?php echo $special_instruction; ?><br/>
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
