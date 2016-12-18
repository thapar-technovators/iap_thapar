<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mentor extends CI_Controller {

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
		$this->load->model('Mentor_model');
		if(!isset($_SESSION["user_type"]) || $_SESSION["user_type"] != "Mentor")
		{
			$this->session->unset_userdata('user_type');
			$this->session->unset_userdata('uid');
			$this->session->unset_userdata('full_name');
			$this->load->view('templates/front_header');
			$this->load->view('templates/index/Mentor');
			$this->load->view('templates/front_footer');
		}
	}

	public function index($page = 'mentor')
	{
		if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "Mentor")
		{
			$this->load->view('mentor/mentor_header');
			$this->load->view('mentor/home');
			$this->load->view('mentor/mentor_footer');
		} else 
		{
			$this->load->view('templates/front_header');
			$this->load->view('templates/login/'.$page);
			$this->load->view('templates/front_footer');
		}
	}

	public function change_password(){


		if($this->input->post()){

		$pass['old'] = $this->input->post('oldpass');
		$pass['new'] = $this->input->post('newpass');
		$pass['confirm'] = $this->input->post('confirmpass');
		$pass['email'] = $this->session->userdata('uid');
		$data['error']=array();

		if($pass['new']!=$pass['confirm'])
			array_push($data['error'], array('Confirm Password does not match with the New Password',0));
		else{

		if($this->Mentor_model->change_password($pass))
			array_push($data['error'], array('Password changed successfully!',1));
		else
			array_push($data['error'], array("Some error occurred!Please try again",0));
		}

			$this->load->view('mentor/mentor_header');
			$this->load->view('mentor/change_password',$data);
			$this->load->view('mentor/mentor_footer');
		}
		else{
			$this->load->view('mentor/mentor_header');
			$this->load->view('mentor/change_password');
			$this->load->view('mentor/mentor_footer');
    	}
	}

	public function view_students($page='view_students')
	{
		$data['heading']="Registered Students";
		$data['students']=$this->Mentor_model->getStudents();
		$this->load->view('mentor/mentor_header', $data);
        $this->load->view('mentor/' . $page , $data);
        $this->load->view('mentor/mentor_footer');
	}

	public function logout()
	{
		$this->session->unset_userdata('user_type');
		$this->session->unset_userdata('uid');
		$this->session->unset_userdata('full_name');
		$this->session->sess_destroy();
		//$this->load->view('templates/front_header');
		//$this->load->view('templates/index.php');
		//$this->load->view('templates/front_footer');
		redirect('login/mentor', 'refresh');
	}

	public function feedback(){
		$this->load->helper(array('form', 'url')); 
		$student_data = $this->Mentor_model->getStudents();


		$data['heading']="Feedback Students";
		$this->load->view('mentor/mentor_header', $data);
        $this->load->view('mentor/feedback_form' , $data);
        $this->load->view('mentor/mentor_footer');
	}
}
