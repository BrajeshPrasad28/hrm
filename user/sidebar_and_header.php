<?php include 'user_detail.php';?>

<div class="wrapper">
   <!-- Sidebar  -->
   <nav id="sidebar">
     <div class="sidebar-header">
         <button type="button" id="sidebarCollapse" class="btn btn-dark btn-info"  style="margin-left: 0px; margin-top: 0px; margin-bottom: 20px; background-color: #5bc0de; border-color: #46b8da; float: right;">
             <i class="fa fa-th-list"></i>
         </button>
         <!--<div class="images">-->

         <div class="text-center" style="margin-top: 58px;">
           <img src="<?php echo $emp->photo; ?>"  alt="Avatar" class="Avatar" style="border-radius: 50%; height: 100px; width: 100%; max-width: 100px;"> <br>
           <h3 style="font-size: 20px; margin-top: 10px;"> <?php echo $emp->first_name." ".$emp->last_name; ?></h3>
         </div>

     </div>

      <ul class="list-unstyled components">
         <li><a href="attendance_enquiry.php"><i class="fa fa-calendar"></i>Attendance</a>
             <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-plane"></i>Leave</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
               <li><a href="applyleave.php"><i class="fa fa-circle-o"></i>Apply Leave</a></li>
               <li><a href="leavehistory.php"><i class="fa fa-circle-o"></i>Leave Histroy</a></li>
            </ul>
         </li>
         <li><a href="#"><i class="fa fa-inr"></i>Payroll</a></li>
         <li><a href="noticeboard.php"><i class="fa fa-list-alt"></i>Noticeboard</a></li>
         <li><a href="#"><i class="fa fa-envelope"></i>Message</a></li>
         <li><a href="contact.php"><i class="fa fa-phone"></i>Contact</a></li>
         <li><a href="#contactSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user-circle-o"></i>Account</a>
            <ul class="collapse list-unstyled" id="contactSubmenu">
               <li><a href="viewprofile.php"><i class="fa fa-circle-o"></i>View Profile</a></li>
               <li><a href="changepassword.php"><i class="fa fa-circle-o"></i>Change Password</a></li>
            </ul>
         </li>
      </ul>
   </nav>
   <!-- Page Content  -->
   <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ecf2f9; border-radius: 15px;">
         <div class="container-fluid">
            <img src="../images/ashok-stambh-logo-png-file.png" alt="picture-logo" style="vertical-align: middle; border-style: none; height: 45px; width: 35px; margin-left: 0px;">
            <h4>Human Resource Management System</h4>
            <div class="login-container">
               <a href="logout.php"><button type="submit"><i class="fa fa-sign-out"> Logout </i></button></a>
            </div>
         </div>
      </nav>
