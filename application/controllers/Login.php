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
		$this->load->view('templates/front_header',$data);
		$this->load->view('templates/login/student',$data);
		$this->load->view('templates/front_footer',$data);
	}

	public function faculty()
	{
		$data['title']="Login | Faculty";
		$this->load->view('templates/front_header',$data);
		$this->load->view('templates/login/faculty',$data);
		$this->load->view('templates/front_footer',$data);
	}

	public function mentor()
	{
		$data['title']="Login | Mentor";
		$this->load->view('templates/front_header',$data);
		$this->load->view('templates/login/mentor',$data);
		$this->load->view('templates/front_footer',$data);
	}


}
