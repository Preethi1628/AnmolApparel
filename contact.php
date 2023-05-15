<?php

require_once "PHPMailer/PHPMailerAutoload.php";


$name = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['subject'];
$message = $_POST['message'];


$mail = new PHPMailer;

//Enable SMTP debugging. 
$mail->SMTPDebug = 0;                               
//Set PHPMailer to use SMTP.
 $mail->isSMTP();            
 $mail->SMTPAuth = true;          
//Set SMTP host name                          
$mail->Host = "";
//Set this to true if SMTP host requires authentication to send email

//Provide username and password     
$mail->Username = "";                 
$mail->Password = "";                           
//If SMTP requires TLS encryption then set it
//$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 25;                                   

$mail->From = $email;
$mail->FromName = $name;

$mail->addAddress("info@deerandecors.in", $name);

$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
$mail->Subject = "Enquiry From";
$mail->Body =  "<table style='width:100%' cellpadding='0' cellspacing='0'>
   <tr>
      <td style='width:150px; border:1px solid #000; padding:20px'>Name</td>
      <td style='border:1px solid #000; padding:20px;'>$name</td>
   </tr>
   <tr>
      <td style='width:150px; border:1px solid #000; padding:20px'>Email Id</td>
      <td style='border:1px solid #000; padding:10px'>$email</td>
   </tr>
   <tr>
      <td style='width:150px; border:1px solid #000; padding:20px'>Subject</td>
      <td style='border:1px solid #000; padding:10px'>$tel</td>
   </tr>
   <tr>
      <td style='width:150px; border:1px solid #000; padding:20px'>Message</td>
      <td style='border:1px solid #000; padding:10px'>$message</td>
   </tr>
</table>" ;
$mail->AltBody = "This is the plain text version of the email content";


  if(!$mail->Send())
        {
  
    echo "Error:". $mail->ErrorInfo;

        }
        else
        {
            echo "ON";
        }

?>