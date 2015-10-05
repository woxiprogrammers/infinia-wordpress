<?php

require './PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;

//echo 1; exit;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.woxiprogrammers.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'infinia@woxiprogrammers.com';                 // SMTP username
$mail->Password = 'infi@1234';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('infinia@woxiprogrammers.com', 'Mailer');
$mail->addAddress('bharat.woxi@gmail.com', 'Bharat Makwana');     // Add a recipient
//$mail->addAddress('ellen@examp');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('sandeep.patil@woxiprogrammers.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
