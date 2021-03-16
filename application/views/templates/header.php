<?php
  $this->load->library('session');
   if($this->session->userdata('logged_in')){
    $session_data = $this->session->userdata('logged_in');
    $userrole=$session_data['role'];
    $staffid=$session_data['id'];
    $photo=$session_data['photo'];
    $profilephoto="assets/images/teachers/".(($photo=='')?"avator.jpg":$photo); 
    $name=$session_data['firstname'].' '.$session_data['lastname'];
}elseif($this->session->userdata('studentlogged_in')){
  $session_data = $this->session->userdata('studentlogged_in');
    $userrole=$session_data['role'];
    $studentid=$session_data['id'];
    $photo=$session_data['photo'];
    $profilephoto="assets/images/students/".(($photo=='')?"avator.jpg":$photo);
    $name=$session_data['firstname'].' '.$session_data['lastname'];
}else{
  header('location:'.base_url());
}
    ?>
<header class="main-header">
    <!-- Logo -->
    <a href="index.html" class="logo">
      <!-- mini logo-->
      <span class="logo-mini"><b>C</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Cross</b>Admin</span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">SWSA GRADUATE SUPPORT</span>
      </a>
      <ul class="nav navbar-nav" >
                <!-- Messages: style can be found in dropdown.less-->
                
                <li class="user user-menu">
                    <a style="color : white; text-transform: uppercase; ">
                        <span >
                             <?php if($userrole == 'cordinator' ){echo "CORDINATOR"."&nbsp" . "PANEL";}
                             else
                              {echo $userrole ."&nbsp" . "PANEL";} ?> 
                        </span>
                    </a>
                </li>

            </ul>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
        <li class="dropdown notifications-menu">
            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell"></i>
              <span class="label label-warning">7</span>
            </a> -->
            <ul class="dropdown-menu scale-up">
              <li class="header">You have 7 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu inner-content-div" style="overflow: hidden; width: auto; height: 200px;">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> Curabitur id eros quis nunc suscipit blandit.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> Praesent eu lacus in libero dictum fermentum.
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> Nunc fringilla lorem 
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
                    </a>
                  </li>
                </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 139.373px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
           <!-- User Account -->
           <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url($profilephoto) ?>" class="user-image" alt="User Image">
            </a>
            <ul class="dropdown-menu scale-up">
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Cancel</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>