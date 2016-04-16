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

	public function mentor(){
		$data['title']="Student|Company Details";
		$student_id = $_SESSION["uid"];
		$data['companies'] = $this->Student_model->get_companies_of_student($student_id);
		if($this->input->post()){
			$mentor_id = $this->input->post('mentorid');
			$company = $this->input->post('company_name');
			$data['error'] = array();
			if($this->Student_model->mentor_exists($mentor_id)){
				if($this->Student_model->add_mentor($student_id,$mentor_id,$company)){
					array_push($data['error'], array("Mentor successfully added",1));
				}
				else{
					array_push($data['error'], array("Some error occurred",0));

				}	
			}
			else{
				array_push($data['error'], array("This id is not registered yet. Kindly request your mentor to register himself with IAP.",0));
			}
			

		}

		$this->load->view('student/student_header');
		$this->load->view('student/add_mentor',$data);
		$this->load->view('student/student_footer');
	}

	
	public function submit_joining()
	{

		$this->load->helper(array('form', 'url')); 
		$student_data = $this->Student_model->details($_SESSION["uid"]);
		$roll = $student_data->roll_number;
		$data['companies'] = $this->Student_model->get_companies_joining_report($_SESSION["uid"]);
		if(count($data['companies'])!=0){
			$data['access'] = 1;
		$data['error'] = '';
	if($this->input->post()){
		$company_name = $this->input->post('company_name');
		$num = $this->Student_model->get_company_num($roll,$company_name);
		$filename = $roll.'jr'.$num;
		$config['file_name'] = $filename;
		$config['upload_path']   = './uploads/joining_report/'; 
        $config['allowed_types'] = 'pdf'; 
        $config['max_size']      = 10000000;
        $config['max_width']     = 4000;
        $config['max_height']    = 4000;
        $this->load->library('upload', $config);	
        if ( ! $this->upload->do_upload('userfile')) {
        	$error = array('error' => $this->upload->display_errors()); 
        	//$data['error'] = 'Choose a valid file! ';
        	if($_FILES["userfile"]["name"]=='')
        		$data['error']='Choose a valid file! ';
        	else
        		$data['error']='Some error occurred.Please try again! ' ;
            $this->load->view('student/student_header');
			$this->load->view('student/upload_joining',$data);
			$this->load->view('student/student_footer');
         //   $this->load->view('upload_document', $error); 
         }		
        else{ 
           // $data = array('upload_data' => $this->upload->data());
            $this->session->set_flashdata('file1','success');
            //$data['file1'] = 'success';
            if($this->Student_model->submit_joining($roll,$company_name,$filename))
            	$this->session->set_flashdata('error','successfully uploaded!');
            	//$data['error']='successfully uploaded!'.count($data['companies']);
            else
            	$data['error']='some error occurred ' ;
            redirect('student/submit_joining', 'refresh');
          	//$this->load->view('student/student_header');
            //$this->load->view('student/upload_joining', $data);
            //$this->load->view('student/student_footer');
         	} 
    }
    else{
    	$data['error'] = $this->session->flashdata('error');
    	$data['file1'] = $this->session->flashdata('file1');
     	$this->load->view('student/student_header');
		$this->load->view('student/upload_joining',$data);
		$this->load->view('student/student_footer');
    	}
    }
    else{
    	$data['access'] = 0;
    	$this->load->view('student/student_header');
		$this->load->view('student/upload_joining',$data);
		$this->load->view('student/student_footer');
    }
	}
