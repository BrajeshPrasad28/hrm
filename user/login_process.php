<?php
require_once('dbconnection.php');
session_start();
if(isset($_POST['login']))
  {
    $password = hash('gost',md5($_POST["password"]));
    if(empty($_POST['username']) || empty($_POST['password']))
    {
      header("location:index.php?Empty= Please Fill in the Blanks");
    }
    else
    {
       $query="SELECT * FROM employees WHERE emp_id='".$_POST['username']."' AND password='".$password."'";
       $result=mysqli_query($GLOBAL["__mysqli_ston"],$query);
       $row = mysqli_num_rows($result);
       if($row == 1)
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
