<?php

$subscribers = array(
                    "deepak.anand@360itpro.com",
                    "rakesh.budhlakoti@360itpro.com",
                    "shammi@360itpro.com",
                    //....as many email address as you need
                    );

foreach($subscribers as $contact) {

$to     = $contact;
$subject = 'the subject';
$message = 'hello';
if(mail($to, $subject, $message))
{
	echo "sucess";
}
else
{
	echo "fail";
}


}