<?php
require ('dbconnection.php');
session_start();
if(!isset($_SESSION['emp_id'])){
  header('location: login_or_attendance.php');
}
else{
  $emp_id = $_SESSION['emp_id'];
  $password = $_SESSION['password'];

  $query = mysqli_query($con, "SELECT * FROM employees WHERE emp_id = '$emp_id' AND password = '$password'");
  $emp = mysqli_fetch_object($query);
}
 ?>
