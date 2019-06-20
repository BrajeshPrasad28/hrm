<?php
  session_start();
  if(!isset($_SESSION['User'])){
    header('location: index.php');
  }
  date_default_timezone_set('Asia/Kolkata');
  $p_year = date('Y-M-d');
 ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Payroll and Attendance Maintenance System</title>
      <?php include 'header.php'; ?>
   </head>
   <body>
    <?php include 'sidebar.php'; ?>
            <div class="cssmenu">
                <ul>
                    <li class="active"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                </ul>
            </div>
            <div style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue; background-color: white;">
              <h3 class="mt-2" style="text-align: center; color: teal;"><strong>Year:</strong>&nbsp;<?php echo $p_year; ?></h3>
              <div class="container-fluid">

                <div class="row mt-3 ml-3 mr-3 mb-3" >
                  <!-- Attendance Part -->
                  <div class="col-sm-5 ml-2 mt-5 emp" style="border: 3px solid darkseagreen; box-shadow: 1px 1px 11px teal; border-radius:15px; background: darkcyan; background: radial-gradient(#648880,  #123d32);">
                    <h4 style="text-align:center; color: lightcyan;">Attendance</h4>
                    <hr style="border-color: white;">
                    <div class="row ml-4">
                      <a href="attendance_month.php" style="font-size: 18px;  color:    white;"><i class="fa fa-calendar"></i> Month Wise</a>
                    </div>
                    <div class="row ml-4">
                      <a href="attendance_year.php" style="font-size: 18px;  color:    white;"><i class="fa fa-calendar"></i> Year Wise</a>
                    </div>
                  </div>
                  <div class="col-sm-1">
                  </div>
                  <!-- Leave Part -->
                  <div class="col-sm-5 ml-2 mt-5 emp" style="border: 3px solid darkseagreen; box-shadow: 1px 1px 11px teal; border-radius:15px; background: darkcyan; background: radial-gradient(#648880, #123d32);">
                      <h4 style="text-align:center; color: lightcyan; ">Leave</h4>
                    <hr style="border-color: white;">
                    <div class="row ml-4">
                      <a href="applyleave.php" style="font-size: 18px;  color:    white;"><i class="fa fa-plane"></i> Apply Leave</a>
                    </div>
                    <div class="row ml-4 mb-3">
                      <a href="leavehistory.php" style="font-size: 18px;  color:    white;"><i class="fa fa-history"></i> Leve History</a>
                    </div>
                  </div>
                </div>

                <div class="row mt-3 ml-3 mr-3 mb-3">
                  <!-- Payroll Part -->
                  <div class="col-sm-5 ml-2 mt-5 emp" style="border: 3px solid darkseagreen; box-shadow: 1px 1px 11px teal; border-radius:15px; background: darkcyan; background: radial-gradient(#648880, #123d32);">
                      <h4 style="text-align:center; color: lightcyan;">Payroll</h4>
                    <hr style="border-color: white;">
                    <div class="row ml-4 mb-3">
                      <a href="pay_roll.php" style="font-size: 18px; color:    white;"><i class="fa fa-money"></i> Pay-roll</a>
                    </div>
                    </div>
                    <div class="col-sm-1">
                    </div>
                    <!-- Notice Part -->
                    <div class="col-sm-5 ml-2 mt-5 emp" style="border: 3px solid darkseagreen; box-shadow: 1px 1px 11px teal; border-radius:15px; background: darkcyan; background: radial-gradient(#648880, #123d32);">
                        <h4 style="text-align:center; color: lightcyan;">Notice</h4>
                      <hr style="border-color: white;">
                      <div class="row ml-4 mb-3">
                        <a href="noticeboard.php" style="font-size: 18px; color:    white;"><i class="fa fa-list-alt"></i> Noticeboard</a>
                      </div>
                      </div>
                </div>

              </div>
            </div>
     <!-- These two divs are for sidebar -->
        </div>
    </div>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>
