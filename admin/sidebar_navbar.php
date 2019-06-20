
<?php
require("dbconnection.php");
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$query = mysqli_query($con, "SELECT * FROM employees WHERE emp_id = '$username' AND password = '$password' AND role='admin'");
while ($adr=mysqli_fetch_array($query)) {
   $photo = $adr['photo'];
   $name = $adr['first_name']." ".$adr['last_name'];
 }
?>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
    <div class="sidebar-header">
        <button type="button" id="sidebarCollapse" class="btn btn-dark btn-info"  style="margin-left: 0px; margin-top: 0px; margin-bottom: 20px; background-color: #5bc0de; border-color: #46b8da; float: right;">
            <i class="fa fa-th-list"></i>
        </button>
        <!--<div class="images">-->

        <div class="text-center" style="margin-top: 58px;">
          <img src= <?php echo $admin->photo; ?> alt="Avatar" class="Avatar mb-2" style="border-radius: 50%; height: auto; width: 100%; max-width: 100px;"> <br>
          <h4>Admin</h4>
          <h3 style="font-size: 20px; margin-top: 10px;"><?php echo $admin->first_name." ".$admin->last_name; ?></h3>
        </div>

    </div>

        <ul class="list-unstyled components">
          <li><a href="adminpanel.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
          <li><a href="employee.php"><i class="fa fa-circle-o"></i>Employees</a></li>
          <li><a href="attendance.php"><i class="fa fa-signal"></i>Attendance</a>
              <a href="#leaveSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
              <i class="fa fa-plane"></i>Leave</a>
            <ul class="collapse list-unstyled" id="leaveSubmenu">
              <li><a href="requestleave.php"><i class="fa fa-circle-o"></i>Leave Requests</a></li>
              <li><a href="acceptedleave.php"><i class="fa fa-circle-o"></i>Accepted leave Requests</a></li>
              <li><a href="rejectedleave.php"><i class="fa fa-circle-o"></i>Rejected leave Requests</a></li>
            </ul></li>
          <li><a href="salary.php"><i class="fa fa-money"></i>Salary</a></li>
          <li><a href="payroll.php"><i class="fa fa-inr"></i>Pay-Roll</a></li>
          <li><a href="#noticeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-list-alt"></i>Noticeboard</a>
                <ul class="collapse list-unstyled" id="noticeSubmenu">
                  <li><a href="noticeboard.php"><i class="fa fa-circle-o"></i>Create New Notice</a></li>
                  <li><a href="noticelist.php"><i class="fa fa-circle-o"></i>Notice List</a></li>
                </ul>
          </li>
          <li><a href="#accountSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fa fa-user-circle"></i>Account</a>
              <ul class="collapse list-unstyled" id="accountSubmenu">
                <li><a href="update.php"><i class="fa fa-circle-o"></i>View Profile</a></li>
                <li><a href="change_password.php"><i class="fa fa-circle-o"></i>Change Password</a></li>
              </ul></li>
            </li>
          </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content">
      <nav class="navbar navbar-expand-lg navbar-lightt" style="background-color: #ecf2f9; border-radius: 15px;">
          <div class="container-fluid">
              <img src="../images/ashok-stambh-logo-png-file.png" alt="picture-logo" style="vertical-align: middle; border-style: none; height: 45px; width: 35px; margin-left: 0px;">
              <h4>Attendance and Pay-roll System</h4>
              <!-- admin modal code is here -->
                <div class="login-container">
                   <button type="submit"><a href="logout.php"><i class="fa fa-sign-out"> Logout</i></a></button>
                </div>

          </div>
      </nav>
    </div>
    </div>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
