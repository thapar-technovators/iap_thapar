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
		$this->output->enable_profiler(TRUE);
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


}
?>