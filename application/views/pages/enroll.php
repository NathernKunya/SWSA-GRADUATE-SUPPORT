<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view('templates/head') ?>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
     <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     
  </head>

  <body class="hold-transition login-page" style = "background-image: url('assets/images/mak3.jpg' ); background-position: center; 
  background-repeat: no-repeat; background-size: cover; ">
<div class="login-box">
<?php if(!$this->session->flashdata('loginpageinfo')){ ?>
  <div class="login-logo">
    <a href="#"><b>ENROLL HERE
   </b></a>
  </div>
<?php }else{ ?>
  <div class="callout callout-info">
     <h4>Information!</h4>
     <?php echo $this->session->flashdata('enrollpageinfo'); ?>
  </div>
<?php } ?>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">SWSA STUDENT ENROLLMENT</p>
    <form action="<?php echo base_url('submitenrollment'); ?>" method="post" class="form-element">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="lastname" placeholder="Last name" required>
        
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="firstname" placeholder="First name" required>
       
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email">
       
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="phone" placeholder="Phone" required maxlength="13">
        
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="studnumber" placeholder="Stuedent number" required>
       
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="regnumber" placeholder="Registration number"required>
       
      </div>
      <div class="form-group has-feedback">
        <!-- <input type="password" class="form-control" name="password" placeholder="Password"> -->
        <select name="studyprogram" id="" class="form-control" required>
            <option value="">--Select study program --</option>
            <option value="PhD">PhD</option>
            <option value="MSW">MSW</option>
            <option value="MASSPM">MASSPM</option>
        </select>
        
      </div>
      <div class="form-group has-feedback">
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
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12 text-center">
          <button type="submit" name="login" class="btn btn-info btn-block btn-flat margin-top-10">ENROLL</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      
    </div>
    <!-- /.social-auth-links -->

    <div class="margin-top-30 text-center">
    	<p>Already enrolled? <a href="<?php echo base_url() ?>" class="text-info m-l-5">Login here</a></p>
    </div>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->



</body>
</html>
