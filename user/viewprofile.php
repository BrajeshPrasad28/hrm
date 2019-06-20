<?php
 include 'dbconnection.php';
  session_start();
  if(!isset($_SESSION['User'])){
    header('location: index.php');
  }
  $emp_id = $_SESSION['User'];
  // $query1 = mysqli_query($con,"SELECT photo FROM employees WHERE emp_id='$emp_id'");
  // while($row1 = mysqli_fetch_array($query1)){
  //   $photo = $row1['photo'];
  // }
 ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Payroll and Attendance Maintenance System</title>
      <?php include 'header.php'; ?>
      <style media="screen">
        .table td, .table th{
          border-top: none !important;
          color: navy;
        }
      </style>
   </head>
   <body>
    <?php include 'sidebar.php'; ?>
            <div class="cssmenu">
                <ul>
                    <li class="active"><a href="#">View Profile</a></li>
                    <li><a href="#">Account</a></li>
                    <li><a href="userpanel.php"><i class="fa fa-home"></i> Home</a></li>
                </ul>
            </div>
            <div style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue; background: linear-gradient(to bottom, #336699 0%, #99ccff 100%);">
              <h4 class='mt-1' style="text-align: center; color: White;">User Profile</h4>
              <hr style="border-color: blue;">
              <div class="ml-5">
                <?php
                 $query = mysqli_query($con,"SELECT *FROM employees,designation WHERE employees.emp_id='$emp_id' AND employees.d_name=designation.d_id");
                 while($row = mysqli_fetch_array($query)){
                 ?>
                <table class="table">
                  <tr>
                    <td style="width: 50%;">
                      <table>
                        <tr>
                          <th>Employee ID</th>
                          <td><?php echo $emp_id; ?></td>
                        </tr>
                        <tr>
                          <th>Designation</th>
                          <td><?php echo $row['d_name']; ?></td>
                        </tr>
                        <tr>
                          <th>Position</th>
                          <td><?php echo $row['job_type'] ?></td>
                        </tr>
                        <tr>
                          <th>Employee Name</th>
                          <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                        </tr>
                        <tr>
                          <th>Date of Birth</th>
                          <td><?php echo $row['dob']; ?></td>
                        </tr>
                        <tr>
                          <th>Gender</th>
                          <td><?php echo $row['gender']; ?></td>
                        </tr>
                        <tr>
                          <th>Contact No:</th>
                          <td><?php echo $row['phone']; ?></td>
                        </tr>
                        <tr>
                          <th>Email ID</th>
                          <td><?php echo $row['email']; ?></td>
                        </tr>
                        <tr>
                          <th>address</th>
                          <td><?php echo $row['address']; ?></td>
                        </tr>

                      </table>
                    </td>
                    <td>
                      <img src="<?php echo $row['photo']; ?>" width="170px" class="shaddoww" style="border: 2px solid powderblue; border-radius: 11%;"/>
                    </td>

                  </tr>
                </table>
                <?php } ?>
              </div>
          </div>
          <!-- These two div is for sidebar -->
          </div>
        </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <!-- Popper.JS -->
    <script src="../js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- JavaScript for sidebar -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

</body>

</html>
