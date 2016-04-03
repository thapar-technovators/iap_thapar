<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

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
			$data['company_data'] = $this->Student_model->company_details();
			$data['company_city_list'] = $this->Student_model->company_city_list();
			$this->load->view('student/student_header');
			$this->load->view('student/home',$data);
			$this->load->view('student/student_footer');
						
		}
			
		 else 
		{
			$this->load->view('templates/front_header');
			$this->load->view('templates/login/'.$page);
			$this->load->view('templates/front_footer');
		}
	}

	public function company_details()
	{
			

	//	$data['company_data'] = array();
	//	$data['company_city_list'] = array();
		
		$data['company_data'] = $this->Student_model->company_details();
		$data['company_city_list'] = $this->Student_model->company_city_list();
		//$data['company_city_list'] = $this->Student_model->company_city_list();
		
		//$data1 = array('cities' => $cities);
		
		if($this->input->post())
		{

			$company['name'] = $this->input->post('inputcompany');
			$company['city'] = $this->input->post('inputcity');
			$company['doj'] = $this->input->post('doj');
			$company['months']= $this->input->post('timeoftraining');
			$company['student_email'] = $_SESSION["uid"];
			$data['error']=array();
			
			if($this->Default_model->isEmpty($company['name']))
				array_push($data['error'], array('Please enter company name',0));
			if($this->Default_model->isEmpty($company['city']))
				array_push($data['error'], array('Please enter city name',0));
			if($this->Default_model->isEmpty($company['doj']))
				array_push($data['error'], array('Please enter date of joining',0));
			if($this->Default_model->isEmpty($company['months']))
				array_push($data['error'], array('Please enter training time period in months',0));

			if(isset($data['error'][0]))
			{
				
			}
			else 
			{
				if($this->Student_model->set_company_details($company)){

				array_push($data['error'], array('Company details successfully entered',1));

					
					//$this->session->set_flashdata('q',array('Company details successfully entered',1));
				//	$this->session->set_flashdata('item', array('0' => 'Company details successfully entered','1' => '1'));
				//	redirect('student/company_details','refresh');
				
				}
				else{


				array_push($data['error'], array('These details already exists',1));
			
					//$this->session->set_flashdata('q',array('Incorrect company details!',0));
					//redirect('student/company_details','refresh');
				}
			}
		}
		//else
		//{
		//	array_push($data['error'], array('post data not recieved',0));
		//}
	//	array_push($data['error'],$this->session->flashdata('item'));
		$this->load->view('student/student_header');
		$this->load->view('student/home',$data);
		$this->load->view('student/student_footer');


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
		redirect('login/student', 'refresh');
	}


}
?>