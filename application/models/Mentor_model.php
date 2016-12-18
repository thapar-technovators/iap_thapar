<?php

class Mentor_model extends CI_Model {


	function sendEmailAndRegister($data1)
	{
		$password=$this->generatePassword();
		$this->send_mail($data1['email'],"Successfully Registered","Hey I am Arush password: $password");
		$data1['password']=$this->passwordHash($password);
		if($this->registerUser($data1))
			return true;
		else
			return false;
	}

	function registerUser($data1)
	{
		$data = array(
        'initials' => $data1['initials'],
        'password' => $data1['password'],
        'name' => $data1['name'],
        'company' => $data1['company'],
        'phone' => $data1['phone'],
        'email' => $data1['email']
        );
		if($this->db->insert('mentor', $data))
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

	function auth($data2)
	{
		$password = $data2['password'];
		$registration_id = $data2['registration_id'];
		$password = $this->passwordHash($password);
		$sql = "SELECT * from mentor WHERE email='$registration_id' and password = '$password'";
		$dfetch = array();
		$query = $this->db->query($sql);
		if($query->num_rows() > 0) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function details($data3)
	{
		$password = $data3['password'];
		$registration_id = $data3['registration_id'];
		$password = $this->passwordHash($password);
		$sql = "SELECT * from mentor WHERE email='$registration_id' and password = '$password'";
		$data_fetch =array();
		$query = $this->db->query($sql);
		if($query->num_rows() > 0) 
		{
			$row = $query->row();
			$data_fetch['name'] = $row->name;
			$data_fetch['initials'] = $row->initials;
			return $data_fetch;
		}
		else
		{
			return false;
		}
	}

	function change_password($pass){
		$user = array();
		$user['registration_id'] = $pass['email'];
		$user['password'] = $pass['old'];
		if($this->auth($user)) 
		{
			$newpass = $this->passwordHash($pass['new']);
			$data = array('password' => $newpass );
			$this->db->where('email', $pass['email']);
			if($this->db->update('mentor', $data)) 
				return true;
			else
				return false;
		}
		else
		{
			return false;
		}

	}

	function forgot_password($email){ 
		$this->load->library('encrypt');
		$password=$this->generatePassword();
		$hashed_pass = $this->passwordHash($password);
		$encrypted_email= $this->encrypt->encode($email);
		if($this->send_mail($email,"Password Reset","Activation Code: $password <br> <br> This Activtion Code will expire once you reset your password.Click on this link and enter the above activation code to set your password: http://localhost/iap_thapar/index.php/forgotpassword/reset_mentor_password?email=$encrypted_email&code=$hashed_pass ")){

			$data = array('activation_link'=>$hashed_pass);

		$this->db->where('email', $email);
		if($this->db->update('mentor', $data)) 
			return true;
		}
		else 
			return false;

	}

	function link_activated($email,$code){ //to check if the link is still active or not
		$this->load->library('encrypt');
		$sanitized_email = $this->sanitize($email);
		$sanitized_code = $this->sanitize($code);
		$decrypted_email = $this->encrypt->decode($email);
		$data = array('email'=> $decrypted_email , 'activation_link'=>$sanitized_code);
		$query=$this->db->get_where('mentor',$data);
			if( $query->num_rows()>0)
						return true;
					else 
						return false;
		
	}

	function check_activation($original_code,$entered_code){ // to check if the user has entered correct activation code or not
		$sanitized_original = $this->sanitize($original_code);
		$entered_original = $this->sanitize($entered_code);
		if($sanitized_original== $this->passwordHash($entered_original)){

			return true;
		}
		else
			return false;
	}

	function reset_password($email,$pass){


		$this->load->library('encrypt');
		$decrypted_email = $this->encrypt->decode($email);
		$data = array('password' => $this->passwordHash($pass), 'activation_link'=> '0' );

		$this->db->where('email', $decrypted_email);
		if($this->db->update('mentor', $data)) 
			return true;
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

	function mentor_exists($email){

		$query = $this->db->query("SELECT * from mentor WHERE email='$email'");
		
		if($query->num_rows() > 0) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function getStudents($email)
	{
		$data_fetch =array();
		$query = $this->db->query("SELECT * from student,training_data where training_data.roll_number=student.roll_number and training_data.mentor='".$email."'");
		if($query->num_rows() > 0) 
		{
			$data_fetch = $query->result_array();
			return $data_fetch;
		}
		else
		{
			return false;
		}
	}

	function getStudents_nofeedback($email)
	{
		$data_fetch =array();
		$query = $this->db->query("SELECT * from training_data where mentor='$email' and feedback_done = 0");
		if($query->num_rows() > 0) 
		{
			$data_fetch = $query->result_array();
			return $data_fetch;
		}
		else
		{
			return false;
		}
	}

	function set_student_feedback($feedback){
		$data = array(
        'roll_number' => $feedback['roll_number'],
        'mentor' => $_SESSION["uid"],
        'email' => $feedback['email'],
        'q1' => $feedback['q1'],
        'q2' => $feedback['q2'],
        'q3' => $feedback['q3'],
        'q4' => $feedback['q4'],
        'q5' => $feedback['q5'],
        'q6' => $feedback['q6'],
        'q7' => $feedback['q7'],
        'q8' => $feedback['q8'],
        'q9' => $feedback['q9']
        );
		if($this->db->insert('mentor_feedback', $data))

			$data = array('feedback_done' => 1 );
			$this->db->where('email', $feedback['email']);
			$this->db->where('mentor', $_SESSION["uid"]);
			if($this->db->update('training_data', $data)) 
				return true;
			else
				return false;
			
	}
	function student_details($roll){

		$data_fetch =array();
		$query = $this->db->query("SELECT * from student WHERE roll_number='$roll'");
		
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
}
?>