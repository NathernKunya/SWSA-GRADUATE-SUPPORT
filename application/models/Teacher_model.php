<?php
class Teacher_model extends CI_Model
{
    public function __construct()
    {
            parent::__construct();
            $this->load->model('Admin_model');
            $this->load->database();
            $this->db;
    }
    
    function userrole(){
      $session_data = $this->session->userdata('logged_in');
      return $session_data['role'];
    }
    
 
    public function insertteacher(){
        $firstname=$this->input->get_post('firstname');
        $lastname=$this->input->get_post('lastname');
        $gender=$this->input->get_post('gender');
        $office=$this->input->get_post('office');
        $staffid=$this->input->get_post('staffid');
        $email=$this->input->get_post('email');
        $phone=$this->input->get_post('phone');
        $role=$this->input->get_post('role');
       
        $temp = explode(".", $_FILES["profilepic"]["name"]);
      $newfilename = 'teacher'.round(microtime(true)) . '.' . end($temp);
      move_uploaded_file($_FILES["profilepic"]["tmp_name"], "assets/images/teachers/" . $newfilename);
       
      $result=$this->Admin_model->checkforDuplicateUserDetails($firstname,$lastname,'staff');
       
      $username=explode(' ',$lastname);
      $username=end($username);
      if($result==0){
       $generatedusername = strtolower(substr($firstname,0,1)).$username;
      }else{
        $generatedusername = strtolower(substr($firstname,0,1)).$username.$result;
      }
      $chars='123456789abcdefghijklmnpqrstuvwxyz';
      $password= substr(str_shuffle($chars),0,6);
       
        
       // if($query){
          $htmlmessage = 'Hello, '.''.$lastname.' '.$firstname.'<br></br><br></br>'.
          "<p>Your  kindly informed that you've been assigned as supervisor </p>".
          '<p>Use the following credentials to login<p><br/>Username: '.$generatedusername.'<br/>Password:'.$password.'</br>';
          'Thank You'.'<b></br><b></br>'.'CHUSS-GRADUATE SUPPORT';
          $subject= 'CHUSS GRADUATE APP CREDENTIALS';
          if($this->send_mail($row->email,$htmlmessage,$subject)){
            $query = $this->db->query("insert into staff(firstname,lastname,gender,email,phone,role,photo,username,password,staffid,office,Active) 
                             values('$firstname','$lastname','$gender','$email','$phone','$role','$newfilename','$generatedusername','$password','$staffid','$office','0')");
            return true;
          }else{
            return false;
          } 
        // }else{
        //   return false;
        // }
      }

    function all_teachers($id=NULl){
        if($id!=NULL){
          $q = $this->db->query("SELECT * from staff where id='$id' order by id desc");
        }else{
          $q = $this->db->query("SELECT * from staff order by id desc");
        }
          
      return $q;
    }

    function teacher_details($id){
      $q = $this->db->query("SELECT * from staff where id='$id' order by id desc ");
      return $q;
}
   function students_withoutsupervisors(){
    $q = $this->db->query("SELECT * from students where supervisor IS NULL  order by id asc ");
    return $q;
   }

   function student_details($id){
    $q = $this->db->query("SELECT * from students where id='$id' order by id asc ");
    return $q;
   }

   function all_supervisors(){
    $q = $this->db->query("SELECT * from staff where role='supervisor' order by id asc ");
    return $q;
   }

   public function insertStudentsupervisor(){
    $student=$this->input->get_post('student');
    $supervisor=$this->input->get_post('supervisor');

    $query = $this->db->query("update students set supervisor='$supervisor' where Id='$student'");
    return $query; 
  }

  // function mswstudents($id){
  //   if(strcmp($this->userrole(),'supervisor')==0) {
  //     $session_data = $this->session->userdata('logged_in');
  //     $userid=$session_data['id'];
  //     if($id==1){
  //       $q = $this->db->query("SELECT * from students where Program='MSW' and supervisor='$userid' order by id asc ");
  //     }elseif($id==2){
  //       $q = $this->db->query("SELECT * from students where Program='MSW' and supervisor='$userid' and Active='1' order by id asc ");
  //     }elseif($id==3){
  //       $q = $this->db->query("SELECT * from students where Program='MSW' and supervisor='$userid' and Active='0' order by id asc ");
  //     }
     
  //   }else {
  //     if($id==1){
  //       $q = $this->db->query("SELECT * from students where Program='MSW' order by id asc ");
  //     }elseif($id==2){
  //       $q = $this->db->query("SELECT * from students where Program='MSW' and Active='1' order by id asc ");
  //     }elseif($id==3){
  //       $q = $this->db->query("SELECT * from students where Program='MSW' and Active='0' order by id asc ");
  //     }
  //   }
   
  //   return $q;
  //  }
  function mswstudents($id){
   
    $session_data = $this->session->userdata('logged_in');
    $userid=$session_data['id'];
    $this->db->select('*');
    $this->db->from('students as t1');
    $this->db->join('research_progress as t2','t1.id=t2.student');
    $this->db->where('t1.Program','MSW');
    if(strcmp($this->userrole(),'supervisor')==0) {
    $this->db->where('t1.supervisor',$userid);
    }
    if($id==1){
      $this->db->where('protocol_concept IS NOT NULL');
    }elseif($id==2){
      $this->db->where('revised_concept IS NOT NULL');
    }elseif($id==3){
      $this->db->where('proposal IS NOT NULL');
    }elseif($id==4){
      $this->db->where('revised_proposal IS NOT NULL');
    }elseif($id==5){
      $this->db->where('quantitativenotes_and_questionaires IS NOT NULL');
    }elseif($id==6){
      $this->db->where('dissertation1 IS NOT NULL');
    }elseif($id==7){
      $this->db->where('dissertation2 IS NOT NULL');
    }elseif($id==8){
      $this->db->where('dissertation3 IS NOT NULL');
    }else{
 
    }
    
    $q=$this->db->get(); 
    return $q;
  }
  function masspmstudents($id){
   
      $session_data = $this->session->userdata('logged_in');
      $userid=$session_data['id'];
      $this->db->select('*');
      $this->db->from('students as t1');
      $this->db->join('research_progress as t2','t1.id=t2.student');
      $this->db->where('t1.Program','MASSPM');
      if(strcmp($this->userrole(),'supervisor')==0) {
      $this->db->where('t1.supervisor',$userid);
      }
      if($id==1){
        $this->db->where('protocol_concept IS NOT NULL');
      }elseif($id==2){
        $this->db->where('revised_concept IS NOT NULL');
      }elseif($id==3){
        $this->db->where('proposal IS NOT NULL');
      }elseif($id==4){
        $this->db->where('revised_proposal IS NOT NULL');
      }elseif($id==5){
        $this->db->where('quantitativenotes_and_questionaires IS NOT NULL');
      }elseif($id==6){
        $this->db->where('dissertation1 IS NOT NULL');
      }elseif($id==7){
        $this->db->where('dissertation2 IS NOT NULL');
      }elseif($id==8){
        $this->db->where('dissertation3 IS NOT NULL');
      }else{
   
      }
    
    $q=$this->db->get(); 
    return $q;
   }
   function phdstudents($id){
    if(strcmp($this->userrole(),'supervisor')==0) {
      $session_data = $this->session->userdata('logged_in');
      $userid=$session_data['id'];
      if($id==1){
        $q = $this->db->query("SELECT * from students where Program='PhD' and supervisor='$userid' order by id asc ");
      }elseif($id==2){
        $q = $this->db->query("SELECT * from students where Program='PhD' and supervisor='$userid' and Active='1' order by id asc ");
      }elseif($id==3){
        $q = $this->db->query("SELECT * from students where Program='PhD' and supervisor='$userid' and Active='0' order by id asc ");
      }
     
    }else {
      if($id==1){
        $q = $this->db->query("SELECT * from students where Program='PhD' order by id asc ");
      }elseif($id==2){
        $q = $this->db->query("SELECT * from students where Program='PhD' and Active='1' order by id asc ");
      }elseif($id==3){
        $q = $this->db->query("SELECT * from students where Program='PhD' and Active='0' order by id asc ");
      }
    }
    
    return $q;
   }

  function currentsemester(){
    $q = $this->db->query("SELECT * from current_semesters  order by id desc Limit 1");
    return $q->result()['0'];
  }
  function insertData($query,$table){
    //$q = $this->db->query($query);
    $q=$this->db->insert($table, $query);
    return $q;
  }
  function updatedate($query){
    $q=$this->db->query($query);
    return $q;
  }

  function all_researchwork($id=NULL){
    if($id==NULL){
      $session_data = $this->session->userdata('studentlogged_in');
        $id=$session_data['id'];
    }
    $q = $this->db->query("SELECT * from research_work where student='$id' order by id desc");

    return $q;
  }
  function all_researchfeedback(){
   // $q = $this->db->query("SELECT * from research_feedback order by id desc");
    $q = $this->db->query("
     SELECT *
    FROM research_feedback    t1
    JOIN staff  t2
    ON t1.feedbackby= t2.id
   
  ");

    return $q;
  }
  function all_students($id=NULl){
    
    if(strcmp($this->userrole(),'supervisor')==0) {
      $session_data = $this->session->userdata('logged_in');
      $userid=$session_data['id'];
      $this->db->select('*');
      $this->db->from('students as t1');
      $this->db->join('staff as t2','t1.supervisor=t2.id');
      $this->db->where('t1.supervisor',$userid);
      $this->db->order_by("t1.id", "desc");

     // $q = $this->db->query("SELECT * from students where supervisor='$userid' order by id desc");
     
    }else {
     // $q = $this->db->query("SELECT * from students order by id desc");
    $this->db->select('*');
    $this->db->from('students as t1');
    $this->db->join('staff as t2','t1.supervisor=t2.id');
    $this->db->order_by("t1.id", "desc");
    }
    $q = $this->db->get();
    return $q;
  }

  function all_mymessages($id=NULL,$type=NULL){
    $session_data = $this->session->userdata('logged_in');
    $userid=$session_data['id'];
    $this->db->select('*');
    $this->db->from('messages as t1');
    $this->db->join('students as t2','t1.sender=t2.Id','left');
   if($id==NULL){
    $this->db->where('t1.reciever',$userid);
   }else{
    $this->db->where('t1.reciever',$userid);
    $this->db->where('t1.id',$id);
   }
   $q=$this->db->get(); 
    return $q;
  }

  function noticeboard($to=NULL){
    $session_data = $this->session->userdata('logged_in');
   
    $userid=$session_data['id'];
    $this->db->select('*');
    $this->db->from('messages as t1');
    $this->db->join('staff as t2','t1.sender=t2.id','left');
    $this->db->order_by("t1.id", "desc");
   $q=$this->db->get(); 
    return $q;
  }
  public function send_mail($to,$message,$subject) {
    $from_email = "gettaibu@gmail.com";
    $to_email = $to;
    //Load email library
    $this->load->library('email');
    $this->email->from($from_email, 'Identification');
    $this->email->to($to_email);
    $this->email->subject($subject);
    $this->email->message($message);
    //Send mail
    if($this->email->send()){
      return true;
    }else{
      return false;
    }
  }

  function selectcount($table,$criteria){
    $this->db->where($criteria);
    $this->db->from($table);
    return $this->db->count_all_results();
  } 
}


?>