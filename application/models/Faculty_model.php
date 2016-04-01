<?php

class Faculty_model extends CI_Model {


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
        'registration_id' => $data1['registration_id'],
        'initials' => $data1['initials'],
        'password' => $data1['password'],
        'name' => $data1['name'],
        'designation' => $data1['designation'],
        'phone' => $data1['phone'],
        'email' => $data1['email']
        );
		if($this->db->insert('faculty', $data))
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
		$salt = "wanttocrackitokaythendoitbutthiswillincreasethelengthofpasswordandthenyouspendyearscrackingit";
		$options = [
    'salt' => 'wanttocrackitokaythendoitbutthiswillincreasethelengthofpasswordandthenyouspendyearscrackingit'
];
		$password.=$salt;
		return password_hash($password, PASSWORD_BCRYPT,$options);
		
	}

	/*login authentication*/
	function auth($data2)
	{
		$password = $data2['password'];
		$registration_id = $data2['registration_id'];
		$password = $this->passwordHash($password);
		$sql = "SELECT * from faculty WHERE email='$registration_id' and password = '$password'";
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
		$sql = "SELECT * from faculty WHERE email='$registration_id' and password = '$password'";
		$data_fetch =array();
		$query = $this->db->query($sql);
		if($query->num_rows() > 0) 
		{
			$row = $query->row();
			$data_fetch['fname'] = $row->name;
			$data_fetch['initials'] = $row->initials;
			return $data_fetch;
		}
		else
		{
			return false;
		}
	}

	function cityfetch()
	{
		$sql = "SELECT DISTINCT city from training_data WHERE admin_approve=1";
		$city_fetched = array();
	
	$query = $this->db->query($sql);
	if($query->num_rows() > 0) 
	{
		foreach ($query->result() as $row)
		{
   			array_push($city_fetched,$row->city);
		}
		return $city_fetched;
	}
	else
		{
			return false;
		}
	}

	function city_pref_insert($data)
	{
		$pref1 = $data['pref1'];
		$pref2 = $data['pref2'];
		$pref3 = $data['pref3'];
		$email = $data['email'];
		$sql = "UPDATE faculty set pref1='$pref1', pref2='$pref2', pref3='$pref3' WHERE email='$email';";
		if($this->db->query($sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}

?>