<?php 
    /*require_once('application/third_party/mailer/class.phpmailer.php');
    include('application/third_party/mailer/class.smtp.php'); // optional, gets called from within class.phpmailer.php if not already loaded

    $mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

    $mail->IsSMTP(); // telling the class to use SMTP

    try {
      $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
        $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
        $mail->Username   = "dsgfdsg";  // GMAIL username
        $mail->Password   = "dgsdsg";            // GMAIL password
        $mail->AddReplyTo('arushnagpal10000@gmail.com', 'Arush Nagpal');
        $mail->AddAddress('arushngpl16@gmail.com', 'Arush Nagpal');
        $mail->SetFrom('arush@gmail.com', 'First Last');
        $mail->AddReplyTo('name@yourdomain.com', 'First Last');
        $mail->Subject = 'PHPMailer Test Subject via mail(), advanced';
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
        $mail->MsgHTML("Hello this is a medvhnbfsd");
//        $mail->AddAttachment('images/phpmailer.gif');      // attachment
//        $mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
        $mail->Send();
        echo "Message Sent OK";
    } 
    catch (phpmailerException $e) {
        echo $e->errorMessage();//Pretty error messages from PHPMailer
    } 
    catch (Exception $e) {
        echo $e->getMessage(); //Boring error messages from anything else!
    }*/
echo send_mail('arushngpl16@gmail.com','dsjfvsdfjfs','jfdsjbhdg');

function send_mail($to,$subject,$body)
{
require 'class.phpmailer.php';
$from = "hostmyexam@gmail.com";
$mail = new PHPMailer();
$mail->IsSMTP(true); // SMTP
$mail->SMTPAuth   = true;  // SMTP authentication
$mail->Mailer = "smtp";
$mail->Host       = "tls://smtp.gmail.com"; // Amazon SES server, note "tls://" protocol
$mail->Port       = 465;                    // set the SMTP port
$mail->Username   = "gssdgsdg";  // SES SMTP  username
$mail->Password   = "adfsdfds";  // SES SMTP password
$mail->SetFrom($from, 'Hdsfsdfds');
$mail->AddReplyTo($from,'Arush Nagpal');
$mail->Subject = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);

if(!$mail->Send())
return "false";
else
return "true";
}

    ?>