<?php require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
//$mail->SMTPDebug = 3;
// Enable verbose debug output
$mail->isSMTP();
// Set mailer to use SMTP
$mail->Host = '103.21.59.71';
// Specify main and backup SMTP servers
$mail->SMTPAuth = true;
// Enable SMTP authentication
$mail->Username = 'smtp@jayshinde.com';
// SMTP username
$mail->Password = 'caGk-po7+rh@';
// SMTP password
$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );
$mail->SMTPSecure = 'tls';
// Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;
// TCP port to connect to
$mail->setFrom('smtp@jayshinde.com', 'Mailer');
$mail->addAddress('mailhostingserver@gmail.com', 'mailer');
// Add a recipient
// $mail->addAddress('ellen@example.com');
// Name is optional $mail->addReplyTo('sales_rfidseal@rfidsealsindia.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');
// Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');
// Optional name
//$mail->isHTML(true);
// Set email format to HTML
$mail->Subject = 'Here is the subject'; $mail->Body = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; if(!$mail->send()) { echo 'Message could not be sent.'; echo 'Mailer Error: ' . $mail->ErrorInfo; } else { echo 'Message has been sent'; }