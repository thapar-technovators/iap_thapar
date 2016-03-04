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
		$this->load->model('Student_model');
		if($this->input->post())
		{
			//Need not apply TRUE tags to every post field since the global XSS has been set to true
			$data['title']="Register | Student";
			$data['branches']=$this->Student_model->getBranches();
			
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
			if(!valid_email($data['email']))
				array_push($data['error'], 'The email field cannot be empty!');
			if($this->Default_model->isEmpty($data['registration']))
				array_push($data['error'], 'Please enter your Roll Number!');
			if($this->Default_model->isEmpty($data['branch']))
				array_push($data['error'], 'The Branch field cannot be left empty!');
			if($this->Default_model->isEmpty($data['semester']))
				array_push($data['error'], 'The Semester field cannot be left empty!');
			if($this->Default_model->isEmpty($data['phone']))
				array_push($data['error'], 'The Phone field cannot be left empty!');
			if($this->Default_model->isEmpty($data['company']))
				array_push($data['error'], 'The Company field cannot be left empty!');
			if($this->Default_model->isEmpty($data['city']))
				array_push($data['error'], 'The City field cannot be left empty!');
			if(isset($data['error'][0]))
			{
				$this->load->view('templates/front_header',$data);
				$this->load->view('templates/register/student',$data);
				$this->load->view('templates/front_footer',$data);
			}
			else
			{
			}
		}
		else
		{
			$data['title']="Register | Student";
			$data['branches']=$this->Student_model->getBranches();
			$this->load->view('templates/front_header',$data);
			$this->load->view('templates/register/student',$data);
			$this->load->view('templates/front_footer',$data);
		}
	}

	public function faculty()
	{
		$data['title']="Register | Faculty";
		$this->load->view('templates/front_header',$data);
		$this->load->view('templates/forgotpassword/faculty',$data);
		$this->load->view('templates/front_footer',$data);
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
