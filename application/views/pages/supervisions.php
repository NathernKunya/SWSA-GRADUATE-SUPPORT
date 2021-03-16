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
        CHUSS GRADUATE SUPPORT
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <?php $this->load->view('templates/statusmessage') ?>
      <!-- Small boxes (Stat box) -->
      
      <!-- /.row -->
	  <?php if(isset($students_withoutsupervisors)){ ?>
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Students</h3>
              <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-hover display nowrap margin-top-10">
				<thead>
					<tr style="background-color:whitesmoke;">
                        <td>ID</td>
						<th>Name</th>
						<th>UserName</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Program</th>
						<th>Year</th>
					
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                <?php 
                     $i=1;
                    foreach($students_withoutsupervisors->result() as $row){
                    // $image="assets/images/students/".$row->photo;
                     ?>
					<tr>
                        <td><?php echo $row->RegNumber; ?></td>
						<td><?php echo $row->LastName.' '.$row->FirstName; ?></td>
						<td><?php echo $row->username; ?></td>
						<td><?php echo $row->studentsEmail; ?></td>
						<td><?php echo $row->studentsPhone; ?></td>
						<td><?php echo $row->Program; ?></td>
						<td><?php echo $row->Year; ?></td>
					
						<td><a href="<?php echo base_url("selectsupervisor/".$row->Id); ?>" class="btn btn-info btn-xs pull-right">Add supervisor</a></td>
                    </tr>
                    <?php $i++; } ?>
					
				</tbody>
				
				<tfoot style="background-color:whitesmoke;">
				<tr style="background-color:whitesmoke;">
                        <td>ID</td>
						<th>Name</th>
						<th>UserName</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Program</th>
						<th>Year</th>
					
						<th>Action</th>
					</tr>
				</tfoot>
			</table>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        <?php } ?>
      <!-- /.row (main row) -->
     

      <?php if(isset($asign)){ ?>
            <div class="box" style="padding:20px;">
            <?php echo validation_errors(); ?>
            <form action="<?php echo base_url('Submitstudentsupervisor') ?>" method="post" enctype="multipart/form-data">
            <div class="box-header">
              <h3 class="box-title">Assign Supervisor to student</h3>
              <?php foreach($student_details->result() as $student){ 
                  $student->Id;
                  ?>
              <h4 class="box-subtitle"><?php echo $student->RegNumber.' / '.$student->LastName.' '.$student->FirstName; ?></h4>
              <input type="hidden" name="student" value="<?php echo $student->Id; ?>">
              <?php } ?>
            </div>
                  
                 <div class="form-group">
                  <label>Select</label>
                  
                  <select class="form-control" name="supervisor" required>
                    <option value="">-- Select supervisor --</option>
                    <?php 
                     $i=1;
                    foreach($allsupervisors->result() as $row){
                    // $image="assets/images/students/".$row->photo;
                     ?>
                      <option value="<?php echo $row->id; ?>"><?php echo $row->staffid.' / '.$row->lastname.' '.$row->firstname; ?></option>
                    <?php $i++; } ?>
                  </select>
                </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Assign supervisor</button>
              </div>
             </form>
            <!-- /.box-header -->
          </div>
          <!-- /.box -->
        <?php } ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
	 
	  
<?php $this->load->view('templates/foot'); ?>

	
</body>
</html>
