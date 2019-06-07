<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="refresh" content="05"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="images/png" href="../images/test.svg.png">

    <title>Noticeboard</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../admin/css/adminstyle.css">
    <!--Style for noticeboard-->
    <link rel="stylesheet" href="../admin/css/adminstyle2.css">
   <!-- Css for Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Table Heeader Style-->
    <style>
      tr:hover{
        background-color: #1C2833;
      }
    </style>
  </head>
  <body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
        <div class="sidebar-header">
            <button type="button" id="sidebarCollapse" class="btn btn-dark btn-info"  style="margin-left: 0px; margin-top: 0px; background-color: #5bc0de; border-color: #46b8da;">
                <i class="fa fa-th-list"></i>
            </button>
            <img alt="Avatar" style="border-radius: 50%; height: 100px;">
        <h3 style="font-size: 24px; margin-left: -10px; "></h3>
        </div>
        <ul class="list-unstyled components">

            <li>
                <a href="#">
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
          <nav class="navbar navbar-expand-lg navbar-lightt" style="background-color: #ecf2f9; border-radius: 15px;">
              <div class="container-fluid">
                  <img src="../images/ashok-stambh-logo-png-file.png" alt="picture-logo" style="vertical-align: middle; border-style: none; height: 45px; width: 35px; margin-left: 0px;">
                  <h4>Human Resource Management System</h4>
                  <!-- admin modal code is here -->
                    <div class="login-container">
                      <button type="submit"><a href="logout.php"><i class="fa fa-sign-out"> Logout</i></a></button>
                    </div>
              </div>
          </nav>
          <div class="cssmenu">
              <ul>
                  <li class="active"><a href="#">Notic Board</a></li>
                  <li><a href="userpanel.php"><i class="fa fa-home"></i> Home</a></li>
              </ul>
          </div>
          <div id="noticelist-wrapper" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
            <header>
              <h2 class="page_title">Notice Board</h2>
            </header>
            <div class="content-inner">
              <table id="noticelist" class="table table-stripped table-hover  table-bordered">
                <thead class="table-dark">
                  <th>Date</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Status</th>
                </thead>
                <tbody>
                  <tr>
                    <td>01-04-2019</td>
                    <td>Holiday</td>
                    <td>Enjoy Holidays svfsdfsd fasdfsd afdsfadsfasd fasdfadf af</td>
                    <td style="color:green;">Active</td>
                  </tr>
                  <tr>
                    <td>01-04-2019</td>
                    <td>Holiday</td>
                    <td>Enjoy Holidays dfdsfds fadsfasdf fadsfas adfas fasd fasdf </td>
                    <td style="color: grey;">Disabled</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
  </div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!-- JS file for txt editor -->
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
<!-- Jquery For table -->
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#noticelist').DataTable();
} );
</script>
</body>
</html>
