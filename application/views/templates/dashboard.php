<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <?php
    if($this->session->userdata('logged_in')!=NULL){
      $session_data = $this->session->userdata('logged_in');
      $userrole=$session_data['role'];
    $staffid=$session_data['id'];
    $photo=$session_data['photo'];
    $profilephoto="assets/images/teachers/".(($photo=='')?"avator.jpg":$photo);                 
   $name=$session_data['firstname'].' '.$session_data['lastname'];
  }elseif($this->session->userdata('studentlogged_in')!=NULL){
    $session_data = $this->session->userdata('studentlogged_in');
    $userrole=$session_data['role'];
    $staffid=$session_data['id'];
    $photo=$session_data['photo'];
    $profilephoto="assets/images/students/".(($photo=='')?"avator.jpg":$photo);
    $name=$session_data['firstname'].' '.$session_data['lastname'];
  }else{
   header('location:'.base_url());
  }
    
  ?>
 <aside class="main-sidebar">
    <!-- sidebar-->
     <!-- Sidebar user panel -->
    <section class="sidebar">
     <div class="user-panel" style="background-color:darkred">
        <div class="image">
          <img src="<?php echo base_url($profilephoto) ?>" class="img-circle" alt="User Image" style="width:70px;height:70px;border-radius:40px;">
          <br>
        </div>
        <div class="info">
        <p>SWSA GRADUATE SUPPORT</p>
         <p>Hello, <?php echo $name;?></p>
        </div>
      </div>
    <?php if(strcmp('cordinator',$userrole)==0){ ?>
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">
        <li> <a href="<?php echo base_url('staffhome'); ?>">
            <i class="fa fa-home"></i>
            <span>Home</span>
          </a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Staff</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('allstaff') ?>"><i class="fa fa-angle-double-right"></i> All staff</a></li>
            <li><a href="<?php echo base_url('addstaff') ?>"><i class="fa fa-angle-double-right"></i> Add new staff</a></li>
           
          </ul>
        </li>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Students</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('staffhome') ?>"><i class="fa fa-angle-double-right"></i> All students</a></li>
            <li><a href="<?php echo base_url('addstudent') ?>"><i class="fa fa-angle-double-right"></i> Add new student</a></li>
           
          </ul>
        </li> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i>
            <span>MSW Students</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('mswprotocolconcept') ?>"><i class="fa fa-angle-double-right"></i> Protocal Concepts</a></li>
            <li><a href="<?php echo base_url('mswprotocolconcept2') ?>"><i class="fa fa-angle-double-right"></i> Revised Protocal Concepts</a></li>
            <li><a href="<?php echo base_url('mswresearchproposals') ?>"><i class="fa fa-angle-double-right"></i> Research proposals</a></li>
            <li><a href="<?php echo base_url('mswresearchproposals2') ?>"><i class="fa fa-angle-double-right"></i> Revised research proposals</a></li>
            <li><a href="<?php echo base_url('mswquestionaires') ?>"><i class="fa fa-angle-double-right"></i> Questionaires</a></li>
            <li><a href="<?php echo base_url('mswdissertations') ?>"><i class="fa fa-angle-double-right"></i> Dissertations (Draft one)</a></li>
            <li><a href="<?php echo base_url('mswdissertations2') ?>"><i class="fa fa-angle-double-right"></i> Dissertations (Draft two)</a></li>
            <li><a href="<?php echo base_url('mswdissertations3') ?>"><i class="fa fa-angle-double-right"></i> Dissertations (Draft three)</a></li>
           
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i>
            <span>MASSPM Students</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('masspmprotocolconcept') ?>"><i class="fa fa-angle-double-right"></i> Protocal Concepts</a></li>
            <li><a href="<?php echo base_url('masspmprotocolconcept2') ?>"><i class="fa fa-angle-double-right"></i> Revised Protocal Concepts</a></li>
            <li><a href="<?php echo base_url('masspmresearchproposals') ?>"><i class="fa fa-angle-double-right"></i> Research proposals</a></li>
            <li><a href="<?php echo base_url('masspmresearchproposals2') ?>"><i class="fa fa-angle-double-right"></i> Revised research proposals</a></li>
            <li><a href="<?php echo base_url('masspmquestionaires') ?>"><i class="fa fa-angle-double-right"></i> Questionaires</a></li>
            <li><a href="<?php echo base_url('masspmdissertations') ?>"><i class="fa fa-angle-double-right"></i> Dissertations (Draft one)</a></li>
            <li><a href="<?php echo base_url('masspmdissertations2') ?>"><i class="fa fa-angle-double-right"></i> Dissertations (Draft two)</a></li>
            <li><a href="<?php echo base_url('masspmdissertations3') ?>"><i class="fa fa-angle-double-right"></i> Dissertations (Draft three)</a></li>
           
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i>
            <span>PHD Students</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('allphdstudents') ?>"><i class="fa fa-angle-double-right"></i> All PHD students</a></li>
            <li><a href="<?php echo base_url('activephdstudents') ?>"><i class="fa fa-angle-double-right"></i> Active PHD students</a></li>
            <li><a href="<?php echo base_url('inactivephdstudents') ?>"><i class="fa fa-angle-double-right"></i> Inactive PHD students</a></li>
           
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Supervision</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('assignsupervisor') ?>"><i class="fa fa-angle-double-right"></i> Assign Supervisors</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Manage Semester</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('managesemester') ?>"><i class="fa fa-angle-double-right"></i> Current semster</a></li>
            <li><a href="<?php echo base_url('managesemester') ?>"><i class="fa fa-angle-double-right"></i>Previous semesters</a></li>
           
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-bullhorn"></i>
            <span>Notice Board</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('newnotice') ?>"><i class="fa fa-angle-double-right"></i> Post to the Notice board</a></li>
            <li><a href="<?php echo base_url('noticeboard') ?>"><i class="fa fa-angle-double-right"></i>NoticeBoard Posts</a></li>
           
          </ul>
        </li>
        
      </ul>

    <?php }else if(strcmp('supervisor',$userrole)==0){ ?>
       <!-- sidebar menu-->
       <ul class="sidebar-menu" data-widget="tree">
        <li> <a href="<?php echo base_url('staffhome'); ?>">
            <i class="fa fa-home"></i>
            <span>Home</span>
          </a></li>
          <li> <a href="<?php echo base_url('inbox'); ?>">
            <i class="fa fa-envelope"></i>
            <span>Message Inbox</span>
          </a></li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i>
            <span>MSW Students</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('mswprotocolconcept') ?>"><i class="fa fa-angle-double-right"></i> Protocal Concepts</a></li>
            <li><a href="<?php echo base_url('mswprotocolconcept2') ?>"><i class="fa fa-angle-double-right"></i> Revised Protocal Concepts</a></li>
            <li><a href="<?php echo base_url('mswresearchproposals') ?>"><i class="fa fa-angle-double-right"></i> Research proposals</a></li>
            <li><a href="<?php echo base_url('mswresearchproposals2') ?>"><i class="fa fa-angle-double-right"></i> Revised research proposals</a></li>
            <li><a href="<?php echo base_url('mswquestionaires') ?>"><i class="fa fa-angle-double-right"></i> Questionaires</a></li>
            <li><a href="<?php echo base_url('mswdissertations') ?>"><i class="fa fa-angle-double-right"></i> Dissertations (Draft one)</a></li>
            <li><a href="<?php echo base_url('mswdissertations2') ?>"><i class="fa fa-angle-double-right"></i> Dissertations (Draft two)</a></li>
            <li><a href="<?php echo base_url('mswdissertations3') ?>"><i class="fa fa-angle-double-right"></i> Dissertations (Draft three)</a></li>
           
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i>
            <span>MASSPM Students</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('masspmprotocolconcept') ?>"><i class="fa fa-angle-double-right"></i> Protocal Concepts</a></li>
            <li><a href="<?php echo base_url('masspmprotocolconcept2') ?>"><i class="fa fa-angle-double-right"></i> Revised Protocal Concepts</a></li>
            <li><a href="<?php echo base_url('masspmresearchproposals') ?>"><i class="fa fa-angle-double-right"></i> Research proposals</a></li>
            <li><a href="<?php echo base_url('masspmresearchproposals2') ?>"><i class="fa fa-angle-double-right"></i> Revised research proposals</a></li>
            <li><a href="<?php echo base_url('masspmquestionaires') ?>"><i class="fa fa-angle-double-right"></i> Questionaires</a></li>
            <li><a href="<?php echo base_url('masspmdissertations') ?>"><i class="fa fa-angle-double-right"></i> Dissertations (Draft one)</a></li>
            <li><a href="<?php echo base_url('masspmdissertations2') ?>"><i class="fa fa-angle-double-right"></i> Dissertations (Draft two)</a></li>
            <li><a href="<?php echo base_url('masspmdissertations3') ?>"><i class="fa fa-angle-double-right"></i> Dissertations (Draft three)</a></li>
           
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i>
            <span>PHD Students</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('allphdstudents') ?>"><i class="fa fa-angle-double-right"></i> All PHD students</a></li>
            <li><a href="<?php echo base_url('activephdstudents') ?>"><i class="fa fa-angle-double-right"></i> Active PHD students</a></li>
            <li><a href="<?php echo base_url('inactivephdstudents') ?>"><i class="fa fa-angle-double-right"></i> Inactive PHD students</a></li>
           
          </ul>
        </li>
     
        
      </ul>
      <?php }else if(strcmp('HOD',$userrole)==0){ ?>
       <!-- sidebar menu-->
       <ul class="sidebar-menu" data-widget="tree">
        <li> <a href="<?php echo base_url('staffhome'); ?>">
            <i class="fa fa-home"></i>
            <span>Home</span>
          </a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Staff</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('allstaff') ?>"><i class="fa fa-angle-double-right"></i> All staff</a></li>
            <li><a href="<?php echo base_url('addstaff') ?>"><i class="fa fa-angle-double-right"></i> Add new staff</a></li>
           
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bullhorn"></i>
            <span>Notice Board</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('newnotice') ?>"><i class="fa fa-angle-double-right"></i> Post to the Notice board</a></li>
            <li><a href="<?php echo base_url('noticeboard') ?>"><i class="fa fa-angle-double-right"></i>NoticeBoard Posts</a></li>
           
          </ul>
        </li>
          <!-- <li> <a href="<?php //echo base_url('inbox'); ?>">
            <i class="fa fa-envelope"></i>
            <span>Message Inbox</span>
          </a></li> -->
          <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i>
            <span>MSW Students</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('mswprotocolconcept') ?>"><i class="fa fa-angle-double-right"></i> Protocal Concepts</a></li>
            <li><a href="<?php echo base_url('mswprotocolconcept2') ?>"><i class="fa fa-angle-double-right"></i> Revised Protocal Concepts</a></li>
            <li><a href="<?php echo base_url('mswresearchproposals') ?>"><i class="fa fa-angle-double-right"></i> Research proposals</a></li>
            <li><a href="<?php echo base_url('mswresearchproposals2') ?>"><i class="fa fa-angle-double-right"></i> Revised research proposals</a></li>
            <li><a href="<?php echo base_url('mswquestionaires') ?>"><i class="fa fa-angle-double-right"></i> Questionaires</a></li>
            <li><a href="<?php echo base_url('mswdissertations') ?>"><i class="fa fa-angle-double-right"></i> Dissertations (Draft one)</a></li>
            <li><a href="<?php echo base_url('mswdissertations2') ?>"><i class="fa fa-angle-double-right"></i> Dissertations (Draft two)</a></li>
            <li><a href="<?php echo base_url('mswdissertations3') ?>"><i class="fa fa-angle-double-right"></i> Dissertations (Draft three)</a></li>
           
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i>
            <span>MASSPM Students</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('masspmprotocolconcept') ?>"><i class="fa fa-angle-double-right"></i> Protocal Concepts</a></li>
            <li><a href="<?php echo base_url('masspmprotocolconcept2') ?>"><i class="fa fa-angle-double-right"></i> Revised Protocal Concepts</a></li>
            <li><a href="<?php echo base_url('masspmresearchproposals') ?>"><i class="fa fa-angle-double-right"></i> Research proposals</a></li>
            <li><a href="<?php echo base_url('masspmresearchproposals2') ?>"><i class="fa fa-angle-double-right"></i> Revised research proposals</a></li>
            <li><a href="<?php echo base_url('masspmquestionaires') ?>"><i class="fa fa-angle-double-right"></i> Questionaires</a></li>
            <li><a href="<?php echo base_url('masspmdissertations') ?>"><i class="fa fa-angle-double-right"></i> Dissertations (Draft one)</a></li>
            <li><a href="<?php echo base_url('masspmdissertations2') ?>"><i class="fa fa-angle-double-right"></i> Dissertations (Draft two)</a></li>
            <li><a href="<?php echo base_url('masspmdissertations3') ?>"><i class="fa fa-angle-double-right"></i> Dissertations (Draft three)</a></li>
           
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-graduation-cap"></i>
            <span>PHD Students</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('allphdstudents') ?>"><i class="fa fa-angle-double-right"></i> All PHD students</a></li>
            <li><a href="<?php echo base_url('activephdstudents') ?>"><i class="fa fa-angle-double-right"></i> Active PHD students</a></li>
            <li><a href="<?php echo base_url('inactivephdstudents') ?>"><i class="fa fa-angle-double-right"></i> Inactive PHD students</a></li>
           
          </ul>
        </li>
     
        
      </ul>
    <?php }else if(strcmp('student',$userrole)==0){?>
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">
        <li> <a href="<?php echo base_url('studenthome') ?>">
            <i class="fa fa-home"></i>
            <span>Home</span>
          </a></li>
          <li> <a href="<?php echo base_url('noticeboard') ?>">
            <i class="fa fa-bullhorn"></i>
            <span>Notice Board</span>
          </a></li>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Your progress</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li><a href="<?php echo base_url('my_progress') ?>"><i class="fa fa-angle-double-right"></i> Project Progress</a></li>
           
          </ul> 
        </li> -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Self registrtion</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('Enrollment') ?>"><i class="fa fa-angle-double-right"></i> Semester enrollment</a></li>
            
           
          </ul>
        </li> -->
   
      </ul>
    <?php }else{ 
     // header('location:'.base_url());
    } ?>
    </section>
    <!-- /.sidebar -->
    <div class="sidebar-footer">
    <?php if($userrole=='student'){ ?>
      <a href="<?php echo base_url('studenthome'); ?>" class="link" data-toggle="tooltip" title="" data-original-title="Home"><i class="fa fa-home"></i></a>
    <?php }else{ ?>
      <a href="<?php echo base_url('staffhome'); ?>" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i class="fa fa-home"></i></a>
    <?php } ?>
		<!-- item-->
	
		<!-- item-->
		<a href="" class="link" data-toggle="tooltip" title="" ><i class="fa fa-useri"></i></a>
		<!-- item-->
		<a href="<?php echo base_url('logout') ?>" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="fa fa-power-off"></i></a>
	</div>
  </aside>