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
    
    <?php //$this->load->view('templates/statusmessage') ?>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <?php $this->load->view('templates/statusmessage') ?>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row" >
        <div class="col-xs-12">
        <?php if(isset($addstud)){ ?>
          <div class="box box-default">
        <div class="box-header with-border" style="background-color:darkred;color:white;">
          <h3 class="box-title">ADD NEW STUDENT</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="login-box-body">
    <p class="login-box-msg">SWSA STUDENT ENROLLMENT</p>
    <form action="<?php echo base_url('submitstudentinfo'); ?>" method="post" class="form-element">
      <div class="form-group has-feedback">
        <div class="form-group clearfix">
          <label for="example-search-input" class="col-sm-2 col-form-label">LAST NAME</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="lastname" placeholder="Last name" required>
          </div>
        </div>   
      </div>
      <div class="form-group has-feedback">
        <div class="form-group clearfix">
          <label for="example-search-input" class="col-sm-2 col-form-label">FIRST NAME</label>
          <div class="col-sm-10">
         <input type="text" class="form-control" name="firstname" placeholder="First name" required>
          </div>
        </div>
      </div>
      <div class="form-group has-feedback">
         <div class="form-group clearfix">
          <label for="example-search-input" class="col-sm-2 col-form-label">STUDENT EMAIL</label>
          <div class="col-sm-10">
        <input type="email" class="form-control" name="email" placeholder="Email">
          </div>
        </div>
       
      </div>
      <div class="form-group has-feedback">
         <div class="form-group clearfix">
          <label for="example-search-input" class="col-sm-2 col-form-label">STUDENT PHONE</label>
          <div class="col-sm-10">
         <input type="text" class="form-control" name="phone" placeholder="Phone" required maxlength="13">
          </div>
        </div>        
      </div>
      <div class="form-group has-feedback">
        <div class="form-group clearfix">
          <label for="example-search-input" class="col-sm-2 col-form-label">STUDENT NUMBER</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="studnumber" placeholder="Student number" required>
          </div>
        </div>
       
       
      </div>
      <div class="form-group has-feedback">
        <div class="form-group clearfix">
          <label for="example-search-input" class="col-sm-2 col-form-label">STUDENT REG NUMBER</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" name="regnumber" placeholder="Registration number"required>
          </div>
        </div>
       
       
      </div>
      <div class="form-group has-feedback">
        <!-- <input type="password" class="form-control" name="password" placeholder="Password"> -->
        <div class="form-group clearfix">
          <label for="example-search-input" class="col-sm-2 col-form-label">STUDY PROGRAM</label>
          <div class="col-sm-10">
         <select name="studyprogram" id="" class="form-control" required>
            <option value="">--Select study program --</option>
            <option value="PhD">PhD</option>
            <option value="MSW">MSW</option>
            <option value="MASSPM">MASSPM</option>
        </select>
          </div>
        </div>
        
        
      </div>
      <div class="form-group has-feedback">
         <div class="form-group clearfix">
          <label for="example-search-input" class="col-sm-2 col-form-label">YEAR OF STUDY</label>
          <div class="col-sm-10">
         <select name="academicyear" id="" class="form-control" required>
            <option value="">-- Select study year --</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="1">3</option>
            <option value="2">4</option>
            <option value="1">5</option>
            <option value="2">6</option>
        </select>
          </div>
        </div>

      
        
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12 text-center">
          <button type="submit" name="login" class="btn btn-info pull-center">ADD STUDENT</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      
    </div>
    <!-- /.social-auth-links -->

  </div>
        <!-- /.box-body -->
      </div>
      <?php } ?>

        <?php if(isset($students)){ ?>
            <div class="box">
            <div class="box-header" style="background-color:darkred;color:white;">
              <h3 class="box-title" >All Students</h3>
              
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
						<!-- <th>Action</th> -->
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
            <td><?php echo $row->RegNumber; ?></td>
            <td><?php echo $row->LastName.' '.$row->FirstName; ?></td>
            <td><?php echo $row->username; ?></td>
            <td><?php echo $row->studentsEmail; ?></td>
            <td><?php echo $row->studentsPhone; ?></td>
            <td><?php echo $row->Program; ?></td>
            <td><?php echo $row->Year; ?></td>
            <td><?php echo $row->Semester; ?></td>
						</tr>
          </tbody>
        </table>

            <div class="modal modal-info fade in" id="modal-role<?php echo $row->id ?>" style="display: none; padding-right: 17px;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">CHOOSE USER ROLE</h4>
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
        <div class="modal modal-info fade in" id="modal-deactivate<?php echo $row->id ?>" style="display: none; padding-right: 17px;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">CONFIRM ACTION</h4>
              </div>
              <form class="form-element" action="<?php echo base_url('submitstaff') ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body" style="background-color:white;color:black;">
                
                <div class="form-group clearfix">
                  <label for="example-search-input" class="col-sm-12 col-form-label">
                  <div class="checkbox">
                       
                      <label style="color:black;">Are you sure you want to de activate <?php echo $row->lastname.' '.$row->firstname; ?></label> 
                    </div>
                    
                  </label>  
                </div>
                
                
              </div>
              <div class="modal-footer" style="background-color:whitesmoke;">
                <button type="button" class="btn  pull-left btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit"  class="btn  btn-info">CONFIRM</button>
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
            <td>Photo</td>
            <td>ID</td>
						<th>Name</th>
						<th>Gender</th>
						<th>Email</th>
						<th>phone</th>
						<th>Office</th>
            <th>ROLE</th>
						<!-- <th>Action</th> -->
					</tr>
				</tfoot>
			</table>

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        <?php } ?>



        <?php if(isset($teacherdetails)){ 
          foreach($teacherdetails->result() as $row){ ?>
          <div class="row">
        <div class="col-md-4">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/images/mak.png') ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $row->lastname.' '.$row->firstname; ?></h3>

              <p class="text-muted text-center"><?php echo $row->role; ?></p>
				
             
            
              <div class="row">
              	<div class="col-xs-12">
              		<div class="profile-user-info">
						<p>Email address </p>
						<h5><?php echo $row->email; ?></h5>
						<p>Phone</p>
            <h5><?php echo $row->phone; ?></h5> 
            <p>Office</p>
						<h5><?php echo $row->office; ?></h5> 
					</div>
             	</div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              
              <li class="active"><a href="#timeline" data-toggle="tab">Timeline / Supervision</a></li>
              <li><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#settings" data-toggle="tab">Edit Profile</a></li>
            </ul>
                        
            <div class="tab-content">
             
             <div class="active tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline">
					<!-- timeline time label -->
					<li class="time-label">
						  <span class="bg-success">
							15 Jan. 2017
						  </span>
					</li>
					<!-- /.timeline-label -->
					<!-- timeline item -->
					<li>
					  <i class="ion ion-email bg-blue"></i>

					  <div class="timeline-item">
						<span class="time"><i class="fa fa-clock-o"></i> 11:48</span>

						<h3 class="timeline-header"><a href="#">Genelia</a> sent you an email</h3>

						<div class="timeline-body">
						  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ...
						</div>
						<div class="timeline-footer text-right">
						  <a class="btn btn-primary btn-xs">Read more</a>
						  <a class="btn btn-danger btn-xs">Delete</a>
						</div>
					  </div>
					</li>
					<!-- END timeline item -->
					<!-- timeline item -->
					<li>
					  <i class="ion ion-person bg-info"></i>

					  <div class="timeline-item">
						<span class="time"><i class="fa fa-clock-o"></i> 11 mins ago</span>

						<h3 class="timeline-header no-border"><a href="#">Ritesh Deshmukh</a> accepted your friend request</h3>
					  </div>
					</li>
					<!-- END timeline item -->
					<!-- timeline item -->
					<li>
					  <i class="ion ion-chatbubble-working bg-purple"></i>

					  <div class="timeline-item">
						<span class="time"><i class="fa fa-clock-o"></i> 55 mins ago</span>

						<h3 class="timeline-header"><a href="#">Jone Doe</a> commented on your post</h3>

						<div class="timeline-body">
						  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus numquam facilis enim eaque, tenetur nam id qui vel velit similique nihil iure molestias aliquam, voluptatem totam quaerat, magni commodi quisquam.
						</div>
						<div class="timeline-footer text-right">
						  <a class="btn bg-purple btn-flat btn-xs">View comment</a>
						</div>
					  </div>
					</li>
					<!-- END timeline item -->
					<!-- timeline time label -->
					<li class="time-label">
						  <span class="bg-success">
							15 Nov. 2016
						  </span>
					</li>
					<!-- /.timeline-label -->
					<!-- timeline item -->
					<li>
					  <i class="ion ion-ios-reverse-camera bg-success"></i>

					  <div class="timeline-item">
						<span class="time"><i class="fa fa-clock-o"></i> 8 days ago</span>

						<h3 class="timeline-header"><a href="#">Rakesh Kumar</a> uploaded new photos</h3>

						<div class="timeline-body">
						  <img src="../../../images/150x100.png" alt="..." class="margin">
						  <img src="../../../images/150x100.png" alt="..." class="margin">
						  <img src="../../../images/150x100.png" alt="..." class="margin">
						  <img src="../../../images/150x100.png" alt="..." class="margin">
						</div>
					  </div>
					</li>
					<!-- END timeline item -->
					<!-- timeline item -->
					<li>
					  <i class="ion ion-ios-videocam bg-success"></i>

					  <div class="timeline-item">
						<span class="time"><i class="fa fa-clock-o"></i> 18 days ago</span>

						<h3 class="timeline-header"><a href="#">Ajay Varma</a> shared a video</h3>

						<div class="timeline-body">
						  <div class="embed-responsive embed-responsive-16by9">
							<iframe src="https://www.youtube.com/embed/k85mRPqvMbE" style="border:0; width: 100%; height: 480px;" allowfullscreen></iframe>
						  </div>
						</div>
						<div class="timeline-footer text-right">
						  <a href="#" class="btn btn-xs bg-purple">See comments</a>
						</div>
					  </div>
					</li>
					<!-- END timeline item -->
					<li>
					  <i class="fa fa-clock-o bg-gray"></i>
					</li>
				  </ul>
              </div>    
              <!-- /.tab-pane -->
              
              <div class="tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../../images/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">John Doe</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">5 minutes ago</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="activitytimeline">
					  <p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.
					  </p>
					  <ul class="list-inline">
						<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
						<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
						</li>
						<li class="pull-right">
						  <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
							(5)</a></li>
					  </ul>
					  <form class="form-element">
						  <input class="form-control input-sm" type="text" placeholder="Type a comment">
					 </form>
                  </div>
                </div>
                <!-- /.post -->
                
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../../images/user6-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">John Doe</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">5 minutes ago</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="activitytimeline">
					  <div class="row margin-bottom">
						<div class="col-sm-6">
						  <img class="img-responsive" src="../../../images/photo1.png" alt="Photo">
						</div>
						<!-- /.col -->
						<div class="col-sm-6">
						  <div class="row">
							<div class="col-sm-6">
							  <img class="img-responsive" src="../../../images/photo2.png" alt="Photo">
							  <br>
							  <img class="img-responsive" src="../../../images/photo3.jpg" alt="Photo">
							</div>
							<!-- /.col -->
							<div class="col-sm-6">
							  <img class="img-responsive" src="../../../images/photo4.jpg" alt="Photo">
							  <br>
							  <img class="img-responsive" src="../../../images/photo1.png" alt="Photo">
							</div>
							<!-- /.col -->
						  </div>
						  <!-- /.row -->
						</div>
						<!-- /.col -->
					  </div>
					  <!-- /.row -->

					  <ul class="list-inline">
						<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
						<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
						</li>
						<li class="pull-right">
						  <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
							(5)</a></li>
					  </ul>

					  <form class="form-element">
						  <input class="form-control input-sm" type="text" placeholder="Type a comment">
					 </form>
					</div>
				</div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../../images/user7-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">John Doe</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">5 minutes ago</span>
                  </div>
                  <!-- /.user-block -->
                    <div class="activitytimeline">
					  <p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum.
					  </p>

					  <form class="form-horizontal form-element">
						<div class="form-group margin-bottom-none">
						  <div class="col-sm-9">
							<input class="form-control input-sm" placeholder="Response">
						  </div>
						  <div class="col-sm-3">
							<button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
						  </div>
						</div>
					  </form>
					</div>
                </div>
                <!-- /.post -->
                
              </div>
              <!-- /.tab-pane -->
              
              <div class="tab-pane" id="settings">
                <form class="form-horizontal form-element">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPhone" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                      <input type="tel" class="form-control" id="inputPhone" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder=""></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                       	<input type="checkbox" id="basic_checkbox_1" checked="">
						                <label for="basic_checkbox_1"> I agree to the</label>
                          &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Terms and Conditions</a>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
        <?php } } ?>




        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
	 
	  
<?php $this->load->view('templates/foot'); ?>

	
</body>
</html>
