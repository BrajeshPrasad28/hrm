<?php
require_once('dbconnection.php');

require("user_detail.php");

 if(!isset($_SESSION['emp_id'])){
   header("location: logout.php");
 }
 $msg = "";
 $msg1 = "";
 // echo $donor->email;
if(isset($_POST['submit'])){
  $password = $_POST['password'];
  $c_password = $_POST['c_password'];

    if($password == $c_password){
      $query = mysqli_query($con,"UPDATE employees SET password='$password' WHERE emp_id ='$emp->emp_id' AND password='$emp->password' ") or die(mysqli_error($con));
      $_SESSION['password'] = $password;
      $msg1 = "Password Changed";
    }else{
      $msg = "Confirm Password didn't matched with Password";
    }

}
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Payroll and Attendance Maintenance System</title>
    <link rel="shortcut icon" type="images/png" href="../images/test.svg.png">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/userstyle.css">
    <!-- Css for Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Table Heeader Style-->

</head>

<body>

<?php include 'sidebar_and_header1.php';?>


      <div class="cssmenu">
          <ul>
              <li class="active"><a href="#">Change Password</a></li>
              <li><a href="#">Account</a></li>
              <li><a href="userpanel.php"><i class="fa fa-home"></i> Home</a></li>
          </ul>
      </div>
      <div class="card">
        <div class="container" style="height: 450px;">
          <div class="header">
            <h3><center style="font-weight: bolder; margin-top: 15px;"> Change Password</h3></center>
          </div>
          <div class="col-sm-4 col-sm-offset-4" style="height:319px; width:350px; margin:auto; margin-top:30px; background-color:white; border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
            <div class="passchange" style="margin-top: 0px; font-weight: bolder;">
              <form method="post" style="position: static;margin-bottom: 0px;">
                <p class="text-danger"><?php echo $msg; ?></p>
                <p class="text-success"><?php echo $msg1; ?></p>
                <div class="form-group">
                  <label for="password"> New Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Enter New Password">
                </div>
                  <div class="form-group">
                    <label for="c_password">Confirm Password</label>
                    <input type="password" class="form-control" name="c_password" placeholder="Enter Confirm Password">
                  </div>
                    <center><input type="button" class="btn btn-success btn-lg" name="submit" value="Submit" style="margin-top: 30px;"></center>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- this two divs are belongs to include sidebar_navbar page -->
      </div>
      </div>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

</body>

</html>
