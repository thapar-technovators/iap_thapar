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


	/*This function returns the branches that will be using the interface for scalability purpose*/
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

	function sendEmailAndRegister($document)
	{
		$password=$this->generatePassword();
		$this->send_mail($document['email'],"Successfully Registered","Hey I am Arush password: $password");
		$document['password']=$this->passwordHash($password);
		if($this->registerUser($document))
			return true;
		else
			return false;
	}

	function registerUser($document)
	{
		$data = array(
        'roll_number' => $document['registration'],
        'email' => $document['email'],
        'password' => $document['password'],
        'name' => $document['name'],
        'branch' => $document['branch'],
        'semester' => $document['semester'],
        'phone' => $document['phone']
        );
		if($this->db->insert('student', $data))
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

/*This function generates a random password of length 6 that will be sent through email*/
	function generatePassword() 
	{
        $alpha = "abcdefghijklmnopqrstuvwxyz";
        $alpha_upper = strtoupper($alpha);
        $numeric = "0123456789";
        $special = ".-+=_,!@$#*%<>[]{}";
        $chars = "";
        $alpha_small = 'on';
        $alpha_cap = 'on';
        $num = 'on';
        $special_char = 'off';
        
        if ($alpha_small == 'on')
            $chars .= $alpha;

        if ($alpha_cap == 'on')
            $chars .= $alpha_upper;

        if ($num == 'on')
            $chars .= $numeric;

        if ($special_char == 'on')
            $chars .= $special;
        $length = 6;
        $len = strlen($chars);
        $pw = '';
        for ($i = 0; $i < $length; $i++)
            $pw .= substr($chars, rand(0, $len - 1), 1);
	// the finished password
        $pw = str_shuffle($pw);
        return $pw;
    }

/*This function hashes the password using a secure cryptographic function BCRYPT and then returns the hash*/
     function passwordHash($password) 
    {
		$salt='wanttocrackitokaythendoitbutthiswillincreasethelengthofpasswordandthenyouspendyearscrackingit';
		$options = ['salt' => 'wanttocrackitokaythendoitbutthiswillincreasethelengthofpasswordandthenyouspendyearscrackingit'];
		$password.=$salt;
		return password_hash($password, PASSWORD_BCRYPT,$options);
	}

	function authenticate_student($user){

		$email = $user['email'];
		$password = $user['password'];
		$hashed_pass = $this->passwordHash($password);

		$query = $this->db->query("SELECT email,password FROM student WHERE email='$email' AND password='$hashed_pass'");
		if($query->num_rows()>0)
				return true;
		else
			return false; 

	}

	function details($email){

		$data_fetch =array();
		$query = $this->db->query("SELECT * from student WHERE email='$email'");
		
		if($query->num_rows() > 0) 
		{
			$data_fetch = $query->row();
			//$data = array('true',$data_fetch);
			return $data_fetch;
		}
		else
		{
			return false;
		}
	}

	function company_details(){

		$data_fetch =array();
		$query = $this->db->query("SELECT * from training_data");
	//	$data_fetch = $query->result_array();
		if($query->num_rows() > 0) 
		{
			$data_fetch = $query->result_array();
			//$data = array('true',$data_fetch);
			return $data_fetch;
		}
		else
		{
			return false;
		}
	}

}
?>