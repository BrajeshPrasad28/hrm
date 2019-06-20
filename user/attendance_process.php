<?php
  include 'dbconnection.php';
  session_start();
    $emp_id=$_POST['emp_id'];
    date_default_timezone_set('Asia/Kolkata');
    $time = date('H:i:s');
    $date = date('Y-m-d');
    $attendance = $_POST['attendance'];
    $status = '0';
    //echo $date."/".$emp_id."/".$time."/".$attendance."/".$status;
    if($attendance=='In'){
      $sql = mysqli_query($con,"SELECT * FROM attendance WHERE emp_id='$emp_id' AND date='$date'");
      $nums = mysqli_num_rows($sql);
      if($nums == 1){
        ?>
        <h6>Already! Time in</h6>
        <?php
      }else {
        $sql1 = mysqli_query($con,"INSERT INTO attendance(emp_id,date,time_in,status) values('$emp_id','$date','$time','$status')");
        if($sql1){
          ?>
          <h6 style="color: green;">Time in, Successfully</h6>
          <?php
        }else {
          ?>
          <h6 style="color: red;">Incorrect Username...</h6>
          <?php
        }
      }
    }elseif($attendance=='Out'){
      $sql2 = mysqli_query($con,"SELECT emp_id,date FROM attendance WHERE emp_id='$emp_id' AND date='$date'");
      if(mysqli_fetch_array($sql2)){
        $sql3 = mysqli_query($con,"UPDATE attendance SET time_out='$time',status='1' WHERE emp_id='$emp_id' AND date='$date'");
        if($sql3){
          ?>
          <h6 style="color: green;">Successfully! Time Out</h6>
          <?php
        }else{
          ?>
          <h6 style="color: red;">Could not Time Out</h6>
          <?php
        }
      }else{
        ?>
        <h6 style="color: red;">Incorrect Username...</h6>
        <?php
      }
    }
    mysqli_close($con);
 ?>
