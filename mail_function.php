<?php

// use PHPMailer\PHPMailer\PHPMailer;


// require ('PHPMailer-master/PHPMailer-master/src/PHPMailer.php');

// $message_body="One Time Password for PHP login authentication is: <br/><br/>".$otp;
// $mail=new PHPMailer();
// $mail->addReplyTo('gulshanchoudharyjee@gmail.com','Gulshan Kumar');
// $mail->setFrom('gulshanchoudharyjee@gmail.com','Gulshan Kumar');
// $mail->addAddress($email);
// $mail->msgHTML($message_body);
// $result=$email->send();
// if(!$result)
// {
//     echo "Mailer Error: ".$mail->ErrorInfo;
// }
// else
// {
//     echo "<script>alert('otp sent successfully');window.location.href='admin_email_verify.php';</script>";
// }




?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendOTP($email,$otp)
{ $message_body="Your One Time Password for PHP login authentication is: <br/>".$otp;
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;               //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
                    //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
   
    $mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted

    $mail->Host = 'smtp.gmail.com';// Specify main and backup SMTP servers
    $mail->Port = 587;// TCP port to connect to
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->Username   = 'gulshanchoudharyjee@gmail.com';                     //SMTP username
    $mail->Password   = 'gulshan09092000';                               //SMTP password
    //Recipients

    $mail->setFrom('gulshanchoudharyjee@gmail.com', 'Elibrary');
    $mail->addAddress($email);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->msgHTML($message_body);
    $mail->Subject = 'Elibrary- Email Verification OTP';
    // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}

// sendOTP('gulshan@iitk.ac.in',12345);

?>