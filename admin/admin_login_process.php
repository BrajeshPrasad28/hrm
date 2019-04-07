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
        header("Location: adminpanel.php");
  }else {
    $msg =  "E-mail id or Password Didn't Matched";
  }
}
 ?>
