<?php
require_once('dbconnection.php');

require("admin_detail.php");

  $id = $_POST['id'];
   $query = mysqli_query($con,"UPDATE noticeboard SET status='disable' WHERE id = '$id'");
   if($query){
       echo ('Disabled Successfully');
   }else{
     echo ("Not Updated, reason: ".mysqli_error($con));
   }
 ?>
