<?php
class Admin_model extends CI_Model
{
    public function __construct()
    {
            parent::__construct();
            $this->load->database();
            $this->db;
    }

  function getUserLogInDetails($username, $password,$table) {
      $this->db->select('*');
      $this->db->from($table.' as user');
      $this->db->where('user.username', $username);
      $this->db->where('user.password', $password);
      $this->db->order_by("user.id", "desc");
      $this->db->where('user.Active', 1);
      $this->db->limit(1);
      $query = $this->db->get();
      return $query;
    
  }

function checkforDuplicateUserDetails($firstname, $lastname,$tablename) {

  $this->db->select('*');
  $this->db->from('staff'.' as user');
  $this->db->from('students'.' as student');
  $this->db->where('user.firstname', $firstname);
  $this->db->where('user.lastname', $lastname);
  $this->db->where('student.FirstName', $firstname);
  $this->db->where('student.LastName', $lastname);
 $this->db->order_by("user.id", "desc");
 $query = $this->db->get();
return $query -> num_rows() ;
 
}

public function insertsubject(){
  $name=$this->input->get_post('name');
  $year=$this->input->get_post('year');
  $term=$this->input->get_post('term');
  $intro=$this->input->get_post('introduction');
  $teacher=$this->input->get_post('teacher_id');
  $program=$this->input->get_post('program');
$temp = explode(".", $_FILES["studentphoto"]["name"]);
$newfilename = 'student'.round(microtime(true)) . '.' . end($temp);
move_uploaded_file($_FILES["studentphoto"]["tmp_name"], "assets/images/courses/" . $newfilename);
$query = $this->db->query("insert into subjects(name,description,poster,teacher_id,academic_program,year,semester) 
                          values('$name','$intro','$newfilename','$teacher','$program','$year','$term')");
  return $query; 
}

public function updatesubject(){
  $name=$this->input->get_post('name');
  $year=$this->input->get_post('year');
  $term=$this->input->get_post('term');
  $intro=$this->input->get_post('introduction');
  $teacher=$this->input->get_post('teacher_id');
  $program=$this->input->get_post('program');
  $subjectid=$this->input->get_post('subjectid');

  $this->db->set('name', $name);
  $this->db->set('description', $intro);
  $this->db->set('description', $intro);
  $this->db->set('teacher_id', $teacher);
  $this->db->set('academic_program', $program);
  $this->db->set('year', $year);
  $this->db->set('semester', $term);
  $this->db->where('id', $subjectid);
  return $this->db->update('subjects');
// $query = $this->db->query("insert into subjects(name,description,poster,teacher_id,academic_program,year,semester) 
//                           values('$name','$intro','$newfilename','$teacher','$program','$year','$term')");
//   return $query; 
}

function all_subjects($id=NULl){
  
  $q = $this->db->query("
  SELECT t1.id,t1.name,t1.description,t1.poster,t1.year,t1.semester,t2.program_name,t3.firstname,t3.lastname
    FROM subjects     t1
    JOIN academicprograms as t2
    ON t1.academic_program= t2.id
    JOIN teachers      t3
    ON t1.teacher_id    = t3.id
  ");
return $q;
}
function subject_details($id){
  $q = $this->db->query("
  SELECT t1.id,t1.name,t1.description,t1.poster,t1.year,t1.semester,t2.program_name,t3.firstname,t3.lastname
    FROM subjects     t1
    JOIN academicprograms  t2
    ON t1.academic_program= t2.id
    JOIN teachers      t3
    ON t1.teacher_id    = t3.id
     where t1.id=$id
  ");
return $q;
}

}

?>