<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		$data['ip_address']=$this->input->ip_address();
		$data['user_agent']=$this->input->user_agent();
		$this->load->view('templates/front_header');
		$this->load->view('templates/index',$data);
		$this->load->view('templates/front_footer');
	}
	public function message_admin()
	{
		$data['ip_address']=$this->input->ip_address();
		$data['user_agent']=$this->input->user_agent();
		if($this->input->post())
		{
			$data['name']=$this->input->post('name');
			$data['email']=$this->input->post('email');
			$data['subject']=$this->input->post('subject');
			$data['message']=$this->input->post('message');
			if($this->Default_model->message_admin($data))
			{
				$data['message']="Message has been sent successfully";
			}
			else
			{
				$data['message']="Sorry! Your message could not be sent";
			}	
			$this->load->view('templates/front_header');
			$this->load->view('templates/index',$data);
			$this->load->view('templates/front_footer');
		}
		else
		{
			$this->load->view('templates/front_header');
			$this->load->view('templates/index',$data);
			$this->load->view('templates/front_footer');
		}
	}

}
