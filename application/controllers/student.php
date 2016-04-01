<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class student extends CI_Controller {

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
		$this->load->model('Student_model');
		if(!isset($_SESSION["user_type"]) || $_SESSION["user_type"] != "Student")
		{
			$this->session->unset_userdata('user_type');
			$this->session->unset_userdata('uid');
			$this->session->unset_userdata('full_name');
			$this->load->view('templates/front_header');
			$this->load->view('templates/index');
			$this->load->view('templates/front_footer');
		}
	}

	public function index($page = 'student')
	{
		if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "Student")
		{
			$this->load->view('student/student_header');
			$this->load->view('student/home');
			$this->load->view('student/student_footer');
		} else 
		{
			$this->load->view('templates/front_header');
			$this->load->view('templates/login/'.$page);
			$this->load->view('templates/front_footer');
		}
	}

	public function company_details()
	{
		$company_data = array();
		$data['company_data'] = $this->Student_model->company_details();
		//$data1 = array('cities' => $cities);
		$this->load->view('student/student_header');
		$this->load->view('student/home',$data);
		$this->load->view('student/student_footer');
	//	if($this->input->post())
	//	{
	//	}
	}
	public function logout()
	{
		$this->session->unset_userdata('user_type');
		$this->session->unset_userdata('uid');
		$this->session->unset_userdata('full_name');
		$this->load->view('templates/front_header');
		$this->load->view('templates/index.php');
		$this->load->view('templates/front_footer');
	}


}
?>