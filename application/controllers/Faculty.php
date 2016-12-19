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

	public function view_students()
	{
		$email = $this->session->userdata('uid');
		$data['student_alotted'] = 'false';
		$data['heading']="View Students";

		if($this->Faculty_model->student_fetch($email))
		{
			$data['student_alotted'] = 'true';
			$data['students']=$this->Faculty_model->student_fetch($email);
			
		} else
		{
			$data['student_alotted'] = 'false';
		}

		$this->load->view('faculty/faculty_header');
		$this->load->view('faculty/students',$data);
		$this->load->view('faculty/faculty_footer');
	}

	public function evaluation(){


		$this->load->helper(array('form', 'url')); 
		$this->load->model('Mentor_model');
		$data['students'] = $this->Faculty_model->getStudents_noevaluation();
		$data['company_data'] = $this ->Faculty_model->company_details();

		if($this->input->post())
		{
			$feedback['roll_number'] = $this->input->post('roll_number');
			$details = $this->Mentor_model->student_details($feedback['roll_number']);
			$feedback['q1'] = $this->input->post('q1');
			$feedback['q2'] = $this->input->post('q2');
			$feedback['q3'] = $this->input->post('q3');
			$feedback['q4'] = $this->input->post('q4');
			$feedback['q5'] = $this->input->post('q5');
			$feedback['q6'] = $this->input->post('q6');
			$feedback['q7'] = $this->input->post('q7');
			$feedback['q8'] = $this->input->post('q8');
			$feedback['q9'] = $this->input->post('q9');
			$feedback['q10'] = $this->input->post('q10');
			$feedback['q11'] = $this->input->post('q11');
			$feedback['q12'] = $this->input->post('q12');
			$feedback['q13'] = $this->input->post('q13');
			$feedback['q14'] = $this->input->post('q14');
			$feedback['q15'] = $this->input->post('q15');
			$feedback['q16'] = $this->input->post('q16');
			$feedback['q17'] = $this->input->post('q17');
			$feedback['q18'] = $this->input->post('q18');
			$feedback['q19'] = $this->input->post('q19');
			$feedback['q20'] = $this->input->post('q20');
			$feedback['email'] = $details->email;
			$feedback['company'] = $this->input->post('company');
			$data['error']=array();
			if(isset($data['error'][0]))
			{
				
			}
			else 
			{
				if($this->Faculty_model->set_student_marks($feedback)){

				array_push($data['error'], array('Student marks successfully entered',1));

					
					//$this->session->set_flashdata('q',array('Company details successfully entered',1));
				//	$this->session->set_flashdata('item', array('0' => 'Company details successfully entered','1' => '1'));
				//	redirect('student/company_details','refresh');
				
				}
				else{


				array_push($data['error'], array('Some error occurred',0));
			
					//$this->session->set_flashdata('q',array('Incorrect company details!',0));
					//redirect('student/company_details','refresh');
				}
			}
			redirect('faculty/evaluation','refresh');
		}





		$data['heading']="Evaluate Students";
		$this->load->view('faculty/faculty_header');
		$this->load->view('faculty/evaluation',$data);
		$this->load->view('faculty/faculty_footer');
	}

public function download_files(){
		$student_data = $this->Student_model->details($_SESSION["uid"]);
		$roll = $student_data->roll_number;
		$data['filenames'] = $this->Student_model->getallreports($roll);
		$this->load->view('faculty/student_header');
        $this->load->view('faculty/download_files',$data); 
        $this->load->view('faculty/student_footer');
	}

	function download_function(){
    	$this->load->helper('download');
    	//$name = preg_replace("/[^a-zA-Z0-9.]+/", "", $this->uri->segment(3));
    	$data = file_get_contents('./uploads/joining_report/'.$this->uri->segment(3)); // Read the file's contents
   		// $name = $this->uri->segment(3);
   		//echo 'hello';

    	//$name = "yoo.pdf";
    	force_download($name, $data);
	}
}
