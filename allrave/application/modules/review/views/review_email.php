<style>
    .information tr td{
        border: 1px solid #000000;
    }
    .information th{
        border: 1px solid #000000;
    }
</style>
<h2> <?php echo $heading; ?></h2>
    <p>The Following Review has been filled by the user :</p>
<table class="information">
    <th>fields</th>
    <th>value</th>

    <tr>
        <td>Name</td>
        <td><?php echo $name; ?></td>
    </tr>

    <tr>
        <td>Rating</td>
        <td><?php echo $rating; ?></td>
    </tr>

    <tr>
        <td>Feedback</td>
        <td><?php echo $feedback; ?></td>
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
