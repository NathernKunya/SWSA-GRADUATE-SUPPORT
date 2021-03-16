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

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fa fa-graduation-cap"></i></span>

            <div class="info-box-content">
              <span class="info-box-number"><?php echo $allmsw; ?></span>
              <span class="info-box-text">MSW students</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fa fa-graduation-cap"></i></span>

            <div class="info-box-content">
              <span class="info-box-number"><?php echo $allphd; ?></span>
              <span class="info-box-text">PHD students</span>
            </div>
          </div>
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-graduation-cap"></i></span>

            <div class="info-box-content">
              <span class="info-box-number"><?php echo $allmasspm; ?></span>
              <span class="info-box-text">MASSPM students</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-number"><?php echo $allstaff; ?></span>
              <span class="info-box-text">Staff</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  <?php if(isset($allstudents)){ ?>
            <div class="box">
            <div class="box-header" style="background-color:darkred;color:white;">
              <h3 class="box-title">All Students</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
              <table id="example" class="table table-bordered table-hover display nowrap margin-top-10">
              <thead>
					<tr style="background-color:whitesmoke;">
          <tr style="background-color:whitesmoke;">
                        <td>ID</td>
						<th>Name</th>
						<th>UserName</th>
            <th>Supervisor</th>
            <th>Research Topic</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Program</th>
						<th>Year</th>
					
						<!-- <th>Action</th> -->
					</tr>
				</thead>
				<tbody>
                <?php 
                     $i=1;
                    foreach($allstudents->result() as $row){
                    // $image="assets/images/students/".$row->photo;
                     ?>
					<tr>
            <td><?php echo $row->RegNumber; ?></td>
						<td><?php echo $row->LastName.' '.$row->FirstName; ?></td>
						<td><?php echo $row->username; ?></td>
            <td><?php echo $row->lastname.' '.$row->firstname; ?></td>
            <td><?php echo $row->ResearchTopic; ?></td>
						<td><?php echo $row->studentsEmail; ?></td>
						<td><?php echo $row->studentsPhone; ?></td>
						<td><?php echo $row->Program; ?></td>
						<td><?php echo $row->Year; ?></td>
           <!--  <td><a href="<?php  echo base_url("Studentprogress/".$row->Id); ?>" class="btn btn-info btn-xs pull-right">View Progress</a></td> -->
					
						<!-- <td><a href="<?php // echo base_url("Student_progress/".$row->Id); ?>" class="btn btn-info btn-xs pull-right">View Progress</a></td> -->
                    </tr>
                    <?php $i++; } ?>
					
				</tbody>
				
				<tfoot style="background-color:whitesmoke;">
				<tr style="background-color:whitesmoke;">
                        <td>ID</td>
						<th>Name</th>
						<th>UserName</th>
            <th>Supervisor</th>
            <th>Research Topic</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Program</th>
						<th>Year</th>
					
						<!-- <th>Action</th> -->
					</tr>
				</tfoot>
			</table>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        <?php } ?>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
	 
	  
<?php $this->load->view('templates/foot'); ?>

	
</body>
</html>
