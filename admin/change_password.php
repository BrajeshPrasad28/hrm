<?php
require_once('dbconnection.php');

require("admin_detail.php");

 if(!isset($_SESSION['username'])){
   header("location: logout.php");
 }
 $msg = "";
 $msg1 = "";
 // echo $donor->email;
if(isset($_POST['submit'])){
  $password = $_POST['password'];
    $c_password = $_POST['c_password'];

    if($password == $c_password){
      $query = mysqli_query($con,"UPDATE admin SET password='$password' WHERE username='$admin->username' AND password='$admin->password' ") or die(mysqli_error($con));
      $_SESSION['password'] = $password;
      $msg1 = "Password Changed";
    }else{
      $msg = "Confirm Password didn't matched with Password";
    }

}
 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <!-- <meta http-equiv="refresh" content="05"> -->
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link rel="shortcut icon" type="images/png" href="../images/test.svg.png">

     <title>UPDATE PROFILE</title>

     <!-- Bootstrap CSS CDN -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
     <!-- Custom CSS -->
     <link rel="stylesheet" href="css/adminstyle.css">

     <!-- Font Awesome JS -->
     <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>


<!-- body starts here -->
 <body>

   <!-- div of this include page are closed down below which shows extra two div -->
     <?php include 'sidebar_navbar1.php'; ?>


 <!-- Main Content starts here -->
 <!-- it is for the box -->
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
              <input type="submit" class="btn btn-info" name="submit" value="Submit" style="margin-left: 57px; width: 148px; margin-top: 30px;">
        </form>
      </div>
    </div>
  </div>
</div>
<!-- this two divs are belongs to include sidebar_navbar page -->
</div>
</div>



<!-- style starts here -->

<style media="screen">

  .passchange{
    background: #fff;
    border-radius: 10px;
    padding: 30px;
    margin-top: 50px;
  }
  .chpass{
    margin: 0px;
    margin-bottom: 30px;
    font-size: 20px;
  }
</style>


</body>
</html>
