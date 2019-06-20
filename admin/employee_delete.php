<?php
  include 'dbconnection.php';
   $emp_id = $_POST['id'];
   $query = mysqli_query($con,"DELETE FROM employees WHERE emp_id = '$emp_id'");
   if($query){
      echo ("Employee Deleted Successfully");
   }else{
     echo ("Not Updated, reason: ".mysqli_error($con));
   }
 ?>
