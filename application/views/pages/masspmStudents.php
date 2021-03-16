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
    <?php $this->load->view('templates/statusmessage') ?>
      <!-- Small boxes (Stat box) -->
     
      <!-- /.row -->
	  <?php if(isset($protocolconcepts)){ ?>
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
                        <td>RegNumber</td>
						<th>LastName</th>
						<th>FirstName</th>
						<th>Date</th>
						<th>Time</th>
						<th>Attachment</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                <?php 
                     $i=1;
                    foreach($protocolconcepts->result() as $row){
                    // $image="assets/images/students/".$row->photo;
                     ?>
					<tr>
                        <td><?php echo $row->RegNumber; ?></td>
						<td><?php echo $row->LastName; ?></td>
						<td><?php echo $row->FirstName; ?></td>
						<td><?php echo $row->datepc; ?></td>
						<td><?php echo $row->timepc; ?></td>
						
						<td><a href="<?php echo base_url("assets/images/researchattatchments/".$row->protocol_concept); ?>" style="color:blue;"><img style="width:20px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""> <?php echo $row->protocol_concept; ?></a></td>
						<td>
            <?php if(strcmp('supervisor',$userrole)==0){ ?>
            <button type="button" style="margin-right:10px;" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#modal-addcomment<?php echo $row->id ?>">Add Comment </button>
            <?php }else{
              echo 'N / A';
            } ?>
            </td>
                      </tr>
                      <div class="modal modal-info fade in" id="modal-addcomment<?php echo $row->id ?>" style="display: none; padding-right: 17px;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">FEEDBACK / COMMENT ON PROTOCOL CONCEPT</h4>
                      </div>
                      <form action="<?php echo base_url('submitresearchProgress') ?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body" style="background-color:white;color:black;">
                        <div style="color:black;">
                            <input type="hidden" name="student" value="<?php echo $row->student ?>">  
                            <input type="hidden" name="type" value="commentonpc">
                            <div class="col-sm-12"><h5>Description / Short notes</h5></div>
                            <textarea name="feedback" id="" cols="30" rows="6" class='form-control'>
                            
                            </textarea>
                         
                        </div>
                        <br>
                        <div class="form-group">
                        <div class="col-sm-2"><h5>Attachment</h5></div>
                        <div class="col-sm-10">
                        <div class="btn btn-primary btn-file pull-left">
                            <i class="fa fa-paperclip"></i> Attachment
                            <input type="file" name="commentedfile"  required>
                          </div>
                        
                        </div>
                      </div>
                      <br><br>
                      </div>
                      <div class="modal-footer" style="background-color:whitesmoke;">
                        <button type="button" class="btn  pull-left btn-danger" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn  btn-info" value="Submit Feedback">
                      </div>
                      </form>
                    </div>
                  </div>
                
                    </div>
                <?php $i++; } ?>
					
				</tbody>
				
				<tfoot style="background-color:whitesmoke;">
				<tr style="background-color:whitesmoke;">
                        <td>RegNumber</td>
						<th>LastName</th>
						<th>FirstName</th>
						<th>Date</th>
						<th>Time</th>
						<th>Attachment</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>   
            </div>
            <!-- /.box-body -->
          </div>
        <?php } ?>


        <!-- /.row -->
	  <?php if(isset($masspmprotocolconcept2)){ ?>
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
                        <td>RegNumber</td>
						<th>LastName</th>
						<th>FirstName</th>
						<th>Date</th>
						<th>Time</th>
						<th>Attachment</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                <?php 
                     $i=1;
                    foreach($masspmprotocolconcept2->result() as $row){
                    // $image="assets/images/students/".$row->photo;
                     ?>
					<tr>
                        <td><?php echo $row->RegNumber; ?></td>
						<td><?php echo $row->LastName; ?></td>
						<td><?php echo $row->FirstName; ?></td>
						<td><?php echo $row->daterc; ?></td>
						<td><?php echo $row->timerc; ?></td>
						
						<td><a href="<?php echo base_url("assets/images/researchattatchments/".$row->revised_concept); ?>" style="color:blue;"><img style="width:20px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""> <?php echo $row->revised_concept; ?></a></td>
						<td>
            <?php if(strcmp('supervisor',$userrole)==0){ ?>
            <button type="button" style="margin-right:10px;" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#modal-addcomment<?php echo $row->id ?>">Add Comment </button>
            <?php }else{
              echo 'N / A';
            } ?>
           
                      </tr>
                      <div class="modal modal-info fade in" id="modal-addcomment<?php echo $row->id ?>" style="display: none; padding-right: 17px;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">FEEDBACK / COMMENT ON PROTOCOL CONCEPT PHASE 2</h4>
                      </div>
                      <form action="<?php echo base_url('submitresearchProgress') ?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body" style="background-color:white;color:black;">
                        <div style="color:black;">
                            <input type="hidden" name="student" value="<?php echo $row->student ?>">  
                            <input type="hidden" name="type" value="commentonpc2">
                            <textarea name="feedback" id="" cols="30" rows="10" class='form-control'>
                            
                            </textarea>
                         
                        </div>
                        <br>
                        <div class="form-group">
                        <div class="col-sm-2"><h5>Attachment</h5></div>
                        <div class="col-sm-10">
                        <div class="btn btn-primary btn-file pull-left">
                            <i class="fa fa-paperclip"></i> Attachment
                            <input type="file" name="commentedfile"  required>
                          </div>
                        
                        </div>
                      </div>
                      <br><br>
                      </div>
                      <div class="modal-footer" style="background-color:whitesmoke;">
                        <button type="button" class="btn  pull-left btn-danger" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn  btn-info" value="Submit Feedback">
                      </div>
                      </form>
                    </div>
                  </div>
                
                    </div>
                <?php $i++; } ?>
					
				</tbody>
				
				<tfoot style="background-color:whitesmoke;">
				<tr style="background-color:whitesmoke;">
                        <td>RegNumber</td>
						<th>LastName</th>
						<th>FirstName</th>
						<th>Date</th>
						<th>Time</th>
						<th>Attachment</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>   
            </div>
            <!-- /.box-body -->
          </div>
        <?php } ?>


        <!-- /.row -->
	  <?php if(isset($masspmresearchproposals)){ ?>
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
                        <td>RegNumber</td>
						<th>LastName</th>
						<th>FirstName</th>
						<th>Date</th>
						<th>Time</th>
						<th>Attachment</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                <?php 
                     $i=1;
                    foreach($masspmresearchproposals->result() as $row){
                    // $image="assets/images/students/".$row->photo;
                     ?>
					<tr>
                        <td><?php echo $row->RegNumber; ?></td>
						<td><?php echo $row->LastName; ?></td>
						<td><?php echo $row->FirstName; ?></td>
						<td><?php echo $row->datep; ?></td>
						<td><?php echo $row->timep; ?></td>
						
						<td><a href="<?php echo base_url("assets/images/researchattatchments/".$row->proposal); ?>" style="color:blue;"><img style="width:20px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""> <?php echo $row->proposal; ?></a></td>
						<td>
            <?php if(strcmp('supervisor',$userrole)==0){ ?>
            <button type="button" style="margin-right:10px;" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#modal-addcomment<?php echo $row->id ?>">Add Comment </button>
            <?php }else{
              echo 'N / A';
            } ?>
            </td>
                      </tr>
                      <div class="modal modal-info fade in" id="modal-addcomment<?php echo $row->id ?>" style="display: none; padding-right: 17px;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">FEEDBACK / COMMENT ON RESEARCH PROPOSAL 1</h4>
                      </div>
                      <form action="<?php echo base_url('submitresearchProgress') ?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body" style="background-color:white;color:black;">
                        <div style="color:black;">
                            <input type="hidden" name="student" value="<?php echo $row->student ?>">  
                            <input type="hidden" name="type" value="commentonproposal1">
                            <textarea name="feedback" id="" cols="30" rows="10" class='form-control'>
                            
                            </textarea>
                         
                        </div>
                        <br>
                        <div class="form-group">
                        <div class="col-sm-2"><h5>Attachment</h5></div>
                        <div class="col-sm-10">
                        <div class="btn btn-primary btn-file pull-left">
                            <i class="fa fa-paperclip"></i> Attachment
                            <input type="file" name="commentedfile"  required>
                          </div>
                        
                        </div>
                      </div>
                      <br><br>
                      </div>
                      <div class="modal-footer" style="background-color:whitesmoke;">
                        <button type="button" class="btn  pull-left btn-danger" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn  btn-info" value="Submit Feedback">
                      </div>
                      </form>
                    </div>
                  </div>
                
                    </div>
                <?php $i++; } ?>
					
				</tbody>
				
				<tfoot style="background-color:whitesmoke;">
				<tr style="background-color:whitesmoke;">
            <td>RegNumber</td>
						<th>LastName</th>
						<th>FirstName</th>
						<th>Date</th>
						<th>Time</th>
						<th>Attachment</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>   
            </div>
            <!-- /.box-body -->
          </div>
        <?php } ?>


        <!-- /.row -->
	  <?php if(isset($masspmresearchproposals2)){ ?>
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
            <td>RegNumber</td>
						<th>LastName</th>
						<th>FirstName</th>
						<th>Date</th>
						<th>Time</th>
						<th>Attachment</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                <?php 
                     $i=1;
                    foreach($masspmresearchproposals2->result() as $row){
                    // $image="assets/images/students/".$row->photo;
                     ?>
					<tr>
           <td><?php echo $row->RegNumber; ?></td>
						<td><?php echo $row->LastName; ?></td>
						<td><?php echo $row->FirstName; ?></td>
						<td><?php echo $row->daterp; ?></td>
						<td><?php echo $row->timerp; ?></td>
						
						<td><a href="<?php echo base_url("assets/images/researchattatchments/".$row->revised_proposal); ?>" style="color:blue;"><img style="width:20px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""> <?php echo $row->revised_proposal; ?></a></td>
						<td>
            <?php if(strcmp('supervisor',$userrole)==0){ ?>
              <a href="<?php echo base_url('forwardproposal_to_ma_sspm_cordinator/'.$row->student); ?>"  style="margin-right:10px;" class="btn btn-info btn-xs pull-right" >Foward to Cordinator</a>
            <?php }else{
              echo 'N / A';
            } ?>
            
            </td>
                      </tr>

                <?php $i++; } ?>
					
				</tbody>
				
				<tfoot style="background-color:whitesmoke;">
				<tr style="background-color:whitesmoke;">
            <td>RegNumber</td>
						<th>LastName</th>
						<th>FirstName</th>
						<th>Date</th>
						<th>Time</th>
						<th>Attachment</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>   
            </div>
            <!-- /.box-body -->
          </div>
        <?php } ?>


        <!-- /.row -->
	  <?php if(isset($masspmquestionaires)){ ?>
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
                        <td>RegNumber</td>
						<th>LastName</th>
						<th>FirstName</th>
						<th>Date</th>
						<th>Time</th>
						<th>Attachment</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                <?php 
                     $i=1;
                    foreach($masspmquestionaires->result() as $row){
                    // $image="assets/images/students/".$row->photo;
                     ?>
					<tr>
                        <td><?php echo $row->RegNumber; ?></td>
						<td><?php echo $row->LastName; ?></td>
						<td><?php echo $row->FirstName; ?></td>
						<td><?php echo $row->datepc; ?></td>
						<td><?php echo $row->timepc; ?></td>
						
						<td><a href="<?php echo base_url("assets/images/researchattatchments/".$row->quantitativenotes_and_questionaires); ?>" style="color:blue;"><img style="width:20px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""> <?php echo $row->quantitativenotes_and_questionaires; ?></a></td>
						<td>
            <?php if(strcmp('supervisor',$userrole)==0){ ?>
            <button type="button" style="margin-right:10px;" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#modal-addcomment<?php echo $row->id ?>">Add Comment </button>
            <?php }else{
              echo 'N / A';
            } ?>
            </td>
                      </tr>
                      <div class="modal modal-info fade in" id="modal-addcomment<?php echo $row->id ?>" style="display: none; padding-right: 17px;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">FEEDBACK / COMMENT ON PROTOCOL CONCEPT</h4>
                      </div>
                      <form action="<?php echo base_url('submitresearchProgress') ?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body" style="background-color:white;color:black;">
                        <div style="color:black;">
                            <input type="hidden" name="student" value="<?php echo $row->student ?>">  
                            <input type="hidden" name="type" value="commentonpc">
                            <textarea name="feedback" id="" cols="30" rows="10" class='form-control'>
                            
                            </textarea>
                         
                        </div>
                        <br>
                        <div class="form-group">
                        <div class="col-sm-2"><h5>Attachment</h5></div>
                        <div class="col-sm-10">
                        <div class="btn btn-primary btn-file pull-left">
                            <i class="fa fa-paperclip"></i> Attachment
                            <input type="file" name="commentedfile"  required>
                          </div>
                        
                        </div>
                      </div>
                      <br><br>
                      </div>
                      <div class="modal-footer" style="background-color:whitesmoke;">
                        <button type="button" class="btn  pull-left btn-danger" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn  btn-info" value="Submit Feedback">
                      </div>
                      </form>
                    </div>
                  </div>
                
                    </div>
                <?php $i++; } ?>
					
				</tbody>
				
				<tfoot style="background-color:whitesmoke;">
				<tr style="background-color:whitesmoke;">
                        <td>RegNumber</td>
						<th>LastName</th>
						<th>FirstName</th>
						<th>Date</th>
						<th>Time</th>
						<th>Attachment</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>   
            </div>
            <!-- /.box-body -->
          </div>
        <?php } ?>


        <!-- /.row -->
	  <?php if(isset($masspmdissertations)){ ?>
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
                        <td>RegNumber</td>
						<th>LastName</th>
						<th>FirstName</th>
						<th>Date</th>
						<th>Time</th>
						<th>Attachment</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                <?php 
                     $i=1;
                    foreach($masspmdissertations->result() as $row){
                    // $image="assets/images/students/".$row->photo;
                     ?>
					<tr>
                        <td><?php echo $row->RegNumber; ?></td>
						<td><?php echo $row->LastName; ?></td>
						<td><?php echo $row->FirstName; ?></td>
						<td><?php echo $row->dateds1; ?></td>
						<td><?php echo $row->timeds1; ?></td>
						
						<td><a href="<?php echo base_url("assets/images/researchattatchments/".$row->dissertation1); ?>" style="color:blue;"><img style="width:20px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""> <?php echo $row->dissertation1; ?></a></td>
						<td>
            <?php if(strcmp('supervisor',$userrole)==0){ ?>
            <button type="button" style="margin-right:10px;" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#modal-addcomment<?php echo $row->id ?>">Add Comment </button>
            <?php }else{
              echo 'N / A';
            } ?>
            </td>
                      </tr>
                      <div class="modal modal-info fade in" id="modal-addcomment<?php echo $row->id ?>" style="display: none; padding-right: 17px;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">FEEDBACK / COMMENT ON PROTOCOL DISSERTATION 1</h4>
                      </div>
                      <form action="<?php echo base_url('submitresearchProgress') ?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body" style="background-color:white;color:black;">
                        <div style="color:black;">
                            <input type="hidden" name="student" value="<?php echo $row->student ?>">  
                            <input type="hidden" name="type" value="commentondissertation1">
                            <textarea name="feedback" id="" cols="30" rows="10" class='form-control'>
                            
                            </textarea>
                         
                        </div>
                        <br>
                        <div class="form-group">
                        <div class="col-sm-2"><h5>Attachment</h5></div>
                        <div class="col-sm-10">
                        <div class="btn btn-primary btn-file pull-left">
                            <i class="fa fa-paperclip"></i> Attachment
                            <input type="file" name="commentedfile"  required>
                          </div>
                        
                        </div>
                      </div>
                      <br><br>
                      </div>
                      <div class="modal-footer" style="background-color:whitesmoke;">
                        <button type="button" class="btn  pull-left btn-danger" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn  btn-info" value="Submit Feedback">
                      </div>
                      </form>
                    </div>
                  </div>
                
                    </div>
                <?php $i++; } ?>
					
				</tbody>
				
				<tfoot style="background-color:whitesmoke;">
				<tr style="background-color:whitesmoke;">
                        <td>RegNumber</td>
						<th>LastName</th>
						<th>FirstName</th>
						<th>Date</th>
						<th>Time</th>
						<th>Attachment</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>   
            </div>
            <!-- /.box-body -->
          </div>
        <?php } ?>

        <!-- /.row -->
	  <?php if(isset($masspmdissertations2)){ ?>
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
                        <td>RegNumber</td>
						<th>LastName</th>
						<th>FirstName</th>
						<th>Date</th>
						<th>Time</th>
						<th>Attachment</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                <?php 
                     $i=1;
                    foreach($masspmdissertations2->result() as $row){
                    // $image="assets/images/students/".$row->photo;
                     ?>
					<tr>
                        <td><?php echo $row->RegNumber; ?></td>
						<td><?php echo $row->LastName; ?></td>
						<td><?php echo $row->FirstName; ?></td>
						<td><?php echo $row->dateds2; ?></td>
						<td><?php echo $row->timeds2; ?></td>
						
						<td><a href="<?php echo base_url("assets/images/researchattatchments/".$row->dissertation2); ?>" style="color:blue;"><img style="width:20px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""> <?php echo $row->dissertation2; ?></a></td>
						<td>
            <?php if(strcmp('supervisor',$userrole)==0){ ?>
            <button type="button" style="margin-right:10px;" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#modal-addcomment<?php echo $row->id ?>">Add Comment </button>
            <?php }else{
              echo 'N / A';
            } ?>
            </td>
                      </tr>
                      <div class="modal modal-info fade in" id="modal-addcomment<?php echo $row->id ?>" style="display: none; padding-right: 17px;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">FEEDBACK / COMMENT ON PROTOCOL CONCEPT</h4>
                      </div>
                      <form action="<?php echo base_url('submitresearchProgress') ?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body" style="background-color:white;color:black;">
                        <div style="color:black;">
                            <input type="hidden" name="student" value="<?php echo $row->student ?>">  
                            <input type="hidden" name="type" value="commentondissertation2">
                            <textarea name="feedback" id="" cols="30" rows="10" class='form-control'>
                            
                            </textarea>
                         
                        </div>
                        <br>
                        <div class="form-group">
                        <div class="col-sm-2"><h5>Attachment</h5></div>
                        <div class="col-sm-10">
                        <div class="btn btn-primary btn-file pull-left">
                            <i class="fa fa-paperclip"></i> Attachment
                            <input type="file" name="commentedfile"  required>
                          </div>
                        
                        </div>
                      </div>
                      <br><br>
                      </div>
                      <div class="modal-footer" style="background-color:whitesmoke;">
                        <button type="button" class="btn  pull-left btn-danger" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn  btn-info" value="Submit Feedback">
                      </div>
                      </form>
                    </div>
                  </div>
                
                    </div>
                <?php $i++; } ?>
					
				</tbody>
				
				<tfoot style="background-color:whitesmoke;">
				<tr style="background-color:whitesmoke;">
                        <td>RegNumber</td>
						<th>LastName</th>
						<th>FirstName</th>
						<th>Date</th>
						<th>Time</th>
						<th>Attachment</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>   
            </div>
            <!-- /.box-body -->
          </div>
        <?php } ?>
      
           <!-- /.row -->
	  <?php if(isset($masspmdissertations3)){ ?>
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
                        <td>RegNumber</td>
						<th>LastName</th>
						<th>FirstName</th>
						<th>Date</th>
						<th>Time</th>
						<th>Attachment</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                <?php 
                     $i=1;
                    foreach($masspmdissertations3->result() as $row){
                    // $image="assets/images/students/".$row->photo;
                     ?>
					<tr>
                        <td><?php echo $row->RegNumber; ?></td>
						<td><?php echo $row->LastName; ?></td>
						<td><?php echo $row->FirstName; ?></td>
						<td><?php echo $row->dateds3; ?></td>
						<td><?php echo $row->timeds3; ?></td>
						
						<td><a href="<?php echo base_url("assets/images/researchattatchments/".$row->dissertation3); ?>" style="color:blue;"><img style="width:20px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""> <?php echo $row->dissertation3; ?></a></td>
						<td>
            <?php if(strcmp('supervisor',$userrole)==0){ ?>
              <a href="<?php echo base_url('forwarddissertation_to_examination/'.$row->student); ?>"  style="margin-right:10px;" class="btn btn-info btn-xs pull-right" >Foward to Cordinator</a>
            <?php }else{
              echo 'N / A';
            } ?>
            
            </td>
                      </tr>
                <div class="modal modal-info fade in" id="modal-addcomment<?php echo $row->id ?>" style="display: none; padding-right: 17px;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">FEEDBACK / COMMENT ON PROTOCOL CONCEPT</h4>
                      </div>
                      <form action="<?php echo base_url('submitresearchProgress') ?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body" style="background-color:white;color:black;">
                        <div style="color:black;">
                            <input type="hidden" name="student" value="<?php echo $row->student ?>">  
                            <input type="hidden" name="type" value="commentonpc">
                            <textarea name="feedback" id="" cols="30" rows="10" class='form-control'>
                            
                            </textarea>
                         
                        </div>
                        <br>
                        <div class="form-group">
                        <div class="col-sm-2"><h5>Attachment</h5></div>
                        <div class="col-sm-10">
                        <div class="btn btn-primary btn-file pull-left">
                            <i class="fa fa-paperclip"></i> Attachment
                            <input type="file" name="commentedfile"  required>
                          </div>
                        
                        </div>
                      </div>
                      <br><br>
                      </div>
                      <div class="modal-footer" style="background-color:whitesmoke;">
                        <button type="button" class="btn  pull-left btn-danger" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn  btn-info" value="Submit Feedback">
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                <?php $i++; } ?>
					
				</tbody>
				
				<tfoot style="background-color:whitesmoke;">
				<tr style="background-color:whitesmoke;">
                        <td>RegNumber</td>
						<th>LastName</th>
						<th>FirstName</th>
						<th>Date</th>
						<th>Time</th>
						<th>Attachment</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>   
            </div>
            <!-- /.box-body -->
          </div>
        <?php } ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
	 
	  
<?php $this->load->view('templates/foot'); ?>

	
</body>
</html>
