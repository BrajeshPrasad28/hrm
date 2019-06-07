<?php
require_once('dbconnection.php');
session_start();
if(isset($_POST['login']))
  {
    if(empty($_POST['username']) || empty($_POST['password']))
    {
      header("location:index.php?Empty= Please Fill in the Blanks");
    }
    else
    {
       $query="SELECT * FROM employees WHERE emp_id='".$_POST['username']."' AND password='".$_POST['password']."'";
       $result=mysqli_query($con,$query);

       if(mysqli_fetch_assoc($result))
       {
         $_SESSION['User']=$_POST['username'];
         header("location:userpanel.php");
       }
       else {
         header("location:index.php?Empty= Incorrect Username or Password");
       }
    }
  }
  else {
    echo "Not Working";
  }
 ?>
