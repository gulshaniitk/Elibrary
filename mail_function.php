

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendOTP($email,$otp)
{ $message_body="Dear Sir / Madam,

    Your One Time Password(OTP) is :<br><br>".$otp."
    
    <br><br>Your OTP will expire in 15 min.<br><br>Do not share your OTP with anyone. <br/>";
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;               //Enable verbose debug output
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;               //Enable verbose debug output
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
    

    $mail->Username   = 'elibraryiitk@gmail.com';                     //SMTP username
    $mail->Password   = 'gulshan_rajat';                               //SMTP password
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
     echo "<script>alert('Otp sent succesfully to your email');</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}

// sendOTP('gulshan@iitk.ac.in',12345);

?>
