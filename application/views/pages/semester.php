<?php
    $session_data = $this->session->userdata('studentlogged_in');
    $userrole=$session_data['role'];
    $studentid=$session_data['id'];
    $name=$session_data['firstname'].' '.$session_data['lastname'];
    $program=$session_data['program'];
    $email=$session_data['email'];
    $phone=$session_data['phone'];
    $studentnumber=$session_data['studentnumber'];
    $regnumber=$session_data['regnumber'];
    $supervisor=$session_data['supervisor'];
    $researchtopic=$session_data['researchtopic'];
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('templates/head') ?>

     
  </head>

<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  <?php $this->load->view('templates/header') ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('templates/dashboard') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
        SWSA <small>graduate Support</small>
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
    <?php $this->load->view('templates/statusmessage') ?>
      <div class="row">
          
        <div class="col-xs-12">
          <div class="box box-default">
          <div class="callout callout-info ">
            <h4>CURRENT SEMESTER</h4>
               <h3>SEMESTER <?php echo $currentsemester->semesternumber; ?> | ACADEMIC YEAR <?php echo $currentsemester->academicyear; ?></h3>
            
           </div> 
          <div class="row">
        <!-- <div class="col-lg-3 col-xs-6">
       
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $currentsemester->MASSPM; ?></h3>

              <p>Enrolled to MASSPM</p>
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap"></i>
            </div>
            <a href="#" class="small-box-footer">MASSPM</a>
          </div>
        </div> -->
        <!-- ./col -->
        <!-- <div class="col-lg-3 col-xs-6">
        
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?php echo $currentsemester->MSW; ?></h3>

              <p>Enrolled to MSW</p>
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap"></i>
            </div>
            <a href="#" class="small-box-footer">MSW</a>
          </div>
        </div> -->
        <!-- ./col -->
        <!-- <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $currentsemester->PhD; ?></h3>

              <p>Enrolled to PhD</p>
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap"></i>
            </div>
            <a href="#" class="small-box-footer">PhD</a>
          </div>
        </div> -->
        <!-- ./col -->
        <!-- <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?php echo ($currentsemester->PhD+$currentsemester->MSW+$currentsemester->MASSPM); ?></h3>

              <p>Total Enrolled</p>
            </div>
            <div class="icon">
              <i class="fa fa-graduation-cap"></i>
            </div>
            <a href="#" class="small-box-footer">PhD + MSW + MASSPM</a>
          </div>
        </div> -->
        <!-- ./col -->
      </div>
            <div class="box-header with-border">
              <h3 class="box-title">ACTIVATE / DEACTIVATE SEMESTER</h3>
            </div>
           
            <div class="box-body">
            <?php if(strcmp($currentsemester->ended,'False')==0){ ?>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-close">
              <i class="fa fa-close"></i> CLOSE CURRENT SEMESTER 
              </button>
            <?php }else{ ?>
              <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-info">
                 OPEN NEW SEMESTER
              </button>
              <?php } ?> 
            </div>
          </div>
        </div>
      </div>
      <div class="modal modal-info fade in" id="modal-info" style="display: none; padding-right: 17px;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Confirm Action</h4>
              </div>
              <div class="modal-body" style="background-color:white;color:black;height:100px;">
              <?php
               $semester=($currentsemester->semesternumber==1)?2:1;
               $academicyear=($semester!=1)?date('Y').'-'.(date('Y')+1):(date('Y')+1).'-'.(date('Y')+2);
              ?>
                <h4 style="color:black;">Open semester <?php echo $semester; ?> academic year <?php echo $academicyear; ?>  ? </h4>
              </div>
              <div class="modal-footer" style="background-color:whitesmoke;">
                <button type="button" class="btn  pull-left btn-danger" data-dismiss="modal">Cancel</button>
                <a href="<?php echo base_url('opensemester/') ?>" class="btn  btn-info">Open Semester</a>
              </div>
            </div>
          </div>
         
        </div>

        <div class="modal modal-info fade in" id="modal-close" style="display: none; padding-right: 17px;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Confirm Action</h4>
              </div>
              <div class="modal-body" style="background-color:white;color:black;height:100px;">
                <h4 style="color:black;">Are you sure you want to close the current semester ? </h4>
              </div>
              <div class="modal-footer" style="background-color:whitesmoke;">
                <button type="button" class="btn  pull-left btn-danger" data-dismiss="modal">Cancel</button>
                <a href="<?php echo base_url('closesemester/'.$currentsemester->id) ?>" class="btn  btn-info">Close Semester</a>
              </div>
            </div>
          </div>
         
        </div>

     </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
	 
	  
<?php $this->load->view('templates/foot'); ?>

	
</body>
</html>
