<?php
require_once('dbconnection.php');
require("admin_detail.php");
if(isset($_POST['empid'])){
  $emp_id = $_POST['empid'];
  $basic = $_POST['basic'];
  $hra = $_POST['hra'];
  $da = $_POST['da'];
  $dedection = $_POST['dedct'];
  $deduct_reason = $_POST['dedct_reason'];
  $bonus = $_POST['bonus'];
  $bonus_reason = $_POST['bonus_reasons'];
  $sid = $_POST['sid'];
  echo $sid;
  // echo $basic." ".$hra." ".$da." ".$dedection." ".$bonus;
  $total = (($basic+$hra+$da+$bonus)-$dedection);
  date_default_timezone_set('Asia/Kolkata');
  $year = date('Y');
  $month = date('m');
  $sql = mysqli_query($con,"INSERT INTO emp_salary(salary_id,emp_id,month,year,basic,hra,da,deduction,deduction_reason,bonus,bonus_reason,total) VALUES ('$sid','$emp_id','$month','$year','$basic','$hra','$da','$dedection','$deduct_reason','$bonus','$bonus_reason','$total')");
  if($sql){

    ?>
    <center><h4 style="color: green;">Successfully Paid</h4></center>
    <?php
    $sql1 = mysqli_query($con,"UPDATE employees SET salary_status='Paid' WHERE emp_id='$emp_id'");
  }else {
    ?>
    <center><h4 style="color: red;">Already Paid!</h4></center>
    <?php
  }
}
mysqli_close($con);
 ?>
