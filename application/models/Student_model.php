<?php
class Student_model extends CI_Model
{
    public function __construct()
    {
            parent::__construct();
            $this->load->model('Admin_model');
            $this->load->database();
            $this->db;
    }
    
 
    public function insertstudent(){
        $firstname=$this->input->get_post('firstname');
        $lastname=$this->input->get_post('lastname');
        $email=$this->input->get_post('email');
        $phone=$this->input->get_post('phone');
        $academicprogram=$this->input->get_post('studyprogram');
        $studentnumber=$this->input->get_post('studnumber');
        $regnumber=$this->input->get_post('regnumber');
        $academicyear=$this->input->get_post('academicyear');
       $semester=$this->currentsemester()->id;
      $result=$this->Admin_model->checkforDuplicateUserDetails($firstname,$lastname,'students');
       
      $username=explode(' ',$lastname);
      $username=end($username);
      if($result==0){
       $generatedusername = strtolower(substr($firstname,0,1)).$username;
      }else{
        $generatedusername = strtolower(substr($firstname,0,1)).$username.$result;
      }
      $chars='123456789abcdefghijklmnpqrstuvwxyz';
      $password= substr(str_shuffle($chars),0,6);
       
        $query = $this->db->query("insert into students(FirstName,LastName,username,	password,studentsEmail,studentsPhone,Program,Year,Semester,StudentNumber,	RegNumber,Active) 
                             values('$firstname','$lastname','$generatedusername','$password','$email','$phone','$academicprogram','$academicyear','$semester','$studentnumber','$regnumber','1')");
         $identity=$this->db->query("SELECT id from students where username='$generatedusername' and password='$password' order by id desc limit 1");
         $identity=$identity->result();
         foreach($identity as $id){
          $identity=$id->id;
         }
        //  $this->db->select('*');
        //  $this->db->where('username',$generatedusername);
        //  $this->db->where('password',$password);
        //  $this->db->from('students');
        //  $identity=$this->db->get()->row()->id;
         $query2 = $this->db->query("insert into research_progress(student) 
         values('$identity')");
         //echo '<h1>'.$identity->id.'</h1>';
        if($query && $query2){
          $htmlmessage = 'Hello, '.''.$lastname.' '.$firstname.'<br></br><br></br>'.
        '<p>You have successfully enrolled to the graduate support system.</p><br>'.
        'Your username is:'.$generatedusername.'.<br>Your password is: '.$password.
        '<br>Thank You'.'<b></br><b></br>'.'CHUSS-GRADUATE SUPPORT';
         if($this->send_mail($email,$htmlmessage)){
            return true;
         }else{
            return false;
         }
        }else{
          return false;
        }
      }

   

  function all_researchwork($id=NULl){
    
     if($id==NULL){
      $session_data = $this->session->userdata('studentlogged_in');
      $studentid=$session_data['id'];
       $q = $this->db->query("SELECT * from research_progress where student='$studentid' order by id desc limit 1");
     }else{
       $q = $this->db->query("SELECT * from research_work where student='$id' order by id desc");
     }
     
     return $q->result();
   }

    function updatedata($query){

      $q = $this->db->query($query);
       return $q;
    }
function insertData($query,$table=NULL){
  if($table==NULL){
    $q = $this->db->query($query);
  }else{
    $q=$this->db->insert($table, $query);
  }
  return $q;
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
    return true;
  }else{
    return false;
  }

}
function currentsemester(){
  $q = $this->db->query("SELECT * from current_semesters  order by id desc Limit 1");
  return $q->result()['0'];
}
} 
?>