//2300102
//2215182
	public function submit_intermid()
	{
		
		$this->load->helper(array('form', 'url')); 
		$student_data = $this->Student_model->details($_SESSION["uid"]);
		$roll = $student_data->roll_number;
		$data['companies'] = $this->Student_model->get_companies_intermid_report($_SESSION["uid"]);
		if(count($data['companies'])!=0){
			$data['access'] = 1;
		$data['error'] = '';
	if($this->input->post()){
		$company_name = $this->input->post('company_name');
		$num = $this->Student_model->get_company_num($roll,$company_name);
		$filename = $roll.'ir'.$num;
		$config['file_name'] = $filename;
		$config['upload_path']   = './uploads/intermid_report/'; 
        $config['allowed_types'] = 'pdf'; 
        $config['max_size']      = 10000000;
        $config['max_width']     = 4000;
        $config['max_height']    = 4000;
        $this->load->library('upload', $config);	
        if ( ! $this->upload->do_upload('userfile')) {
        	$error = array('error' => $this->upload->display_errors()); 
        	//$data['error'] = 'Choose a valid file! ';
        	if($_FILES["userfile"]["name"]=='')
        		$data['error']='Choose a valid file! ';
        	else
        		$data['error']='Some error occurred.Please try again! ' ;
            $this->load->view('student/student_header');
			$this->load->view('student/upload_intermid',$data);
			$this->load->view('student/student_footer');
         //   $this->load->view('upload_document', $error); 
         }		
        else{ 
           // $data = array('upload_data' => $this->upload->data());
            $this->session->set_flashdata('file1','success');
            //$data['file1'] = 'success';
            if($this->Student_model->submit_intermid($roll,$company_name,$filename))
            	$this->session->set_flashdata('error','successfully uploaded!');
            	//$data['error']='successfully uploaded!'.count($data['companies']);
            else
            	$data['error']='some error occurred ' ;
            redirect('student/submit_intermid', 'refresh');
          	//$this->load->view('student/student_header');
            //$this->load->view('student/upload_intermid', $data);
            //$this->load->view('student/student_footer');
         	} 
    }
    else{
    	$data['error'] = $this->session->flashdata('error');
    	$data['file1'] = $this->session->flashdata('file1');
     	$this->load->view('student/student_header');
		$this->load->view('student/upload_intermid',$data);
		$this->load->view('student/student_footer');
    	}
    }
    else{
    	$data['access'] = 0;
    	$this->load->view('student/student_header');
		$this->load->view('student/upload_intermid',$data);
		$this->load->view('student/student_footer');
    }
}

	public function submit_final()
	{

		
		$this->load->helper(array('form', 'url')); 
		$student_data = $this->Student_model->details($_SESSION["uid"]);
		$roll = $student_data->roll_number;
		$data['companies'] = $this->Student_model->get_companies_final_report($_SESSION["uid"]);
		if(count($data['companies'])!=0){
			$data['access'] = 1;
		$data['error'] = '';
	if($this->input->post()){
		$company_name = $this->input->post('company_name');
		$num = $this->Student_model->get_company_num($roll,$company_name);
		$filename = $roll.'fr'.$num;
		$config['file_name'] = $filename;
		$config['upload_path']   = './uploads/final_report/'; 
        $config['allowed_types'] = 'pdf'; 
        $config['max_size']      = 10000000;
        $config['max_width']     = 4000;
        $config['max_height']    = 4000;
        $this->load->library('upload', $config);	
        if ( ! $this->upload->do_upload('userfile')) {
        	$error = array('error' => $this->upload->display_errors()); 
        	//$data['error'] = 'Choose a valid file! ';
        	if($_FILES["userfile"]["name"]=='')
        		$data['error']='Choose a valid file! ';
        	else
        		$data['error']='Some error occurred.Please try again! ' ;
            $this->load->view('student/student_header');
			$this->load->view('student/upload_final',$data);
			$this->load->view('student/student_footer');
         //   $this->load->view('upload_document', $error); 
         }		
        else{ 
           // $data = array('upload_data' => $this->upload->data());
            $this->session->set_flashdata('file1','success');
            //$data['file1'] = 'success';
            if($this->Student_model->submit_final($roll,$company_name,$filename))
            	$this->session->set_flashdata('error','successfully uploaded!');
            	//$data['error']='successfully uploaded!'.count($data['companies']);
            else
            	$data['error']='some error occurred ' ;
            redirect('student/submit_final', 'refresh');
          	//$this->load->view('student/student_header');
            //$this->load->view('student/upload_final', $data);
            //$this->load->view('student/student_footer');
         	} 
    }
    else{
    	$data['error'] = $this->session->flashdata('error');
    	$data['file1'] = $this->session->flashdata('file1');
     	$this->load->view('student/student_header');
		$this->load->view('student/upload_final',$data);
		$this->load->view('student/student_footer');
    	}
    }
    else{
    	$data['access'] = 0;
    	$this->load->view('student/student_header');
		$this->load->view('student/upload_final',$data);
		$this->load->view('student/student_footer');
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

		if($this->Student_model->change_password($pass))
			array_push($data['error'], array('Password changed successfully!',1));
		else
			array_push($data['error'], array("Some error occurred!Please try again",0));
		}

		$this->load->view('student/student_header');
        $this->load->view('student/change_password',$data); 
        $this->load->view('student/student_footer');
		}
		else{
			$this->load->view('student/student_header');
        	$this->load->view('student/change_password'); 
        	$this->load->view('student/student_footer');
    	}
	}

	

}
?>