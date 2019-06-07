<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Payroll and Attendance Maintenance System</title>
    <link rel="shortcut icon" type="images/png" href="../images/Emblem_of_India.svg">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/userstyle.css">
    <link  href="../js/dataTables.bootstrap.min.css" rel="stylesheet">
    <link  href="../css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- Css for Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3 style="font-size: 24px; margin-left: -10px; ">Profile Picture</h3>
        </div>

            <ul class="list-unstyled components">

                <li>
                    <a href="#">
                        <i class="fa fa-calendar"></i>
                        Attendance
                    </a>
                    <a href="#leaveSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fa fa-plane"></i>
                        Leave
                    </a>
                    <ul class="collapse list-unstyled" id="leaveSubmenu">
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
                    <a href="#">
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
                            <a href="applyleave.php"><i class="fa fa-circle-o"></i>View Profile</a>
                        </li>
                        <li>
                            <a href="leavehistory.php"><i class="fa fa-circle-o"></i>Change Password</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-dark btn-info"  style="margin-left: -96px; margin-top: -45px;">
                        <i class="fa fa-th-list"></i>
                    </button>
                    <h4>Human Resource Management System</h4>
                    <div class="login-container">
                       <button type="submit"><i class="fa fa-sign-out"> Logout </i></button>
                    </div>

                </div>
            </nav>
            <hr>
            <div class="card">
                <div class="card-content">
                    <span class="card-title" style="color: #909196; margin-left: 15px;">Leave History</span>

                     <table id="leavehistory" name="leavehistory" class="table table-fixed table-hover" cellspacing="0" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="120">Leave Type</th>
                                <th>From</th>
                                <th>To</th>
                                 <th>Description</th>
                                 <th width="120">Posting Date</th>
                                <th width="200">Admin Remark</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Casual</td>
                            <td>01/02/2019</td>
                            <td>05/03/2019</td>
                            <td>Bla Bla Bla</td>
                            <td>15/01/2019</td>
                            <td>Bla Bla Bla Holiday ffdsfsdfds dsf dfdsf sf asd faddffsdf  fdsfdasf  fadsfd safasdf fadsf   dfsdasf   dsf dsaf  dsfsdf  fdsffdsd df</td>
                            <td style="color: green;">Approved</td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>Medical</td>
                            <td>01/02/2019</td>
                            <td>05/03/2019</td>
                            <td>Bla Bla Bla</td>
                            <td>15/01/2019</td>
                            <td>Bla Bla Bla Holiday  ffdsfsdfds dsf dfdsf sf asd faddffsdf  fdsfdasf  fadsfd safasdf fadsf   dfsdasf   dsf dsaf  dsfsdf  fdsffdsd df</td>
                            <td style="color: green;">Approved</td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>Restricted Holiday</td>
                            <td>01/02/2019</td>
                            <td>05/03/2019</td>
                            <td>Bla Bla Bla</td>
                            <td>15/01/2019</td>
                            <td>Bla Bla Bla Holiday  ffdsfsdfds dsf dfdsf sf asd faddffsdf  fdsfdasf  fadsfd safasdf fadsf   dfsdasf   dsf dsaf  dsfsdf  fdsffdsd df</td>
                            <td style="color: green;">Approved</td>
                          </tr>
                          <tr>
                            <td>4</td>
                            <td>Restricted Holiday</td>
                            <td>01/02/2019</td>
                            <td>05/03/2019</td>
                            <td>Bla Bla Bla</td>
                            <td>15/01/2019</td>
                            <td>Bla Bla Bla Holiday  ffdsfsdfds dsf dfdsf sf asd faddffsdf  fdsfdasf  fadsfd safasdf fadsf   dfsdasf   dsf dsaf  dsfsdf  fdsffdsd df</td>
                            <td style="color: green;">Approved</td>
                          </tr>
                          <tr>
                            <td>5</td>
                            <td>Restricted Holiday</td>
                            <td>01/02/2019</td>
                            <td>05/03/2019</td>
                            <td>Bla Bla Bla</td>
                            <td>15/01/2019</td>
                            <td>Bla Bla Bla Holiday  ffdsfsdfds dsf dfdsf sf asd faddffsdf  fdsfdasf  fadsfd safasdf fadsf   dfsdasf   dsf dsaf  dsfsdf  fdsffdsd df</td>
                            <td style="color: green;">Approved</td>
                          </tr>
                          <tr>
                            <td>6</td>
                            <td>Restricted Holiday</td>
                            <td>01/02/2019</td>
                            <td>05/03/2019</td>
                            <td>Bla Bla Bla</td>
                            <td>15/01/2019</td>
                            <td>Bla Bla Bla Holiday  ffdsfsdfds dsf dfdsf sf asd faddffsdf  fdsfdasf  fadsfd safasdf fadsf   dfsdasf   dsf dsaf  dsfsdf  fdsffdsd df</td>
                            <td style="color: green;">Approved</td>
                          </tr>
                          <tr>
                            <td>7</td>
                            <td>Restricted Holiday</td>
                            <td>01/02/2019</td>
                            <td>05/03/2019</td>
                            <td>Bla Bla Bla</td>
                            <td>15/01/2019</td>
                            <td>Bla Bla Bla Holiday  ffdsfsdfds dsf dfdsf sf asd faddffsdf  fdsfdasf  fadsfd safasdf fadsf   dfsdasf   dsf dsaf  dsfsdf  fdsffdsd df</td>
                            <td style="color: green;">Approved</td>
                          </tr>
                          <tr>
                            <td>8</td>
                            <td>Restricted Holiday</td>
                            <td>01/02/2019</td>
                            <td>05/03/2019</td>
                            <td>Bla Bla Bla</td>
                            <td>15/01/2019</td>
                            <td>Bla Bla Bla Holiday  ffdsfsdfds dsf dfdsf sf asd faddffsdf  fdsfdasf  fadsfd safasdf fadsf   dfsdasf   dsf dsaf  dsfsdf  fdsffdsd df</td>
                            <td style="color: green;">Approved</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
              </div>
          </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- Jquery For table -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
  <script type="text/javascript">
      $(document).ready(function() {
      $('#leavehistory').DataTable( {
          "pagingType": "full_numbers",
          "scrollY": 300,
          "scrollX": true
          } );
        } );
    </script>
    <script src="../js/dataTables.bootstrap.min.js"></script>
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
</body>

</html>
