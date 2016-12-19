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

function getPhase_num()
	{
		$uid=$_SESSION["uid"];
		$query = $this->db->query("SELECT phase FROM training_data where email='$uid'");
		$result=$query->result_array();
		return $result[0]['phase'];
	}

	function getPhase()
	{
		$uid=$_SESSION["uid"];
		$query = $this->db->query("SELECT phase FROM training_data where email='$uid'");
		$result=$query->result_array();
		if($result[0]['phase']=="1")
		{
			$result[0]['phase']= "1   ||  Enter your training Details";	
		}
		if($result[0]['phase']=="2")
		{
			$result[0]['phase']= "2   ||  Contact and Link your mentor";	
		}
		if($result[0]['phase']=="3")
		{
			$result[0]['phase']= "3   ||  Upload your Joining Report";	
		}
		if($result[0]['phase']=="4")
		{
			$result[0]['phase']= "4   ||  Faculty Allotment";	
		}
		if($result[0]['phase']=="5")
		{
			$result[0]['phase']= "5   ||  Upload your Intermediate Report";	
		}
		if($result[0]['phase']=="6")
		{
			$result[0]['phase']= "6   ||  Upload your Final Report";	
		}
		if($result[0]['phase']=="7")
		{
			$result[0]['phase']= "7   ||  Evaluation by faculty";	
		}
		if($result[0]['phase']=="8")
		{
			$result[0]['phase']= "8   ||  Final Marks";	
		}
		
		return $result[0]['phase'];
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
        'phone' => $document['phone'],
        'activation_link' => 0
        );
		if($this->db->insert('student', $data))
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
		$company = $this->get_companies($document['student_email']);
		$data_user = $this->details($document['student_email']);
		$var = $data_user->roll_number;
			$data = array(
        'roll_number' => $var,
        'email' => $_SESSION['uid'],
        'company' => $document['name'],
        'city' => $document['city'],
        'date_of_join' => $document['doj'],
        'months' => $document['months'],
        'phase' => '2',
        'training_num'=>count($company)+1,
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
		$user = array();
		$user['email'] = $pass['email'];
		$user['password'] = $pass['old'];
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

	function forgot_password($email){ 
		$this->load->library('encrypt');
		$password=$this->generatePassword();
		$hashed_pass = $this->passwordHash($password);
		$encrypted_email= $this->encrypt->encode($email);
		if($this->send_mail($email,"Password Reset","Activation Code: $password <br> <br> This Activtion Code will expire once you reset your password.Click on this link and enter the above activation code to set your password: http://localhost/iap_thapar/index.php/forgotpassword/reset_student_password?email=$encrypted_email&code=$hashed_pass ")){

			$data = array('activation_link'=>$hashed_pass);

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
		$data = array('password' => $this->passwordHash($pass), 'activation_link'=> '0' );

		$this->db->where('email', $decrypted_email);
		if($this->db->update('student', $data)) 
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

	function link_activated($email,$code){ //to check if the link is still active or not
		$this->load->library('encrypt');
		$sanitized_email = $this->sanitize($email);
		$sanitized_code = $this->sanitize($code);
		$decrypted_email = $this->encrypt->decode($email);
		$data = array('email'=> $decrypted_email , 'activation_link'=>$sanitized_code);
		$query=$this->db->get_where('student',$data);
			if( $query->num_rows()>0)
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

	function add_mentor($student_id,$mentor_id,$company){
		$data_user = $this->details($student_id);
		$this->db->where('roll_number',$data_user->roll_number);
		$this->db->where('company',$company);
		if($this->db->update('training_data',array('mentor'=>$mentor_id,'phase'=>3)))
			return true;
		else
			return false;

	}

	function mentor_exists($mentor_id){
		$query = $this->db->query("SELECT * from mentor WHERE email='$mentor_id'");
		if($query->num_rows() > 0) 
			return true;
		else
			return false;
	}

	function get_companies_of_student($student_id){
		$data_user = $this->details($student_id);
		$roll = $data_user->roll_number;
		$query = $this->db->query("SELECT company FROM training_data WHERE roll_number = '$roll' AND mentor = ''");
		$company=array();
		$result=$query->result_array();
		foreach ($result as $res) {
			array_push($company, $res['company']);
		}
		return $company;
	}
	function get_companies($student_id){
		$data_user = $this->details($student_id);
		$roll = $data_user->roll_number;
		$query = $this->db->query("SELECT company FROM training_data WHERE roll_number = '$roll'");
		$company=array();
		$result=$query->result_array();
		foreach ($result as $res) {
			array_push($company, $res['company']);
		}
		return $company;
	}

	function get_faculty_email($email){

		$data_fetch =array();
		$query = $this->db->query("SELECT faculty_alotted from training_data where email = '$email' and phase=4");
	//	$data_fetch = $query->result_array();
		if($query->num_rows() > 0) 
		{
			$data_fetch = $query->result_array();
			//$data = array('true',$data_fetch);
			return $data_fetch[0];
		}
		else
		{
			return false;
		}
	}

	function get_faculty($student_id){
		$email = $this->get_faculty_email($student_id);
		$query = $this->db->query("SELECT name,email,phone FROM faculty WHERE  email = '".$email['faculty_alotted']."'");
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

	function get_companies_joining_report($student_id){
		$data_user = $this->details($student_id);
		$roll = $data_user->roll_number;
		$query = $this->db->query("SELECT company FROM training_data WHERE roll_number = '$roll' AND joining_report = ''");
		$company=array();
		$result=$query->result_array();
		foreach ($result as $res) {
			array_push($company, $res['company']);
		}
		return $company;
	}

	function get_companies_intermid_report($student_id){
		$data_user = $this->details($student_id);
		$roll = $data_user->roll_number;
		$query = $this->db->query("SELECT company FROM training_data WHERE roll_number = '$roll' AND intermid_report = ''");
		$company=array();
		$result=$query->result_array();
		foreach ($result as $res) {
			array_push($company, $res['company']);
		}
		return $company;
	}

	function get_companies_final_report($student_id){
		$data_user = $this->details($student_id);
		$roll = $data_user->roll_number;
		$query = $this->db->query("SELECT company FROM training_data WHERE roll_number = '$roll' AND final_report = ''");
		$company=array();
		$result=$query->result_array();
		foreach ($result as $res) {
			array_push($company, $res['company']);
		}
		return $company;
	}


	function get_months($roll){
		//$data_user = $this->details($student_id);
		//$roll = $data_user->roll_number;
		$this->db->select_sum('months','total');
		$query = $this->db->get_where('training_data',array('roll_number'=>$roll));
		$result = $query->row();
		return $result->total;

	}
	function submit_intermid($roll,$company_name,$report){
		$data2 = array('intermid_report'=>$report,'phase' =>6);
		$this->db->where(array('roll_number'=>$roll,'company'=>$company_name));
		if($this->db->update('training_data',$data2))
			return true;
		else
			return false;
	}

	function submit_joining($roll,$company_name,$report){
		$data2 = array('joining_report'=>$report,'phase' =>4);
		$this->db->where(array('roll_number'=>$roll,'company'=>$company_name));
		if($this->db->update('training_data',$data2))
			return true;
		else
			return false;
	}

	function submit_final($roll,$company_name,$report){
		$data2 = array('final_report'=>$report,'phase' =>7);
		$this->db->where(array('roll_number'=>$roll,'company'=>$company_name));
		if($this->db->update('training_data',$data2))
			return true;
		else
			return false;
	}

	function get_company_num($roll,$company){
		$query = $this->db->query(" SELECT training_num FROM training_data WHERE company='$company' AND roll_number='$roll'");
		$result = $query->row();
		return $result->training_num;

	}

	

}
?>