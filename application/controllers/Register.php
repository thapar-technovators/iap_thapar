<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

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
		$this->load->view('templates/register/'.$page,$data);
		$this->load->view('templates/front_footer',$data);
	}

/* Thus is the method that is called when the url: index.php/register/student is accessed*/
	public function student()
	{
		$this->load->model('Student_model');
		$data['title']="Registration Form | Student";
		$data['branches']=$this->Student_model->getBranches();	
		if($this->input->post())
		{
			//Need not apply TRUE tags to every post field since the global XSS has been set to true
			$data['name']=$this->input->post('name');
			$data['registration']=$this->input->post('registration');
			$data['branch']=$this->input->post('branch');
			$data['semester']=$this->input->post('semester');
			$data['email']=$this->input->post('email');
			$data['phone']=$this->input->post('phone');
			$data['company']=$this->input->post('company');
			$data['city']=$this->input->post('city');
			$data['doj']=$this->input->post('doj');
			$data['timeoftraining']=$this->input->post('timeoftraining');
			/*Now check for every error*/
			$data['error']=array();
			$this->load->helper('email');
			/*Convert the name into title case using javascript*/
			if($this->Default_model->isEmpty($data['name']))
				array_push($data['error'], array('Please enter your Name!',0));
			if($this->Default_model->isEmpty($data['email']))
				array_push($data['error'], array('Please enter your Email!',0));
			if(!valid_email($data['email']))
				array_push($data['error'], array('The email is not in proper format!',0));
			if($this->Default_model->isEmpty($data['registration']))
				array_push($data['error'], array('Please enter your Roll Number!',0));
			if($this->Default_model->isEmpty($data['branch']))
				array_push($data['error'], array('The Branch field cannot be left empty!',0));
			if($this->Default_model->isEmpty($data['semester']))
				array_push($data['error'], array('The Semester field cannot be left empty!',0));
			if($this->Default_model->isEmpty($data['phone']))
				array_push($data['error'], array('The Phone field cannot be left empty!',0));
			if($this->Default_model->isEmpty($data['company']))
				array_push($data['error'], array('The Company field cannot be left empty!',0));
			if($this->Default_model->isEmpty($data['city']))
				array_push($data['error'], array('The City field cannot be left empty!',0));
			if(isset($data['error'][0]))
			{
				$this->load->view('templates/front_header',$data);
				$this->load->view('templates/register/student',$data);
				$this->load->view('templates/front_footer',$data);
			}
			else
			{
				if($this->Student_model->sendEmailAndRegister($data))
				{
					array_push($data['error'], array('Registration SUCCESS! Password has been sent to your email ID. Please check your mail and then login.',1));
				}
				else
				{
					array_push($data['error'], array('Some Error Occurred. Please Try Again',0)); //Error handling on duplicate email left and has to be done later
				}
				$this->load->view('templates/front_header',$data);
				$this->load->view('templates/register/student',$data);
				$this->load->view('templates/front_footer',$data);
			}
		}
		else
		{
			$this->load->view('templates/front_header',$data);
			$this->load->view('templates/register/student',$data);
			$this->load->view('templates/front_footer',$data);
		}
	}

	public function faculty()
	{
		$this->load->model('Faculty_model');
		$data['title']="Registration Form | Faculty";
		if($this->input->post())
		{
			//Need not apply TRUE tags to every post field since the global XSS has been set to true
			$data['registration_id']=$this->input->post('registration');
			$data['initials']=$this->input->post('initials');
			$data['name']=$this->input->post('name');
			$data['designation']=$this->input->post('designation');
			$data['phone']=$this->input->post('phone');
			$data['email']=$this->input->post('email');
			/*Now check for every error*/
			$data['error']=array();
			$this->load->helper('email');
			/*Convert the name into title case using javascript*/
			if(!valid_email($data['email']))
				array_push($data['error'], 'The email field cannot be empty!');
			if($this->Default_model->isEmpty($data['registration_id']))
				array_push($data['error'], 'Please enter your registration id!');
			if($this->Default_model->isEmpty($data['initials']))
				array_push($data['error'], 'The initials cannot be left empty!');
			if($this->Default_model->isEmpty($data['name']))
				array_push($data['error'], 'The name field cannot be left empty!');
			if($this->Default_model->isEmpty($data['designation']))
				array_push($data['error'], 'The designation field cannot be left empty!');
			if($this->Default_model->isEmpty($data['phone']))
				array_push($data['error'], 'The Phone field cannot be left empty!');
			if(isset($data['error'][0]))
			{
				$this->load->view('templates/front_header',$data);
				$this->load->view('templates/register/faculty',$data);
				$this->load->view('templates/front_footer',$data);
			}
			else
			{
				if($this->Faculty_model->sendEmailAndRegister($data))
				{
					array_push($data['error'], 'Registration SUCCESS! Password has been sent to your email ID. Please check your mail and then login.');
				}
				else
				{
					array_push($data['error'], 'Some Error Occurred. Please Try Again'); //Error handling on duplicate email left and has to be done later
				}
				$this->load->view('templates/front_header',$data);
				$this->load->view('templates/register/faculty',$data);
				$this->load->view('templates/front_footer',$data);
			}
		}
		else
		{
			$this->load->view('templates/front_header',$data);
			$this->load->view('templates/register/faculty',$data);
			$this->load->view('templates/front_footer',$data);
		}
	}

	public function mentor()
	{
		$this->load->model('Mentor_model');
		$data['title']="Register | Mentor";
		if($this->input->post())
		{
			//Need not apply TRUE tags to every post field since the global XSS has been set to true
			$data['initials']=$this->input->post('initials');
			$data['name']=$this->input->post('name');
			$data['phone']=$this->input->post('phone');
			$data['email']=$this->input->post('email');
			$data['company']=$this->input->post('company');
			/*Now check for every error*/
			$data['error']=array();
			$this->load->helper('email');
			/*Convert the name into title case using javascript*/
			if(!valid_email($data['email']))
				array_push($data['error'], 'The email field cannot be empty!');
			if($this->Default_model->isEmpty($data['initials']))
				array_push($data['error'], 'The initials cannot be left empty!');
			if($this->Default_model->isEmpty($data['name']))
				array_push($data['error'], 'The name field cannot be left empty!');
			if($this->Default_model->isEmpty($data['company']))
				array_push($data['error'], 'The company field cannot be left empty!');
			if($this->Default_model->isEmpty($data['phone']))
				array_push($data['error'], 'The Phone field cannot be left empty!');
			if(isset($data['error'][0]))
			{
				$this->load->view('templates/front_header',$data);
				$this->load->view('templates/register/mentor',$data);
				$this->load->view('templates/front_footer',$data);
			}
			else
			{
				if($this->Mentor_model->sendEmailAndRegister($data))
				{
					array_push($data['error'], 'Registration SUCCESS! Password has been sent to your email ID. Please check your mail and then login.');
				}
				else
				{
					array_push($data['error'], 'Some Error Occurred. Please Try Again'); //Error handling on duplicate email left and has to be done later
				}
				$this->load->view('templates/front_header',$data);
				$this->load->view('templates/register/mentor',$data);
				$this->load->view('templates/front_footer',$data);
			}
		}
		else
		{
			$this->load->view('templates/front_header',$data);
			$this->load->view('templates/register/mentor',$data);
			$this->load->view('templates/front_footer',$data);
		}
	}
	//Sample function to test PHP Mailer

	public function sendmail()
	{
		$this->Default_model->send_mail('arushngpl16@gmail.com','subject','body');
	}

}
