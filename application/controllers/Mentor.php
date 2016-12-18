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

		$data['students']=$this->Mentor_model->getStudents($_SESSION["uid"]);
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
		

		$data['students'] = $this->Mentor_model->getStudents_nofeedback($_SESSION["uid"]);;
		

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
			$feedback['email'] = $details->email;

			
			$data['error']=array();
			
			

			if(isset($data['error'][0]))
			{
				
			}
			else 
			{
				if($this->Mentor_model->set_student_feedback($feedback)){

				array_push($data['error'], array('Student feedback successfully entered',1));

					
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
			redirect('mentor/feedback','refresh');
		}

		$data['heading']="Feedback Students";
		$this->load->view('mentor/mentor_header', $data);
        $this->load->view('mentor/feedback_form' , $data);
        $this->load->view('mentor/mentor_footer');
	}
	
}
