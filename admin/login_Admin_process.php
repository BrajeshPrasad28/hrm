<?php
require_once('dbconnection.php');
session_start();
$username = trim($_POST['username']);
$password = hash('gost',md5($_POST['password']));
if(isset($_POST['login']))
  {
    if(empty($username) || empty($password))
    {
      header("location:login_Admin.php?Empty= Please Fill in the Blanks");
    }
    else
    {
       $query = mysqli_query($con, "SELECT * FROM employees WHERE emp_id='$username' AND password='$password' AND role='admin' ");
       $row = mysqli_num_rows($query);
       if($row == 1)
       {
         $_SESSION['username'] = $username;
         $_SESSION['password'] = $password;
         header("Location: adminpanel.php");
       }
       else {
         header("location:login_Admin.php?Empty= Incorrect Username or Password");
       }
    }
  }
  else {
    echo "Not Working";
  }
 ?>
