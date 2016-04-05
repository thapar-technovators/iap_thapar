<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faculty extends CI_Controller {

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
			redirect('welcome', 'refresh');
		}
	}

	public function index($page = 'faculty')
	{
		$data1 = array();
		$data1['email'] = $this->session->userdata('uid');
		$data['data'] = $this->Faculty_model->faculty_info_fetch($data1);
		$data['data'] = $data['data'][0];
		$this->load->view('faculty/faculty_header');
		$this->load->view('faculty/home',$data);
		$this->load->view('faculty/faculty_footer');
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
		redirect('login/faculty', 'refresh');
	}

	public function city_preferences()
	{
		$cities = array();
		$cities = $this->Faculty_model->cityfetch();
		$data1 = array('cities' => $cities);
		
		if($this->input->post())
		{
			$data['pref1'] = $this->input->post('pref1');
			$data['pref2'] = $this->input->post('pref2');
			$data['pref3'] = $this->input->post('pref3');
			$data['email'] = $_SESSION["uid"];
			if($this->Faculty_model->city_pref_insert($data)) {
			$this->session->set_flashdata('data', $data);
			$this->session->set_flashdata('success', 1);
			redirect('faculty/city_preferences', 'refresh'); 
			} else {
			$this->session->set_flashdata('data', $data);
			$this->session->set_flashdata('success', 0);
			redirect('faculty/city_preferences', 'refresh'); 
			}
		}
		$data1['data'] = $this->session->flashdata('data');
		$data1['success'] = $this->session->flashdata('success');
		$this->load->view('faculty/faculty_header');
		$this->load->view('faculty/city',$data1);
		$this->load->view('faculty/faculty_footer');
	}

	public function change_password()
	{
		if($this->input->post()){
		$pass = array();
		$pass['old'] = $this->input->post('oldpass');
		$pass['new'] = $this->input->post('newpass');
		$pass['confirm'] = $this->input->post('confirmpass');
		$pass['email'] = $this->session->userdata('uid');
		$data['error']=array();

		if($pass['new']!=$pass['confirm'])
			array_push($data['error'], array('Confirm Password does not match with the New Password',0));
		else{

		if($this->Faculty_model->change_password($pass))
			array_push($data['error'], array('Password changed successfully!',1));
		else
			array_push($data['error'], array('Some error occurred! Please try again',0));
		}

		$this->load->view('faculty/faculty_header');
        $this->load->view('faculty/change_password',$data); 
        $this->load->view('faculty/faculty_footer');
		}
		else{
			$this->load->view('faculty/faculty_header');
        	$this->load->view('faculty/change_password'); 
        	$this->load->view('faculty/faculty_footer');
    	}
	}


}
