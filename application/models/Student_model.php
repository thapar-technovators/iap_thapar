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


	function student_exists($email){

		$data_fetch =array();
		$query = $this->db->query("SELECT * from student WHERE email='$email'");
		
		if($query->num_rows() > 0) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function company_details(){

		$data_fetch =array();
		$query = $this->db->query("SELECT DISTINCT company from training_data");
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
	function company_city_list(){

		$data_fetch =array();
		$query = $this->db->query("SELECT DISTINCT city from training_data");
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

	function set_company_details($document){

		$data_user = $this->details($document['student_email']);
		$var = $data_user->roll_number;
			$data = array(
        'roll_number' => $var,
        'company' => $document['name'],
        'city' => $document['city'],
        'date_of_join' => $document['doj'],
        'months' => $document['months'],
        'phase' => '0',
        'admin_approve' => '1'
        );

			$query1=$this->db->get_where('training_data', $data);

			if( $query1->num_rows()>0){

					return false;
			}
			else{
				if($this->db->insert('training_data', $data))
					return true;
				else
					return false;
			}
	}

	function change_password($pass){

		//$hashed_pass = $this->passwordHash($pass['oldpass']);
		$user = array();
		$user['email'] = $pass['email'];
		$user['password'] = $pass['old'];

		//$query = $this->db->query("SELECT email,password from student WHERE email='".$pass['email']."' AND password='$hashed_pass'");
		if($this->authenticate_student($user)) 
		{
			$newpass = $this->passwordHash($pass['new']);

			$data = array('password' => $newpass );

			$this->db->where('email', $pass['email']);
			if($this->db->update('student', $data)) 
				return true;
			else
				return false;
		}
		else
		{
			return false;
		}

	}
/*	function forgot_password($email){

		$password=$this->generatePassword();
		$this->send_mail($email,"Successfully Registered","Hey I am Arush password: $password");
		$data = array('password' => $this->passwordHash($password) );
		$this->db->where('email', $email);
			if($this->db->update('student', $data)) 
				return true;
			else
				return false;
		
	}*/

	function forgot_password($email){
		$this->load->library('encrypt');
		$password=$this->generatePassword();
		$hashed_pass = $this->passwordHash($password);
		$encrypted_email= $this->encrypt->encode($email);
		if($this->send_mail($email,"Password Reset","Activation Code: $password <br> <br> This Activtion Code will expire once you reset your password.Click on this link and enter the above activation code to set your password: http://localhost/iap_thapar/index.php/forgotpassword/reset_student_password?email=$encrypted_email&code=$hashed_pass ")){

			$data = array('activation_link'=>1 );

		$this->db->where('email', $email);
		if($this->db->update('student', $data)) 
			return true;
		}
		else 
			return false;

	}
	function reset_password($email,$pass){


		$this->load->library('encrypt');
		$decrypted_email = $this->encrypt->decode($email);
		$data = array('password' => $this->passwordHash($pass), 'activation_link'=>0 );

		$this->db->where('email', $decrypted_email);
		if($this->db->update('student', $data)) 
			return true;
		else
			return false;
	}

	function check_activation($original_code,$entered_code){
		$sanitized_original = $this->sanitize($original_code);
		$entered_original = $this->sanitize($entered_code);

		if($sanitized_original== $this->passwordHash($entered_original))
			return true;
		else
			return false;
	}

	function link_activated($email){
		$this->load->library('encrypt');
		$decrypted_email = $this->encrypt->decode($email);
		$data = array('email'=> $decrypted_email, 'activation_link'=>1);
		$query=$this->db->get_where('student',$data);
			if( $query->num_rows()>0){

					return true;
			}
			else
				return false;
	}

	function sanitize($string)
{
    $string = filter_var($string, FILTER_SANITIZE_STRING);
    $string = trim($string);
    $string = stripslashes($string);
    $string = strip_tags($string);
    return $string;
}


}
?>