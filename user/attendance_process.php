<?php
require_once('dbconnection.php');
session_start();
if(isset($_POST['attend']))
{
  if(empty($_POST['attendance']) || empty($_POST['emp_id'])){
    header("location:login_or_attendance.php?Empty1= Please Fill in the Blanks");
  }
  else
  {
    $date = date('Y-m-d');
    date_default_timezone_set('Asia/Kolkata');
    $time = date('H:i:sa');
    $attendance = $_POST['attendance'];
    $emp_id=$_POST['emp_id'];
    $status = $_POST['working'];
    $status1 = $_POST['not_working'];
    if($attendance == 'In'){
      $query = "INSERT INTO attendance (emp_id,date,time_in,status) VALUES('$emp_id','$date','$time','$status')";
      $result=mysqli_query($con,$query);
      if($result)
      {
        // $_SESSION['User']=$_POST['username'];
        // header("location:userpanel.php");
        header("location:login_or_attendance.php?Empty2= Time In, Successfull");
      }
      else {
        header("location:login_or_attendance.php?Empty1= Incorrect Username or Password");
      }
    }
    if($attendance == 'Out'){
      $query = "UPDATE attendance SET time_out='$time', status='$status1' WHERE emp_id='$emp_id'";
      $result=mysqli_query($con,$query);
      if($result)
      {
        // $_SESSION['User']=$_POST['username'];
        // header("location:userpanel.php");
        header("location:login_or_attendance.php?Empty2= Time oUT, Successfull");
      }
      else {
        header("location:login_or_attendance.php?Empty1= Incorrect Username or Password");
      }
    }
  }
}
else {
  echo "Not Working";
}
?>
