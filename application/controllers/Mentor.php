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
}
