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
	}
	public function index($page = 'student')
	{
		$data['title']="Register | Student";
		$this->load->view('templates/front_header',$data);
		$this->load->view('templates/register/'.$page,$data);
		$this->load->view('templates/front_footer',$data);
	}


	public function student()
	{
		if($this->input->server('REQUEST_METHOD')=='POST')
		{
			$data['help']=$this->input->post('name');
			$this->load->view('templates/front_header',$data);
		}
		else
		{
			$data['title']="Register | Student";
			$data['branch']=$this->Default_model->getBranches();
			$this->load->view('templates/front_header',$data);
			$this->load->view('templates/register/student',$data);
			$this->load->view('templates/front_footer',$data);
		}
	}

	public function faculty()
	{
		$data['title']="Register | Faculty";
		$this->load->view('templates/front_header',$data);
		$this->load->view('templates/register/faculty',$data);
		$this->load->view('templates/front_footer',$data);
	}

	public function mentor()
	{
		$data['title']="Register | Mentor";
		$this->load->view('templates/front_header',$data);
		$this->load->view('templates/register/mentor',$data);
		$this->load->view('templates/front_footer',$data);
	}
	//Sample function to test PHP Mailer

	public function sendmail()
	{
		$this->Default_model->send_mail('arushngpl16@gmail.com','subject','body');
	}

}
