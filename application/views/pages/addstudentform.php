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
     
      <!-- /.row -->
	  <?php if(isset($studentslist)){ ?>
            <div class="box">
            <div class="box-header" style="background-color:darkred;color:white;">
              <h3 class="box-title"><?php echo $heading; ?></h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
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
						<th>Semester</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                <?php 
                     $i=1;
                    foreach($studentslist->result() as $row){
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
						<td><?php echo $row->Semester; ?></td>
						<td><a href="<?php echo base_url("Student_progress/".$row->Id); ?>" class="btn btn-info btn-xs pull-right">View  Progress</a></td>
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
						<th>Semester</th>
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
      <?php if(isset($research_progress)){ 
          if($research_progress->num_rows()>0){
            ?>
           <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">

          <li>
              

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> lkjhgf</span>

                <h3 class="timeline-header">STUDENT INFO</h3>

                <div class="timeline-body">
                  <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="info-box bg-danger">
                        <span class="info-box-icon push-bottom"><i class="fa fa-user"></i></span>

                        <div class="info-box-content">
                          <h3 >ISABIRYE TAIBU</h3>
                          <span class="info-box-number">MSW</span>

                          <div class="progress">
                           <hr>
                          </div>
                          <span class="progress-description">
                                 23445857575 16/U/20495
                              </span>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                  </div>
                
                </div>

                <div class="timeline-footer text-right">
                
               
                </div>
              </div>
            </li>
            <!-- timeline time label -->
            <?php 
              $i=1;
                 foreach($research_progress->result() as $row){
                    // $image="assets/images/students/".$row->photo;
                     ?>
            <li class="time-label">
                  <span class="bg-danger">
                   <?php echo $row->date ?>
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-book bg-blue"></i>

              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> <?php echo $row->time ?></span>

                <h3 class="timeline-header"><?php echo $row->item ?></h3>

                <div class="timeline-body">
                <p><?php echo $row->description ?></p>
                
                </div>

                <div class="timeline-footer text-right">
                <hr>
                 <?php if($row->attatchment!=NULL){ ?>
                 <h4 style="width:100%;"> 
                 <span style="float:left;">
                 <?php if(!isset($student)){ ?>
                 <button type="button" class="btn btn-info btn-flat pull-right btn-xs" data-toggle="modal" data-target="#modal-info<?php echo $row->id ?>">
                   Add comment / Feedback
                   </button>
                 <?php } ?>
                 </span>
                 <span>Attatcment :</span>
                  <a href="<?php echo base_url('assets/images/researchattatchments/'.$row->attatchment);?>" class=""><span><img style="width:30px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""></span><span style="font-size:12px;margin-right:20px;color:blue;"><?php echo $row->attatchment ?></span></a>
                  
                  <a href="<?php echo base_url('assets/images/researchattatchments/'.$row->attatchment);?>" class="btn btn-danger btn-xs">Download attatchment</a>
                  </h4>
                 <?php } ?>
                </div>
              </div>
            </li>
           
           

            <div class="modal modal-info fade in" id="modal-info<?php echo $row->id ?>" style="display: none; padding-right: 17px;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">FEEDBACK / COMMENT</h4>
                      </div>
                      <form action="<?php echo base_url('submitfeedback') ?>" method="post">
                      <div class="modal-body" style="background-color:white;color:black;">
                        <div style="color:black;">
                            <input type="hidden" name="studentid" value="<?php echo $studentid ?>">  
                            <input type="hidden" name="record" value="<?php echo $row->id ?>">
                            <textarea name="feedback" id="" cols="30" rows="10" class='form-control'>
                            
                            </textarea>
                         
                        </div>
                      </div>
                      <div class="modal-footer" style="background-color:whitesmoke;">
                        <button type="button" class="btn  pull-left btn-danger" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn  btn-info" value="Submit Feedback">
                      </div>
                      </form>
                    </div>
                  </div>
                
                </div>

            <li>
              <i class="fa fa-book bg-purple"></i>

              <div class="timeline-item">
                

                <h3 class="timeline-header">Cordinator Comments / Feedback</h3>

                <div class="timeline-body">
                <ol>
                <?php 
                  if(isset($research_feedback)){
                    $counter=0;
                 foreach($research_feedback->result() as $row2){
                    // $image="assets/images/students/".$row->photo;
                    if(($row2->role=='cordinator')&($row2->feedbackto==$row->id)){
                     ?>
                <li><p><?php echo $row2->feedback ?></p>
                <span class="time"><i class="fa fa-clock-o"></i> <?php echo $row2->date.' - '.$row2->time ?></span></li>
                <hr>
                 <?php } } }if($counter==0){?>
                  <p style="text-align:center">There is no feedback from Project Cordinator</p>
                 <?php } ?>
               
                </ol>
                  
                </div>
              
                <div class="timeline-footer text-right">
               
                
                </div>
              </div>
            
             
              <div class="timeline-item">
                

                <h3 class="timeline-header">Supervisor Comments / Feedback</h3>

                <div class="timeline-body">
                <ol>
                <?php 
                  if(isset($research_feedback)){
                    $counter2=0;
                 foreach($research_feedback->result() as $row2){
                    // $image="assets/images/students/".$row->photo;
                    if(($row2->role=='supervisor')&($row2->feedbackto==$row->id)){
                     ?>
                <li><p><?php echo $row2->feedback ?></p>
                <span class="time"><b><i class="fa fa-clock-o"></i> <?php echo $row2->date.' - '.$row2->time ?></b></span></li>
                <hr>
                 <?php } $counter2++; } }if($counter2==0){?>
                  <p style="text-align:center">There is no feedback from Project Supervisor</p>
                 <?php } ?>
                </ol>
                  
                </div>
              
                <div class="timeline-footer text-right">
                
                
                </div>
              </div>
           
              <div class="timeline-item">
                

                <h3 class="timeline-header">HOD Comments / Feedback</h3>

                <div class="timeline-body">
                <ol>
                <?php 
                  if(isset($research_feedback)){
                    $counter3=0;
                 foreach($research_feedback->result() as $row2){
                    // $image="assets/images/students/".$row->photo;
                    if(($row2->role=='HOD')&($row2->feedbackto==$row->id)){
                     ?>
                <li><p><?php echo $row2->feedback ?></p>
                <span class="time"><i class="fa fa-clock-o"></i> <?php echo $row2->date.' - '.$row2->time ?></span></li>
                <hr>
                 <?php }$counter3++; } }if($counter3==0){?>
                  <p style="text-align:center">There is no feedback from HOD</p>
                 <?php } ?>
                </ol>
                  
                </div>
              
                <div class="timeline-footer text-right">
                <!-- <button type="button" class="btn btn-info btn-flat pull-right btn-xs" data-toggle="modal" data-target="#modal-info<?php echo $row->id ?>">
                 Add comment / Feedback
              </button> -->
             
                
                </div>
              </div>
            </li>
            <?php } ?>
            <!-- END timeline item -->
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <?php }else{ ?>
        <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
           
            <!-- timeline item -->
            <li>
             
              <div class="timeline-item">
               

                <h3 class="timeline-header"><a href="#">No progress to show</h3>

                <div class="timeline-body">
                <br>
                <p style="text-align:center">This student has not submitted any research/progress report since enrollement to the program</p>
                  <br>
                </div>
                <div class="timeline-footer text-right">
                  <!-- <a class="btn btn-primary btn-xs">Read more</a>
                  <a class="btn btn-danger btn-xs">Delete</a> -->
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            
           
          </ul>
        </div>
        <!-- /.col -->
      </div>
      <?php } } ?>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
	 
	  
<?php $this->load->view('templates/foot'); ?>

	
</body>
</html>
