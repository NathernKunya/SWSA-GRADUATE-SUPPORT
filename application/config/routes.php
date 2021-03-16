<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['addstaff'] = 'Teacher_controller/index';
$route['addstudent'] = 'Student_controller/index';

$route['submitstaff'] = "Teacher_controller/insertStaff";
$route['allstaff'] = "Teacher_controller/all_teachers";
$route['assignsupervisor'] = "Teacher_controller/assignsupervisor";

$route['newnotice'] = "Teacher_controller/add_notice";
$route['noticeboard'] = "Teacher_controller/noticeboard";
$route['noticeboard/(:any)'] = "Teacher_controller/noticeboard/$1";

$route['staff/(:any)'] = "Teacher_controller/teacher_details/$1";
$route['selectsupervisor/(:any)'] = "Teacher_controller/selectsupervisor/$1";

$route['Submitstudentsupervisor'] = "Teacher_controller/insertStudentsupervisor";


$route['allmswstudents'] = "Teacher_controller/mswstudents";
$route['activemswstudents'] = "Teacher_controller/mswstudents/1";
$route['inactivemswstudents'] = "Teacher_controller/mswstudents/2";

$route['masspmprotocolconcept'] = "Teacher_controller/masspmstudents";
$route['masspmprotocolconcept2'] = "Teacher_controller/masspmstudents/1";
$route['masspmresearchproposals'] = "Teacher_controller/masspmstudents/2";
$route['masspmresearchproposals2'] = "Teacher_controller/masspmstudents/3";
$route['masspmquestionaires'] = "Teacher_controller/masspmstudents/4";
$route['masspmdissertations'] = "Teacher_controller/masspmstudents/5";
$route['masspmdissertations2'] = "Teacher_controller/masspmstudents/6";
$route['masspmdissertations3'] = "Teacher_controller/masspmstudents/7";
$route['forwardproposal_to_ma_sspm_cordinator/(:any)']="Student_controller/foward_submissions/$1/1";
$route['forwarddissertation_to_examination/(:any)']="Student_controller/foward_submissions/$1/2";


$route['mswprotocolconcept'] = "Teacher_controller/mswstudents";
$route['mswprotocolconcept2'] = "Teacher_controller/mswstudents/1";
$route['mswresearchproposals'] = "Teacher_controller/mswstudents/2";
$route['mswresearchproposals2'] = "Teacher_controller/mswstudents/3";
$route['mswquestionaires'] = "Teacher_controller/mswstudents/4";
$route['mswdissertations'] = "Teacher_controller/mswstudents/5";
$route['mswdissertations2'] = "Teacher_controller/mswstudents/6";
$route['mswdissertations3'] = "Teacher_controller/mswstudents/7";


$route['allphdstudents'] = "Teacher_controller/phdstudents";
$route['activephdstudents'] = "Teacher_controller/phdstudents/1";
$route['inactivephdstudents'] = "Teacher_controller/phdstudents/2";

$route['login'] = "Welcome/userlogin";
$route['logout'] = "Welcome/logout";

$route['home'] = "Welcome/home";
$route['studenthome'] = "student_controller/home";
$route['staffhome'] = "Teacher_controller/home";

$route['submitresearchtopic'] = "Student_controller/submitresearchtopic";
$route['submitresearchProgress'] = "Student_controller/submitresearchProgress";

$route['sendmessage'] = "Student_controller/sendmessage";

$route['managesemester'] = "Teacher_controller/currentsemester";
$route['closesemester/(:any)'] = "Teacher_controller/closesemester/$1";
$route['opensemester'] = "Teacher_controller/opensemester";

$route['sendmail'] = "Teacher_controller/sendmail";
$route['inbox'] = "Teacher_controller/inbox";
$route['inbox/(:any)'] = "Teacher_controller/inbox/$1";
$route['enroll']="Student_controller/enroll";

$route['submitenrollment']="Student_controller/submitenrollment";
$route['submitstudentinfo']="Student_controller/submitstudent";
$route['submitfeedback']="Teacher_controller/submitfeedback";
$route['Student_progress/(:any)'] = "Teacher_controller/student_progress/$1";
$route['my_progress'] = "Student_controller/student_progress";

$route['Studentprogress/(:any)'] = "Student_controller/studentprogress/$1";




