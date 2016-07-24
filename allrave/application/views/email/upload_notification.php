<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html><head><title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=320, target-densitydpi=device-dpi">
    <p>Hello Event Manager</p>
    <p>A new file has been uploaded by <?=$upload_user?> to project <?=$project_title?>. </p>
    <p>You can view the Event using the link below.</p>
        --------------------------
        <br>
        <a href="<?=base_url()?>">View Event</a>
<p>
Regards<br>
<?=$this->config->item('customer_name')?> Team
</p>
</body>
</html>
