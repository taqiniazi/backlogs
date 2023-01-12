<?php



use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require 'PHPMailer-master/src/Exception.php'; 
require 'PHPMailer-master/src/PHPMailer.php'; 
require 'PHPMailer-master/src/SMTP.php'; 

 $mail = new PHPMailer(true); 

// if($send_using_gmail){
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true; 
    $mail->SMTPSecure = "ssl"; 
    $mail->Host = "smtp.gmail.com"; 
    $mail->Port = 465; 
    $mail->Username = "sahilthegreat2@gmail.com";
    $mail->Password = "rjwvweocdxpnzyoj"; 
// }

//Typical mail data
$mail->AddAddress("sahil@dreamzdigitalsolutions.com", "Sahil");
$mail->SetFrom("sahilthegreat2@gmail.com", "kuli");
$mail->Subject = "My Subject";
$mail->Body = "Mail contents";

try{
    $mail->Send();
    echo "Success!";
} catch(Exception $e){
    //Something went bad
    echo "Fail - " . $mail->ErrorInfo;
}

