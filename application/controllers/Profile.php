<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
	}
	public function index($page = 'student')
	{
		$data['title']="Login | Student";
		$this->load->view('templates/front_header',$data);
		$this->load->view('templates/profile/'.$page);
		$this->load->view('templates/front_footer',$data);
	}

	public function student()
	{
		$this->load->model('Student_model');
		$this->load->model('Default_model');
		$data['title']=" Login | Student";
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
					$this->load->view('templates/profile/student',$data);
					
				}
				else
				{
					array_push($data['error'], 'Incorrect username or password!'); //Error handling on duplicate email left and has to be done later
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

}
