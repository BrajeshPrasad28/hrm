<?php
 require_once('dbconnection.php');
 session_start();


 $msg = "";
if(isset($_POST['submit'])){
  // echo "<pre>";
  // print_r($_POST);
  // die();
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  $query = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' AND password='$password' ");
  $a = mysqli_num_rows($query);
  if($a > 0 ){
    echo "<script>alert('Entered Query');</script>";
        $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
        header("Location: admin/adminpanel.php");
  }else {
    $msg =  "E-mail id or Password Didn't Matched";
  }
}
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <!-- <meta http-equiv="refresh" content="2"> -->
     <title>Admin_login</title>
     <link rel="shortcut icon" type="images/png" href="images/test.svg.png">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- <script src="bootstrap/jquery.min.js"></script>
     <script src="bootstrap/bootstrap.min.js"></script> -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
     <script src="moment/moment.js"></script>
     <link rel="stylesheet" href="css/style.css">

     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   </head>
   <body>
   <div class="header">
     <img src="images\test.svg.png" alt="header_picture" style="height: 119px; width: 81px; margin-top: 3px; margin-bottom: 3px; margin-left: 26px;">
     <b style="font-size:28px; margin-left: 342px;">HUMAN RESOURCE MANAGEMENT</b>
    <!-- <h2><strong><center>HUMAN RESOURCE MANAGEMENT</center></strong></h2> -->
     <div class="login-logo" style="margin-left:85%; font-size:19px; font-weight:bold; margin-top:-102px;">
       <p id="date"></p>
       <p id="time" class="bold"></p>
    </div>
    </div>

   <div class="container">
     <center style="margin-top: 70px;">
     <div class="login">
   <form method="post" enctype="multipart/form-data">
   <h4 style="text-align: center; border: 1px solid darkslategrey; border-radius: 5px; font-size: 30px; margin-top: -39px; opacity: 1; background-color: darkslategrey; color: white; height: 40px; width: 296px; margin-left: -31px;">Admin Login</h4>
       <input type="text" name="username" value="" placeholder="username" required>
       <input type="password" name="password" value="" placeholder="password" required>
       <input type="submit" name="submit" value="Login">
   </form>
 </div>
 </center>
 </div>


 <!--footer starts here--->
 <footer>
   <div class="footer">
     <br>
     <p style="font-weight:bolder; background-color: black; color:white; margin-top: -22px;">DEVELOP AND DESIGN BY BRAJESH KUMAR PRASAD</p>
       <p style="font-weight: bolder; margin-top: -20px;">&copy2018 all right reserved</p>
       </footer>
   <!--footer ENDS here--->



 <!-- script for time and date -->
 <script type="text/javascript">
 $(function() {
   var interval = setInterval(function() {
     var momentNow = moment();
     $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));
     $('#time').html(momentNow.format('hh:mm:ss A'));
   }, 100);
 });
 </script>
 <!-- script ends here -->



 </body>
 </html>
