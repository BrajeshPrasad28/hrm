<?php
require_once('dbconnection.php');
session_start();
if(isset($_POST['month_year_wise']))
  {
    $my_wise = $_POST['my_wise'];
    $month_year_wise = $_POST['month_year_wise'];
    if($my_wise == 'monthwise')
    {
      header("location: attendance_month.php");
    }
    if($my_wise == 'yearwise')
    {
      header("location: attendance_year.php");
    }
  }
  else {
    echo "Not Working";
  }
 ?>
