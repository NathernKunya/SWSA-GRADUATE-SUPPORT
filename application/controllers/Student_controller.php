<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_controller extends CI_Controller {

	function __construct()
    {
            parent::__construct();
             $this->load->model('Admin_model');
             $this->load->model('Student_model');
             $this->load->model('Teacher_model');
            $this->load->helper('form');
            $this->load->library('form_validation');
	}
	function home(){
        $session_data = $this->session->userdata('studentlogged_in');
        $supervisor=$session_data['supervisor'];
        $cordinator = $this->session->userdata('logged_in');
        
        $studentid=$session_data['id'];
        if($supervisor!=NULL){
         $data['spuervisordetails']=$this->Teacher_model->all_teachers($supervisor); 
        } 
        $data['research_progress']=$this->Student_model->all_researchwork();
        $data['numberofsubmissions']=$this->Teacher_model->selectcount('research_work',"student='$studentid'");
		$this->load->view('pages/studenthome',$data);
      
    }

     public function studentprogress($id){
        $data['studentid']=$id;
        $data['research_progress']=$this->Student_model->all_researchwork();
        $data['numberofsubmissions']=$this->Teacher_model->selectcount('research_work',"student='$studentid'");
        $this->load->view('pages/studenthome',$data);
 }
   
	function index()
	{
         $data['addstud']="add";
		$this->load->view('pages/addstudent',$data);
	}
    function insertStudent(){
        $data['studentadded']=$this->Student_model->insertstudent();
		header('location:'.base_url('addstudent'));
    }
    function enroll(){
        $this->load->view('pages/enroll');
    }

    function submitenrollment(){
        $data['studentadded']=$this->Student_model->insertstudent();
        if($data['studentadded']){
        
        $this->session->set_flashdata('loginpageinfo', 'Success, You enrolled successfully. 
        Check your email for the system access credentials');
        header('location:'.base_url());
        }else{
        $this->session->set_flashdata('enrollpageinfo', 'Failed, Enrollment failed. Please try later');
        header('location:'.base_url('enroll'));
        }
	
    }
     function submitstudent(){
        $data['studentadded']=$this->Student_model->insertstudent();
        if($data['studentadded']){
        
        $this->session->set_flashdata('loginpageinfo', 'Success, new student added successfully. 
        Check your email for the system access credentials');
        header('location:'.base_url('addstudent'));
        }else{
        $this->session->set_flashdata('enrollpageinfo', 'Failed, Student not added. Please try again');
        header('location:'.base_url('addstudent'));
        }
    
    }
    function submitresearchtopic(){
        $session_data = $this->session->userdata('studentlogged_in');
        $studentid=$session_data['id'];
        $topic=$this->input->get_post('researchtopic');
        $desc=$this->input->get_post('description');
        $date= date('d/m/Y');
        $time=date('h:m:sa');
        $sem=$this->Student_model->currentsemester()->id;;
        $q= "update students set ResearchTopic='$topic' where Id='$studentid'";
        $data['updatestudent']=$this->Student_model->insertData($q);
        $q= "update research_progress set research_topic='$topic',datert='$date',timert='$time',step='1' where student='$studentid'";
        $data['updaterp']=$this->Student_model->insertData($q);

            //  $query = "insert into research_work(item,item_category,description,student,date,time,semester,yearofstudy,stepinphase,phase) 
            //               values('$topic','research_topic','$desc','$studentid','$date','$time','$sem',2,1,1)";
            //    $data['itemadded']=$this->Student_model->insertData($query); 
              
        $this->session->set_flashdata('success', 'Success, Research topic submitted successfully.');
        redirect(base_url('studenthome'));


        
    }

    function submitresearchProgress(){
       if($this->session->userdata('studentlogged_in')){
                $session_data = $this->session->userdata('studentlogged_in');
                $studentid=$session_data['id'];
                $studyyear=$session_data['studyyear'];
                $semester=$session_data['sem'];
                $topic=$this->input->get_post('researchtopic');
                $desc=$this->input->get_post('description');
                $date= date('d/m/Y');
                $time=date('h:m:sa');
                $temp = explode(".", $_FILES["attachment"]["name"]);
                $progress=$this->Student_model->all_researchwork();
                $currentstep=$progress['0']->step;
            
                
                if($currentstep==1){
                    $newfilename = 'Protocol_concept_'.$session_data['lastname'] .'_ '.$session_data['firstname'].'_'.$session_data['id'].'.' . end($temp);
                    move_uploaded_file($_FILES["attachment"]["tmp_name"], "assets/images/researchattatchments/" . $newfilename);
                    $query= "update research_progress set protocol_concept='$newfilename',datepc='$date',timepc='$time',concept_description='$desc',step=step+1 where student='$studentid'";

                }elseif($currentstep==2){

                }elseif($currentstep==3){
                    $newfilename = 'Revised_protocol_concept_'.$session_data['lastname'] .'_ '.$session_data['firstname'].'_'.$session_data['id'].'.' . end($temp);
                    move_uploaded_file($_FILES["attachment"]["tmp_name"], "assets/images/researchattatchments/" . $newfilename);
                    $query= "update research_progress set revised_concept='$newfilename',daterc='$date',	timerc='$time',	concept_description2='$desc',step=step+1 where student='$studentid'";
                }elseif($currentstep==4){

                }elseif($currentstep==5){
                    $newfilename = 'Research_proposal_'.$session_data['lastname'] .'_ '.$session_data['firstname'].'_'.$session_data['id'].'.' . end($temp);
                    move_uploaded_file($_FILES["attachment"]["tmp_name"], "assets/images/researchattatchments/" . $newfilename);
                    $query= "update research_progress set proposal='$newfilename',datep='$date',	timep='$time',proposal_description='$desc',step=step+1 where student='$studentid'";
                }elseif($currentstep==6){
                
                }elseif($currentstep==7){
                    $newfilename = 'RevisedResearch_proposal_'.$session_data['lastname'] .'_ '.$session_data['firstname'].'_'.$session_data['id'].'.' . end($temp);
                    move_uploaded_file($_FILES["attachment"]["tmp_name"], "assets/images/researchattatchments/" . $newfilename);
                    $query= "update research_progress set revised_proposal='$newfilename',daterp='$date',	timerp='$time',proposal_description2='$desc',step=step+1 where student='$studentid'";
                }elseif($currentstep==9){
                    $newfilename = 'Correction_and_resubmissonOfP_roposal_'.$session_data['lastname'] .'_ '.$session_data['firstname'].'_'.$session_data['id'].'.' . end($temp);
                    move_uploaded_file($_FILES["attachment"]["tmp_name"], "assets/images/researchattatchments/" . $newfilename);
                    $query= "update research_progress set resubmited_proposal='$newfilename',dateresubp='$date',	timeresubp='$time',proposal_description3='$desc',step=step+1 where student='$studentid'";
                }elseif($currentstep==10){
                    $newfilename = 'Questionaires_and_quantitative_notes_'.$session_data['lastname'] .'_ '.$session_data['firstname'].'_'.$session_data['id'].'.' . end($temp);
                    move_uploaded_file($_FILES["attachment"]["tmp_name"], "assets/images/researchattatchments/" . $newfilename);
                    $query= "update research_progress set quantitativenotes_and_questionaires='$newfilename',dateq='$date',	timeq='$time',	descriptionq='$desc',step=step+1 where student='$studentid'";
                }elseif($currentstep==11){
                    $newfilename = 'Disertation_draft_one_'.$session_data['lastname'] .'_ '.$session_data['firstname'].'_'.$session_data['id'].'.' . end($temp);
                    move_uploaded_file($_FILES["attachment"]["tmp_name"], "assets/images/researchattatchments/" . $newfilename);
                    $query= "update research_progress set dissertation1='$newfilename',dateds1='$date',	timeds1='$time',description_ds1='$desc',step=step+1 where student='$studentid'";
                }elseif($currentstep==13){
                    $newfilename = 'Disertation_draft_two_'.$session_data['lastname'] .'_ '.$session_data['firstname'].'_'.$session_data['id'].'.' . end($temp);
                    move_uploaded_file($_FILES["attachment"]["tmp_name"], "assets/images/researchattatchments/" . $newfilename);
                    $query= "update research_progress set dissertation2='$newfilename',dateds2='$date',	timeds2='$time',description_ds2='$desc',step=step+1 where student='$studentid'";
                }elseif($currentstep==15){
                    $newfilename = 'Disertation_draft_three_'.$session_data['lastname'] .'_ '.$session_data['firstname'].'_'.$session_data['id'].'.' . end($temp);
                    move_uploaded_file($_FILES["attachment"]["tmp_name"], "assets/images/researchattatchments/" . $newfilename);
                    $query= "update research_progress set dissertation3='$newfilename',dateds3='$date',	timeds3='$time',description_ds3='$desc',step=step+1 where student='$studentid'";
                }elseif($currentstep==17){
                    $newfilename = 'Dissertation_resubmission_with_CR_'.$session_data['lastname'] .'_ '.$session_data['firstname'].'_'.$session_data['id'].'.' . end($temp);
                    move_uploaded_file($_FILES["attachment"]["tmp_name"], "assets/images/researchattatchments/" . $newfilename);
                    $query= "update research_progress set revisions_with_compliance_reports='$newfilename',daterwcr='$date',timerwcr='$time',descriptionrwcr='$desc',step=step+1 where student='$studentid'";
                }else{
                    redirect(base_url('studenthome'));
                }
                $data['itemadded']=$this->Student_model->updatedata($query); 
                $this->session->set_flashdata('success', 'Success, Research progress submitted successfully.');
                redirect(base_url('studenthome'));

        }
        

        if($this->session->userdata('logged_in')){
            $session_data = $this->session->userdata('logged_in');
            $superid=$session_data['id'];
            
            $feedbacktype=$this->input->get_post('type');
            $studentid=$this->input->get_post('student');
            $desc=$this->input->get_post('feedback');
            $date= date('d/m/Y');
            $time=date('h:m:sa');
            $temp = explode(".", $_FILES["commentedfile"]["name"]);
             echo end($temp);
            if($feedbacktype=="commentonpc"){
                $newfilename = 'Commented_protocalConcept_'.''.$studentid.'.'.end($temp);
                move_uploaded_file($_FILES["commentedfile"]["tmp_name"], "assets/images/researchattatchments/" . $newfilename);
               $query= "update research_progress set commentedfile1='$newfilename',datesc1='$date',	timesp1='$time',supervisor_comment1='$desc',step=step+1 where student='$studentid'";
              
            }elseif($feedbacktype=="commentonpc2"){
                $newfilename = 'Commented_Revised_protocalConcept_'.''.$studentid.'.'.end($temp);
                move_uploaded_file($_FILES["commentedfile"]["tmp_name"], "assets/images/researchattatchments/" . $newfilename);
               $query= "update research_progress set commentedfile2='$newfilename',datesc2='$date',	timesc2='$time',supervisor_comment2='$desc',step=step+1 where student='$studentid'";
              
            }elseif($feedbacktype=="commentonproposal1"){
                $newfilename = 'Commented_Proposalone_'.''.$studentid.'.'.end($temp);
                move_uploaded_file($_FILES["commentedfile"]["tmp_name"], "assets/images/researchattatchments/" . $newfilename);
               $query= "update research_progress set commentedfile3='$newfilename',datescp1='$date',timescp1='$time',supervisor_commentproposal1='$desc',step=step+1 where student='$studentid'";
               
            }elseif($feedbacktype=="commentondissertation1"){
                $newfilename = 'Commented_Dissertation_one_'.''.$studentid.'.'.end($temp);
                move_uploaded_file($_FILES["commentedfile"]["tmp_name"], "assets/images/researchattatchments/" . $newfilename);
               $query= "update research_progress set commentedfile4='$newfilename',datedf1='$date',timedf1='$time',dessertation_feedback1='$desc',step=step+1 where student='$studentid'";
              
            }elseif($feedbacktype=="commentondissertation2"){
                $newfilename = 'Commented_Dissertation2_'.''.$studentid.'.'.end($temp);
                move_uploaded_file($_FILES["commentedfile"]["tmp_name"], "assets/images/researchattatchments/" . $newfilename);
               $query= "update research_progress set commentedfile5='$newfilename',datedf2='$date',	timedf2='$time',dessertation_feedback2='$desc',step=step+1 where student='$studentid'";
            }else{
                redirect(base_url('masspmprotocolconcept2'));
            }
            $data['itemadded']=$this->Student_model->updatedata($query); 
            $this->session->set_flashdata('success', 'Success, Comment/feedback submitted successfully.');
            redirect(base_url('masspmprotocolconcept'));
       }
           
   }
   function foward_submissions($student,$type=NULL){
    if($type==1){
        $query= "update research_progress set submit_proposal_tomsacordinator='TRUE',step=step+1 where student='$student'";
        $data['itemadded']=$this->Student_model->updatedata($query); 
        $this->session->set_flashdata('success', 'Success, Proposal forwarded successfully.');
        redirect(base_url('masspmresearchproposals2'));
    }elseif($type==2){
        $query= "update research_progress set foward_dissertationforexamination='TRUE',step=step+1 where student='$student'";
        $data['itemadded']=$this->Student_model->updatedata($query); 
        $this->session->set_flashdata('success', 'Success, Proposal forwarded successfully.');
        redirect(base_url('masspmdissertations3'));
    }else{

    }
    
   }
    function sendmessage(){
        $type=$this->input->get_post('messagetype');
        if($type=="notice"){
            $session_data = $this->session->userdata('logged_in');
            $role=$session_data['role'];
            if($role=="cordinator"||$role=="HOD"){
                $to=1;
            }elseif($role=="supervisor"||$role=="Examiner"){
                $to=2;
            }else{
                $to=3;
            }
        }else{
            $session_data = $this->session->userdata('studentlogged_in');
            $to=$this->input->get_post('to');
        }
        
        $studentid=$session_data['id'];
        $message=$this->input->get_post('message');
        $subject=$this->input->get_post('subject');
       
        $date= date('d/m/Y');
        $time=date('h:m:sa');
             
        $query = array(
            'subject' => $subject,
            'message' => $message,
            'sender' => $studentid,
            'reciever'=> $to,
            'date'=>$date,
            'time'=>$time,
            'semester'=>'1',
            'messagetype'=>$type
        );
            $data['itemadded']=$this->Student_model->insertData($query,'messages'); 
          
               
           
            if($type=="notice"){
                $this->session->set_flashdata('success', 'Success, Notice Posted successfully.');
                redirect(base_url('newnotice'));
            }else{
                $this->session->set_flashdata('success', 'Success, Message sent successfully.');
                redirect(base_url('studenthome'));
            }
            
        
    }

    function student_progress(){
        $data['research_progress']=$this->Student_model->all_researchwork();
        $data['research_feedback']=$this->Teacher_model->all_researchfeedback();
        $data['student']='student';
        $this->load->view('pages/addstudentform',$data);
       }
      

}