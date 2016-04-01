<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class faculty extends CI_Controller {

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
		$this->load->model('Faculty_model');
		if(!isset($_SESSION["user_type"]) || $_SESSION["user_type"] != "Faculty")
		{
			$this->session->unset_userdata('user_type');
			$this->session->unset_userdata('uid');
			$this->session->unset_userdata('full_name');
			$this->load->view('templates/front_header');
			$this->load->view('templates/index');
			$this->load->view('templates/front_footer');
		}
	}

	public function index($page = 'faculty')
	{
		if(isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "Faculty")
		{
			$this->load->view('faculty/faculty_header');
			$this->load->view('faculty/home');
			$this->load->view('faculty/faculty_footer');
		} else 
		{
			$this->load->view('templates/front_header');
			$this->load->view('templates/login/'.$page);
			$this->load->view('templates/front_footer');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user_type');
		$this->session->unset_userdata('uid');
		$this->session->unset_userdata('full_name');
		//$this->load->view('templates/front_header');
		//$this->load->view('templates/index.php');
		//$this->load->view('templates/front_footer');
		redirect('login/faculty', 'refresh');
	}

	public function city_preferences()
	{
		$cities = array();
		$cities = $this->Faculty_model->cityfetch();
		$data1 = array('cities' => $cities);
		$this->load->view('faculty/faculty_header');
		$this->load->view('faculty/city',$data1);
		$this->load->view('faculty/faculty_footer');
		if($this->input->post())
		{
		}
	}
}
