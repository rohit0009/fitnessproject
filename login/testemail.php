<?php

require '../PHPMailer/PHPMailerAutoload.php';
$msg = $_GET['desc'];
$email = $_GET['email'];
$name = $_GET['name'];
//echo $msg." ".$email." ".$name;

$mail = new PHPMailer;

//Enable SMTP debugging. 
$mail->SMTPDebug = 0;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();       
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "nrp.fitnessclub@gmail.com";                 
$mail->Password = "fitnessclub";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                                   

$mail->From = "nrp.fitnessclub@gmail.com";
$mail->FromName = "NRP Fitness Club";

$mail->addAddress($email, $name);

$mail->isHTML(true);

$random = rand(1000,9999);

$mail->Subject = "OTP Details";
$mail->Body = "<div style='border: 1px solid #ADADAD;padding:10px;'><h2>Thanks For registration on our Website.<br>Active your account by entering the OTP <span style='color: #3b79dd;border-bottom: 1px solid #3b79dd;'>".$random."</span></h2></div>";
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Please Check Mail for OTP Details";
}
    
?>		