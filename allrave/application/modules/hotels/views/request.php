<style>
    .information tr td{
        border: 1px solid #e5e5e5;
    }
    .information th{
        border: 1px solid #e5e5e5;
    }
</style>

<p>Hi</p>

<p>
Awesome News! Here are the details from our Rave Luxury Transportation rapid request form. 
<br/>Please Note This email has been sent to multiple hotels within your chain so if you have availability try to be the first to respond with a yes we have availability :-) 
<br/>If there are fields you would like to see let us know!
</p>


<table class="information">
    <tr>
        <td>Check-in</td>
        <td><?php echo $checkin; ?></td>
    </tr>

    <tr>
        <td>Checkout</td>
        <td><?php echo $checkout; ?></td>
    </tr>

    <tr>
        <td>Rooms 2 Queen Size Beds</td>
        <td><?php echo $rooms_queen; ?></td>
    </tr>

    <tr>
        <td>Rooms 1 King Size Beds</td>
        <td><?php echo $rooms_king; ?></td>
    </tr>

    <tr>
        <td>Adults</td>
        <td><?php echo $adults; ?></td>
    </tr>

    <tr>
        <td>Children</td>
        <td><?php echo $children; ?></td>
    </tr>

    <?php if(in_array('wheelchair', $special)) { ?>
        <tr>
            <td>Special requirements</td>
            <td>Wheelchair accessible room</td>
        </tr>
    <? }?>

    <tr>
        <td>Notes</td>
        <td><?php echo $note; ?></td>
    </tr>
</table>
<p>
<table>
    <tr>
        <td><img src="<?php echo base_url() ?>resource/images/rave-logo.png" /></td>
        <td></td>
    </tr>
</table>
</p>


<hr>
<p>
Thank you for allowing us to help travelers find hotel availability a whole lot easier
</p>
<p>
Yours Truly,
</p>
<p>
Rave Luxury Transportation
</p>
