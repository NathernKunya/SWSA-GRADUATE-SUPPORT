<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_controller extends CI_Controller {

	public function __construct()
    {
            parent::__construct();
             $this->load->model('Admin_model');
             $this->load->model('Teacher_model');
             $this->load->model('Student_model');
            $this->load->helper('form');
            $this->load->library('form_validation','session');
	}
	
	public function index()
	{
        $data['addform']="add";
		$this->load->view('pages/addteacherform',$data);
  }
   function home(){
    $data['allstaff']=$this->Teacher_model->selectcount('staff','1=1');
    $data['allmsw']=$this->Teacher_model->selectcount('students',"Program='MSW'");
    $data['allphd']=$this->Teacher_model->selectcount('students',"Program='PhD'");
    $data['allmasspm']=$this->Teacher_model->selectcount('students',"Program='MASSPM'");
    $data['allteachers']=$this->Teacher_model->all_teachers();
    $data['allstudents']=$this->Teacher_model->all_students();
		$this->load->view('pages/home',$data);
	 }
    public function insertStaff(){
        $data['teacheradded']=$this->Teacher_model->insertteacher();
        if($data['teacheradded']){
        
        $this->session->set_flashdata('success', 'Success, Staff member added.');
        }else{
        $this->session->set_flashdata('error', 'Failed, Staff member not added.');
        }
		header('location:'.base_url('allstaff'));
    }

    public function all_teachers()
	{
        $data['allteachers']=$this->Teacher_model->all_teachers();
		$this->load->view('pages/addteacherform',$data);
    }
    
    public function inbox($id=NULL){
      if($id==NULL){
        $data['allmymessages']=$this->Teacher_model->all_mymessages();
      }else{
        $data['mymessage']=$this->Teacher_model->all_mymessages($id);
      }
     
		$this->load->view('pages/inbox',$data);
    }
    public function noticeboard($id=NULL){
     
      if($id==NULL){
        $data['allmymessages']=$this->Teacher_model->noticeboard();
      }else{
        $data['mymessage']=$this->Teacher_model->noticeboard($id);
      }
     
		$this->load->view('pages/noticeboard',$data);
    }

  public function teacher_details($id)
	{
        $data['teacherdetails']=$this->Teacher_model->teacher_details($id);
		$this->load->view('pages/addteacherform',$data);
    }
    
    public function currentsemester()
	   {
      $data['currentsemester']=$this->Teacher_model->currentsemester();
		  $this->load->view('pages/semester',$data);
    }
    public function closesemester($id){
      $currentsemester=$this->Teacher_model->currentsemester();
      $currentsem_id=$currentsemester->id;
      $query="update current_semesters set ended='True' where id='$currentsem_id'";
      $data['updated']=$this->Teacher_model->updatedate($query);
      $this->session->set_flashdata('success', 'Success, Current semester closed. You can start a new semester.');
      redirect('managesemester');
    } 
    public function opensemester(){
      $currentsemester=$this->Teacher_model->currentsemester();
      $currentsem_id=$currentsemester->id;
      if(strcmp($currentsemester->ended,'False')==0){
        $this->session->set_flashdata('success', 'Success, Current semester is not yet closed..');
        redirect('managesemester');
      }else{
        $semester=($currentsemester->semesternumber==1)?2:1;
        $academicyear=($semester!=1)?date('Y').'-'.(date('Y')+1):(date('Y')+1).'-'.(date('Y')+2);
        $date= date('d/m/Y');
        $query = array(
          'semesternumber' => $semester,
          'academicyear' => $academicyear,
          'start_date' => $date,
          'ended'   => 'False'
          
      );
        $data['semesteradded']=$this->Student_model->insertData($query,'current_semesters'); 
        if($data['semesteradded']){
         
           $allstudents=$this->Teacher_model->all_students();
           foreach($allstudents->result() as $row){
            $currentsemester=$this->Teacher_model->currentsemester();
            $semester=$currentsemester->id;
            $student=$row->Id;
            $currentyearofstudy=$row->Year;
          
            $yearofstudy=($currentsemester->semesternumber==1)?($currentyearofstudy+1):$currentyearofstudy;
            $q="update students set Year='$yearofstudy',Semester='$semester' where Id=$student";
            $update=$this->Teacher_model->updatedate($q);
          }
          $this->session->set_flashdata('success', 'Success, New semester started successfully.');
        }else{
          $this->session->set_flashdata('success', 'Failed, New semester not started.');
        }
        
        redirect('managesemester');
      }
     
    }
    public function assignsupervisor()
	  {
       $data['students_withoutsupervisors']=$this->Teacher_model->students_withoutsupervisors();
		   $this->load->view('pages/supervisions',$data);
    }

    public function selectsupervisor($id){
        $data['asign']="assign";
        $data['allsupervisors']=$this->Teacher_model->all_supervisors();
        $data['student_details']=$this->Teacher_model->student_details($id);
		$this->load->view('pages/supervisions',$data);
    }

    public function insertStudentsupervisor(){
        $data['supervisoradded']=$this->Teacher_model->insertStudentsupervisor();
        if($data['supervisoradded']>0){
        $this->session->set_flashdata('success', 'Success, Student assigned supervisor successfully.');
        }else{
        $this->session->set_flashdata('error', 'Failed, Supervisor not assigned.');
        }
		header('location:'.base_url('assignsupervisor'));
    }

  //   public function mswstudents($id=NULL)
	// {
  //       if($id==NULL){
  //           $data['heading']="All MSW student";
  //           $data['studentslist']=$this->Teacher_model->mswstudents(1);
  //         }elseif($id==1){
  //           $data['heading']="Active MSW student";
  //           $data['studentslist']=$this->Teacher_model->mswstudents(2);
  //         }elseif($id==2){
  //           $data['heading']="Inactive MSW student";
  //           $data['studentslist']=$this->Teacher_model->mswstudents(3);
  //         }
       
	// 	$this->load->view('pages/addstudentform',$data);
  //   }
  public function mswstudents($id=NULL)
  {
        if($id==NULL){
            $data['heading']="All MSW Protocol Concepts";
            $data['protocolconcepts']=$this->Teacher_model->mswstudents(1);
          }elseif($id==1){
            $data['heading']="All MSW Revised Protocol Concepts";
            $data['masspmprotocolconcept2']=$this->Teacher_model->mswstudents(2);
          }elseif($id==2){
            $data['heading']="All MSW Research Proposals";
            $data['masspmresearchproposals']=$this->Teacher_model->mswstudents(3);
          }elseif($id==3){
            $data['heading']="All MSW Revised Research proposal";
            $data['masspmresearchproposals2']=$this->Teacher_model->mswstudents(4);
          }elseif($id==4){
            $data['heading']="All MSW Questionares / Qualitative notes";
            $data['masspmquestionaires']=$this->Teacher_model->mswstudents(5);
          }elseif($id==5){
            $data['heading']="All MSW Dissertations (First Draft)";
            $data['masspmdissertations']=$this->Teacher_model->mswstudents(6);
          }elseif($id==6){
            $data['heading']="All MSW Dissertations (Second Draft)";
            $data['masspmdissertations2']=$this->Teacher_model->mswstudents(7);
          }elseif($id==7){
            $data['heading']="All MSW Dissertations (Third Draft)";
            $data['masspmdissertations3']=$this->Teacher_model->mswstudents(8);
          }
       
      $this->load->view('pages/masspmStudents',$data);
    }

    public function masspmstudents($id=NULL)
    {
          if($id==NULL){
              $data['heading']="All MASSPM Protocol Concepts";
              $data['protocolconcepts']=$this->Teacher_model->masspmstudents(1);
            }elseif($id==1){
              $data['heading']="All MASSPM Revised Protocol Concepts";
              $data['masspmprotocolconcept2']=$this->Teacher_model->masspmstudents(2);
            }elseif($id==2){
              $data['heading']="All MASSPM Research Proposals";
              $data['masspmresearchproposals']=$this->Teacher_model->masspmstudents(3);
            }elseif($id==3){
              $data['heading']="All MASSPM Revised Research proposal";
              $data['masspmresearchproposals2']=$this->Teacher_model->masspmstudents(4);
            }elseif($id==4){
              $data['heading']="All MASSPM Questionares / Qualitative notes";
              $data['masspmquestionaires']=$this->Teacher_model->masspmstudents(5);
            }elseif($id==5){
              $data['heading']="All MASSPM Dissertations (First Draft)";
              $data['masspmdissertations']=$this->Teacher_model->masspmstudents(6);
            }elseif($id==6){
              $data['heading']="All MASSPM Dissertations (Second Draft)";
              $data['masspmdissertations2']=$this->Teacher_model->masspmstudents(7);
            }elseif($id==7){
              $data['heading']="All MASSPM Dissertations (Third Draft)";
              $data['masspmdissertations3']=$this->Teacher_model->masspmstudents(8);
            }
         
        $this->load->view('pages/masspmStudents',$data);
      }
    public function phdstudents($id=NULL)
	{
          if($id==NULL){
            $data['heading']="All PHD student";
            $data['studentslist']=$this->Teacher_model->phdstudents(1);
          }elseif($id==1){
            $data['heading']="Active PHD student";
            $data['studentslist']=$this->Teacher_model->phdstudents(2);
          }elseif($id==2){
            $data['studentslist']=$this->Teacher_model->phdstudents(3);
            $data['heading']="Inactive PHD student";
          }
       
		$this->load->view('pages/addstudentform',$data);
    }

 public function student_progress($id){
  $data['studentid']=$id;
  $data['research_progress']=$this->Teacher_model->all_researchwork($id);
  $data['research_feedback']=$this->Teacher_model->all_researchfeedback($id);
  $this->load->view('pages/addstudentform',$data);
 }

 public function submitfeedback(){
  $session_data = $this->session->userdata('logged_in');
  $staff=$session_data['id'];
  $feedback=$this->input->get_post('feedback');
  $studentid=$this->input->get_post('studentid');
  $record=$this->input->get_post('record');
  $date= date('d/m/Y');
  $time=date('h:m:sa');
  // $temp = explode(".", $_FILES["attachment"]["name"]);
  // $newfilename = 'student'.round(microtime(true)) . '.' . end($temp);
  // move_uploaded_file($_FILES["attachment"]["tmp_name"], "assets/images/researchattatchments/" . $newfilename);
       
  $query = array(
      '	feedback' =>  $feedback,
      '	feedbackto' => $record,
      '	feedbackby' => $staff,
      
      'date'=>$date,
      'time'=>$time
  );
  
  
      $data['itemadded']=$this->Student_model->insertData($query,'research_feedback'); 
   
      $this->session->set_flashdata('success', 'Success, Research progress submitted successfully.');
      redirect(base_url('Student_progress/'.$studentid));
  
}

public function send_studentquaterlyemails(){
  $students=$this->Teacher_model->all_students();
  foreach($students->result() as $row){
    $htmlmessage = 'Hello, '.''.$row->LastName.' '.$row->FirstName.'<br></br><br></br>'.
         '<p>Your  kindly informed that it is time to submit your quatterly 
         project progress</p>'.
         'Thank You'.'<b></br><b></br>'.'CHUSS-GRADUATE SUPPORT';
    $this->send_mail($row->studentsEmail,$htmlmessage);
  }
}
public function send_supervisorquaterlyemails(){
  $allsupervisors=$this->Teacher_model->all_supervisors();
  foreach($allsupervisors->result() as $row){
    $htmlmessage = 'Hello, '.''.$row->lastname.' '.$row->firstname.'<br></br><br></br>'.
    '<p>Your  kindly informed that its time to submit the quatterly 
    comments on students progress</p>'.
    'Thank You'.'<b></br><b></br>'.'CHUSS-GRADUATE SUPPORT';
    $this->send_mail($row->email,$htmlmessage);
  }
}
public function send_mail($to,$message) {
  $from_email = "gettaibu@gmail.com";
  $to_email = "amtaibu@gmail.com";
  //Load email library
  $this->load->library('email');
  $this->email->from($from_email, 'Identification');
  $this->email->to($to_email);
  $this->email->subject('Send Email Codeigniter');
  $this->email->message('The email send using codeigniter library');
  //Send mail
  if($this->email->send()){
    echo 'sent';
  }else{
    $this->email->send();
  }
}

public function add_notice()
{
      $data['addform']="add";
  $this->load->view('pages/noticeboard',$data);
}

}
