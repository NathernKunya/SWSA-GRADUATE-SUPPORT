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
        SWSA GRADUATE SUPPORT
        <!-- <small>Control panel</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    
    <?php //$this->load->view('templates/statusmessage') ?>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <?php $this->load->view('templates/statusmessage') ?>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row" >
        <div class="col-xs-12">
        <?php if(isset($addform)){ ?>
          <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">POST TO THE NOTICE BOARD</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <form action="<?php echo base_url('sendmessage') ?>" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-12">
               <input type="hidden" name="messagetype" value="notice">
            	<div class="form-group clearfix">
				  <label for="example-text-input" class="col-sm-2 col-form-label">POST TITLE</label>
				  <div class="col-sm-10">
					<input class="form-control" type="text" name="subject" placeholder="Last name" required>
				  </div>
				</div>
				<div class="form-group clearfix">
				  <label for="example-text-input" class="col-sm-2 col-form-label">SEND TO:</label>
				  <div class="col-sm-3">
                  <div class="checkbox">
                      <input type="checkbox" name="to" value="1" id="Remember">
                      <label for="Remember"  style="color:black;">Students</label> 
                    </div>
				  </div>
                  <div class="col-sm-3">
                  <div class="checkbox">
                      <input type="checkbox" name="to" value="1" id="staffonly">
                      <label for="staffonly"  style="color:black;">Staff</label> 
                    </div>
				  </div>
				</div>
				<div class="form-group clearfix">
				  <label for="example-number-input" class="col-sm-2 col-form-label">POST</label>
				  <div class="col-sm-10">
                    <div class="description-editor text-form-editor">
                        <textarea  style="max-height:200px;" placeholder="Description" id="editor1" name="message" required></textarea>
                    </div>
				  </div>
				</div>
        <div class="form-group clearfix">
        <div class="box-footer">
        
            <button type="submit" class="btn btn-info pull-left">POST DETAILS</button>
        </div>
        </div>
        </div>
        <!-- /.col -->
       </div>
        <!-- /.row -->
      </form>
        </div>
        <!-- /.box-body -->
      </div>
      <?php } ?>


        <?php if(isset($allteachers)){ ?>
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Research  staff</h3>
              <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-hover display nowrap margin-top-10">
				<thead>
					<tr style="background-color:whitesmoke;">
             <td>PHOTO</td>
            <td>ID</td>
						<th>Name</th>
						<th>Gender</th>
						<th>Email</th>
						<th>phone</th>
						<th>Office</th>
            <th>ROLE</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
                <?php 
                     $i=1;
                    foreach($allteachers->result() as $row){
                     $image="assets/images/teachers/".$row->photo;
                     $image2="assets/images/teachers/avator.jpg";
                     ?>
					<tr>
            <td><img src="<?php echo ($row->photo)!=''?base_url($image):base_url($image2); ?>" alt="" srcset="" style="width:40px;height:40px;border-radius:10px;"></td>
            <td><?php echo $row->staffid; ?></td>
						<td><?php echo $row->lastname.' '.$row->firstname; ?></td>
						<td><?php echo $row->gender; ?></td>
						<td><?php echo $row->email; ?></td>
						<td><?php echo $row->phone; ?></td>
						<td><?php echo $row->office; ?></td>
            <td><?php echo ($row->role==NULL)?"N / A":$row->role; ?></td>
						<td>
            <!-- <a href="" class="btn btn-success btn-xs pull-right">ASSIGN ROLE </a> -->
            <button type="button" style="margin-right:10px;" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#modal-role<?php echo $row->id ?>">
              ASSIGN ROLE
            </button>
            <button type="button" style="margin-right:10px;" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#modal-info<?php echo $row->id ?>">
              EDIT 
              </button>
            <!-- <a href="" class="btn btn-info btn-xs pull-right" style="margin-right:10px;">ASSIGN ROLE</a> -->
            </td>

            <div class="modal modal-info fade in" id="modal-role<?php echo $row->id ?>" style="display: none; padding-right: 17px;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">ASSIGN A ROLE / GRANT ACCESS</h4>
              </div>
              <form class="form-element" action="<?php echo base_url('submitstaff') ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body" style="background-color:white;color:black;">
                
                <div class="form-group clearfix">
                  <label for="example-search-input" class="col-sm-12 col-form-label">
                  <div class="checkbox">
                      <input type="checkbox" id="Remember<?php echo $row->id ?>">
                      <label for="Remember<?php echo $row->id ?>" style="color:black;">Head of Department</label> 
                    </div>
                    
                  </label>  
                </div>
                <div class="form-group clearfix">
                  <label for="example-search-input" class="col-sm-12 col-form-label">
                  <div class="checkbox">
                      <input type="checkbox" id="supervisor<?php echo $row->id ?>">
                      <label for="supervisor<?php echo $row->id ?>" style="color:black;">Project Supervisor</label> 
                    </div>
                   
                  </label>  
                </div>
                <div class="form-group clearfix">
                  <label for="example-search-input" class="col-sm-12 col-form-label">
                  <div class="checkbox">
                      <input type="checkbox" id="examiner<?php echo $row->id ?>">
                      <label for="examiner<?php echo $row->id ?>" style="color:black;">Project Examiner</label> 
                    </div>
                   
                  </label>  
                </div>
                
              </div>
              <div class="modal-footer" style="background-color:whitesmoke;">
                <button type="button" class="btn  pull-left btn-danger" data-dismiss="modal">Cancel</button>
                <a href="<?php echo base_url('opensemester/') ?>" class="btn  btn-info">Open Semester</a>
              </div>
              </form>
            </div>
          </div>
         
        </div>

            <div class="modal modal-info fade in" id="modal-info<?php echo $row->id ?>" style="display: none; padding-right: 17px;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                  <h4 class="modal-title">EDIT STAFF MEMBER INFO</h4>
                </div>
                <div class="modal-body" style="background-color:white;color:black;">
                <form action="<?php echo base_url('submitstaff') ?>" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-12">
            	<div class="form-group clearfix">
				  <label for="example-text-input" class="col-sm-2 col-form-label">LAST NAME</label>
				  <div class="col-sm-10">
					<input class="form-control" type="text"name="lastname" value="<?php echo $row->lastname; ?>" required>
				  </div>
				</div>
				<div class="form-group clearfix">
				  <label for="example-search-input" class="col-sm-2 col-form-label">FIRST NAME</label>
				  <div class="col-sm-10">
          <input name="firstname" class="form-control" type="text" value="<?php echo $row->firstname; ?>" required>
				  </div>
				</div>
				<div class="form-group clearfix">
				  <label for="example-email-input" class="col-sm-2 col-form-label">STAFFID</label>
				  <div class="col-sm-10">
          <input name="staffid" class="form-control" type="text" value="<?php echo $row->staffid; ?>">
				  </div>
				</div>
				<div class="form-group clearfix">
				  <label for="example-url-input" class="col-sm-2 col-form-label">OFFICE</label>
				  <div class="col-sm-10">
          <input name="office" class="form-control" type="text" value="<?php echo $row->office; ?>">
				  </div>
				</div>
				<div class="form-group clearfix">
				  <label for="example-tel-input" class="col-sm-2 col-form-label">GENDER</label>
				  <div class="col-sm-10">
          <select name="gender" class="form-control" type="text" required> 
               <option value="<?php echo $row->gender; ?>"><?php echo $row->gender; ?></option>
              <option value="male">Male</option>
              <option value="female">Female</option>
          </select>
				  </div>
				</div>
				<div class="form-group clearfix">
				  <label for="example-password-input" class="col-sm-2 col-form-label">PHONE</label>
				  <div class="col-sm-10">
          <input name="phone" class="form-control" type="text" value="<?php echo $row->phone; ?>">
				
				  </div>
				</div>
				<div class="form-group clearfix">
				  <label for="example-number-input" class="col-sm-2 col-form-label">EMAIL</label>
				  <div class="col-sm-10">
          <input name="email" class="form-control" type="email" value="<?php echo $row->email; ?>">
				  </div>
				</div>
        <div class="form-group clearfix">
				  <label for="example-number-input" class="col-sm-2 col-form-label">CHANGE PHOTO</label>
          <div class="col-sm-2">
             <img src="<?php echo ($row->photo)!=''?base_url($image):base_url($image2); ?>" alt="" srcset="" style="width:40px;height:40px;border-radius:10px;">
          </div>
				  <div class="col-sm-8">
					<input type="file" class="form-control" name="profilepic" placeholder="profile pic" >
				  </div>
				</div>
        <div class="modal-footer" style="background-color:white;">
                  <button type="button" class="btn  pull-left btn-danger" data-dismiss="modal">Cancel</button>
                  <button type="submit" action="<?php echo base_url('opensemester/') ?>" class="btn  btn-info">SUBMIT</a>
                </div>
        </div>
        <!-- /.col -->
       </div>
        <!-- /.row -->
      </form>
                  
                </div>
                
              </div>
            </div>
            <?php $i++; } ?>
          
          </tr>
          
          
         
        </div>
				</tbody>
				
				<tfoot style="background-color:whitesmoke;">
					<tr>
            <td>PHOTO</td>
            <td>ID</td>
						<th>Name</th>
						<th>Gender</th>
						<th>Email</th>
						<th>phone</th>
						<th>Office</th>
            <th>ROLE</th>
						<th>Action</th>
					</tr>
				</tfoot>
			</table>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        <?php } ?>






        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- /.row (main row) -->

      <div class="row">
        <div class="col-md-3">
          <!-- <a href="#" class="btn btn-success btn-block btn-shadow margin-bottom">Compose</a> -->
          <?php if(isset($allmymessages) || isset($mymessage)){ ?>
          <div class="box box-solid">
            <div class="box-header with-border" style="background-color:darkred;color:white;">
              <h3 class="box-title">CHOOSE VIEW</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding mailbox-nav">
              <ul class="nav nav-pills nav-stacked">
                <li class="<?php echo (isset($allmymessages))?"active":""; ?>"><a href="<?php echo base_url('noticeboard'); ?>"><i class="fa fa-angle-double-right"></i> Summary view
                  <!-- <span class="label label-success pull-right">12</span> -->
                  </a></li>
                <li class="<?php echo (isset($mymessage))?"active":""; ?>"><a href="<?php echo base_url('noticeboard/Details'); ?>"><i class="fa fa-angle-double-right"></i></i> Detailed View</a></li>
                
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border" style="background-color:darkred;color:white;">
              <h3 class="box-title">NOTICE BOARD</h3>
              <?php } ?>

              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <?php if(isset($allmymessages)){ ?>
            <div class="box-body no-padding">
              
              <div class="table-responsive mailbox-messages"  style="min-height:500px;">
                <table class="table table-hover table-striped">
                  <tbody>
                  <?php 
                      if($allmymessages->num_rows()>0){
                          foreach($allmymessages->result() as $row){
                      ?>
                  <tr>
                    <td><div class="icheckbox_flat-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                    <td class="mailbox-name"><?php echo $row->firstname.' '.$row->lastname; ?></td>
                    <td class="mailbox-subject"><a href="<?php echo base_url('noticeboard/'.$row->id) ?>"><b>Notice </b> - <?php echo $row->subject; ?></a>
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date"><b><?php echo $row->date.' '.$row->time; ?></b></td>
                  </tr>
                 
                    <?php } } ?>
                   
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <?php }elseif(isset($mymessage)){  ?>

                <?php 
                      if($mymessage->num_rows()>0){
                          foreach($mymessage->result() as $row){
                            $image="assets/images/teachers/".$row->photo;
                            $image2="assets/images/teachers/avator.jpg";
                      ?>
            <div class="box-body no-padding" style="min-height:500px;margin-top:40px;">
              <div class="mailbox-read-info clearfix" style="background-color:whitesmoke;">
				<div class="left-float margin-r-5" >
                <a href="#"><img src="<?php echo ($row->photo)!=''?base_url($image):base_url($image2); ?>" alt="user" width="40" class="img-circle" style="width:40px;height:40px;border-radius:30px;"></a></div>
                <h4 class="no-margin"> 
                 <span>
                 <small>From: <?php echo $row->firstname.' '.$row->lastname; ?></small><br>
                <small><b><?php echo $row->role; ?></b> </small>
                 </span>
                
                    
                  <span class="mailbox-read-time pull-right"><?php echo $row->date.' '.$row->time; ?><br>
                  <b>To: </b>All Students
                  </span>
                </h4>
              </div>
              <div class="mailbox-read-info">
                <h3><?php echo $row->subject; ?></h3>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border clearfix">                
                
                
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">

                <p><?php echo $row->message; ?></p>

              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <?php } } }else{}?>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
	 
	  
<?php $this->load->view('templates/foot'); ?>

	
</body>
</html>
