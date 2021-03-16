<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
			 $this->load->model('Admin_model');
			 $this->load->model('Student_model');
            $this->load->helper('form');
            $this->load->library('form_validation','session');
	}
	
	public function index()
	{
		//$data['allteachers']=$this->Student_model->all_students();
		$this->load->view('pages/login');
	}

	public function userlogin() {
        if(isset($_POST['login']))
        {
            $this->load->helper(array('form', 'url'));

            $username = $this->input->post('username');
            $password= $this->input->post('password');
            //$password= md5($password);

            //$passwordencrypted= md5($password);
            
            $result = $this->Admin_model->getUserLogInDetails($username, $password,'staff');
            //True that user details
            if ($result->num_rows()>0) {
                         
                 foreach ($result->result() as $row) {
                    $usersessiondata = array(
                        'id' => $row->id,
                        'firstname' => $row->firstname,
                        'lastname' => $row->lastname,
                        'username' => $row->username,
                        'email' => $row->email,
                        'role' => $row->role,
                         'photo'=>$row->photo
					);
					$this->session->set_userdata('logged_in', $usersessiondata);
					$session_data = $this->session->userdata('logged_in');
					$userrole=$session_data['role'];
                 }//end of foreach

               
				 redirect(base_url('staffhome'));
            }else{
				$result = $this->Admin_model->getUserLogInDetails($username, $password,'students');
			if ($result->num_rows()>0) {
				foreach ($result->result() as $row) {
                    $usersessiondata = array(
                        'id' => $row->Id,
                        'firstname' => $row->FirstName,
                        'lastname' => $row->LastName,
                        'username' => $row->username,
                        'email' => $row->studentsEmail,
                        'role' => "student",
                        'program'=>$row->Program,
                        'studentnumber'=>$row->StudentNumber,
                        'regnumber'=>$row->RegNumber,
                        'researchtopic'=>$row->ResearchTopic,
                        'supervisor'=>$row->supervisor,
                        'phone'=>$row->studentsPhone,
                        'sem'=>$row->Semester,
                        'studyyear'=>$row->Year,
                        'photo'=>$row->photo
                      );
					$this->session->set_userdata('studentlogged_in', $usersessiondata);
					$session_data = $this->session->userdata('logged_in');
					$userrole=$session_data['role'];
				 }
				   redirect(base_url('studenthome'));
				
			}else{
                $this->session->set_flashdata('loginpageinfo', 'UserName or Password is wrong, please use the right credentials.');
                redirect(base_url());
			}
        } 
        // else{
        //             $this->session->set_flashdata('error', 'Sorry, this Account has been DEACTIVATED.');
        //             redirect('/Welcome');
        //         }
        //     }
        //         else{
        //         $this->session->set_flashdata('error', 'UserName or Password is wrong, please try again.');
        //         redirect('/Welcome');
        //     }
	}
  }

	  function home(){
	 
		$data['allteachers']=$this->Student_model->all_students();
		$this->load->view('pages/home',$data);
	   }

	   public function logout() {
		unset($_SESSION['logged_in']);
		unset($_SESSION['studentlogged_in']);
	     $this->session->set_flashdata('loginpageinfo', 'You have successfully logged out');
        redirect(base_url());
    }

}