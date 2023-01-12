<?php
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

$headers = 'From: info@pathhub.fnqhpathology.com';
// send email
$success = mail("glenn.makowski@fnqhpathology.com","My subject",$msg,$headers); 
if (!$success) {
    //$errorMessage = error_get_last()['message'];
    echo "Failed to send an email!!!";
}else{
    echo "Email has been sent successfully to following email : glenn.makowski@fnqhpathology.com";
}
