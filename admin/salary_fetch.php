<?php
 require_once('dbconnection.php');
 if(isset($_POST["designation"]))
 {
      $query = "SELECT * FROM salary WHERE designation = '".$_POST["designation"]."' AND job_type = '".$_POST["job_type"]."' ";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result);
      echo json_encode($row);
 }
 ?>
