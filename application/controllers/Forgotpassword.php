<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpassword extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->model('Default_model');
		$this->output->enable_profiler(TRUE);
	}

/*The default call to the register page opens the student registration form*/
	public function index($page = 'student')
	{
		$data['title']="Register | Student";
		$this->load->view('templates/front_header',$data);
		$this->load->view('templates/forgotpassword/'.$page,$data);
		$this->load->view('templates/front_footer',$data);
	}

/* Thus is the method that is called when the url: index.php/register/student is accessed*/
	public function student()
	{
		$data['title']="Forgot Password | Student";
		$this->load->model('Student_model');
		if($this->input->post())
		{
			//Need not apply TRUE tags to every post field since the global XSS has been set to true
			
			
			$data['email']=$this->input->post('email');
			
			/*Now check for every error*/
			$data['error']=array();
			$this->load->helper('email');
			/*Convert the name into title case using javascript*/
			if(!valid_email($data['email']))
				array_push($data['error'], array('The email is not in proper format!',0));
			
			if(!isset($data['error'][0]))
			{
				if($this->Student_model->student_exists($data['email'])){
					if($this->Student_model->forgot_password($data['email']))
					{
						array_push($data['error'], array('The link and Activation code has been sent to your email ID to reset passowrd. Please check your mail.',1));
					}
					else
					{
						array_push($data['error'], array('Some Error Occurred. Please Try Again',0)); //Error handling on duplicate email left and has to be done later
					}

				}
				else
					{
						array_push($data['error'], array('This email id is not registered yet!',0)); //Error handling on duplicate email left and has to be done later
					}		
			}
			
		}
		
			$this->load->view('templates/front_header',$data);
			$this->load->view('templates/forgotpassword/student',$data);
		 	$this->load->view('templates/front_footer',$data);
	}

	public function reset_student_password(){
		$data['title']="Login | Student";
		$this->load->model('Student_model');
		if($this->input->post()){
			$data['error']=array();
			$original_code = $this->input->post('code_sent');
			$entered_code = $this->input->post('activation');
			$newpass = $this->input->post('newpass');
			$confirmpass = $this->input->post('confirmpass');
			$email = $this->input->post('email');
			if($this->Student_model->check_activation($original_code,$entered_code)){
				if($newpass==$confirmpass){
					
					if($this->Student_model->reset_password($email,$newpass)){
						array_push($data['error'], array("Password successfully changed!",1));
						$this->load->view('templates/front_header',$data);
						$this->load->view('templates/login/student',$data);
						$this->load->view('templates/front_footer',$data);


					}
					else{
						array_push($data['error'], array('Some error occurred. Please try again!',0));
						$this->load->view('templates/front_header',$data);
						$this->load->view('templates/forgotpassword/password_reset',$data);
						$this->load->view('templates/front_footer',$data);
					}

				}
				else{

					array_push($data['error'], array('Confirm Password does not match with the new password',0));
					$this->load->view('templates/front_header',$data);
					$this->load->view('templates/forgotpassword/password_reset',$data);
					$this->load->view('templates/front_footer',$data);
				}
			}
			else{
				
				array_push($data['error'], array("The entered activation code does not match with the sent code!",0));
				$this->load->view('templates/front_header',$data);
				$this->load->view('templates/forgotpassword/password_reset',$data);
				$this->load->view('templates/front_footer',$data);
			}
		}
		else{
		$this->load->view('templates/front_header',$data);
		$this->load->view('templates/forgotpassword/password_reset',$data);
		$this->load->view('templates/front_footer',$data);
	}
	}

	public function faculty()
	{
		$data['title']="Forgot Password | Faculty";
		$this->load->model('Faculty_model');
		if($this->input->post())
		{
			//Need not apply TRUE tags to every post field since the global XSS has been set to true
			
			
			$data['email']=$this->input->post('email');
			
			/*Now check for every error*/
			$data['error']=array();
			$this->load->helper('email');
			/*Convert the name into title case using javascript*/
			if(!valid_email($data['email']))
				array_push($data['error'], array('The email is not in proper format!',0));
			
			if(!isset($data['error'][0]))
			{
				if($this->Faculty_model->faculty_exists($data['email'])){
					if($this->Faculty_model->forgot_password($data['email']))
					{
						array_push($data['error'], array('The link and Activation code has been sent to your email ID to reset passowrd. Please check your mail.',1));
					}
					else
					{
						array_push($data['error'], array('Some Error Occurred. Please Try Again',0)); //Error handling on duplicate email left and has to be done later
					}

				}
				else
					{
						array_push($data['error'], array('This email id is not registered yet!',0)); //Error handling on duplicate email left and has to be done later
					}		
			}
			
		}
		
			$this->load->view('templates/front_header',$data);
			$this->load->view('templates/forgotpassword/faculty',$data);
		 	$this->load->view('templates/front_footer',$data);
	}

	public function reset_faculty_password(){
		$data['title']="Login | Faculty";
		$this->load->model('Faculty_model');
		if($this->input->post()){
			$data['error']=array();
			$original_code = $this->input->post('code_sent');
			$entered_code = $this->input->post('activation');
			$newpass = $this->input->post('newpass');
			$confirmpass = $this->input->post('confirmpass');
			$email = $this->input->post('email');
			if($this->Faculty_model->check_activation($original_code,$entered_code)){
				if($newpass==$confirmpass){
					
					if($this->Faculty_model->reset_password($email,$newpass)){
						array_push($data['error'], array("Password successfully changed!",1));
						$this->load->view('templates/front_header',$data);
						$this->load->view('templates/login/faculty',$data);
						$this->load->view('templates/front_footer',$data);


					}
					else{
						array_push($data['error'], array('Some error occurred. Please try again!',0));
						$this->load->view('templates/front_header',$data);
						$this->load->view('templates/forgotpassword/password_reset_faculty',$data);
						$this->load->view('templates/front_footer',$data);
					}

				}
				else{

					array_push($data['error'], array('Confirm Password does not match with the new password',0));
					$this->load->view('templates/front_header',$data);
					$this->load->view('templates/forgotpassword/password_reset_faculty',$data);
					$this->load->view('templates/front_footer',$data);
				}
			}
			else{
				
				array_push($data['error'], array("The entered activation code does not match with the sent code!",0));
				$this->load->view('templates/front_header',$data);
				$this->load->view('templates/forgotpassword/password_reset_faculty',$data);
				$this->load->view('templates/front_footer',$data);
			}
		}
		else{
		$this->load->view('templates/front_header',$data);
		$this->load->view('templates/forgotpassword/password_reset_faculty',$data);
		$this->load->view('templates/front_footer',$data);
	}
	}


	public function mentor()
	{
		$data['title']="Register | Mentor";
		$this->load->view('templates/front_header',$data);
		$this->load->view('templates/forgotpassword/mentor',$data);
		$this->load->view('templates/front_footer',$data);
	}
	//Sample function to test PHP Mailer

	public function sendmail()
	{
		$this->Default_model->send_mail('arushngpl16@gmail.com','subject','body');
	}

}
