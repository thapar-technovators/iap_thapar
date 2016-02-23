<?php

class Default_model extends CI_Model {

function send_mail($to,$subject,$body)
{
	require(APPPATH.'third_party/mailer/class.phpmailer.php');
	$from = "iapthapar@gmail.com";
	$mail = new PHPMailer();
	$mail->IsSMTP(true); // SMTP
	$mail->SMTPAuth   = true;  // SMTP authentication
	$mail->Mailer = "smtp";
	$mail->Host       = "tls://smtp.gmail.com"; // Amazon SES server, note "tls://" protocol
	$mail->Port       = 465;                    // set the SMTP port
	$mail->Username   = "iapthapar@gmail.com";  // SES SMTP  username
	$mail->Password   = "thaparmech";  // SES SMTP password
	$mail->SetFrom($from, 'Team IAP TU');
	$mail->AddReplyTo($from,'Arush Nagpal');
	$mail->Subject = $subject;
	$mail->MsgHTML($body);
	$address = $to;
	$mail->AddAddress($address, $to);

	if(!$mail->Send())
		return false;
	else
		return true;
}
}
?>