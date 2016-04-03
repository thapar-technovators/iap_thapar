<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		$this->output->enable_profiler(TRUE);
		$this->load->model('Default_model');
		$this->load->helper('url');
	}
	public function index($page = 'student')
	{
		$data['title']="Login | Student";
		$this->load->view('templates/front_header',$data);
		$this->load->view('templates/login/'.$page);
		$this->load->view('templates/front_footer',$data);
	}

	public function student()
	{
		$data['title']="Login | Student";
		//$this->load->view('templates/front_header',$data);
		//$this->load->view('templates/login/student',$data);
		//$this->load->view('templates/front_footer',$data);
		$this->load->model('Student_model');
//		$this->load->model('Default_model');
		if($this->input->post())
		{
			$data['email'] = $this->input->post('registration');
			$data['password'] = $this->input->post('password');
			$this->load->helper('email');	
			$data['error']=array();
			if($this->Default_model->isEmpty($data['email']))
				array_push($data['error'], 'Please enter your Email!');
			if($this->Default_model->isEmpty($data['password']))
				array_push($data['error'], 'Please enter your Password!');
			if(!valid_email($data['email']))
				array_push($data['error'], 'The email is not in proper format!');
			if(isset($data['error'][0]))
			{
				$this->load->view('templates/front_header',$data);
				$this->load->view('templates/login/student',$data);
				$this->load->view('templates/front_footer',$data);
			}
			else
			{
				if($this->Student_model->authenticate_student($data))
				{

					$this->load->library('session');
					$this->session->set_userdata('user_type', 'Student');
					$this->session->set_userdata('uid', $data['email']);
					

					$data_fetch = array();
					$data_fetch = $this->Student_model->details($data['email']);
					$fname= $data_fetch->name; //fname = full name (initials + name)
					$this->session->set_userdata('full_name', $fname);
				//	$this->load->library('../controllers/student');
				//	$this->student->company_details();

					//$company_data = array();
					
					//$data1 = array('cities' => $cities);
					//$this->load->view('student/student_header');
					//$this->load->view('student/home',$data);
					//$this->load->view('student/student_footer');
					redirect('student', 'refresh');
					
				}
				else
				{
					array_push($data['error'], array('Incorrect username or password!',0));  //Error handling on duplicate email left and has to be done later
					$this->load->view('templates/front_header',$data);
					$this->load->view('templates/login/student',$data);
					$this->load->view('templates/front_footer',$data);
				}
				
			}
		}
		else
		{
			$this->load->view('templates/front_header',$data);
			$this->load->view('templates/login/student',$data);
			$this->load->view('templates/front_footer',$data);
		}

	}


	public function faculty()
	{
		$data['title']="Login | Faculty";
		
		$this->load->model('Faculty_model');
		if($this->input->post())
		{
			$data['registration_id']=$this->input->post('registration');
			$data['password']=$this->input->post('pass');

			/*Now check for every error*/
			$data['error']=array();
			$this->load->helper('email');	
			if($this->Default_model->isEmpty($data['registration_id']))
				array_push($data['error'], 'Please enter your registration id!');
			if($this->Default_model->isEmpty($data['password']))
				array_push($data['error'], 'Please enter your Password!');
			if(!valid_email($data['registration_id']))
				array_push($data['error'], 'The email is not in proper format!');
			if(isset($data['error'][0]))
			{
				$this->load->view('templates/front_header',$data);
				$this->load->view('templates/login/faculty',$data);
				$this->load->view('templates/front_footer',$data);
			}
			else 
			{
				
				if($this->Faculty_model->auth($data))
				{
					$this->session->set_userdata('user_type', 'Faculty');	
					$this->session->set_userdata('uid', $data['registration_id']);	//currently all Unique IDentification are emails only
					$data_fetch = array();
					$data_fetch = $this->Faculty_model->details($data);
					$fname= $data_fetch['initials']." ".$data_fetch['fname']; //fname = full name (initials + name)
					$this->session->set_userdata('full_name', $fname);
					//$this->load->view('faculty/faculty_header');
					//$this->load->view('faculty/home');
					//$this->load->view('faculty/faculty_footer');
					redirect('faculty', 'refresh');
				}
				else
				{
					array_push($data['error'], 'Some Error Occurred. Please Try Again'); 
					$this->load->view('templates/front_header',$data);
					$this->load->view('templates/login/faculty',$data);
					$this->load->view('templates/front_footer',$data);
				}
			}
		}
		else
		{
			
			$this->load->view('templates/front_header',$data);
			$this->load->view('templates/login/faculty',$data);
			$this->load->view('templates/front_footer',$data);
		}
	}



	public function mentor()
	{
		$data['title']="Login | Mentor";
		$this->load->model('Mentor_model');

		if($this->input->post())
		{
			$data['registration_id']=$this->input->post('registration');
			$data['password']=$this->input->post('password');

			/*Now check for every error*/
			$data['error']=array();
			$this->load->helper('email');	
			if($this->Default_model->isEmpty($data['registration_id']))
				array_push($data['error'], 'Please enter your registration id!');
			if($this->Default_model->isEmpty($data['password']))
				array_push($data['error'], 'Please enter your Password!');
			if(!valid_email($data['registration_id']))
				array_push($data['error'], 'The email is not in proper format!');
			if(isset($data['error'][0]))
			{
				$this->load->view('templates/front_header',$data);
				$this->load->view('templates/login/mentor',$data);
				$this->load->view('templates/front_footer',$data);
			}
			else 
			{
				
				if($this->Mentor_model->auth($data))
				{
					$this->session->set_userdata('user_type', 'Mentor');	
					$this->session->set_userdata('uid', $data['registration_id']);	//currently all Unique IDentification are emails only
					$data_fetch = array();
					$data_fetch = $this->Mentor_model->details($data);
					$name= $data_fetch['initials']." ".$data_fetch['name']; //fname = full name (initials + name)
					$this->session->set_userdata('full_name', $name);
					redirect('mentor', 'refresh');
				}
				else
				{
					array_push($data['error'], 'Some Error Occurred. Please Try Again'); 
					$this->load->view('templates/front_header',$data);
					$this->load->view('templates/login/mentor',$data);
					$this->load->view('templates/front_footer',$data);
				}
			}
		}
		else
		{
			
			$this->load->view('templates/front_header',$data);
			$this->load->view('templates/login/mentor',$data);
			$this->load->view('templates/front_footer',$data);
		}
		
	}

	public function admin()
	{
		$data['title']="Login | Training Coordinator";
		$this->load->model('Admin_model');
		if($this->input->post())
		{
			//Need not apply TRUE tags to every post field since the global XSS has been set to true
			$data['registration_id']=$this->input->post('registration');
			$data['password']=$this->input->post('password');
			/*Now check for every error*/
			$data['error']=array();
			/*Convert the name into title case using javascript*/
			if($this->Default_model->isEmpty($data['registration_id']))
				array_push($data['error'], 'Please enter your registration id!');
			if($this->Default_model->isEmpty($data['password']))
				array_push($data['error'], 'The password field cannot be left empty!');
			if(isset($data['error'][0]))
			{
				$this->load->view('templates/front_header',$data);
				$this->load->view('templates/login/admin',$data);
				$this->load->view('templates/front_footer',$data);
			}
			else
			{
				$data['password']=$this->Admin_model->passwordHash($data['password']);
				if($this->Admin_model->checkLogin($data['registration_id'],$data['password']))
				{
					$this->load->view('admin/admin_header',$data);
					$this->load->view('admin/home',$data);
					$this->load->view('admin/admin_footer',$data);
				}
				else
				{
					array_push($data['error'], 'Incorrect Email ID or Password!');
					$this->load->view('templates/front_header',$data);
					$this->load->view('templates/login/admin',$data);
					$this->load->view('templates/front_footer',$data);
				}
			}
		}
		else
		{
			$this->load->view('templates/front_header',$data);
			$this->load->view('templates/login/admin',$data);
			$this->load->view('templates/front_footer',$data);
		}
	}
	

}
