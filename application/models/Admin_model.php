<?php

class Admin_model extends CI_Model {


	function send_mail($to,$subject,$body)
	{
		require_once(APPPATH.'third_party/mailer/PHPMailerAutoload.php');
		//require_once(APPPATH.'third_party/mailer/class.smtp.php');
		$from = "iapthapar@gmail.com";
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->SMTPDebug = 0;
		$mail->Debugoutput = 'html';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = "iapthapar@gmail.com";
		$mail->Password = "thaparmech@123";
		$mail->setFrom('iapthapar@gmail.com', 'IAP Thapar');
		$mail->addReplyTo('iapthapar@gmail.com', 'IAP Thapar');
		$mail->Subject = $subject;
		$mail->MsgHTML($body);
		$address = $to;
		$mail->AddAddress($address, $to);

		if(!$mail->Send())
		{return false;}	
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


	function checkLogin($reg_id,$password)
	{
		$len="SELECT name FROM `administrator` where registration_id='$reg_id' and password='$password'";
		$query = $this->db->query($len);
		$row = $query->row();
		if (isset($row))
       	{
       		$this->session->set_userdata('user_type', 'admin');
			$this->session->set_userdata('uid', $reg_id);
			$this->session->set_userdata('full_name',$row->name);
       		return true;
       	}
       	else
       		return false;
	}

	function getStudents()
	{
		$data_fetch =array();
		$query = $this->db->query("SELECT * from student");
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

	function getFaculty()
	{
		$data_fetch =array();
		$query = $this->db->query("SELECT * from faculty");
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

	function getMentors()
	{
		$data_fetch =array();
		$query = $this->db->query("SELECT * from mentor");
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

	function getEmail($table)
	{
		$data_fetch =array();
		$query = $this->db->query("SELECT DISTINCT email from $table");
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

	function getStudentDetail($rollno)
	{
		$data_fetch =array();
		$query = $this->db->query("SELECT * from student where roll_number= $rollno");
		$data_fetch = $query->result_array();
		return $data_fetch;		
	}

	function getUntagged()
	{
		$data_fetch =array();
		$query = $this->db->query("SELECT * from training_data where faculty_alotted is NULL");
		$data_fetch = $query->result_array();
		return $data_fetch;		
	}

	function getTagged()
	{
		$data_fetch =array();
		$query = $this->db->query("SELECT * from training_data where faculty_alotted is NOT NULL");
		$data_fetch = $query->result_array();
		return $data_fetch;		
	}

	function getTrainingAll()
	{
		$data_fetch =array();
		$query = $this->db->query("SELECT * from training_data where faculty_alotted is not null");
		$data_fetch = $query->result_array();
		return $data_fetch;		
	}
	function getTrainingDetail($rollno)
	{
		$data_fetch =array();
		$query = $this->db->query("SELECT * from training_data where roll_number= $rollno");
		$data_fetch = $query->result_array();
		return $data_fetch;		
	}

	function verify($rollno,$email,$company,$months,$city)
	{
		$query = $this->db->query("UPDATE  training_data SET phase=phase+1,email='$email', company='$company', city='$city', months=$months where roll_number= $rollno and old_record is null");
		if($query)
			return true;
		else
			return false;
	}
	function linkts($student,$teacher)
	{
		$query = $this->db->query("UPDATE  training_data SET faculty_alotted='$teacher', phase=phase+1 where email= '$student' and old_record is null");
		if($query)
			return true;
		else
			return false;
	}
}

?>