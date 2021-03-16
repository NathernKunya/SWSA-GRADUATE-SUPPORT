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
    <div class="row">
        <div class="col-md-3">
          <!-- <a href="#" class="btn btn-success btn-block btn-shadow margin-bottom">Compose</a> -->

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding mailbox-nav">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="<?php echo base_url('inbox'); ?>"><i class="fa fa-angle-double-right"></i> Inbox
                  <span class="label label-success pull-right">12</span></a></li>
                <li><a href="#"><i class="fa fa-angle-double-right"></i></i> Sent</a></li>
                
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
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>

              <
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
                    <td class="mailbox-name"><?php echo $row->FirstName.' '.$row->LastName; ?></td>
                    <td class="mailbox-subject"><a href="<?php echo base_url('inbox/'.$row->id) ?>"><b>Message</b> - <?php echo $row->subject; ?>...</a>
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date"><?php echo $row->date.' '.$row->time; ?></td>
                  </tr>
                 
                    <?php } } ?>
                   
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <?php }else{  ?>

                <?php 
                      if($mymessage->num_rows()>0){
                          foreach($mymessage->result() as $row){
                      ?>
                <div class="box-body no-padding" style="min-height:500px;">
              <div class="mailbox-read-info">
                <h3><?php echo $row->subject; ?></h3>
              </div>
              <div class="mailbox-read-info clearfix">
				<div class="left-float margin-r-5"><a href="#"><img src="<?php echo base_url('assets/images/mak.png')?>" alt="user" width="40" class="img-circle"></a></div>
                <h4 class="no-margin"> <?php echo $row->FirstName.' '.$row->LastName; ?><br>
                     <small><?php echo $row->Program.' '.$row->Year; ?></small>
                  <span class="mailbox-read-time pull-right"><?php echo $row->date.' '.$row->time; ?></span></h4>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border clearfix">                
                
                
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p></p>

                <p><?php echo $row->message; ?></p>

                <p>Thanks<br></p>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <?php } } }?>
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
