<?php

class Student_model extends CI_Model {

/* SOME RILES AND CONVENTIONS TO BE FOLLOWED:
 * For each function written, mention a comment above for what it will be used for
 * Use Joins wherever possible
 * Use UNION keyword instead of OR in queries, it will be faster
 * Avoid nested queries to the maximum extent
 * Use query Caching for appropriate queries
 * Use LIMIT and OFFSET wherever possible
 * Create indexes for columns other than primary keys for faster search
 * For efficient search that corrects typos automatically find the appropriate way
 *
 */

function getBranches()
{
	$query = $this->db->query("SELECT branch FROM branch");
	$branch=array();
	$result=$query->result_array();
	foreach ($result as $res) {
		array_push($branch, $res['branch']);
	}
	return $branch;
}

/*Used to check in form validation whether any field is empty*/
function isEmpty($var)
{
	if($var=="")
		return true;
	else
		return false;
}


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