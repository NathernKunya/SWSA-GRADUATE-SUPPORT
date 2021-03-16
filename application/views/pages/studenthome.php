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
    $cordinator = $this->session->userdata('logged_in');
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
  <!-- <div class="col-md-2">

    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/images/mak.png') ?>" alt="User profile picture">

        <h3 class="profile-username text-center"><?php echo $program; ?></h3>

        <p class="text-muted text-center"><?php echo $name; ?></p>
          
        <div class="row social-states">
            <div class="col-xs-6 text-right"><a href="#" class="link"> <?php echo $regnumber; ?></a></div>
            <div class="col-xs-6 text-left"><a href="#" class="link"> <?php echo $studentnumber; ?></a></div>
        </div>
      
        <div class="row">
            <div class="col-xs-12">
                <div class="profile-user-info">
                  <p>Email address </p>
                  <h5><?php echo $email; ?></h5>
                  <p>Phone</p>
                  <h5><?php echo $phone; ?></h5> 
                  <br>
                  <hr>
                  <p>Research area / Topic</p>
                  <h5><?php echo $researchtopic ?></h5>
                 
              </div>
           </div>
        </div>
      </div>

    </div>

  </div> -->
  <!-- /.col -->
  <div class="col-md-12">
    <div class="nav-tabs-custom" style="background-color:darkred;">
      <ul class="nav nav-tabs">
        <li class="<?php echo ($research_progress['0']->step<5)?"active":"";?>"><a href="#timeline" data-toggle="tab" aria-expanded="true" >1. PHASE 1 (CONCEPT)</a></li>
        <li class="<?php echo (($research_progress['0']->step>=5) &($research_progress['0']->step<8))?"active":"";?>"><a href="#submitprogress" data-toggle="tab" aria-expanded="false">2. PHASE 2 (PROPOSAL)</a></li>
        
        <li class="<?php echo (($research_progress['0']->step>=10))?"active":"";?>"><a href="#activity" data-toggle="tab" aria-expanded="false" >3. PHASE 3 (DISSERTATION)</a></li>

  
     
      </ul>
                  
      <div class="tab-content" style="">
       <style>
       .tab-pane{
           min-height:550px;
       }
       </style>
       <div class="tab-pane <?php echo ($research_progress['0']->step<5)?"active":"";?>" id="timeline" style="padding-bottom:40px;">
            <?php if($research_progress['0']->research_topic==NULL){ ?>
             <h3 style="text-align:center">SUBMIT YOUR RESEARCH TOPIC</h3>
            <form class="form-horizontal" method="post" action="<?php echo base_url('submitresearchtopic') ?>">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Research Topic</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="" name="researchtopic">
                
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="inputSkills" class="col-sm-2 control-label">Description</label>

              <div class="col-sm-10">
                <textarea type="text" class="form-control"  id="editor1" name="description" placeholder="" style="min-height:200px;padding-bottom:0px;outline:2px solid #d9d9d9;border-radius:10px;"></textarea>
              </div>
            </div>
          
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success pull-right btn-block btn-sm" style="max-width:200px;">Send</button>
              </div>
            </div>
          </form>
            <?php }else{ ?>
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Activities in phase 1</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding" style="margin:40px;">
              <table class="table table-striped">
                <tbody><tr>
                  <th style="width: 10px">Sequence</th>
                  <th>Task</th>
                  <th>Progress</th>
                  
                  <th style="width: 40px">Completed</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Submit your protocol concept to your supervisor</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                  </td>
                  
                  
                  <td>
                    <?php if($research_progress['0']->step==1){ ?>
                      <button type="button" style="margin-right:10px;" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#modal-progress">Submit Concept </button>
                    <?php }elseif($research_progress['0']->step<1){ ?> 
                      <span class="text-success">PENDING</span>
                    <?php }else{?>
                      <span class="text-success"> COMPLETED</span>
                    <?php } ?>   
                </td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Received supervisors feedback on Protocol concept</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                  </td>
                  
                  
                  <td>
                   <?php if($research_progress['0']->step==3){ ?>
                    <span class="text-success"> COMPLETED</span>
                    <?php }elseif($research_progress['0']->step<3){ ?> 
                      <span class="text-success">PENDING</span>
                    <?php }else{?>
                      <span class="text-success"> COMPLETED</span>
                    <?php } ?>  
                  </td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Submit your revised protocol concept</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                  </td>
                  
                  
                  <td>
                   <?php if($research_progress['0']->step==3){ ?>
                      <button type="button" style="margin-right:10px;" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#modal-progress">Submit Revised Concept </button>
                    <?php }elseif($research_progress['0']->step<3){ ?> 
                      <span class="text-success">PENDING</span>
                    <?php }else{?>
                      <span class="text-success"> COMPLETED</span>
                    <?php } ?>  
                  </td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Received supervisors comments Round 2</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                  </td>
                  
                  
                  <td>
                   <?php if($research_progress['0']->step==5){ ?>
                    <span class="text-success"> COMPLETED</span>
                    <?php }elseif($research_progress['0']->step<5){ ?> 
                      <span class="text-success">PENDING</span>
                    <?php }else{?>
                      <span class="text-success"> COMPLETED</span>
                    <?php } ?>  
                  </td>
                </tr>
                
                
              
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
            
       
          <!-- The timeline -->
          <div class="box-header with-border" style="background-color:darkred;color:white;">
              <h3 class="box-title">YOUR RESEARCH SUBMISSION TIMELINE: PHASE 1</h3>
              
            </div>
            <br><br>
          <ul class="timeline">
             
              <!-- timeline time label -->
              <li class="time-label">
                    <span class="bg-success">
                    <?php echo $research_progress['0']->datert; ?>
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-book bg-blue"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> <?php echo $research_progress['0']->timert; ?></span>

                  <h3 class="timeline-header" style="background-color:whitesmoke;"><a href="#">YOUR RESEARCH TOPIC </a></h3>

                  <div class="timeline-body">
                    <?php echo $research_progress['0']->research_topic; ?>
                  </div>
                  <div class="timeline-footer text-right">
                <hr>
                 <!-- <?php if($research_progress['0']->attatchment!=NULL){ ?>
                 <h4 style="width:100%;"> 
                 
                 <span class="pull-left">Attatcment :</span>
                  <a href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->attatchment);?>" class=""><span><img style="width:30px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""></span><span style="font-size:12px;margin-right:20px;color:blue;"><?php echo $research_progress['0']->attatchment ?></span></a>
                  
                  <a style="font-family:verdana;" href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->attatchment);?>" class="btn btn-danger btn-xs">Download attatchment</a>
                  </h4>
                 <?php } ?> -->
                </div>
                </div>
              </li>
             
               <?php if($research_progress['0']->datepc!=NULL){ ?>
              <li class="time-label">
                    <span class="bg-success">
                    <?php echo $research_progress['0']->datepc; ?>
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-book bg-blue"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> <?php echo $research_progress['0']->timepc; ?></span>

                  <h3 class="timeline-header" style="background-color:whitesmoke;"><a href="#">YOUR PROTOCOL CONCEPT  </a></h3>

                  <div class="timeline-body">
                    <?php echo $research_progress['0']->concept_description; ?>
                  </div>
                  <div class="timeline-footer text-right">
                <hr>
                 <?php if($research_progress['0']->protocol_concept!=NULL){ ?>
                 <h4 style="width:100%;"> 
                 <?php if($research_progress['0']->supervisor_comment1!=NULL){ ?>
                 <button type="button" style="margin-right:30px;" class="btn btn-info btn-xs pull-left" data-toggle="modal" data-target="#modal-conceptcomment">View Supervisor Comment </button>
                 <?php } ?>
                 <span class="pull-">Attatcment :</span>
                  <a href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->protocol_concept);?>" class=""><span><img style="width:30px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""></span><span style="font-size:12px;margin-right:20px;color:blue;"><?php echo $research_progress['0']->protocol_concept ?></span></a>
                  
                  <a style="font-family:verdana;" href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->protocol_concept);?>" class="btn btn-danger btn-xs">Download attatchment</a>
                  </h4>
                 <?php } ?>
                </div>
                </div>
               </li>
               <div class="modal modal-info fade in" id="modal-conceptcomment" style="display: none; padding-right: 17px;">
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
                            <p><?php echo $research_progress['0']->supervisor_comment1; ?></p>
                         
                        </div>
                        <br>
                        <div class="form-group">
                        <span class="pull-" style="color:black;">Attatcment :</span>
                          <a href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->commentedfile1);?>" class=""><span><img style="width:30px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""></span><span style="font-size:12px;margin-right:20px;color:blue;"><?php echo $research_progress['0']->commentedfile1 ?></span></a>
                          
                          <a style="font-family:verdana;" href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->commentedfile1);?>" class="btn btn-danger btn-xs">Download attatchment</a>
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
               <?php } ?>





               <?php if($research_progress['0']->daterc!=NULL){ ?>
              <li class="time-label">
                    <span class="bg-success">
                    <?php echo $research_progress['0']->daterc; ?>
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-book bg-blue"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> <?php echo $research_progress['0']->timerc; ?></span>

                  <h3 class="timeline-header" style="background-color:whitesmoke;"><a href="#">YOUR REVISED PROTOCOL CONCEPT  </a></h3>

                  <div class="timeline-body">
                    <?php echo $research_progress['0']->concept_description2; ?>
                  </div>
                  <div class="timeline-footer text-right">
                <hr>
                 <?php if($research_progress['0']->revised_concept!=NULL){ ?>
                 <h4 style="width:100%;"> 
                 
                 <span class="pull-left">Attatcment :</span>
                  <a href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->revised_concept);?>" class=""><span><img style="width:30px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""></span><span style="font-size:12px;margin-right:20px;color:blue;"><?php echo $research_progress['0']->revised_concept ?></span></a>
                  
                  <a style="font-family:verdana;" href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->revised_concept);?>" class="btn btn-danger btn-xs">Download attatchment</a>
                  </h4>
                 <?php } ?>
                </div>
                </div>
              </li>
              <?php } ?>

            </ul>
            <?php } ?>
        </div>    
        <!-- /.tab-pane -->
        <div class="tab-pane <?php echo (($research_progress['0']->step>=5) &($research_progress['0']->step<8))?"active":"";?>" id="submitprogress">
       
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Activities in phase 2</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding" style="margin:40px;">
              <table class="table table-striped">
                <tbody><tr>
                  <th style="width: 10px">Sequence</th>
                  <th>Task</th>
                  <th>Progress</th>
                  
                  <th style="width: 40px">Completed</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Submit your research proposal to your supervisor</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                  </td>
                  
                  
                  <td>
                    <?php if($research_progress['0']->step==5){ ?>
                      <button type="button" style="margin-right:10px;" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#modal-progress">Submit Concept </button>
                    <?php }elseif($research_progress['0']->step<5){ ?> 
                      <span class="text-success">PENDING</span>
                    <?php }else{?>
                      <span class="text-success"> COMPLETED</span>
                    <?php } ?>   
                </td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Received supervisors feedback on Protocol concept</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                  </td>
                  
                  
                  <td>
                   <?php if($research_progress['0']->step==7){ ?>
                    <span class="text-success"> COMPLETED</span>
                    <?php }elseif($research_progress['0']->step<7){ ?> 
                      <span class="text-success">PENDING</span>
                    <?php }else{?>
                      <span class="text-success"> COMPLETED</span>
                    <?php } ?>  
                  </td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Submit your revised Research proposal to supervisor</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                  </td>
                  
                  
                  <td>
                   <?php if($research_progress['0']->step==7){ ?>
                      <button type="button" style="margin-right:10px;" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#modal-progress">Submit Revised Concept </button>
                    <?php }elseif($research_progress['0']->step<7){ ?> 
                      <span class="text-success">PENDING</span>
                    <?php }else{?>
                      <span class="text-success"> COMPLETED</span>
                    <?php } ?>  
                  </td>
                </tr>
               
                <tr>
                  <td>4.</td>
                  <td>Proposal submission to MA. SSPM Coordinator by cordinator</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                  </td>
                  
                  
                  <td>
                   <?php if($research_progress['0']->step==9){ ?>
                    <span class="text-success"> COMPLETED</span>
                    <?php }elseif($research_progress['0']->step<9){ ?> 
                      <span class="text-success">PENDING</span>
                    <?php }else{?>
                      <span class="text-success"> COMPLETED</span>
                    <?php } ?>  
                  </td>
                </tr>
                <tr>
                  <td>5.</td>
                  <td>Correction and resubmisson of Proposal (With Compliance Report )</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                  </td>
                  
                  
                  <td>
                   <?php if($research_progress['0']->step==9){ ?>
                    <button type="button" style="margin-right:10px;" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#modal-progress">Submit Revised Concept </button>
                    <?php }elseif($research_progress['0']->step<9){ ?> 
                      <span class="text-success">PENDING</span>
                    <?php }else{?>
                      <span class="text-success"> COMPLETED</span>
                    <?php } ?>  
                  </td>
                </tr>
                
                
              
              </tbody></table>
            </div>
          
        </div>
           <!-- The timeline -->
          <div class="box-header with-border" style="background-color:darkred;color:white;">
              <h3 class="box-title">YOUR RESEARCH SUBMISSION TIMELINE: PHASE 2</h3>
              
            </div>
            <br><br>
          <ul class="timeline">
             
              
             
               <?php if($research_progress['0']->datep!=NULL){ ?>
              <li class="time-label">
                    <span class="bg-success">
                    <?php echo $research_progress['0']->datep; ?>
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-book bg-blue"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> <?php echo $research_progress['0']->timep; ?></span>

                  <h3 class="timeline-header" style="background-color:whitesmoke;"><a href="#">YOUR RESEARCH PROPOSAL  </a></h3>

                  <div class="timeline-body">
                    <?php echo $research_progress['0']->proposal_description; ?>
                  </div>
                  <div class="timeline-footer text-right">
                <hr>
                 <?php if($research_progress['0']->proposal!=NULL){ ?>
                 <h4 style="width:100%;"> 
                 <?php if($research_progress['0']->supervisor_commentproposal1!=NULL){ ?>
                 <button type="button" style="margin-right:30px;" class="btn btn-info btn-xs pull-left" data-toggle="modal" data-target="#modal-proposalcomment">View Supervisor Comment </button>
                 <?php } ?>
                 <span class="pull-">Attatcment :</span>
                  <a href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->proposal);?>" class=""><span><img style="width:30px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""></span><span style="font-size:12px;margin-right:20px;color:blue;"><?php echo $research_progress['0']->proposal ?></span></a>
                  
                  <a style="font-family:verdana;" href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->proposal);?>" class="btn btn-danger btn-xs">Download attatchment</a>
                  </h4>
                 <?php } ?>
                </div>
                </div>
               </li>
               <div class="modal modal-info fade in" id="modal-proposalcomment" style="display: none; padding-right: 17px;">
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
                            <p><?php echo $research_progress['0']->supervisor_commentproposal1; ?></p>
                         
                        </div>
                        <br>
                        <div class="form-group">
                        <span class="pull-" style="color:black;">Attatcment :</span>
                          <a href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->commentedfile3);?>" class=""><span><img style="width:30px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""></span><span style="font-size:12px;margin-right:20px;color:blue;"><?php echo $research_progress['0']->commentedfile3; ?></span></a>
                          
                          <a style="font-family:verdana;" href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->commentedfile3);?>" class="btn btn-danger btn-xs">Download attatchment</a>
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
               <?php } ?>





               <?php if($research_progress['0']->daterp!=NULL){ ?>
              <li class="time-label">
                    <span class="bg-success">
                    <?php echo $research_progress['0']->daterp; ?>
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-book bg-blue"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> <?php echo $research_progress['0']->timerp; ?></span>

                  <h3 class="timeline-header" style="background-color:whitesmoke;"><a href="#">YOUR REVISED PROPOSAL  </a></h3>

                  <div class="timeline-body">
                    <?php echo $research_progress['0']->proposal_description2; ?>
                  </div>
                  <div class="timeline-footer text-right">
                <hr>
                 <?php if($research_progress['0']->revised_concept!=NULL){ ?>
                 <h4 style="width:100%;"> 
                 
                 <span class="">Attatcment :</span>
                  <a href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->revised_proposal);?>" class=""><span><img style="width:30px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""></span><span style="font-size:12px;margin-right:20px;color:blue;"><?php echo $research_progress['0']->revised_proposal; ?></span></a>
                  
                  <a style="font-family:verdana;" href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->revised_proposal);?>" class="btn btn-danger btn-xs">Download attatchment</a>
                  </h4>
                 <?php } ?>
                </div>
                </div>
              </li>
               
              <?php if($research_progress['0']->dateresubp!=NULL){ ?>
              <li class="time-label">
                    <span class="bg-success">
                    <?php echo $research_progress['0']->dateresubp; ?>
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-book bg-blue"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> <?php echo $research_progress['0']->timeresubp; ?></span>

                  <h3 class="timeline-header" style="background-color:whitesmoke;"><a href="#">RESUBMITTED PROPOSAL WITH CORRECTIONS </a></h3>

                  <div class="timeline-body">
                    <?php echo $research_progress['0']->proposal_description3; ?>
                  </div>
                  <div class="timeline-footer text-right">
                <hr>
                 <?php if($research_progress['0']->resubmited_proposal!=NULL){ ?>
                 <h4 style="width:100%;"> 
                 
                 <span class="">Attatcment :</span>
                  <a href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->resubmited_proposal);?>" class=""><span><img style="width:30px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""></span><span style="font-size:12px;margin-right:20px;color:blue;"><?php echo $research_progress['0']->resubmited_proposal; ?></span></a>
                  
                  <a style="font-family:verdana;" href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->resubmited_proposal);?>" class="btn btn-danger btn-xs">Download attatchment</a>
                  </h4>
                 <?php } }?>
                </div>
                </div>
              </li>

              <?php } ?>

            </ul>
        </div>
        <div class="tab-pane <?php echo ($research_progress['0']->step>=10)?"active":"";?>" id="activity">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Activities in phase 3</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding" style="margin:40px;">
              <table class="table table-striped">
                <tbody><tr>
                  <th style="width: 10px">Sequence</th>
                  <th>Task</th>
                  <th>Progress</th>
                  
                  <th style="width: 40px">Completed</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Collect data, Submit raw data and field report</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                  </td>
                  
                  
                  <td>
                    <?php if($research_progress['0']->step==10){ ?>
                      <button type="button" style="margin-right:10px;" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#modal-progress">Submit Questionaire </button>
                    <?php }elseif($research_progress['0']->step<10){ ?> 
                      <span class="text-success">PENDING</span>
                    <?php }else{?>
                      <span class="text-success"> COMPLETED</span>
                    <?php } ?>   
                </td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Submit revision with compliance  after sitting viva ( First draft )</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                  </td>
                  
                  
                  <td>
                   <?php if($research_progress['0']->step==11){ ?>
                    <button type="button" style="margin-right:10px;" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#modal-progress">Submit Dissertation </button>
                    <?php }elseif($research_progress['0']->step<11){ ?> 
                      <span class="text-success">PENDING</span>
                    <?php }else{?>
                      <span class="text-success"> COMPLETED</span>
                    <?php } ?>  
                  </td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Received supervisors Feedback on first draft.</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                  </td>
                  
                  
                  <td>
                   <?php if($research_progress['0']->step==12){ ?>
                    <span class="text-success"> COMPLETED</span>
                    <?php }elseif($research_progress['0']->step<12){ ?> 
                      <span class="text-success">PENDING</span>
                    <?php }else{?>
                      <span class="text-success"> COMPLETED</span>
                    <?php } ?>  
                  </td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Submit Dissertation ( Second draft )</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                  </td>
                  
                  
                  <td>
                   <?php if($research_progress['0']->step==13){ ?>
                    <button type="button" style="margin-right:10px;" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#modal-progress">Submit Concept </button>
                    <?php }elseif($research_progress['0']->step<13){ ?> 
                      <span class="text-success">PENDING</span>
                    <?php }else{?>
                      <span class="text-success"> COMPLETED</span>
                    <?php } ?>  
                  </td>
                </tr>
                <tr>
                  <td>5.</td>
                  <td>Received supervisors Feedback on second draft</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                  </td>
                  
                  
                  <td>
                   <?php if($research_progress['0']->step==15){ ?>
                    <span class="text-success"> COMPLETED</span>
                    <?php }elseif($research_progress['0']->step<15){ ?> 
                      <span class="text-success">PENDING</span>
                    <?php }else{?>
                      <span class="text-success"> COMPLETED</span>
                    <?php } ?>  
                  </td>
                </tr>
                <tr>
                  <td>6.</td>
                  <td>Submit Dissertation ( Third draft )</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                  </td>
                  
                  
                  <td>
                   <?php if($research_progress['0']->step==15){ ?>
                    <button type="button" style="margin-right:10px;" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#modal-progress">Submit Concept </button>
                    <?php }elseif($research_progress['0']->step<15){ ?> 
                      <span class="text-success">PENDING</span>
                    <?php }else{?>
                      <span class="text-success"> COMPLETED</span>
                    <?php } ?>  
                  </td>
                </tr>
                <tr>
                  <td>7.</td>
                  <td>Submit Dissertation for examination</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                  </td>
                  
                  
                  <td>
                   <?php if($research_progress['0']->step==17){ ?>
                    <span class="text-success"> COMPLETED</span>
                    <?php }elseif($research_progress['0']->step<17){ ?> 
                      <span class="text-success">PENDING</span>
                    <?php }else{?>
                      <span class="text-success"> COMPLETED</span>
                    <?php } ?>  
                  </td>
                </tr>
                <tr>
                  <td>8.</td>
                  <td>Submit revision with compliance report after sitting exams</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                  </td>
                  
                  
                  <td>
                   <?php if($research_progress['0']->step==17){ ?>
                    <button type="button" style="margin-right:10px;" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#modal-progress">Submit Concept </button>
                    <?php }elseif($research_progress['0']->step<17){ ?> 
                      <span class="text-success">PENDING</span>
                    <?php }else{?>
                      <span class="text-success"> COMPLETED</span>
                    <?php } ?>  
                  </td>
                </tr>
                <tr>
                  <td>9.</td>
                  <td>Graduation</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                    </div>
                  </td>
                  
                  
                  <td>
                   <?php if($research_progress['0']->step==19){ ?>
                    <span class="text-success"> COMPLETED</span>
                    <?php }elseif($research_progress['0']->step<19){ ?> 
                      <span class="text-success">PENDING</span>
                    <?php }else{?>
                      <span class="text-success"> COMPLETED</span>
                    <?php } ?>  
                  </td>
                </tr>
              </tbody></table>
            </div>
            </div>

           <!-- The timeline -->
          <div class="box-header with-border" style="background-color:darkred;color:white;">
              <h3 class="box-title">YOUR RESEARCH SUBMISSION TIMELINE: PHASE 3</h3>
              
            </div>
            <br><br>
          <ul class="timeline">
             
              <!-- timeline time label -->
              <?php if($research_progress['0']->dateq!=NULL){ ?>
              <li class="time-label">
                    <span class="bg-success">
                    <?php echo $research_progress['0']->dateq; ?>
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-book bg-blue"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> <?php echo $research_progress['0']->timeq; ?></span>

                  <h3 class="timeline-header" style="background-color:whitesmoke;"><a href="#">YOUR QUESTIONNAIRE / QUANTITATIVE NOTES </a></h3>

                  <div class="timeline-body">
                    <?php echo $research_progress['0']->descriptionq; ?>
                  </div>
                  <div class="timeline-footer text-right">
                <hr>
                 <?php if($research_progress['0']->quantitativenotes_and_questionaires!=NULL){ ?>
                 <h4 style="width:100%;"> 
                 
                 <span class="pull-left">Attatcment :</span>
                  <a href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->quantitativenotes_and_questionaires);?>" class=""><span><img style="width:30px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""></span><span style="font-size:12px;margin-right:20px;color:blue;"><?php echo $research_progress['0']->quantitativenotes_and_questionaires; ?></span></a>
                  
                  <a style="font-family:verdana;" href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->quantitativenotes_and_questionaires);?>" class="btn btn-danger btn-xs">Download attatchment</a>
                  </h4>
                 <?php } ?>
                </div>
                </div>
              </li>
                 <?php } ?>
             
               <?php if($research_progress['0']->dateds1!=NULL){ ?>
              <li class="time-label">
                    <span class="bg-success">
                    <?php echo $research_progress['0']->dateds1; ?>
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-book bg-blue"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> <?php echo $research_progress['0']->timeds1; ?></span>

                  <h3 class="timeline-header" style="background-color:whitesmoke;"><a href="#">YOUR DISSERTATION DRAFT ONE  </a></h3>

                  <div class="timeline-body">
                    <?php echo $research_progress['0']->description_ds1; ?>
                  </div>
                  <div class="timeline-footer text-right">
                <hr>
                 <?php if($research_progress['0']->dissertation1!=NULL){ ?>
                 <h4 style="width:100%;"> 
                 <?php if($research_progress['0']->dessertation_feedback1!=NULL){ ?>
                 <button type="button" style="margin-right:30px;" class="btn btn-info btn-xs pull-left" data-toggle="modal" data-target="#modal-dissertation1">View Supervisor Comment </button>
                 <?php } ?>
                 <span class="pull-">Attatcment :</span>
                  <a href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->dissertation1);?>" class=""><span><img style="width:30px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""></span><span style="font-size:12px;margin-right:20px;color:blue;"><?php echo $research_progress['0']->dissertation1; ?></span></a>
                  
                  <a style="font-family:verdana;" href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->dissertation1);?>" class="btn btn-danger btn-xs">Download attatchment</a>
                  </h4>
                 <?php } ?>
                </div>
                </div>
               </li>
               <div class="modal modal-info fade in" id="modal-dissertation1" style="display: none; padding-right: 17px;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">FEEDBACK / COMMENT ON DISSERTATION 1</h4>
                      </div>
                      <form action="<?php echo base_url('submitresearchProgress') ?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body" style="background-color:white;color:black;">
                        <div style="color:black;">
                            <p><?php echo $research_progress['0']->dessertation_feedback1; ?></p>
                         
                        </div>
                        <br>
                        <div class="form-group">
                        <span class="pull-" style="color:black;">Attatcment :</span>
                          <a href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->commentedfile4);?>" class=""><span><img style="width:30px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""></span><span style="font-size:12px;margin-right:20px;color:blue;"><?php echo $research_progress['0']->commentedfile4; ?></span></a>
                          
                          <a style="font-family:verdana;" href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->commentedfile4);?>" class="btn btn-danger btn-xs">Download attatchment</a>
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
               <?php } ?>



               <?php if($research_progress['0']->dateds2!=NULL){ ?>
              <li class="time-label">
                    <span class="bg-success">
                    <?php echo $research_progress['0']->dateds2; ?>
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-book bg-blue"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> <?php echo $research_progress['0']->timeds2; ?></span>

                  <h3 class="timeline-header" style="background-color:whitesmoke;"><a href="#">YOUR DISSERTATION DRAFT TWO  </a></h3>

                  <div class="timeline-body">
                    <?php echo $research_progress['0']->description_ds2; ?>
                  </div>
                  <div class="timeline-footer text-right">
                <hr>
                 <?php if($research_progress['0']->dissertation2!=NULL){ ?>
                 <h4 style="width:100%;"> 
                 <?php if($research_progress['0']->dessertation_feedback2!=NULL){ ?>
                 <button type="button" style="margin-right:30px;" class="btn btn-info btn-xs pull-left" data-toggle="modal" data-target="#modal-dissertation2">View Supervisor Comment </button>
                 <?php } ?>
                 <span class="pull-">Attatcment :</span>
                  <a href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->dissertation2);?>" class=""><span><img style="width:30px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""></span><span style="font-size:12px;margin-right:20px;color:blue;"><?php echo $research_progress['0']->dissertation2; ?></span></a>
                  
                  <a style="font-family:verdana;" href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->dissertation2);?>" class="btn btn-danger btn-xs">Download attatchment</a>
                  </h4>
                 <?php } ?>
                </div>
                </div>
               </li>
               <div class="modal modal-info fade in" id="modal-dissertation2" style="display: none; padding-right: 17px;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">FEEDBACK / COMMENT ON DISSERTATION 2</h4>
                      </div>
                      <form action="<?php echo base_url('submitresearchProgress') ?>" method="post" enctype="multipart/form-data">
                      <div class="modal-body" style="background-color:white;color:black;">
                        <div style="color:black;">
                            <p><?php echo $research_progress['0']->dessertation_feedback2; ?></p>
                         
                        </div>
                        <br>
                        <div class="form-group">
                        <span class="pull-" style="color:black;">Attatcment :</span>
                          <a href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->commentedfile5);?>" class=""><span><img style="width:30px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""></span><span style="font-size:12px;margin-right:20px;color:blue;"><?php echo $research_progress['0']->	commentedfile5; ?></span></a>
                          
                          <a style="font-family:verdana;" href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->	commentedfile5);?>" class="btn btn-danger btn-xs">Download attatchment</a>
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
               <?php } ?>

               <?php if($research_progress['0']->dateds3!=NULL){ ?>
              <li class="time-label">
                    <span class="bg-success">
                    <?php echo $research_progress['0']->dateds3; ?>
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-book bg-blue"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> <?php echo $research_progress['0']->timeds3; ?></span>

                  <h3 class="timeline-header" style="background-color:whitesmoke;"><a href="#">YOUR DISSERTATION DRAFT THREE  </a></h3>

                  <div class="timeline-body">
                    <?php echo $research_progress['0']->description_ds3; ?>
                  </div>
                  <div class="timeline-footer text-right">
                <hr>
                 <?php if($research_progress['0']->dissertation3!=NULL){ ?>
                 <h4 style="width:100%;"> 
                 
                 <span class="">Attatcment :</span>
                  <a href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->dissertation3);?>" class=""><span><img style="width:30px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""></span><span style="font-size:12px;margin-right:20px;color:blue;"><?php echo $research_progress['0']->dissertation3 ?></span></a>
                  
                  <a style="font-family:verdana;" href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->dissertation3);?>" class="btn btn-danger btn-xs">Download attatchment</a>
                  </h4>
                 <?php } ?>
                </div>
                </div>
              </li>
              <?php } ?>

              <?php if($research_progress['0']->daterwcr!=NULL){ ?>
              <li class="time-label">
                    <span class="bg-success">
                    <?php echo $research_progress['0']->daterwcr; ?>
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-book bg-blue"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> <?php echo $research_progress['0']->timerwcr; ?></span>

                  <h3 class="timeline-header" style="background-color:whitesmoke;"><a href="#">YOUR REVISIONS WITH COMPLIANCE REPORT  </a></h3>

                  <div class="timeline-body">
                    <?php echo $research_progress['0']->descriptionrwcr; ?>
                  </div>
                  <div class="timeline-footer text-right">
                <hr>
                 <?php if($research_progress['0']->revisions_with_compliance_reports!=NULL){ ?>
                 <h4 style="width:100%;"> 
                 
                 <span class="">Attatcment :</span>
                  <a href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->revisions_with_compliance_reports);?>" class=""><span><img style="width:30px;" src="<?php echo base_url('assets/images/pdf.png') ?>" alt="" srcset=""></span><span style="font-size:12px;margin-right:20px;color:blue;"><?php echo $research_progress['0']->revisions_with_compliance_reports; ?></span></a>
                  
                  <a style="font-family:verdana;" href="<?php echo base_url('assets/images/researchattatchments/'.$research_progress['0']->revisions_with_compliance_reports);?>" class="btn btn-danger btn-xs">Download attatchment</a>
                  </h4>
                 <?php } ?>
                </div>
                </div>
              </li>
              <?php } ?>

            </ul>
        </div>
