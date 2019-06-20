<?php
    require_once('dbconnection.php');
     $emp_id = $_POST['id'];
     $posting_date = $_POST['postingdate'];
     date_default_timezone_set('Asia/Kolkata');
     $date = date('Y-m-d');
     $sql = mysqli_query($con,"UPDATE emp_leave SET status='1', apprv_or_rejct_date='$date' WHERE emp_id ='$emp_id' AND posting_date='$posting_date' AND status = '0'");
     if($sql){
       echo ("Approve successfully");
   }else{
     echo ("Approve Unsuccessful!!!");
   }
   mysqli_close($con);
   ?>
