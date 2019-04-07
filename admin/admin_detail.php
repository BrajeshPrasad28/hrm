<?php
require ('dbconnection.php');
session_start();
if(!isset($_SESSION['username'])){
  header('location: admin_login.php');
}
else{
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];

  $query = mysqli_query($con, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
  $admin = mysqli_fetch_object($query);
}
 ?>
