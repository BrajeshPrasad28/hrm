<?php
 require_once('dbconnection.php');
 session_start();

 $msg = "";
if(isset($_POST['login'])){
  // echo "<pre>";
  // print_r($_POST);
  // die();
  $emp_id = trim($_POST['emp_id']);
  $password = trim($_POST['password']);

  $query = mysqli_query($con, "SELECT * FROM employees WHERE emp_id='$emp_id' AND password='$password' ");
  $a = mysqli_num_rows($query);
  if($a > 0 ){
    echo "<script>alert('Entered Query');</script>";
        $_SESSION['emp_id'] = $emp_id;
            $_SESSION['password'] = $password;
        header("Location: userpanel.php");
  }else {
    $msg =  "Employee id or Password Didn't Matched";
  }
}
 ?>