<!-- /.row -->
  <div class="modal modal-info fade in" id="modal-progress" style="display: none; padding-right: 17px;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                  <h4 class="modal-title">EDIT STAFF MEMBER INFO</h4>
                </div>
                <div class="modal-body" style="background-color:white;color:black;padding:20px;">
                <form class="form-horizontal" action="<?php echo base_url('submitresearchProgress') ?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <!-- <div class="col-md-12">
                        <div class="form-group">
                      <label for="inputName" style="color:black;" class="col-sm-2 control-label">Research Topic</label>

                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" placeholder="" name="researchtopic">
                        
                      </div>
                    </div> -->
                  </div>
                  <div class="row">
                   <div class="col-md-12">
                     <div class="form-group">
                      <label for="inputSkills" style="color:black;" class="col-sm-2 control-label">Description</label>

                      <div class="col-sm-10">
                        <textarea type="text" class="form-control"   name="description" placeholder="" style="min-height:140px;"></textarea>
                      </div>
                    </div>
                    </div>
                   </div>
                        <br><br>
                        <div class="row">
                    <div class="form-group">
                        
                      <div class="col-sm-offset-2 col-sm-10">
                      <div class="btn btn-primary btn-file pull-left">
                          <i class="fa fa-paperclip"></i> Attachment
                          <input type="file" name="attachment" accept=".doc, .docx" required>
                        </div>
                      
                      </div>
                    </div>
                    <br><br>
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
      </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
	 
	  
<?php $this->load->view('templates/foot'); ?>

	
</body>
</html>
