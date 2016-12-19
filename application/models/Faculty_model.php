<?php

class Faculty_model extends CI_Model {


	function sendEmailAndRegister($data1)
	{
		$password=$this->generatePassword();
		$this->send_mail($data1['email'],"Faculty Successfully Registered","Here is your password: $password");
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
		//$dfetch = array();
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
	/*Change Password*/
	function change_password($pass)
	{
		$user = array();
		$user['registration_id'] = $pass['email'];
		$user['password'] = $pass['old'];
		if($this->auth($user)) 
		{
			$newpass = $this->passwordHash($pass['new']);

			$data = array('password' => $newpass );

			$this->db->where('email', $pass['email']);
			if($this->db->update('faculty', $data)) 
				return true;
			else
			return false;
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

	function faculty_info_fetch($data)
	{
		$email = $data['email'];
		$sql = "SELECT registration_id as 'Registration ID', initials as 'Initials', name as 'Name', phone as 'Phone Number', email as 'E-mail ID', designation as 'Designation', pref1 as 'City Preference 1', pref2 as 'City Preference 2', pref3 as 'City Preference 3' from faculty WHERE email='$email'";
		//$sql = "SELECT * from faculty where email='$email'";
		if($query = $this->db->query($sql)){
			$row = $query->result();
			return $row;
		}
		else
		{
			return false;
		}
	}

	function faculty_exists($email){

		$data_fetch =array();
		$query = $this->db->query("SELECT * from faculty WHERE email='$email'");
		
		if($query->num_rows() > 0) 
		{
			return true;
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
		if($this->send_mail($email,"Password Reset","Activation Code: $password <br> <br> Click on this link and enter the above activation code to set your password: http://localhost/iap_thapar/index.php/forgotpassword/reset_faculty_password?email=$encrypted_email&code=$hashed_pass ")){

			return true;
		}
		else 
			return false;

	}
	function reset_password($email,$pass){


		$this->load->library('encrypt');
		$decrypted_email = $this->encrypt->decode($email);
		$data = array('password' => $this->passwordHash($pass) );

		$this->db->where('email', $decrypted_email);
		if($this->db->update('faculty', $data)) 
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

	function sanitize($string)
	{
    	$string = filter_var($string, FILTER_SANITIZE_STRING);
    	$string = trim($string);
    	$string = stripslashes($string);
    	$string = strip_tags($string);
    	return $string;
	}

	function student_fetch($email)
	{
    	$data_fetch =array();
		$query = $this->db->query("SELECT * from student, training_data WHERE faculty_alotted='$email' AND student.roll_number = training_data.roll_number;");
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
function company_details(){

		$data_fetch =array();
		$query = $this->db->query("SELECT DISTINCT company from training_data where marks=0");
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

	function getStudents_noevaluation(){
		$data_fetch =array();
		$query = $this->db->query("SELECT DISTINCT roll_number,email from training_data where marks = 0");
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

	function set_student_marks($feedback){
		
        $sum1 = $feedback['q1'] + $feedback['q2'] + $feedback['q3'] + $feedback['q4'] + $feedback['q5'] + $feedback['q6'] + $feedback['q7'] + $feedback['q8'] + $feedback['q9'] + $feedback['q10'];
        $sum2 = $feedback['q11'] + $feedback['q12'] + $feedback['q13'] + $feedback['q14'] + $feedback['q15'] + $feedback['q16'] + $feedback['q17'];
        $sum3 = $feedback['q18'] + $feedback['q19'] + $feedback['q20'];
 		$sum1 = $sum1/5;
		$sum2 = $sum2*10/35;
				$sum3 = $sum3/3;
 		$sum = $sum1+ $sum2 + $sum3;
        //$sum = 10;
			$data = array('marks' => $sum );
			$this->db->where('roll_number', $feedback['roll_number']);
			$this->db->where('company',$feedback['company']);
			if($this->db->update('training_data', $data)) 
				return true;
			else
				return false;
			
	}
	function getallreports($roll){
		$reports=array();
		$query = $this->db->query("SELECT joining_report FROM training_data WHERE roll_number=$roll AND joining_report <> '' ");
		$result=$query->result_array();
		$i = 1;
		foreach ($result as $res) {
				array_push($reports, array($res['joining_report'],"Joining Report ".$i));
				$i++;
		}
		$i=1;
		$query = $this->db->query("SELECT intermid_report FROM training_data WHERE roll_number=$roll AND intermid_report <> '' ");
		$result=$query->result_array();
		foreach ($result as $res) {
				array_push($reports, array($res['intermid_report'],"Intermid Report ".$i));
				$i++;
		}
		$i=1;
		$query = $this->db->query("SELECT final_report FROM training_data WHERE roll_number=$roll AND final_report <> ''");
		$result=$query->result_array();
		foreach ($result as $res) {
				array_push($reports, array($res['final_report'],"Final Report ".$i));
				$i++;
		}
		return $reports;
	}

}

?>