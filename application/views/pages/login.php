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
  <div class="login-logo" >
    <h2><b>SWSA GRADUATE </b></h2>
    <h3><b>SUPPORT SYSTEM</b></h3>
   
  </div>
<?php }else{ ?>
  <div class="callout callout-info">
     <!-- <h4>Information!</h4> -->
     <?php echo $this->session->flashdata('loginpageinfo'); ?>
  </div>
<?php } ?>
  <!-- /.login-logo -->
  <div class="login-box-body">
  <div class="image">
  <center> <img src="<?php echo base_url('assets/images/mak.png') ?>" class="img-circle" alt="User Image" width="100" height =" 100"></center> 
        </div> <br>
    <p class="login-box-msg"><b>LOGIN HERE </b></p>
    <form action="<?php echo base_url('login'); ?>" method="post" class="form-element">
      <div class="form-group has-feedback">
      <label>UserName:</label>
      <input type="text" name="username" class="form-control" required placeholder="Enter your username"/>
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback ">
      <label>Password:</label>
      <input type="password" name="password" class="form-control" required placeholder="Enter your password"/>
      <span class="fa fa-lock form-control-feedback"></span>

      </div>
      <div class="row">
        <div class="col-xs-6">
          <div class="checkbox">
            <input type="checkbox" id="basic_checkbox_1">
      <label for="basic_checkbox_1">Remember Me</label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
         <div class="fog-pwd">
            <a href="javascript:void(0)"><i class="fa fa-lock"></i> Forgot password ?</a><br>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-12 text-center">
          <button type="submit" name="login" class="btn btn-info btn-block btn-flat margin-top-10">SIGN IN</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <br><br>
    </div>
    <!-- /.social-auth-links -->

    <div class="margin-top-30 text-center">
      <p>I Am a student ? <a href="<?php echo base_url('enroll') ?>" class="text-info m-l-5">Enroll here</a></p>
    </div>

  </div>
  <!-- /.login-box-body -->
</div>


</body>
</html>
