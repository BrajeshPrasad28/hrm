<?php
  session_start();
  if(!isset($_SESSION['User'])){
    header('location: index.php');
  }
 ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Payroll and Attendance Maintenance System</title>
      <link rel="shortcut icon" type="images/png" href="../images/Emblem_of_India.svg">
      <!--Drowpdown Box Style-->
      <link rel="stylesheet" href="../css/SelectBox.css">
      <!-- Bootstrap CSS CDN -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
      <!-- Font Awesome JS -->
      <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Custom CSS -->
      <link rel="stylesheet" href="../css/userstyle.css">
      <link rel="stylesheet" href="../css/userprofile.css">


   </head>
   <body>
      <div class="wrapper">
         <!-- Sidebar  -->
         <nav id="sidebar">
            <div class="sidebar-header">
               <button type="button" id="sidebarCollapse" class="btn btn-dark btn-info"  style="margin-left: 0px; margin-top: 0px; margin-bottom: 20px; background-color: #5bc0de; border-color: #46b8da; float: right;">
               <i class="fa fa-th-list"></i>
               </button>
               <h3 style="font-size: 24px; margin-left: -10px; ">Profile Picture</h3>
               <h3 style="font-size: 24px; margin-left: -10px; "></h3>
            </div>
            <ul class="list-unstyled components">
               <li>
                  <a href="attendance_enquiry.php">
                  <i class="fa fa-calendar"></i>
                  Attendance
                  </a>
                  <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                  <i class="fa fa-plane"></i>
                  Leave
                  </a>
                  <ul class="collapse list-unstyled" id="pageSubmenu">
                     <li>
                        <a href="applyleave.php"><i class="fa fa-circle-o"></i>Apply Leave</a>
                     </li>
                     <li>
                        <a href="leavehistory.php"><i class="fa fa-circle-o"></i>Leave Histroy</a>
                     </li>
                  </ul>
               </li>
               <li>
                  <a href="#">
                  <i class="fa fa-inr"></i>
                  Payroll
                  </a>
               </li>
               <li>
                  <a href="noticeboard.php">
                  <i class="fa fa-list-alt"></i>
                  Noticeboard
                  </a>
               </li>
               <li>
                  <a href="#">
                  <i class="fa fa-envelope"></i>
                  Message
                  </a>
               </li>
               <li>
                  <a href="contact.php">
                  <i class="fa fa-phone"></i>
                  Contact
                  </a>
               </li>
               <li>
                  <a href="#contactSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                  <i class="fa fa-user-circle-o"></i>
                  Account
                  </a>
                  <ul class="collapse list-unstyled" id="contactSubmenu">
                     <li>
                        <a href="viewprofile.php"><i class="fa fa-circle-o"></i>View Profile</a>
                     </li>
                     <li>
                        <a href="changepassword.php"><i class="fa fa-circle-o"></i>Change Password</a>
                     </li>
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
