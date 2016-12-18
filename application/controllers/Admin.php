<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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


/*Default Constructor for the admin controller*/
	function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
		$this->load->model('Default_model');
		$this->load->model('Admin_model');
		session_regenerate_id(true);
	}

/* This function is the default controller*/
	public function index($page = 'home') {
        if (!file_exists(APPPATH . '/views/admin/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        $this->checkSession();
        $data['title'] = "Dashboard Home | Administrator";
        $this->load->view('admin/admin_header', $data);
        $this->load->view('admin/' . $page);
        $this->load->view('admin/admin_footer');
    }


/* This function checks whether the user is logged in and if he is a different type of user than the admin, it redirects to that controller*/
	public function checkSession()
	{
		if ($this->session->has_userdata('uid')) 
		{
            if ($this->session->userdata('user_type')!= 'admin') 
            {
                redirect($this->session->userdata('user_type'),'refresh');
                die();
            }
        }
        else
        {
        	redirect('login','refresh');
        }
	}

/*This function is used to view all the students by the admin*/
	public function view_students($page='view_students')
	{
		$data['heading']="Registered Students";
		$data['students']=$this->Admin_model->getStudents();
		$this->load->view('admin/admin_header', $data);
        $this->load->view('admin/' . $page , $data);
        $this->load->view('admin/admin_footer');
	}

/*This function is used to view all the faculty members by the admin*/
	public function view_faculty($page='view_faculty')
	{
		$data['heading']="Registered Faculty";
		$data['faculty']=$this->Admin_model->getFaculty();
		$this->load->view('admin/admin_header', $data);
        $this->load->view('admin/' . $page , $data);
        $this->load->view('admin/admin_footer');
	}

/*This function is used to view all the industry mentors by the admin*/
	public function view_mentors($page='view_mentors')
	{
		$data['heading']="Registered Industry Mentors";
		$data['mentors']=$this->Admin_model->getMentors();
		$this->load->view('admin/admin_header', $data);
        $this->load->view('admin/' . $page , $data);
        $this->load->view('admin/admin_footer');
	}

/*This function is used to send email to all mentors/students/faculty registered*/
	public function send_email($page='send_email')
	{
		$data['heading']="Email Users";
		if($this->input->post())
		{
			$data['usertype'] = $this->input->post('usertype');
			$data['subject'] = $this->input->post('subject');
			$data['message'] = $this->input->post('message');
			$emails=$this->Admin_model->getEmail($data['usertype']);
			$data['emails']=$emails;
			$res=true;
			$count=0;
			foreach($emails as $em)
			{
				if(!$this->Admin_model->send_mail($em['email'],$data['subject'],$data['message']))
					$res=false;
				else
					$count++;
			}
			$data['error']=array();
			if($res)
				array_push($data['error'], array("Email suscessfully sent",1));
			else
			{
				array_push($data['error'], array("There was an error sending email. The email has been sent to $count candidates instead of count($emails) candidates",0));
			}
			$this->load->view('admin/admin_header', $data);
	        $this->load->view('admin/' . $page , $data);
	        $this->load->view('admin/admin_footer');	
		}
		else
		{
			$this->load->view('admin/admin_header', $data);
        	$this->load->view('admin/' . $page , $data);
        	$this->load->view('admin/admin_footer');
		}
	}


	public function edit_student($rollno)
	{
		$data['heading']="Change details for ".$rollno;
		$data['student_detail']=$this->Admin_model->getStudentDetail($rollno);
		$data['training_detail']=$this->Admin_model->getTrainingDetail($rollno);
		$this->load->view('admin/admin_header', $data);
        $this->load->view('admin/edit_student', $data);
        $this->load->view('admin/admin_footer');
	}

/*This function logs out the desired user and deletes all the session and user data*/
	public function logout()
	{
		$this->session->unset_userdata('user_type');
		$this->session->unset_userdata('uid');
		$this->session->unset_userdata('full_name');
		$this->session->sess_destroy();
		//$this->load->view('templates/front_header');
		//$this->load->view('templates/index.php');
		//$this->load->view('templates/front_footer');
		redirect('login/admin', 'refresh');
	}

	public function allot_student()
	{
		$data['heading']="Allot Students";
		$data['faculty']=$this->Admin_model->getFaculty();
		$data['tagged']=$this->Admin_model->getTagged();
		$data['untagged']=$this->Admin_model->getUntagged();
		$this->load->view('admin/admin_header', $data);
        $this->load->view('admin/allot_student' , $data);
        $this->load->view('admin/admin_footer');
	}

	public function allot_city($regid='')
	{
		$data['heading']="Assign city to Faculty";
		if($regid=="")
		{
			$data['faculty']=$this->Admin_model->getFaculty();
			$data['trainingdata']=$this->Admin_model->getTrainingAll();
			$this->load->view('admin/admin_header', $data);
	        $this->load->view('admin/view_faculty_city' , $data);
	        $this->load->view('admin/admin_footer');
		}
	}

	public function reports()
	{
		$data['heading']="Download all results in Excel Files";
		$this->load->view('admin/admin_header', $data);
	    $this->load->view('admin/download_reports' , $data);
	    $this->load->view('admin/admin_footer');
	}

	public function download($page)
	{
	        $this->load->view('admin/download'.$page);   
 	}


}
?>